var vidali = (function(){
/*Global vars*/
    var dir = "/Vidali.server/vdl-include/session_start.php";
/*Error Handler*/

    var errMsg = function(msg, type){
        clearTimeout(msgTimeout);
        $("#alert").empty();
        $("#alert").append("<strong>Ops!</strong>");
        $("#alert").fadeOut("fast",function(){
            $("#alert").attr("class","alert " + (type ? "alert-"+type : "alert-message"));
            $("#alert").append(" "+msg);
            $("#alert").fadeIn("fast");
            msgTimeout = setTimeout(function(){$('#alert').fadeOut();},4000);
        });
    }

    function error(msg) {
        console.log("VDL_ERROR: "+msg);
    }

/*UI Engine*/

    var drawPage = function(page){
        $('#container').empty();
        $('#container').load(page+'.html');
        console.log('loaded '+page);
    }

    var loadScreen = function(page){
        console.log('loadingScreen '+page);
        if(page == 'login')
            drawPage(page);
        else{
            drawPage('main');
            navigator.geolocation.getCurrentPosition(saveposition);
            if(!page){
                loadData('home');
            }
            else
                loadData(page);
        }
    }

/*Geolocation Engine*/

    var loadData = function(value){
        console.log('loadData: '+value);
        //navigator.geolocation.getCurrentPosition(success, error);
        $('#apps ul li').removeClass('active');
        $("#submenu").empty();
        if(value == 'home'){
            $("#submenu").append('<li class="active"><a href="#" onClick="load_info(\'wall\');" data-toggle="tab">Resumen</a></li>');
            $("#submenu").append('<li><a href="#" onClick="load_info(\'profile\');" data-toggle="tab">Perfil</a></li>');            
            $('#m-home').addClass('active');
        }
        if(value == 'groups'){
            $("#submenu").append('<li class="active"><a href="#" onClick="load_info(\'all\');" data-toggle="tab">Todo</a></li>');
            $("#submenu").append('<li><a href="#" onClick="load_info(\'my_groups\');" data-toggle="tab">Mis grupos</a></li>');
            $('#m-group').addClass('active');
        }
        if(value == 'routes'){
            $("#submenu").append('<li class="active"><a href="#" onClick="load_info(\'routes\');" data-toggle="tab">Rutas</a></li>');
            $("#submenu").append('<li><a href="#" onClick="load_info(\'public\');" data-toggle="tab">Transporte Público</a></li>');
            $('#m-routes').addClass('active');
        }
        if(value == 'files'){
            $("#submenu").append('<li class="active"><a href="#" onClick="load_info(\'file\');" data-toggle="tab">Archivos</a></li>');
            $('#m-files').addClass('active');
        }
        return false;
    }


    var isLoged = function(){
        if(localStorage.getItem('nick'))
            sessionStorage.setItem('nick',localStorage.getItem('nick'));
        return sessionStorage.getItem('nick')? 1 : 0;
    };

    var getData = function(handler,source,query_,value1,value2,value3){
        if(source == 'login')
            dir = "/Vidali.server/vdl-include/session_start.php"
        else
            dir = "/Vidali.server/vdl-include/query.php"
        $.ajax({
            url: dir,
            cache: false,
            type: "POST",
            data: {
                query: query_,
                user: value1,
                password: value2,
                remember: value3
            },
            success: function(data){
                handler(data);
            }
        });
    };

var saveposition = function(position){

  localStorage['latitude'] = position.coords.latitude;
  localStorage['longitude'] = position.coords.longitude;
}

/*Controller Engine: isCompatible,loadEngine,doLogin,doLogout*/

    var isCompatible = function() {
        return localStorage && navigator.geolocation;
    };

    var boot = function(){
        getData(
            function(result){
                if(result)
                    localStorage.setItem('token',result);
            },
            'query',
            'getToken'
        );
        if(!isLoged()){
            loadScreen('login');
        }
        else{

            loadScreen('home');
        }
    };

    var doLogin = function(){
        $("#background").fadeIn(500);
        user = $('#user').val();
        password = $('#password').val();        
        if(!user || !password){
            errMsg('All data must be filled','warning');
            return;
        }
        getData(
            function(result){
                if(result == 'true' || result == '1'){
                    $("#background").fadeIn(500, function (){
                        sessionStorage.setItem('nick',user);
                        if($('#remember').prop('checked'))
                            localStorage.setItem('nick',user);
                        loadScreen('home');
                        $("#background").fadeOut(500);
                        return true;
                    });
                }
                else{
                    $("#background").fadeOut(500, function(){
                        errMsg('Wrong user or password, please try again.',"warning");
                    });
                }
            },
            'login',
            '',
            user,
            password,
            $('#remember').prop('checked') ? 1 : 0
        );
    };

    var doLogout = function(){
        $("#background").fadeIn(500,function(){
            localStorage.removeItem('token');
            localStorage.removeItem('nick');
            sessionStorage.removeItem('nick');
            vdl.loadScreen('login');
            $("#background").fadeOut(500);
        });
    };

    return {
    loadScreen : loadScreen,
    isCompatible : isCompatible,
    boot : boot,
    doLogin : doLogin,
    doLogout : doLogout
  };

})();

var msgTimeout;
var vdl = vidali;
    var map = new ol.Map({
        target: 'map',
        layers: [       
            new ol.layer.Tile({
                source: new ol.source.OSM({
                attributions: [
                    new ol.Attribution({
                    html: 'All maps &copy; ' +
                        '<a href="http://www.opencyclemap.org/">OpenCycleMap</a>'
                    }),
                    ol.source.OSM.DATA_ATTRIBUTION
                ],
                url: 'http://{a-c}.tile.opencyclemap.org/transport/{z}/{x}/{y}.png'
                })
            })
        ],
        renderers: ol.RendererHints.createFromQueryData(),
        view: new ol.View2D({
            center: [0, 0],
            zoom: 2
        }),
      });

$(document).ready(function(){
    $("#background").fadeIn(500);
    vdl.boot();
    if(!vdl.isCompatible()){
        alert('Navegador no soportado');
        document.location.href='http://www.firefox.com';
    }
    $('#background').fadeOut(500);
    return false;
});
/*Global data*/
var msgTimeout;
var basedir;
var _GET = window.location.href.replace(basedir+'/', '').split('/');
var map;

/*Bootstrap*/
$('#home-tab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
})

$('#side-tab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
})

$('#notify-tab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
})

/*Menu link actions*/
var link = function(value){
	$("#din").hide();
	if(value == "h"){
		window.history.replaceState(" ", "Home", basedir+"/h/");
		get_page('h');
		document.title = "Home - Vidali";
	}
	if(value == "m"){
		window.history.replaceState(" ", "Mensajes", basedir+"/m/");
		get_page('m');
		document.title = "Mensajes - Vidali";
	}
	if(value == "g"){
		window.history.replaceState(" ", "Grupos", basedir+"/g/");
		get_page('g');
		document.title = "Grupos - Vidali";
	}
	if(value == "r"){
		window.history.replaceState(" ", "Rutas", basedir+"/r/");
		get_page('r');
		document.title = "Rutas - Vidali";
	}
	if(value == "f"){
		window.history.replaceState(" ", "Archivos", basedir+"/f/");
		get_page('f');
		document.title = "Archivos - Vidali";
	}
	if(value == "s"){
		window.history.replaceState(" ", "Ajustes", basedir+"/s/");
		get_page('s');
		document.title = "Ajustes - Vidali";
	}
	if(value == "l"){
		if(basedir.length == 0)
	        dir = "/vdl-include/log.php";
	    else
	        dir = basedir+"/vdl-include/log.php"; 
		
		$("#background").fadeIn(500);
		$.ajax({
			url: dir,
			cache: false,
			type: "POST",
			success: function(data){
				if(data == "done"){
					window.location= basedir;
				}
			}
		});
	}
	$("#din").fadeIn(500);
	return false;
};

/****
	*set_data (value of specific data)
	*We connect with server-side and request specific data to put it into view div.
	*return: false
	*/
var set_data = function(value){ //debe cambiar: aqui debe crearse todos los puntos para el mapa, donde incluímos las updates, etc etc
	var result;
	$.ajax({
		url: basedir+'/vdl-include/query.php',
		cache: false,
		type: "POST",
		data: {
			query: value,
			extra: _GET[1],
		},
		success: function(data){
			if(data == ''){
				$("#view").append('<article id="object" class="obj">En construcción</article>');
			}
			else{
				console.log(data);
				data = JSON.parse(data);
				console.log(data);
		    	if(value == 'wall'){
		    		
					$("#view").append('<div id="updates" class="obj"></div>');
				    for(var i=0;i<data.length;i++){
						$("#updates").append('<article id="obj-'+i+'" class="upd"></article>');
						$("#obj-"+i).append('<div id="uthumb-'+i+'" class="upd-img"></div>');
						$("#obj-"+i).append('<div id="uinfo-'+i+'" class="upd-info"></div>');
						$("#uthumb-"+i).append('<img src="vdl-files/'+data[i].avatar_id+'_tb.jpg">');
						$("#uinfo-"+i).append('<div class="nick"><a href="#" onClick="load_info(\'profile\');">'+data[i].nick+'</a></div><div class="date_published">'+data[i].date_published+'</div>');
						$("#obj-"+i).append('<div class="upd-msg">'+data[i].text+'</div>');
						//SOBRECARGA o MODIFICAR SET_DATA y LOAD_INFO para poder enviar nick del usuario
					}
				}
				if (value == 'profile'){
						var sex;
						if(data.sex == 'male')
							sex = 'Hombre';
						else
							sex = 'Mujer';
						$("#view").append('<article id="profile-info" class="obj"></article>');
						$("#profile-info").append('<img src="vdl-files/'+data.avatar_id+'.jpg">');
						$("#profile-info").append('<div>'+data.nick+'</div>');
						$("#profile-info").append('<div>'+data.name+'</div>');
						$("#profile-info").append('<div>'+sex+', '+data.age+' años.</div>');
						$("#profile-info").append('<div>'+data.description+'</div>');
				}
				if (value == 'inbox'){
					$("#view").append('<article id="object" class="obj">En construcción</article>');					
				}
				if (value == 'routes'){
					$("#view").append('<article id="obj-map" class="obj"></article>');
					$("#obj-map").append('<object type="text/html" data="http://tranviaonline.metrotenerife.com/#mapa" width="690" height="400"> </object>');
				}
				if (value == 'set_profile'){
					$("#view").append('<form id="settings" class="obj form-horizontal"></form>');
					$("#settings").append('<div id="c0" class="control-group"></div>');
					$("#c0").append(' <label class="control-label" for="SetAvatar">Foto de perfil</label>');
					$("#c0").append(' <div class="controls"><img id="SetAvatar" src="vdl-files/'+data.avatar_id+'.jpg">');
					$("#settings").append('<div id="c1" class="control-group"></div>');
					$("#c1").append(' <label class="control-label" for="SetNick">Nick</label>');
					$("#c1").append(' <div class="controls"><input type="text" id="SetNick" value="'+data.nick+'"></div>');
					$("#settings").append('<div id="c2" class="control-group"></div>');
					$("#c2").append(' <label class="control-label" for="ProfName">Nombre</label>');
					$("#c2").append(' <div class="controls"><input type="text" id="ProfName" value="'+data.name+'"></div>');
					$("#settings").append('<div id="c3" class="control-group"></div>');
					$("#c3").append(' <label class="control-label" for="ProfAge">Edad</label>');
					$("#c3").append(' <div class="controls"><input type="text" id="ProfAge" value="'+data.age+'"></div>');
					$("#settings").append('<div id="c4" class="control-group"></div>');
					$("#c4").append(' <label class="control-label" for="ProfEmail">Email</label>');
					$("#c4").append(' <div class="controls"><input type="text" id="ProfEmail" value="'+data.email+'"></div>');
					$("#settings").append('<div id="c5" class="control-group"></div>');
					$("#c5").append(' <label class="control-label" for="ProfSex">Sexo</label>');
					$("#c5").append(' <div class="controls"><input type="text" id="ProfSex" value="'+data.sex+'"></div>');
					$("#settings").append('<div id="c6" class="control-group"></div>');
					$("#c6").append(' <label class="control-label" for="ProfLoc">Localización</label>');
					$("#c6").append(' <div class="controls"><input type="text" id="ProfLoc" value="'+data.location+'"></div>');
					$("#settings").append('<div id="c7" class="control-group"></div>');
					$("#c7").append(' <label class="control-label" for="ProfWeb">WebSite</label>');
					$("#c7").append(' <div class="controls"><input type="text" id="ProfWeb" value="'+data.website+'"></div>');
					$("#settings").append('<div id="c8" class="control-group"></div>');
					$("#c8").append(' <label class="control-label" for="ProfDes">Descripción</label>');
					$("#c8").append(' <div class="controls"><input type="text" id="ProfDes" value="'+data.description+'"></div>');
					$("#settings").append('<div id="c9" class="control-group"></div>');
					$("#c9").append(' <div class="controls"><button type="submit" class="btn">Actualizar</button></div>');
		
				}
			}
		}
	});
	return false;
}

var load_info = function(category){
	console.log("Loading new info for "+category);
	$("#container").fadeOut(100);
	$("#view").empty();
	set_data(category);
	$("#container").fadeIn(100);
	return false;
}

/****
	*get_page (value to load)
	*We load all tabs for a specific page and the main window.
	*return: false
	*/
var get_page = function (value){
	if(value == 'h' || value == 'u'){
		$('#side-menu ul li').removeClass('active');
		$('#m-home').addClass('active');
		$("#din ul").empty();
		if(value == 'h'){
			$("#din ul").append('<li class="active"><a href="#" onClick="load_info(\'wall\');" data-toggle="tab">Resumen</a></li>');
			$("#din ul").append('<li><a href="#" onClick="load_info(\'profile\');" data-toggle="tab">Perfil</a></li>');			
			//load_info('wall');
		}
		if(value == 'u'){
			$("#din ul").append('<li><a href="#" onClick="load_info(\'wall\');" data-toggle="tab">Resumen</a></li>');
			$("#din ul").append('<li class="active"><a href="#" onClick="load_info(\'profile\');" data-toggle="tab">Perfil</a></li>');			
			//load_info('profile');
		}
	}
	if (value == 'm'){
		$('#side-menu ul li').removeClass('active');
		$('#m-msg').addClass('active');
		$("#din ul").empty();
		$("#din ul").append('<li class="active"><a href="#" onClick="load_info(\'inbox\');" data-toggle="tab">Recibidos</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'sended\');" data-toggle="tab">Enviados</a></li>');
		//load_info('inbox');
	}
	if (value == 'g'){
		$('#side-menu ul li').removeClass('active');
		$('#m-group').addClass('active');
		$("#din ul").empty();
		$("#din ul").append('<li class="active"><a href="#" onClick="load_info(\'all\');" data-toggle="tab">Todo</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'my_groups\');" data-toggle="tab">Mis grupos</a></li>');
		//load_info('all');
	}
	if (value == 'f'){
		$('#side-menu ul li').removeClass('active');
		$('#m-files').addClass('active');
		$("#din ul").empty();
		$("#din ul").append('<li class="active"><a href="#" onClick="load_info(\'file\');" data-toggle="tab">Archivos</a></li>');
		//load_info('file');
	}
	if (value == 'r'){
		$('#side-menu ul li').removeClass('active');
		$('#m-routes').addClass('active');
		$("#din ul").empty();
		$("#din ul").append('<li class="active"><a href="#" onClick="load_info(\'routes\');" data-toggle="tab">Rutas</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'public\');" data-toggle="tab">Transporte Público</a></li>');
		//load_info('routes');
	}
	if (value == 's'){
		$('#side-menu ul li').removeClass('active');
		$('#m-set').addClass('active');
		$("#din ul").empty();
		$("#din ul").append('<li class="active"><a href="#" onClick="load_info(\'set_profile\');" data-toggle="tab">Perfil</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'main\');" data-toggle="tab">General</a></li>');
		//load_info('set_profile');
	}
	return false;
}

var update_status = function(){
	var update_val = $('#update_box').val();
	console.log(update_val);
	$.ajax({
		url: basedir+'/vdl-include/set_update.php',
		cache: false,
		type: "POST",
		data: {
			update: update_val,
		},
		success: function(data){
			console.log(data);
			if(data == 'done'){
				$('#container').prepend('<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert">×</button><strong>Holy guacamole!</strong> Estado Actualizado ;)</div>');
 				get_page('h');
 				$('#update').val('');
 				$('#updater').fadeOut(100);	
				updaterStatus = "disabled";
			}
			else{
				$('#container').prepend('<div class="alert alert-error fade in"><button type="button" class="close" data-dismiss="alert">×</button><strong>Grr!</strong> Algo Falla. Intenltalo de nuevo :(</div>');				
			}
		}
	});
}

function load_ref(refer){
	//aqui debería cargar los datos
	return '<article id="profile-info" class="obj"><img src="vdl-files/prof_def.jpg"><div>cristomc</div><div>Cristo</div><div>Hombre, 22 años.</div><div>Hola!</div></article>';
}

function draw_box(position,refer){
	var data = load_ref(refer);
	var popup = new OpenLayers.Popup("chicken",
                   position,
                   new OpenLayers.Size(200,270),
                   data,
                   true);

	map.addPopup(popup);
}

function success(position) {
	map = new OpenLayers.Map("map");
   	console.log("You are here! (at least within a "+position.coords.accuracy+" meter radius)");
    var fromProjection = new OpenLayers.Projection("EPSG:4326");   // Transform from WGS 1984
    var toProjection   = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
    var position       = new OpenLayers.LonLat(position.coords.longitude, position.coords.latitude).transform( fromProjection, toProjection);
 
    map.addLayer(new OpenLayers.Layer.OSM());
    
  	var hybrid = new OpenLayers.Layer.Google(
    	"Google Hybrid",
    	{type: google.maps.MapTypeId.HYBRID}
  	);
	map.addLayer(hybrid);

 	var transportmap = new  OpenLayers.Layer.OSM.TransportMap("OpenTransportMap"); 
  	map.addLayer(transportmap);

 	var layCycleMap = new OpenLayers.Layer.OSM.CycleMap("CycleMap");
 	map.addLayer(layCycleMap);
 	
 	 //var size = new OpenLayers.Size(21,25);
 	 //var offset = new OpenLayers.Pixel(-(size.w/2), -size.h);
     //var icon = new OpenLayers.Icon('http://www.openlayers.org/dev/img/marker.png',size,offset);
	var marker2 = new OpenLayers.Marker(position/*,icon.clone()*/);
    marker2.events.register('mousedown', marker2, function(evt) { draw_box(position,"main_user"); OpenLayers.Event.stop(evt); });

    var markers = new OpenLayers.Layer.Markers( "Markers" );
            markers.addMarker(marker2); 
    map.addLayer(markers);
    //markers.addMarker(new OpenLayers.Marker(position));
    map.addControl( new OpenLayers.Control.LayerSwitcher() );
    map.setCenter(position, 16);
}

function error(msg) {
  	console.log("VDL_ERROR:"+msg);
}

$(document).ready(function(){ 
	if(_GET[0] == '' || _GET[0] == '#' || _GET[0] == 'h'){
		get_page('h');
	}
	else{
		get_page(_GET[0]);
	}
	if (navigator.geolocation) {
  		navigator.geolocation.getCurrentPosition(success, error);
	} else {
  		console.log('Location not accesible');
	}

	$("a").tooltip();
	$('#background').fadeOut(300);
	
	return false;
});

var updaterStatus = "disabled";

var show_updater = function(){
	if(updaterStatus == "disabled"){
		$('#updater').fadeIn(100);
		updaterStatus = "enabled";
	}
	else{
		$('#updater').fadeOut(100);	
		updaterStatus = "disabled";	
	}
}

var observe;
if (window.attachEvent) {
    observe = function (element, event, handler) {
        element.attachEvent('on'+event, handler);
    };
}
else {
    observe = function (element, event, handler) {
        element.addEventListener(event, handler, false);
    };
}
function init () {
    var text = document.getElementById('update_box');
    function resize () {
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }
    /* 0-timeout to get the already changed text */
    function delayedResize () {
        window.setTimeout(resize, 0);
    }
    observe(text, 'change',  resize);
    observe(text, 'cut',     delayedResize);
    observe(text, 'paste',   delayedResize);
    observe(text, 'drop',    delayedResize);
    observe(text, 'keydown', delayedResize);

    text.focus();
    text.select();
    resize();
}
/*Global data*/
var msgTimeout;
var basedir;
var _GET = window.location.href.replace(basedir+'/', '').split('/');

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
	$("#side-menu").animate({
   			marginLeft: "-165px",
 		}, 300, function(){menuStatus = false});
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
					$("#background").fadeOut(300, function (){
						window.location= basedir;
					});
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
var set_data = function(value){
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
				    for(var i=0;i<data.length;i++){
						$("#view").append('<article id="obj-'+i+'" class="obj"></article>');
						$("#obj-"+i).append('<img src="vdl-files/'+data[i].avatar_id+'_tb.jpg">');
						$("#obj-"+i).append('<div class="upd-info">'+data[i].nick+' '+data[i].date_published+'</div>');
						$("#obj-"+i).append('<div class="upd-msg">'+data[i].text+'</div>');
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
					alert('En construccion ;) '+_GET[0]);
				}
				if (value == 'set_profile'){
					$("#view").append('<form id="settings" class="obj form-horizontal"></form>');
					$("#settings").append('<div id="c0" class="control-group"></div>');
					$("#c0").append(' <label class="control-label" for="inputEmail">Foto de perfil</label>');
					$("#c0").append(' <div class="controls"><img src="vdl-files/'+data.avatar_id+'.jpg">');
					$("#settings").append('<div id="c1" class="control-group"></div>');
					$("#c1").append(' <label class="control-label" for="inputEmail">Nick</label>');
					$("#c1").append(' <div class="controls"><input type="text" id="inputEmail" value="'+data.nick+'" placeholder="Escribe tu nuevo nick"></div>');
					$("#settings").append('<div id="c2" class="control-group"></div>');
					$("#c2").append(' <label class="control-label" for="inputEmail">Nick</label>');
					$("#c2").append(' <div class="controls"><input type="text" id="inputEmail" value="'+data.nick+'" placeholder="Escribe tu nuevo nick"></div>');
					$("#settings").append('<div id="c3" class="control-group"></div>');
					$("#c3").append(' <label class="control-label" for="inputEmail">Nick</label>');
					$("#c3").append(' <div class="controls"><input type="text" id="inputEmail" value="'+data.nick+'" placeholder="Escribe tu nuevo nick"></div>');
					$("#settings").append('<div id="c4" class="control-group"></div>');
					$("#c4").append(' <label class="control-label" for="inputEmail">Nick</label>');
					$("#c4").append(' <div class="controls"><input type="text" id="inputEmail" value="'+data.nick+'" placeholder="Escribe tu nuevo nick"></div>');
					$("#settings").append('<div id="c5" class="control-group"></div>');
					$("#c5").append(' <div class="controls"><button type="submit" class="btn">Actualizar</button></div>');
					$("#settings").append('<div>Editar nombre '+data.name+'</div>');
					$("#settings").append('<div>Editar sexo '+sex+', '+data.age+' años.</div>');
					$("#settings").append('<div>Editar descripción '+data.description+'</div>');
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
			load_info('wall');
		}
		if(value == 'u'){
			$("#din ul").append('<li><a href="#" onClick="load_info(\'wall\');" data-toggle="tab">Resumen</a></li>');
			$("#din ul").append('<li class="active"><a href="#" onClick="load_info(\'profile\');" data-toggle="tab">Perfil</a></li>');			
			load_info('profile');
		}
		//$("#din ul").append('<li><a href="#" onClick="load_info(\'global\');" data-toggle="tab">Global</a></li>');
		//$("#din ul").append('<li><a href="#" onClick="load_info(\'informer\');" data-toggle="tab">Informer</a></li>');
		//$("#din ul").append('<li><a href="#" onClick="load_info(\'net\');" data-toggle="tab">Red</a></li>');
	}
	if (value == 'm'){
		$('#side-menu ul li').removeClass('active');
		$('#m-msg').addClass('active');
		$("#din ul").empty();
		$("#din ul").append('<li class="active"><a href="#" onClick="load_info(\'inbox\');" data-toggle="tab">Recibidos</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'sended\');" data-toggle="tab">Enviados</a></li>');
		//$("#din ul").append('<li><a href="#" onClick="load_info(\'drafts\');" data-toggle="tab">Borradores</a></li>');
		//$("#din ul").append('<li><a href="#" onClick="load_info(\'trash\');" data-toggle="tab">Papelera</a></li>');
		//$("#din ul").append('<li><a href="#" onClick="load_info(\'other\');" data-toggle="tab">Otros</a></li>');
		load_info('inbox');
	}
	if (value == 'g'){
		$('#side-menu ul li').removeClass('active');
		$('#m-group').addClass('active');
		$("#din ul").empty();
		$("#din ul").append('<li class="active"><a href="#" onClick="load_info(\'all\');" data-toggle="tab">Todo</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'my_groups\');" data-toggle="tab">Mis grupos</a></li>');
		//$("#din ul").append('<li><a href="#" onClick="load_info(\'top_groups\');" data-toggle="tab">Top Grupos</a></li>');
		//$("#din ul").append('<li><a href="#" onClick="load_info(\'trends\');" data-toggle="tab">Tendencias</a></li>');
		//$("#din ul").append('<li><a href="#" onClick="load_info(\'admin\');" data-toggle="tab">Administracion</a></li>');
		load_info('all');
	}
	if (value == 'f'){
		$('#side-menu ul li').removeClass('active');
		$('#m-files').addClass('active');
		$("#din ul").empty();
		$("#din ul").append('<li class="active"><a href="#" onClick="load_info(\'file\');" data-toggle="tab">Archivos</a></li>');
		//$("#din ul").append('<li><a href="#" onClick="load_info(\'audio\');" data-toggle="tab">Audio</a></li>');
		//$("#din ul").append('<li><a href="#" onClick="load_info(\'video\');" data-toggle="tab">Video</a></li>');
		//$("#din ul").append('<li><a href="#" onClick="load_info(\'image\');" data-toggle="tab">Imagenes</a></li>');
		load_info('file');
	}
	if (value == 's'){
		$('#side-menu ul li').removeClass('active');
		$('#m-set').addClass('active');
		$("#din ul").empty();
		$("#din ul").append('<li class="active"><a href="#" onClick="load_info(\'set_profile\');" data-toggle="tab">Perfil</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'main\');" data-toggle="tab">General</a></li>');
		//$("#din ul").append('<li><a href="#" onClick="load_info(\'privacy\');" data-toggle="tab">Privacidad</a></li>');
		//$("#din ul").append('<li><a href="#" onClick="load_info(\'addons\');"data-toggle="tab">Complementos</a></li>');
		//$("#din ul").append('<li><a href="#" onClick="load_info(\'service\');" data-toggle="tab">Servicio</a></li>');
		load_info('set_profile');
	}
	return false;
}

var refresh = function(){

}

var update_status = function(){
	var update_val = $('#update').val();
	$.ajax({
		url: basedir+'/vdl-include/set_update.php',
		cache: false,
		type: "POST",
		data: {
			update: update_val,
		},
		success: function(data){
			$('#update').val('');
			if(data == 'done'){
				$('#container').prepend('<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert">×</button><strong>Holy guacamole!</strong> Estado Actualizado ;)</div>');
				get_page('h');
			}
			else{
				$('#container').prepend('<div class="alert alert-error fade in"><button type="button" class="close" data-dismiss="alert">×</button><strong>Grr!</strong> Algo Falla. Intenltalo de nuevo :(</div>');				
			}
		}
	});
}

$(document).ready(function(){
	if(_GET[0] == '' || _GET[0] == '#' || _GET[0] == 'h'){
		get_page('h');
	}
	else{
		get_page(_GET[0]);
	}
	$('#background').fadeOut(300);
//	$('#side-menu').hide();
	return false;
});

var menuStatus;
 
$("a.showMenu").click(function(){
    if(menuStatus != true){
        $("#side-menu").animate({
            marginLeft: "0px",
          }, 300, function(){menuStatus = true});
    	return false;
	} 
	else{
		$("#side-menu").animate({
   			marginLeft: "-165px",
 		}, 300, function(){menuStatus = false});
     	return false;
  	}
});
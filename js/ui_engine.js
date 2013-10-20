/**
 * @author cristo
 */
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

var load_info = function(category){
	console.log("Loading new info for "+category);
	$("#container").fadeOut(100);
	$("#view").empty();
	set_data(category);
	$("#container").fadeIn(100);
	return false;
};

/****
	*get_page (value to load)
	*We load all tabs for a specific page and the main window.
	*return: false
	*/
var get_page = function (value){
	if(value == 'h' || value == 'u'){
		$('#app-menu ul li').removeClass('active');
		$('#m-home').addClass('active');
		$("#din-submenu").empty();
		if(value == 'h'){
			$("#din-submenu").append('<li class="active"><a href="#" onClick="load_info(\'wall\');" data-toggle="tab">Resumen</a></li>');
			$("#din-submenu").append('<li><a href="#" onClick="load_info(\'profile\');" data-toggle="tab">Perfil</a></li>');			
			//load_info('wall');
		}
		if(value == 'u'){
			$("#din-submenu").append('<li><a href="#" onClick="load_info(\'wall\');" data-toggle="tab">Resumen</a></li>');
			$("#din-submenu").append('<li class="active"><a href="#" onClick="load_info(\'profile\');" data-toggle="tab">Perfil</a></li>');			
			//load_info('profile');
		}
	}
	if (value == 'm'){
		$('#app-menu ul li').removeClass('active');
		$('#m-msg').addClass('active');
		$("#din-submenu").empty();
		$("#din-submenu").append('<li class="active"><a href="#" onClick="load_info(\'inbox\');" data-toggle="tab">Recibidos</a></li>');
		$("#din-submenu").append('<li><a href="#" onClick="load_info(\'sended\');" data-toggle="tab">Enviados</a></li>');
		//load_info('inbox');
	}
	if (value == 'g'){
		$('#app-menu ul li').removeClass('active');
		$('#m-group').addClass('active');
		$("#din-submenu").empty();
		$("#din-submenu").append('<li class="active"><a href="#" onClick="load_info(\'all\');" data-toggle="tab">Todo</a></li>');
		$("#din-submenu").append('<li><a href="#" onClick="load_info(\'my_groups\');" data-toggle="tab">Mis grupos</a></li>');
		//load_info('all');
	}
	if (value == 'f'){
		$('#app-menu ul li').removeClass('active');
		$('#m-files').addClass('active');
		$("#din-submenu").empty();
		$("#din-submenu").append('<li class="active"><a href="#" onClick="load_info(\'file\');" data-toggle="tab">Archivos</a></li>');
		//load_info('file');
	}
	if (value == 'r'){
		$('#app-menu ul li').removeClass('active');
		$('#m-routes').addClass('active');
		$("#din-submenu").empty();
		$("#din-submenu").append('<li class="active"><a href="#" onClick="load_info(\'routes\');" data-toggle="tab">Rutas</a></li>');
		$("#din-submenu").append('<li><a href="#" onClick="load_info(\'public\');" data-toggle="tab">Transporte Público</a></li>');
		//load_info('routes');
	}
	if (value == 's'){
		$('#app-menu ul li').removeClass('active');
		$('#m-set').addClass('active');
		$("#din-submenu").empty();
		$("#din-submenu").append('<li class="active"><a href="#" onClick="load_info(\'set_profile\');" data-toggle="tab">Perfil</a></li>');
		$("#din-submenu").append('<li><a href="#" onClick="load_info(\'main\');" data-toggle="tab">General</a></li>');
		//load_info('set_profile');
	}
	return false;
};

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
};
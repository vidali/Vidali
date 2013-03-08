
var get_page = function (value){
	if(value == 'h'){
		$("#din ul").empty();
		$("#din ul").append('<li class="active"><a href="#" onClick="load_info(\'wall\');" data-toggle="tab">Resumen</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'profile\');" data-toggle="tab">Perfil</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'global\');" data-toggle="tab">Global</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'informer\');" data-toggle="tab">Informer</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'net\');" data-toggle="tab">Red</a></li>');
	}
	if (value == 'm'){
		$("#din ul").empty();
		$("#din ul").append('<li class="active"><a href="#" onClick="load_info(\'inbox\');" data-toggle="tab">Recibidos</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'sended\');" data-toggle="tab">Enviados</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'drafts\');" data-toggle="tab">Borradores</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'trash\');" data-toggle="tab">Papelera</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'other\');" data-toggle="tab">Otros</a></li>');
	}
	if (value == 'g'){
		$("#din ul").empty();
		$("#din ul").append('<li class="active"><a href="#" onClick="load_info(\'all\');" data-toggle="tab">Todo</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'my_groups\');" data-toggle="tab">Mis grupos</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'top_groups\');" data-toggle="tab">Top Grupos</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'trends\');" data-toggle="tab">Tendencias</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'admin\');" data-toggle="tab">Administracion</a></li>');
	}
	if (value == 'f'){
		$("#din ul").empty();
		$("#din ul").append('<li class="active"><a href="#" onClick="load_info(\'file\');" data-toggle="tab">Archivos</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'audio\');" data-toggle="tab">Audio</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'video\');" data-toggle="tab">Video</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'image\');" data-toggle="tab">Imagenes</a></li>');
	}
	if (value == 's'){
		$("#din ul").empty();
		$("#din ul").append('<li class="active"><a href="#" onClick="load_info(\'general\');" data-toggle="tab">General</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'set_profile\');" data-toggle="tab">Perfil</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'privacy\');" data-toggle="tab">Privacidad</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'addons\');"data-toggle="tab">Complementos</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'service\');" data-toggle="tab">Servicio</a></li>');
	}
	if (value == 'u'){
		$("#din ul").empty();
		$("#din ul").append('<li class="active"><a href="#" onClick="load_info(\'info\');" data-toggle="tab">Resumen</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'contacts\');" data-toggle="tab">Amigos</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'groups\');" data-toggle="tab">Grupos</a></li>');
		$("#din ul").append('<li><a href="#" onClick="load_info(\'files\');" data-toggle="tab">Archivos</a></li>');
	}
}

var wall = function(){
	var result;
	$.ajax({
		url: basedir+'/vdl-include/query.php',
		cache: false,
		type: "POST",
		data: {
			query: 'wall',
		},
		success: function(data){
			result = '<div class="object">'+data+'</div>';
			$("#view").append(result);
		}
	});
}

var load_info = function(){
	$("#view").hide();
	$("#view").empty();
	wall();
	$("#view").fadeIn(300);
	return false;
}

$(document).ready(function(){
	if(_GET[0] == '' || _GET[0] == '#')
		get_page('h');
	get_page(_GET[0]);
	load_info();
	$('#background').fadeOut(500);
	return false;
});

var msgTimeout;
var basedir;
var errMsg = function(msg, type){
	clearTimeout(msgTimeout);
	$("#alert").fadeOut("fast",function(){
		$("#alert span").html(msg);
		$("#alert").attr("class","alert " + (type ? "alert-"+type : "alert-message"));
		
		$("#alert").fadeIn("fast");
		msgTimeout = setTimeout(function(){$('#alert').fadeOut();},4000);
	});
}

var doLogin = function(){
	var user = $('#user').val();
	var password = $('#password').val();
	
	if(!user || !password){
		errMsg('Debes rellenar todos los datos.');
		return;
	}
	
	var a = user.indexOf('@');
	var b = user.indexOf('.',a);
	if(a == -1 || a == 0 || b == -1 || a+1 == b || b+1 == user.length){
		errMsg('El correo introducido es incorrecto.');
		return;
	}
	
	$("#background").fadeIn(1000);
	
	$.ajax({
		url: basedir+"/vdl-include/session_start.php",
		cache: false,
		type: "POST",
		data: {
			user: user,
			password: password,
			remember: $('#remember').prop('checked') ? 1 : 0
		},
		success: function(data){
			if(data == "1" || data == "true"){
				$("#background").fadeIn(500, function (){
					window.location= basedir+"/index.php";
				});
			} else {
				$("#background").fadeOut(500, function(){
					errMsg('Usuario o contrase&ntilde;a incorrectos.',"error");
				});
				
			}
		}
	});
}

var doInstall = function(){
	$.ajax({
		url: "install.php",
		cache: false,
		type: "POST",
		data: $('#installForm').serialize(),
		success: function(data){
			if(data == "1"){
				window.location.href += "../index.php?action=register";
			} else if(data.indexOf("emp") != -1){
				var sinRellenar =  "";
				var arraySinRellenar = deserialize(data.substring(1));
				
				$.each(arraySinRellenar, function(i){sinRellenar += "<br />" + arraySinRellenar[i]});
				errMsg("Los siguientes campos no han sido rellenados: " + sinRellenar, "error");
			} else {
				errMsg(data, "info");
			}
		}
	});
}
var deserialize = function (value) {
	var params = {}, pieces = value.split('&'), pair, i, l;
	for (i = 0, l = pieces.length; i < l; i++) {
		pair = pieces[i].split('=', 2);
		params[decodeURIComponent(pair[0])] = (pair.length == 2 ?
			decodeURIComponent(pair[1].replace(/\+/g, ' ')) : true);
	}
	return params;
};

//~ setInterval(function() {
    //~ $("#home-wall").load(location.href+" #home-wall");
//~ }, 50000);
	
var link = function(value){
	$('.main-menu li a').click(function(){
		$('.main-menu li').removeClass('active');
		$(this).parent().addClass('active');
	});
	if(value == "h"){
		window.history.replaceState(" ", "Home", basedir);
		document.title = "Home - Vidali";
	}
	if(value == "m"){
		window.history.replaceState(" ", "Mensajes", basedir+"/m/");
		document.title = "Mensajes - Vidali";
	}
	if(value == "g"){
		window.history.replaceState(" ", "Grupos", basedir+"/g/");
		document.title = "Grupos - Vidali";
	}
	if(value == "f"){
		window.history.replaceState(" ", "Archivos", basedir+"/f/");
		document.title = "Archivos - Vidali";
	}
	if(value == "s"){
		window.history.replaceState(" ", "Ajustes", basedir+"/s/");
		document.title = "Ajustes - Vidali";
	}
		$("#din").fadeOut(function(){ $("#din").load(location.href+" #din").fadeIn()});
		return false;
};

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

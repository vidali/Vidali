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
    var dir;
	
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
	if(basedir.length == 0)
        dir = "/vdl-include/session_start.php";
    else
        dir = basedir+"/vdl-include/session_start.php"; 
	
	$("#background").fadeIn(500);
	$.ajax({
		url: dir,
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

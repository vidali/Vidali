var msgTimeout;
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

var doLogin = function(){
	var user = $('#user').val();
	var password = $('#password').val();
	
	if(!user || !password){
		errMsg('All data must be filled','warning');
		return;
	}

	var a = user.indexOf('@');
	var b = user.indexOf('.',a);
	if(a == -1 || a == 0 || b == -1 || a+1 == b || b+1 == user.length){
		errMsg('Incorrect Email format');
		return;
	}

    dir = "/Vidali.server/vdl-include/session_start.php";
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
					console.log("loged");
					//window.location= basedir+"/h/";
				});
			} else {
				$("#background").fadeOut(500, function(){
					console.log("no loged");
					errMsg('Wrong user or password, please try again.',"error");
				});
			}
		}
	});
}

var doRegister = function(){
	var user = $('#r_nick').val();
	var password = $('#r_pass').val();
	var email = $('#r_email').val();
    var dir;

	if(!user || !password || !email){
		errMsg('You must fill all fields.');
		return;
	}

	var a = email.indexOf('@');
	var b = email.indexOf('.',a);
	if(a == -1 || a == 0 || b == -1 || a+1 == b || b+1 == email.length){
		errMsg('Wrong email.');
		return;
	}
	if(basedir.length == 0)
        dir = "/vdl-include/reg.php";
    else
        dir = basedir+"/vdl-include/reg.php";
	
	$("#background").fadeIn(500);
	$.ajax({
		url: dir,
		cache: true,
		type: "POST",
		data: {
			user: user,
			password: password,
			remember: $('#allow_ads').prop('checked') ? 1 : 0
		},
		success: function(data){
			if(data == "Done"){
				errMsg('Wellcome to Onvidali. Please log in.',"sucess");
			} else {
				$("#background").fadeOut(500, function(){
					errMsg('Register is unavailable at this moment, please try again later.',"error");
				});
				
			}
		}
	});
}
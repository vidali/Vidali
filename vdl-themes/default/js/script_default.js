	var msgTimeout;
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
		
		if($('#remember').attr('checked')){
			var remember = 1;
		}
		else{
			var remember = 0;
		}
		
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
			url: "vdl-include/session_start.php",
			cache: false,
			type: "POST",
			data: {
				user: user,
				password: password,
//				remember: $('#remember').attr('checked')
				remember: remember
			},
			success: function(data){
				if(data == "1" || data == "true"){
					$("#background").fadeIn(500, function (){
						window.location='index.php';
					});
				} else {
					$("#background").fadeOut(500, function(){
						errMsg('Usuario o contrase&ntilde;a incorrectos.',"error");
					});
					
				}
			}
		});
	}

$(function() {
  // Setup drop down menu
  $('.dropdown-toggle').dropdown();
 // Fix input element click problem
  $('.dropdown-menu input, .dropdown-menu label').click(function(e) {
    e.stopPropagation();
  });
  
});

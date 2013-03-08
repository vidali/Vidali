var msgTimeout;
var basedir;
var _GET = window.location.href.replace(basedir+'/', '').split('/');

var errMsg = function(msg, type){
	clearTimeout(msgTimeout);
	$("#alert").fadeOut("fast",function(){
		$("#alert span").html(msg);
		$("#alert").attr("class","alert " + (type ? "alert-"+type : "alert-message"));
		
		$("#alert").fadeIn("fast");
		msgTimeout = setTimeout(function(){$('#alert').fadeOut();},4000);
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
	
var link = function(value){
	$("#din").hide();
	$('.main-menu li a').click(function(){
		if (!$(this).hasClass("active")) {
			$('.main-menu li').removeClass('active');
			$(this).parent().addClass('active');
		}
	});
	if(value == "h"){
		window.history.replaceState(" ", "Home", basedir+"/h/");
		get_page('h');
		load_info();
		document.title = "Home - Vidali";
	}
	if(value == "m"){
		window.history.replaceState(" ", "Mensajes", basedir+"/m/");
		get_page('m');
		load_info();
		document.title = "Mensajes - Vidali";
	}
	if(value == "g"){
		window.history.replaceState(" ", "Grupos", basedir+"/g/");
		get_page('g');
		load_info();
		document.title = "Grupos - Vidali";
	}
	if(value == "f"){
		window.history.replaceState(" ", "Archivos", basedir+"/f/");
		get_page('f');
		load_info();
		document.title = "Archivos - Vidali";
	}
	if(value == "s"){
		window.history.replaceState(" ", "Ajustes", basedir+"/s/");
		get_page('s');
		load_info();
		document.title = "Ajustes - Vidali";
	}
	$("#din").fadeIn(1000);
	//$("#din").fadeOut(1000,function(){ $("#din").load(location.href+" #din").fadeIn(1500)});
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

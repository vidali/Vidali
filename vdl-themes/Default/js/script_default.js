var doInstall = function(){
	$.ajax({
		url: "install.php",
		cache: false,
		type: "POST",
		data: $('#installForm').serialize(),
		success: function(data){
			if(data == "1"){	<script type="text/javascript" src="vdl-themes/Default/js/main.js" ></script>
	<script type="text/javascript" src="vdl-themes/Default/js/script_default.js" ></script>

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

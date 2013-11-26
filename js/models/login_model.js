var msgTimeout;
var loginModel = Backbone.Model.extend({
    defaults: {
        Email: "",
        Password: "",
        Remember: false
    },
	url: baseurl+"/Vidali.server/api.php/login/",
	errorMsg: function(msg,type){
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
});

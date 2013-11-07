var loginModel = Backbone.Model.extend({
    defaults: {
        Username: "",
        Password: "",
        RememberMe: false,
        LoginFailed: false,
        LoginAccepted: false
    },
});

var loginList = Backbone.Collection.extend({
  url:"/Vidali.server/api.php/login/",

  parse: function (response) {
		return response.items;

	},
	initialize: function () {
		this.bind("reset", function (model, options) {
			console.log("Inside event");
			console.log(model);
			
		});
	}	
});
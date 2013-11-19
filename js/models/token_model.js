var tokenModel = Backbone.Model.extend(); //FIX THIS
var tokenList = Backbone.Collection.extend({
  url: baseurl+"/Vidali.server/api.php/tokens/",

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
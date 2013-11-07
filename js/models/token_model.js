var tokenModel = Backbone.Model.extend();

var tokenList = Backbone.Collection.extend({
  url:"/Vidali.server/api.php/tokens/",

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
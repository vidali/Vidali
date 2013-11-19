var mainView = Backbone.View.extend({
	model: new mainModel(),
    el: $("#container"),
    display: new mapView(),
	saveposition : function(position){
	  localStorage['latitude'] = position.coords.latitude;
	  localStorage['longitude'] = position.coords.longitude;
	},
	initialize: function () {
		navigator.geolocation.getCurrentPosition(this.saveposition);	
	},
	render: function () {
		template = _.template(main);
        this.$el.html(template);
    	this.display.render();
	    $('#background').fadeOut(500);
  	}
});

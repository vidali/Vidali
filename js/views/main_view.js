/**
* @fileoverview Main lib of view, load the content of the main page.
*
* @author StartDevs
* @version 1.0
*/
var mainView = Backbone.View.extend({
	/** 
    @lends mainView.prototype
    */
    /**
     * Saves the main model.
     * @memberof mainView
     * @instance
     * @type {object}
     */
	model: new mainModel(),
	/**
     * Define the HTML element asociated to the view.
     * @memberof modelView
     * @instance
     * @type {HTML}
     */
    el: $("#container"),
    /**
     * Saves the map model.
     * @memberof mainView
     * @instance
     * @type {object}
     */
    display: new mapView(),
    /**
    * @public
    * @function saveposition
    * @memberof mainView
    * @instance
    * @desc Save the user's location.
    */
	saveposition : function(position){
	  localStorage['latitude'] = position.coords.latitude;
	  localStorage['longitude'] = position.coords.longitude;
	},
	/**
    * @class 
    * @name mainView
    * @classdesc Load the elements on the screen.
    * @constructs
    * @desc nothing at the moment...
    */
	initialize: function () {
		navigator.geolocation.getCurrentPosition(this.saveposition);	
	},
	/**
    * @public
    * @function render
    * @memberof mainView
    * @instance
    * @desc Draw main template.
    */
	render: function () {
		template = _.template(main);
        this.$el.html(template);
    	this.display.render();
	    $('#background').fadeOut(500);
  	}
});

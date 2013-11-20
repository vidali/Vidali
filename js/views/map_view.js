/**
* @fileoverview Map lib, draw the map on the main page.
*
* @author StartDevs
* @version 1.0
*/
var mapView = Backbone.View.extend({
	/**
     * Define the HTML element asociated to the view.
     * @memberof mapView
     * @instance
     * @type {HTML}
     */
  el: $('#container'),
    /** 
    @lends mapView.prototype
    */
    /**
     * Saves a new object of open layers.
     * @memberof mapView
     * @instance
     * @type {object}
     */
  map: null,
    /** 
    @lends loginView.prototype
    */
    /**
     * Saves the map model.
     * @memberof mapView
     * @instance
     * @type {object}
     */
  model: new mapModel(),
    /**
	 * @class 
	 * @name mapView
	 * @classdesc Load the map on the screen.
	 * @constructs
	 * @desc nothing at the moment...
	 */
  initialize: function () {    
  },
  /**
    * @public
    * @function render
    * @memberof mapView
    * @instance
    * @desc Draw map template.
    */
  render: function () {
	var latitude = parseFloat(localStorage.getItem('latitude'));
	var longitude = parseFloat(localStorage.getItem('longitude'));
	if(this.model.get("map") == "default"){      
		this.map = new ol.Map({
			target: 'map',
			layers: [
			  new ol.layer.Tile({
				source: new ol.source.OSM()
			  })
			],
			renderers: ol.RendererHints.createFromQueryData(),
			view: new ol.View2D({
				center: ol.proj.transform([longitude,latitude], 'EPSG:4326', 'EPSG:3857'),
				zoom: 16
			})
		});
		var geolocation = new ol.Geolocation();
		geolocation.bindTo('projection', this.map.getView());
		geolocation.setTracking(true);
		var marker = new ol.Overlay({
		  element: document.getElementById('position'),
		  position: ol.proj.transform([longitude,latitude], 'EPSG:4326', 'EPSG:3857'),
		  positioning: ol.OverlayPositioning.CENTER_CENTER
		});
		this.map.addOverlay(marker);
		// bind the marker position to the device location.
		marker.bindTo('position', geolocation);
		return true;
	}
  }
});

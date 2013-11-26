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
  		marker.bindTo('position', geolocation);

/*this.map.on('singleclick', function(evt) {
  $(document.getElementById('position')).popover({
    'placement': 'top',
    'html': true,
    'content': 'Roll your own popup!'
  });
  $(document.getElementById('position')).popover('show');
});*/
var hide = false;
var user_info = jQuery.parseJSON(localStorage.getItem('user'));
var label = '<div style="width: 250px;">'+
              '<div class="row">'+
                '<div class="col-xs-4">'+
                  '<img src="/Vidali/img/jirafa.jpg" alt="..."  width=80 height=80 class="img-circle">'+
                '</div>'+
                '<div class="col-xs-8"><h4>'+
                  user_info.name+
                '</h4></div>'+
                '<div class="col-xs-5">'+
                  user_info.nick+
                '</div>'+
                '<div class="col-xs-3">'+
                  user_info.age+
                '</div>'+
                '<div class="col-xs-6">'+
                  user_info.description+
                '</div>'+
              '</div>'+ 
              '<div class="row">'+
                '<br><p align="center"><i>Quiero que lleguen las esperadas navidades XD!!</i></p>'+
              '</div>'+  
            '</div>'
            ;
$("#position").click(function() {
  if(hide == false){
    console.log("abre "+hide);
    $(document.getElementById('position')).popover({
      'placement': 'top',
      'html': true,
      'title': '<b>'+user_info.nick+'</b>',
      'content': label
    });
    
    console.log("aqui");
    console.log($(document.getElementById('position')).popover('show'));
    console.log("aqui2");
    hide = true;
  }
  else{
    console.log("cierra "+hide);
    
    console.log($(document.getElementById('position')).popover('hide'));

    hide = false;
  }
});


  		return true;
  	}
  }
});

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
  el: $('#map'),
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
	 * @desc Load data about what kind of map is required.
	 */
  initialize: function (data) {
    if(data.maptype == "")
      this.model.set({map : "default"});
    else
      this.model.set({map : data.maptype});
  },
  /**
    * @public
    * @function render
    * @memberof mapView
    * @instance
    * @desc Draw map template, checking what kind of map needs. It also load geolocation engine.
    */
  render: function () {
      var latitude = localStorage.getItem("latitude");
      var longitude = localStorage.getItem("longitude");

    var view = new ol.View2D({
      // the view's initial state
      center: [0,0],
      zoom: 4
    });

    var marker = new ol.Overlay({
      element: document.getElementById('position'),
      positioning: ol.OverlayPositioning.CENTER_CENTER
    });


  	if(this.model.get("map") == "default"){   

      console.log("carga default");   

      this.map = new ol.Map({
        layers: [
          new ol.layer.Tile({
            preload: 4,
            source: new ol.source.OSM()
          })
        ],
        renderers: ol.RendererHints.createFromQueryData(),
        target: 'map',
        view: view
      });

  		var geolocation = new ol.Geolocation();
  		geolocation.bindTo('projection', this.map.getView());
  		geolocation.setTracking(true);

  		this.map.addOverlay(marker);
  		marker.bindTo('position', geolocation);
      view.setCenter(ol.proj.transform([Number(longitude),Number(latitude)], 'EPSG:4326', 'EPSG:3857'));
      view.setZoom(16);

      geolocation.on('change', function() {
        if(geolocation.getPosition() != null){
          console.log("cambia");
          console.log(geolocation.getPosition()[0]);
        }
      });


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
                      '<br><p align="center"><i>Ejemplo de ultimo estado ;)</i></p>'+
                    '</div>'+  
                  '</div>'
                  ;
      $("#position").click(function() {
        if(hide == false){
          $(document.getElementById('position')).popover({
            'placement': 'top',
            'html': true,
            'title': '<b>'+user_info.nick+'</b>',
            'content': label
          });
          console.log($(document.getElementById('position')).popover('show'));
          hide = true;
        }
        else{
          console.log($(document.getElementById('position')).popover('hide'));
          hide = false;
        }
      });
  	}
    if(this.model.get("map") == "transport"){
      $("#container").append('<div id="position"><span class="glyphicon glyphicon-map-marker"></span></div>');
      console.log("carga transport");
      this.map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
              source: new ol.source.OSM({
              attributions: [
                new ol.Attribution({
                html: 'All maps &copy; ' +
                    '<a href="http://www.opencyclemap.org/">OpenCycleMap</a>'
                }),
                ol.source.OSM.DATA_ATTRIBUTION
            ],
            url: 'http://{a-c}.tile.opencyclemap.org/transport/{z}/{x}/{y}.png'
            })
          })
        ],
        renderers: ol.RendererHints.createFromQueryData(),
        view: view
      });
      console.log(this.map);
      var geolocation = new ol.Geolocation();
      geolocation.bindTo('projection', this.map.getView());
      geolocation.setTracking(true);

      this.map.addOverlay(marker);
      marker.bindTo('position', geolocation);
      view.setCenter(ol.proj.transform([Number(longitude),Number(latitude)], 'EPSG:4326', 'EPSG:3857'));
      view.setZoom(16);

      geolocation.on('change', function() {
        if(geolocation.getPosition() != null){
          console.log("cambia");
          console.log(geolocation.getPosition()[0]);
        }
      });


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
                      '<br><p align="center"><i>Ejemplo de ultimo estado ;)</i></p>'+
                    '</div>'+  
                  '</div>'
                  ;
      $("#position").click(function() {
        if(hide == false){
          $(document.getElementById('position')).popover({
            'placement': 'top',
            'html': true,
            'title': '<b>'+user_info.nick+'</b>',
            'content': label
          });
          console.log($(document.getElementById('position')).popover('show'));
          hide = true;
        }
        else{
          console.log($(document.getElementById('position')).popover('hide'));
          hide = false;
        }
      });
    }
  }
});

var mapView = Backbone.View.extend({
  el: $('#container'),
  map: null,
  model: new mapModel(),
  initialize: function () {    
  },
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
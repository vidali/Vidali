var mapView = Backbone.View.extend({
  el: $('#container'),
  map: null,
  model: new mapModel(),
  initialize: function () {
    console.log(this.model.get("map"))
    if(this.model.get("map") == "default")
      console.log("cargar default");
  },
  render: function () {

  }
});
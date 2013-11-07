var tokenView = Backbone.View.extend({
  initialize: function () {
    _.bindAll(this, 'render');
    this.collection = new tokenList();                   
    this.model.fetch();
    this.render();
  },
  render: function () {
    console.log('render: '+ this.collection);
  }
});

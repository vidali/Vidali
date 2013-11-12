var mainView = Backbone.View.extend({
  initialize: function () {
 
  },
  render: function () {
  	console.log("lol");
    $('#container').empty();
        $.when($('#container').load('main.html'))
               .done(function() {
                $('#background').fadeOut(500);
        });
  }
});

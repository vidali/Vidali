//Model that contains data about the user and the updates about his friends

var homeModel = Backbone.Model.extend({
    defaults: {
        user_card: null,
        updates: null
    },
    initialize: function()
});


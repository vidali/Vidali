var mainModel = Backbone.Model.extend({
	defaults: {
        display: new mapView(),
        user_active: null,
        page_active: 'home',
    },
	url:"/Vidali.server/api.php/main/",
});
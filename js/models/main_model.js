var mainModel = Backbone.Model.extend({
	defaults: {
        user_active: null,
        page_active: 'home',
    },
	url: baseurl+"/Vidali.server/api.php/main/",
});
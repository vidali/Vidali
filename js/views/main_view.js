/**
* @fileoverview Main lib of view, load the content of the main page.
*
* @author StartDevs
* @version 1.0
*/
var mainView = Backbone.View.extend({
	/** 
    @lends mainView.prototype
    */
    /**
     * Saves the main model.
     * @memberof mainView
     * @instance
     * @type {object}
     */
	model: new mainModel(),
	/**
     * Define the HTML element asociated to the view.
     * @memberof modelView
     * @instance
     * @type {HTML}
     */
    el: $("#container"),
     /**
     * Define the actions to start in specific cases.
     * @memberof loginView
     * @instance
     * @type {string}
     */
    events:{
        "click .m-home": "loadHome",
        "click .m-group": "loadGroup",
        "click .m-routes": "loadRoutes",
        "click .m-files": "loadFiles",
        "click .updater": "show_updater",
        "click .logout": "doLogout",
    },
    updaterStatus: "disabled",
    show_updater: function(){
        if(this.updaterStatus == "disabled"){
            $('#updater').fadeIn(100);
            this.updaterStatus = "enabled";
        }
        else{
            $('#updater').fadeOut(100); 
            this.updaterStatus = "disabled"; 
        }
    },
    loadHome: function(){
        console.log("carga home");
        $('#apps ul li').removeClass('active');
        $('#m-home').addClass('active');
        $("#map").empty();
        $("#submenu").empty();
        $("#submenu").append('<li class="active"><a href="#" data-toggle="tab">All updates</a></li>');
        $("#submenu").append('<li><a href="#" data-toggle="tab">My Updates</a></li>');            
        this.display = new mapView({maptype: "default"});
        this.display.render(); //position desaparece
    },
    loadGroup: function(){
        $('#apps ul li').removeClass('active');
        $("#submenu").empty();
        $("#submenu").append('<li class="active"><a href="#" data-toggle="tab">All Groups</a></li>');
        $("#submenu").append('<li><a href="#" data-toggle="tab">My groups</a></li>');
        console.log("entra");
        $('#m-group').addClass('active');
    },
    loadRoutes: function(){
        $('#apps ul li').removeClass('active');
        $("#submenu").empty();
        $("#submenu").append('<li class="active"><a href="#" data-toggle="tab">My routes</a></li>');
        $("#submenu").append('<li><a href="#" data-toggle="tab">Public transport</a></li>');
        $("#submenu").append('<li><a href="#" data-toggle="tab">Hangouts</a></li>');
        console.log("entra");
        $('#m-routes').addClass('active');
        $("#map").empty();
        this.display = new mapView({maptype: "transport"});
        this.display.render();
    },
    loadFiles: function(){
        $('#apps ul li').removeClass('active');
        $("#submenu").empty();
        $("#submenu").append('<li class="active"><a href="#" data-toggle="tab">Files</a></li>');
        $("#submenu").append('<li><a href="#" data-toggle="tab">Photos</a></li>');
        $("#submenu").append('<li><a href="#" data-toggle="tab">Videos</a></li>');
        $("#submenu").append('<li><a href="#" data-toggle="tab">Music</a></li>');
        console.log("entra");
        $('#m-files').addClass('active');
    },
    doLogout: function(){
        console.log("sale");
        localStorage.removeItem("latitude");
        localStorage.removeItem("longitude");
        localStorage.removeItem("session_auth");
        sessionStorage.removeItem("session_auth");
        location.reload();
    },
    /**
     * Saves the map model.
     * @memberof mainView
     * @instance
     * @type {object}
     */
    display: null,
    /**
    * @public
    * @function saveposition
    * @memberof mainView
    * @instance
    * @desc Save the user's location.
    */
	saveposition : function(position){
	  localStorage['latitude'] = position.coords.latitude;
	  localStorage['longitude'] = position.coords.longitude;
      console.log(localStorage['latitude']);
	},
	/**
    * @class 
    * @name mainView
    * @classdesc Load the elements on the screen.
    * @constructs
    * @desc nothing at the moment...
    */
	initialize: function () {
        navigator.geolocation.getCurrentPosition(this.saveposition);
        console.log(localStorage['latitude']);
        var user_act = new userModel(jQuery.parseJSON(localStorage.getItem('user')));
        this.model.set('user_active',user_act);
	},
	/**
    * @public
    * @function render
    * @memberof mainView
    * @instance
    * @desc Draw main template.
    */
	render: function () {
		template = _.template(main);
        this.$el.html(template);
    	//this.display.render();
        this.loadHome();
	    $('#background').fadeOut(500);
  	}
});

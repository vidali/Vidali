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
     * <p>Saves a mainModel object, which will store basic data of the user and server url to make queries.<p>
     * @memberof mainView
     * @instance
     * @type {object}
     */
	model: new mainModel(),
    /**
     * <p>Saves a mapView object, which will draw the map on the UI.<p>
     * @memberof mainView
     * @instance
     * @type {object}
     */
    display: null,
	/**
     * Set id=container div as main HTML atribute where will render the UI.
     * @memberof modelView
     * @instance
     * @type {HTML}
     */
    el: $('#container'),
    /**
     * <p>This attribute will control the satus of the Updater box. Disabled by default<p>
     * @memberof modelView
     * @instance
     * @type {String}
     */
    updaterStatus: "disabled",
     /**
     * <p>Set all listeners for actions in the main screen, it will change when the user make click on window's buttons.<p>
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
    /**
    * @class 
    * @name mainView
    * @classdesc Load the elements on the screen.
    * @constructs
    * @desc Gets geolocation's position, Load new user model which will save user active data.
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
    * @desc Draw main template and loads Home screen.
    */
    render: function () {
        template = _.template(main);
        this.$el.html(template);
        //this.display.render();
        this.loadHome();
        $('#background').fadeOut(500);
    },
    /**
    * @public
    * @function show_updater
    * @memberof mainView
    * @instance
    * @desc Show/hide updater box, activated by listener.
    */
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
    /**
    * @public
    * @function loadHome
    * @memberof mainView
    * @instance
    * @desc Clear map view, and load default map and submenu, set html atributes active for home screen.
    */
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
    /**
    * @public
    * @function loadGroup
    * @memberof mainView
    * @instance
    * @desc Clear map view, and load default map and submenu, set html atributes active for group screen.
    */
    loadGroup: function(){
        $('#apps ul li').removeClass('active');
        $("#submenu").empty();
        $("#submenu").append('<li class="active"><a href="#" data-toggle="tab">All Groups</a></li>');
        $("#submenu").append('<li><a href="#" data-toggle="tab">My groups</a></li>');
        console.log("entra");
        $('#m-group').addClass('active');
    },
    /**
    * @public
    * @function loadRoutes
    * @memberof mainView
    * @instance
    * @desc Clear map view, and load transport map and submenu, set html atributes active for routes screen.
    */
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
    /**
    * @public
    * @function loadFiles
    * @memberof mainView
    * @instance
    * @desc Clear map view, and load default list and submenu, set html atributes active for files screen.
    */
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
    /**
    * @public
    * @function doLogout
    * @memberof mainView
    * @instance
    * @desc Clear sessionStorage and localStorage, and reload all UI, in order to show login screen.
    */
    doLogout: function(){
        console.log("sale");
        localStorage.removeItem("latitude");
        localStorage.removeItem("longitude");
        localStorage.removeItem("session_auth");
        sessionStorage.removeItem("session_auth");
        location.reload();
    },
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
	}
});

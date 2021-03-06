/**
* @fileoverview Main lib of Vidali, start the engine and load all UI.
*
* @author StartDevs
* @version 1.0
*/
var Vidali = Backbone.View.extend({
 /** 
    @lends Vidali.prototype
*/
    /**
     * <p>Saves the active view of the app.</p>
     * <p>In order to load properly the UI, view will store a object of loginView or mainView, that will draw the screen.</p>
     * @memberof Vidali
     * @instance
     * @type {object}
     */
    view: null,
    /**
    * @class 
    * @name Vidali
    * @classdesc Main View of the app, it loads UI and check compatibilities and status of the app.
    * @constructs
    * @desc start the engine
    */
    initialize: function(){
    	//Detect compatibility browser
	    if(!this.isCompatible()){
    	    alert('Navegador no soportado');
    	    document.location.href='http://www.firefox.com';
    	}
    	//Check login status
		if(!this.isLoged()){
            this.view = new loginView();
            this.listenTo(this.view.model,'sync',this.change);
        }
        else{
            this.view = new mainView();
        }
        //draw the screen
        this.render();
    },
    /**
    * @public
    * @function render
    * @memberof Vidali
    * @instance
    * @desc Draws the view in the current screen. 
    */
    render: function(){
        this.view.render();
    },
    /**
    * @public
    * @function change
    * @memberof Vidali
    * @instance
    * @desc <p>Change function is triggered by a listener on the constructor.</p>
            <p>This function will load mainView object if session is started. </p>
    */
    change: function(){
        if(sessionStorage.getItem("session_auth")){
            this.view = new mainView();
            this.render();
        }
    },
    /**
    * @public
    * @function isCompatible
    * @memberof Vidali
    * @instance
    * @desc Check if navigator has HTML5 compatibility. 
    * @returns {boolean}
    */
    isCompatible : function(){
		return localStorage && navigator.geolocation;
    },
    /**
    * @public
    * @function isSaved
    * @memberof Vidali
    * @instance
    * @desc Check if session is saved for future auto-login. 
    * @returns {boolean}
    */
    isSaved: function(){
		return localStorage.getItem('session-id');
    },
    /**
    * @public
    * @function isLoged
    * @memberof Vidali
    * @instance
    * @desc Checks if is the user loged. 
    * @returns {boolean}
    */
    isLoged: function(){
        if(localStorage.getItem('session_auth'))
            sessionStorage.setItem('session_auth',localStorage.getItem('session_auth'));
        return sessionStorage.getItem('session_auth')? 1 : 0;
    },
});

/**
 * Global var, stores a object of Vidali class.
 * @type {object}
 */
var vdl;

$(document).ready(function(){
    $("#background").fadeIn(500);
	$.when(vdl = new Vidali())
           .done(function() {
                $('#background').fadeOut(500);
            });
    return false;
});
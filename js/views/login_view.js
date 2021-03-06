/**
* @fileoverview Login lib, allows draw login template and login to the app. It also allows to recover and register an account.
*
* @author StartDevs
* @version 1.0
*/
var loginView = Backbone.View.extend({
     /** 
    @lends loginView.prototype
    */
    /**
     * Saves the login model.
     * @memberof loginView
     * @instance
     * @type {object}
     */
    model: new loginModel(),
    /**
     * Define the HTML element asociated to the view.
     * @memberof loginView
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
        "click .forgot": "recoverPassword",
        "click .remember" : "setRemember",
        "click .login": "doLogin",
        "click .register": "doRegister",
        'keypress input[type=text]' : 'doLogin'
    },
    /**
    * @class 
    * @name loginView
    * @classdesc Login view of the app, it loads login template and make login actions.
    * @constructs
    * @desc nothing at the moment...
    */
    initialize: function(){
    },
    saveposition : function(position){
      localStorage['latitude'] = position.coords.latitude;
      localStorage['longitude'] = position.coords.longitude;
      console.log(localStorage['latitude']);
    },
    /**
    * @public
    * @function doLogin
    * @memberof loginView
    * @instance
    * @desc Start a new session.
    */
    doLogin: function(){
        navigator.geolocation.getCurrentPosition(this.saveposition);
        $("#background").fadeIn(500);
        this.model.set({Email: $('#email').val()});
        this.model.set({Password: $('#password').val()});
        if($('#remember').prop('checked'))
            this.model.set({Remember: true});
        var remember = this.model.get("Remember");
        this.model.fetch({
            data: {
                email: this.model.get("Email"),
                password: this.model.get("Password"),
                ip: user_ip
            },
            type: 'POST',
            success: (function(model){
                sessionStorage.setItem('session_auth',model.attributes.token);
                if(remember == true)
                    localStorage.setItem('session_auth',model.attributes.token);
                model.unset("Password");
                model.unset("Remember");
                model.unset("token");
                localStorage.setItem('vdl_utoken',model.attributes.token);
                console.log(model.attributes);
                localStorage.setItem('user',JSON.stringify(model.attributes));
            }),
            error: (function(model){
                model.set({LoginFailed : true});
                model.errorMsg('Wrong user or password, please try again.',"warning");
                $('#background').fadeOut(500);
            })
        });
    },
    /**
    * @public
    * @function doRegister
    * @memberof loginView
    * @instance
    * @desc Create a new user and save that register on the server.
    */
    doRegister:function(){
        console.log("register");
    },
    /**
    * @public
    * @function recoverPassword
    * @memberof loginView
    * @instance
    * @desc Recover a user account.
    */
    recoverPassword: function(){
    	console.log("recover");

    },
    /**
    * @public
    * @function render
    * @memberof loginView
    * @instance
    * @desc Draw login template.
    */
    render: function(){
        template = _.template(login);
        this.$el.html(template);
    }
});
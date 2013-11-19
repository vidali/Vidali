var loginView = Backbone.View.extend({
    model: new loginModel(),
    el: $("#container"),
	events:{
        "click .forgot": "recoverPassword",
        "click .remember" : "setRemember",
        "click .login": "doLogin",
        "click .register": "doRegister"
    },
    doLogin: function(){
        $("#background").fadeIn(500);
        this.model.set({Email: $('#email').val()});
        this.model.set({Password: $('#password').val()});
        if($('#remember').prop('checked'))
            this.model.set({Remember: true});
        var remember = this.model.get("Remember");
        this.model.fetch({
            data: {
                email: this.model.get("Email"),
                password: this.model.get("Password")
            },
            type: 'POST',
            success: (function(model){
                model.set({LoginAcepted : true});
                sessionStorage.setItem('session_auth',model.attributes.session_auth);
                if(remember == true)
                    localStorage.setItem('session_auth',model.attributes.session_auth);
            }),
            error: (function(model){
                model.set({LoginFailed : true});
                model.errorMsg('Wrong user or password, please try again.',"warning");
                $('#background').fadeOut(500);
            })
        });
    },
    doRegister:function(){
        console.log("register");
    },
    recoverPassword: function(){
    	console.log("recover");

    },
    render: function(){
        template = _.template(login);
        this.$el.html(template);
    },
    initialize: function(){
    }
});
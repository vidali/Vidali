var loginView = Backbone.View.extend({
    model: new loginModel(),
    el: $("#container"),
	events:{
        "click .forgot": "recoverPassword", //no avanza de aqui
        "click .remember" : "setRemember",
        "click .login": "doLogin"
    },
    doLogin: function(){
        event.preventDefault();
    	console.log("login");
        $("#background").fadeIn(500);
        var formValues = {
            email: $('#inputEmail').val(),
            password: $('#inputPassword').val()
        };
/*        user = $('#user').val();
        password = $('#password').val();        
        if(!user || !password){
            errMsg('All data must be filled','warning');
            return;
        }
        getData(
            function(result){
                if(result == 'true' || result == '1'){
                    $("#background").fadeIn(500, function (){
                        sessionStorage.setItem('nick',user);
                        if($('#remember').prop('checked'))
                            localStorage.setItem('nick',user);
                        loadScreen('home');
                        $("#background").fadeOut(500);
                        return true;
                    });
                }
                else{
                    $("#background").fadeOut(500, function(){
                        errMsg('Wrong user or password, please try again.',"warning");
                    });
                }
            },
            'login',
            '',
            user,
            password,
            $('#remember').prop('checked') ? 1 : 0
        );*/
    },
    recoverPassword: function(){
    	console.log("recover");
    },
    setRemember: function(){
    	console.log("remember");
    },
    render: function(){
        $('#container').empty();
        $.when($('#container').load('login.html'))
               .done(function() {
                $('#background').fadeOut(500);
        });
    },
    initialize: function(){
    }
});
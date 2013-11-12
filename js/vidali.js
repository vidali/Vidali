// The main view of the application
var Vidali = Backbone.View.extend({
    view: null,
	load_map: function(){
		var latitude = parseFloat(localStorage.getItem('latitude'));
		var longitude = parseFloat(localStorage.getItem('longitude'));
		setTimeout( function (){
			this.map = new ol.Map({
		        target: 'map',
		        layers: [
				    new ol.layer.Tile({
		      		source: new ol.source.OSM()
			    	})
			  	],
		        renderers: ol.RendererHints.createFromQueryData(),
		        view: new ol.View2D({
		            center: ol.proj.transform([longitude,latitude], 'EPSG:4326', 'EPSG:3857'),
		            zoom: 16
		        }),
  			})
		},
		500);
	},
    // Base the view on an existing element
    el: $('#container'),
    render: function(){
        this.view.render();
    },
    initialize: function(){
    	//Detect compatibility browser
	    if(!this.isCompatible()){
    	    alert('Navegador no soportado');
    	    document.location.href='http://www.firefox.com';
    	}

    	//Check API Token status
    	var user_token = new tokenModel({id: 'vidaliapp'});
    	var tokens = new tokenList();
    	tokens.add(user_token);
    	user_token.fetch({                     // se genera GET /usuarios/1
		    success:function(){
		    	localStorage.setItem('vdl_utoken',user_token.attributes.vdl_utoken);
			}		
		});
    	//Check login status
		if(!this.isLoged()){
            this.view = new loginView();
            this.listenTo(this.view.model,'sync',this.change);
        }
        else{
            this.view = new mainView();
        }
        this.render();
    },
    change: function(){
        console.log("entra");
        if(sessionStorage.getItem("session_auth")){
            this.view = new mainView();
            this.render();
        }
    },
	saveposition : function(position){
	  localStorage['latitude'] = position.coords.latitude;
	  localStorage['longitude'] = position.coords.longitude;
	},
    isCompatible : function(){
		return localStorage && navigator.geolocation;
    },
    isSaved: function(){
		return localStorage.getItem('session-id');
    },

    isLoged: function(){
        if(localStorage.getItem('session_auth'))
            sessionStorage.setItem('session_auth',localStorage.getItem('session_auth'));
        return sessionStorage.getItem('session_auth')? 1 : 0;
    },
});

var vdl;

$(document).ready(function(){
    $("#background").fadeIn(500);
	vdl = new Vidali();
    $('#background').fadeOut(100);
    return false;
});
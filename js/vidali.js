// Create a model for the services
var vidaliModel = Backbone.Model.extend({
    defaults:{
        view: null,
        map: null,
    },
});

// The main view of the application
var Vidali = Backbone.View.extend({
    model: new vidaliModel(),
	load_map: function(){
		var latitude = parseFloat(localStorage.getItem('latitude'));
		var longitude = parseFloat(localStorage.getItem('longitude'));
		setTimeout( function (){
			vdl.map = new ol.Map({
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
        this.model.get("view").render();
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
            var viewObj = new loginView();
            this.model.set({"view" : viewObj});
        }
        else{
            var viewObj = new mainView();
            this.model.set({"view" : viewObj});
        }
        this.render();
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
        if(localStorage.getItem('nick'))
            sessionStorage.setItem('nick',localStorage.getItem('nick'));
        return sessionStorage.getItem('nick')? 1 : 0;
    },
    drawPage: function(page){
        $('#container').empty();
        $('#container').load(page+'.html');
        console.log('loaded '+page);
    },
    loadScreen: function(page){
        console.log('loadingScreen '+page);
        if(page == 'login')
            this.drawPage(page);
        else{
            this.drawPage('main');
            navigator.geolocation.getCurrentPosition(this.saveposition);
            this.load_map();
        }
    }  
});

var vdl;

$(document).ready(function(){
    $("#background").fadeIn(500);
	vdl = new Vidali();
    $('#background').fadeOut(100);
    return false;
});
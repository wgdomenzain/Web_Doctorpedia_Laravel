
var markermap;
var searchMap;
var markers = [];
var contMarker = 0;
var myPos;

function get_myPos(){
   if($('#search_map').length > 0){
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = new google.maps.LatLng(position.coords.latitude,
                                               position.coords.longitude);
                myPos = pos;
                searchMap.setZoom(13);
                searchMap.setCenter(myPos);
            }, function() {
                handleNoGeolocation(true);
            });
        } else {
        // Browser doesn't support Geolocation
            handleNoGeolocation(false);
        }
   }
}

function get_location(id){
    console.log('click');
    var pinColor = "4A8AF6";
    var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
    new google.maps.Size(21, 34),
    new google.maps.Point(0,0),
    new google.maps.Point(10, 34));

    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = new google.maps.LatLng(position.coords.latitude,
                                           position.coords.longitude);
            pos;
            //console.log(pos);
            //var latlng = new google.maps.LatLng(pos);
            var latlng = new google.maps.LatLng(pos.k, pos.D);
             $('#mapa_latitud').val(pos.k);
            $('#mapa_longitud').val(pos.D);
            var settings = {
                zoom: 15,
                center: latlng,
                mapTypeControl: true,
                mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                navigationControl: true,
                navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
           
            var map = new google.maps.Map(document.getElementById(id), settings);
             markermap = new google.maps.Marker({
                position: latlng,
                map: map,
                draggable:true,
                animation: google.maps.Animation.DROP,
                icon: pinImage,
                title: "Consultorio",
                disableDefaultUI: true
            });
            drag_listener(markermap);
            mapa_listener(map);
        }, function() {
            handleNoGeolocation(true);
        });
    } else {
    // Browser doesn't support Geolocation

        handleNoGeolocation(false);
    }
}

function click_doctor_center(){
     $('#doctor-map').click(function(){
        // console.log('click bloque');
        var block = $(this);
        // console.log(block.find('.block-lat').val());
        // console.log(block.find('.block-lng').val());
        var latlng = new google.maps.LatLng(block.find('#block-lat').val(), block.find('#block-lng').val());
        searchMap.setZoom(15);
        searchMap.setCenter(latlng);
    });
}

function search_map(id){
    
    if($('#'+id).length > 0){   
        
        var latlng = new google.maps.LatLng(22.621263, -102.462017);
        var settings = {
            zoom: 5,
            center: latlng,
            mapTypeControl: true,
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
            navigationControl: true,
            navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            
        };
        searchMap = new google.maps.Map(document.getElementById(id), settings);

        // $(document).ajaxStop(function () {
        //     $.each(search_data['doctors'], function(index, value){
        //         // console.log('algo');
        //         // ubicacion_mapa(value, searchMap);
                
        //     });
        // });
    }
}

function clear_Map(){
     //Loop through all the markers and remove
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        markers = [];
        // searchMap.setZoom(8);
        // searchMap.setCenter(new google.maps.LatLng(22.621263, -102.462017));
}

function ubicacion_mapa(value, map){
    var pinColor = "4A8AF6";
    var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
    new google.maps.Size(21, 34),
    new google.maps.Point(0,0),
    new google.maps.Point(10, 34));
    var index = value.id;
    var latitud = value.lat;
    var longitud = value.lng;
    var latlng = new google.maps.LatLng(latitud, longitud);
    
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        draggable:false,
        animation: google.maps.Animation.DROP,
        icon: pinImage,
        title: "Consultorio"
    });

    var infowindow = new google.maps.InfoWindow({
          content: '<div class="align-left color-black">'+value.speciality+'</div>'+
                   '<div class="align-left color-black bold">'+'Dr. '+value.name+' '+value.surname1+' '+value.surname2+'</div>'+
                   '<div class="align-left phone-list color-black">Tel: '+value.phone+'</div>'+
                   '<div class="align-left location-list color-black">'+value.address1+'</div>'
    });

    google.maps.event.addListener(marker, 'click', function() {
        map.setZoom(15);
        map.setCenter(marker.getPosition());
        toggle_detail(index);
        // infowindow.open(map,marker);
    });

    // google.maps.event.addListener(marker, 'mouseover', function() {
    //     infowindow.open(map,marker);
    // });

    // google.maps.event.addListener(marker, 'mouseout', function() {
    //     infowindow.close();
    // });

    markers.push(marker);
}

function mapa (id){

    if($('#'+id).length > 0){   
          
        var latlng = new google.maps.LatLng(22.621263, -102.462017);
        var settings = {
            zoom: 10,
            center: latlng,
            mapTypeControl: true,
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
            navigationControl: true,
            navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            
        };
        var map = new google.maps.Map(document.getElementById(id), settings);
        mapa_listener(map);

        $('.form-button-home').click(function(){
            //console.log('click');
             google.maps.event.trigger(map, "resize");
        }); 
    }
}

function mapa_listener(map){
    var pinColor = "4A8AF6";
    var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
    new google.maps.Size(21, 34),
    new google.maps.Point(0,0),
    new google.maps.Point(10, 34));

     google.maps.event.addListener(map, "click", function(event) {
          
        if(markermap){
            markermap.setMap(null);
            markermap = null;
        }else{      
            markermap = new google.maps.Marker({
                position: event.latLng,
                map: map,
                draggable:true,
                animation: google.maps.Animation.DROP,
                icon: pinImage,
                title: "Consultorio"
            });
            $('#mapa_latitud').val(event.latLng.k);
            $('#mapa_longitud').val(event.latLng.D);
            console.log(event.latLng);
            console.log(event.latLng.k);
            console.log(event.latLng.D);
            drag_listener(markermap);
        }
    });
}

function drag_listener(marker){
    google.maps.event.addListener(marker,'dragend',function(event){
        $('#mapa_latitud').val(event.latLng.k);
        $('#mapa_longitud').val(event.latLng.D);
    });
}

function profile_map(id){
    if($('#'+id).length > 0){   
          
        var latlng = new google.maps.LatLng($('#mapa_latitud').val(),$('#mapa_longitud').val());
        var settings = {
            zoom: 14,
            center: latlng,
            mapTypeControl: true,
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
            navigationControl: true,
            navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            
        };
        var map = new google.maps.Map(document.getElementById(id), settings);

        var pinColor = "4A8AF6";
        var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
        new google.maps.Size(21, 34),
        new google.maps.Point(0,0),
        new google.maps.Point(10, 34));

        marker = new google.maps.Marker({
            position: latlng,
            map: map,
            draggable:false,
            animation: google.maps.Animation.DROP,
            icon: pinImage,
            title: "Consultorio"
        });

        $('#edit-profile').click(function(){
            console.log('click editar');
            marker.setDraggable(true);
            drag_listener(marker);
        });
    }
}

//Al cargar la pagina 
$(function(){
    $('#map-button-home').click(function(){
        get_location('map-home');
    });
    $('#click_mapa').click(function(){
        mapa('map-home');
    });


    // mapa('profile-map');
    profile_map('profile-map');
    search_map('search_map');
    get_myPos();
});
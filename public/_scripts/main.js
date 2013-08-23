var _mymap;
var _mymapLocation = new google.maps.LatLng(51.0500, 3.7333);
var _myGeoMarkerImage;

$(document).on('pageshow', function(){
    // Hide register button while logged in.
    if($('.logged-in').length != 0){
        $('.login-register-btn').hide();
    } else
    {$('.login-register-btn').show();}
    
    // Keep AJAX effect when page contains errors
    if(!$('#reg-form .errors')[0]){
        $('#reg-form').attr('data-ajax', 'false');
    }
    else{
        $('#reg-form').attr('data-ajax', 'true');
    }
    
    $('#map-controls ul li a').on("click", function(e){
        e.preventDefault();
        $(this).removeClass('btn-default')
               .addClass('btn-primary')
               .css('color', '#FFF')
               .parent().siblings().children()
               .removeClass('btn-primary')
               .addClass('btn-default')
               .css('color', '#2489ce');
    });
    
    // Custom CSS
    $('#profile-content input[readonly="readonly"]').parent().parent().prev().css('color', '#666');
    
});

// SOMETIMES LOAD MAP TWICE(!) TO PREVENT BREAKING WITH JQUERY MOBILE / ZEND
// LOAD MAP AFTER PAGE SHOW
$(document).on("pageshow", function(){
    if ($('#map-canvas').length) {
        // REFRESH MAP TO PREVENT GREY AREA AND/OR DEFAULT LOCATION
        $('#map-canvas').gmap('refresh');
        initialize();
    }
});

// LOAD MAP AFTER POSTBACK/REFRESH, BUT ONLY WHEN CONTAINER EXISTS
$(document).ready(function(){
    if ($('#map-canvas').length) {
        initialize();
    }
});

//==================================FUNCTIONS=================================//
//============================================================================//

// INITIALISE GOOGLE MAPS
function initialize(){
    // SETUP CUSTOM MARKER
    _myGeoMarkerImage = new google.maps.MarkerImage('/DataSpotGhent/public/images/my-google-marker.png', new google.maps.Size(64, 64));
    
    // MAP OPTIONS
    var mapOptions = {
        zoom: 14,
        center: _mymapLocation,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    // CREATE GOOGLE MAP
    _mymap = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  
    // GET MY GEOLOCATION
    google.maps.event.addListenerOnce(_mymap, 'idle', function(){
        getGeoLocation();
    });
};

// GET GEOLOCATION WITH HTML5
function getGeoLocation(){
    if (navigator.geolocation) {
        // GET CURRENT POSITION
        navigator.geolocation.getCurrentPosition(function (position){
            var position = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            
            // CREATE MARKER
            var geoMarker = new google.maps.Marker({
                map: _mymap,
                position: position,
                title: "Uw locatie",
                icon: _myGeoMarkerImage,
                animation: google.maps.Animation.DROP
            });
            
            // CREATE INFO WINDOW
            var infoWindow = new google.maps.InfoWindow({
                content: "<p class='infowindow-text'>Uw locatie werd gevonden met HTML5.</p>"
            });
            
            // OPEN INFOWINDOW ON MARKER CLICK
            google.maps.event.addListener(geoMarker, 'click', function(){
                infoWindow.open(_mymap, geoMarker);
            });
        }, function(){handleNoGeoLocation(true);});
    } else {
        // THE BROWSER DOES NOT SUPPORT THE HTML5 GEOLOCATION FEATURE
        handleNoGeoLocation(false);
    }
};

// HANDLE NO GEOLOCATION SUPPORT
function handleNoGeoLocation(error){
    if (error) {
        var content = 'ERROR: Geolocatie kon niet geladen worden.';
    } else {
        var content = 'ERROR: Uw browser ondersteunt geen Geolocatie.'
    }
    
    // CREATE NEW INFO WINDOW AND CENTER ON GHENT
    var mapOptions = {
        map: _mymap,
        position: _mymapLocation,
        content: content
    };
    
    console.log(_mymapLocation);
    
    var infoWindow = new google.maps.InfoWindow(mapOptions);
    _mymap.setCenter(mapOptions.position);
}
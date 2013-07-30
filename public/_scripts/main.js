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
    
    // Custom CSS
    $('#profile-content input[readonly="readonly"]').parent().parent().prev().css('color', '#666');
    
    //if((window.location).toString().indexOf("public/index/index") >= 0 || location == "/DataSpotGhent/public/" || location == "/DataSpotGhent/public/index")
    //{
    //}
    
    // REFRESH MAP ON PAGE SHOW BECAUSE SOMETIMES IT DOESN'T LOAD COMPLETELY AFTER POSTBACK
    // COMMON JQUERY MOBILE BUG
    $('#map-canvas').gmap('refresh');
});

// SOMETIMES LOAD MAP TWICE(!) TO PREVENT BREAKING WITH JQUERY MOBILE / ZEND
// LOAD MAP AFTER PAGE INIT
$(document).on("pageinit", function(){
    initialize();
});

// LOAD MAP AFTER POSTBACK/REFRESH
$(document).ready(function(){
    initialize();
});

//==================================FUNCTIONS=================================//
//============================================================================//

// INITIALISE GOOGLE MAPS FUNCTION
function initialize(){
    // Coordinates to center the map
    var myLatlng = new google.maps.LatLng(51.04857, 3.726425);
 
    // Map options
    var mapOptions = {
        zoom: 14,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
 
    $('#map-canvas').gmap(mapOptions); 
};
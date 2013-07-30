// Document.ready is only executed once, due to AJAX navigation
// Redirect people to index page when entering website by any url other than the index page
// Also redirect to index page on refresh to prevent breaking of jQuery Mobile AJAX

$(document).ready(function(){
    if (!$('.login-form .errors')[0]){
        if(!$('#reg-form .errors')[0]){
            if(!$("#map-canvas")[0]){
                var url = "/DataSpotGhent/public/";
                window.location = url;
            }
        }
    }
});

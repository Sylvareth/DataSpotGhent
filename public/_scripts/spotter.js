var _baseUrl = "/DataSpotGhent/public/";
var _data = {};
var _coordinates = [];
var _locations = [];

$(document).ready(function(){
    //localStorage.clear();
    
    // Load datasets
    loadDatasets();
    getCoordinates();
});

function loadDatasets()
{
    // Check conditions with flag variable
    var flag = false;
    
    // Check if browser has localstorage support
    if (Modernizr.localstorage) 
    {
        flag = getData();
    } else {
        console.log("This browser does not support localStorage");
    }
    
    if (!flag)
    {
        $.getJSON(_baseUrl + 'dataset/parkings', {}, function(data, status, jqXHR)
        {
            saveData(data);
        });
    }
}

function getData()
{
    //Check if there are parkings in localstorage
    if(localStorage.getItem("dataspotghent.parkings") !== null){
        console.log("There are Parkings!");
        
        // Take the JSON string and return Javascript Object
        _data = $.parseJSON(localStorage["dataspotghent.parkings"]);

        return true;
    } else {
        return false;
    }
}

function saveData(data)
{
    // If localstorage is supported, convert string to JSON and save data to localstorage.
    if (Modernizr.localstorage) 
    {
        console.log("Data Saved!");
        localStorage["dataspotghent.parkings"] = JSON.stringify(data);
    }
}

function getCoordinates()
{
    for(var key in _data)
    {
        mark = {};
    
        if(_data.hasOwnProperty(key)){
            mark["lng"] = _data[key].long;
            mark["lat"] = _data[key].lat;
        }
        
        _coordinates.push(mark);
        
    }   
    
}

function locateParkings()
{
    for (i = 0; i < _coordinates.length; i++) {
        var row = _coordinates[i];
        
        console.log(row);
        var longitude = row["lng"];
        var latitude = row["lat"];
        
        _locations[i] = new google.maps.LatLng(latitude, longitude);
    }
    
    setMarkers(_mymap, _locations);
}

function setMarkers(_mymap, _locations)
{
    console.log(_locations);
    
    for (i = 0; i < _locations.length; i++) {
        var markerLatLng = _locations[i];
        
        var marker = new google.maps.Marker({
            position: markerLatLng,
            map: _mymap
        });
    }
}
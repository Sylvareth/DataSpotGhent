var _baseUrl = "/DataSpotGhent/public/";
var _data = {};
var _coordinates = [];
var _locations = [];
var _datasetToLoad;
var markersArray = [];

function locate(str)
{
    // Clear Localstorage
    // localStorage.clear();
    
    // Reset global variables
    _data.length = 0;
    _coordinates.length = 0;
    _locations.length = 0;
    
    // Remove all markers
    clearOverlays();
    
    // Detect which button was clicked
    _datasetToLoad = str;
    
    loadDatasets();
}

function loadDatasets()
{
    // Check conditions with flag variable
    var flag = false;
    
    // Check if browser has localstorage support
    if (Modernizr.localstorage)
    {
        flag = getData();
    
        if (!flag)
        {   
            // Cache JSON file in localstorage on first click.
            // Every subsequent click gets the data right from the storage 
            // (the save function won't be called then)
            $.getJSON(_baseUrl + 'dataset/' + _datasetToLoad, {}, function(data)
            {
                saveData(data);
                console.log(_datasetToLoad + " Saved!");
            });
        }
    }
}

function getData()
{
    if(localStorage.getItem("dataspotghent." + _datasetToLoad) !== null)
    {                
        // Take the JSON string and return Javascript Object
        _data = $.parseJSON(localStorage["dataspotghent." + _datasetToLoad]);
        getCoordinates();
        getLocations();

        return true;
    } else 
    {
        return false;
    }
}

function saveData(data)
{    
    // console.log(data);
    localStorage["dataspotghent." + _datasetToLoad] = JSON.stringify(data);
    
    getData();
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

function getLocations()
{
    for (i = 0; i < _coordinates.length; i++) {
        var row = _coordinates[i];
        
        // console.log(row);
        var longitude = row["lng"];
        var latitude = row["lat"];
        
        _locations[i] = new google.maps.LatLng(latitude, longitude);
    }
    
    setMarkers(_mymap, _locations);
}

function setMarkers(_mymap, _locations)
{
    // console.log(_locations);
    
    for (i = 0; i < _locations.length; i++) {
        var markerLatLng = _locations[i];
        
        var marker = new google.maps.Marker({
            position: markerLatLng,
            map: _mymap
        });
        markersArray.push(marker);
    }
}

function clearOverlays() {
  for (var i = 0; i < markersArray.length; i++ ) {
    markersArray[i].setMap(null);
  }
  markersArray = [];
}
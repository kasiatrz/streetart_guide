var gmarkers1 = [];
var markers1 = [];
var infowindow = new google.maps.InfoWindow({
  content: ''
});


// Our markers
markers1 = [
    //STIK
    ['0', '<div class="google_map">'+'<img src="assets/works/thumbnail_gregor"/>'+"<p>New Castle Street</p>"+'</div>', 44.741318, 20.433573,  'stik', 'assets/google_map/stik.png'],
    ['0', 'Stik, Luna Street', 42.741318, 20.433578,  'stik', 'assets/google_map/stik.png'],
    //ROA
    ['1', 'Title', 45.823783, 16.024404,  'roa', 'assets/google_map/roa.png'],
    //JIMMY C
    ['2', 'Title', 44.438350, 17.631215, 'jimmy_c', 'assets/google_map/jimmy_c.png']
];

/**
 * Function to init map
 */

function initialize() {
  var center = new google.maps.LatLng(45.662477, 18.022074);
  var mapOptions = {
    zoom: 5,
    center: new google.maps.LatLng(45.662477, 18.022074),
    mapTypeId: 'roadmap',
  };

  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  for (i = 0; i < markers1.length; i++) {
    addMarker(markers1[i]);
  }
}

/**
 * Function to add marker to map
 */

function addMarker(marker) {
  var tip = marker[4];
  var title = marker[1];
  var pos = new google.maps.LatLng(marker[2], marker[3]);
  var content = marker[1];
    var icon = marker[5];


  marker1 = new google.maps.Marker({
        title: title,
        position: pos,
        tip: tip,
        map: map,
        icon: icon

  });

    
    
    
  gmarkers1.push(marker1);

  // Marker click listener
  google.maps.event.addListener(marker1, 'click', (function(marker1, content) {
    return function() {
      console.log('Gmarker 1 gets pushed');
      infowindow.setContent(content);
      infowindow.open(map, marker1);
     // map.panTo(this.getPosition());  --center position when sected marker
      
    }
  })(marker1, content));
}

/**
 * Function to filter markers by category
 */

filterMarkers = function(category) {
  for (i = 0; i < markers1.length; i++) {
    marker = gmarkers1[i];
    // If is same category or category not picked
    if (marker.category == category || category.length === 0) {
      marker.setVisible(true);
    }
    // Categories don't match
    else {
      marker.setVisible(false);
    }
  }

}
var get_set_options = function() {
  ret_array = []
  for (option in filters) {
    if (filters[option]) {
      ret_array.push(option)
    }
  }
  return ret_array;
}

var filter_markers = function() {
  set_filters = get_set_options()

  // for each marker, check to see if all required options are set
  for (i = 0; i < markers.length; i++) {
    marker = markers[i];

    // start the filter check assuming the marker will be displayed
    // if any of the required features are missing, set 'keep' to false
    // to discard this marker
    keep = true
    for (opt = 0; opt < set_filters.length; opt++) {
      if (!marker.properties[set_filters[opt]]) {
        keep = false;
      }
    }
    marker.setVisible(keep)
  }
}


// Fuction for checkboxes
var tipovi = document.getElementsByClassName('chk-btn').value;

var selectAllChecked = function() {
  var checkedPlace = [] 
  var allCheckedElem = document.getElementsByName('filter');
  for (var i = 0; i < allCheckedElem.length; i++) {
    if (allCheckedElem[i].checked == true) {
      checkedPlace.push(allCheckedElem[i].value)//creating array of checked items
    }
  }
  filterChecker(checkedPlace) //passing to function for updating markers
}

var filterChecker = function(tip) {
  //console.log(tip);
  for (i = 0; i < markers1.length; i++) {
    marker = gmarkers1[i];
    //console.log(marker);
    if (in_array(this.marker.tip, tip) != -1) {
      marker.setVisible(true);
    } else {
      marker.setVisible(false);
    }
  }
}
// Init map
initialize();

function in_array(needle, haystack) {
  var found = 0;
  for (var i = 0, len = haystack.length; i < len; i++) {
    if (haystack[i] == needle) return i;
    found++;
  }
  return -1;
}
   
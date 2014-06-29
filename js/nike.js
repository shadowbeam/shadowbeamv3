

/**
* Control running
*/
var runningsection = new function() {

  var gps;
  var section = $('#section-running');
  var map = document.getElementById("map");

  var init = function(){

    var latlong = gps.coordinate.split(',');

    var mapOptions = {
      center: new google.maps.LatLng(latlong[0], latlong[1]),
      zoom: 14,
      zoomControl: false,
    };

    var map = new google.maps.Map(document.getElementById("map"), mapOptions);

    var runPathCoords = [];

    $.each(gps.waypoints, function(index, point) {
      runPathCoords.push(new google.maps.LatLng(point.lat, point.lon));
    }); 


    var runPath = new google.maps.Polyline({
      path: runPathCoords,
      geodesic: true,
      strokeColor: '#11ABC5',
      strokeOpacity: 1.0,
      strokeWeight: 3
    });

    runPath.setMap(map);

  }


  var fetchGPS = function(){

    var jqxhr = $.getJSON('php/running.php', function(data) {
      gps = data;
    })
    .done(function() {
      console.log( "second success" );
    })
    .fail(function() {
      console.log( "error" );
    })
    .always(function() {
      console.log( "complete" );
      init();
      fetchDetails();

    });
  }

  var fetchDetails = function(){
    section.find('#date').html(gps.date);
    section.find('#run-details .avg-pace').html(gps.avgPace);
    section.find('#run-details .distance').html(gps.distance.toFixed(2));
    section.find('#run-details .duration').html(gps.duration);
  }


  fetchGPS();
  $(map).height(500);


};


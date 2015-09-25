var GoogleMap = React.createClass({

  getInitialState: function() {
    return {
      readyToPaint :false,
      finishedPainting :false,
    };
  },

  componentDidMount: function() {

  },

  componentDidUpdate: function(){

    if(!this.isEmpty(this.props.gpsData) && googleMapsReady){
      this.state.readyToPaint = true;
      this.paintMap();
      this.state.finishedPainting = true;
    }
  },

  paintMap: function(){
    if(this.state.finishedPainting){
      return;
    }
    var latlong = this.props.gpsData.coordinate.split(',');

    var mapOptions = {
      center: new google.maps.LatLng(latlong[0], latlong[1]),
      zoom: 14,
      streetViewControl: false,
      scrollwheel: false

    };

    var runPathCoords = [];


    this.props.gpsData.waypoints.forEach(function(item, i){
      runPathCoords.push(new google.maps.LatLng(item.lat, item.lon));
    });


    var runPath = new google.maps.Polyline({
      path: runPathCoords,
      geodesic: true,
      strokeColor: '#11ABC5',
      strokeOpacity: 1.0,
      strokeWeight: 3
    });

    var map = new google.maps.Map(document.getElementById('running__map'), mapOptions);

    runPath.setMap(map);




  },

  isEmpty: function(obj){
    if(obj == null || obj == undefined){
      return true;
    }else{
      return Object.keys(obj).length == 0;
    }
  },



  render: function() {
    var mapStyle = {width:'100%', height:'100%'};
    return(
      <div id="running__map" class='running__map' style={mapStyle}></div>
      );
  }


});

var googleMapsReady = false, 
global = [];

global['mapLoaded'] = function mapLoaded() {

  googleMapsReady = true;
};


var NikeRunningMap = React.createClass({

  getInitialState: function() {
    return {
      gpsData: {},
      mapReady : googleMapsReady,
      hello: "not talking"
    };
  },

  fetchGPS: function(){
   var request = new XMLHttpRequest();
   request.open('GET', 'themes/watson/php/running.php', true);

   request.onload = function(){

    console.log("gps data returned" + request.status);
    if (request.status >= 200 && request.status < 400) {
      console.log("success");

      this.setState({gpsData: JSON.parse(request.responseText)});

    } else {
          // We reached our target server, but it returned an error
          console.log("error");
        }
      }.bind(this),

      request.onerror = function() {
      };

      request.send();
    },

    componentDidMount: function() {
     var script = document.createElement('script');
     script.type = 'text/javascript';
     script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBBW7JQh1bIBEgmF1a7vaa4F8VXIAYvdto&sensor=true&callback=global.mapLoaded';
     document.body.appendChild(script);
     this.fetchGPS();
   },

   render: function() {

    return (
      <div className='running__map-container'>
      <GoogleMap gpsData={this.state.gpsData}/>
      </div>
      );
  }
});


React.render(
  <div>
  <SectionHeader title="Running"/>
  <NikeRunningMap/></div>,
  document.getElementById('section-running')
  );


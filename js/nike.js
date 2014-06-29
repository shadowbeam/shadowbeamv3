
(function(){
  var np,nid="nikeplus-sdk",d=document,
  es=d.getElementsByTagName("script")[0];
  if (d.getElementById(nid)) {return;}
  np=d.createElement("script");np.id=nid;
  np.src="https://s3.nikecdn.com/nikeplus/js/v2/jssdk.min.js";
  es.parentNode.insertBefore(np,es);
})();

function nikeplusSDKAsyncInit() {
    NIKEPLUS.init({
        client_id: "your_client_id",
        redirect_uri: "http://your_redirect_uri.com/redirect.html",
        authSuccess: function(authData){}
    });
}

/**
* Control running
*/
var runningsection = new function() {

  $('#more-social-btn').click(function(){ moreSocialPress() });

  var section = $('#section-running');
  var map = document.getElementById("map");


  var init = function(){

    var mapOptions = {
      center: new google.maps.LatLng(-34.397, 150.644),
      zoom: 8
    };
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
  }

  $(map).height(500);
  google.maps.event.addDomListener(window, 'load', init);


};


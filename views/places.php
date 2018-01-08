<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Retrieving an Address for a Place ID</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #floating-panel {
        width: 440px;
      }
      #place-id {
        width: 250px;
      }
    </style>
  </head>
  <body>
    <div id="floating-panel">
      <!-- Supply a default place ID for a place in Brooklyn, New York. -->
      <input id="place-id" type="text" value="ChIJd8BlQ2BZwokRAFUEcm_qrcA">
      <input id="submit" type="button" value="Get Address for Place ID">
    </div>
    <div id="map"></div>
    <script>
      // Initialize the map.
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: 40.72, lng: -73.96}
        });
        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;

        document.getElementById('submit').addEventListener('click', function() {
          geocodePlaceId(geocoder, map, infowindow);
        });
      }

      // This function is called when the user clicks the UI button requesting
      // a geocode of a place ID.
      function geocodePlaceId(geocoder, map, infowindow) {
        var placeId = document.getElementById('place-id').value;
        geocoder.geocode({'placeId': placeId}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
              map.setZoom(11);
              map.setCenter(results[0].geometry.location);
              var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
              });
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAML34fIOQX4GXf1HlrJ8zTSpyxNxetSWw&callback=initMap">
    </script>
  </body>
</html>
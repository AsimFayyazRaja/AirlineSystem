<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Animating Symbols</title>
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
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      // This example adds an animated symbol to a polyline.

      function initMap() {
        var w='<?php echo $lat1; ?>';
        console.log(w);
        var x='<?php echo $lon1; ?>';
        console.log(x);
        var y='<?php echo $lat2; ?>';
        console.log(y);
        var z='<?php echo $lon2; ?>';
        console.log(z);
        
        var a=parseFloat(w);
        var b=parseFloat(x);
        var c=parseFloat(y);
        var d=parseFloat(z);

        var c1=a+c;
        c1=c1/2;
        var c2=b+d;
        c2=c2/2;
        console.log(c1 +"  " + c2);
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: c1, lng: c2},
          zoom: 6,
          mapTypeId: 'terrain'
        });

        // Define the symbol, using one of the predefined paths ('CIRCLE')
        // supplied by the Google Maps JavaScript API.
        var lineSymbol = {
          path: google.maps.SymbolPath.CIRCLE,
          scale: 8,
          strokeColor: '#393'
        };

        // Create the polyline and add the symbol to it via the 'icons' property.
        
        var line = new google.maps.Polyline({
          path: [{lat: a, lng: b}, {lat: c, lng:d}],
          icons: [{
            icon: lineSymbol,
            offset: '100%'
          }],
          map: map
        });

        animateCircle(line);
      }

      // Use the DOM setInterval() function to change the offset of the symbol
      // at fixed intervals.
      function animateCircle(line) {
          var count = 0;
          window.setInterval(function() {
            count = (count + 1) % 200;

            var icons = line.get('icons');
            //console.log(icons[0]);
            icons[0].offset = (count / 2) + '%';
            line.set('icons', icons);
        }, 20);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAML34fIOQX4GXf1HlrJ8zTSpyxNxetSWw&callback=initMap">
    </script>
  </body>
</html>
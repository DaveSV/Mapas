function iniciarMap() {
      var marcadores = [
        ['Playa Cangrejal', 9.8780, -85.5340],
        ['Hotel Sol Sámara', 9.8696866, -85.5071604],
        ['Hotel Sámara Beach', 9.88208, -85.52709]
      ];
	var icon = {
    		url: "markShadow.png", // url
    		scaledSize: new google.maps.Size(60, 50), // scaled size
    		origin: new google.maps.Point(0,0), // origin
    		anchor: new google.maps.Point(0, 0) // anchor
	};
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        center: new google.maps.LatLng(9.8739146, -85.5294764),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
      var infowindow = new google.maps.InfoWindow();
      var marker, i;

      for (i = 0; i < marcadores.length; i++) {  
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(marcadores[i][1], marcadores[i][2]),
          map: map,
	icon: icon
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            infowindow.setContent(marcadores[i][0]);
            infowindow.open(map, marker);
          }
        })(marker, i));
      }
    }
    google.maps.event.addDomListener(window, 'load', initialize);
function iniciarMap(){
    var coord = {lat:42.3441841 ,lng: -3.7297126};
    var map = new google.maps.Map(document.getElementById('map'),{
      zoom: 10,
      center: coord
    });

	var markers = [
        ['Burgos, España', 42.3441841, -3.7297126],
        ['Vivar del Cid, Burgos', 42.414444444444, -3.6888888888889],
        ['Santillana de Campos, Palencia', 43.388706207275, -​4.0957551002502]
    ];
    
	var icon = {
    		url: "markShadow.png", // url
    		scaledSize: new google.maps.Size(60, 50), // scaled size
    		origin: new google.maps.Point(0,0), // origin
    		anchor: new google.maps.Point(0, 0) // anchor
	};

	var marker0 = new google.maps.Marker({
      		position: coord,
      		map: map,
		title: 'Burgos, España',
          	icon: icon // Path al nuevo icono
    	});

	var marker1 = new google.maps.Marker({
          position: new google.maps.LatLng(42.414444444444, -3.6888888888889),
          map: map,
          title: 'Vivar del Cid, Burgos',
          icon: icon // Path al nuevo icono
        });
}
	

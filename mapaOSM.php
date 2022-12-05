<!DOCTYPE html><html>
<meta charset="utf-8" />
<head>
	<script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
<title>Playa Sámara</title>
 <style>
  #map { 
  width: ;
  height: 600px; }
 </style>
 
 </head>
  <body>

<?php



$mapList = json_decode(file_get_contents('https://overpass-api.de/api/interpreter?data=[out:json][timeout:25];area(3600287667)-%3E.searchArea;(node(4059307698)(area.searchArea);way(4059307698)(area.searchArea);relation(4059307698)(area.searchArea););out%20body;%3E;out%20skel%20qt%3B'));

foreach($mapList->elements as $element){
    $LAT = $element->lat;
    echo "Latitud ".$LAT;
    echo "<br>";
    $LON = $element->lon;
    echo "Longitud ".$LON;
    echo"<br>";
    $id = $element->id;
    echo "id: ".$id;
}
?>


   <div id="map"></div>
 <script>
 
var map = L.map('map').
setView([<?php echo $LAT.', '.$LON; ?>], 
13);

var LeafIcon = L.Icon.extend({
    options: {
        shadowUrl: 'leaf-shadow.png',
        iconSize:     [38, 95],
        shadowSize:   [50, 64],
        iconAnchor:   [22, 94],
        shadowAnchor: [4, 62],
        popupAnchor:  [-3, -76]
    }
});
 
var greenIcon = new LeafIcon({iconUrl: 'leaf-green.png'}),
    redIcon = new LeafIcon({iconUrl: 'leaf-red.png'}),
    orangeIcon = new LeafIcon({iconUrl: 'leaf-orange.png'});

L.icon = function (options) {
    return new L.Icon(options);
};

L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="https://about.me/Albert.Saenz">Alberto Sáenz</a>, Host © <a href="http://multihostexpress.com">Multi Host Express</a>',
    maxZoom: 18
}).addTo(map);

//L.control.scale().addTo(map);

L.marker([<?php echo $LAT.', '.$LON; ?>], {icon: greenIcon}).addTo(map).bindPopup("Playa Cangrejal");

 </script>
 </body> 
 </html>
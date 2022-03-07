let map;

function initMap() {
var coor ={lat: -0.3661118 ,lng: -78.5524163 };
  map = new google.maps.Map(document.getElementById("map"), {
    center: coor,
    zoom: 16,
  });
  var marker = new google.maps.Marker({
            position : coor,
            map:map
        });
}
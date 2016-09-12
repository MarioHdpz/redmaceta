//mapa1
var map;
//Se dan estilos al mapa
var styles = [
      {
        stylers: [
          { hue: "#38D28C" },
          { saturation: 20 }
        ]
      },{
        featureType: "road",
        elementType: "geometry",
        stylers: [
          { lightness: 100 },
          { visibility: "simplified" }
        ]
      },{
        featureType: "road",
        elementType: "labels",
        stylers: [
          { visibility: "off" }
        ]
      }
    ];
//Se agregan los marcadores
  var locations = [
          ['Casa de Fernando', 19.419430, -99.173131,1],
          ['Casa de Mario', 19.447331, -99.174741,2],
          ['Casa de Diana', 19.395709, -99.139545,3],
          ['Casa de Hugo', 19.468574, -99.140278,4],
          ['Casa de Nestor', 19.363092, -99.288364,5],
          ['Casa de Irais', 19.508567, -99.204081,6],
          ['Casa de Iván', 19.305754, -99.190319,7],
          ['Huerto Roma Verde', 19.411179, -99.159603,8],
          ['CTIN', 19.442078, -99.202942,9]
        ];
//inicialización de mapas
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 19.419430, lng: -99.173131},
      zoom: 12,
      clickableIcons: false
    });
    map.setOptions({styles: styles});
    //inicializamos marcadores
    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
}

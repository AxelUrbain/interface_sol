//Fonction de tracet GPS de toutes les données
function pointsArrets(items){
  var pointsArrets = new Array();
  for (var i = 0; i < items.length; i++) {
    var item = items[i];
    pointsArrets.push(new L.LatLng(item[1],item[2]));
  }
  return pointsArrets;
}

var thouars = [46.96156908338524,-0.1584005355834961];
//Récupération des valeurs de la BDD Longitude et Latitude
var data = [
["Thouars", 46.96156908338524,-0.1584005355834961],
["Paris", 48.856578, 2.351828],
["Orléans", 47.9025, 1.909],
["Tours", 47.393611, 0.689167],
["Poitiers", 46.581945, 0.336112],
["Bordeaux", 44.837912, -0.579541]
];
//Création de la carte
var mapid = L.map('mapid').setView([46.96156908338524,-0.1584005355834961], 13);
//Création du calque images
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
  maxZoom: 20
}).addTo(mapid);
//Ajout d'un marker
var marker = L.marker(thouars).addTo(mapid);
//Popup marker de départ
marker.bindPopup("<span>Aérodrome de Thouars</span>");

//Tarcé GPS
var trajet = new L.Polyline(pointsArrets(data));
mapid.addLayer(trajet);

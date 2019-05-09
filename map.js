$(document).ready(function(){
  $.ajax({
    url : "data.php",
      success : function (data) {
        console.log(data);
        //Fonction de tracet GPS de toutes les données
        function pointsArrets(items){
          var pointsArrets = new Array();
          for (var i = 0; i < items.length; i++) {
            var item = items[i];
            pointsArrets.push(new L.LatLng(item[0],item[1]));
          }
          return pointsArrets;
        }
        //Récupération de la Longitude et de la latitude
        var thouars = [46.96156908338524,-0.1584005355834961];

        //Récupération des valeurs de la BDD Longitude et Latitude
        var donne = [];
        var curseur1 = -1;
        var curseur2 = -1;
        for (var i = 0; i < data.length; i++) {
          //Ajoute aux tableau de donner
          if(curseur1 === -1 && data[i] === '"') {
            curseur1 = i;
          }
          if (curseur1 !== -1 && data[i] === '"' && i !== curseur1) {
            curseur2 = i;
            //Prendre data dans une variable
            //explode valeur
            //Ajouter logitude latitude dans un autre tableau et push dans le tableau de donne
            var dataMem = data.substr(curseur1+1,(curseur2-curseur1-1));
            var TablConvert = dataMem.split(",");
            donne.push(TablConvert);

            curseur1 = -1;
            curseur2 = -1;
          }
        }
        //console.log(tableau);
        console.log(donne);
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
        var trajet = new L.Polyline(pointsArrets(donne));
        mapid.addLayer(trajet);
      },
      error : function(erreur){
        console.log(erreur);
      }

  });
});

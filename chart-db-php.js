$(document).ready(function(){

  $.ajax({
    url : "http://localhost/projet/interface_sol/data.php",
    type : "GET",
    success : function (data) {
      var resultSondage = {
        Macron : [],
        LePen : [],
        Fillion : [],
        Mélenchon : []
      };

      var len = data.length;

      for (var i = 0; i < len; i++) {
        if(data[i].Nom == "Macron"){
          resultSondage.Macron.push(data[i].resultSondage);
        }
        else if(data[i].Nom == "LePen"){
          resultSondage.LePen.push(data[i].resultSondage);
        }
        else if(data[i].Nom == "Fillion"){
          resultSondage.Fillion.push(data[i].resultSondage);
        }
        else if(data[i].Nom == "Mélenchon"){
          resultSondage.Mélenchon.push(data[i].resultSondage);
        }
      }
      console.log (data);
      console.log(resultSondage);

      var ctx = $("#myChart");

      var data = {
        labels : ["sondage1","sondage2","sondage3","sondage4"],
        datasets : [
          {
            label : "Mélenchon",
            data : resultSondage.Mélenchon,
            backgroundColor : "red",
            borderColor : "rgba(255,99,132,1)",
            borderWidth : 3,
            fill : false,
            lineTension : 0,
            pointRadius : 5
          },
          {
            label : "Macron",
            data : resultSondage.Macron,
            backgroundColor : "yellow",
            borderColor : "orange",
            fill : false,
            lineTension : 0,
            pointRadius : 5
          },
          {
            label : "Fillion",
            data : resultSondage.Fillion,
            backgroundColor : "blue",
            borderColor : "lightblue",
            fill : false,
            lineTension : 0,
            pointRadius : 5
          },
          {
            label : "LePen",
            data : resultSondage.LePen,
            backgroundColor : "green",
            borderColor : "lightgreen",
            fill : false,
            lineTension : 0,
            pointRadius : 5
          }
        ]
      };

      var chart = new Chart( ctx, {
        type : "line",
        data : data,
        options : {}
      });
    },
    error : function (data) {
      console.log(data);
    }
  });
});

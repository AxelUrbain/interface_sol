$(document).ready(function(){

  $.ajax({
    url : "http://localhost/projet/interface_sol/data.php",
    type : "GET",
    success : function (data) {
      var resultTemps = {
        Altitude : []
      };

      var len = data.length;

      for (var i = 0; i < len; i++) {
        if(data[i].Altitude){
          resultTemps.Altitude.push(data[i].resultTemps);
        }
      }
      console.log (data);
      console.log(resultTemps);

      var ctx = $("#Altitude");

      var data = {
        labels : ["sondage1","sondage2","sondage3","sondage4"],
        datasets : [
          {
            label : "Altitude",
            data : resultTemps.Altitude,
            backgroundColor : "red",
            borderColor : "rgba(255,99,132,1)",
            borderWidth : 3,
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

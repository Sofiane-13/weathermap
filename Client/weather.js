var icon, celsius, minCelsius, maxCelsius;
$("document").ready(function() {
  $(".js-ajax-php-json").submit(function() {
    var villeTx = $("#ville").val();

    var data = {
      ville: villeTx
    };

    data = $(this).serialize() + "&" + $.param(data);

    $.ajax({
      type: "POST",
      dataType: "json",
      url: "../Serveur/index.php",
      data: data,
      success: function(data) {
        icon1 = "http://openweathermap.org/img/w/" + data["Icon1"] + ".png";
        icon2 = "http://openweathermap.org/img/w/" + data["Icon2"] + ".png";
        icon3 = "http://openweathermap.org/img/w/" + data["Icon3"] + ".png";

        $("#city").empty();
        $("#city").append(data["City"]);
        $("#longitude").empty();
        $("#longitude").append(data["longitude"] + " C");
        $("#latitude").empty();
        $("#latitude").append(data["latitude"] + " C");

        $("#city2").empty();
        $("#city2").append(data["City"]);
        $("#longitude2").empty();
        $("#longitude2").append(data["longitude"] + " C");
        $("#latitude2").empty();
        $("#latitude2").append(data["latitude"] + " C");

        $("#city3").empty();
        $("#city3").append(data["City"]);
        $("#longitude3").empty();
        $("#longitude3").append(data["longitude"] + " C");
        $("#latitude3").empty();
        $("#latitude3").append(data["latitude"] + " C");

        //Jour1

        $("#graphic1").empty();
        $("#graphic1").append('<img src="' + icon1 + '"/>');
        $("#description1").empty();
        $("#description1").append(data["description1"]);
        $("#windSpeed1").empty();
        $("#windSpeed1").append(data["speedwind1"]);
        $("#pressure1").empty();
        $("#pressure1").append(data["pressure1"]);
        $("#humidity1").empty();
        $("#humidity1").append(data["humidity1"] + "%");
        $("#celsius1").empty();
        $("#celsius1").append(data["temp1"] + "C");
        $("#min1").empty();
        $("#min1").append(data["Max1"] + " C");
        $("#max1").empty();
        $("#max1").append(data["Min1"] + " C");
        $("#date1").append(data["date1"]);

        //Jour2

        $("#graphic2").empty();
        $("#graphic2").append('<img src="' + icon2 + '"/>');
        $("#description2").empty();
        $("#description2").append(data["description2"]);
        $("#windSpeed2").empty();
        $("#windSpeed2").append(data["speedwind2"]);
        $("#pressure2").empty();
        $("#pressure2").append(data["pressure2"]);
        $("#humidity2").empty();
        $("#humidity2").append(data["humidity2"] + "%");
        $("#celsius2").empty();
        $("#celsius2").append(data["temp2"] + "C");
        $("#min2").empty();
        $("#min2").append(data["Max2"] + " C");
        $("#max2").empty();
        $("#max2").append(data["Min2"] + " C");
        $("#date2").append(data["date2"]);

        //Jour3

        $("#graphic3").empty();
        $("#graphic3").append('<img src="' + icon3 + '"/>');
        $("#description3").empty();
        $("#description3").append(data["description3"]);
        $("#windSpeed3").empty();
        $("#windSpeed3").append(data["speedwind3"]);
        $("#pressure3").empty();
        $("#pressure3").append(data["pressure3"]);
        $("#humidity3").empty();
        $("#humidity3").append(data["humidity3"] + "%");
        $("#celsius3").empty();
        $("#celsius3").append(data["temp3"] + "C");
        $("#min3").empty();
        $("#min3").append(data["Max3"] + " C");
        $("#max3").empty();
        $("#max3").append(data["Min3"] + " C");
        $("#date3").append(data["date3"]);

        $(".imgmeteo").empty();
        $(".weather").css("visibility", "visible");
      },
      error: function() {
        alert("Erreur Ajax !");
      }
    });
    return false;
  });
});

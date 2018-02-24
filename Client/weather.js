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
        icon = "http://openweathermap.org/img/w/" + data["Icon"] + ".png";

        $("#graphic").empty();
        $("#graphic").append('<img src="' + icon + '"/>');
        $("#description").empty();
        $("#description").append(data["description"]);
        $("#city").empty();
        $("#city").append(data["City"]);
        $("#windSpeed").empty();
        $("#windSpeed").append(data["speedwind"]);
        $("#pressure").empty();
        $("#pressure").append(data["pressure"]);
        $("#humidity").empty();
        $("#humidity").append(data["humidity"] + "%");
        minCelsius = Math.floor(data["Min"] - 273.15);
        maxCelsius = Math.floor(data["Max"] - 273.15);
        $("#celsius").empty();
        $("#celsius").append(data["temp"] + "C");
        $("#longitude").empty();
        $("#longitude").append(data["longitude"] + " C");
        $("#latitude").empty();
        $("#latitude").append(data["latitude"] + " C");
        $("#min").empty();
        $("#min").append(data["Max"] + " C");
        $("#max").empty();
        $("#max").append(data["Min"] + " C");
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

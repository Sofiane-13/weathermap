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
        $("#weather").empty();

        for (var i = 1; i < 20; i++) {
          $("#weather").append(`
          <div class="container">
          <div class="title">
            <h1 id="city">${data["City"]}</h1>
            <div id="graphic" class="weather-icon"><img src="http://openweathermap.org/img/w/${
              data[`Icon${i}`]
            }.png"/></div>
            <div id="description" class='important-info text'>${
              data[`description${i}`]
            }</div>
            <div id="celsius" class="temp-info">${data[`temp${i}`]}</div>
          </div>
        </div>
        <div class="description-container">
          <div class="block-1">
            <div class="text">
              <span>Max</span>
              <span id="max" class="important-info">${
                data[`Max${i}`]
              } °C </span>
            </div>
            <div class="text">
              <span>Min</span>
              <span id="min" class='important-info'>${
                data[`Min${i}`]
              } °C </span>
            </div>
            <div class="text">
              <strong>
                <span>Date</span>
              </strong>
              <strong>
                <span id="date1" class='important-info'>${
                  data[`date${i}`]
                } </span>
              </strong>
            </div>

          </div>
          <div class="block-2">
            <span>Lon :</span>
            <div id="longitude" class=" text important-info">${
              data["longitude"]
            }°C </div>
            <span>Lat :</span>
            <div id="latitude" class="text important-info"> ${
              data["latitude"]
            }°C</div>
          </div>
          <div class="block-3">
            <span>Humidity:</span>
            <div id="humidity" class="text important-info">${
              data[`humidity${i}`]
            } % </div>
            <span>Pressure:</span>
            <div id="pressure" class="text important-info">${
              data[`pressure${i}`]
            }°</div>
            <span>Winds:</span>
            <div id="windSpeed1" class="text important-info">${
              data[`speedwind${i}`]
            } Km/h</div>
          </div>
        </div>
          `);
        }
        if(data["City"]==null){
          $(".weather").css("visibility", "hidden");
          $(".imgmeteo").empty();
          $(".imgmeteo").append(`<img src="https://static.neoparking.com/wp-content/themes/neoparking25/images/home-city/home-city-nantes.jpg" style="width: 600px;">`)
          alert("This city does not exist !");
        }
        else {
          $(".imgmeteo").empty();
          $(".weather").css("visibility", "visible");
        }
      },
      error: function() {
        alert("This city does not exist !");
      }
    });
    return false;
  });
});

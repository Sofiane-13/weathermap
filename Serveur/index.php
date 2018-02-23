 <?php

if (is_ajax()) {

  if (isset($_POST["ville"]) && !empty($_POST["ville"])) { //Checks if action value exists

    $ville = $_POST["ville"];

    test_function();

  }
}

//Function to check if the request is an AJAX request
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function test_function(){

// Get Meteo

$ville="Nantes";
$url = "http://api.openweathermap.org/data/2.5/weather?q=".$_POST["ville"]."&lang=en&units=metric&APPID=a570c3a84b7503ab4b1927647db754c9";

$contents = file_get_contents($url);
$clima=json_decode($contents);
//  print_r($clima);

$temp_max=$clima->main->temp_max;
$temp_min=$clima->main->temp_min;
$city=$clima->name;
$icon=$clima->weather[0]->icon;
$longitude = $clima->coord->lat;
$latitude = $clima->coord->lon;
$main = $clima->weather[0]->main;
$description = $clima->weather[0]->description;
$base = $clima->base;
$temp = $clima->main->temp;
$pressure = $clima->main->pressure;
$humidity = $clima->main->humidity;
$visibility = $clima->visibility;
$speedwind = $clima->wind->speed;
$degwind = $clima->wind->deg;
$country =$clima->sys->country;
$sunrise =$clima->sys->sunrise;
$sunset =$clima->sys->sunset;


$return = $_POST;

$return["City"] = $city;
$return["Icon"] = $icon;
$return["Max"] = $temp_max;
$return["Min"] = $temp_min;
$return["longitude"] = $longitude;
$return["latitude"] = $latitude;
$return["main"] = $main;
$return["description"] = $description;
$return["base"] = $base;
$return["temp"] = $temp;
$return["pressure"] = $pressure;
$return["humidity"] = $humidity;
$return["visibility"] = $visibility;
$return["speedwind"] = $speedwind;
$return["degwind"] = $degwind;
$return["country"] = $country;
$return["sunrise"] = $sunrise;
$return["sunset"] = $sunset;
$return["json"] = json_encode($return);
echo json_encode($return);
}
?>

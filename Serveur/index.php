 <?php

if (is_ajax()) {

  if (isset($_POST["ville"]) && !empty($_POST["ville"])) { //Checks if action value exists

    call_function();

  }
}

//Function to check if the request is an AJAX request
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function call_function(){

// Get Meteo
$url = "http://api.openweathermap.org/data/2.5/forecast?q=".$_POST["ville"]."&units=metric&APPID=a570c3a84b7503ab4b1927647db754c9";
$contents = file_get_contents($url);
$clima=json_decode($contents);

// Pour voir le Json print_r($clima);
  
  $city=$clima->city->name;
  $longitude = $clima->city->coord->lat;
  $latitude = $clima->city->coord->lon;
  $country = $clima->city->country;
  $population = $clima->city->population;
  

$return = $_POST;

$return["City"] = $city;
$return["longitude"] = $longitude;
$return["latitude"] = $latitude;
$return["country"] = $country; 
$return["population"] = $population; 



for ($i = 1; $i <= 20; $i++) {
  $return["temp".$i] = $clima->list[$i-1]->main->temp;
  $return["Max".$i] = $clima->list[$i-1]->main->temp_max;
  $return["Min".$i] = $clima->list[$i-1]->main->temp_min;
  $return["pressure".$i] = $clima->list[$i-1]->main->pressure;  
  $return["sea_level".$i] = $clima->list[$i-1]->main->sea_level; 
  $return["humidity".$i] = $clima->list[$i-1]->main->humidity;  
  $return["main".$i] = $clima->list[$i-1]->weather[0]->main;
  $return["description".$i] = $clima->list[$i-1]->weather[0]->description;
  $return["Icon".$i] = $clima->list[$i-1]->weather[0]->icon;
  $return["speedwind".$i] = $clima->list[$i-1]->wind->speed;
  $return["degwind".$i] = $clima->list[$i-1]->wind->deg;
  $return["date".$i] = $clima->list[$i-1]->dt_txt;
  
}


$return["json"] = json_encode($return);
echo json_encode($return);
}
?>

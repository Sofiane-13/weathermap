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


//$url = "http://api.openweathermap.org/data/2.5/weather?q=".$_POST["ville"]."&lang=en&units=metric&APPID=a570c3a84b7503ab4b1927647db754c9";
$url = "http://api.openweathermap.org/data/2.5/forecast?q=".$_POST["ville"]."&units=metric&APPID=a570c3a84b7503ab4b1927647db754c9";
//$url = "http://https://samples.openweathermap.org/data/2.5/forecast/daily?id=524901&APPID=a570c3a84b7503ab4b1927647db754c9";
$contents = file_get_contents($url);
$clima=json_decode($contents);
  //print_r($clima);
  
  $city=$clima->city->name;
  $longitude = $clima->city->coord->lat;
  $latitude = $clima->city->coord->lon;
  $country = $clima->city->country;
  $population = $clima->city->population;
  
  // //Jour1
  // $temp1 = $clima->list[0]->main->temp;
  // $temp_max1=$clima->list[0]->main->temp_max;
  // $temp_min1=$clima->list[0]->main->temp_min;
  // $pressure1 = $clima->list[0]->main->pressure;  
  // $sea_level1 = $clima->list[0]->main->sea_level; 
  // $humidity1 = $clima->list[0]->main->humidity;   
  // $main1 = $clima->list[0]->weather[0]->main;
  // $description1 = $clima->list[0]->weather[0]->description;
  // $icon1=$clima->list[0]->weather[0]->icon;
  // $speedwind1 = $clima->list[0]->wind->speed;
  // $degwind1 = $clima->list[0]->wind->deg;

  // //Jour2
  // $temp2 = $clima->list[1]->main->temp;
  // $temp_max2=$clima->list[1]->main->temp_max;
  // $temp_min2=$clima->list[1]->main->temp_min;
  // $pressure2 = $clima->list[1]->main->pressure;  
  // $sea_level2 = $clima->list[1]->main->sea_level; 
  // $humidity2 = $clima->list[1]->main->humidity;   
  // $main2 = $clima->list[1]->weather[0]->main;
  // $description2 = $clima->list[1]->weather[0]->description;
  // $icon2 = $clima->list[1]->weather[0]->icon;
  // $speedwind2 = $clima->list[1]->wind->speed;
  // $degwind2 = $clima->list[1]->wind->deg;

  // //Jour3
  // $temp3 = $clima->list[2]->main->temp;
  // $temp_max3 =$clima->list[2]->main->temp_max;
  // $temp_min3 =
  // $pressure3 = 
  // $sea_level3 = $clima->list[2]->main->sea_level; 
  // $humidity3 =  
  // $main3 = 
  // $description3 = 
  // $icon3 =
  // $speedwind3 = 
  // $degwind3 = 

$return = $_POST;

$return["City"] = $city;
$return["longitude"] = $longitude;
$return["latitude"] = $latitude;
$return["country"] = $country; //a utiliser
$return["population"] = $population; //a utiliser

// //Jour1 

// $return["temp1"] = $temp1;
// $return["Max1"] = $temp_max1;
// $return["Min1"] = $temp_min1;
// $return["pressure1"] = $pressure1;
// $return["sea_level1"] = $sea_level1;
// $return["humidity1"] = $humidity1;
// $return["main1"] = $main1;
// $return["description1"] = $description1;
// $return["Icon1"] = $icon1;
// $return["speedwind1"] = $speedwind1;
// $return["degwind1"] = $degwind1;

// //Jour2

// $return["temp2"] = $temp2;
// $return["Max2"] = $temp_max2;
// $return["Min2"] = $temp_min2;
// $return["pressure2"] = $pressure2;
// $return["sea_level2"] = $sea_level2;
// $return["humidity2"] = $humidity2;
// $return["main2"] = $main2;
// $return["description2"] = $description2;
// $return["Icon2"] = $icon2;
// $return["speedwind2"] = $speedwind2;
// $return["degwind2"] = $degwind2;

// //Jour3



for ($i = 0; $i <= 30; $i++) {
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

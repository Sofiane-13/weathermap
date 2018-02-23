 <?php

//units=For temperature in Celsius use units=metric
//5128638 is new york ID

$url = "http://api.openweathermap.org/data/2.5/weather?q=Nantes&lang=en&units=metric&APPID=a570c3a84b7503ab4b1927647db754c9";


$contents = file_get_contents($url);
$clima=json_decode($contents);
 // print_r($clima);
$temp_max=$clima->main->temp_max;
$temp_min=$clima->main->temp_min;
$icon=$clima->weather[0]->icon.".png";
//how get today date time PHP :P
$today = date("F j, Y, g:i a");
$cityname = $clima->name;

echo $cityname . " - " .$today . "<br>";
echo "Temp Max: " . $temp_max ."&deg;C<br>";
echo "Temp Min: " . $temp_min ."&deg;C<br>";
echo "<img src='https://www.terre-net.fr/Content/Images/Meteo/picto-svg/1.svg'" . $icon ."'/ >";

?>

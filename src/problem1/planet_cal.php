<?php

$sentence = "Trave time from Sun to ";

$planet = $_GET["fav_planet"];

$trave_marcury = round((5790 / 30) * (1/60), 2);
$trave_earth = round((15000 / 30) * (1/60), 2);
$trave_mars = round((23000 / 30) * (1/60), 2);

if($planet == "mercury")
{
    echo $sentence . $planet . " : " . $trave_marcury . " minutes";
}else if($planet == "earth"){
    echo $sentence . $planet . " : " . $trave_earth . " minutes";
}else{
    echo $sentence . $planet . " : " . $trave_mars . " minutes";
}


// if($planet == "mercury")
// {
//     echo $sentence . $planet . ": " . $trave_marcury;
// };

// echo "Trave time from Sun to ". $_GET["fav_planet"];


?>
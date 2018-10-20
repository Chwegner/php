<?php

$spritmenge = $_POST["sm"];
$spritart = $_POST["sa"];

switch($spritart)
{
	case "D":
	$kraftstoff = "Diesel";
	echo "Der Gesamtpreis beträgt: " . $spritmenge * 1.29 . " € für " . $spritmenge . " Liter " . $kraftstoff . ".";
	break;
	
	case "S":
	$kraftstoff = "Super";
	echo "Der Gesamtpreis beträgt: " . $spritmenge * 1.45 . " € für " . $spritmenge . " Liter " . $kraftstoff . ".";
	break;
	
	case "E10":
	$kraftstoff = "E10";
	echo "Der Gesamtpreis beträgt: " . $spritmenge * 1.42 . " € für " . $spritmenge . " Liter " . $kraftstoff . ".";
	break;
	
	default:
	echo "Diese Spritart ist uns nicht bekannt";
	break;
}

?>
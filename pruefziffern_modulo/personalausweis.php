<?php 

// Berechnung der Endziffer
$zahl = 128;
echo $zahl%10;
echo '<hr>';

$perso = "2406055684D<<6810203<0705109<<<<<<<6";

// Zugriff auf das 1. Zeichen der Zeichenkette
echo $perso[0];
echo '<hr>';

//1. Aufgabe: Berechnen Sie die erste Prüfziffer für die Seriennummer (PSN)

$summe = 0;
$summe += ($perso[0] * 7)%10;
$summe += ($perso[1] * 3)%10;
$summe += ($perso[2] * 1)%10;
$summe += ($perso[3] * 7)%10;
$summe += ($perso[4] * 3)%10;
$summe += ($perso[5] * 1)%10;
$summe += ($perso[6] * 7)%10;
$summe += ($perso[7] * 3)%10;
$summe += ($perso[8] * 1)%10;
echo $summe%10;


$perso = "2406055684D<<6810203<0705109<<<<<<<6";
$gew   = "731731731";
$summe = 0;
for($i=0; $i<9; $i++) {
	$summe += ($perso[$i] * $gew[$i])%10;
}
echo $summe%10;


$perso = "2406055684D<<6810203<0705109<<<<<<<6";
$gew   = "731";
$summe = 0;
for($i=0; $i<9; $i++) {
	$summe += $perso[$i] * $gew[$i%3];
}
echo $psn = $summe%10;

// Aufgabe 2: Die zweite und dritte Prüfziffer berechnen (PGD und PAD)
$summe = 0;
for($i=13; $i<19; $i++) {
	$summe += $perso[$i] * $gew[($i-13)%3];
}
echo $pgd = $summe%10;

$summe = 0;
for($i=21; $i<27; $i++) {
	$summe += $perso[$i] * $gew[($i-21)%3];
}
echo $pad = $summe%10;


function pruefziffer($subperso) {
	$gew = "731";
	$summe = 0;
	for($i=0; $i<strlen($subperso); $i++) {
		$summe += $subperso[$i] * $gew[$i%3];
	}
	return $summe%10;
}
$perso = "2406055684D<<6810203<0705109<<<<<<<6";
// Aufgabe 3: Schneiden Sie mit Hilfe der Funktion substr() die notwendigen Zeichenketten
// für die Funktion pruefziffer() aus.
$sn = substr($perso,0,9);
$gd = substr($perso,13,6);
$ad = substr($perso,21,6);
echo $psn = pruefziffer($sn);
echo $pgd = pruefziffer($gd);
echo $pad = pruefziffer($ad);
$ges = $sn.$psn.$gd.$pgd.$ad.$pad;
echo $pges = pruefziffer($ges);



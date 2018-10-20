<?php 
function pruefziffer($subperso) {
	$gew = "731";
	$summe = 0;
	for($i=0; $i<strlen($subperso); $i++) {
		$summe += $subperso[$i] * $gew[$i%3];
	}
	return $summe%10;
}

<?php
// Aufgabe:

// Über ein Formular soll es möglich seine eine Ausweisnummer einzugeben.
// Wenn das Formular abgeschickt wurde, sollen die vier Prüfziffern berechnet werden.
// Die berechneten Prüfziffern sollen mit den Prüfziffern aus der Ausweisnummer verglichen werden
// und eine passende Meldung (z.B. "Ausweisnummer richtig eingegeben") soll erscheinen. 

//include "inc/pruefziffer.inc.php";
require "inc/pruefziffer.inc.php";

// Bei _once wird die Datei nur einmalig eingebunden.
include_once "inc/pruefziffer.inc.php";
require_once "inc/pruefziffer.inc.php";
?>
<h1>TEST</h1>
<form action="personalausweis2.php" method="post">
<input type="text" name="snpz" size="10" minlength="10" maxlength="10" value="2406055684">D<<
<input type="text" name="gdpz" size="7" minlength="7" maxlength="7" value="6810203"><
<input type="text" name="adpz" size="7" minlength="7" maxlength="7" value="0705109"><<<<<<<
<input type="text" name="gespz" size="1" minlength="1" maxlength="1" value="6">
<input type="submit" name="senden" value="Persocheck">
</form>
<?php 
if(isset($_POST["senden"])) {
	$perso = $_POST["snpz"].'D<<'.$_POST["gdpz"].'<'.$_POST["adpz"].'<<<<<<<'.$_POST["gespz"];
	if(strlen($perso) == 36) {
		$sn = substr($perso,0,9);
		$gd = substr($perso,13,6);
		$ad = substr($perso,21,6);
		$psn = pruefziffer($sn);
		$pgd = pruefziffer($gd);
		$pad = pruefziffer($ad);
		$ges = $sn.$psn.$gd.$pgd.$ad.$pad;
		$pges = pruefziffer($ges);
		if($psn == $perso[9] && $pgd == $perso[19] && $pad == $perso[27] && $pges == $perso[35]) {
			echo "Ausweisnummer richtig eingegeben<br>";
		} else {
			echo "Ausweisnummer falsch eingegeben<br>";
		}
	}
}




?>


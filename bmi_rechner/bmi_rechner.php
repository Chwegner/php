<?php 
/*
Programmieren Sie einen BMI-Rechner. Über ein Formular sollen die notwendigen Daten eingegeben werden können.
Anschließend wird der BMI-Wert angezeigt.
   
Der BMI (Body-Maß-Index) ist ein Maß für das Gewicht in Relation zur Körpergröße, er wird wie folgt berechnet:
   
BMI = (Gewicht / (Groesse * Groesse))* 10000
   
Gewicht in kg und Körpergröße in cm.
   
BMI-Index                Frauen / Männer
-----------------------------------------
Untergewicht                <19 / <20
Normalgewicht          19 - <25 / 20 - <26
Übergewicht             25 - 30 / 26 - 30
Starkes Übergewicht        > 30 / >30
  
Als Ausgabe soll folgender Text erscheinen:
Sie haben einen BMI-Wert von XXX und haben damit XXX.
Z.B.: Sie haben einen BMI-Wert von 24 und haben damit Normalgewicht.
*/
?>
<form action="bmi_rechner.php" method="post">
<select name="geschlecht">
	<option value="w">Weiblich</option>
	<option value="m">Männlich</option>
</select><br>
<input type="text" name="gewicht" placeholder="Gewicht in kg"><br>
<input type="text" name="groesse" placeholder="Körpergröße in cm"><br>
<input type="submit" name="senden" value="BMI berechnen">
</form>
<?php 
if(isset($_POST["senden"])) {
	$geschlecht = $_POST["geschlecht"];
	$gewicht = (int)$_POST["gewicht"];
	$groesse = (int)$_POST["groesse"];
	
	if($gewicht && $groesse) {
		$bmi = round(($gewicht / ($groesse * $groesse))* 10000);
		/*
		if($bmi < 19 || ($bmi <20 && $geschlecht == 'm')) {
			$erg = 'Untergewicht';			
		} elseif($bmi < 25 || ($bmi < 26 && $geschlecht == 'm')) {
			$erg = 'Normalgewicht';
		} elseif($bmi<=30) {
			$erg = 'Übergewicht';
		} else {
			$erg = 'starkes Übergewicht';
		}
		*/
		switch(true) {
			case $bmi < 19 || ($bmi <20 && $geschlecht == 'm'):
				$erg = 'Untergewicht';
				break;
			case $bmi < 25 || ($bmi < 26 && $geschlecht == 'm'):
				$erg = 'Normalgewicht';
				break;
			case $bmi<=30:
				$erg = 'Übergewicht';
				break;
			default:
				$erg = 'starkes Übergewicht';
		}
		
		echo "Sie haben einen BMI-Wert von $bmi und haben damit $erg.";
		
	} else {
		echo "Die eingegebenen Daten sind ungültig<br>";
	}
	
}




?>


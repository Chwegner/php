<?php 
// Aufgabe 1:
// Über ein Formular soll es möglich sein eine Zeichenkette einzugeben.
// Wird das Formular abgeschickt soll geprüft werden, ob das Wort "Test"
// eingegeben wurde. Falls ja, soll die Meldung
// "Eingabe korrekt" angezeigt werden 
// - ansonsten die Meldung "Eingabe falsch".
?>
<form action="funktionen.php" method="post">
<input type="text" name="eingabe">
<input type="submit" name="senden" value="Abschicken">
</form>
<?php
// Wurde das Formular abgeschickt?
if(isset($_POST["senden"])) {
	if(strtoupper($_POST["eingabe"]) == "TEST") {
		echo "Eingabe korrekt";
	} else {
		echo "Eingabe falsch";	
	}
}

// Aufgabe 2:
// Schreiben Sie eine Funktion mit dem Namen "htmlListe()".
// Die Funktion soll die Inhalte eines zu übergebenden Arrays 
// als HTML-Liste ausgeben.

function htmlListe(array &$array) {
	echo '<ul>';
	foreach($array as $value) {
		echo '<li>'.$value.'</li>';
	}
	echo '</ul>';
}

$obst = array('Apfel', 'Birne', 'Orange');
htmlListe($obst);

// Alternative mit return:
function htmlListe2(array &$array) {
	$str = '<ul>';
	foreach($array as $value) {
		$str .= '<li>'.$value.'</li>';
	}
	$str .= '</ul>';
	return $str;
}
echo strtoupper(htmlListe2($obst));

// Aufgabe 3:
// Schreiben Sie eine Funktion mit dem Namen "datum()". Die Funktion soll das aktuelle
// Datum zurückliefern (z.B. 28.08.2018). Sie können die Aufgabe mit Hilfe der Funktion
// date() lösen.

function datum() {
	return date("d.m.Y");	
}

//echo datum();

function datum2() {
	$wochentag = array('Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 
	'Donnerstag', 'Freitag', 'Samstag');
	return "Heute ist ".$wochentag[date('w')].", der ".date("d.m.Y");	
}

echo datum2();





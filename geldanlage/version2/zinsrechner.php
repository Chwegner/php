<?php

/*
 * Eingabe Betrag und Anzahl an Jahren, die der Betrag angelegt werden soll
 * 
 * Zinssatz in Abhaengikeit der Laufzeit:
 * <= 3 Jahre: 3%
 * <= 5 Jahre: 4%
 * <= 10 Jahre: 5%
 * > 10 Jahre: 6%
 * D
 * 
 * Das Programm soll dann fuer jedes Jahr eine Textzeile mit dem aktuellen Jahr und der Summe inkl. Zinsen in die Seite schreiben.
 * Falls moeglich, dass Ganze als Tabelle darstellen.
 * 
 */

//Eingaben in Variablen speichern 
$jahre = $_POST["jahre"];
$betrag = $_POST["betrag"];

//arrays fuer Ausgabewerte - index = Jahre Laufzeit
$ergBetrag = array();
$ergZinsen = array();

//$ergebnis nach 0 Jahren
$ergBetrag[0] = $betrag;
$ergZinsen[0] = 0;

//Zinzsatz ermitteln
//Moeglichkeit 1
/*
switch($jahre){
	case 1:
	case 2:
	case 3:
		$zins = 0.03;
		break;
	case 4:
	case 5:
		$zins = 0.04;
		break;
	case 6:
	case 7:
	case 8:
	case 9:
	case 10:
		$zins = 0.05;
		break;
	default:
		$zins = 0.06;
}
*/

//Moeglichkeit 2 ( mit if-ifelse-else)
if($jahre <= 3){
	$zinsen = 0.03;
}elseif($jahre <= 5){
	$zinsen = 0.04;
}elseif($jahre <= 10){
	$zinsen = 0.05;
}else{
	$zinsen = 0.06;
}

//Zinssatz (zur Ausgabe im Text)
$zinssatz = $zinsen * 100;

//Berechnung
for( $i = 0 ; $i < $jahre ; $i++ ){
	//
	$ergBetrag[$i+1] = $ergBetrag[$i] + ( $ergBetrag[$i] * $zinsen );
	$ergZinsen[$i+1] = $ergBetrag[$i] * $zinsen;
}

//Ausgabe testen
/*
print_r($ergBetrag);
echo "<br />";
print_r($ergZinsen);
*/

//Ausgabe zusammenbauen
echo '
<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">

<title>Zinsrechner</title>

<style>
body {
	font-family: arial,sans-serif;
}

h1{
	font-size: 35px;
	color:green;
}

a:link, a:visited {
    color: black;
    text-decoration: none;
}

a:active, a:hover {
    color: red;
}

#headline{
	margin: 0 auto;
	margin-top: 10px;
	padding:5px;
	width: 500px;
	height: auto;
	text-aligen:center;
}

#ausgabe{
	margin: 0 auto;
	margin-top: 10px;
	padding:30px;
	width: 500px;
	text-align:center;
	height: auto;
	border:1px solid green;
}

p{
	text-align:left;
}

table{
	width:440px;
	margin-left:20px;
	text-align:right;
}
th{
	padding:5px;
	padding-right:35px;
	border-bottom:1px solid black;
}

td{
	padding:5px;
	padding-right:35px;
}

</style>

</head>

<body>

<div id="headline">

<h1>Auswertung</h1>

</div>
	
<div id="ausgabe">
<p>Für Ihre Einlage in Höhe von <b>'.number_format($betrag,2,",",".").' &euro;</b>,
ergibt sich bei einem Zinstaz von <b>'.$zinssatz.' %</b>
und einer Laufzeit von <b>'.$jahre.' Jahren</b>,
ein Kapital in Höhe von <b>'.number_format($ergBetrag[$jahre],2,",",".").' &euro;</b></p>

<p>Die jährliche Verzinsung Ihrer Einlage können Sie der folgenden Tabelle entnehmen:</p>

<p>
<table>
<tr>
<th>Jahre</th>
<th>Zinsen</th>
<th>Kapital</th>
</tr>
';

for( $j = 0; $j <= $jahre; $j++){
	echo "<tr><td>".$j."</td><td>".number_format($ergZinsen[$j],2,',','.')." &euro;</td><td>".number_format($ergBetrag[$j],2,',','.')." &euro;</td></tr>";
}

echo '
</table>
</p>

<br />
<br />
<a href="zinsrechner.html">Neue Berechnung</a>
<br />
</p>
</div>

</body>

</html>

';

?>

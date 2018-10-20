<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Zinsberechnung</title>
    <style>
		table , th, td {
			border:1px solid;
			border-collapse: collapse;
		}
		tbody tr:nth-child(even) { 
		  background-color: #d3d3d3; 
		  color: #000; 
		}
		th {
			text-align: center;
			background-color: #0000ff;
			color: #ffffff;
		}
			
		td {
			vertical-align:top;
			text-align: right;
		}

    </style>
  </head>
  <body>
<?php
// POST Variablen
$summe = $_POST["summe"];
$jahre = $_POST["jahre"];

$zs = 0; // Zinssatz
$jzsum = 0; // Jahreszins
$jsum = $summe; // Jahressumme
$jsum_ar = array(); // Array der Jahressummen
$jzsum_ar = array(); // Array der Jahreszinsen

// Zinssatz einstellen
if($jahre <=3){
	$zs = 0.03;
}elseif($jahre == 4 || $jahre == 5) {
	$zs = 0.04;
}elseif($jahre > 5 && $jahre <= 10) {
	$zs = 0.05;
}else {
	$zs = 0.06;
}

// Zinsen berechnen
for($i=0;$i<$jahre;$i++) {
	$jzsum = $jsum * $zs;
	$jzsum_ar[] = $jzsum;
	$jsum += $jzsum;
	$jsum_ar[] = $jsum;
}

$str_sum = number_format($summe,2,",",".");
$str_zs = number_format($zs*100);
echo "<h2>Zinsberechnung</h2>";
echo "<p>Sie möchten $str_sum € für $jahre Jahre anlegen.<br>";
echo "Wir bieten Ihnen hierfür einen Zinssatz von $str_zs% per Anno.</p>";

if($jahre == 1) {
	$jsum = number_format($jsum_ar[0],2,",",".");
	$jzsum = number_format($jzsum_ar[0],2,",",".");
	echo "<p> Sie erhalten nach einem Jahr $jsum €.<br>";
	echo "Die Zinsen belaufen sich auf $jzsum €.";
}
else {
	echo "<h3>Ihre Zinsberechnung für $jahre Jahre</h3>";
?>
	<table>
		<colgroup>
			<col width="80">
			<col width="150">
			<col width="200">
		</colgroup>
		<thead>
			<tr>
				<th>Jahre</th> 
				<th>Zinsen</th> 
				<th>Jahressumme</th> 
			</tr>
		</thead>
		<tbody>
<?php
	for($i = 0; $i < $jahre; $i++){
		$jsum = number_format($jsum_ar[$i],2,",",".");
		$jzsum = number_format($jzsum_ar[$i],2,",",".");
		$j = $i + 1;
		echo "<tr> <td>$j</td> <td>$jzsum €</td> <td>$jsum €</td> </tr>";
	}
	echo "</tbody> </table>";
	$zinsen = number_format(array_sum($jzsum_ar),2,",",".");
	echo "<p>Sie erhalten für $jahre Jahr(e) $zinsen € Zinsen.<p/>";
	echo "<p>Vielen Dank für Ihre Anfrage.</p>";
}

?>
	</body>
</html>

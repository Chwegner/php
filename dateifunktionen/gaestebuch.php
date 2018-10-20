<?php 
// Aufgabe: Schreiben Sie ein einfaches dateibasiertes Gästebuch.
// Über ein Formular soll es möglich sein, einen Namen, eine EMail-Adresse 
// und einen Kommentar eingeben zu können. Wird das Formular abgeschickt, 
// sollen die Formulareingaben in eine Datei mit dem Namen 'gaestebuch.txt' 
// gespeichert werden. Neue Einträge sollen immer an die Datei angehängt werden.

// Unter dem Formular sollen die bisherigen Gästebucheinträge angezeigt werden.
?>
<form action="aufgabe_nachmittags_31_08_2018.php" method="post">
<input type="text" name="name" placeholder="Ihr Name"><br>
<input type="text" name="email" placeholder="Ihre EMail-Adresse"><br>
<textarea cols="20" rows="5" name="kommentar" placeholder="Ihr Kommentar"></textarea><br>
<input type="submit" name="senden" value="Eintragen">
</form>
<?php 
$filename = 'gaestebuch.txt';
// Submit-Button gedrückt?
if(isset($_POST["senden"])) {
	$name  	   = strip_tags(trim($_POST["name"]));
	$email 	   = strip_tags(trim($_POST["email"]));
	$kommentar = htmlentities(trim($_POST["kommentar"]));
	
	if($name && $email && $kommentar) {
		$handle = fopen($filename,'a');
		$save   = "$name ($email) schrieb: $kommentar<hr>\r\n";
		fwrite($handle,$save);
		fclose($handle);
	} else {
		echo "Alle Felder müssen ausgefüllt werden!<br>";
	}	
}

if(file_exists($filename)) {
	$handle = fopen($filename,'r');
	echo fread($handle,filesize($filename));
	fclose($handle);
}


?>

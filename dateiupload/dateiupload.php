<?php 

echo '<pre>';
print_r($_FILES);
echo '</pre>'



?>

<form action="dateiupload.php" method="post" enctype="multipart/form-data">
<input type="file" name="datei">
<input type="submit" name="senden" value="Hochladen">
</form>
<?php 

if(isset($_FILES['datei']['error']) && $_FILES['datei']['error'] == 0) {
	$name 	  = $_FILES['datei']['name'];
	$tmp_name = $_FILES['datei']['tmp_name'];
	$type     = $_FILES['datei']['type'];
	$size     = $_FILES['datei']['size'];
	
	// Aufgabe:
	// Nur Bilder vom Typ JPG und PNG sollen zugelassen werden.
	// Das Bild soll max 800 Kbyte groß sein (800*1024)
	// Geben Sie passende Meldungen aus 
	
	if($type == "image/jpeg" || $type == "image/png") {
		if($size <= 800*1024) {
			move_uploaded_file($tmp_name,'upload/'.time().'_'.$name);
			echo "Bild wurde erfolgreich hochgeladen<br>";
		} else {
			 echo "Das Bild darf max. 800 Kilobyte groß sein<br>";
		}
	} else {
		echo "Nur Bilder vom Typ JPG und PNG sind zugelassen<br>";
	}	
}




?>
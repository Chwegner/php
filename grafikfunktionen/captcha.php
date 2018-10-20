<?php 

// Anzeige von 5 verschiedene zufälligen Großbuchtstaben
$abc = range('A','Z');
shuffle($abc);
// Die ersten 5 Elemente des Arrays anzeigen lassen
$captcha = '';
for($i=0; $i<5; $i++) {
	$captcha .= $abc[$i];
}
// Font-Array anlegen
$font = array('verdanab.ttf','arialbd.ttf','BRITANIC.TTF','COOPBL.TTF','timesbd.ttf');
// Font-Array durchmischen
shuffle($font);
$im = imagecreate(200,50);
imagecolorallocate($im,220,220,220);
for($i=0,$x=10; $i<5; $i++, $x+=35) {
	$size  = mt_rand(12,30);
	$angle = mt_rand(-30,30);
	$y     = 35;
	$color = imagecolorallocate($im,mt_rand(0,200),mt_rand(0,200),mt_rand(0,200));
	// Font-Datei aus dem Array auswählen
	$fontfile = "c:/windows/fonts/".$font[$i];
	$text  = $abc[$i];
	imagettftext($im,$size,$angle,$x,$y,$color,$fontfile,$text);
	
	imagearc($im,mt_rand(0,200),mt_rand(0,50),mt_rand(50,200),mt_rand(50,200),0,0,$color);
	imageline($im,0,mt_rand(0,50),200,mt_rand(0,50),$color);
	
}
imagepng($im,'captcha.png');
?>
<img src="captcha.png" alt="Captcha"><br>
<form action="captcha.php" method="post">
<input type="text" name="captcha" size="5" maxlength="5">
<input type="submit" name="senden" value="Check">
</form>

<?php 

if(isset($_POST["senden"])) {
	echo $_POST["captcha"];
	echo '<br>';
	echo $captcha;
	echo '<br>';
}




?>





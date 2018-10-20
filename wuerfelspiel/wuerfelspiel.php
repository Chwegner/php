<?php 

$sp1 = 0;
$sp2 = 0;
  

while($sp1<24 && $sp2<24){

	$w1 = mt_rand(1,6);  
	$w2 = mt_rand(1,6);  
	
	$sp1 += $w1;
	$sp2 += $w2;
	
	echo "<p>Spieler 1 hat eine $w1 gewürfelt, insgesamt hat er $sp1<br>"; 
	echo "Spieler 2 hat eine $w2 gewürfelt, insgesamt hat er $sp2</p>"; 
}

if($sp1>$sp2){
	echo "<h3>Spieler 1 hat gewonnen</h3>";
}elseif($sp1<$sp2){
	echo "<h3>Spieler 2 hat gewonnen</h3>";
}else{
	echo "<h3>Unentschieden</h3>";
}


?>
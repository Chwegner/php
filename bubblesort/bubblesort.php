<?php 
/*
E	D	C	B	A 	
D	C	B	A	B
C	B	A	C	C
B	A	D	D	D
A   	E	E	E	E
*/
function bubblesort(array &$array) {
	$count = count($array);
	for($j=0; $j<$count-1; $j++) {
		for($i=0; $i<$count-1-$j; $i++) {
			if($array[$i] > $array[$i+1]) {
				$temp 	  = $array[$i];
				$array[$i] = $array[$i+1];
				$array[$i+1] = $temp;
			}
		}
	}
	return true;
}

$abc = array('E','D','C','B','A');
bubblesort($abc);
echo '<pre>';
print_r($abc);
echo '</pre>';

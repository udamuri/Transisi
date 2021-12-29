<?php

function stringCheck($str = "") {
	$length = strlen($str);
	$lowerCount = 0;
	for ($i=0; $i<$length; $i++) {
		if(ctype_lower($str[$i])) {
			$lowerCount += 1;
		}
	}

	return $lowerCount;
}

echo "TranSISI : " . stringCheck("TranSISI");
echo PHP_EOL;
echo "Muri Budiman : " . stringCheck("Muri Budiman");




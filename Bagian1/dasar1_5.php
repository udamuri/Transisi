<?php

function makeCryp($str = "") {
	$length = strlen($str);
	$newText = "";
	for ($i=0; $i<$length; $i++) {
		if(($i + 1) % 2 == 0) {
			$dec = ord($str[$i]) - ($i + 1);
		} else {
			$dec = ord($str[$i]) + ($i + 1);
		}
		
		$newText .= chr($dec);
	}

	return $newText;
}

echo "DFHKNQ :" . makeCryp("DFHKNQ");
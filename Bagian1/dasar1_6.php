<?php

function arraySearch($arr, $str) {
	$length = strlen($str);
	$newArray = [];
	for ($i=0; $i<$length; $i++) {
		$newArray[] = $str[$i];
	}

	$arraySearch = [];
	$oneline = 0;
	foreach($arr as $key => $value) {
		$count = 0;
		foreach($newArray as $k => $v) {
			if(in_array($v, $value)) {
				$count++;
				$arraySearch[] = ['status' => true, 'label' => $v];
			}
		}
		if($count > 2 ) {
			$oneline = $count;
		}
		
	}

	echo $oneline;
}

$arr = [
	['f', 'g', 'h', 'i'],
	['j', 'k', 'p', 'q'],
	['r', 's', 't', 'u']
];

//arraySearch($arr, 'fghi'); // true
//echo arraySearch($arr, 'fghp'); // true
//echo arraySearch($arr, 'fjrstp'); // true
//echo arraySearch($arr, 'fghq'); // false

//echo arraySearch($arr, 'fst'); // false
//echo arraySearch($arr, 'pqr'); // false
arraySearch($arr, 'fghh'); // false
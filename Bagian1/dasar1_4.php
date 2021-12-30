<?php

function replaceTable($key, $arrayData) {
	if($key == 1) {
		$arrayData[0] = "*";
		$arrayData[1] = "*";
		$arrayData[4] = "*";
		$arrayData[6] = "*";
	}

	if($key == 2) {
		$arrayData[1] = "*";
		$arrayData[2] = "*";
		$arrayData[4] = "*";
		$arrayData[5] = "*";
	}

	if($key == 3) {
		$arrayData[0] = "*";
		$arrayData[2] = "*";
		$arrayData[5] = "*";
		$arrayData[5] = "*";
	}

	return $arrayData;
}

function makeTable() {
	$arrayData = [];
	$dummyData = [];
	for($i=1;$i<=64;$i++) {
		$dummyData[] = $i;
		if($i % 8 == 0) {
			$arrayData[] = $dummyData;
			$dummyData = [];
		}
	}

	$start = 0;
	foreach($arrayData as $key => $value ) {
		if($start % 3 == 0) {
			$start = 1;
		} else {
			$start++;
		}

		$replace = replaceTable($start, $value);
		foreach($replace as $k => $v) {
			echo $v . " ";
		}
		echo PHP_EOL;
	}
}

makeTable();


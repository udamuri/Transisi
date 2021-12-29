<?php

function getUBT($str = "") {
	$arrString = explode(' ', $str);

	$unigram = "";
	foreach ($arrString as $value) {
		$unigram .= "{$value}, ";
	}

	$unigram = substr($unigram, 0, -2);

	$bigram = "";
	foreach ($arrString as $key => $value) {
		if( ($key + 1) % 2 == 0 ) {
			$bigram .= "{$value}, ";
		} else {
			$bigram .= "{$value} ";
		}
	}

	$bigram = substr($bigram, 0, -2);
	
	$trigram = "";
	foreach ($arrString as $key => $value) {
		if( ($key + 1) % 3 == 0 ) {
			$trigram .= "{$value}, ";
		} else {
			$trigram .= "{$value} ";
		}
	}

	$trigram = substr($trigram, 0, -2);

	$result = "UNIGRAM : {$unigram}" . PHP_EOL;
	$result .= "BIGRAM : {$bigram}" . PHP_EOL;
	$result .= "TRIGRAM : {$trigram}" . PHP_EOL;

	return $result;

}

echo getUBT("Jakarta adalah ibukota negara Republik Indonesia");




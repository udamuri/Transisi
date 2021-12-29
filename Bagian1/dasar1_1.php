<?php

$nilai = "72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86";
$arrNilai = explode(" ", $nilai);
asort($arrNilai);

$count = count($arrNilai);
$total = array_sum($arrNilai);

$ratarata = $total / $count;
$nilaiTerendah = "";
$nilaiTertinggi = "";

$minI = 7;
$maxI = $count - 7;
$i = 1;
foreach($arrNilai as $key => $value) {
	if($i <= $minI) {
		$nilaiTerendah .= "{$value}, ";
	}

	if($i > $maxI) {
		$nilaiTertinggi .= "{$value}, ";
	}

	$i++;
}

echo "Nilai Rata Rata : {$ratarata}";
echo PHP_EOL;
echo "7 Nilai Tertinggi : ". substr($nilaiTertinggi, 0, -2);
echo PHP_EOL;
echo "7 Nilai Terendah : ". substr($nilaiTerendah, 0, -2);


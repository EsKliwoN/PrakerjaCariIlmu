<?php

function perkenalan($nama, $usia=20){
    $hasil = $nama + $usia;
    echo "hai $nama";
    echo " onegaishimasu";
    echo " yosha!!! <br>";
    echo "Umurmu pasti $usia kan!";
    echo "<hr>";
    return $hasil;
}

function faktorial($angka){
    if($angka < 2){
        return 1;
    } else {
        return ($angka * faktorial($angka-1));
    }
}

echo 'Gimana rasanya '.perkenalan(20,35).' tahun!!!';
echo "<hr>";
echo 'faktorial 5 adalah '.faktorial(5);

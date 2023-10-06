<?php

$nilai = 50;

if($nilai > 90){
    $grade = "A+";
}elseif($nilai > 80){
    $grade = "A";
}elseif($nilai > 70){
    $grade = "B";
}elseif($nilai > 60){
    $grade = "B";
}else{
    $grade = "JELEK";
}

echo "Nilai anda $nilai dengan grade $grade";
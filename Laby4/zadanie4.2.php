<?php
function factorialRecursive($n) {
    if($n<2) {
        return 1;
    }
    else {
        return $n*factorialRecursive($n-1);
    }
}
function factorial($n) {
    $silnia = 1;
        for ($i = $n; $i > 1; $i--) {
        $silnia *= $i;
    }
        return $silnia;
}

echo "Podaj liczbę: ";
$number=(int)readLine();
$diff=0;

$timeStart1=microtime(true);
factorialRecursive($number);
$timeStop1=microtime(true);
$time1=$timeStop1-$timeStart1;

$timeStart2=microtime(true);
factorial($number);
$timeStop2=microtime(true);
$time2=$timeStop2-$timeStart2;

//echo "$time1\n";
//echo "$time2\n";
if($time1>$time2){
    $diff=round($time1-$time2,4);
    echo 'Funkcja rekurencyjna licząca silnie była szybsza niż jej zwykły odpowiednik o '.$diff.' sekund';
}
else{
    $diff=round($time2-$time1, 4);
    echo 'Zwykły odpowiednik był szybszy niż niż funkcja rekurencyjnie licząca silnie o '.$diff.' sekund';
}
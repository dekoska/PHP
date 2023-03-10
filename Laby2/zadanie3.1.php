<?php
$arr=array_fill(0,10,1);
for($i=0;$i<10; $i++){
    $arr[$i]*=rand(57,157);
}

$najwieksza=0;
for($i=0; $i<10; $i++) {
    if ($arr[$i] > $najwieksza) {
        $najwieksza = $arr[$i];
    }
}
echo $najwieksza;

$najwieksza=0;
$x=0;
while($x<10) {
    if ($arr[$x] > $najwieksza) {
        $najwieksza = $arr[$x];
    }
    $x++;
}
echo ("\n$najwieksza");

$najwieksza=0;
$x=0;
do {
    if ($arr[$x] > $najwieksza) {
        $najwieksza = $arr[$x];
    }
    $x++;
} while($x<10);
echo ("\n$najwieksza");

$najwieksza=0;
$x=0;
foreach($arr as $number){
    if ($number > $najwieksza) {
        $najwieksza = $number;
    }
}
echo ("\n$najwieksza");
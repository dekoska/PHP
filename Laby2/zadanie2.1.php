<?php
$arr=array_fill(0,10,1);
for($i=0;$i<10; $i++){
    $arr[$i]*=rand(57,157);
}
echo ("Podaj indeks tablicy, który chcesz zobaczyć ");
$zmienna=(int)readLine();
echo $arr[$zmienna];

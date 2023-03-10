<?php
echo ("Podaj liczbę rzutów ");
$iloscRzutow=(int)readLine();
$arr=array_fill(0,$iloscRzutow,1);

for($i=0;$i<$iloscRzutow; $i++) {
    $arr[$i] *= rand(1, 6);
}
foreach($arr as $number){
    echo ("$number ");
}

<?php
echo ("Podaj dlugosc boku ");
$dlugosc=(int)readLine();

for($i=1;$i<=$dlugosc; $i++){
    for($j=1; $j<=$dlugosc; $j++){
            echo $i*$j;
            echo " ";
    }
    echo ("\n");
}

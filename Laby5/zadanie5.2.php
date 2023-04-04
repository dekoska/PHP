<?php
function ifFileExists($file){
if(!file_exists($file)){
    $fo=fopen($file,"w");
    fwrite($fo,"1");
    echo "Liczba odwiedzin: 1";
    }
else counter($file);
}
function counter($file){
    $fo=fopen($file,"r");
    $number=fgets($fo);
    fclose($fo);
    $f=fopen($file,"r+");
    $number+=1;
    fwrite($f,"$number");
    fclose($f);
    echo "Liczba odwiedzin: $number";
}

ifFileExists('licznik.txt');

?>

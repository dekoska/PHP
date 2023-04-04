<?php
echo "Podaj adres strony: ";
$address=(string)readLine();
echo "Podaj opis strony: ";
$description=(string)readLine();

$file='reference_list.txt';
$fo=fopen($file,"a+");
fwrite($fo,"\n$address;$description");
fclose($fo)

?>

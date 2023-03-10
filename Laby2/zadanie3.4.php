<?php
echo "Podaj liczbe do sprawdzenia ";
$numb=(int)readLine();
if ($numb <= 2) {
    echo "$numb nie jest liczbą pierwszą";
    return 0;
}

for($i=2; $i<$numb; $i++) {
    if ($numb % $i == 0){
        echo "$numb nie jest liczbą pierwszą";
        return false;
    }
    else {
        echo "$numb jest liczbą pierwszą";
        return true;
    }
}


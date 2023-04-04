<?php
$file=file("ip.txt");
$ip=$_SERVER['REMOTE_ADDR'];
foreach($file as $line){
    if($ip==$line){
    include 'zadanie3.33.php';
    }
    else {
        include 'zadanie3.55.php';
        break;
    }
}


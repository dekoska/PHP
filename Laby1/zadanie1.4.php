<?php
$pesel=(int)readLine();
$arr = str_split($pesel);
echo ("Data to $arr[4]$arr[5]-$arr[2]$arr[3]-19$arr[0]$arr[1]");
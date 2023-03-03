<?php
$arr[0]="jeden";
$arr[1]="dwa";
$zdanie='Jeden kot to nie dwa koty';
Str_ireplace($arr[0],'*',$zdanie);
Str_ireplace($arr[1],'*',$zdanie);
echo "$zdanie";


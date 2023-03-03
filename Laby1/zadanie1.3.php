<?php
$arr=array("jeden","dwa");
$sentence='jeden kot to nie dwa koty';
$false=[$arr[0],$arr[1]];
$change=['*','*'];
$newsentence=str_replace($false,$change,$sentence);
echo $newsentence;


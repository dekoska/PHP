<?php
if(!isset($_COOKIE['person']))
    $person=1;
else{
    $person= intval($_COOKIE['person']);
    $person++;
}
setCookie("person","$person");
if($person==10)
    echo "Dzień dobry :)";

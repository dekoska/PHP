<?php
$arr=array(
    'polska' => 'polska',
    'niemcy' => 'niemiecka',
    'francja' => 'francuska',
    'anglia' => 'angielska',
    'rosja' => 'rosyjska',
    'stany zjednoczone' => 'amerykańska'
);
echo ("Podaj kraj ");
$zmienna=(string)readLine();
echo $arr[$zmienna];

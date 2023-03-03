<?php
echo("Wybierz jakiej figury pole chcesz obliczyć: \n1-trójkąt \n2-prostokąt \n3-trapez\n");
$choice=(int)readline();
switch($choice){
    case 1: echo ("Podaj wysokość ");
        $h=(int)readline();
        echo ("Podaj długość podstawy ");
        $a=(int)readline();
        $trianglefield=($a*$h)/2;
        echo ("Pole trójkąta o podanych wymiarach to $trianglefield");
        break;

    case 2: echo ("Podaj długość pierwszego boku ");
        $x=(int)readline();
        echo ("Podaj długość drugiego boku ");
        $y=(int)readline();
        $rectanglefield=$x*$y;
        echo ("Pole prostokąta o podanych wymiarach to $rectanglefield");
        break;

    case 3: echo ("Podaj długość pierwszej podstawy ");
        $a=(int)readline();
        echo ("Podaj długość drugiej podstawy ");
        $b=(int)readline();
        echo ("Podaj długość wysokości ");
        $H=(int)readline();
        $trapezefield=(($a+$b)*$H)/2;
        echo ("Pole prostokąta o podanych wymiarach to $trapezefield");
        break;
}

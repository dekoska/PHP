<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
$date=0;
$date=intval($_POST['date']);
?>

<FORM action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <h3>Obliczanie daty wielkanocny</h3>
        <TABLE>
            <TR>
                <TD>Podaj rok</TD>
                <TD><INPUT type=text name="date"></TD>
                <TD><INPUT TYPE="submit" value="Oblicz"></TD>
            </TR>
        </TABLE>
</FORM>

<?php
$x=0;
$y=0;
$a=$date%19;
$b=$date%4;
$c=$date%7;
$d=((19*$a)+$x)%30;
$f=((2*$b)+(4*$c)+(6*$d)+$y)%7;
$suma=0;
if($_SERVER["REQUEST_METHOD"]=="POST") {
    if ($date >= 1 && $date <= 1582) {
        $x = 15;
        $y = 6;
    } else if ($date >= 1583 && $date <= 1699) {
        $x = 22;
        $y = 2;
    } else if ($date >= 1700 && $date <= 1799) {
        $x = 23;
        $y = 3;
    } else if ($date >= 1800 && $date <= 1899) {
        $x = 23;
        $y = 4;
    } else if ($date >= 1900 && $date <= 2099) {
        $x = 24;
        $y = 5;
    } else if ($date >= 2100 && $date <= 2199) {
        $x = 15;
        $y = 6;
    } else {
        echo "Nieprawidłowy rok";
        return false;
    }

    if ($f == 6 && $d == 29) {
        echo "Wielkanoc jest 26 kwietnia";
    } else if ($f == 6 && $d == 28 && ((11 * $x + 11) % 30) < 19) {
        echo "Wielkanoc jest 18 kwietnia";
    } else if (($d + $f) < 10) {
        $suma = 22 + $d + $f;
        echo "Wielkanoc jest $suma marca";
    } else if (($d + $f) > 9) {
        $suma = $d + $f - 9;
        echo "Wielkanoc jest $suma kwietnia";
    }
}


?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>body{ background-color: hotpink} </style>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php

$liczba1=0;
$liczba2=0;
$liczba3=0;
$prosty= '';
$zaawansowany= '';
$liczba1 = intval($_POST['liczba1']);
$liczba2 = intval($_POST['liczba2']);
$liczba3 = intval($_POST['liczba3']);
$prosty = $_POST['prosty'];
$zaawansowany = $_POST['zaawansowany'];
$wynik=0;
?>
    <h1>Kalkulator</h1>
    <hr>
    <h2>Prosty</h2>

<FORM name="pierwszy" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <TABLE>
        <TR>
            <TD>Pierwsza liczba:</TD>
            <TD><INPUT type=text name="liczba1"></TD>
            <TD><SELECT name="prosty">
                    <OPTION value="dodawanie">Dodawanie</OPTION>
                    <OPTION value="odejmowanie">Odejmowanie</OPTION>
                    <OPTION value="mnozenie">Mnożenie</OPTION>
                    <OPTION value="dzielenie ">Dzielenie</OPTION>
                </SELECT></TD>
            <TD>Druga liczba:</TD>
            <TD><INPUT type=text name="liczba2"></TD>
        </TR>
        <TR>
            <TD><INPUT TYPE="submit" value="Oblicz"></TD>
        </TR>
    </TABLE>
</FORM>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {
    if ($prosty == 'dodawanie') {
        $wynik = $liczba1 + $liczba2;
        echo "Wynik to $wynik";
    }
    if ($prosty == 'odejmowanie') {
        $wynik = $liczba1 - $liczba2;
        echo "Wynik to $wynik";
    }
    if ($prosty == 'mnozenie') {
        $wynik = $liczba1 * $liczba2;
        echo "Wynik to $wynik";
    }
    if ($prosty == 'dzielenie') {
        $wynik = $liczba1 % $liczba2;
        echo "Wynik to $wynik";
    }
}
?>


<FORM name="drugi" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <TABLE>
        <TR>
            <TD><h2>Zaawansowany</h2></TD>
        </TR>
        <TR>
            <TD>Liczba:</TD>
            <TD><INPUT type=text name="liczba3"></TD>
            <TD><SELECT name="zaawansowany">
                    <OPTION value="sinus">Sinus</OPTION>
                    <OPTION value="cosinus">Cosinus</OPTION>
                    <OPTION value="tangens">Tangens</OPTION>
                    <OPTION value="binarnedzies">Binarne na dziesiętne</OPTION>
                    <OPTION value="dziesietnebin">Dzisiętne na binarne</OPTION>
                    <OPTION value="dziesietneszesn">Dzisiętne na szesnastkowe</OPTION>
                    <OPTION value="szesnastkowedzies">Szesnastkowe na dziesiętne</OPTION>
                    <OPTION value="stopnie">Stopnie na radiany</OPTION>
                    <OPTION value="radiany">Radiany na stopnie</OPTION>
                </SELECT></TD>
        </TR>
        <TR>
            <TD><INPUT TYPE="submit" value="Oblicz"></TD>
        </TR>
    </TABLE>
</FORM>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {
    if ($zaawansowany == 'sinus') {
        $wynik = sin($liczba3);
        echo "Wynik to $wynik";
    }
    if ($zaawansowany == 'cosinus') {
        $wynik = cos($liczba3);
        echo "Wynik to $wynik";
    }
    if ($zaawansowany == 'tangens') {
        $wynik = tan($liczba3);
        echo "Wynik to $wynik";
    }
    if ($zaawansowany == 'binarnedzies') {
        $wynik = bindec($liczba3);
        echo "Wynik to $wynik";
    }
    if ($zaawansowany == 'dziesietnybin') {
        $wynik = decbin($liczba3);
        echo "Wynik to $wynik";
    }
    if ($zaawansowany == 'dzisietnyszesn') {
        $wynik = dechex($liczba3);
        echo "Wynik to $wynik";
    }
    if ($zaawansowany == 'szesnastkowydzies') {
        $wynik = hexdec($liczba3);
        echo "Wynik to $wynik";
    }
    if ($zaawansowany == 'stopnie') {
        $wynik = ($liczba3 * 3.14) / 180;
        echo "Wynik to $wynik";
    }
    if ($zaawansowany == 'radiany') {
        $wynik = ($liczba3 * 180) / 3.14;
        echo "Wynik to $wynik";
    }
}
?>

</body>
</html>
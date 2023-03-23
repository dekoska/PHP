<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
$pesel='';
$pesel=($_POST['pesel']);
$gender='';
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<fieldset>
    <legend>Podaj pesel</legend>
    <table>
        <tr>
            <td>Pesel: </td>
            <td><input type=text name="pesel"</td>
        </tr>
        <tr>
            <td><input type="submit" value="Prześlij"></td>
        </tr>
    </table>
</form>

<?php ;
if($_SERVER["REQUEST_METHOD"]=="POST") {
    $array = str_split($pesel);
    if ($array[9] % 2 == 0) $gender = 'kobieta';
    else $gender = 'mężczyzna';
    //echo("Data to $array[4]$array[5]-$array[2]$array[3]-19$array[0]$array[1], płeć to: $gender");
    $year=0;
    $month=0;
    $day=0;
    $year = 10 * $array[0];
    $year += $array[1];
    $month = 10 * $array[2];
    $month += $array[3];
        if ($month > 80 && $month < 93) {
            $year += 1800;
            $month-=80;
        }
        else if ($month > 0 && $month < 13) {
            $year += 1900;
        }
        else if ($month > 20 && $month < 33) {
            $year += 2000;
            $month-=20;
        }
        else if ($month > 40 && $month < 53) {
            $year += 2100;
            $month-=40;
        }
        else if ($month > 60 && $month < 73) {
            $year += 2200;
            $month-=60;
        }
        $day = 10 * $array[4];
        $day += $array[5];

        if($day<10){
            $day="0$day";
        }
        if($month<10){
            $month="0$month";
        }

        $date=date("$day.$month.$year");

        echo "Data urodzenia to $date. Płeć to $gender";
    }
?>

</body>
</html>


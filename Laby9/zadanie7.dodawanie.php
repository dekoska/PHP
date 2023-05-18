<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
include 'Samochod.php';
include 'Uzytkownik.php';
include 'zadanie7.php';

$marka='';
$model='';
$cena=0;
$rok=0;
$opis='';

if(isset($_GET['marka']) && isset($_GET['model']) && isset($_GET['cena']) && isset($_GET['rok']) && isset($_GET['opis'])){
    $samochod=new Samochod($_GET['marka'], $_GET['model'], $_GET['cena'], $_GET['rok'], $_GET['opis']);
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
    <h2>Dodaj samochód</h2>
    <table>
    <tr>
        <td>Podaj marke samochodu</td>
        <td><input type="text" name="marka"></td>
    </tr>
    <tr>
        <td>Podaj model samochodu</td>
        <td><input type="text" name="model"></td>
    </tr>
        <tr>
            <td>Podaj cene samochodu</td>
            <td><input type="text" name="cena"></td>
        </tr>
        <tr>
            <td>Podaj rok produkcji samochodu</td>
            <td><input type="text" name="rok"></td>
        </tr>
        <tr>
            <td>Podaj opis samochodu*</td>
            <td><input type="text" name="opis"></td>
    </tr>
        <tr>
            <td><input type="submit" value="Dodaj samochód"</td>
        </tr>
    </table>
</form>

<?php
$db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if(isset($_GET['marka']) && isset($_GET['model']) && isset($_GET['cena']) && isset($_GET['rok']) && isset($_GET['opis'])) {
        if (!$db_connection) {
            echo "<h2>Błąd połączenia z bazą!</h2>";
            exit();
        }
        else {
                if(isset($_SESSION['user'])) {
                    $user = $_SESSION['user'];
                    $query = "insert into samochody (marka, model, cena, rok, opis,id_uzytkownik) values ('{$samochod->getMarka()}','{$samochod->getModel()}','{$samochod->getCena()}','{$samochod->getRok()}','{$samochod->getOpis()}','{$user->getId()}');";
                }
                else {
                    $query = "insert into samochody (marka, model, cena, rok, opis,id_uzytkownik) values ('{$samochod->getMarka()}','{$samochod->getModel()}','{$samochod->getCena()}','{$samochod->getRok()}','{$samochod->getOpis()}',1);";
                }
                $result = mysqli_query($db_connection, $query);
                if (!$result) {
                    echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
                    exit();
                }
                else {
                    echo "Dodawanie samochodu przebiegło pomyślnie";
                    exit();
                }
        }
    }
}
mysqli_close($db_connection);
?>

</body>
</html>

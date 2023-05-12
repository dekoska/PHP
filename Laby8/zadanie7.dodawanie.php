<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
include 'zadanie7.php';
$make='';
$model='';
$price=0;
$year=0;
$description='';

if(isset($_GET['make']) && isset($_GET['model']) && isset($_GET['price']) && isset($_GET['year']) && isset($_GET['description'])){
    $make=$_GET['make'];
    $model=$_GET['model'];
    $price=$_GET['price'];
    $year=$_GET['year'];
    $description=$_GET['description'];
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
    <h2>Dodaj samochód</h2>
    <table>
    <tr>
        <td>Podaj marke samochodu</td>
        <td><input type="text" name="make"></td>
    </tr>
    <tr>
        <td>Podaj model samochodu</td>
        <td><input type="text" name="model"></td>
    </tr>
        <tr>
            <td>Podaj cene samochodu</td>
            <td><input type="text" name="price"></td>
        </tr>
        <tr>
            <td>Podaj rok produkcji samochodu</td>
            <td><input type="text" name="year"></td>
        </tr>
        <tr>
            <td>Podaj opis samochodu*</td>
            <td><input type="text" name="description"></td>
    </tr>
        <tr>
            <td><input type="submit" value="Dodaj samochód"</td>
        </tr>
    </table>
</form>

<?php
session_start();
$db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if(isset($_GET['make']) && isset($_GET['model']) && isset($_GET['price']) && isset($_GET['year']) && isset($_GET['description'])) {
        if (!$db_connection) {
            echo "<h2>Błąd połączenia z bazą!</h2>";
            exit();
        }
        else {
                if(isset($_SESSION['current_user'])) {
                    $current_user = $_SESSION['current_user'];
                    $query = "insert into samochody (marka, model, cena, rok, opis,id_uzytkownik) values ('$make','$model','$price','$year','$description','$current_user');";
                }
                else {
                    $query = "insert into samochody (marka, model, cena, rok, opis,id_uzytkownik) values ('$make','$model','$price','$year','$description',1);";
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

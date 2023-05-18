<?php
include "Uzytkownik.php";
include "Samochod.php";
include "zadanie7.php";

$id=$_GET['id'];
$db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
}
$query = "SELECT * FROM samochody WHERE id='$id'";
$result = mysqli_query($db_connection, $query);

$row=mysqli_fetch_array($result);
$marka='';
$model='';
$cena=0;
$rok=0;
$opis='';

if(isset($_GET['marka']) && isset($_GET['model']) && isset($_GET['cena']) && isset($_GET['rok']) && isset($_GET['opis'])){
    $samochod1=new Samochod($_GET['marka'], $_GET['model'], $_GET['cena'], $_GET['rok'], $_GET['opis']);
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
    <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
    <h2>Edytuj samochód</h2>
    <table>
        <tr>
            <td>Podaj marke samochodu</td>
            <td><input type="text" name="marka" value="<?php echo $row['marka']?>"></td>
        </tr>
        <tr>
            <td>Podaj model samochodu</td>
            <td><input type="text" name="model" value="<?php echo $row['model']?>"></td>
        </tr>
        <tr>
            <td>Podaj cene samochodu</td>
            <td><input type="text" name="cena" value="<?php echo $row['cena']?>"></td>
        </tr>
        <tr>
            <td>Podaj rok produkcji samochodu</td>
            <td><input type="text" name="rok" value="<?php echo $row['rok']?>"></td>
        </tr>
        <tr>
            <td>Podaj opis samochodu*</td>
            <td><input type="text" name="opis" value="<?php echo $row['opis']?>"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Wyślij"</td>
        </tr>
    </table>
</form>

<?php
    if($_SERVER["REQUEST_METHOD"]=="GET") {
        if (isset($_SESSION['user'])) {
            if (isset($_GET['marka']) && isset($_GET['model']) && isset($_GET['cena']) && isset($_GET['rok']) && isset($_GET['opis'])) {
                $db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
                $user = $_SESSION['user'];
                $query = "UPDATE samochody SET marka='{$samochod1->getMarka()}', model='{$samochod1->getModel()}', cena='{$samochod1->getCena()}', rok='{$samochod1->getRok()}', opis='{$samochod1->getOpis()}' WHERE id='{$id}';";
                if (!$db_connection) {
                    echo "<h2>Błąd połączenia z bazą!</h2>";
                    exit();
                }
                $result = mysqli_query($db_connection, $query);
                if (!$result) {
                    echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
                    exit();
                } else {
                    echo "Edycja samochodu przebiegła pomyślnie";
                    exit();
                }
            }
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        input[type=submit]{
            background-color: #b4a485;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <title>Dodawanie postu</title>
</head>
<body>

<?php
include 'zakladka.php';

$tytul='';
$tresc='';
$zdjecie='';

if(isset($_POST['tytul']) && isset($_POST['tresc'])){
    $post = new Post();
    $post->setTytul($_POST['tytul']);
    $post->setTresc($_POST['tresc']);
    date_default_timezone_set("Europe/Warsaw");
    $post->setData(date('Y-m-d'));
   }
?>

<div class="dodawanie-postu">
<form action="dodawaniepostu.php" method="post" enctype="multipart/form-data">
    <div class="tresc">
    <h2>Dodaj post</h2>
        <br>
    <table>
        <tr>
            <td>Tytuł postu </td>
            <td><input type="text" name="tytul" maxlength="200" required></td>
        </tr>
        <tr>
            <td>Treść postu </td>
            <td><TEXTAREA name="tresc" required></TEXTAREA></td>
        </tr>
        <tr>
            <td>Zdjęcie* </td>
            <td><input type="file" name="zdjecie"></td>
        </tr>
        <tr><td><br></td></tr>
        <tr>
            <td><input type="submit" value="Opublikuj post" name="submit"</td>
        </tr>
    </table>
    </div>
</form>
</div>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {
    $db_connection = mysqli_connect("localhost", "root", "", "blog");
    if (!empty($_FILES['zdjecie']['name'])) {
        $zdjecie = $_FILES['zdjecie'];

        $zdjecieNazwa = $_FILES['zdjecie']['name'];
        $zdjecieTmpNazwa = $_FILES['zdjecie']['tmp_name'];
        $zdjecieRozmiar = $_FILES['zdjecie']['size'];
        $zdjecieError = $_FILES['zdjecie']['error'];
        $zdjecieTyp = $_FILES['zdjecie']['type'];

        $zdjecieRozsz = explode('.', $zdjecieNazwa);
        $zdjecieWlasciweRozsz = strtolower(end($zdjecieRozsz));

        $dozwoloneRozsz = array('jpg', 'jpeg', 'png');

        if (in_array($zdjecieWlasciweRozsz, $dozwoloneRozsz)) {
            if ($zdjecieError == 0) {
                if ($zdjecieRozmiar < 500000) {
                    $zdjecieNowaNazwa = uniqid('', true) . "." . $zdjecieWlasciweRozsz;
                    $lokalizacjaPliku = 'Zdjecia/' . $zdjecieNowaNazwa;
                    $post->setLokalizacjaPliku($lokalizacjaPliku);
                    move_uploaded_file($zdjecieTmpNazwa, $lokalizacjaPliku);
                } else {
                    echo "Twoje zdjęcie jest za duże";
                }
            } else {
                echo "Błąd przy dodawaniu twojego zdjęcia";
            }
        } else {
            echo "Nie można dodać zdjęcia takiego typu";
        }
    } else $post->setLokalizacjaZdjecia('Zdjecia/kot-i-kicia-ruchomy-obrazek-0215.gif');

    if (isset($_POST['tytul']) && isset($_POST['tresc'])) {
        if (!$db_connection) {
            echo "<h2>Błąd połączenia z bazą!</h2>";
            exit();
        } else {
            if (isset($_SESSION['user'])) {
                $user = $_SESSION['user'];
                $post->setIdUzytkownik($user->getId());
                $query = "INSERT INTO post (tytul, tresc, data, id_uzytkownik,lokalizacja_zdjecia) values ('{$post->getTytul()}','{$post->getTresc()}','{$post->getData()}','{$post->getIdUzytkownik()}','{$post->getLokalizacjaZdjecia()}');";
                $result = mysqli_query($db_connection, $query);
            }
            if (!$result) echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
            else header("Location:mojeposty.php?");
        }
    }
    mysqli_close($db_connection);
}
?>

</body>
</html>


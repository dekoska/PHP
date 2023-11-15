<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dodawanie komentarza</title>
</head>
<body>

<?php
include 'zakladka.php';

if(isset($_GET['id'])){
    $_SESSION['idpostu']=$_GET['id'];
}


$tresc='';

if(isset($_POST['tresc'])) {
    $komentarz = new Komentarz();
    $komentarz->setTresc($_POST['tresc']);
    $komentarz->setIdPost($_SESSION['idpostu']);
}
?>

<form action="dodawaniekomentarza.php" method="post">
    <h2>Dodawanie komentarza</h2>
    <table>
        <tr>
            <td>Treść komentarza:</td>
            <td><TEXTAREA placeholder="Wpisz treść komentarza" name="tresc" required maxlength="300"></TEXTAREA></td>
        </tr>
        <tr>
            <td><input type="submit" value="Dodaj komentarz"</td>
        </tr>
    </table>
</form>

<?php
$db_connection = mysqli_connect("localhost", "root", "", "blog");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['tresc'])) {
    if (!$db_connection) {
        echo "<h2>Błąd połączenia z bazą!</h2>";
        exit();
        }
    else {
        if(isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $komentarz->setLoginUzytkownik($user->getLogin());
        }
        else {
            $komentarz->setLoginUzytkownik("gość");
        }
        $query = "INSERT INTO komentarz (tresc, data, login_uzytkownik, id_post) values ('{$komentarz->getTresc()}','{$komentarz->getData()}','{$komentarz->getLoginUzytkownik()}', '{$komentarz->getIdPost()}');";
        $result = mysqli_query($db_connection, $query);
    if (!$result) {
        echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
        exit();
        }
    else {
    header("Location:konkretnypost.php?id_postu='{$_SESSION['idpostu']}'");
//        header('Location:stronaglowna.php');
    }
    }
    }
}
mysqli_close($db_connection);
?>

</body>
</html>



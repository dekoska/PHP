<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php

$namesurname='';
$email='';
$phonenumber='';
$theme='';
$textarea='';
$checkbox1='';
$checkbox2='';
$radio='';

$namesurname=$_POST['namesurname'];
$email=$_POST['email'];
$phonenumber=$_POST['phonenumber'];
$theme=$_POST['theme'];
$textarea=$_POST['textarea'];
$checkbox1=$_POST['checkbox1'];
$checkbox2=$_POST['checkbox2'];
$radio=$_POST['radio'];


?>

<FORM action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <ul style="list-style-type:circle;">
    <FIELDSET>
        <LEGEND>Formularz kontaktowy</LEGEND>
    <TABLE>
        <TR>
            <TD><li>Imię i nazwisko *</li></TD>
            <TD><INPUT name="namesurname"></TD>
        </TR>
        <TR>
            <TD><li>Adres e-mail *</li></TD>
            <TD><INPUT TYPE="email" name="email"></TD>
        </TR>
        <TR>
            <TD><li>Telefon kontaktowy *</li></TD>
            <TD><INPUT TYPE="number" name="phonenumber"></TD>
        </TR>
        <TR>
            <TD><li>Wybierz temat *</li></TD>
            <TD><SELECT name="theme">
                <OPTION value="Wykonanie strony internetowej">Wykonanie strony internetowej</OPTION>
                <OPTION value="Poprawienie strony internetowej">Poprawienie strony internetowej</OPTION>
                </SELECT></TD>
        </TR>
        <TR>
            <TD><li>Treść wiadomości *</li></TD>
            <TD><TEXTAREA NAME="textarea"></TEXTAREA></TD>
        </TR>
        <TR>
            <TD><li>Preferowana forma kontaktu</li></TD>
        </TR>
        <TR>
            <TD><INPUT TYPE=CHECKBOX name="checkbox1" value="E-mail">E-mail</TD>
        </TR>
        <TR>
            <TD><INPUT TYPE=CHECKBOX name="checkbox2" value="Telefon">Telefon</TD>
        </TR>
        <TR>
            <TD><li>Posiadasz już stronę www?</li></TD>
        </TR>
        <TR>
            <TD><INPUT TYPE=RADIO name="radio" value="tak">Tak</TD>
        </TR>
        <TR>
            <TD><INPUT TYPE=RADIO name="radio" value="nie">Nie</TD>
        </TR>
        <TR>
            <TD>Załączniki</TD>
        </TR>
        <TR>
            <TD><INPUT TYPE=BUTTON value="Wybierz plik"></TD>
        </TR>
    </TABLE>
    </FIELDSET>
        <TR>
            <TD><INPUT type="submit" value="Wyślij formularz"></TD>
        </TR>
    </TABLE>
    </ul>
</FORM>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {
    echo '<ul style = "list-style-type:circle;" >';
    echo '<li > '.$namesurname.'</li >';
    echo '<li > '.$email.'</li >';
    echo '<li > '.$phonenumber.'</li >';
    echo '<li > '.$theme.'</li >';
    echo '<li > '.$textarea.'</li >';
    if(isset($_POST['checkbox1']) && isset($_POST['checkbox2'])) echo '<li>'.$checkbox1.' i '.$checkbox2.'</li>';
    else if(isset($_POST['checkbox1'])) echo '<li>'.$checkbox1.'</li>';
    else if(isset($_POST['checkbox2'])) echo '<li>'.$checkbox2.'</li>';
    echo '<li > '.$radio.'</li >';
    echo '</ul >';
}
?>

</body>
</html>


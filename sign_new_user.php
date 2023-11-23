<?php
global $mysqli;
include 'connect.php';

$firstName = $_POST['firstName'];

$lastName = $_POST['lastName'];

$year = $_POST['year'];

if (isset($_POST['tabella']))
{
    $tabella = $_POST['tabella'];

}



$email = $_POST['email'];

$password = /*PASSWORD_HASH(*/$_POST['password']/*, PASSWORD_DEFAULT)*/;

$sql = "INSERT INTO utenti (NOME, COGNOME, EMAIL, PWD, YOB, ID_HOBBIE)
VALUES ('$firstName','$lastName','$email','$password','$year','$tabella')";

if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();

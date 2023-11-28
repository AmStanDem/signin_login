<?php
global $mysqli;
include 'connect.php';



if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['year']) && isset($_POST['tabella']) && isset($_POST['email']) && isset($_POST['password']))
{

    $firstName = $_POST['firstName'];

    $lastName = $_POST['lastName'];

    $year = $_POST['year'];

    $tabella = $_POST['tabella'];

    $email = $_POST['email'];

    $password = /*PASSWORD_HASH(*/md5($_POST['password'])/*, PASSWORD_DEFAULT)*/;

    $sql="SELECT * FROM utenti  WHERE EMAIL = ?";
    $query = $mysqli->prepare($sql);
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if (mysqli_num_rows($result))
    {
        echo "User already added";
    }
    else
    {
        $sql = "INSERT INTO utenti (NOME, COGNOME, EMAIL, PWD, YOB, ID_HOBBIE)
            VALUES 
            ('$firstName','$lastName','$email','$password','$year','$tabella')";
        if ($mysqli->query($sql) === TRUE)
        {

            header('location:login.php');
        }
        else
        {
            echo "Error: ".mysqli_error($mysqli);
        }
    }
    $mysqli->close();
}






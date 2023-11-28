<?php
global $mysqli;
include 'connect.php';
session_start();
if (isset($_POST['email']) && isset($_POST['password']))
{
    $email = $_POST['email'];



    $password = md5($_POST['password']);


    $sql="SELECT * FROM utenti  WHERE EMAIL = ? AND PWD = ?";
    $query = $mysqli->prepare($sql);
    $query->bind_param("ss", $email, $password);
    $query->execute();
    $result = $query->get_result();

    if (!$result)
    {
        die('Query failed' .mysqli_error($mysqli));
    }



    if (mysqli_num_rows($result) > 0)
    {
        while ($row = mysqli_fetch_array($result))
        {
            $name = $row['NOME'];
            $surname = $row['COGNOME'];
            $email = $row['EMAIL'];
            $yob = $row['YOB'];
            $ID_HOBBIE = $row['ID_HOBBIE'];
        }

        $_SESSION['NOME'] = $name;
        $_SESSION['COGNOME'] = $surname;
        $_SESSION['EMAIL'] = $email;
        $_SESSION['YOB'] = $yob;
        $_SESSION['ID_HOBBIE'] = $ID_HOBBIE;

        header('location: dashboard.php');

    }
    else {

        echo 'Invalide username and password';

    }
}
?>
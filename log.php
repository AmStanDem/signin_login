<?php
include 'connect.php';
if (isset($_POST['email']) && isset($_POST['password']))
{
    $email = $_POST['email'];

    echo $email;

    echo "\n";

    $password = $_POST['password'];

    echo $password;

    $sql="SELECT * FROM utenti  WHERE EMAIL = ? AND PWD = ?";
    $query = $mysqli->prepare($sql);
    $query->bind_param("ss", $email, $password);
    $query->execute();
    $result = $query->get_result();


    echo mysqli_num_rows($result);

    if (mysqli_num_rows($result) > 0)
    {
        echo "Logged";

    }
    else {

        echo 'Invalide username and password';

    }
}
?>
<?php
global $mysqli;
include 'connect.php';
session_start();
?>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
<div class="container col-12 border rounded mt-3">
    <h1 class=" mt-3 text-center">Dashboard</h1>
    <hr>
    <h4> <?php echo "Benvenuto/a: ".$_SESSION['NOME'] . " ".$_SESSION['COGNOME']; ?> </h4>

    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
        <tr>
            <th scope="col">NOME</th>
            <th scope="col">COGNOME</th>
            <th scope="col">EMAIL</th>
            <th scope="col">ANNO DI NASCITA</th>
            <th scope="col">HOBBIE</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td> <?php echo $_SESSION['NOME']; ?></td>
            <td> <?php echo $_SESSION['COGNOME']; ?></td>
            <td> <?php echo $_SESSION['EMAIL']; ?></td>
            <td> <?php echo $_SESSION['YOB']; ?></td>
            <td>
                <?php
                $sql="SELECT DESCRIZ FROM HOBBIES  WHERE ID = ?";
                $query = $mysqli->prepare($sql);
                $query->bind_param("s", $_SESSION['ID_HOBBIE']);
                $query->execute();
                $result = $query->get_result();
                $row = $result->fetch_array(MYSQLI_ASSOC);
                echo $row['DESCRIZ'];
                ?>
            </td>
        </tr>
        </tbody>
    </table>

    <form action="resetSession.php" method="post">
        <button type="submit" name='signout' class=" btn btn-warning mb-3"> Sign Out</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>

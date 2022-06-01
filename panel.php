<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    die(header('Location: login.php'));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel principal</title>
</head>
<body>
    <div class="panel-sup">
        Bem vindo ao painel principal, <?php echo $_SESSION['name']  ?>
    </div>




    <a href="logout.php">Fazer logout</a>
</body>
</html>
<?php
include('connect.php');
if (isset($_POST['user']) || isset($_POST['pass'])) {
    if (strlen($_POST['user']) == 0) {
        echo "<script>alert('Preencha o usuário!')</script>";
    } else if (strlen($_POST['pass']) == 0) {
        echo "<script>alert('Preencha a senha!')</script>";
    } else {
        $user = $mysqli->real_escape_string($_POST['user']);
        $pass = $mysqli->real_escape_string($_POST['pass']);

        $sql_code = "SELECT * FROM teste_project WHERE user_ = '$user' AND pass_ = '$pass'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL ". $mysqli->error);

        $quant = $sql_query->num_rows;

        if ($quant == 1) {
            $user_ = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $user_['id_'];
            $_SESSION['name'] = $user_['name_'];

            header('Location: panel.php');

        } else {
            echo "<script>alert('Falha ao conectar, usuario ou senha incorretos!')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style_login.css">
        <title>Login</title>
    </head>

    <body>
        <div id="login">
            <form class="card" action="login.php" method="post">
                <div class="card-header">
                    <h2>Login</h2>
                </div>
                <div class="card-content">
                    <div class="card-content-area">
                        
                        <label for="usuario">Usuário</label>
                        <input type="text" id="usuario" autocomplete="off" name="user">
                    </div>
                    <div class="card-content-area">
                        <label for="password">Senha</label>
                        <input type="password" id="password" autocomplete="off" name="pass">
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" onclick="login.php" id=""value="login" class="submit">
                </div>
            </form>
        </div>
    </body>
</html>
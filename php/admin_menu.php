<!DOCTYPE html>
<?php
session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header("Location: ../html/login.html");
    exit();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_menu.css">
    <title>Menu de Administrador</title>
</head>
<body>
    <div class="container">
        <h1> O que deseja fazer: </h1>
        <button><a href="../php/menu2.php"> Gestão de Utilizadores </a></button>
        <button><a href="../php/index_admin.php"> Gestão do website </a></button>
    </div>
</body>
</html>
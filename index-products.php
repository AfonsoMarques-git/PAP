<?php
// Verifica se o usuário está logado
$isLoggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/calendar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Página Principal - Produtos</title>
</head>
<body>
    <?php include 'header-produtos.php'; ?>
    <div style="height: 62vh;"></div>
    <?php include 'footer.php';?>
</body>
</html>
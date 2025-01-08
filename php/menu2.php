<html>
    <?php

        session_start();
        
        if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
            header("Location: ../html/login.html");
            exit();
        }
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css"  href="../css/admin.css" />
        <title>Administração de usuários</title>
    </head>

    <body>
        <div>
            <header>
                <div class="navegacao">
                    <nav class="menu">
                        <a href="registo_admin.php"> Registar Utilizadores</a>
                        <a href="ver_utilizador.php"> Ver Utilizadores</a>
                        <a href="alterar_utilizador.php"> Alterar Informações de Utilizadores</a>
                        <a href="eliminar_utilizador.php"> Eliminar Utilizadores</a>
                        <a href="../php/logout.php"> Log Out</a>
                        <a href="../html/admin_menu.html"> Voltar</a>
                    </nav>
                </div>
            </header>
        </div>
    </body>
</html>

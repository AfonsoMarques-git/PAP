<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Utilizador</title>
    <link rel="stylesheet" href="../css/elim_user.css">
    <script>
        function confirmarEliminacao(userId) {
            if (confirm("Tem certeza que deseja eliminar este utilizador?")) {
                // Se confirmado, redireciona para o script de eliminação
                window.location.href = 'process_elim.php?id=' + userId;
            }
        }
    </script>
</head>
<body>
    <?php
        // Ligar à base de dados
        $ligacao = new mysqli('localhost', 'root', '', 'gestao_utilizadores');

        // Verificar a ligação
        if ($ligacao->connect_error) {
            die('Não foi possível conectar à base de dados: ' . $ligacao->connect_error);
        }

        // Consultar utilizadores
        $sql = 'SELECT * FROM utilizadores WHERE is_admin != 2 ORDER BY id ASC';
        $consulta = $ligacao->query($sql);
    ?>

    <div class="tabela">
        <h1>Selecionar utilizador para eliminar</h1>
        <table>
            <tr>
                <th>Número de Registo</th>
                <th>Nome de Utilizador</th>
                <th>Endereço Eletrónico</th>
                <th>Tipo de Utilizador</th>
                <th></th>
            </tr>
            <?php
                if ($consulta) {
                    // Mostrar registos
                    while ($mostrar = $consulta->fetch_assoc()) {
                        $id = $mostrar['id'];
                        $nome_utilizador = $mostrar['nome_utilizador'];
                        $email = $mostrar['email'];
                        $is_admin = $mostrar['is_admin'];

                        $tipo_utilizador = $is_admin == 1 ? 'Administrador' : 'User  Normal';

                        if ($nome_utilizador === 'Admin') {
                            echo "<tr><td>$id</td><td>$nome_utilizador</td><td>$email</td></tr>";
                        } else {
                            echo "<tr class='links'>
                                    <td>$id</td>
                                    <td>$nome_utilizador</td>
                                    <td>$email</td>
                                    <td>$tipo_utilizador</td>
                                    <td><button onclick='confirmarEliminacao($id)'>Eliminar</button></td>
                                </tr>";
                        }
                    }
                } else {
                    echo "<tr>
                            <td colspan='5'>A base de dados não contém registos</td>
                        </tr>";
                }

                // Liberar memória e fechar ligação
                $consulta->free_result();
                $ligacao->close();
            ?>
        </table>
    </div>
</body>
</html>
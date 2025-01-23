<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Utilizador</title>
    <link rel="stylesheet" href="../css/alter_user.css">
</head>

<body>
    <?php
    // Ligar à base de dados
    $ligacao = new mysqli('localhost', 'root', '', 'gestao_utilizadores');

    // Verificar a ligação
    if ($ligacao->connect_error) {
        die('Não foi possível conectar à base de dados: ' . $ligacao->connect_error);
    }

    // Consultar utilizadores com is_admin igual a 1
    $sql_admins = 'SELECT * FROM utilizadores WHERE is_admin = 1 ORDER BY id ASC';
    $consulta_admins = $ligacao->query($sql_admins);

    // Verificar se existem administradores
    $tem_administradores = $consulta_admins->num_rows > 0;
    ?>

    <div class="tabela">
        <h1>Selecione um administrador para alterar os dados</h1>
        <?php if ($tem_administradores): ?>
            <table>
                <tr>
                    <th>Número de Registo</th>
                    <th>Nome de Utilizador</th>
                    <th>Endereço Eletrónico</th>
                    <th>Tipo de Utilizador</th>
                    <th></th>
                </tr>
                <?php
                while ($mostrar = $consulta_admins->fetch_assoc()) {
                    $id = $mostrar['id'];
                    $nome_utilizador = $mostrar['nome_utilizador'];
                    $email = $mostrar['email'];
                    $is_admin = $mostrar['is_admin'];

                    $tipo_utilizador = $is_admin == 1 ? 'Administrador' : 'User Normal';

                    // O utilizador "Admin" não pode ser eliminado
            
                    echo "<tr class='links'>
                            <td>$id</td>
                            <td>$nome_utilizador</td>
                            <td>$email</td>
                            <td>$tipo_utilizador</td>
                            <td> <a href='processos/processar_alterar.php?id=$id'>Editar</a> </td>
                        </tr>";
                }

                ?>
            </table>
        <?php else: ?>
            <p>Não há registos de administradores na base de dados.</p>
        <?php endif; ?>

        <?php
        // Liberar memória e fechar ligação
        $consulta_admins->free_result();
        $ligacao->close();
        ?>
    </div>
</body>

</html>
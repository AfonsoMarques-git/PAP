<link rel="stylesheet" href="../css/processos_admin.css">
<?php
if (isset($_POST['alterar'])) { // Ensure the form is submitted
    // Conectar ao banco de dados
    $ligacao = mysqli_connect('localhost', 'root', '', 'gestao_utilizadores');
    if (!$ligacao) {
        die('Não foi possível ligar à base de dados: ' . mysqli_connect_error());
    }

    // Check if ID exists in POST data
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Verificar se o utilizador é Admin
        $verificar_admin = "SELECT nome_utilizador FROM utilizadores WHERE id = $id";
        $resultado = mysqli_query($ligacao, $verificar_admin);

        if ($resultado && $linha = mysqli_fetch_assoc($resultado)) {
            if ($linha['nome_utilizador'] === "Admin") {
                echo 'Os dados do utilizador Admin não podem ser alterados!';
                echo '<a href="alterar_utilizador.php">Voltar</a>';
                mysqli_close($ligacao);
                exit; // Parar a execução
            }
        }

        // Escape and sanitize user inputs
        $nome_user = mysqli_real_escape_string($ligacao, $_POST['nome_user']);
        $email_user = mysqli_real_escape_string($ligacao, $_POST['email_user']);
        
        // Create and execute the update query
        $sql = "UPDATE utilizadores SET nome_utilizador='$nome_user', email='$email_user' WHERE id='$id'";
        if (mysqli_query($ligacao, $sql)) {
            echo 'Alterado com sucesso! ';
            echo '<a href="alterar_utilizador.php">Clique para continuar</a>';
        } else {
            echo 'Erro ao alterar os dados: ' . mysqli_error($ligacao);
        }
    } else {
        echo 'ID do utilizador não fornecido!';
    }

    // Fechar a conexão
    mysqli_close($ligacao);
}
 else {
    include('menu2.php');
?>

<div class="tabela">
    <h1> Dados do utilizador a editar: </h1>
    <table>
        <tr>
            <th>Nº registo</th>
            <th>Nome de Utilizador</th>
            <th>Endereço de correio eletrónico</th>
        </tr>
        <?php
        // Validate and fetch GET parameters
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $nome_utilizador = isset($_GET['nome_utilizador']) ? $_GET['nome_utilizador'] : '';
        $email = isset($_GET['email']) ? $_GET['email'] : '';
        ?>
        <form method="post">
            <tr>
                <td>
                    <font face="Arial" size="2"><?php echo $id; ?></font>
                </td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <font face="Arial" size="2"><input class="input_alt" type="text" name="nome_user" value="<?php echo $nome_utilizador; ?>" /></font>
                </td>
                <td>
                    <font face="Arial" size="2"><input class="input_alt" type="text" name="email_user" value="<?php echo $email; ?>" /></font>
                </td>
            </tr>
        </form>
    </table>
    <div class="botoes">
        <p>Pretende mesmo alterar este registo ?</p>
        <input class="botao_elim" type="submit" name="alterar" value="Alterar Dados"/>
        <a href="../php/alterar_utilizador.php"><button class="botao_elim"> Voltar </button></a>
    </div>
</div>
<?php
}
?>

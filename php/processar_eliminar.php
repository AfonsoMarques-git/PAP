<link rel="stylesheet" href="../css/processos_admin.css">
<?php
if (isset($_REQUEST['apagar'])) {

    // Conectar à base de dados
    $ligacao = mysqli_connect('localhost', 'root', '', 'gestao_utilizadores') 
        or die('Não foi possível ligar à base de dados: ' . mysqli_connect_error());

    $id = intval($_POST['id']); // Garantir que o ID é um número inteiro

    // Verificar se o utilizador é Admin
    $verificar_admin = "SELECT nome_utilizador FROM utilizadores WHERE id = $id";
    $resultado = mysqli_query($ligacao, $verificar_admin);

    if ($resultado && $linha = mysqli_fetch_assoc($resultado)) {
        if ($linha['nome_utilizador'] === "Admin") {
            echo 'O utilizador Admin não pode ser eliminado!';
            echo '<a href="eliminar_utilizador.php">Voltar</a>';
            mysqli_close($ligacao);
            exit; // Parar a execução
        }
    }

    // Criar a consulta à base de dados
    $sql = "DELETE FROM utilizadores WHERE id = $id";

    // Executar a consulta
    if (mysqli_query($ligacao, $sql)) {
        echo 'Eliminado com sucesso! ';
        echo '<a href="eliminar_utilizador.php">Clique para continuar</a>'; 
    } else {
        echo 'Erro ao eliminar: ' . mysqli_error($ligacao);
    }

    // Fechar a conexão
    mysqli_close($ligacao);
} else {
    include('menu2.php');
?>

<div class="tabela">
    <h1> Dadosdo utilizador a eliminar: <h1>
    <table>
        <tr>
            <th>Nº regitso</th>
            <th>Nome de Utilizadores</th>
            <th>Endereço de correio eletrónico</th>
        </tr>
        <?php
        $id = $_GET['id'];
        $nome_utilizador = $_GET['nome_utilizador'];
        $email = $_GET['email'];
        ?>
        <tr>
            <td><?php echo htmlspecialchars($id) ?></td>
            <td><?php echo htmlspecialchars($nome_utilizador) ?></td>
            <td><?php echo htmlspecialchars($email) ?></td>
        </tr>
    </table>
    <div class="botoes">
        <form method="POST" action="processar_eliminar.php" style="display: inline;">
            <p> Pretende mesmo eliminar este registo ? </p>
            <input class="botao_elim" type="submit" name="apagar" value="Sim" onclick="return confirmarEliminacao();"/>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>"/>
        </form>
        <a href="../php/eliminar_utilizador.php"><button class="botao_elim">Voltar</button></a>
    </div>
</div>
<?php
}
?>
<script src="../js/main.js"></script>

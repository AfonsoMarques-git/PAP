<link rel="stylesheet" href="../css/processos_admin.css">
<?php
if (isset($_REQUEST['apagar'])) {

    // Conectar à base de dados
    $ligacao = mysqli_connect('localhost', 'root', '', 'gestao_utilizadores') 
        or die('Não foi possível ligar à base de dados: ' . mysqli_connect_error());

    $id = intval($_POST['id']); // Garantir que o ID é um número inteiro

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
<table width="600px" align="left" border=0>
<tr><width="600px"><font face="Arial" align="center">Dados do utilizador a eliminar:</tr><br />

<?php
$id = $_GET['id'];
$nome_utilizador = $_GET['nome_utilizador'];
$email = $_GET['email'];
?>

<tr><td width="100px" align="left" bgcolor="99cc33"><font face="Arial" size=2>Nº registo: <?php echo htmlspecialchars($id); ?></td></tr>
<tr><td width="200px" align="left" bgcolor="99cc33"><font face="Arial" size=2>Nome de utilizador: <?php echo htmlspecialchars($nome_utilizador); ?></td></tr>
<tr><td width="300px" align="left" bgcolor="99cc33"><font face="Arial" size="2">Endereço de correio eletrónico: <?php echo htmlspecialchars($email); ?></td></tr>
<tr></tr>
<tr><td>
<form method="POST" action="processar_eliminar.php">
    Pretende mesmo eliminar este registo?
    <input type="submit" name="apagar" value="Sim">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
</form>
</td>
</tr>
</table>
<?php 
}
?>

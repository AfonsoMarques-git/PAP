<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="../css/processos_admin.css">
    <title>Eliminar utilizador</title>
</head>

<body>
<?php
// ligar à base de dados usando MySQLi
$ligacao = new mysqli('localhost', 'root', '', 'gestao_utilizadores');

// verificar a ligação
if ($ligacao->connect_error) {
    die('Não foi possível ligar à base de dados: ' . $ligacao->connect_error);
}

// criar a consulta à base de dados
$sql = 'SELECT * FROM utilizadores ORDER BY nome_utilizador ASC';

// criar a variável $consulta que guarda os resultados obtidos, ordenados por nome de forma ascendente
$consulta = $ligacao->query($sql);

// verificar se existem resultados e mostrá-los
if ($consulta) {
    include ('menu2.php');
    echo('<div class="tabela">');
    echo('<h1> Selecione um número de registo para eliminar </h1>');
    echo('<table>');
    echo('<tr><th>Nº registo</th><th>Nome de utilizador</th><th>Endereço de correio eletrónico</th></tr>');
    // percorrer todos os registos
    while ($mostrar = $consulta->fetch_assoc()) {
    
        $id = $mostrar["id"];
        $nome_utilizador = $mostrar["nome_utilizador"];
        $email = $mostrar["email"];
        // apresentar a hiperligação para cada registo
        echo("<tr><td><a href='processar_eliminar.php?id=$id&nome_utilizador=$nome_utilizador&email=$email'>$id</a></td>
        <td>$nome_utilizador</td><td>$email</td></tr>");
    
    }
    echo('</table>');
    echo('</div>');
}
else { 
    echo ("A base de dados não contém registos");
}

// libertar variável da memória 
$consulta->free_result();

// fechar a ligação com o banco de dados
$ligacao->close();
?>
</body>
</html>

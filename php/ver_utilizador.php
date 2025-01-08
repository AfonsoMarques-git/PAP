<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css"  href="../css/processos_admin.css" />
    <title>Ver utilizadores</title>
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
    // construção da tabela de visualização de dados
    include ('menu2.php');
    echo('<div class="tabela">');
    echo('<h1> Lista de Utilizadores </h1>');
    echo('<table>');
    echo('<tr><th>Nº registo</th><th>Nome de utilizador</th><th>Endereço de correio eletrónico</th></tr>');

    // percorrer o array e mostrar dados
    while ($mostrar = $consulta->fetch_assoc()) {

        $id = $mostrar["id"];
        $nome_utilizador = $mostrar["nome_utilizador"];
        $email = $mostrar["email"];

        echo("<tr><td>$id</td><td>$nome_utilizador</td><td>$email</td></tr>");
    }
    echo ('</table>');
    echo('</div>');
}
// caso não haja registos, informa o utilizador
else { 
    echo ('<p class="no-record"> A base de dados não contém registos </p>');
}

// libertar variável da memória 
$consulta->free_result();

// fechar a ligação com o banco de dados
$ligacao->close();
?>
</body>
</html>

<?php
session_start();

// Verificar autenticação
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header("Location: ../php/login-registo.php");
    exit();
}

$ligacao = new mysqli('localhost', 'root', '', 'gestao_utilizadores');
if ($ligacao->connect_error) {
    die('Não foi possível ligar à base de dados: ' . $ligacao->connect_error);
}

// Mensagens de sucesso/erro
$mensagem = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['imagem']) && isset($_POST['evento'])) {
        $evento = $_POST['evento'];
        $imagem = $_FILES['imagem'];

        // Validar o upload
        if ($imagem['error'] === 0) {
            $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
            $novo_nome = $evento . '.' . $extensao; // Exemplo: casamento.jpg

            $destino = '../images/' . $novo_nome;

            if (move_uploaded_file($imagem['tmp_name'], $destino)) {
                $mensagem = 'Imagem carregada com sucesso!';
            } else {
                $mensagem = 'Erro ao mover o arquivo!';
            }
        } else {
            $mensagem = 'Erro no upload da imagem!';
        }
    } else {
        $mensagem = 'Por favor, selecione uma imagem e um evento!';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Imagens</title>
    <link rel="stylesheet" href="../css/menu_admin.css">
</head>

<body>
    <div class="container">
        <h1>Gestão de Imagens</h1>
        <?php if (!empty($mensagem)): ?>
            <p><?php echo htmlspecialchars($mensagem); ?></p>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <label for="evento">Selecione o evento:</label>
            <select name="evento" id="evento" required>
                <option value="casamento_card">Casamento</option>
                <option value="batizado_card">Batizado</option>
                <option value="outros_eventos_card">Outros Eventos</option>
            </select>
            <br><br>
            <label for="imagem">Selecione a imagem:</label>
            <input type="file" name="imagem" id="imagem" accept="image/*" required>
            <br><br>
            <button type="submit">Carregar Imagem</button>
        </form>
    </div>
</body>

</html>
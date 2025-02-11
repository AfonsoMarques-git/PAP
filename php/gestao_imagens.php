<?php
session_start();

// Verificar autenticação
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header("Location: ../php/login-registo.php");
    exit();
}

// Diretório das imagens (original e temporário)
$diretorio_imagens = '../images/';
$diretorio_temp = '../images/temp/';

// Garantir que o diretório temporário exista
if (!is_dir($diretorio_temp)) {
    mkdir($diretorio_temp, 0755, true);
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
            $novo_nome_temp = $evento . '.' . $extensao; // Exemplo: casamento_card.jpg
            $destino_temp = $diretorio_temp . $novo_nome_temp;

            // Mover a nova imagem para o diretório temporário
            if (move_uploaded_file($imagem['tmp_name'], $destino_temp)) {
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
    <link rel="stylesheet" href="../css/gestao_images.css">
</head>

<body>
    <div class="container">
        <h1>Gestão de Imagens</h1>
        <?php if (!empty($mensagem)): ?>
            <p><?php echo htmlspecialchars($mensagem); ?></p>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <label for="evento">Selecione onde colocar a imagem:</label>
            <select name="evento" id="evento" required>
                <option value="casamento_card">Casamento</option>
                <option value="batizado_card">Batizado</option>
                <option value="outros_eventos_card">Outros Eventos</option>
                <option value="fundo_home3">Página Principal</option>
            </select>
            <br><br>
            <div class="input-file-container">
                <label for="imagem" class="input-file-label">Escolher Ficheiro</label>
                <input type="file" name="imagem" id="imagem" accept="image/*" required>
            </div>
            <button type="submit">Carregar Imagem</button>
        </form>
        <hr>
        <div class="imagens">
            <div>
                <h3>Casamento</h3>
                <img src="<?php echo $diretorio_temp . 'casamento_card.jpg?time=' . time(); ?>" alt="Imagem Casamento"
                    onerror="this.src='<?php echo $diretorio_imagens . 'casamento_card.jpg?time=' . time(); ?>'">
            </div>
            <div>
                <h3>Batizado</h3>
                <img src="<?php echo $diretorio_temp . 'batizado_card.jpg?time=' . time(); ?>" alt="Imagem Batizado"
                    onerror="this.src='<?php echo $diretorio_imagens . 'batizado_card.jpg?time=' . time(); ?>'">
            </div>
            <div>
                <h3>Outros Eventos</h3>
                <img src="<?php echo $diretorio_temp . 'outros_eventos_card.jpg?time=' . time(); ?>"
                    alt="Imagem Outros Eventos"
                    onerror="this.src='<?php echo $diretorio_imagens . 'outros_eventos_card.jpg?time=' . time(); ?>'">
            </div>
            <div>
                <h3>Página Principal</h3>
                <img src="<?php echo $diretorio_temp . 'fundo_home3.jpg?time=' . time(); ?>" alt="Imagem da Section"
                    onerror="this.src='<?php echo $diretorio_imagens . 'fundo_home3.jpg?time=' . time(); ?>'">
            </div>
        </div>
        <a href="menu_Sadmin.php">Voltar</a>
    </div>
</body>

</html>
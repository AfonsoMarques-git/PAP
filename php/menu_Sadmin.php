<!DOCTYPE html>
<?php
session_start();

$ligacao = new mysqli('localhost', 'root', '', 'gestao_utilizadores');
if ($ligacao->connect_error) {
  die('Não foi possível ligar à base de dados: ' . $ligacao->connect_error);
}

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
  header("Location: ../php/login-registo.php");
  exit();
}

$total_users = "Erro ao obter dados.";
$query = "SELECT COUNT(*) AS total_users FROM utilizadores WHERE is_admin != 2";
$resultado = mysqli_query($ligacao, $query);
if ($resultado) {
  $linha = mysqli_fetch_assoc($resultado);
  $total_users = $linha['total_users'];
} else {
  $total_users = "Erro: " . mysqli_error($ligacao);
}

// Mensagens de sucesso ou erro
if (isset($_SESSION['success_menu'])) {
  $success = $_SESSION['success_menu'];
  unset($_SESSION['success_menu']);
}

if (isset($_SESSION['error_menu'])) {
  $error = $_SESSION['error_menu'];
  unset($_SESSION['error_menu']);
}
?>
<html lang="pt-PT">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Super Administrador</title>
  <link rel="stylesheet" href="../css/menu_admin.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <!-- Exibição de mensagens de sucesso ou erro -->
  <?php if (!empty($success)): ?>
    <div class="mensagem"><?php echo htmlspecialchars($success); ?></div>
  <?php elseif (!empty($error)): ?>
    <div class="mensagem" style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;">
      <?php echo htmlspecialchars($error); ?>
    </div>
  <?php endif; ?>

  <aside class="sidebar">
    <header class="sidebar-header">
      <a href="menu_Sadmin.php" class="header-logo" title="Administração">
        <img src="../images/Logo_branco_pe.png" alt="Companhia da Mariposa">
      </a>
      <button class="toggler sidebar-toggler">
        <span class="material-symbols-rounded">chevron_left</span>
      </button>
      <button class="toggler menu-toggler">
        <span class="material-symbols-rounded">menu</span>
      </button>
    </header>
    <nav class="sidebar-nav">
      <ul class="nav-list primary-nav">
        <li class="nav-item">
          <a onclick="loadVer()" class="nav-link">
            <div>
              <span class="nav-icon material-symbols-rounded">group</span>
              <span class="nav-label">Utilizadores</span>
            </div>
          </a>
          <span class="nav-tooltip">Utilizadores</span>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link">
            <div>
              <span class="nav-icon material-symbols-rounded">celebration</span>
              <span class="nav-label">Eventos</span>
            </div>
            <span class="dropdown-icon material-symbols-rounded">expand_more</span>
          </a>
          <span class="nav-tooltip">Eventos</span>
          <ul class="dropdown-menu">
            <li><a href="gestao_imagens.php">Gestão de imagens</a></li>
            <li><a href="">Gestão da galeria</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link">
            <div>
              <span class="nav-icon material-symbols-rounded">inventory_2</span>
              <span class="nav-label">Produtos</span>
            </div>
            <span class="dropdown-icon material-symbols-rounded">expand_more</span>
          </a>
          <span class="nav-tooltip">Produtos</span>
          <ul class="dropdown-menu">
            <li><a onclick="loadVer()">Ver</a></li>
            <li><a href="">Inserir</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="gestao_emails.php" class="nav-link">
            <div>
              <span class="material-symbols-rounded"> mail </span>
              <span class="nav-label">Emails</span>
            </div>
          </a>
          <span class="nav-tooltip">Emails</span>
        </li>
      </ul>
      <ul class="nav-list secondary-nav">
        <li class="nav-item">
          <a href="../php/logout.php" class="nav-link-logout">
            <span class="nav-icon material-symbols-rounded">logout</span>
            <span class="nav-label-logout">Logout</span>
          </a>
          <span class="nav-tooltip">Logout</span>
        </li>
      </ul>
    </nav>
  </aside>

  <div id="container">
    <div class="titles">
      <h1>Dashboard</h1>
      <p>Vendas & Utilizadores</p>
    </div>
    <div class="items-main">
      <div class="item1" onclick="loadVer()">
        <div class="text">
          <h2><?php echo htmlspecialchars($total_users); ?></h2>
          <p>Utilizadores</p>
        </div>
        <span class="material-symbols-rounded">groups</span>
      </div>
      <div class="item2">
        <div class="text">
          <h2>175</h2>
          <p>Vendas Efetuadas</p>
        </div>
        <span class="material-symbols-rounded">shopping_cart_checkout</span>
      </div>
      <div class="item3">
        <div class="text">
          <h2>300</h2>
          <p>Encomendas</p>
        </div>
        <span class="material-symbols-rounded">inventory_2</span>
      </div>
    </div>
  </div>

  <!-- Script para remover a mensagem após 3 segundos -->
  <script>
    setTimeout(() => {
      const mensagem = document.querySelector('.mensagem');
      if (mensagem) {
        mensagem.style.opacity = '0';
        setTimeout(() => mensagem.remove(), 500);
      }
    }, 3000);
  </script>
  <script src="../js/menu_admin.js"></script>
</body>

</html>
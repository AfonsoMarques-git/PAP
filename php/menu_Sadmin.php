<!DOCTYPE html>
<?php
session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
  header("Location: ../php/login-registo.php");
  exit();
}

if (isset($_SESSION['success_menu'])) {
  echo '<div class="mensagem sucesso">' . htmlspecialchars($_SESSION['success_menu']) . '</div>';
  unset($_SESSION['success_menu']);
}

if (isset($_SESSION['error_menu'])) {
  echo '<div class="mensagem erro">' . htmlspecialchars($_SESSION['error_menu']) . '</div>';
  unset($_SESSION['error_menu']);
}

// Mensagens de erro ou sucesso
$error = isset($_SESSION['error_menu']) ? $_SESSION['error_menu'] : '';
unset($_SESSION['error_menu']);

$success = isset($_SESSION['success_menu']) ? $_SESSION['success_menu'] : '';
unset($_SESSION['success_menu']);
?>
<html lang="pt-PT">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Super Administrador</title>
  <link rel="stylesheet" href="../css/menu_admin.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
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
      <a href="menu_Sadmin.php" class="header-logo">
        <img src="../images/logo_pequeno.png" alt="Companhia da Mariposa">
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
        <li class="nav-item dropdown">
          <a href="#" class="nav-link">
            <span class="nav-icon material-symbols-rounded">dashboard</span>
            <span class="nav-label">Gestão de Administradores</span>
            <span class="dropdown-icon material-symbols-rounded">expand_more</span>
          </a>
          <span class="nav-tooltip">Gestão de Administradores</span>
          <ul class="dropdown-menu">
            <li><a onclick="loadRegisto()">Registar</a></li>
            <li><a onclick="loadElim()">Eliminar</a></li>
            <li><a onclick="loadVer()">Ver lista</a></li>
            <li><a onclick="loadEdit()">Editar dados</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link">
            <span class="nav-icon material-symbols-rounded">dashboard</span>
            <span class="nav-label">Gestão de Utilizadores</span>
            <span class="dropdown-icon material-symbols-rounded">expand_more</span>
          </a>
          <span class="nav-tooltip">Gestão de Utilizadores</span>
          <ul class="dropdown-menu">
            <li><a href="#">Eliminar</a></li>
            <li><a href="#">Ver lista</a></li>
            <li><a href="#">Editar dados</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link">
            <span class="nav-icon material-symbols-rounded">calendar_today</span>
            <span class="nav-label">Gestão do website</span>
            <span class="dropdown-icon material-symbols-rounded">expand_more</span>
          </a>
          <span class="nav-tooltip">Gestão do website</span>
          <ul class="dropdown-menu">
            <li><a href="#">Manutenção de produtos</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav-list secondary-nav">
        <li class="nav-item">
          <a href="../php/logout.php" class="nav-link">
            <span class="nav-icon material-symbols-rounded">logout</span>
            <span class="nav-label-logout">Logout</span>
          </a>
          <span class="nav-tooltip">Logout</span>
        </li>
      </ul>
    </nav>
  </aside>
  <div id="container">
    <h1></h1>
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

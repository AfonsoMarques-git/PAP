<!DOCTYPE html>
<?php
session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
  header("Location: ../php/login-registo.php");
  exit();
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Administrador</title>
  <link rel="stylesheet" href="../css/menu_admin.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
</head>

<body>
  <aside class="sidebar">
    <header class="sidebar-header">
      <a href="menu_admin.php" class="header-logo">
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
            <span class="nav-label">Gestão de utilizadores</span>
            <span class="dropdown-icon material-symbols-rounded">expand_more</span>
          </a>
          <span class="nav-tooltip">Gestão de utilizadores</span>
          <ul class="dropdown-menu">
            <li><a href="#">Registar</a></li>
            <li><a href="#">Eliminar</a></li>
            <li><a href="#">Ver lista</a></li>
            <li><a href="#">Alterar Informações</a></li>
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
  <script src="../js/menu_admin.js"></script>
</body>
</html>
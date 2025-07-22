<?php
// index.php — página inicial
session_start();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <!-- COLE AQUI O TEU <head> DO index.html (meta, títulos, links CSS, favicon, etc.) -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHIL ASEAN PROVIDER & LOGISTICS | Serviços Marítimos em Moçambique</title>
  <link rel="icon" href="assets/phil.jpeg" type="image/jpeg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css">

</head>
    <style>
    /* Overlay genérico de diálogo (alert/confirm) */
    #dialog-overlay {
      position: fixed; top:0; left:0; right:0; bottom:0;
      background: rgba(0,0,0,0.5);
      display: flex; align-items:center; justify-content:center;
      z-index:9999;
    }
    #dialog-overlay.hidden { display:none; }
    #dialog-box {
      background:#fff; border-radius:8px; width:90%; max-width:400px;
      padding:1rem; text-align:center; box-shadow:0 2px 10px rgba(0,0,0,0.3);
    }
    #dialog-message { margin-bottom:1rem; }
    #dialog-buttons { display:flex; justify-content:center; gap:0.5rem; }
    #dialog-buttons button {
      padding:0.5rem 1rem; border:none; border-radius:4px; cursor:pointer;
    }
    #dialog-ok { background:var(--primary); color:#fff; }
    #dialog-cancel { background:var(--error); color:#fff; }
      </style>
<body>

  <!-- COLE AQUI O TEU <header> ORIGINAL DO index.html -->
  <header>
    <div class="container header-container">
      <div class="logo">
        <img src="assets/phil.jpeg" alt="PHIL ASEN Logo" id="logo-img">
        <div class="logo-text">
          <h1>PHIL ASEAN PROVIDER & LOGISTICS</h1>
          <p>Serviços Marítimos ao Longo da Costa Moçambicana</p>
        </div>
      </div>
      <nav>
        <button class="mobile-menu-btn" id="mobile-menu-btn"><i class="fas fa-bars"></i></button>
        <ul id="main-menu">
          <li><a href="#home"><i class="fas fa-home"></i> Início</a></li>
          <li><a href="#services"><i class="fas fa-ship"></i> Serviços</a></li>
          <li><a href="#about"><i class="fas fa-info-circle"></i> Sobre</a></li>
          <li><a href="#order"><i class="fas fa-clipboard-list"></i> Pedido</a></li>
          <li><a href="#contact"><i class="fas fa-envelope"></i> Contato</a></li>
          <li class="auth-dropdown">
            <a href="#"><i class="fas fa-user"></i> Conta <i class="fas fa-chevron-down"></i></a>
            <div class="auth-dropdown-content">
              <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
              <a href="register.php"><i class="fas fa-user-plus"></i> Registro</a>
              <a href="reserva.php"><i class="fas fa-tachometer-alt"></i> Área Cliente</a>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- EXEMPLO DE NAV DINÂMICA -->
  <nav>
    <ul>
      <?php if (isset($_SESSION['user_id'])): ?>
        <li><a href="reserva.php">Área Cliente</a></li>
        <li><a href="logout.php">Sair</a></li>
      <?php else: ?>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Registar</a></li>
      <?php endif; ?>
    </ul>
  </nav>

  <!-- COLE AQUI O RESTANTE CONTEÚDO DO index.html (imagens, secções, textos, etc.) -->
  <header>
    <div class="container header-container">
      <div class="logo">
        <img src="assets/phil.jpeg" alt="PHIL ASEN Logo" id="logo-img">
        <div class="logo-text">
          <h1>PHIL ASEAN PROVIDER & LOGISTICS</h1>
          <p>Serviços Marítimos ao Longo da Costa Moçambicana</p>
        </div>
      </div>
      <nav>
        <button class="mobile-menu-btn" id="mobile-menu-btn"><i class="fas fa-bars"></i></button>
        <ul id="main-menu">
          <li><a href="#home"><i class="fas fa-home"></i> Início</a></li>
          <li><a href="#services"><i class="fas fa-ship"></i> Serviços</a></li>
          <li><a href="#about"><i class="fas fa-info-circle"></i> Sobre</a></li>
          <li><a href="#order"><i class="fas fa-clipboard-list"></i> Pedido</a></li>
          <li><a href="#contact"><i class="fas fa-envelope"></i> Contato</a></li>
          <li class="auth-dropdown">
            <a href="#"><i class="fas fa-user"></i> Conta <i class="fas fa-chevron-down"></i></a>
            <div class="auth-dropdown-content">
              <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
              <a href="register.php"><i class="fas fa-user-plus"></i> Registro</a>
              <a href="reserva.php"><i class="fas fa-tachometer-alt"></i> Área Cliente</a>
            </div>
          </li>
        </ul>
      </nav>
    </div>
                                                                                </header>
  <!-- COLE AQUI O <footer> ORIGINAL DO index.html -->
  <script src="assets/script.js" defer></script>
</body>
</html>


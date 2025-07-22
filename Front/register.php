<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <!-- COLE AQUI O TEU <head> ORIGINAL DO register.html -->
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro | PHIL ASEAN PROVIDER & LOGISTICS</title>
  <link rel="icon" href="assets/phil.jpeg" type="image/jpeg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css">

</head>
<body>
  <!-- COLE AQUI O TEU HEADER/MENU ORIGINAL -->
 <header>
    <div class="container header-container">
      <div class="logo">
        <img src="assets/phil.jpeg" alt="Logo PHIL ASEAN" id="logo-img">
        <span>PHIL ASEAN PROVIDER & LOGISTICS</span>
      </div>
      <nav>
        <button class="mobile-menu-btn" id="mobile-menu-btn">
          <i class="fas fa-bars"></i>
        </button>
        <ul id="main-menu">
          <li><a href="index.html"><i class="fas fa-home"></i> Início</a></li>
          <li><a href="index.html#services"><i class="fas fa-ship"></i> Serviços</a></li>
          <li><a href="index.html#about"><i class="fas fa-info-circle"></i> Sobre</a></li>
          <li><a href="login.html"><i class="fas fa-sign-in-alt"></i> Login</a></li>
          <li><a href="register.html"><i class="fas fa-user-plus"></i> Registro</a></li>
          <li><a href="index.html#contact"><i class="fas fa-envelope"></i> Contato</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <form id="registerForm">
      <!-- Inputs originais de register.html (name, email, password, etc.) -->

   <div class="form-group">
        <label for="name">Nome Completo</label>
        <input id="name" name="name" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input id="password" name="password" type="password" class="form-control" required>
      
  <-----><div></div>
      <button type="submit">Registar</button><->
        <div class="link-group">
        <p>Já tem conta? <a href="login.html">Faça login</a></p>
      </div>

    </form>
  </main>

  <!-- COLE AQUI O TEU FOOTER ORIGINAL -->
   <footer>
    <p>© 2025 PHIL ASEAN PROVIDER & LOGISTICS. Todos os direitos reservados.</p>
  </footer>

  <script>
    document.getElementById('mobile-menu-btn').addEventListener('click', () => {
      document.getElementById('main-menu').classList.toggle('show');
    });

  <script src="assets/script.js" defer></script>
</body>
</html>


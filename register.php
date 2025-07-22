<?php
// register.php — registo de utilizador
session_start();
require 'db.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)");
    if ($stmt->execute([$name, $email, $password])) {
        $_SESSION['user_id'] = $pdo->lastInsertId();
        header('Location: reserva.php');
        exit;
    } else {
        $error = "Erro no registo.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | PHIL ASEAN PROVIDER & LOGISTICS</title>
  <link rel="icon" href="assets/phil.jpeg" type="image/jpeg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <!-- COLE AQUI O <header> E MENU ORIGINAL -->
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
          <li><a href="index.php"><i class="fas fa-home"></i> Início</a></li>
          <li><a href="index.php#services"><i class="fas fa-ship"></i> Serviços</a></li>
          <li><a href="index.php#about"><i class="fas fa-info-circle"></i> Sobre</a></li>
          <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
          <li><a href="register.php"><i class="fas fa-user-plus"></i> Registro</a></li>
          <li><a href="index.php#contact"><i class="fas fa-envelope"></i> Contato</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <?php if ($error): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <main>
    <form id="registerForm" action="" method="post">
      <!-- COLE AQUI O FORMULÁRIO ORIGINAL (inputs, classes, ids) -->
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
      </div>
      <button type="submit" class="btn submit-btn">Registrar</button>
      <div class="link-group">
        <p>Já tem conta? <a href="login.php">Faça login</a></p>
      </div>
    </form>
  </main>
  <footer>
    <p>© 2025 PHIL ASEAN PROVIDER & LOGISTICS. Todos os direitos reservados.</p>
  </footer>
  <!-- COLE AQUI O <footer> ORIGINAL -->
  <script src="assets/script.js" defer></script>
</body>
</html>

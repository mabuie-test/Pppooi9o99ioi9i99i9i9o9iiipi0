<?php
// reserva.php — área cliente + histórico pedidos
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require 'db.php';

$uid = $_SESSION['user_id'];
$stmt = $pdo->prepare("
    SELECT id, date_estimated, services, status
    FROM orders
    WHERE user_id = ?
    ORDER BY created_at DESC
");
$stmt->execute([$uid]);
$orders = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <!-- COLE AQUI O SEU <head> COMPLETO DO reserva.html -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Área do Cliente | PHIL ASEAN PROVIDER & LOGISTICS</title>
  <link rel="icon" href="assets/phil.jpeg" type="image/jpeg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
    /* Reset e tipografia */
    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
    body { font-family: Arial, sans-serif; background: #f8f9fa; color: #212529; }

    /* Header fixo */
    header {
      background:#fff;
      box-shadow:0 2px 5px rgba(0,0,0,0.1);
      position:fixed; top:0; width:100%; z-index:1000;
    }
    .container.header-container {
      max-width:1200px; margin:0 auto;
      display:flex; align-items:center; justify-content:space-between;
      padding:15px 20px;
    }
    .logo img { width:40px; margin-right:10px; vertical-align:middle; }
    nav ul { display:flex; list-style:none; }
    nav ul li { margin-left:20px; }
    nav ul li a, nav ul li button {
      color:#333; font-weight:500; display:flex; align-items:center;
      background:none; border:none; cursor:pointer;
    }
    nav ul li i { margin-right:6px; }
    .mobile-menu-btn { display:none; background:none; border:none; font-size:1.2rem; }
    @media(max-width:768px) {
      .mobile-menu-btn { display:block; }
      nav ul {
        position:absolute; top:70px; right:0; background:#fff;
        flex-direction:column; width:200px;
        transform:translateX(100%); transition:transform .3s;
      }
      nav ul.show { transform:translateX(0); }
      nav ul li { margin:10px; }
    }

    /* Main */
    main { padding:120px 20px 60px; max-width:800px; margin:0 auto; }
    .section-title { text-align:center; margin-bottom:30px; }
    .section-title h2 {
      font-size:2rem; position:relative;
    }
    .section-title h2::after {
      content:''; width:60px; height:3px; background:#0077cc;
      display:block; margin:10px auto 0;
    }

    /* Formulário */
    form {
      background:#fff; padding:30px; border-radius:6px;
      box-shadow:0 3px 6px rgba(0,0,0,0.1);
    }
    .form-group { margin-bottom:20px; }
    .form-group label {
      display:block; margin-bottom:8px; font-weight:500;
    }
    .form-group input,
    .form-group select,
    .form-group textarea {
      width:100%; padding:10px; border:1px solid #ccc;
      border-radius:4px; font-size:1rem; background:#fff;
    }
    .form-group select[multiple] {
      height:140px;
    }
    .submit-btn {
      background:#0077cc; color:#fff;
      padding:12px 20px; border:none; border-radius:4px;
      cursor:pointer; font-size:1rem;
    }
    .submit-btn:hover { background:#005fa3; }

    /* Histórico de Pedidos - tabela */
    .history-table {
      width: 100%; border-collapse: collapse; margin-top: 1.5rem;
    }
    .history-table th,
    .history-table td {
      padding: 0.75rem; border: 1px solid #ccc; text-align: left;
    }
    .history-table th {
      background: var(--primary); color: #fff;
    }
      </style>
</head>
<body>
  <!-- COLE AQUI O <header> E MENU ORIGINAL -->
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
          <li><a href="reserva.php"><i class="fas fa-clipboard-list"></i> Área Cliente</a></li>
          <li><a href="index.php#contact"><i class="fas fa-envelope"></i> Contato</a></li>
          <li>
            <button id="logoutBtn">
              <i class="fas fa-sign-out-alt"></i> Logout
            </button>
          </li>
        </ul>
      </nav>
    </div>
  <main>
    <!-- COLE AQUI O FORMULÁRIO ORIGINAL DE RESERVA -->
        <form id="orderForm" action="/backend/submit_request.php" method="post">
      <div class="form-group">
        <label for="name">Nome Completo</label>
        <input id="name" name="name" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="company">Empresa</label>
        <input id="company" name="company" class="form-control">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="phone">Telefone</label>
        <input id="phone" name="phone" type="tel" class="form-control">
      </div>
      <div class="form-group">
        <label for="vessel">Nome do Navio</label>
        <input id="vessel" name="vessel" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="port">Porto</label>
        <select id="port" name="port" class="form-control" required>
          <option value="">Selecione um porto…</option>
          <option value="Maputo">Maputo</option>
          <option value="Beira">Beira</option>
          <option value="Nacala">Nacala</option>
          <option value="Pemba">Pemba</option>
        </select>
      </div>
      <div class="form-group">
        <label for="date">Data Estimada</label>
        <input id="date" name="date" type="date" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="services">Serviços Desejados</label>
          <select id="services" name="services[]" multiple class="form-control" required>
          <option value="Tubos Hidráulicos">Tubos Hidráulicos</option>
          <option value="Fornecimento de Água Potável">Fornecimento de Água Potável</option>
          <option value="Garbage Collector">Garbage Collector</option>
          <option value="Provisões e Mantimentos">Provisões e Mantimentos</option>
          <option value="Frutas Frescas 1">Frutas Frescas 1</option>
          <option value="Frutas Frescas 2">Frutas Frescas 2</option>
          <option value="Frutas Frescas 3">Frutas Frescas 3</option>
          <option value="Frutas Frescas 4">Frutas Frescas 4</option>
          <option value="Lubrificantes Marítimos">Lubrificantes Marítimos</option>
          <option value="Transporte Offshore">Transporte Offshore</option>
        </select>
      </div>
      <div class="form-group">
        <label for="notes">Observações Adicionais</label>
        <textarea id="notes" name="notes" class="form-control"></textarea>
      </div>
  <button type="submit" class="submit-btn">Enviar Pedido</button>
    </form>

    <section id="history">
      <table>
        <thead>
          <tr><th>Data</th><th>Serviços</th><th>Status</th><th>Factura</th></tr>
        </thead>
        <tbody>
          <?php foreach ($orders as $row): ?>
            <tr>
              <td><?= htmlspecialchars($row['date_estimated']) ?></td>
              <td><?= htmlspecialchars($row['services']) ?></td>
              <td><?= htmlspecialchars($row['status']) ?></td>
              <td>
                <a href="download_fatura.php?order_id=<?= $row['id'] ?>">Download</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </main>

  <!-- COLE AQUI O <footer> ORIGINAL -->
    <footer>
    <p>© 2025 PHIL ASEAN PROVIDER & LOGISTICS. Todos os direitos reservados.</p>
    </footer>
  <script src="assets/script.js" defer></script>
</body>
</html>

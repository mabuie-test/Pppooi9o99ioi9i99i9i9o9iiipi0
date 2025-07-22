<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <!-- COLE AQUI O TEU <head> ORIGINAL (meta, title, favicon, CSS, etc.) -->
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHIL ASEAN PROVIDER & LOGISTICS | Serviços Marítimos em Moçambique</title>
  <link rel="icon" href="assets/phil.jpeg" type="image/jpeg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <!-- COLE AQUI O TEU HEADER/MENU ORIGINAL -->
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
  <!-- Header -->
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
              <a href="login.html"><i class="fas fa-sign-in-alt"></i> Login</a>
              <a href="register.html"><i class="fas fa-user-plus"></i> Registro</a>
              <a href="reserva.html"><i class="fas fa-tachometer-alt"></i> Área Cliente</a>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Navegação dinâmica -->
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

  <!-- Resto do conteúdo original do index.html -->
  <!-- Hero Section -->
  <section class="hero" id="home">
    <video autoplay muted loop playsinline class="hero-video">
      <source src="assets/phi.mp4" type="video/mp4">
    </video>
    <div class="container">
      <h2>Serviços Premium de Abastecimento Naval em Moçambique</h2>
      <p>Seu parceiro confiável em logística marítima e provisões para embarcações ao longo de toda a costa moçambicana.</p>
      <a href="#order" class="btn">Solicitar Serviço</a>
      <a href="#contact" class="btn btn-outline">Contate‑nos</a>
    </div>
  </section>


  <!-- Services Section -->
  <section class="section" id="services">
    <div class="container">
      <div class="section-title">
        <h2>Nossos Serviços em Moçambique</h2>
      </div>
      <div class="services-grid">
        <!-- Tubos Hidráulicos -->
        <div class="service-card">
          <div class="service-img">
            <img src="assets/tubo.jpeg" alt="Tubos Hidráulicos">
          </div>
          <div class="service-content">
            <h3>Tubos Hidráulicos</h3>
            <p>Fornecemos tubos hidráulicos de alta resistência, ideais para aplicações marítimas e industriais, com serviços de reparação e manutenção.</p>
            <a href="#order" class="btn">Solicitar</a>
          </div>
        </div>
        <!-- Água Potável -->
        <div class="service-card">
          <div class="service-img">
            <img src="assets/agua.jpeg" alt="Fornecimento de Água Potável">
          </div>
          <div class="service-content">
            <h3>Fornecimento de Água Potável</h3>
            <p>Água limpa para consumo entregue em sua embarcação, em conformidade com regulamentos de saúde moçambicanos e padrões internacionais.</p>
            <a href="#order" class="btn">Solicitar</a>
          </div>
        </div>
        <!-- Coleta de Resíduos -->
        <div class="service-card">
          <div class="service-img">
            <img src="assets/llixo.jpeg" alt="Garbage Collector">
          </div>
          <div class="service-content">
            <h3>Garbage Collector</h3>
            <p>Coleta e manejo adequado de resíduos sólidos e líquidos gerados a bordo, conforme normas ambientais nacionais e internacionais.</p>
            <a href="#order" class="btn">Solicitar</a>
          </div>
        </div>
        <!-- Provisões e Mantimentos -->
        <div class="service-card">
          <div class="service-img">
            <img src="assets/alimento.jpeg" alt="Provisões e Mantimentos">
          </div>
          <div class="service-content">
            <h3>Provisões e Mantimentos</h3>
            <p>Provisões frescas, mantimentos secos e itens variados entregues em sua embarcação, cumprindo exigências alfandegárias moçambicanas.</p>
            <div class="fruit-gallery">
              <div class="fruit-item"><img src="assets/1.jpeg" alt="Frutas Frescas 1"></div>
              <div class="fruit-item"><img src="assets/2.jpeg" alt="Frutas Frescas 2"></div>
              <div class="fruit-item"><img src="assets/3.jpeg" alt="Frutas Frescas 3"></div>
              <div class="fruit-item"><img src="assets/4.jpeg" alt="Frutas Frescas 4"></div>
            </div>
            <a href="#order" class="btn">Solicitar</a>
          </div>
        </div>
        <!-- Lubrificantes Marítimos -->
        <div class="service-card">
          <div class="service-img">
            <img src="assets/ole.jpeg" alt="Lubrificantes Marítimos">
          </div>
          <div class="service-content">
            <h3>Lubrificantes Marítimos</h3>
            <p>Lubrificantes de alta performance, formulados para atender às exigências de motores e equipamentos marítimos.</p>
            <a href="#order" class="btn">Solicitar</a>
          </div>
        </div>
        <!-- Transporte Offshore -->
        <div class="service-card">
          <div class="service-img">
            <img src="assets/PH1.jpg" alt="Transporte Offshore">
          </div>
          <div class="service-content">
            <h3>Transporte em Offshore</h3>
            <p>Serviços completos de transporte em operações offshore, garantindo segurança, agilidade e eficiência em todas as etapas.</p>
            <a href="#order" class="btn">Solicitar</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section class="section about" id="about">
    <div class="container">
      <div class="about-content">
        <div class="about-text">
          <h2>Sobre Nossas Operações em Moçambique</h2>
          <p>PHIL ASEAN PROVIDER & LOGISTICS é especialista em serviços marítimos na costa moçambicana, com ampla experiência em operações portuárias e regulamentações locais.</p>
          <p>Desde 2010, atendemos embarcações em Maputo, Beira, Nacala, Pemba e Quelimane, 24/7, com tempo de resposta ágil.</p>
          <p>Nosso conhecimento das normas alfandegárias e relacionamento com autoridades garantem operações sem entraves.</p>
        </div>
        <div class="about-img">
          <img src="assets/IMG_8120.JPG" alt="Costa Moçambicana">
        </div>
      </div>
    </div>
  </section>

  <!-- Order Section -->
  <section class="section order" id="order">
    <div class="container">
      <div class="section-title">
        <h2>Faça Seu Pedido</h2>
      </div>
      <form id="orderForm">
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
          <select id="services" name="services" multiple class="form-control" required>
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
          <label for="notes">Observações</label>
          <textarea id="notes" name="notes" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn submit-btn">Enviar Pedido</button>
      </form>
    </div>
  </section>


  <!-- Contact Section -->
  <section class="section" id="contact">
    <div class="container">
      <div class="section-title">
        <h2>Nossos Contatos em Moçambique</h2>
      </div>
      <div class="contact-info">
        <div class="contact-card"><i class="fas fa-map-marker-alt"></i><h3>Sede</h3><p>Porto de Maputo<br>Moçambique</p></div>
        <div class="contact-card"><i class="fas fa-phone-alt"></i><h3>Telefones</h3><p>+258 878979532 (Principal)</p><p>+258 874883021 (Emergência)</p></div>
        <div class="contact-card"><i class="fas fa-envelope"></i><h3>Email</h3><p>philasean@philaseanprovider.co.mz</p><p>shipsupply@philaseanprovider.co.mz</p></div>
        <div class="contact-card"><i class="fas fa-clock"></i><h3>Horário</h3><p>24/7 com serviços de emergência</p></div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container footer-content">
      <div class="footer-col">
        <h3>PHIL ASEAN MOÇAMBIQUE</h3>
        <p>Seu parceiro confiável em serviços marítimos desde 2010.</p>
        <div class="social-links">
          <a href="https://www.facebook.com/share/19DV7gvS1T/?mibextid=wwXIfr"><i class="fab fa-facebook-f"></i></a>
          <a href="https://mz.linkedin.com/in/phil-asean-948604358"><i class="fab fa-linkedin-in"></i></a>
          <a href="https://wa.me/258874883021"><i class="fab fa-whatsapp"></i></a>
          <a href="https://www.instagram.com/phil_asean?igsh=djZocnQwcDJkMHF1"><i class="fab fa-instagram-f"></i></a>
          
        </div>
      </div>
      <div class="footer-col">
        <h3>Links Rápidos</h3>
        <ul class="footer-links">
          <li><a href="#services">Serviços</a></li>
          <li><a href="#about">Sobre</a></li>
          <li><a href="#order">Solicitações</a></li>
          <li><a href="#contact">Contato</a></li>
        </ul>
      </div>
    </div>
    <p style="text-align:center; padding:1rem 0; background:#f5f5f5; margin:0;">© 2025 PHIL ASEAN PROVIDER & LOGISTICS. Todos os direitos reservados.</p>
  </footer>

  <!-- Mobile Menu Toggle -->
  <script>
    document.getElementById('mobile-menu-btn').addEventListener('click', () => {
      document.getElementById('main-menu').classList.toggle('show');
    });

  <script src="assets/script.js" defer></script>
</body>
</html>

<?php
// admin.php — painel de administração
session_start();
// validar se é admin (à tua escolha)
require 'db.php';

$q = $pdo->query("
    SELECT o.id, u.name, o.vessel, o.port, o.date_estimated, o.services, o.status
    FROM orders o
    JOIN users u ON o.user_id = u.id
    ORDER BY o.created_at DESC
");
$rows = $q->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <title>Painel Admin</title>
  <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
  <h1>Painel de Pedidos</h1>
  <table border="1">
    <tr>
      <th>ID</th><th>Usuário</th><th>Navio</th>
      <th>Porto</th><th>Data</th><th>Serviços</th>
      <th>Status</th><th>Ações</th>
    </tr>
    <?php foreach ($rows as $r): ?>
      <tr>
        <td><?= $r['id'] ?></td>
        <td><?= htmlspecialchars($r['name']) ?></td>
        <td><?= htmlspecialchars($r['vessel']) ?></td>
        <td><?= htmlspecialchars($r['port']) ?></td>
        <td><?= htmlspecialchars($r['date_estimated']) ?></td>
        <td><?= htmlspecialchars($r['services']) ?></td>
        <td><?= htmlspecialchars($r['status']) ?></td>
        <td>
          <a href="change_status.php?id=<?= $r['id'] ?>&status=pendente">Pendente</a> |
          <a href="change_status.php?id=<?= $r['id'] ?>&status=em progresso">Em Progresso</a> |
          <a href="change_status.php?id=<?= $r['id'] ?>&status=concluido">Concluído</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>

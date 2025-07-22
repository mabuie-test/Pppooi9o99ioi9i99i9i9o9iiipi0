<?php
// change_status.php — atualiza status de um pedido
require 'db.php';
$id     = intval($_GET['id']);
$status = $_GET['status'];
if (in_array($status, ['pendente','em progresso','concluido'])) {
    $stmt = $pdo->prepare("UPDATE orders SET status = ? WHERE id = ?");
    $stmt->execute([$status, $id]);
}
header('Location: admin.php');
exit;
?>

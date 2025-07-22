<?php
// history.php — devolve JSON array de pedidos do user
header('Content-Type: application/json');
session_start();
if (!isset($_SESSION['user_id'])) {
  echo json_encode([]); exit;
}
require '../db.php';
$stmt = $pdo->prepare("
  SELECT id,date_estimated,services,status
  FROM orders
  WHERE user_id = ?
  ORDER BY created_at DESC
");
$stmt->execute([$_SESSION['user_id']]);
echo json_encode($stmt->fetchAll());

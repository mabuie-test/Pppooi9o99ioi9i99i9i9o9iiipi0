<?php
// order.php — aceita JSON { vessel,port,date,services[],notes }, devolve { success, order_id }
header('Content-Type: application/json');
session_start();
if (!isset($_SESSION['user_id'])) {
  echo json_encode(['success'=>false,'error'=>'Não autenticado']); exit;
}
require '../db.php';
$data = json_decode(file_get_contents('php://input'), true);
$stmt = $pdo->prepare("
  INSERT INTO orders (user_id,vessel,port,date_estimated,services,notes)
  VALUES (?, ?, ?, ?, ?, ?)
");
$svc = implode(', ', $data['services'] ?? []);
if ($stmt->execute([$_SESSION['user_id'],$data['vessel'],$data['port'],$data['date'],$svc,$data['notes']])) {
  // envia email simples
  mail('philasean@philaseanprovider.co.mz','Novo Pedido',$svc);
  echo json_encode(['success'=>true,'order_id'=>$pdo->lastInsertId()]);
} else {
  echo json_encode(['success'=>false,'error'=>'Falha ao criar pedido']);
}

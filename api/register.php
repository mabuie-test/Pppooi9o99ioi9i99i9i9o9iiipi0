<?php
// register.php — aceita JSON { name,email,password }, devolve JSON
header('Content-Type: application/json');
require '../db.php';
$data = json_decode(file_get_contents('php://input'), true);
if (!$data) {
  echo json_encode(['success'=>false,'error'=>'JSON inválido']); exit;
}
$stmt = $pdo->prepare(
  "INSERT INTO users (name,email,password_hash)
   VALUES (?, ?, ?)"
);
$hash = password_hash($data['password'], PASSWORD_DEFAULT);
if ($stmt->execute([$data['name'],$data['email'],$hash])) {
  echo json_encode(['success'=>true,'user_id'=>$pdo->lastInsertId()]);
} else {
  echo json_encode(['success'=>false,'error'=>'Erro no registo']);
}

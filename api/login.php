<?php
// login.php — aceita JSON { email,password }, devolve JSON
header('Content-Type: application/json');
require '../db.php';
$data = json_decode(file_get_contents('php://input'), true);
$stmt = $pdo->prepare("SELECT id,password_hash FROM users WHERE email = ?");
$stmt->execute([$data['email']]);
$user = $stmt->fetch();
if ($user && password_verify($data['password'], $user['password_hash'])) {
  // grava sessão
  session_start();
  $_SESSION['user_id'] = $user['id'];
  echo json_encode(['success'=>true,'user_id'=>$user['id']]);
} else {
  echo json_encode(['success'=>false,'error'=>'Credenciais inválidas']);
}

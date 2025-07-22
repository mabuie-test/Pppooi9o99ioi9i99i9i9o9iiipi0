<?php
// order_handler.php — grava pedidos + envia email
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uid      = $_SESSION['user_id'];
    $vessel   = $_POST['vessel'];
    $port     = $_POST['port'];
    $date     = $_POST['date'];
    $services = implode(', ', $_POST['services'] ?? []);
    $notes    = $_POST['notes'] ?? '';

    $stmt = $pdo->prepare("
        INSERT INTO orders (user_id, vessel, port, date_estimated, services, notes)
        VALUES (?, ?, ?, ?, ?, ?)
    ");
    if ($stmt->execute([$uid, $vessel, $port, $date, $services, $notes])) {
        // envia email notificando admin/instituição
        mail(
          'philasean@philaseanprovider.co.mz',
          'Novo Pedido PHIL ASEAN',
          "Pedido #{$pdo->lastInsertId()}\nNavio: $vessel\nPorto: $port\nData: $date\nServiços: $services"
        );
        header('Location: reserva.php?msg=ok');
        exit;
    } else {
        die("Erro ao gravar pedido.");
    }
}
?>

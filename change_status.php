<?php
require 'db.php';
$id     = intval($_GET['id']);
$status = $_GET['status'];
if (in_array($status, ['pendente','em progresso','concluido'])) {
    $mysqli->query(
      "UPDATE orders 
       SET status = '{$mysqli->real_escape_string($status)}' 
       WHERE id = {$id}"
    );
}
header('Location: admin.php');
exit;
?>

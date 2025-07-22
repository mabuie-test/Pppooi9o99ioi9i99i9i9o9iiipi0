<?php
require 'db.php';
$order_id = intval($_GET['order_id']);
// (poderia validar sessão/admin ou pertencimento)
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="fatura_' . $order_id . '.pdf"');
// Aqui pode usar biblioteca como FPDF para gerar PDF real
echo "Fatura do pedido #{$order_id}";
exit;
?>

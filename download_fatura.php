<?php
// download_fatura.php — gera ou serve fatura PDF
require 'db.php';
$order_id = intval($_GET['order_id']);

// Aqui podes validar se o user tem permissão ou se é admin.
// Para gerar PDF real, usa FPDF, TCPDF, etc.

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="fatura_' . $order_id . '.pdf"');
echo "Fatura do pedido #{$order_id}";
exit;
?>


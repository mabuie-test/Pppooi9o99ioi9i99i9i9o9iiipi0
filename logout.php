<?php
// logout.php — termina sessão
session_start();
session_destroy();
header('Location: index.php');
exit;
?>

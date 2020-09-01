<?php
session_start();

// remove produto do carrinho dando unset no id passado pelo URL
unset($_SESSION['produto'][$_GET['id']]);

// volta para a pagina anterior onde foi removido o produto do carrinho
echo "<script>javascript:history.go(-1)</script>";
?>
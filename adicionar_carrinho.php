<?php
session_start();
// Verifica se o produto já foi colocado no carrinho para não repetir
if (!isset($_SESSION['produto'][$_GET['codigo']])) {
    $_SESSION['produto'][$_GET['codigo']]['valor'] = $_GET['valor'];
    $_SESSION['produto'][$_GET['codigo']]['nome'] = $_GET['nome'];
    $_SESSION['produto'][$_GET['codigo']]['foto'] = $_GET['foto'];
    $_SESSION['produto'][$_GET['codigo']]['qtd'] = 1;
}
// volta para a pagina anterior onde foi adicionado ao carrino 
echo "<script>javascript:history.go(-1)</script>";
?>
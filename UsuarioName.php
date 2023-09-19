<?php
// Inicie a sessão
// Start session
if(!session_id()){
    session_start();
}
require_once "./conexao/config.php";


// Verifique se o usuário está autenticado
if (isset($_SESSION['usuario'])) {
    // Obtém o nome do usuário da sessão
    $nomeUsuario = $_SESSION['usuario'];

} else {
    // Usuário não autenticado, redirecione para a página de login
    header("Location: index.php");
    exit();
}
?>
<?php

// Iniciar a sessão
session_start();

// Verificar se as variáveis da sessão estão definidas
if (!isset($_SESSION['id_operador']) || !isset($_SESSION['login']) || !isset($_SESSION['senha']) || !isset($_SESSION['operador'])) {
    // Redirecionar para index.php se as variáveis da sessão não estiverem definidas
    header("Location: ../index.php");
    exit; // Certifique-se de parar a execução do script após o redirecionamento
}

// Acessar os valores da sessão
// echo $_SESSION['login']; // Mostra o valor do login
// echo $_SESSION['senha']; // Mostra o valor da senha
// echo $_SESSION['operador']; // Mostra o valor do operador

?>
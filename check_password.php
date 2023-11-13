<?php
// Inclua o arquivo de configuração
include('config.php');

// Recebe o login e a senha do formulário
$login = $_POST['login'];
$senha = $_POST['senha'];

// Consulta no banco de dados
$sql = "SELECT * FROM operadores WHERE operador = '$login' AND password = '$senha'";
$result = $conn->query($sql);

// Verifica se o operador e senha existem
if ($result->num_rows > 0) {
    echo 'success';
} else {
    echo 'error';
}

// Fecha a conexão
$conn->close();
?>

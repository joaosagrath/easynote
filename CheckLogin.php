<?php
// Inclua o arquivo de configuração
include('config.php');

// Recebe o login do formulário
$login = $_POST['login'];

// Consulta no banco de dados
$sql = "SELECT * FROM operadores WHERE login = '$login'";
$result = $conn->query($sql);

// Verifica se o operador existe
if ($result->num_rows > 0) {
    echo 'success';
} else {
    echo 'error';
}

// Fecha a conexão
$conn->close();
?>

<?php
// Configurações de conexão com o banco de dados
$servername = "localhost"; // Nome do servidor do banco de dados (normalmente 'localhost' para instalações locais)
$username = "root"; // Nome de usuário do banco de dados
$password = ""; // Senha do banco de dados
$database = "easynote"; // Nome do banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
?>
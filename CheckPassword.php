<?php
// Inclua o arquivo de configuração
include('config.php');

// Recebe o login e a senha do formulário
$login = $_POST['login'];
$senha = $_POST['senha']; // Supondo que o nome do campo no formulário seja 'password'

// Consulta no banco de dados
$sql = "SELECT * FROM operadores WHERE login = '$login' AND password = '$senha'";
$result = $conn->query($sql);

// Verifica se o operador e senha existem
if ($result->num_rows > 0) {
    // Obter os dados do operador
    $row = $result->fetch_assoc();
	$id_operador = $row['id_operador'];
    $login = $row['login'];
    $senha = $row['password'];
    $operador = $row['operador'];

    // Iniciar ou retomar uma sessão
    session_start();

    // Definir as variáveis da sessão
	$_SESSION['id_operador'] = $id_operador;
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    $_SESSION['operador'] = $operador;
    
    echo 'success';
} else {
    echo 'error';
}

// Fecha a conexão
$conn->close();
?>

<?php
// Inclua o arquivo de configuração
include('config.php');

// Recebe o RA e a senha do formulário
$ra = $_POST['ra'];
$senha = $_POST['senha'];

// Consulta no banco de dados usando declaração preparada
$sql = "SELECT * FROM alunos WHERE ra = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $ra, $senha);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se o RA foi encontrado
if ($result->num_rows > 0) {
    echo 'success';
} else {
    echo 'error';
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>

         


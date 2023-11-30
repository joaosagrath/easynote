<?php
// Inclua o arquivo de configuração
include('config.php');

// Recebe o RA e o CPF do formulário
$ra = $_POST['ra'];
$cpf = $_POST['cpf'];

// Consulta no banco de dados
$sql = "SELECT * FROM inativos WHERE ra = ? AND cpf = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $ra, $cpf);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se a linha foi encontrada
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Verifica o status
    if ($row['status'] == 'ativo') {
        echo 'success';
    } elseif ($row['status'] == 'suspenso') {
        echo 'error';
    }
} else {
    echo 'error';
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>

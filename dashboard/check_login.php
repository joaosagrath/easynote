<?php
// Inclua o arquivo de configuração
include('config.php');

// Recebe o login do formulário
$ra = $_POST['ra'];

// Consulta no banco de dados
$sql = "SELECT * FROM alunos WHERE ra = '$ra' ";
$result = $conn->query($sql);

// Verifica se o operador existe
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Verifica se a senha está vazia
    if (empty($row['password'])) {		
        echo 'semSenha';
    } else {
        echo 'ativado';
    }

} else {
    // Consulta no banco de dados
    $sql = "SELECT * FROM inativos WHERE ra = '$ra'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $status = $row['status'];

        if ($status == 'ativo') {
            echo 'ativo' ;
        } elseif ($status == 'suspenso') {
            echo 'suspenso' ;
        }
    } else {
        echo 'RA não existe na base de dados';  // Adicionado este caso caso o status seja 'inativo' e não exista nenhum registro
    }
}



// Fecha a conexão
$conn->close();
?>

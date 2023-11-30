<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclua o arquivo de configuração
include('config.php');

// Ajuste o fuso horário
date_default_timezone_set('America/Sao_Paulo');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['CadastroEquipamentos'])) {
    // Coletar os dados do formulário
    $patrimonio = $_POST['patrimonio'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $status = $_POST['status'];
	$datain = $_POST['datain']; // Recebe a data no formato ano-mes-dia do formulário
    $data = date('d-m-Y', strtotime($datain)); // Converte para o formato dia-mes-ano
    $obs = $_POST['obs'];
    $uso = 0;
    
    // Verificar se o patrimônio já existe na tabela
    $check_query = "SELECT * FROM equipamentos WHERE patrimonio = '$patrimonio'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        // Se o patrimônio existir, exibir um alerta
        echo "<script>alert('O patrimônio já está cadastrado.'); window.location.href = 'equipamentos.php';</script>";
    } else {
        // Caso contrário, proceder com a inserção
        $sql = "INSERT INTO equipamentos (patrimonio, marca, modelo, status, observacao, data, uso) 
			VALUES ('$patrimonio', '$marca', '$modelo', '$status', '$obs', '$data', '$uso')";
    
        // Executar a query
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Patrimônio $patrimonio cadastrado com sucesso.'); window.location.href = 'equipamentos.php';</script>";
        } else {
            echo "Erro na inserção de dados: " . $conn->error;
        }
    }

    // Fechar a conexão
    $conn->close();
}
?>
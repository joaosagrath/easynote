<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclua o arquivo de configuração
include('config.php');

// Ajuste o fuso horário
date_default_timezone_set('America/Sao_Paulo');

// Verifique se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha os valores dos campos do formulário
    $patrimonioEdit = $_POST["patrimonio-edit"];
    $marcaEdit = $_POST["marca-edit"];
    $modeloEdit = $_POST["modelo-edit"];
    $statusEdit = $_POST["status-edit"];
	
	$datain = $_POST['datain-edit']; // Recebe a data no formato ano-mes-dia do formulário
    $dataInEdit = date('d-m-Y', strtotime($datain)); // Converte para o formato dia-mes-ano
    
	$obsEdit = $_POST["obs-edit"];

    // Atualize os dados na tabela equipamentos usando declaração preparada
    $atualiza_sql = "UPDATE equipamentos SET marca=?, modelo=?, status=?, observacao=?, data=? WHERE patrimonio=?";
    $stmt = $conn->prepare($atualiza_sql);

    // Verifique se a preparação da consulta foi bem-sucedida
    if ($stmt) {
        $stmt->bind_param("ssssss", $marcaEdit, $modeloEdit, $statusEdit, $obsEdit, $dataInEdit, $patrimonioEdit);

        // Executa a consulta preparada
        if ($stmt->execute()) {
            // echo "Dados atualizados com sucesso.<br><br>";
            // Redirecione o usuário de volta para a página de alunos
            header("Location: equipamentos.php");
        } else {
            echo "Erro na atualização de dados: " . $stmt->error;
        }

        // Feche a declaração preparada
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }
}
?>

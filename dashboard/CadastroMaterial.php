<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclua o arquivo de configuração
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['CadastroMaterial'])) {
    // Coletar os dados do formulário
    $sala = $_POST['sala'];
    $controleAr = isset($_POST['ControleAr']) ? 1 : 0; // Se estiver marcado, será 1 (true), senão, 0 (false)
    $controleProjetor = isset($_POST['ControleProjetor']) ? 1 : 0;
    $marcadores = isset($_POST['Marcadores']) ? 1 : 0;
    $apagador = isset($_POST['Apagador']) ? 1 : 0;
    $observacao = $_POST['obs'];
	
	// verificar se o material ja esta cadastrado
	$query_check = "SELECT * FROM material WHERE sala = '$sala'";
	$result = $conn->query($query_check);

	if ($result->num_rows > 0) {
		// Se o patrimônio existir, exibir um alerta
        echo "<script>alert('O equipamento da sala $sala ja esta cadastrado!'); window.location.href = 'material.php';</script>";
	}else {
        // Caso contrário, proceder com a inserção
        $sql = "INSERT INTO material (sala, controle_ar, controle_projetor, marcadores, apagador, observacao) VALUES ('$sala', '$controleAr', '$controleProjetor', '$marcadores', '$apagador', '$observacao')";
    
        // Executar a query
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Material da sala $sala cadastrado com sucesso.'); window.location.href = 'material.php';</script>";
        } else {
            echo "Erro na inserção de dados: " . $conn->error;
        }
    }

    // Fechar a conexão
    $conn->close();
}


?>


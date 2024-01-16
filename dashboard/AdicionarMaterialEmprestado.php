<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclua o arquivo de configuração
include('config.php');

// Ajuste o fuso horário
date_default_timezone_set('America/Sao_Paulo');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
    // Obtenha os valores do formulário
	
    $id_material = $_POST['id_material'];
    $id_professor = $_POST['id_professor'];
    $id_operador = $_POST['id_operador'];
    $controleAr = isset($_POST['ControleAr']) ? 1 : 0; // Se estiver marcado, será 1 (true), senão, 0 (false)
    $controleProjetor = isset($_POST['ControleProjetor']) ? 1 : 0;
    $marcadores = isset($_POST['Marcadores']) ? 1 : 0;
    $apagador = isset($_POST['Apagador']) ? 1 : 0;
	$dataIn = date('d/m/Y H:i'); // Formato: "Dia/Mês/Ano Hora:Minuto"
	$dataOut = '';
    $observacao = $_POST['obs'];
	$status = 'Em Uso';
	
	echo $controleAr;
	
    // Obtenha a hora atual
    $dataHora = date('d-m-Y H:i:s'); // Formato: "Ano-Mês-Dia Hora:Minuto:Segundo"
	

    // Verificar se já existe um empréstimo com os mesmos valores
    $verificacaoSql = "SELECT * FROM retirada WHERE (id_material = '$id_material' OR id_professor = '$id_professor') AND status = 'Em uso'";

    $resultadoVerificacao = $conn->query($verificacaoSql);

    if ($resultadoVerificacao->num_rows > 0) {
		header('Location: emprestimo.php?msg=O material da sala ja esta com o professor');
        // echo "O material da sala ja esta com o professor";
    } else {
		// Se não existir, proceda com a inserção
        $sql = "INSERT INTO retirada (
            id_material, 
            id_professor, 
            id_operador,
			controle_ar,
			controle_projetor,
			marcadores,
			apagador,
            datain,
            dataout,
            observacao,
            status) VALUES ('$id_material', 
							'$id_professor', 
							'$id_operador', 
							'$controleAr', 
                            '$controleProjetor', 
							'$marcadores', 
							'$apagador', 
							'$dataIn', 
							'$dataout', 
							'$observacao', 
							'$status')";
							
		// $atualiza_material = "UPDATE material SET controle_ar = '$controleAr', controle_projetor = '$controleProjetor', marcadores = '$marcadores', apagador = '$apagador' WHERE id_material = '$id_material'";
		
		/* Executa as querys
		if ($conn->query($atualiza_material) === TRUE) {
			echo "Dados atualizados com sucesso.";
		} else {
            echo "Erro na atualização de dados ta tabela material: " . $conn->error;
        }*/
        
        if ($conn->query($sql) === TRUE) {
            echo "Dados inseridos com sucesso.";

            // Redireciona após a chamada das funções
            header('Location: emprestimo.php?msg=Material Entregue');
        } else {
            echo "Erro na inserção de dados: " . $conn->error;
        }
    }
}
?>

<?php
// Inclua o arquivo de configuração
include('config.php');

// Ajuste o fuso horário
date_default_timezone_set('America/Sao_Paulo');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenha os valores do formulário
	
	$id_material = $_POST['id_material'];
    $id_professor = $_POST['id_professor'];
    
	$rp = $_POST['rp'];
    $sala = $_POST['sala'];
	
    $controleAr = isset($_POST['ControleAr']) ? 1 : 0; // Se estiver marcado, será 1 (true), senão, 0 (false)
    $controleProjetor = isset($_POST['ControleProjetor']) ? 1 : 0;
    $marcadores = isset($_POST['Marcadores']) ? 1 : 0; 
    $apagador = isset($_POST['Apagador']) ? 1 : 0;
    
	$obs = $_POST['obs'];
	$status = 'Em Uso';

    // Verifica se já existe um material em uso com os parâmetros fornecidos
    $verifica_sql = "SELECT * FROM retirada WHERE id_material = '$id_material' AND id_professor = '$id_professor' AND status = 'Em Uso'";
    //echo "id_material: " . $id_material . " -- ";
	$verifica_result = $conn->query($verifica_sql);
	

    if ($verifica_result->num_rows > 0) {
        // Se existir um ematerial em uso, atualiza as colunas apropriadas
        $dataOut = date('d/m/Y H:i');
        $statusFinalizado = 'Devolvido';

        $atualiza_retirada = "UPDATE retirada 
							  SET dataout = '$dataOut', status = '$statusFinalizado' 
							  WHERE id_professor = '$id_professor' 
							  AND id_material = $id_material
							  AND status = 'Em Uso'";
		
		$atualiza_material = "UPDATE material 
							  SET controle_ar = '$controleAr', controle_projetor = '$controleProjetor', marcadores = '$marcadores', apagador = '$apagador'
							  WHERE id_material = $id_material";
		
		if ($conn->query($atualiza_material) === TRUE) {
			echo "Dados atualizados com sucesso.";
		} else {
            echo "Erro na atualização de dados ta tabela material: " . $conn->error;
        }
		
        // Executa a query de atualização de retirada
        if ($conn->query($atualiza_retirada) === TRUE) {
            //echo "Dados atualizados com sucesso.";
			header("Location: emprestimo.php?msg=Material da sala \"$sala\" devolvido");

        } else {
            echo "Erro na atualização de dados da tabela retirada: " . $conn->error;
        }
    } else {
        echo "Nenhum empréstimo em andamento encontrado com os parâmetros fornecidos.";
    }

    // Fecha a conexão
    $conn->close();
}
?>

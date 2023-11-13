<?php
// Inclua o arquivo de configuração
include('config.php');

// Ajuste o fuso horário
date_default_timezone_set('America/Sao_Paulo');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenha os valores do formulário
    $id_aluno = $_POST['id_aluno'];
    $id_equipamento = $_POST['id_equipamento'];
    $patrimonio = $_POST['patrimonio'];
    $ra = $_POST['ra'];
    $status = 'Em Andamento';

    // Verifica se já existe um empréstimo em andamento com os parâmetros fornecidos
    $verifica_sql = "SELECT * FROM emprestimos WHERE id_aluno = '$id_aluno' AND id_equipamento = '$id_equipamento' 
                     AND patrimonio = '$patrimonio' AND ra = '$ra' AND status = 'Em Andamento'";
    $verifica_result = $conn->query($verifica_sql);

    if ($verifica_result->num_rows > 0) {
        // Se existir um empréstimo em andamento, atualiza as colunas apropriadas
        $dataOut = date('d/m/Y H:i');
        $statusFinalizado = 'Finalizado';

        $atualiza_sql = "UPDATE emprestimos SET dataout = '$dataOut', status = '$statusFinalizado' 
                         WHERE id_aluno = '$id_aluno' AND id_equipamento = '$id_equipamento' 
                         AND patrimonio = '$patrimonio' AND ra = '$ra' AND status = 'Em Andamento'";

        // Executa a query de atualização
        if ($conn->query($atualiza_sql) === TRUE) {
            echo "Dados atualizados com sucesso.";
            //header('Location: emprestimo.php?msg=Emprestimo do equipamento "$patrimonio" finalizado');
			header("Location: emprestimo.php?msg=Emprestimo do equipamento \"$patrimonio\" finalizado");

        } else {
            echo "Erro na atualização de dados: " . $conn->error;
        }
    } else {
        echo "Nenhum empréstimo em andamento encontrado com os parâmetros fornecidos.";
    }

    // Fecha a conexão
    $conn->close();
}
?>

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
    $id_aluno = $_POST['id_aluno'];
    $ra = $_POST['ra'];
    $id_equipamento = $_POST['id_equipamento'];
	$id_operador = $_POST['id_operador'];
    $dataIn = date('d/m/Y H:i'); // Formato: "Dia/Mês/Ano Hora:Minuto"
    $dataOut = '';
    $observacao = $_POST['observacao'];
    $status = 'Em Andamento';

    // Verificar se já existe um empréstimo com os mesmos valores
    $verificacaoSql = "SELECT * FROM emprestimos WHERE (id_aluno = '$id_aluno' OR id_equipamento = '$id_equipamento') AND status = 'Em Andamento'";

    $resultadoVerificacao = $conn->query($verificacaoSql);

    if ($resultadoVerificacao->num_rows > 0) {
		header('Location: emprestimo.php?msg=Já existe um empréstimo em andamento para esse Aluno');
       // echo "Já existe um empréstimo em andamento com esses valores.";
    
	} else {
        // Se não existir, proceda com a inserção
        $sql = "INSERT INTO emprestimos (
            id_aluno, 
            ra,
            id_equipamento, 
			id_operador,
            datain, 
            dataout,
            observacao,
            status
			) VALUES ('$id_aluno', '$ra', '$id_equipamento', '$id_operador', '$dataIn', '$dataOut', '$observacao', '$status' )";
		
		$atualiza_equipamento = "UPDATE equipamentos SET observacao = '$observacao' WHERE id_equipamento = '$id_equipamento'";
		
		// Executa a query de atualização
        if ($conn->query($atualiza_equipamento) === TRUE) {
            echo "Dados atualizados com sucesso.";
        } else {
            echo "Erro na atualização de dados de equipamentos: " . $conn->error;
        }
		
        // Executa a query
        if ($conn->query($sql) === TRUE) {
            //echo "Dados inseridos com sucesso.";

            // Chama a função para atualizar a tabela equipamentos
            atualizarUsoEquipamentos($conn);

            // Chama a função para incrementar a coluna 'emprestimo' na tabela 'alunos'
            incrementarEmprestimoAlunos($conn, $id_aluno);

            // Redireciona após a chamada das funções
            header('Location: emprestimo.php?msg=Notebook Entregue');
        } else {
            echo "Erro na inserção de dados: " . $conn->error;
        }
    }
}

// Função para atualizar a tabela equipamentos
function atualizarUsoEquipamentos($conn)
{
    // Atualizar a coluna 'uso' na tabela 'equipamentos'
    $sql = "UPDATE equipamentos
            SET uso = (
                SELECT COUNT(*) 
                FROM emprestimos 
                WHERE emprestimos.id_equipamento = equipamentos.id_equipamento
            )";

    if ($conn->query($sql) === TRUE) {
        //echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro na atualização: " . $conn->error;
    }
}

// Função para incrementar a coluna 'emprestimo' na tabela 'alunos'
function incrementarEmprestimoAlunos($conn, $id_aluno)
{
    // Incrementar a coluna 'emprestimo' na tabela 'alunos'
    $sql = "UPDATE alunos
            SET emprestimo = emprestimo + 1
            WHERE id_aluno = '$id_aluno'";

    if ($conn->query($sql) === TRUE) {
        //echo "Emprestimo do aluno incrementado com sucesso!";
    } else {
        echo "Erro no incremento do emprestimo: " . $conn->error;
    }
}

// Fecha a conexão
$conn->close();
?>
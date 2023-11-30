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
    $id_equipamento = $_POST['id_equipamento'];
    $dataIn = date('d/m/Y H:i'); // Formato: "Dia/Mês/Ano Hora:Minuto"
    $patrimonio = $_POST['patrimonio'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $operador = $_POST['operador'];
    $ra = $_POST['ra'];
    $aluno = mysqli_real_escape_string($conn, $_POST["nome"]); // Escapar o caractere '
    $cpf = $_POST['cpf'];
    $curso = $_POST['curso'];
    $dataOut = '';
    $observacao = $_POST['observacao'];
    $status = 'Em Andamento';

    // Verificar se já existe um empréstimo com os mesmos valores
    $verificacaoSql = "SELECT * FROM emprestimos WHERE (patrimonio = '$patrimonio' OR ra = '$ra') AND status = 'Em Andamento'";

    $resultadoVerificacao = $conn->query($verificacaoSql);

    if ($resultadoVerificacao->num_rows > 0) {
        echo "Já existe um empréstimo em andamento com esses valores.";
    } else {
        // Se não existir, proceda com a inserção
        $sql = "INSERT INTO emprestimos (
            id_aluno, 
            id_equipamento, 
            datain, 
            patrimonio, 
            marca, 
            modelo, 
            ra, 
            aluno, 
            cpf, 
            curso,
            dataout,
            observacao,
            status,
			operador) VALUES ('$id_aluno', '$id_equipamento', '$dataIn', '$patrimonio', '$marca', '$modelo',
                            '$ra', '$aluno', '$cpf', '$curso', '$dataOut', '$observacao', '$status', '$operador')";
		
		$atualiza_equipamento = "UPDATE equipamentos SET observacao = '$observacao' WHERE id_equipamento = '$id_equipamento' AND patrimonio = '$patrimonio'";
		
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
            incrementarEmprestimoAlunos($conn, $ra);

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
                WHERE emprestimos.patrimonio = equipamentos.patrimonio
            )";

    if ($conn->query($sql) === TRUE) {
        //echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro na atualização: " . $conn->error;
    }
}

// Função para incrementar a coluna 'emprestimo' na tabela 'alunos'
function incrementarEmprestimoAlunos($conn, $ra)
{
    // Incrementar a coluna 'emprestimo' na tabela 'alunos'
    $sql = "UPDATE alunos
            SET emprestimo = emprestimo + 1
            WHERE ra = '$ra'";

    if ($conn->query($sql) === TRUE) {
        //echo "Emprestimo do aluno incrementado com sucesso!";
    } else {
        echo "Erro no incremento do emprestimo: " . $conn->error;
    }
}

// Fecha a conexão
$conn->close();
?>
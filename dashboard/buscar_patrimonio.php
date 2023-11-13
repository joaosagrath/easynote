<?php
// Conectar ao banco de dados (substitua as informações com as suas)
include('config.php');

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Obter o RA do parâmetro da consulta
$patrimonio = $_GET['patrimonio'];
$equipamentoEmUso = true;

if ($equipamentoEmUso) {
    $sql = "SELECT id_aluno, id_equipamento, patrimonio, marca, modelo, ra, aluno, cpf, curso, observacao, status FROM emprestimos WHERE patrimonio = $patrimonio AND status = 'Em Andamento'";
    $result = $conn->query($sql);

    // Verificar se há resultados
    if ($result->num_rows > 0) {

		// Obter os resultados como variáveis separadas
		$row = $result->fetch_assoc();
		
		$id_aluno = $row['id_aluno'];
		$id_equipamento = $row['id_equipamento'];
		$patrimonio = $row['patrimonio'];
		$marca = $row['marca'];
		$modelo = $row['modelo'];
		$ra = $row['ra'];
		$aluno = $row['aluno'];
		$cpf = $row['cpf'];
		$curso = $row['curso'];
		$observacao = $row['observacao'];
		
		
		// Retornar as variáveis como texto
		echo "id_aluno=$id_aluno&id_equipamento=$id_equipamento&ra=$ra&alunoNome=$aluno&alunoCpf=$cpf&alunoCurso=$curso&equipamentoMarca=$marca&equipamentoModelo=$modelo&observacao=$observacao&msgPatrimonio=";
	
	} else {
		$equipamentoEmUso = false;
	}
}

if (!$equipamentoEmUso) {
	
    // Consultar o banco de dados
	$sql = "SELECT id_equipamento, patrimonio, marca, modelo, observacao FROM equipamentos WHERE patrimonio = $patrimonio";

    $result = $conn->query($sql);

    // Verificar se há resultados
    if ($result->num_rows > 0) {

		// Obter os resultados como variáveis separadas
		$row = $result->fetch_assoc();
		
		$id_equipamento = $row['id_equipamento'];
		$patrimonio = $row['patrimonio'];
		$marca = $row['marca'];
		$modelo = $row['modelo'];
		$observacao = $row['observacao'];
		
		// Retornar as variáveis como texto
		echo "id_equipamento=$id_equipamento&equipamentoMarca=$marca&equipamentoModelo=$modelo&observacao=$observacao";
	
	} else {
        echo 'error=Patrimônio não encontrado na tabela "equipamentos"';
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>

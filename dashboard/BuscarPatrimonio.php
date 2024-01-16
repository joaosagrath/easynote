<?php
// Conectar ao banco de dados (substitua as informações com as suas)
include "config.php";

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Obter o RA do parâmetro da consulta
$patrimonio = $_GET["patrimonio"];

// Consultar o banco de dados
$sql = "SELECT id_equipamento, patrimonio, marca, modelo, status, observacao FROM equipamentos WHERE patrimonio = $patrimonio";

$result = $conn->query($sql);

// Verificar se há resultados
if ($result->num_rows > 0) {
    // Obter os resultados como variáveis separadas
    $row = $result->fetch_assoc();

    $id_equipamento = $row["id_equipamento"];
    $patrimonio = $row["patrimonio"];
    $marca = $row["marca"];
    $modelo = $row["modelo"];
    $observacao = $row["observacao"];
    $status = $row["status"];

    if ($status == "Em Manutencao") {
        echo "warning=Patrimônio não pode ser emprestado";
    } else {
        if ($id_patrimonio !== "") {
			$sqlEmAndamento = "SELECT id_equipamento, id_aluno, status FROM emprestimos WHERE id_equipamento = $id_equipamento AND status = 'Em Andamento'";
            $resultEmAndamento = $conn->query($sqlEmAndamento);

            // Verificar se há empréstimo em andamento
            if ($resultEmAndamento->num_rows > 0) {
                $rowEmAndamento = $resultEmAndamento->fetch_assoc();
                $id_aluno = $rowEmAndamento["id_aluno"];

                $sqlAlunos = "SELECT id_aluno, ra, aluno, cpf, curso FROM alunos WHERE id_aluno = '$id_aluno'";

                $resultAlunos = $conn->query($sqlAlunos);
                if ($resultAlunos->num_rows > 0) {
                    $rowAluno = $resultAlunos->fetch_assoc();
                    $id_aluno = $rowAluno["id_aluno"];
                    $ra = $rowAluno["ra"];
                    $aluno = $rowAluno["aluno"];
                    $cpf = $rowAluno["cpf"];
                    $curso = $rowAluno["curso"];
                }

                echo "&id_aluno=$id_aluno&id_equipamento=$id_equipamento&ra=$ra&alunoNome=$aluno&alunoCpf=$cpf&alunoCurso=$curso&equipamentoMarca=$marca&equipamentoModelo=$modelo&observacao=$observacao&msgPatrimonio=";
				
				//echo "id_aluno: $id_aluno<br>"; // Verificar se $id_aluno está sendo definido corretamente
				
			} else {
                // Retornar as variáveis como texto
                echo "&id_equipamento=$id_equipamento&equipamentoMarca=$marca&equipamentoModelo=$modelo&observacao=$observacao";
            }
        }
    }
} else {
    echo 'error=Patrimônio não encontrado na tabela "equipamentos"';
}

// Fechar a conexão com o banco de dados
$conn->close();
?>

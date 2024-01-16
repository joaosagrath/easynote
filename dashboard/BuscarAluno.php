<?php
// Conectar ao banco de dados (substitua as informações com as suas)
include('config.php');

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Obter o RA do parâmetro da consulta
$ra = $_GET['ra'];

    // Consultar o banco de dados
    $sql = "SELECT id_aluno, ra, aluno, cpf, curso FROM alunos WHERE ra = $ra";
    $result = $conn->query($sql);

    // Verificar se encontrou resultados
    if ($result) {
        if ($result->num_rows > 0) {
            // Obter os resultados como variáveis separadas
            $row = $result->fetch_assoc();
            $id_aluno = $row['id_aluno'];
            $ra = $row['ra'];
            $aluno = $row['aluno'];
            $cpf = $row['cpf'];
            $curso = $row['curso'];
			
			if ($id_aluno !== '') {
				$sqlEmAndamento = "SELECT id_aluno, status FROM emprestimos WHERE id_aluno = $id_aluno AND status = 'Em Andamento'";
				$resultEmAndamento = $conn->query($sqlEmAndamento);

				// Verificar se há empréstimo em andamento
				if ($resultEmAndamento->num_rows > 0) {
					echo "msgAluno=";
				
				} else {
					echo "id_aluno=$id_aluno&ra=$ra&alunoNome=$aluno&alunoCpf=$cpf&alunoCurso=$curso";
				}
			}
			
		} else {
			echo "error=RA não encontrado no banco de dados";
        }
    } else {
        echo "error=Erro na consulta: " . $conn->error;
    }

// Fechar a conexão com o banco de dados
$conn->close();
?>

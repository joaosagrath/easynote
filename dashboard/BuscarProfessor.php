<?php
// Conectar ao banco de dados (substitua as informações com as suas)
include('config.php');

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Obter o RP do parâmetro da consulta
$rp = $_GET['rp'];
$professorComMaterial = true;

if ($professorComMaterial) {
    $sql = "SELECT rp, status FROM retirada WHERE rp = $rp AND status = 'Em Uso'";
    $result = $conn->query($sql);

    // Verificar se há resultados
    if ($result->num_rows > 0) {
		echo "msgProfessor=";
    }
	else{
		$professorComMaterial = false;
	}
}

if (!$professorComMaterial) {
    // Consultar o banco de dados
    $sql = "SELECT id_professor, rp, professor, curso FROM professores WHERE rp = $rp";
    $result = $conn->query($sql);
	
    // Verificar se encontrou resultados
    if ($result) {
		
        if ($result->num_rows > 0) {
            // Obter os resultados como variáveis separadas
            $row = $result->fetch_assoc();
            $id_professor = $row['id_professor'];
			$rp = $row['rp'];
            $professor = $row['professor'];
            $curso = $row['curso'];

            // Retornar as variáveis como texto
            echo "id_professor=$id_professor&rp=$rp&professorNome=$professor&professorCurso=$curso";
			//echo "error=RP encontrado no banco de dados";
        } else {
            echo "error=RP não encontrado no banco de dados";
        }
    } else {
        echo "error=Erro na consulta: " . $conn->error;
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>

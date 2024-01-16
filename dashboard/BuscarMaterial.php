<?php
// Conectar ao banco de dados (substitua as informações com as suas)
include('config.php');

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Obter a sala do parâmetro da consulta
$sala = $_GET['sala'];


	
    // Consultar o banco de dados
	$sql = "SELECT id_material, sala, controle_ar, controle_projetor, marcadores, apagador, observacao FROM material WHERE sala = $sala";

    $result = $conn->query($sql);

    // Verificar se há resultados
    if ($result->num_rows > 0) {

		// Obter os resultados como variáveis separadas
		$row = $result->fetch_assoc();
		
		$id_material = $row['id_material'];
		$sala = $row['sala'];
		$controle_ar = $row['controle_ar'];
		$controle_projetor = $row['controle_projetor'];
		$marcadores = $row['marcadores'];
		$apagador = $row['apagador'];
		$observacao = $row['observacao'];
		
		if ($id_material !== "") {
			
			$sqlEmUso = "SELECT id_material, 
								id_professor, 
								controle_ar,
								controle_projetor,
								marcadores,
								apagador,
								status 
								FROM retirada 
								WHERE id_material= $id_material AND status = 'Em Uso'";
								
            $resultEmUso = $conn->query($sqlEmUso);

            // Verificar se há empréstimo em andamento
            if ($resultEmUso->num_rows > 0) {
                $rowEmUso = $resultEmUso->fetch_assoc();
                $id_professor = $rowEmUso["id_professor"];
				$controle_ar = $rowEmUso['controle_ar'];
				$controle_projetor = $rowEmUso['controle_projetor'];
				$marcadores = $rowEmUso['marcadores'];
				$apagador = $rowEmUso['apagador'];
				
                $sqlProfessores = "SELECT id_professor, rp, professor, curso FROM professores WHERE id_professor = '$id_professor'";

                $resultProfessores = $conn->query($sqlProfessores);
                if ($resultProfessores->num_rows > 0) {
                    $rowProfessor = $resultProfessores->fetch_assoc();
                    $id_professor = $rowProfessor["id_professor"];
                    $rp = $rowProfessor["rp"];
                    $professor = $rowProfessor["professor"];
                    $curso = $rowProfessor["curso"];
                }
			
				echo "&id_professor=$id_professor&id_material=$id_material&id_materialSpan=$id_material&rp=$rp&professorNome=$professor&professorCurso=$curso&sala=$sala&ControleAr=$controle_ar&ControleProjetor=$controle_projetor&Marcadores=$marcadores&Apagador=$apagador&observacao=$observacao&msgSala=";
				
				// Adicionar a linha para preencher o campo id_material no formulário
				echo "<script>document.getElementById('id_material').value = $id_material;</script>"; 
				// Isso irá definir o valor de id_material no campo do formulário com o ID 'id_material'

				
			}else {
				
				// Retornar as variáveis como texto
				echo "&id_material=$id_material&sala=$sala&ControleAr=$controle_ar&ControleProjetor=$controle_projetor&Marcadores=$marcadores&Apagador=$apagador&observacao=$observacao&msgSalaOk=";
			}
		}
	} else {
        echo 'error=Material não encontrado na tabela "material"';
    }


// Fechar a conexão com o banco de dados
$conn->close();
?>

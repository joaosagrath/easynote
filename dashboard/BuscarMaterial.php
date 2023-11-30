<?php
// Conectar ao banco de dados (substitua as informações com as suas)
include('config.php');

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Obter a sala do parâmetro da consulta
$sala = $_GET['sala'];
$materialEmUso = true;

if ($materialEmUso) {
    $sql = "SELECT id_professor, id_material, rp, professor, curso, sala, controle_ar, controle_projetor, marcadores, apagador, observacao, status FROM retirada WHERE sala = $sala AND status = 'Em Uso'";
    $result = $conn->query($sql);

    // Verificar se há resultados
    if ($result->num_rows > 0) {
		
		//echo "error=EM USO ";
		
		// Obter os resultados como variáveis separadas
		$row = $result->fetch_assoc();
		$id_professor = $row['id_professor'];
		$id_material = $row['id_material'];
		$rp = $row['rp'];
		$professor = $row['professor'];	
		$curso = $row['curso'];
		$sala = $row['sala'];
		$controle_ar = $row['controle_ar'];
		$controle_projetor = $row['controle_projetor'];
		$marcadores = $row['marcadores'];
		$apagador = $row['apagador'];
		$observacao = $row['observacao'];
		
		//echo "EM USO $rp $professor $curso $sala $controle_ar $controle_projetor $marcadores $apagador $observacao";
		
		// Retornar as variáveis como texto
		echo "id_professor=$id_professor&id_material=$id_material&rp=$rp&professorNome=$professor&professorCurso=$curso&sala=$sala&ControleAr=$controle_ar&ControleProjetor=$controle_projetor&Marcadores=$marcadores&Apagador=$apagador&observacao=$observacao&msgSala=";
		
	
	} else {
		$materialEmUso = false;
	}
}

if (!$materialEmUso) {
	
	echo "EM NÃO USO : ";
	
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
		
		// Retornar as variáveis como texto
		echo "id_material=$id_material&sala=$sala&ControleAr=$controle_ar&ControleProjetor=$controle_projetor&Marcadores=$marcadores&Apagador=$apagador&observacao=$observacao&msgSalaOk=";
	
	} else {
        echo 'error=Material não encontrado na tabela "material"';
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>

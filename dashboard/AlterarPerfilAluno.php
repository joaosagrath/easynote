<?php
// Inclua o arquivo de configuração
include('config.php');

// Verifique se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha os valores dos campos do formulário
    $raValue = $_POST["raValue"];
    $nomeValue = $_POST["nomeValue"];
    $cpfValue = $_POST["cpfValue"];
    $cursoValue = $_POST["cursoValue"];
    $emailValue = $_POST["emailValue"];
    $telefoneValue = $_POST["telefoneValue"];
    $senhaValue = $_POST["senhaValue"];
    $confSenhaValue = $_POST["confSenhaValue"];

    // Atualize os dados na tabela alunos usando declaração preparada
    $atualiza_sql = "UPDATE alunos SET aluno=?, cpf=?, curso=?, email=?, telefone=?, password=? WHERE ra=?";
    $stmt = $conn->prepare($atualiza_sql);
	
	if ($senhaValue == $confSenhaValue) {
		// Verifique se a preparação da consulta foi bem-sucedida
		if ($stmt) {
			$stmt->bind_param("sssssss", $nomeValue, $cpfValue, $cursoValue, $emailValue, $telefoneValue, $senhaValue, $raValue);

			// Executa a consulta preparada
			if ($stmt->execute()) {
				header("Location: mobile.php?ra=" . $raValue);
				 
			} else {
				echo "Erro na atualização de dados: " . $stmt->error;
			}

			// Feche a declaração preparada
			$stmt->close();
		} else {
			echo "Erro na preparação da consulta: " . $conn->error;
		}
	} else {
		echo "RA: " . $raValue . "\nNone: " . $nomeValue . "\nCPF: " . $cpfValue . "\nCurso: " . $cursoValue . "\nEmail: " . $emailValue . "\ntelefone: " . $telefoneValue . "\nSenha: " . $senhaValue;
	}
}
?>

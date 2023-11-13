<?php
// Inclua o arquivo de configuração
include('config.php');

// Verifique se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha os valores dos campos do formulário
    $raEdit = $_POST["ra-edit"];
    $nomeEdit = $_POST["nome-edit"];
    $cpfEdit = $_POST["cpf-edit"];
    $cursoEdit = $_POST["curso-edit"];
    $emailEdit = $_POST["email-edit"];
    $telefoneEdit = $_POST["telefone-edit"];

    // Defina a senha como vazia
    $senhaEdit = "";

    // Atualize os dados na tabela alunos usando declaração preparada
    $atualiza_sql = "UPDATE alunos SET aluno=?, cpf=?, curso=?, email=?, telefone=?, password=? WHERE ra=?";
    $stmt = $conn->prepare($atualiza_sql);

    // Verifique se a preparação da consulta foi bem-sucedida
    if ($stmt) {
        $stmt->bind_param("sssssss", $nomeEdit, $cpfEdit, $cursoEdit, $emailEdit, $telefoneEdit, $senhaEdit, $raEdit);
									 

        // Executa a consulta preparada
        if ($stmt->execute()) {
            // Redirecione o usuário de volta para a página de alunos
            header("Location: alunos.php");
            exit(); // Adicione esta linha para interromper a execução após o redirecionamento
        } else {
            echo "Erro na atualização de dados: " . $stmt->error;
        }

        // Feche a declaração preparada
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }
}
?>

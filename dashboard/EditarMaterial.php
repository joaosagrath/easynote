<?php
// Inclua o arquivo de configuração
include('config.php');

// Verifique se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha os valores dos campos do formulário
    $salaEdit = $_POST["sala-edit"];
    $obsEdit = $_POST["obs-edit"];
    $controleArEdit = isset($_POST["ControleAr-edit"]) ? 1 : 0; // Se estiver marcado, será 1 (true), senão, 0 (false)
    $controleProjetorEdit = isset($_POST["ControleProjetor-edit"]) ? 1 : 0;
    $marcadoresEdit = isset($_POST["Marcadores-edit"]) ? 1 : 0;
    $apagadorEdit = isset($_POST["Apagador-edit"]) ? 1 : 0;

    // Atualize os dados na tabela material usando declaração preparada
    $atualiza_sql = "UPDATE material SET controle_ar=?, controle_projetor=?, marcadores=?, apagador=?, observacao=? WHERE sala=?";
    $stmt = $conn->prepare($atualiza_sql);

    // Verifique se a preparação da consulta foi bem-sucedida
    if ($stmt) {
        $stmt->bind_param("ssssss", $controleArEdit, $controleProjetorEdit, $marcadoresEdit, $apagadorEdit, $obsEdit, $salaEdit);

        // Executa a consulta preparada
        if ($stmt->execute()) {
            // echo "Dados atualizados com sucesso.<br><br>";
            // Redirecione o usuário de volta para a página de alunos
            header("Location: material.php");
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

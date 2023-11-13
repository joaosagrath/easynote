<?php
// Verifique se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha os valores dos campos do formulário
    $raEdit = $_POST["ra-edit"];
    $nomeEdit = $_POST["nome-edit"];
    $cpfEdit = $_POST["cpf-edit"];
    $cursoEdit = $_POST["curso-edit"];
    $emailEdit = $_POST["email-edit"];
    $telefoneEdit = $_POST["telefone-edit"];
    
    // Abra o arquivo "ra-ativos.csv" para leitura e escrita
    $arquivo = fopen("ra-ativos.csv", "r+");
	
	// Crie um arquivo temporário para armazenar as linhas atualizadas
    $tempFile = fopen("ra-ativos-temp.csv", "w");
    
    // Percorra o arquivo linha por linha
    while (($linha = fgetcsv($arquivo)) !== false) {
        // Verifique se a linha possui o mesmo RA (índice 0)
        if ($linha[0] == $raEdit) {
            // Atualize os valores da linha, mantendo o índice 6 inalterado
            $linha[1] = $nomeEdit;
            $linha[2] = $cpfEdit;
            $linha[3] = $cursoEdit;
            $linha[4] = $emailEdit;
            $linha[5] = $telefoneEdit;
			$linha[6] = "";
        }
		// Crie uma linha de texto formatada manualmente
        $linhaAtualizada = $linha[0] . "," . $linha[1] . "," . $linha[2] . "," . $linha[3] . "," . $linha[4] . "," . $linha[5] . "," . $linha[6];
        
        // Escreva a linha no arquivo temporário
        fwrite($tempFile, $linhaAtualizada . "\n");
    }
    
    // Feche os arquivos
    fclose($arquivo);
    fclose($tempFile);
    
    // Substitua o arquivo original pelo temporário
    rename("ra-ativos-temp.csv", "ra-ativos.csv");
    
    // Redirecione o usuário de volta para a página do formulário ou para outra página de destino
    header("Location: alunos.php");
}
?>

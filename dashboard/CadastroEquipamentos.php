<?php
// Inclua o arquivo de configuração
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['CadastroEquipamentos'])) {
    // Coletar os dados do formulário
    $patrimonio = $_POST['patrimonio'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
	$status = $_POST['status'];
    $obs = $_POST['obs'];
	
	// Obtenha a hora atual
    $data = date('d-m-Y'); // Formato: "Ano-Mês-Dia"
	
	// Query SQL de inserção
	$sql = "INSERT INTO equipamentos (patrimonio, marca, modelo, status, observacao, data) VALUES ('$patrimonio', '$marca', '$modelo', '$status', '$obs', '$data')";

	// Executa a query
	if ($conn->query($sql) === TRUE) {
		echo "Dados inseridos com sucesso.";
	} else {
		echo "Erro na inserção de dados: " . $conn->error;
	}

	// Fecha a conexão
	$conn->close();
	
	// BANCO DE DADOS SOMENYE ATÉ AQUI //

    // Nome do arquivo CSV onde você deseja salvar os dados
    $csvFile = 'equipamentos.csv';

    // Verifique se o arquivo existe
    if (file_exists($csvFile)) {
        // Abra o arquivo CSV em modo de leitura
        $file = fopen($csvFile, 'r');
        
        // Inicialize uma variável para verificar se o patrimônio já existe
        $patrimonioExiste = false;

        // Percorra o arquivo CSV para verificar se o patrimônio já existe
        while (($row = fgetcsv($file)) !== false) {
            if ($row[0] === $patrimonio) {
                $patrimonioExiste = true;
                break;
            }
        }

        // Feche o arquivo CSV
        fclose($file);

        if ($patrimonioExiste) {
			
			header('Location: equipamentos.php?error=' . $patrimonio);
			exit();
        
		} else {
            // Construa a linha de dados no formato CSV
            $data = array($patrimonio, $marca, $modelo, $obs);

            // Abra o arquivo CSV em modo de escrita
            $file = fopen($csvFile, 'a');

            // Gere uma linha CSV usando a função implode
            $csv_line = implode(',', $data) . "\n";

            // Escreve a linha CSV no arquivo.
            fwrite($file, $csv_line);

            // Feche o arquivo CSV
            fclose($file);
			
            header('Location: equipamentos.php');
            exit();
        }
    } else {
        // Se o arquivo não existe, simplesmente adicione os dados
        $data = array($patrimonio, $marca, $modelo, $obs);

        // Abra o arquivo CSV em modo de escrita
        $file = fopen($csvFile, 'a');

        // Gere uma linha CSV usando a função implode
        $csv_line = implode(',', $data) . "\n";

        // Escreve a linha CSV no arquivo.
        fwrite($file, $csv_line);

        // Feche o arquivo CSV
        fclose($file);

        header('Location: equipamentos.php');
        exit();
    }
} else {
    $alertMessage = "Nenhum dado foi submetido.";
}
?>
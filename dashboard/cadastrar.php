<?php

// Inclua o arquivo de configuração
include('config.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadastrar'])) {
    
	// Coletar os dados do formulário
	
	// declaração da variável $nome recebendo o valor do elemento name="nome" do formulário HTML.
    $nome = $_POST['nome']; 
	// declaração da variável $sobrenome recebendo o valor do elemento name="sobrenome" do formulário HTML.
    $sobrenome = $_POST['sobrenome']; 
	
	// verificar se o material ja esta cadastrado
	
	/* declaração da variável $query_check VERIFICANDO TUDO na tabela pessoa, 
	   onde as colunas nome e sobrenome são iguais as variáveis $nome e $sobrenome*/
	$query_check = "SELECT * FROM pessoa WHERE nome = '$nome' AND sobrenome = '$sobrenome'";
		
	// declaração da variável $result RECEBENDO os dados da tabela armazenados na variável $query_check, 
	$result = $conn->query($query_check);

	if ($result->num_rows > 0) {
		// Se a pessoa ja estiver cadastrada, exibir um alerta
        echo "<script>alert('Pessoa $nome $sobrenome ja cadastrada!'); window.location.href = 'pessoa.php';</script>";
	}else {
        // Caso contrário, proceder com a inserção
        $sql = "INSERT INTO pessoa (nome, sobrenome) VALUES ('$nome', '$sobrenome')";
    
        // Executar a query
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('pessoa $nome $sobrenome cadastrado com sucesso.'); window.location.href = 'pessoa.php';</script>";
        } else {
            echo "Erro na inserção de dados: " . $conn->error;
        }
    }
	
	echo "<script>alert('Esse foi o exemplo de um Botão com o tipo BUTTON.'); window.location.href = 'pessoa.php';</script>";
	
    // Fechar a conexão
    $conn->close();
	
} else {
	
	echo "<script>alert('Botão sem o tipo BUTTON chama o formuário, mas sem o parametro SUBMIT, dessa forma, não havendo inserção dos dados no banco.'); window.location.href = 'pessoa.php';</script>";
	
}


?>


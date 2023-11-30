<?php
    // Inclua o arquivo de configuração
    include('config.php');
    
    // Verifique se foi passado um parâmetro "ra" na URL
    if (isset($_GET['ra'])) {
    	// Recupere o valor do parâmetro "ra"
    	$ra = $_GET['ra'];
    
    // Consulta SQL para buscar os dados na tabela "inativos" com base no RA
        $query = "SELECT aluno, cpf, curso, email, telefone FROM alunos WHERE ra = '$ra'";
    
        // Executar a consulta
        $result = mysqli_query($conn, $query);
        // Verificar se a consulta foi bem-sucedida
        if ($result) {
            // Verificar se há pelo menos uma linha de resultado
            if (mysqli_num_rows($result) > 0) {
                // Obter os dados da primeira linha de resultado
                $row = mysqli_fetch_assoc($result);
    
                // Atribuir os valores às variáveis
                $fullname = $row['aluno'];
                $cpf = $row['cpf'];
                $curso = $row['curso'];
                $email = $row['email'];
                $telefone = $row['telefone'];
    
                // Fechar a conexão com o banco de dados
                mysqli_close($conn);
            } else {
                echo "Nenhum resultado encontrado para o RA $ra na tabela 'inativos'.";
            }
        } else {
            echo "Erro na consulta SQL: " . mysqli_error($conn);
        }
    } else {
        echo "O parâmetro 'ra' não foi fornecido na URL.";
    }

// Verifique se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha os valores dos campos do formulário
    $ra = $_POST["ra"];
    $nome = $_POST["fullname"];
    $cpf = $_POST["cpf"];
    $curso = $_POST["curso"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
	$senha = $_POST["password"];

    // Atualize os dados na tabela alunos usando declaração preparada
    $atualiza_sql = "UPDATE alunos SET aluno=?, cpf=?, curso=?, email=?, telefone=?, password=? WHERE ra=?";
    $stmt = $conn->prepare($atualiza_sql);

    // Verifique se a preparação da consulta foi bem-sucedida
    if ($stmt) {
		$stmt->bind_param("sssssss", $nome, $cpf, $curso, $email, $telefone, $senha, $ra);


        // Executa a consulta preparada
        if ($stmt->execute()) {
            // Redirecione o usuário de volta para a página de alunos
            header("Location: mobile.php?ra=" . $ra);
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

// Restante do código HTML

?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="aluno.css">
        <title>Redefinição de Senha</title>
    </head>
    <body>
        <div class="register-container">
            <img src="../resources/logo-horizontal.png" alt="Descrição da Imagem" class="class-logo">
            <form name="registrationForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" id="ra" name="ra" placeholder="Digite seu RA (Registro de Aluno)" value="<?php echo $ra; ?>" class="input-field" readonly>
                <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" class="input-field" readonly>
                <input type="text" id="cpf" name="cpf" placeholder="CPF" value="<?php echo $cpf; ?>" class="input-field" readonly>
                <input type="text" id="curso" name="curso" placeholder="curso" value="<?php echo $curso; ?>" class="input-field" readonly>
				
                <input type="text" id="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>" class="input-field" readonly>
                <input type="text" id="telefone" name="telefone" placeholder="Telefone" value="<?php echo $telefone; ?>" class="input-field" oninput="maskPhoneNumber(this)" maxlength="15" readonly>
                <input type="password" id="password" name="password" placeholder="Senha" class="input-field">
                <input type="password" id="repeatPassword" placeholder="Repetir Senha" class="input-field">
                <p id="errorMessage" class="error"></p>
                <div>
                    <div style="display: inline-block;">
                        <button type="button" style="width: 180px;" class="button" onclick="register()">Atualizar Senha</button>
                    </div>
                </div>
            </form>
        </div>
        <script src="aluno.js"></script>
        <script src="utils.js"></script>
    </body>
</html>
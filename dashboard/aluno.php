<?php 
    // Inclua o arquivo de configuração
    include('config.php');

	// Recupere o valor do parâmetro "ra"
	$ra = $_GET['ra'];

	// Verifique se o formulário foi enviado
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Recupere os dados do formulário
		$ra = $_POST["ra"];
		$fullname = $_POST["fullname"];
		$cpf = $_POST["cpf"];
		$curso = $_POST["curso"];
		$email = $_POST["email"];
		$telefone = $_POST["telefone"];
		$password = $_POST["password"];
		
		// Query SQL de inserção
		$sql = "INSERT INTO alunos (ra, aluno, cpf, curso, email, telefone, password, emprestimo) VALUES ('$ra', '$fullname', '$cpf', '$curso', '$email', '$telefone', '$password', 0)";
        
		// Executa a query
		if ($conn->query($sql) === TRUE) {
			header("Location: mobile.php?ra=" . $ra);
		    exit;
		} else {
			echo "Erro na inserção de dados: " . $conn->error;
		}

		// Fecha a conexão
		$conn->close();
		
	}

	// Consulta SQL para buscar os dados na tabela "inativos" com base no RA
	$query = "SELECT aluno, cpf, curso FROM inativos WHERE ra = '$ra'";

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

			// Fechar a conexão com o banco de dados
			mysqli_close($conn);
		} else {
			echo "Nenhum resultado encontrado para o RA $ra na tabela 'inativos'.";
		}
	} else {
		echo "Erro na consulta SQL: " . mysqli_error($conn);
	}
 ?>
 
 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.css">
        <link rel="stylesheet" type="text/css" href="aluno.css">
        <title>Ativação de Cadastro de Aluno</title>
    </head>
    <body>
        <div class="register-container">
            <img src="../resources/logo-horizontal.gif" alt="Descrição da Imagem" class="class-logo">
            <form name="registrationForm" method="POST" action="<?php echo $_SERVER['PHP_SELF'] . "?ra=" . $ra; ?>">
                <input type="text" id="ra" name="ra" placeholder="Digite seu RA (Registro de Aluno)" value="<?php echo $ra; ?>" class="input-field" readonly>
                <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" class="input-field" readonly>
                <input type="text" id="cpf" name="cpf" placeholder="CPF" value="<?php echo $cpf; ?>" class="input-field" readonly>
                <input type="text" id="curso" name="curso" placeholder="curso" value="<?php echo $curso; ?>" class="input-field" readonly>
                <input type="text" id="email" name="email" placeholder="E-mail" class="input-field">
                <input type="text" id="telefone" name="telefone" placeholder="Telefone" class="input-field" oninput="maskPhoneNumber(this)" maxlength="15">
                <input type="password" id="password" name="password" placeholder="Senha" class="input-field">
                <input type="password" id="repeatPassword" placeholder="Repetir Senha" class="input-field">
                <p id="errorMessage" class="error"></p>
                <div>
                    <div style="display: inline-block;">
                        <button type="button" style="width: 180px;" class="button" onclick="register()">Validar Cadastro</button>
                    </div>
                    <div style="display: inline-block;">
                        <input type="file" accept="image/*" id="fileInput" style="display: none;">
                        <button type="button" style="width: 180px;" class="button" onclick="choosePhoto(this)">Escolher Foto</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Modal para exibir a imagem cortada -->
        <div id="imageModal" class="modal">
            <div class="modal-content" style="text-align: center">
                <img id="croppedImage" class="cropped-image" src="" alt="Imagem cortada">
                <button id="okButton" class="button" style="display: block;">OK</button>
                <button id="selectAnotherButton" class="button" style="display: block;">Selecionar Outra Foto</button>
            </div>
        </div>
        <script src="aluno.js"></script>
    </body>
</html>
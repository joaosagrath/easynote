<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="ra.css">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="ra.js"></script>
    <title>Ativação de Cadastro de Aluno</title>
</head>
<body>
    <div class="register-container" style="text-align: center">
		<img src="../resources/logo-horizontal.gif" alt="Descrição da Imagem" class="class-logo">
		
		<input style="display: block" type="text" class="input-field" id="ra" placeholder="Digite seu RA (Registro de Aluno)">		
		<button class="button-secondary" id="avancar">AVANÇAR</button>
		
		<input style="display: none" type="password" class="input-field" id="password" placeholder="Senha">
		<button style="display: none" type="button" class="button-secondary" id="entrar" >ENTRAR</button>
		
		<input style="display: none" type="text" class="input-field" id="cpf" placeholder="Digite seu CPF" oninput="maskCPF(this)" maxlength="14">
		<button style="display: none" type="button" class="button-secondary" id="validar">VALIDAR</button>
		
		
		<button type="button" class="button-secondary" id="validarSenha" style="display: none">Validar</button>
		
		<p style="display: none" id="errorMessage" class="error"></p>
    </div>

	
</body>
</html>

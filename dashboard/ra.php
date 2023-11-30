<!DOCTYPE html>
<html>
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="../icons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../icons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../icons/favicon-16x16.png">
        <link rel="manifest" href="../site.webmanifest.json">
        <link rel="mask-icon" href="../icons/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="ra.css">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="ra.js"></script>
    <title>EasyNote - Ativação de Cadastro de Aluno</title>
</head>
<body>
    <div class="register-container" style="text-align: center">
		<img src="../resources/logo-horizontal.png" alt="Descrição da Imagem" class="class-logo">
		
		<input style="display: block" type="text" class="input-field" id="ra" placeholder="Digite seu RA (Registro de Aluno)">		
		<button class="button-secondary" id="avancar">AVANÇAR</button>
		
		<input style="display: none" type="password" class="input-field" id="password" placeholder="Senha">
		<button style="display: none" type="button" class="button-secondary" id="entrar" >ENTRAR</button>
		
		<input style="display: none" type="text" class="input-field" id="cpf" placeholder="Digite seu CPF" oninput="maskCPF(this)" maxlength="14">
		<button style="display: none" type="button" class="button-secondary" id="validar">VALIDAR</button>
		
		
		<button type="button" class="button-secondary" id="validarSenha" style="display: none">Validar 123</button>
		
		<p style="display: none" id="errorMessage" class="error"></p>
    </div>

	
</body>
</html>

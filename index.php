<!DOCTYPE html>
<html>
    <head>
        <link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
        <link rel="manifest" href="site.webmanifest.json">
        <link rel="mask-icon" href="icons/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>EasyNote</title>
		<link rel="stylesheet" href="index.css">
		<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
		<script src="index.js"></script>
    </head>
    <body>
        <div class="login-container">
				<img src="resources/logo-horizontal.png" alt="Descrição da Imagem" class="class-logo">

				<input style="display: block" type="text" class="input-field" id="login" placeholder="Login">
				<button class="button button-spacing" id="avancar">AVANÇAR</button>

				<input style="display: none" type="password" class="input-field" id="password" placeholder="Senha">
				<button class="button button-spacing" style="display: none" id="entrar">ENTRAR</button>

				<p style="display: none" id="errorMessage" class="error"></p>
				
				<button class="button-secondary">Esqueci a Senha</button>
				<button class="button-secondary" onclick="location.href='dashboard/ra.php'">Sou Aluno</button>
		</div>
        
    </body>
</html>
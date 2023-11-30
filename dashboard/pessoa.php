<html>
	<header>
	<header>
	<body>
		<!-- Formulário para captura dos valores dos inputs -->
		<form method="post" action="cadastrar.php">
			
			<div>
				<!-- Cada input deve ter um ID único e um NAME único -->
				<input type="text" id="nome" name="nome" style="width: 200px;" placeholder="Nome" required>
				
				<!-- Javascript captura valores dos elementos pelo ID - PHP captura os valores dos elementos pelo NAME -->
				<input type="text" id="sobrenome" name="sobrenome" style="width: 200px;" placeholder="Sobrenome" required>
				
				<!-- Para executar o formulário PHP, o elemento deve possuir o tipo "SUBMIT". 
					 Caso o elemento INPUT receba o tipo SUBMIT, o mesmo será exibido como um botão na página. -->
				<input style="color: black; width: 115px; margin-left: 10px;" type="submit" name="cadastrar" value="Cadastrar">
				
				<!-- O tipo "SUBMIT" pode ser atribuido tanto a um INPUT, como a um BUTTON, mas somente um SUBMIT por formulário -->
				<button style="color: black; width: 115px; margin-left: 10px;">Sem Tipo BUTTON</button>

				<button style="color: black; width: 115px; margin-left: 10px;" type="button" id="cadastrar" onclick="alerta()">Com Tipo BUTTON</button>
				
				<!-- Caso exista mais de um botão dentro das tags FORM, o outros botões devem possuir o tipo BUTTON, para que o clique 
					 não execute o formulário. Caso contrário, o formulário será chamado sem o parametro SUBMIT e vai gerar erro. -->
			
			</div>
		</form>
		<script>
			var cadastrar = document.getElementById('cadastrar');
			
			cadastrar.addEventListener('click', function() {
				alert("Botão com o tipo BUTTON não chama o formulário");
			});
			
			
		</script>
	</body>
</html>
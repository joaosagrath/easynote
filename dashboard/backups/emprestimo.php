


<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>EasyNote</title>
      <link rel="stylesheet" type="text/css" href="styles.css">
      <link rel="stylesheet" type="text/css" href="emprestimo.css">
      <!-- Link para o arquivo CSS -->
   </head>
   <body>
      <div class="sidebar">
         <div class="logo-container">
            <a href="dashboard.php">
            <img src="../resources/icon.gif" alt="Descrição da Imagem" class="class-logo">
            </a>
         </div>
         <a href="emprestimo.php" id="link-emprestimo" style="background-color: #3CB371; color: white;">EMPRÉSTIMO</a>
         <a href="equipamentos.php" id="link-equipamentos">EQUIPAMENTOS</a>
         <!-- <a href="listagem.php" id="link-listagem">LISTAGEM</a> -->
         <a href="alunos.php" id="link-alunos">ALUNOS ATIVOS</a>
         <a href="relatorios.php" id="link-alunos">RELATÓRIOS</a>
      </div>
      <div class="content">
         <div id="emprestimo">
            <div class="painel" style="height: 100%; width: 100%; text-align: center">
               <div id="painel-emprestimo" class="painel-colorido" style="text-align: center">
                  <form method="post" action="adicionar_emprestimo.php">

						
						<div style="margin-top: 45px">
							<div style="display: inline-block; vertical-align: top;">
								<input type="number" name="ra" id="ra" class="input-field" style="width: 80px; height: 20px" placeholder="RA" oninput="buscarRA()" required min="1">
								
								<select id="campus" name="campus" class="form-control" required="campus" onchange="updateRA()">
									<option value="" disabled selected>Selecione o Campus</option>
									<?php       
										include('config.php');
										
										// Consulta SQL para obter dados de alunos (substitua com sua consulta real)
										$query = "SELECT * FROM alunos ORDER BY aluno";
										$result = $conn->query($query);

										if ($result->num_rows > 0) {
											while ($row = $result->fetch_assoc()) {
												// Exibir as opções com os dados do banco de dados
												echo '<option value="' . $row['ra'] . '">' . $row['ra'] . ': ' . $row['aluno'] . ' - ' . $row['curso'] . '</option>';
												
											}
										} else {
											echo '<option value="" disabled>Nenhum aluno encontrado</option>';
										}

										// Fechar a conexão com o banco de dados
										$conn->close();
									?>
								</select>
								
								<script>
									function updateRA() {
										var select = document.getElementById("campus");
										var selectedOption = select.options[select.selectedIndex];
										var raValue = selectedOption.value;
										
										var inputRA = document.getElementById("ra");
										inputRA.value = raValue
										
										alert(inputRA);
										
										var spanRaElement = document.getElementById("ra_value");
										spanRaElement.textContent = raValue;
										
										var imgElement = document.getElementById("aluno-foto");
										imgElement.src = 'alunos/' + raValue + '.jpg';
										
									}
								</script>
								
							
							<span id="ra_value" class="input-field" style="width: 370px; height: 20px; padding: 8px; display: block;"><b></b></span>

							
							</div>
								<div style="display: inline-block; vertical-align: top; margin-left: 70px">
								<img id="aluno-foto" alt="" class="aluno-foto" style="vertical-align: top; margin-top: 10px"/>
							</div>
							
							<div style="display: inline-block; margin-left: 70px">
								<span id="span_nome" name="span_nome" class="input-field" style="width: 370px; height: 20px; padding: 8px; display: block;"><b><?php ?></b></span>
								<span id="span_cpf" name="span_cpf" class="input-field" style="width: 370px; height: 20px; padding: 8px; display: block;"><b></b></span>
								<span id="span_curso" name="span_curso" class="input-field" style="width: 370px; height: 20px; padding: 8px; display: block;"><b></b></span>
							</div>
						</div>
							
						<!-- Campos Ocultos para o Formulario -->
						<input type="hidden" name="nome" id="nome">
                        <input type="hidden" name="cpf" id="cpf">
                        <input type="hidden" name="curso" id="curso">
                        <!--  -->
						<hr style="max-width: 740px; margin-left: auto; margin-right: auto;">

						<div style="margin-top: 45px">
							<div style="display: inline-block; vertical-align: top;">
								<input type="number" name="patrimonio" id="patrimonio" class="input-field" style="width: 80px; height: 20px" placeholder="Patrimônio" oninput="buscarPatrimonio()" required min="1">
							</div>
							
							<div style="display: inline-block; margin-left: 236px">
								<span id="span_marca" name="span_marca" class="input-field" style="width: 370px; height: 20px; padding: 8px; display: block;"><b></b></span>
								<span id="span_modelo" name="span_modelo" class="input-field" style="width: 370px; height: 20px; padding: 8px; display: block;"><b></b></span>
							</div>
						</div>
						
						<!-- Campos Ocultos para o Formulario -->
						<input type="hidden" name="marca" id="marca">
                        <input type="hidden" name="modelo" id="modelo">
                        <!--  -->
						
						<input type="text" name="observacao" id="observacao" class="input-field" style="width: 725px; height: 70px" placeholder="Observação">
  
                     <div class="botao-emprestimo">
                        <button type="submit" id="btnIniciar" class="button" style="color: black" >Iniciar Empréstimo</button>
						<button type="button" id="btnEncerrar" class="button" style="color: black" onclick="encerrarEmprestimo()">Encerrar Empréstimo</button>
						<button type="button" id="btnLimpar" class="button" style="color: black" onclick="limparCampos()">Limpar Campos</button>
						
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
	  
      <script src="emprestimo.js"></script> <!-- Link para o arquivo JavaScript -->
   </body>
</html>
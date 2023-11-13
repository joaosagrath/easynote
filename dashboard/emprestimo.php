<!DOCTYPE html>
<html>
   <head>
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
         <a href="alunos.php" id="link-alunos">ALUNOS ATIVOS</a>
         <a href="relatorios.php" id="link-alunos">RELATÓRIOS</a>
      </div>
      <div class="content">
         <div id="emprestimo">
            <div class="painel" style="height: 100%; width: 100%; text-align: center">
               <div id="painel-emprestimo" class="painel-colorido" style="text-align: center">
                  <form id="emprestimos" method="post" action="adicionar_emprestimo.php">

						
						<div style="margin-top: 45px">
							<div style="display: inline-block; vertical-align: top;">
								<input type="number" name="ra" id="ra" class="input-field" style="width: 80px; height: 20px" placeholder="RA" oninput="updateRA()" required min="1">
								<div id="msgAluno" style="color: red"></div>
							</div>
								<div style="display: inline-block; vertical-align: top; margin-left: 70px">
								<img id="alunoFoto" alt="" class="aluno-foto" style="vertical-align: top; margin-top: 10px"/>
							</div>
							<div style="display: inline-block; margin-left: 70px">
								<span id="alunoNome" class="input-field" style="width: 370px; height: 20px; padding: 8px; display: block;"><b></b></span>
								<span id="alunoCpf" class="input-field" style="width: 370px; height: 20px; padding: 8px; display: block;"><b></b></span>
								<span id="alunoCurso" class="input-field" style="width: 370px; height: 20px; padding: 8px; display: block;"><b></b></span>
								
								<!-- Campos Ocultos para o Formulario -->
								<input type="hidden" name="id_aluno" id="id_aluno">
								<input type="hidden"  name="nome" id="nome">
								<input type="hidden"   name="cpf" id="cpf">
								<input type="hidden"   name="curso" id="curso">
								<!--  -->
							
							</div>
						</div>
						<hr style="max-width: 740px; margin-left: auto; margin-right: auto;">
						<div style="margin-top: 45px">
							<div style="display: inline-block; vertical-align: top;">
								<input type="number" name="patrimonio" id="patrimonio" class="input-field" style="width: 80px; height: 20px" placeholder="Patrimônio" oninput="updatePatrimonio()" required min="1">
								<div id="msgPatrimonio" style="color: red"></div>
							</div>
							
							<div style="display: inline-block; margin-left: 236px">
								<span id="equipamentoMarca" class="input-field" style="width: 370px; height: 20px; padding: 8px; display: block;"><b></b></span>
								<span id="equipamentoModelo" class="input-field" style="width: 370px; height: 20px; padding: 8px; display: block;"><b></b></span>
							</div>
						</div>
						
						<!-- Campos Ocultos para o Formulario -->
						<input type="hidden"  name="id_equipamento" id="id_equipamento">
						<input type="hidden"  name="marca" id="marca">
                        <input type="hidden"  name="modelo" id="modelo">
                        <!--  -->
						
						<input type="text" name="observacao" id="observacao" class="input-field" style="width: 725px; height: 70px" placeholder="Observação">
  
                     <div class="botao-emprestimo">
                        <button type="submit" id="btnIniciar" class="button" style="color: black" >Iniciar Empréstimo</button>
						<!-- <button type="button" id="btnEncerrar" class="button" style="color: black" onclick="encerrarEmprestimo()">Encerrar Empréstimo</button> -->
						<button type="button" id="btnEncerrar" class="button" style="color: black">Encerrar Empréstimo</button>
						<button type="button" id="btnLimpar" class="button" style="color: black" onclick="limparCampos()">Limpar Campos</button>
						
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
	  <script>
		
		</script>
      <script src="emprestimo.js"></script> <!-- Link para o arquivo JavaScript -->
   </body>
</html>
<?php

// Inclua o arquivo de configuração
include('config.php');

include_once('session/sessao.php')

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="apple-touch-icon" sizes="180x180" href="../icons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../icons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../icons/favicon-16x16.png">
        <link rel="manifest" href="../site.webmanifest.json">
        <link rel="mask-icon" href="../icons/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EasyNote - Empréstimos</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" type="text/css" href="emprestimo.css">
        <!-- Link para o arquivo CSS -->
    </head>
    <body>
        <div class="sidebar">
            <div class="logo-container">
                <a href="dashboard.php">
                <img src="../resources/icon.png" alt="Descrição da Imagem" class="class-logo">
                </a>
            </div>
            <a href="emprestimo.php" id="link-emprestimo" style="background-color: #3CB371; color: white;">EMPRÉSTIMO</a>
			<a href="relatorios.php" id="link-alunos">RELATÓRIOS</a>
            <a href="equipamentos.php" id="link-equipamentos">EQUIPAMENTOS</a>
			<a href="material.php" id="link-alunos">MATERIAL DE SALA</a>
            <a href="alunos.php" id="link-alunos">ALUNOS ATIVOS</a>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<span id="operador" style="width: 195px; height: 20px; margin-left: 10px; padding: 10px; display: block; color: white"><?PHP echo $_SESSION['operador']; ?></span>
			<!-- <span id="operador" style="width: 195px; height: 20px; margin-left: 10px; padding: 10px; display: block; color: white"><?PHP echo $_SESSION['id_operador']; ?></span> -->
			<a href="session/logout.php" id="link-logout" style="font-size: 13px;">SAIR</a>
        </div>
        <div class="content">
            <div id="emprestimo">
                <div class="painel" style="height: 100%; width: 100%; text-align: left">
                    <button class="button-secondary button-emprestimo" onclick="mostrarPainel('emprestimo')">NOTEBOOKS</button>
                    <button class="button-secondary button-materialSala" onclick="mostrarPainel('material-de-sala')">MATERIAL DE SALA</button>
                    
					<div id="painelEmprestimo" class="painel-colorido" style="text-align: center">
                        <form id="emprestimos" method="post" action="adicionarEmprestimo.php">
                            <div style="margin-top: 30px">
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
                                    <input type="hidden" name="nome" id="nome">
                                    <input type="hidden" name="cpf" id="cpf">
                                    <input type="hidden" name="curso" id="curso">
                                    <!--  -->
                                
								</div>
                            </div>
                            <hr style="max-width: 740px; margin-left: auto; margin-right: auto;">
                            <div style="margin-top: 30px">
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
                            <input type="hidden" name="id_equipamento" id="id_equipamento">
                            <input type="hidden" name="marca" id="marca">
                            <input type="hidden" name="modelo" id="modelo">
							<input type="hidden" name="id_operador" id="id_operador" value="<?PHP echo $_SESSION['id_operador']; ?>">
                            
                            <!--  -->
                            <input type="text" name="observacao" id="observacao" class="input-field" style="width: 725px; height: 70px; margin-top: 22px" placeholder="Observação">
                            <div class="botao-emprestimo">
                                <button type="submit" id="btnIniciar" class="button" style="color: black" >Iniciar Empréstimo</button>
                                <button type="button" id="btnEncerrar" class="button" style="color: black">Encerrar Empréstimo</button>
                                <button type="button" id="btnLimpar" class="button" style="color: black" onclick="limparCampos()">Limpar Campos</button>
                            </div>
                        </form>
                    </div>
                    
					<div id="painelMaterialSala" class="painel-colorido" style="text-align: center">
                        
						<form id="material" method="post" action="AdicionarMaterialEmprestado.php">
                            
							<div style="margin-top: 30px">
                                <div style="display: inline-block; vertical-align: top;">
                                    <input type="number" name="rp" id="rp" class="input-field" style="width: 80px; height: 20px" placeholder="RP" oninput="updateRP()" required min="1">
                                </div>
                                <div style="display: inline-block; vertical-align: top; margin-left: 70px">
                                    <img id="professorFoto" alt="" class="professor-foto" style="vertical-align: top; margin-top: 10px"/>
                                </div>
                                <div style="display: inline-block; margin-left: 70px">
                                    <span id="professorNome" name="professorNome" class="input-field" style="width: 370px; height: 20px; padding: 8px; display: block;"><b></b></span>
                                    <span id="professorCurso" name="professorCurso" class="input-field" style="width: 370px; height: 20px; padding: 8px; display: block;"><b></b></span>
                                </div>
                            </div>
							
                            <!-- Campos Ocultos para o Formulario -->
                            <input type="hidden" name="id_professor" id="id_professor">
                            <input type="hidden" name="nomeProfessor" id="nomeProfessor">
                            <input type="hidden" name="cursoProfessor" id="cursoProfessor">
							<input type="hidden" name="id_operador" id="id_operador" value="<?PHP echo $_SESSION['id_operador']; ?>">
                            <!--  -->
							
                            <hr style="max-width: 740px; margin-left: auto; margin-right: auto; margin-top: 33px">
                            
							<div style="margin-top: 30px">
                               
							   <div style="display: inline-block; vertical-align: top;">
                                    <input type="number" name="sala" id="sala" class="input-field" style="width: 80px; height: 20px" placeholder="Sala" oninput="updateMaterial()" required min="1">
									<input type="hidden" id="id_material" name="id_material">
							   </div>
                                
								<div style="display: inline-block; margin-left: 236px; width: 399px;">
                                    <label class="container"> Controle Ar
										<input type="checkbox" type="checkbox" id="ControleAr" name="ControleAr" value="true">
										<span style="margin-left: 10px;" class="checkmark" id="span-controleAr" name="span-controleAr"></span>
                                    </label>
									<label class="container"> Controle Projetor
										<input type="checkbox" id="ControleProjetor" name="ControleProjetor" value="true">
										<span style="margin-left: 10px;" class="checkmark" id="span-controlProjetor" name="span-controlProjetor"></span>
                                    </label>
                                    <label class="container"> Marcadores
										<input type="checkbox" id="Marcadores" name="Marcadores" value="true">
										<span style="margin-left: 10px;" class="checkmark" id="span-marcadores" name="span-marcadores"></span>
                                    </label>
                                    <label class="container"> Apagador
										<input type="checkbox" id="Apagador" name="Apagador" value="true">
										<span style="margin-left: 10px;" class="checkmark" id="span-apagador" name="span-apagador"></span>
                                    </label>
									
                                </div>
								
                            </div>
							
                            <input type="text" name="obs" id="obs" class="input-field" style="width: 725px; height: 70px" placeholder="Observação">
                            
							<div class="botao-emprestimo">
                                
								<button type="submit" id="btnIniciarEntrega" class="button" style="color: black">Entregar Material</button> 
                                <button type="button" id="btnEncerrarEntrega" class="button" style="color: black">Receber Material</button>
                                <button type="button" id="btnLimparMaterial" class="button" style="color: black" onclick="limparCampos()">Limpar Campos</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script src="emprestimo.js"></script> <!-- Link para o arquivo JavaScript -->
    </body>
</html>
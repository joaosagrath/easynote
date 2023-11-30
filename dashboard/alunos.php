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
        <title>EasyNote - Alunos Ativos</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" type="text/css" href="alunos.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
    </head>
    <body>
        <div class="sidebar">
            <div class="logo-container">
                <a href="dashboard.php">
                <img src="../resources/icon.png" alt="Descrição da Imagem" class="class-logo">
                </a>
            </div>
            <a href="emprestimo.php" id="link-emprestimo">EMPRÉSTIMO</a>
			<a href="relatorios.php" id="link-alunos">RELATÓRIOS</a>
            <a href="equipamentos.php" id="link-equipamentos">EQUIPAMENTOS</a>
			<a href="material.php" id="link-alunos">MATERIAL DE SALA</a>
            <a href="alunos.php" id="link-alunos" style="background-color: #3CB371; color: white;">ALUNOS ATIVOS</a>
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
			<a href="session/logout.php" id="link-logout" style="font-size: 13px;">SAIR</a>
        </div>
        <div class="content">
            <div id="alunos">
                <div class="painel" style="height: 100%; width: 100%; text-align: center">
                    <div id="painel-alunos" class="painel-colorido" style="text-align: center">
                        <input type="number" id="RA" class="input-field" style="width: 80px; margin-top: 35px" placeholder="RA" min="1">
                        <input type="text" id="Aluno" class="input-field" style="width: 311px;" placeholder="Aluno">
                        <input type="text" id="CPF" class="input-field" style="width: 95px;" placeholder="CPF" oninput="maskCPF(this)" maxlength="14">
                        <div class="dropdown-container" style="display: inline-block;">
                            <select id="Curso" name="Curso" style="width: 150px;">

                            </select>
                        </div>
                        <button id="botao-pesquisar" class="button" style="color: black; width: 10%;">Pesquisar</button>
                        <hr>
                        <div class="scrollable-table" style="margin-top: 10px;">
                            <?php
                                // Função para preencher a tabela com dados do banco de dados
                                function preencherTabelaAlunosComBD() {
                                	// Inclua o arquivo de configuração
                                	include('config.php');
                                
                                	// Query para obter os dados da tabela de alunos
                                	$sql = "SELECT ra, aluno, cpf, curso, email, telefone, emprestimo FROM alunos";
                                	$result = $conn->query($sql);
                                
                                	// Preenche a tabela com os resultados da query
                                	echo '<table id="tabela-alunos" class="styled-table">
                                			<thead style="font-size: 13px;">
                                				<tr>
                                					<th>RA</th>
                                					<th>Nome</th>
                                					<th>CPF</th>
                                					<th>Curso</th>
                                					<th>Email</th>
                                					<th>Telefone</th>
                                					<th>Utilizações</th>
                                				</tr>
                                			</thead>
                                			<tbody style="font-size: 12px;">';
                                
                                	if ($result->num_rows > 0) {
                                		// Output dos dados
                                		while ($row = $result->fetch_assoc()) {
                                			echo '<tr onclick="highlightRowAluno(this)">';
                                			echo "<td>{$row['ra']}</td>";
                                			echo "<td>{$row['aluno']}</td>";
                                			echo "<td>{$row['cpf']}</td>";
                                			echo "<td>{$row['curso']}</td>";
                                			echo "<td>{$row['email']}</td>";
                                			echo "<td>{$row['telefone']}</td>";
                                			echo "<td>{$row['emprestimo']}</td>";
                                			echo '</tr>';
                                		}
                                	} else {
                                		// Se não houverem resultados
                                		echo '<tr><td colspan="7">Nenhum Aluno encontrado</td></tr>';
                                	}
                                
                                	echo '</tbody></table>';
                                
                                	// Fecha a conexão com o banco de dados
                                	$conn->close();
                                }
                                
                                // Chamando a função para preencher a tabela com dados do banco de dados
                                preencherTabelaAlunosComBD();
                                ?>
                        </div>
                        <div class="botao-emprestimo">		
							<button id="botao-reset"class="button" style="color: black; width: 15%; margin-top: 20px">Limpar Pesquisa</button>	
                            <button class="button" style="color: black; width: 15%; margin-top: 20px; margin-right: 30px;" onclick="editarLinhaAluno()">Editar Cadastro</button>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="myModalAluno" class="modal">
            <div class="modal-content">
			<form method="post" action="EditarAluno.php">
                <div id="captureArea" style="display: none; ">
                    <video id="webcam" autoplay playsinline style="width: 100%; max-width: 300px;"></video>
					<br>
                    <button id="capture" class="button-modal" type="button">Capturar Imagem</button>
                </div>
				
                <div id="cropper-container" class="cropperContainer">
                    <img id="capturedImage">
                    <button id="crop" class="button-modal" onclick="fecharModalAlunos()">Recortar</button>
                </div>
                
				<canvas id="canvas" style="display: none;"></canvas>
                <table>
                    <tr>
                        <td>
                            <img id="alunoFoto" src="alunos/${ra}.jpg" alt="Descrição da Imagem" class="aluno-foto" style="vertical-align: top;">
                        </td>
                        <td>
                            <input type="text" id="ra-edit" name="ra-edit" class="input-field" style="width: 23%; height: 42px;" readonly>
                            <input type="text" id="nome-edit" name="nome-edit" class="input-field" style="width: 23%; height: 42px;"readonly>
                            <input type="text" id="cpf-edit" name="cpf-edit" class="input-field" style="width: 23%; height: 42px;"readonly>
                            <input type="text" id="curso-edit" name="curso-edit" class="input-field" style="width: 23%; height: 42px;" readonly>
                            <input type="text" id="email-edit" name="email-edit" class="input-field" style="width: 23%; height: 42px;">
                            <input type="text" id="telefone-edit" name="telefone-edit" class="input-field" style="width: 23%; height: 42px;">
                        </td>
                    </tr>
                </table>
                <input class="button-modal" style="color: white; margin-top: 10px;" id="btnStartCamera" value="Alterar Foto">
                <input class="button-modal" style="color: white; margin-top: 10px;" type="submit" name="EditarAluno" value="Atualizar Dados">
                <button class="button-modal" style="color: white; margin-top: 10px;" name="resetar-senha" formaction="ResetSenha.php">Resetar Senha</button>
				<button class="button-modal" style="color: white; margin-top: 10px;" id="btnFecharModal" type="button" onclick="fecharModalAlunos()">Cancelar</button>
				</form>
            </div>

        </div>
        <script>
		</script>
        <script src="alunos.js"></script> <!-- Link para o arquivo JavaScript -->
        <script src="utils.js"></script> <!-- Link para o arquivo JavaScript -->
    </body>
</html>
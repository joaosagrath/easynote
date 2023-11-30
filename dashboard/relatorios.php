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
        <title>EasyNote - Relatórios</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" type="text/css" href="relatorios.css">
        <!-- Link para o arquivo CSS -->
        <style>
        </style>
    </head>
    <body>
        <div class="sidebar">
            <div class="logo-container">
                <a href="dashboard.php">
                <img src="../resources/icon.png" alt="Descrição da Imagem" class="class-logo">
                </a>
            </div>
            <a href="emprestimo.php" id="link-emprestimo">EMPRÉSTIMO</a>
			<a href="relatorios.php" id="link-alunos" style="background-color: #3CB371; color: white;">RELATÓRIOS</a>
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
			<a href="session/logout.php" id="link-logout" style="font-size: 13px;">SAIR</a>
        </div>
        <div class="content">
            <div id="historico">
                <div class="painel" style="height: 100%; width: 100%; text-align: left">
				
					<button class="button-secondary button-historico active" onclick="mostrarPainel('historico')">NOTEBOOKS</button>
				    <button class="button-secondary button-hist-material-de-sala" onclick="mostrarPainel('hist-material-de-sala')">MATERIAL DE SALA</button>
					
                    <!-- Painel de Histórico -->
                    <div id="painel-historico" class="painel-colorido" style="text-align: left">
                        <input type="number" id="patrimonio" class="input-field" name="patrimonio" style="width: 80px; margin-left: 30px;  margin-top: 35px;" placeholder="Patrimônio" min="1">
                        <input type="date" id="datain" class="input-field" name="datain" style="width: 10%">                    
                        <label for="data" style="margin-left: 10px; display: inline-block;">à: </label>
                        <input type="date" id="dataout" class="input-field" name="dataout" style="width: 10%; margin-left: -5px;">  
                        <div class="dropdown-container" style="display: inline-block;">
                            <select id="status" name="status" style="width: 150px;">
                                <option value="Ambos">Ambos</option>
                                <option value="Em Andamento">Em Andamento</option>
                                <option value="Finalizado">Finalizado</option>
                            </select>
                        </div>
                        <input type="text" id="marca" class="input-field" name="marca" style="width: 190px;" placeholder="Marca">
                        <input type="text" id="modelo" class="input-field" name="modelo" style="width: 185px;" placeholder="Modelo">
                        <input type="number" id="RA" class="input-field" name="RA" style="width: 80px; margin-left: 30px" placeholder="RA" min="1">
                        <input type="text" id="nome" class="input-field" name="nome" style="width: 200px;" placeholder="Aluno">
                        <input type="text" id="CPF" class="input-field" name="CPF" style="width: 95px;" placeholder="CPF" oninput="maskCPF(this)" maxlength="14">
                        <div class="dropdown-container" style="display: inline-block;">
                            <select id="cursos" name="cursos" style="width: 254px;">


                            </select>

                            <select id="operadores" name="operadores" style="width: 153px; margin-left: 10px">


                            </select>
                        </div>
                        <button id="botao-pesquisar-notebooks" class="button" style="color: black; width: 10%;">Pesquisar</button>
                        <hr>
                        <div class="scrollable-table-notebooks" style="margin-top: 10px;">
                            <?php
								// Função para preencher a tabela com dados do banco de dados
								function preencherTabelaEmprestimosComBD() {
									// Inclua o arquivo de configuração
									include('config.php');

									// Query para obter os dados da tabela de equipamentos
									$sql = "SELECT datain, patrimonio, marca, modelo, ra, aluno, cpf, curso, dataout, observacao, status, operador FROM emprestimos";
									
									
									
									
									$result = $conn->query($sql);

									// Preenche a tabela com os resultados da query
									echo '<table id="tabela-relatorios" class="styled-table">
											<thead style="font-size: 13px;">
												<tr>
													<th>Empréstimo</th>
                                                    <th>Patrimonio</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>RA</th>
													<th>Aluno</th>
                                                    <th>CPF</th>
													<th>Curso</th>
													<th>Devolução</th>
                                                    <th>Observacao</th>
													<th>Status</th>
													<th>Operador</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 12px;">';

									if ($result->num_rows > 0) {
										// Output dos dados
										while ($row = $result->fetch_assoc()) {
													echo '<tr onclick="highlightRowRelatorio(this)">';
													echo "<td>{$row['datain']}</td>";
													echo "<td>{$row['patrimonio']}</td>";
													echo "<td>{$row['marca']}</td>";
													echo "<td>{$row['modelo']}</td>";
													echo "<td>{$row['ra']}</td>";
													echo "<td>{$row['aluno']}</td>";
													echo "<td>{$row['cpf']}</td>";
													echo "<td>{$row['curso']}</td>";
													echo "<td>{$row['dataout']}</td>";
													echo "<td>{$row['observacao']}</td>"; 
													echo "<td>{$row['status']}</td>";
													echo "<td>{$row['id_operador']}</td>";
													
													echo '</tr>';
												}
									} else {
										// Se não houverem resultados
										echo '<tr><td colspan="7">Nenhum equipamento encontrado</td></tr>';
									}

									echo '</tbody></table>';

									// Fecha a conexão com o banco de dados
									$conn->close();
								}

                                
                                // Chamando a função para preencher a tabela com o arquivo CSV
                                preencherTabelaEmprestimosComBD();
                                ?>
                        </div>
                        <div class="botao-emprestimo">				
                            <button class="button" id="botao-reset-notebooks" style="color: black; width: 15%; margin-top: 20px">Limpar Pesquisa</button>	
                            <button class="button" style="color: black; width: 15%; margin-top: 20px; margin-right: 30px;" onclick="imprimirTabelaRelatorioNotebooks()">Imprimir Relatório</button>	
                        </div>
                    </div>
					
					<div id="painel-hist-material-de-sala" class="painel-colorido" style="text-align: left">
                        <input type="number" id="sala" class="input-field" name="sala" style="width: 80px; margin-left: 30px;  margin-top: 35px;" placeholder="Sala" min="1">
                        <input type="date" id="datain-material" class="input-field" name="datain" style="width: 10%">                    
                        <label for="data" style="margin-left: 10px; display: inline-block;">à: </label>
                        <input type="date" id="dataout-material" class="input-field" name="dataout" style="width: 10%; margin-left: -5px;"> 
                        <input type="text" id="nome-professor" class="input-field" name="nome-professor" style="width: 135px;" placeholder="Professor"> 
                        <div class="dropdown-container" style="display: inline-block;">
                            <select id="status-material" name="status-material" style="width: 145px;">
                                <option value="Ambos">Ambos</option>
                                <option value="Em Uso">Em Uso</option>
                                <option value="Devolvido">Devolvido</option>
                            </select>
							
							<select id="operadores-retirada" name="operadores-retirada" style="width: 153px; margin-left: 10px">


                            </select>
							
                        </div>
                    
                        <button id="botao-pesquisar-materiais" class="button" style="color: black; width: 10%;">Pesquisar</button>
                        <hr>
                        <div class="scrollable-table" style="margin-top: 10px;">
                            <?php
								// Função para preencher a tabela com dados do banco de dados
								function preencherTabelaRetiradaComBD() {
									// Inclua o arquivo de configuração
									include('config.php');

									// Query para obter os dados da tabela de equipamentos
									$sql = "SELECT datain, sala, professor, curso, controle_ar, controle_projetor, marcadores, apagador, dataout, observacao, status, operador FROM retirada";
									$result = $conn->query($sql);

									// Preenche a tabela com os resultados da query
									echo '<table id="tabela-retirada" class="styled-table">
											<thead style="font-size: 13px;">
												<tr>
													<th>Retirada</th>
                                                    <th>Sala</th>
                                                    <th>Professor</th>
                                                    <th>Curso</th>
                                                    <th>Controle Ar</th>
													<th>Controle Projetor</th>
                                                    <th>Marcadores</th>
													<th>Apagador</th>
													<th>Devolução</th>
                                                    <th>Observacao</th>
													<th>Status</th>
													<th>Operador</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 12px;">';

									if ($result->num_rows > 0) {
										// Output dos dados
										while ($row = $result->fetch_assoc()) {
											
													// Convertendo valores booleanos para "true" ou "false"
											$controle_ar = $row['controle_ar'] ? 'Presente' : 'Faltando';
											$controle_projetor = $row['controle_projetor'] ? 'Presente' : 'Faltando';
											$marcadores = $row['marcadores'] ? 'Presente' : 'Faltando';
											$apagador = $row['apagador'] ? 'Presente' : 'Faltando';
											
													echo '<tr onclick="highlightRowRelatorio(this)">';
													echo "<td>{$row['datain']}</td>";
													echo "<td>{$row['sala']}</td>";
													echo "<td>{$row['professor']}</td>";
													echo "<td>{$row['curso']}</td>";
													echo "<td>{$controle_ar}</td>";
													echo "<td>{$controle_projetor}</td>";
													echo "<td>{$marcadores}</td>";
													echo "<td>{$apagador}</td>";
													echo "<td>{$row['dataout']}</td>";
													echo "<td>{$row['observacao']}</td>"; 
													echo "<td>{$row['status']}</td>";
													echo "<td>{$row['operador']}</td>";
													echo '</tr>';
												}
									} else {
										// Se não houverem resultados
										echo '<tr><td colspan="7">Nenhum equipamento encontrado</td></tr>';
									}

									echo '</tbody></table>';

									// Fecha a conexão com o banco de dados
									$conn->close();
								}

                                
                                // Chamando a função para preencher a tabela com o arquivo CSV
                                preencherTabelaRetiradaComBD();
                                ?>
                        </div> 
                        <div class="botao-emprestimo">				
                            <button class="button" id="botao-reset-retirada" style="color: black; width: 15%; margin-top: 20px">Limpar Pesquisa</button>	
                            <button class="button" style="color: black; width: 15%; margin-top: 20px; margin-right: 30px;" onclick="imprimirTabelaRelatorioMateriais()">Imprimir Relatório</button>	
                        </div>
                    </div>

			   </div>
            </div>
        </div>
        <script>
			
		</script>
        <script src="print.js"></script>
        <script src="relatorios.js"></script> <!-- Link para o arquivo JavaScript -->
        <script src="utils.js"></script> <!-- Link para o arquivo JavaScript -->
    </body>
</html>
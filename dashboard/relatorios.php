<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EasyNote</title>
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
                <img src="../resources/icon.gif" alt="Descrição da Imagem" class="class-logo">
                </a>
            </div>
            <a href="emprestimo.php" id="link-emprestimo">EMPRÉSTIMO</a>
            <a href="equipamentos.php" id="link-equipamentos">EQUIPAMENTOS</a>
            <!-- <a href="listagem.php" id="link-listagem">LISTAGEM</a> -->
            <a href="alunos.php" id="link-alunos">ALUNOS ATIVOS</a>
            <a href="relatorios.php" id="link-alunos" style="background-color: #3CB371; color: white;">RELATÓRIOS</a>
        </div>
        <div class="content">
            <div id="historico">
                <div class="painel" style="height: 100%; width: 100%; text-align: left">
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
                        <input type="text" id="nome" class="input-field" name="nome" style="width: 370px;" placeholder="Aluno">
                        <input type="text" id="CPF" class="input-field" name="CPF" style="width: 95px;" placeholder="CPF">
                        <div class="dropdown-container" style="display: inline-block;">
                            <select id="curso" name="curso" style="width: 254px;">
                                <option value="Todos">Todos</option>
                                <option value="Engenharia de Software">Engenharia de Software</option>
                                <option value="Análise e Desenvolvimentos de Sistemas">Análise e Desenvolvimentos de Sistemas</option>
                            </select>
                        </div>
                        <button id="botao-pesquisar" class="button" style="color: black; width: 10%;">Pesquisar</button>
                        <hr>
                        <div class="scrollable-table" style="margin-top: 10px;">
                            <?php
								// Função para preencher a tabela com dados do banco de dados
								function preencherTabelaEmprestimosComBD() {
									// Inclua o arquivo de configuração
									include('config.php');

									// Query para obter os dados da tabela de equipamentos
									$sql = "SELECT datain, patrimonio, marca, modelo, ra, aluno, cpf, curso, dataout, observacao, status FROM emprestimos";
									$result = $conn->query($sql);

									// Preenche a tabela com os resultados da query
									echo '<table id="tabela-relatorios" class="styled-table">
											<thead>
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
                            <button class="button" id="botao-reset" style="color: black; width: 15%; margin-top: 20px" onclick="limparPesquisa()">Limpar Pesquisa</button>	
                            <button class="button" style="color: black; width: 15%; margin-top: 20px; margin-right: 30px;" onclick="imprimirTabelaRelatorio()">Imprimir Relatório</button>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script></script>
        <script src="print.js"></script>
        <script src="relatorios.js"></script> <!-- Link para o arquivo JavaScript -->
    </body>
</html>
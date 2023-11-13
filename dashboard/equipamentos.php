<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EasyNote</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" href="equipamentos.css">
        <!-- Link para o arquivo CSS -->
    </head>
    <body>
        <div class="sidebar">
            <div class="logo-container">
                <a href="dashboard.php">
                <img src="../resources/icon.gif" alt="Descrição da Imagem" class="class-logo">
                </a>
            </div>
            <a href="emprestimo.php" id="link-emprestimo">EMPRÉSTIMO</a>
            <a href="equipamentos.php" id="link-equipamentos" style="background-color: #3CB371; color: white;">EQUIPAMENTOS</a>
            <!-- <a href="listagem.php" id="link-listagem">LISTAGEM</a> -->
            <a href="alunos.php" id="link-alunos">ALUNOS ATIVOS</a>
            <a href="relatorios.php" id="link-alunos">RELATÓRIOS</a>
        </div>
        <div class="content">
            <div id="equipamentos">
                <div class="painel" style="height: 100%; width: 100%; text-align: left">
                    <div id="painel-cadastro" class="painel-colorido" style="text-align: center">
						
						<form method="post" action="CadastroEquipamentos.php">
							<input type="number" id="patrimomio" name="patrimonio" class="input-field" style="width: 23%; margin-top: 35px" placeholder="Patrimônio" required min="1">
							<input type="text" id="marca" name="marca" class="input-field" style="width: 20%;" placeholder="Marca" required>
							<input type="text" id="modelo" name="modelo" class="input-field" style="width: 18%;" placeholder="Modelo" required>
							
							<select id="status" name="status" style="margin-left: 10px;">
								<option value="Disponivel">Disponível</option>
								<option value="Com Defeito">Com Defeito</option>
								<option value="Em Manutencao">Em Manutenção</option>
							</select>
							
							<input type="text" id="obs" name="obs" class="input-field" style="width: 58%;" placeholder="Observação">
							<input class="button" style="color: black; width: 115px; margin-left: 10px;" type="submit" name="CadastroEquipamentos" value="Cadastrar">
							<button class="button" style="color: black; width: 115px; margin-left: 10px;" type="button">Pesquisar</button>
						</form>
							
                        <hr>
                        
						<div class="scrollable-table" style="margin-top: 10px;">
						<?php
						// Função para preencher a tabela com dados do banco de dados
						function preencherTabelaEquipamentosComBD() {
							// Inclua o arquivo de configuração
							include('config.php');

							// Query para obter os dados da tabela de equipamentos
							$sql = "SELECT patrimonio, marca, modelo, status, observacao, data, uso FROM equipamentos";
							$result = $conn->query($sql);

							// Preenche a tabela com os resultados da query
							echo '<table id="tabela-equipamentos" class="styled-table">
									<thead>
										<tr>
											<th>Patrimonio</th>
											<th>Marca</th>
											<th>Modelo</th>
											<th>Status</th>
											<th>Observações</th>
											<th>Aquisição</th>
											<th>Utilizações</th>
										</tr>
									</thead>
									<tbody style="font-size: 14px;">';

							if ($result->num_rows > 0) {
								// Output dos dados
								while ($row = $result->fetch_assoc()) {
									echo '<tr onclick="highlightRowEquipamento(this)">';
									echo "<td>{$row['patrimonio']}</td>";
									echo "<td>{$row['marca']}</td>";
									echo "<td>{$row['modelo']}</td>";
									echo "<td>{$row['status']}</td>";
									echo "<td>{$row['observacao']}</td>";
									echo "<td>{$row['data']}</td>";
									echo "<td>{$row['uso']}</td>";
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

						// Chamando a função para preencher a tabela com dados do banco de dados
						preencherTabelaEquipamentosComBD();
						?>

                        </div>
                        <div class="botao-emprestimo">	
							<button class="button" id="botao-reset" style="color: black; width: 15%; margin-top: 20px" onclick="limparPesquisa()">Limpar Pesquisa</button>	
                            <button class="button" style="color: black; width: 15%; margin-right: 30px;" id="btnEditarEquipamento">Editar Equipamento</button>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<script>
			document.addEventListener('DOMContentLoaded', function () {
			  const searchParams = new URLSearchParams(window.location.search);

			  if (searchParams.has('error')) {
				var parametro = searchParams.get('error');
				alert('O equipamento de patrimônio n° ' + parametro + " já esta cadastrado.");
				window.location.href = "equipamentos.php";
			  }
			});
						
		</script>
		<script src="equipamentos.js"></script> <!-- Link para o arquivo JavaScript -->
    </body>
</html>
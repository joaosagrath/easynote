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
        <title>EasyNote - Cadastro de Equipamentos</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" href="equipamentos.css">
        <!-- Link para o arquivo CSS -->
		

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
            <a href="equipamentos.php" id="link-equipamentos" style="background-color: #3CB371; color: white;">EQUIPAMENTOS</a>
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
            <div id="equipamentos">
                <div class="painel" style="height: 100%; width: 100%; text-align: center">
                    <div id="painel-cadastro" class="painel-colorido" style="text-align: center">
						
						<form method="post" action="CadastroEquipamentos.php">
							<div>
								<input type="number" id="patrimonio" name="patrimonio" class="input-field" style="width: 23%; margin-top: 35px" placeholder="Patrimônio" required min="1">
								<input type="text" id="marca" name="marca" class="input-field" style="width: 20%;" placeholder="Marca" required>
								<input type="text" id="modelo" name="modelo" class="input-field" style="width: 18%;" placeholder="Modelo" required>
								
								<select id="status" name="status" style="margin-left: 10px;" >
									<option value="Disponível">Disponível</option>
									<option value="Com Defeito">Com Defeito</option>
									<option value="Em Manutencao">Em Manutenção</option>
								</select>
							</div>
							<div>
								<input type="date" id="datain" class="input-field" name="datain" style="width: 10%" required>                    
								<label for="data" style="margin-left: 10px; display: inline-block;">à: </label>
								<input type="date" id="dataout" class="input-field" name="dataout" style="width: 10%; margin-left: -5px;"> 
								<input type="text" id="obs" name="obs" class="input-field" style="width: 332px;" placeholder="Observação">
								<input class="button" style="color: black; width: 115px; margin-left: 10px;" type="submit" name="CadastroEquipamentos" value="Cadastrar">
								<button id="botao-pesquisar" class="button" style="color: black; width: 115px; margin-left: 10px;" type="button">Pesquisar</button>
							</div>
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
									<thead style="font-size: 13px;">
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
									<tbody style="font-size: 12px;">';

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
							<button class="button" id="botao-reset" style="color: black; width: 15%; margin-top: 20px">Limpar Pesquisa</button>	
                            <button class="button" style="color: black; width: 15%; margin-right: 30px;" id="btnEditarEquipamento" onclick="editarLinhaEquipamento()">Editar Equipamento</button>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div id="myModalEquipamento" class="modal">
            <div class="modal-content">
			<form method="post" action="EditarEquipamento.php">
                
				<table>
					<tr>
						<td>
							<h3>ATUALIZAÇÃO DE PATRIMÔNIO</h3>
						</td>
					</tr>
                    <tr>
                        <td>
							<div>
								<div  style="display: flex; " >
									<span id="" style="margin-left: 12px; height: 10px; font-size: 12px; display: block; " >Patrimônio</span>
									<span id="" style="margin-left: 105px; height: 10px; font-size: 12px; display: block; " >Marca</span>
									<span id="" style="margin-left: 129px; height: 10px; font-size: 12px; display: block; " >Modelo</span>
									
								</div>
								
								<div  style="display: flex; " >
									<input type="text" id="patrimonio-edit" name="patrimonio-edit" class="input-field" style="width: 130px; display: block;" placeholder="Patrimonio">
									<input type="text" id="marca-edit" name="marca-edit" class="input-field" style="width: 130px; display: block;" placeholder="Marca">
									<input type="text" id="modelo-edit" name="modelo-edit" class="input-field" style="width: 130px; display: block;" placeholder="Modelo">
								</div>
								
								<div  style="display: flex; " >
									<span id="" style="margin-left: 12px; height: 10px; font-size: 12px; display: block; " >Status</span>
									<span id="" style="margin-left: 130px; height: 10px; font-size: 12px; display: block; " >Observaçôes</span>
								</div>
								
								<div style="display: flex">
									<div  style="display: block; text-align: left" >
										
										<select id="status-edit" name="status-edit" class="input-field" style="width: 153px; display: block;">
											<option value="Disponível">Disponível</option>
											<option value="Com Defeito">Com Defeito</option>
											<option value="Em Manutencao">Em Manutenção</option>
										</select>
										<span id="" style="margin-left: 12px; height: 10px; font-size: 12px; display: block; " >Data</span>
										<input type="date" id="datain-edit" name="datain-edit" class="input-field" style="width: 135px; display: block;" required> 
										
									</div>
									
									<div  style="display: block; " >
										 <input type="text" id="obs-edit" name="obs-edit" class="input-field" style="width: 290px; height: 83px; display: block;" placeholder="Observação">
								</div>
								</div>
							
							</div>
                        </td>
                    </tr>
                </table>
                <input class="button-modal" style="color: white; margin-top: 10px;" type="submit" name="EditarEquipamento" value="Atualizar">
				<button class="button-modal" style="color: white; margin-top: 10px;" id="btnFecharModal" type="button" onclick="fecharModalEquipamentos()">Cancelar</button>
				</form>
            </div>

        </div>
		<script>
			
		</script>
		<script src="equipamentos.js"></script> <!-- Link para o arquivo JavaScript -->
    </body>
</html>
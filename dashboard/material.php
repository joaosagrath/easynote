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
        <title>EasyNote - Cadastro de Materiais</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" type="text/css" href="material.css">
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
			<a href="equipamentos.php" id="link-equipamentos">EQUIPAMENTOS</a>
            <a href="material.php" id="link-alunos" style="background-color: #3CB371; color: white;">MATERIAL DE SALA</a>
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
                <div class="painel" style="height: 100%; width: 100%; text-align: left">
                    <div id="painel-cadastro" class="painel-colorido" style="text-align: center;">
                        
						<form method="post" action="CadastroMaterial.php">
                            <div style="display: flex;">
                                
								<div class="sala" style="text-align: center; width: 40%; margin-top: 25px">
                                    <input type="number" id="sala" name="sala" class="input-field" style="width: 50%;" placeholder="Sala" required min="1">
                                    <input type="text" id="obs" name="obs" class="input-field" style="width: 50%" placeholder="Observação">
                                </div>
								
                                <div class="form-row">
									<label class="container"> Controle Ar
										<input style="margin-left: 52px" type="checkbox" id="ControleAr" name="ControleAr" value="true" checked="checked">
										<span class="checkmark"></span>
									</label>
									
									<label class="container"> Controle Projetor
										<input style="margin-left: 11px" type="checkbox" id="ControleProjetor" name="ControleProjetor" value="true" checked="checked">
										<span class="checkmark"></span>
									</label>
									
									<label class="container"> Marcadores
										<input style="margin-left: 47px" type="checkbox" id="Marcadores" name="Marcadores" checked="checked" value="true">
										<span class="checkmark"></span>
									</label>
									
									<label class="container"> Apagador
										<input style="margin-left: 62px" type="checkbox" id="Apagador" name="Apagador" checked="checked" value="true">
										<span class="checkmark"></span>
									</label>
								</div>
								
                                <div style="margin-top: 25px; width: 20%">
                                    <button id="botao-pesquisar" class="button" style="color: black; width: 115px; margin-left: 10px; margin-top: 11px" type="button">Pesquisar</button>
                                    <input class="button" style="color: black; width: 115px; margin-left: 10px; margin-top: 21px" type="submit" name="CadastroMaterial" value="Cadastrar" id="btnCadastrarMaterial">
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="scrollable-table" style="margin-top: 10px;">
                            <?php
                                //Função para ler o arquivo CSV e preencher a tabela
                                function preencherTabelaMateriaisComBD() {
									
									// Inclua o arquivo de configuração
									include('config.php');
									
									// Query para obter os dados da tabela de equipamentos
									$sql = "SELECT id_material, sala, controle_ar, controle_projetor, marcadores, apagador, observacao FROM material";
									$result = $conn->query($sql);
									
									echo '<table id="tabela-materiais" class="styled-table">
											<thead style="font-size: 13px;">
												<tr>
													<th id="th-sala">Sala</th>
													<th id="th-controle-ar">Controle do Ar</th>
													<th id="th-controle-projetor">Controle do Projetor</th>
													<th id="th-marcadores">Marcadores</th>
													<th id="th-apagador">Apagador</th>
													<th id="th-observacao">Observações</th>	
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
								
											// Preenchendo a tabela com os valores
											echo '<tr onclick="highlightRowMaterial(this)">';
											echo "<td>{$row['sala']}</td>";
											echo "<td>{$controle_ar}</td>";
											echo "<td>{$controle_projetor}</td>";
											echo "<td>{$marcadores}</td>";
											echo "<td>{$apagador}</td>";
											echo "<td>{$row['observacao']}</td>";
											echo '</tr>';
										}
									}else {
										// Se não houverem resultados
										echo '<tr><td colspan="7">Nenhum material encontrado</td></tr>';
									}
								
									echo '</tbody></table>';
									// Fecha a conexão com o banco de dados
									$conn->close();
								}
                                
								// Chamando a função para preencher a tabela com o arquivo CSV
								preencherTabelaMateriaisComBD();
								?>
                        </div>
                        <div class="botao-emprestimo">	
                            <button class="button" id="botao-reset" style="color: black; width: 15%; margin-top: 20px" >Limpar Pesquisa</button>	
                            <button class="button" style="color: black; width: 15%; margin-right: 30px;" id="btnEditarEquipamento" onclick="editarLinhaMaterial()">Editar Material</button>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<div id="myModalMaterial" class="modal">
            <div class="modal-content">
			<form method="post" action="EditarMaterial.php">
			
				<table>
					<tr>
						<td>
							<h3>ATUALIZAÇÃO DE MATERIAL DE SALA</h3>
						</td>
					</tr>
                    <tr>
                        <td>
							<div style="display: flex;">
                                
								<div class="sala" style="text-align: center; width: 40%; margin-top: 25px">
                                    <input type="number" id="sala-edit" name="sala-edit" class="input-field" style="width: 50%;" placeholder="Sala" required min="1">
                                    <input type="text" id="obs-edit" name="obs-edit" class="input-field" style="width: 50%" placeholder="Observação">
                                </div>
								
                                <div class="form-row" style="margin-left: 100px">
									<label class="container"> Controle Ar
										<input style="margin-left: 52px" type="checkbox" id="ControleAr-edit" name="ControleAr-edit" value="true" checked="checked">
										<span class="checkmark"></span>
									</label>
									
									<label class="container"> Controle Projetor
										<input style="margin-left: 11px" type="checkbox" id="ControleProjetor-edit" name="ControleProjetor-edit" value="true" checked="checked">
										<span class="checkmark"></span>
									</label>
									
									<label class="container"> Marcadores
										<input style="margin-left: 47px" type="checkbox" id="Marcadores-edit" name="Marcadores-edit" checked="checked" value="true">
										<span class="checkmark"></span>
									</label>
									
									<label class="container"> Apagador
										<input style="margin-left: 62px" type="checkbox" id="Apagador-edit" name="Apagador-edit" checked="checked" value="true">
										<span class="checkmark"></span>
									</label>
								</div>
                        </td>
                    </tr>
                </table>
                <input class="button-modal" style="color: white; margin-top: 10px;" type="submit" name="EditarMaterial" value="Atualizar">
				<button class="button-modal" style="color: white; margin-top: 10px;" id="btnFecharModal" type="button" onclick="fecharModalMaterial()">Cancelar</button>
			</form>
            </div>

        </div>
		
        <script>
            document.addEventListener('DOMContentLoaded', function () {
              const searchParams = new URLSearchParams(window.location.search);
            
              if (searchParams.has('error')) {
            	var parametro = searchParams.get('error');
            	alert('Sala n° ' + parametro + " já esta cadastrado.");
            	window.location.href = "material.php";
              }
            });
        </script>
        <script src="material.js"></script> <!-- Link para o arquivo JavaScript -->
    </body>
</html>
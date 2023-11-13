<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EasyNote</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" type="text/css" href="alunos.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
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
            <a href="alunos.php" id="link-alunos" style="background-color: #3CB371; color: white;">ALUNOS ATIVOS</a>
            <a href="relatorios.php" id="link-alunos">RELATÓRIOS</a>
        </div>
        <div class="content">
            <div id="alunos">
                <div class="painel" style="height: 100%; width: 100%; text-align: center">
                    <div id="painel-alunos" class="painel-colorido" style="text-align: left">
                        <input type="number" id="ra" class="input-field" style="width: 311px; margin-left: 30px; margin-top: 35px" placeholder="RA" min="1">
                        <input type="text" id="aluno" class="input-field" style="width: 311px;" placeholder="Aluno">
                        <input type="text" id="CPF" class="input-field" style="width: 311px;" placeholder="CPF">
                        <input type="text" id="curso" class="input-field" style="width: 25%; margin-left: 30px;" placeholder="Curso">
                        <input type="number" id="cmail" class="input-field" style="width: 25%;" placeholder="Email">
                        <input type="number" id="telefone" class="input-field" style="width: 24%" placeholder="Telefone">
                        <button class="button" style="color: black; width: 10%; margin-left: 10px;">Pesquisar</button>
                        <hr>
                        <div class="scrollable-table" style="margin-top: 10px;">
                            <?php
                                // Função para ler o arquivo CSV e preencher a tabela
                                function preencherTabelaEmprestimosComCSV($arquivoCSV) {
                                    echo '<table id="tabela-historico" class="styled-table">
                                            <thead>
                                                <tr>
													<th>RA</th>
                                                    <th>Nome</th>
                                                    <th>CPF</th>
                                                    <th>Curso</th>
                                                    <th>Email</th>
                                                    <th>Telefone</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 14px;">';
                                
                                    if (($handle = fopen($arquivoCSV, "r")) !== FALSE) {
                                        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                                            
											$ra = $data[0];
											$nome = $data[1];
											$cpf = $data[2];
											$curso = $data[3];
                                            $email = $data[4]; 
                                            $telefone = $data[5]; 
											$senha = $data[6];
                                
                                            // Preenchendo a tabela com os valores
                                            echo '<tr onclick="highlightRowAluno(this)">';
                                            echo "<td>$ra</td>";
                                            echo "<td>$nome</td>";
                                            echo "<td>$cpf</td>";
                                            echo "<td>$curso</td>";
                                            echo "<td>$email</td>";
                                            echo "<td>$telefone</td>";
                                            echo "<td style='display: none;'>$senha</td>";
                                            echo '</tr>';
                                        }
                                        fclose($handle);
                                    }
                                    echo '</tbody>
                                        </table>';
                                }
                                // Chamando a função para preencher a tabela com o arquivo CSV
                                preencherTabelaEmprestimosComCSV('ra-ativos.csv');
                                ?>
                        </div>
                        <div class="botao-emprestimo">
							<button class="button" id="botao-reset" style="color: black; width: 15%; margin-top: 20px">Limpar Pesquisa</button>	
                            <button class="button" style="color: black; width: 15%; margin-top: 20px; margin-right: 30px;" onclick="editarLinhaAluno()">Editar Cadastro</button>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="myModalAluno" class="modal">
            <div class="modal-content">
			<form method="post" action="EditarAluno.php">
                <!-- <div id="captureArea" style="display: none; ">
                    <video id="webcam" autoplay playsinline style="width: 100%; max-width: 300px;"></video>
					<br>
                    <button id="capture" class="button-modal">Capturar Imagem</button>
                </div>
				
                <div id="cropper-container" class="cropperContainer">
                    <img id="capturedImage">
                    <button id="crop" class="button-modal">Recortar</button>
                </div>
                
				<canvas id="canvas" style="display: b;"></canvas> -->
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
                <button class="button-modal" style="color: white; margin-top: 10px;" id="btnStartCamera" type="button">Alterar Foto</button>
				
                <input class="button-modal" style="color: white; margin-top: 10px;" type="submit" name="EditarAluno" value="Atualizar Dados">
                <button class="button-modal" style="color: white; margin-top: 10px;" id="btnFecharModal" type="button" onclick="fecharModalAlunos()">Cancelar</button>
				<button class="button-modal" style="color: white; margin-top: 10px;" name="resetar-senha" formaction="ResetSenha.php">Resetar Senha</button>

				</form>
			</div>
        </div>
        <script> // Função para redirecionar para a página desejada
  function redirecionarParaPagina() {
    // Substitua "URL_DA_PAGINA" pela URL da página que você deseja chamar
    window.location.href = "webcam.html";
  }

  // Adicione um ouvinte de evento ao botão
  var botao = document.getElementById("btnStartCamera");
  botao.addEventListener("click", redirecionarParaPagina);</script>
        <script src="alunos.js"></script> <!-- Link para o arquivo JavaScript -->
    </body>
</html>
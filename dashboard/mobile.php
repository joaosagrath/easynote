<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
       // Inclua o arquivo de configuração
       include('config.php');
       
       // Verifique se foi passado um parâmetro "ra" na URL
       if (isset($_GET['ra'])) {
       	// Recupere o valor do parâmetro "ra"
       	$ra = $_GET['ra'];
       
       // Consulta SQL para buscar os dados na tabela "alunos" com base no RA
           $query = "SELECT aluno, cpf, curso, email, telefone FROM alunos WHERE ra = '$ra'";
       
           // Executar a consulta
           $result = mysqli_query($conn, $query);
           // Verificar se a consulta foi bem-sucedida
           if ($result) {
               // Verificar se há pelo menos uma linha de resultado
               if (mysqli_num_rows($result) > 0) {
                   // Obter os dados da primeira linha de resultado
                   $row = mysqli_fetch_assoc($result);
       
                   // Atribuir os valores às variáveis
                   $fullname = $row['aluno'];
                   // $fullname = mysqli_real_escape_string($conn, $row['aluno']); // Escapar o caractere '
                   $cpf = $row['cpf'];
                   $curso = $row['curso'];
                   $email = $row['email'];
                   $telefone = $row['telefone'];
       
                   // Fechar a conexão com o banco de dados
                   mysqli_close($conn);
               } else {
                   echo "Nenhum resultado encontrado para o RA $ra na tabela 'inativos'.";
               }
           } else {
               echo "Erro na consulta SQL: " . mysqli_error($conn);
           }
       } else {
           echo "O parâmetro 'ra' não foi fornecido na URL.";
       }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="apple-touch-icon" sizes="180x180" href="../icons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../icons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../icons/favicon-16x16.png">
        <link rel="manifest" href="../site.webmanifest.json">
        <link rel="mask-icon" href="../icons/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Scripts para cropper -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.css">
        <!-- Scripts para Barcode -->
        <script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
        <!-- Scripts para qrcode -->
        <script src="qrcode/jquery.min.js"></script>
        <script src="qrcode/qrcode.js"></script>
        <!-- Estilos -->
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" type="text/css" href="mobile.css">
        <title>EasyNote - Histórico de Aluno</title>
    </head>
    <body>
        <div class="register-container" style= "margin-top: 10px" >
            <div class="painel-desktop">
                <div id="painel-aluno" style="height: 100%; width: 100%; text-align: center">
                    <div>
                        <div style="display: inline-block; vertical-align: top; margin-left: 70px">
                            <img id="alunoFotoPerfil" src="alunos/<?php echo $ra; ?>.jpg" alt="" class="aluno-foto" style="vertical-align: top; margin-top: 10px" />
                            <span id="raValue" style="padding: 8px; display: block;"><b><?php echo $ra; ?></b></span>
                        </div>
                        <div style="display: inline-block; margin-left: 70px">
                            <span id="span_nome" name="span_nome" class="input-field" style="width: 370px; height: 20px; padding: 10px; display: block;"><b><?php echo $fullname; ?></b></span>
                            <span id="span_cpf" name="span_cpf" class="input-field" style="width: 370px; height: 20px; padding: 10px; display: block;"><b><?php echo $cpf; ?></b></span>
                            <span id="span_curso" name="span_curso" class="input-field" style="width: 370px; height: 20px; padding: 10px; display: block;"><b><?php echo $curso; ?></b></span>
                        </div>
                        <hr>
                        <div class="scrollable-table" style="margin-top: 10px;">
                            <?php
                                $raParam = isset($_GET['ra']) ? $_GET['ra'] : ''; // Obtém o valor de raParam da URL
                                
                                // Função para preencher a tabela com dados do banco de dados
                                function preencherTabelaEmprestimosComBD($raParam) {
                                	// Inclua o arquivo de configuração
                                	include('config.php');
                                
                                	// Query para obter os dados da tabela de equipamentos com filtro por $raParam
                                	$sql = "SELECT datain, patrimonio, marca, modelo, ra, aluno, cpf, curso, dataout, observacao, status, operador FROM emprestimos WHERE ra = ?";
                                	$stmt = $conn->prepare($sql);
                                	$stmt->bind_param('s', $raParam);
                                	$stmt->execute();
                                	$result = $stmt->get_result();
                                
                                	// Preenche a tabela com os resultados da query
                                	echo '<table id="tabela-equipamentos" class="styled-table">
                                			<thead>
                                				<tr>
                                					<th>Empréstimo</th>
                                					<th>Patrimonio</th>
                                					<th>Marca</th>
                                					<th>Modelo</th>
                                					<th style="display: none">RA</th>
                                					<th style="display: none">Aluno</th>
                                					<th style="display: none">CPF</th>
                                					<th style="display: none">Curso</th>
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
                                			echo "<td style='display: none'>{$row['ra']}</td>";
                                			echo "<td style='display: none'>{$row['aluno']}</td>";
                                // echo "<td style='display: none'>" . htmlspecialchars($row['aluno']) . "</td>";
                                			echo "<td style='display: none'>{$row['cpf']}</td>";
                                			echo "<td style='display: none'>{$row['curso']}</td>";
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
                                	$stmt->close();
                                	$conn->close();
                                }
                                
                                // Chamando a função para preencher a tabela com o arquivo CSV
                                preencherTabelaEmprestimosComBD($raParam);
                                ?>
                        </div>
                        <hr>
                        <div style="display: inline-block;">
                            <input type="file" accept="image/*" id="fileInput" style="display: none;">
                            <button class="button" style="color: black; width: 160px; margin-top: 10px; margin-bottom: 10px;" data-ra="<?php echo $raParam; ?>" onclick="editarFotoAlunoDesktop()">Foto da Camera</button>							
                            <div style="display: inline-block;" id="btnProfileDesktop">
                                <button class="button" style="color: black; width: 160px; margin-top: 10px; margin-bottom: 10px;">Editar Perfil</button>
                            </div>
                            <div style="display: inline-block;" id="btnBarCodeDesktop">
                                <button class="button" style="color: black; width: 160px; margin-top: 10px; margin-bottom: 10px;">Exibir Carteira</button>	
                            </div>
                        </div>
                    </div>
                </div>
                <div id="myModalAluno" class="modal">
                    <div class="modal-content-desktop">
                        <div id="captureArea" style="display: none">
                            <video id="webcam" autoplay playsinline style="width: 100%; max-width: 300px;"></video>
                            <br>
                            <button style="width: 86%;" id="capture" class="button-modal">Capturar Imagem</button>
                        </div>
                        <div id="cropper-container" class="cropperContainer" style="display: none; text-align: center">
                            <img id="capturedImage">
                        </div>
                        <div class="button-container">
                            <canvas id="canvas" style="display: none;"></canvas>
                            <div class="button-row">
                                <button id="crop" class="button-modal" onclick="fecharModalAlunos()" style="width: 49%;">Recortar e Salvar</button>
                                <button id="selectAnotherButton" class="button-modal" style="width: 49%; display: none;">Tirar Outra Foto</button>
                            </div>
                            <button id="btnFecharModal" class="button-modal" onclick="fecharModalAlunos()" style="width: 100%; margin-left: 24px">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="painel-mobile">
                <img src="../resources/logo-horizontal.png" alt="Descrição da Imagem" class="class-logo">
                <div class="div-extra">
                    <?php
                        // Função para preencher a tabela com dados do banco de dados
                        function preencherTabelaEmprestimosMobileComBD($raParam = null) {
                            // Inclua o arquivo de configuração
                            include('config.php');
                        
                            // Query para obter os dados da tabela de equipamentos com filtro por $raParam
                        $sql = "SELECT datain, patrimonio, marca, modelo, ra, aluno, cpf, curso, dataout, observacao, status, operador FROM emprestimos WHERE ra = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param('s', $raParam);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        
                            // Preenche a tabela com os resultados da query
                            echo '<div class="tabela-div">'; // Adicione uma div para conter as divs geradas dinamicamente
                        
                        $divs = array();
                        
                            while ($row = $result->fetch_assoc()) {
                                $dataIn = $row['datain'];
                                $patrimonio = $row['patrimonio'];
                                $marca = $row['marca'];
                                $modelo = $row['modelo'];
                                $observacao = $row['observacao'];
                                // $nome = $row['aluno'];
                        $nome = mysqli_real_escape_string($conn, $row['aluno']); // Escapar o caractere '
                                $cpf = $row['cpf'];
                                $curso = $row['curso'];
                                $status = $row['status'];
                                $dataOut = $row['dataout'];
                                $ra = $row['ra'];
                                $operador = $row['operador'];
                        
                                // Restante do seu código permanece o mesmo para criar as divs
                        
                                // Gerar um ID único para cada div
                                $divID = 'div_' . uniqid();
                        
                        // Verifique o valor de $status e defina a cor de fundo correspondente
                        if ($status === "Em Andamento") {
                        $backgroundColor = '#FA8072'; // Vermelho
                        } else {
                        $backgroundColor = '#3CB371'; // Verde (cor padrão)
                        }
                        
                        
                                // Imprimir a div com o ID gerado
                                $divs[] = "<div class='divClicavel' id='$divID' style='background-color: $backgroundColor; text-align: left;'>
                                        <div><b>Equipamento:</b> $marca - $modelo</div>
                                        <div><b>Status:</b> $status</div>
                                        <div style='text-align: left; margin-top: 1%; margin-left: 7%; font-size: 14px;'><b>Hora da retirada:</b> $dataIn</div>
                                        <div style='text-align: left; margin-top: 0.1%; margin-left: 7%; font-size: 14px;'><b>Hora da devolucao:</b> $dataOut</div>
                                        <div style='text-align: left; margin-top: 0.1%; margin-left: 7%; font-size: 14px;'><b>Patrimonio:</b> $patrimonio</div>
                                    </div>
                                    <script>
                                        var $divID = document.getElementById('$divID');
                                        $divID.addEventListener('click', function() {
                                            abrirPopup(this, '$marca', '$modelo', '$status', '$dataIn', '$dataOut', '$patrimonio', '$observacao', '$ra', '$nome', '$cpf', '$curso', '$operador');
                                        });
                        
                        var ra= '$ra'; 
                        var nome= '$nome'; 
                        var cpf= '$cpf'; 
                        var curso= '$curso';
                        
                                    </script>";
                            }
                        
                        // Inverte a ordem do array
                        $divs = array_reverse($divs);
                        
                        // Exibe as divs na ordem inversa
                        echo '<div class="tabela-div">'; // Adicione uma div para conter as divs geradas dinamicamente
                        foreach ($divs as $div) {
                        echo $div;
                        }
                        
                            echo '</div>'; // Feche a div que contém as divs geradas dinamicamente
                        
                            // Fecha a conexão com o banco de dados
                            $stmt->close();
                            $conn->close();
                        }
                        
                        // Chame a função para preencher a tabela com o RA passado na URL como parâmetro
                        if (isset($_GET['ra'])) {
                            $raParam = $_GET['ra'];
                        }
                        
                        
                        
                        preencherTabelaEmprestimosMobileComBD($raParam);
                        ?>
                </div>
            </div>
            <div style="display: inline-block;" id="btnBarCode">
                <button class="button-secondary">Exibir Carteira</button>	
            </div>
            <div style="display: inline-block;" id="btnProfile">
                <button class="button-secondary">Editar Perfil</button>
            </div>
        </div>
        <!-- Modal para exibir a imagem cortada -->
        <div id="imageModal" class="modal">
            <div class="modal-content" style="text-align: center">
                <div class="modal-content-crop">
                    <img id="croppedImage" class="cropped-image" src="" alt="Imagem cortada">
                    <button id="okButton" class="button-modal" style="margin-top:10px; text-align: center;">OK</button>
                    <button id="fecharButton" class="button-modal" style="margin-top:10px; text-align: center;" onclick="fecharPopupCropFoto()">Cancelar</button>
                    <button id="selectAnotherButton" class="button-modal" style="margin-top:10px; width: 92%; text-align: center;">Selecionar Outra Foto</button>
                </div>
            </div>
        </div>
        <div class="popup" id="popup">
            <div class="popup-content">
                <div id="popupContent"></div>
                <button class="button-secondary" style="margin-top:10px; width: 100%; text-align: center;" onclick="fecharPopup()">Fechar</button>
                <button class="button-secondary" id="btnImprimirCarteira" style="margin-top:10px; width: 100%; text-align: center; display: none" onclick="imprimirCarteira()">Imprimir</button>
            </div>
        </div>
        <div class="popup" id="popupPerfil">
            <div class="popup-content">
                <form id="perfil" method="post" action="AlterarPerfilAluno.php">
                    <div id="popupContentPerfil">
                    </div>
                    <button class="button-secondary" style="margin-top:10px; width: 49%; text-align: center;" type="submit">Salvar</button>
                    <button class="button-secondary" style="margin-top:10px; width: 49%; text-align: center;" type="button" onclick="fecharPopupPerfil()">Fechar</button>
                </form>
            </div>
        </div>
        <script>
			var nome = "<?php echo $fullname; ?>";
			var cpf = "<?php echo $cpf; ?>";
			var curso = "<?php echo $curso; ?>";
		</script>
		<script src="mobile.js"></script>
		<script src="utils.js"></script>
    </body>
</html>
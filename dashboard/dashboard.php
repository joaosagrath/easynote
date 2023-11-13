<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EasyNote</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" type="text/css" href="dashboard.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- <script src="chart.js"></script> -->
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
            <a href="equipamentos.php" id="link-equipamentos">EQUIPAMENTOS</a>
            <!-- <a href="listagem.php" id="link-listagem">LISTAGEM</a> -->
            <a href="alunos.php" id="link-alunos">ALUNOS ATIVOS</a>
            <a href="relatorios.php" id="link-alunos">RELATÓRIOS</a>
        </div>
        <div class="content">
        <div id="dashboard">
        <div class="painel" style="height: 100%; width: 100%; text-align: center">
            <div id="painel-emprestimo" class="painel-colorido" style="text-align: center">
                <!-- <img src="../resources/logo-horizontal.gif" alt="Descrição da Imagem" style="width: 400px;"class="class-logo"> -->
                <div class="container" style="display: flex; margin-top: 20px; margin-left: 40px">
                    <div class="input-field" style="text-align: left; width: 300px; color: white">
                        <div style="text-align: left; display: inline-block; ">
                            <span id="equipTotal" style="width: 195px; height: 20px; padding: 8px; display: block;">Total de Equipamentos:</span>
                            <hr>
                            <span id="equipUso" style="width: 195px; height: 20px; padding: 8px; display: block;">Equipamentos em Uso:</span>
                            <hr>
                            <span id="alunosAti" style="width: 195px; height: 20px; padding: 8px; display: block;">Alunos Ativos:</span>
                        </div>
                        <div style="display: inline-block; ">
                            <span id="span_equipTotal" style="width: 50px; height: 20px; padding: 8px; display: block;"><b></b></span>
                            <hr>
                            <span id="span_equipUso" style="width: 50px; height: 20px; padding: 8px; display: block;"><b></b></span>
                            <hr>
                            <span id="span_alunosAti" style="width: 50px; height: 20px; padding: 8px; display: block;"><b></b></span>
                        </div>
                    </div>
                    <div class="input-field" style="text-align: left; width: 630px; color: white">
                        <div style="text-align: left; display: inline-block; ">
                            <span id="" style="width: 225px; height: 20px; padding: 8px; display: block;">Equipamento mais Usado:</span>
                            <hr>
                            <span id="" style="width: 225px; height: 20px; padding: 8px; display: block;">Aluno mais Ativo:</span>
                            <hr>
                            <span id="" style="width: 225px; height: 20px; padding: 8px; display: block;">Curso mais Ativo:</span>
                        </div>
                        <div style="display: inline-block; ">
                            <span id="span_equipMaisUso" style="width: 265px; height: 20px; padding: 8px; display: block;"><b></b></span>
                            <hr>
                            <span id="span_alunoMaisAtivo" style="width: 265px; height: 20px; padding: 8px; display: block;"><b> </b></span>
                            <hr>
                            <span id="span_cursoMaisAtivo" style="width: 365px; height: 20px; padding: 8px; display: block;"><b> </b></span>
                        </div>
                    </div>
                </div>
                <div class="container" style="display: flex; margin-left: 40px">
                    <div class="input-field" style="text-align: left; width: 630px">
                        <canvas id="barChart"></canvas>
                    </div>
                    <div>
                        <div class="input-field" style="text-align: left; width: 300px; height: 140px">
                            <canvas id="horizontalBarEquipChart">  </canvas>
                        </div>
                        <div class="input-field" style="text-align: left; width: 300px; height: 140px">
                            <canvas id="horizontalBarWeekEquipChart"></canvas>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            // Inclua o arquivo de configuração
            include('config.php');
            
            // Consulta SQL para buscar o número de patrimônio mais utilizado e os 10 números de patrimônio mais utilizados na tabela equipamentos
            $queryMaisUtilizado = "SELECT patrimonio, marca, modelo, SUM(uso) AS total_utilizacoes FROM equipamentos GROUP BY patrimonio, marca, modelo ORDER BY total_utilizacoes DESC LIMIT 1";
            $queryDezMaisUtilizados = "SELECT patrimonio, marca, modelo, SUM(uso) AS total_utilizacoes FROM equipamentos GROUP BY patrimonio, marca, modelo ORDER BY total_utilizacoes DESC LIMIT 10";
            
            $queryAlunoMaisAtivo = "SELECT ra, aluno, COUNT(ra) AS total_emprestimos FROM emprestimos GROUP BY ra, aluno ORDER BY total_emprestimos DESC LIMIT 1";
            $queryCursoMaisAtivo = "SELECT curso, COUNT(curso) AS total_emprestimos FROM emprestimos GROUP BY curso ORDER BY total_emprestimos DESC LIMIT 1";
            $queryEquipamentosEmAndamento = "SELECT COUNT(patrimonio) AS total_em_andamento FROM emprestimos WHERE status = 'em andamento'";
            $queryEquipamentosHoje = "SELECT COUNT(patrimonio) AS total_hoje FROM emprestimos WHERE STR_TO_DATE(datain, '%d/%m/%Y') = CURDATE()";
            $queryEquipamentos7Dias = "SELECT COUNT(patrimonio) AS total_7dias FROM emprestimos WHERE STR_TO_DATE(datain, '%d/%m/%Y') BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()";
            $queryEquipamentos14Dias = "SELECT COUNT(patrimonio) AS total_14dias FROM emprestimos WHERE STR_TO_DATE(datain, '%d/%m/%Y') BETWEEN CURDATE() - INTERVAL 14 DAY AND CURDATE()";
            
            $queryTotalEquipamentos = "SELECT COUNT(patrimonio) AS total_equipamentos FROM equipamentos";
            $queryTotalAlunos = "SELECT COUNT(ra) AS total_alunos FROM alunos";
            
            // Variáveis para armazenar os resultados
            $patrimonioMaisUtilizado = array();
            $dezMaisUtilizados = array();
            $alunoMaisAtivo = array();
            $cursoMaisAtivo = array();
            $equipamentosEmUso = 0;
            $equipamentosHoje = 0;
            $equipamentos7Dias = 0;
            $equipamentos14Dias = 0;
            $totalEquipamentos = 0;
            $totalAlunos = 0;
            
            // Executa a consulta SQL para o número de patrimônio mais utilizado
            $resultMaisUtilizado = $conn->query($queryMaisUtilizado);
            
            if ($resultMaisUtilizado) {
                $row = $resultMaisUtilizado->fetch_assoc();
                if ($row) {
                    $patrimonioMaisUtilizado = array(
                        'patrimonio' => $row['patrimonio'],
                        'marca' => $row['marca'],
                        'modelo' => $row['modelo'],
                        'total_utilizacoes' => $row['total_utilizacoes']
                    );
                }
            }
            
            // Executa a consulta SQL para os 10 números de patrimônio mais utilizados
            $resultDezMaisUtilizados = $conn->query($queryDezMaisUtilizados);
            
            if ($resultDezMaisUtilizados) {
                while ($row = $resultDezMaisUtilizados->fetch_assoc()) {
                    $dezMaisUtilizados[] = array(
                        'patrimonio' => $row['patrimonio'],
                        'marca' => $row['marca'],
                        'modelo' => $row['modelo'],
                        'total_utilizacoes' => $row['total_utilizacoes']
                    );
                }
            }
            
            // Executa a consulta SQL para o aluno mais ativo
            $resultAlunoMaisAtivo = $conn->query($queryAlunoMaisAtivo);
            
            if ($resultAlunoMaisAtivo) {
                $row = $resultAlunoMaisAtivo->fetch_assoc();
                if ($row) {
                    $alunoMaisAtivo = array(
                        'ra' => $row['ra'],
                        'aluno' => $row['aluno'],
                        'total_emprestimos' => $row['total_emprestimos']
                    );
                }
            }
            
            // Executa a consulta SQL para o curso mais ativo
            $resultCursoMaisAtivo = $conn->query($queryCursoMaisAtivo);
            
            if ($resultCursoMaisAtivo) {
                $row = $resultCursoMaisAtivo->fetch_assoc();
                if ($row) {
                    $cursoMaisAtivo = array(
                        'curso' => $row['curso'],
                        'total_emprestimos' => $row['total_emprestimos']
                    );
                }
            }
            
            // Executa a consulta SQL para os equipamentos em andamento
            $resultEquipamentosEmAndamento = $conn->query($queryEquipamentosEmAndamento);
            
            if ($resultEquipamentosEmAndamento) {
                $row = $resultEquipamentosEmAndamento->fetch_assoc();
                if ($row) {
                    $equipamentosEmUso = $row['total_em_andamento'];
                }
            }
            
            // Executa a consulta SQL para os equipamentos hoje
            $resultEquipamentosHoje = $conn->query($queryEquipamentosHoje);
            
            if ($resultEquipamentosHoje) {
                $row = $resultEquipamentosHoje->fetch_assoc();
                if ($row) {
                    $equipamentosHoje = $row['total_hoje'];
                }
            }
            
            // Executa a consulta SQL para os equipamentos nos últimos 7 dias
            $resultEquipamentos7Dias = $conn->query($queryEquipamentos7Dias);
            
            if ($resultEquipamentos7Dias) {
                $row = $resultEquipamentos7Dias->fetch_assoc();
                if ($row) {
                    $equipamentos7Dias = $row['total_7dias'];
                }
            }
            
            // Executa a consulta SQL para os equipamentos nos últimos 14 dias
            $resultEquipamentos14Dias = $conn->query($queryEquipamentos14Dias);
            
            if ($resultEquipamentos14Dias) {
                $row = $resultEquipamentos14Dias->fetch_assoc();
                if ($row) {
                    $equipamentos14Dias = $row['total_14dias'];
                }
            }
            
            // Executa a consulta SQL para contar o total de Equipamentos
            $resultTotalEquipamentos = $conn->query($queryTotalEquipamentos);
            if ($resultTotalEquipamentos) {
                $row = $resultTotalEquipamentos->fetch_assoc();
                if ($row) {
                    $totalEquipamentos = $row['total_equipamentos'];
                }
            }
            
            // Executa a consulta SQL para contar o total de alunos
            $resultTotalAlunos = $conn->query($queryTotalAlunos);
            if ($resultTotalAlunos) {
                $row = $resultTotalAlunos->fetch_assoc();
                if ($row) {
                    $totalAlunos = $row['total_alunos'];
                }
            }
            /*    
            // Exiba os resultados
            echo "Número de patrimônio mais utilizado: {$patrimonioMaisUtilizado['patrimonio']}, Marca: {$patrimonioMaisUtilizado['marca']}, Modelo: {$patrimonioMaisUtilizado['modelo']}, com um total de {$patrimonioMaisUtilizado['total_utilizacoes']} utilizações.<br><br>";
            
            echo "Os 10 números de patrimônio mais utilizados:<br>";
            foreach ($dezMaisUtilizados as $index => $patrimonio) {
                echo "Número de patrimônio: {$patrimonio['patrimonio']}, Marca: {$patrimonio['marca']}, Modelo: {$patrimonio['modelo']}, Total de utilizações: {$patrimonio['total_utilizacoes']}<br><br>";
            }
            
            echo "Aluno mais ativo: RA {$alunoMaisAtivo['ra']}, Aluno: {$alunoMaisAtivo['aluno']}, Total de empréstimos: {$alunoMaisAtivo['total_emprestimos']}<br>";
            
            echo "Curso mais ativo: Curso: {$cursoMaisAtivo['curso']}, Total de empréstimos: {$cursoMaisAtivo['total_emprestimos']}<br>";
            
            echo "Equipamentos em uso (em andamento): {$equipamentosEmUso}<br>";
            
            echo "Equipamentos hoje: {$equipamentosHoje}<br>";
            
            echo "Equipamentos nos últimos 7 dias: {$equipamentos7Dias}<br>";
            
            echo "Equipamentos nos últimos 14 dias: {$equipamentos14Dias}<br>";
            
            echo "Total de equipamentos: {$totalEquipamentos}<br>";
            
            echo "Total de alunos: {$totalAlunos}<br>";
            */
			
            // Transformando em .json e incluindo como JavaScript na página
            echo '<script>';
            echo 'var patrimonioMaisUtilizado = ' . json_encode($patrimonioMaisUtilizado) . ';';
            echo 'var dezMaisUtilizados = ' . json_encode($dezMaisUtilizados) . ';';
            echo 'var alunoMaisAtivo = ' . json_encode($alunoMaisAtivo) . ';';
            echo 'var cursoMaisAtivo = ' . json_encode($cursoMaisAtivo) . ';';
            echo 'var equipamentosEmUso = ' . json_encode($equipamentosEmUso) . ';';
            echo 'var equipamentosHoje = ' . json_encode($equipamentosHoje) . ';';
            echo 'var equipamentos7Dias = ' . json_encode($equipamentos7Dias) . ';';
            echo 'var equipamentos14Dias = ' . json_encode($equipamentos14Dias) . ';';
            echo 'var totalEquipamentos = ' . json_encode($totalEquipamentos) . ';';
            echo 'var totalAlunos = ' . json_encode($totalAlunos) . ';';
            echo '</script>';
            ?>
        <!-- Inclua o arquivo JavaScript após a geração das variáveis -->
        <script src="dashboard.js"></script>
    </body>
</html>
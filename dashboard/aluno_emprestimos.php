<?php
	// Função para ler o arquivo CSV e preencher a tabela
	function preencherTabelaEmprestimosComCSV($arquivoCSV, $raParam = null) {
		if (($handle = fopen($arquivoCSV, "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$ra = $data[4]; // Obtém o RA da linha

				// Verifique se o RA da linha corresponde ao RA passado na URL (ou se nenhum RA foi passado)
				if ($raParam === null || $ra === $raParam) {
					// Resto do seu código para preencher a tabela permanece o mesmo
					$dataIn = $data[9]; 
					$patrimonio = $data[0]; 
					$marca= $data[1];
					$modelo = $data[2];
					$observacao = $data[3];
					$nome = $data[5];
					$cpf = $data[6];
					$curso = $data[7];
					$status = $data[8];
					$dataOut = $data[10];

					// Gerar um ID único para cada div
					$divID = 'div_' . uniqid();
					
					// Verifique o valor de $status e defina a cor de fundo correspondente
					if ($status === "Em Andamento") {
						$backgroundColor = '#FA8072'; // Vermelho
					} else {
						$backgroundColor = '#3CB371'; // Verde (cor padrão)
					}

					// Imprimir a div com o ID gerado
					echo "<div class='divClicavel' id='$divID' style='background-color: $backgroundColor; text-align: left;'>
					<div><b>Equipamento:</b> $marca - $modelo</div>
					<div><b>Status:</b> $status</div>
					<div style='text-align: left; margin-top: 1%; margin-left: 7%; font-size: 14px;'><b>Hora da retirada:</b> $dataIn</div>
					<div style='text-align: left; margin-top: 0.1%; margin-left: 7%; font-size: 14px;'><b>Hora da devolucao:</b> $dataOut</div>
					<div style='text-align: left; margin-top: 0.1%; margin-left: 7%; font-size: 14px;'><b>Patrimonio:</b> $patrimonio</div>
					</div>
					";

					// Adicione um script JavaScript para manipular o clique na div recém-criada
					echo "<script>
							var $divID = document.getElementById('$divID');
							$divID.addEventListener('click', function() {
								abrirPopup(this, '$marca', '$modelo', '$status', '$dataIn', '$dataOut', '$patrimonio', '$observacao', '$ra', '$nome', '$cpf', '$curso');
							});
						</script>";
				}
			}
			fclose($handle);
		}
	}

	// Chamando a função para preencher a tabela com o arquivo CSV, passando o RA da URL como parâmetro
	if (isset($raParam)) {
		preencherTabelaEmprestimosComCSV('emprestimos.csv', $raParam);
	} else {
		preencherTabelaEmprestimosComCSV('emprestimos.csv');
	}
	?>
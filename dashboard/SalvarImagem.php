<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obter o valor do campo "ra"
  $ra = $_POST['ra'];

  // Caminho para a pasta de destino
  $pastaAlunos = 'alunos/';

  // Certifique-se de que a pasta de destino exista
  if (!file_exists($pastaAlunos)) {
    mkdir($pastaAlunos, 0777, true);
  }
  
  // Nome do arquivo
  $nomeArquivo = $pastaAlunos . $ra . '.jpg';
	
  // Verifica se o arquivo foi enviado com sucesso
  if (move_uploaded_file($_FILES['file']['tmp_name'], $nomeArquivo)) {
    echo 'Imagem salva com sucesso!';
	
  } else {
    echo 'Falha ao salvar a imagem.';
  }
}
?>

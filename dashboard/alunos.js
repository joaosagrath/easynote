// Variável para armazenar a linha clicada na tabela Pagamentos
var linhaClicadaAluno = null;

// Função para destacar a linha clicada e desfazer o destaque das outras
function highlightRowAluno(row) {
    // Se uma linha já estiver destacada, remova o destaque dela
    if (linhaClicadaAluno !== null) {
        linhaClicadaAluno.style.backgroundColor = '';
    }

    // Verifica se a linha clicada não é a mesma que a anterior
    if (row !== linhaClicadaAluno) {
        linhaClicadaAluno = row; // Armazena a nova linha clicada
        row.style.backgroundColor = 'yellow'; // Define a cor de fundo como amarela
    } else {
        linhaClicadaAluno = null; // Remove o destaque se a mesma linha for clicada novamente
    }
}

function editarLinhaAluno() {
    if (linhaClicadaAluno) {
        const cells = linhaClicadaAluno.getElementsByTagName('td');
        document.getElementById("ra-edit").value = cells[0].textContent;
        document.getElementById("nome-edit").value = cells[1].textContent;
        document.getElementById("cpf-edit").value = cells[2].textContent;
        document.getElementById("curso-edit").value = cells[3].textContent;
        document.getElementById("email-edit").value = cells[4].textContent;
        document.getElementById("telefone-edit").value = cells[5].textContent;

        // Atualize o atributo src da imagem com base no valor de ra-edit
        const raValue = document.getElementById("ra-edit").value;
        const imagemAluno = document.getElementById("alunoFoto");
        imagemAluno.src = `alunos/${raValue}.jpg`;

        const video = document.getElementById('webcam');
        const captureButton = document.getElementById('capture');
        const startCameraButton = document.getElementById('btnStartCamera');
        const cropButton = document.getElementById('crop');
        const canvas = document.getElementById('canvas');
        const capturedImage = document.getElementById('capturedImage');
        const cropperContainer = document.getElementById('cropper-container');
        const fecharModal = document.getElementById('btnFecharModal');
        let cropper; // Variável para manter a instância do Cropper.js

        async function startCamera() {
            const stream = await navigator.mediaDevices.getUserMedia({
                video: true
            });
            video.srcObject = stream;
        }

        startCameraButton.addEventListener('click', () => {
            startCamera();
            captureArea.style.display = 'block';
        });

        captureButton.addEventListener('click', () => {
            video.style.display = 'none';
            cropperContainer.style.display = 'block';
            captureArea.style.display = 'none';

            const context = canvas.getContext('2d');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, video.videoWidth, video.videoHeight);
            capturedImage.src = canvas.toDataURL();

            // Inicializa o Cropper.js após a imagem ser carregada
            capturedImage.onload = function() {
                cropper = new Cropper(capturedImage, {
                    aspectRatio: 3 / 4,
                    viewMode: 1,
                });
            };
        });

        cropButton.addEventListener('click', () => {
            if (cropper) {
                cropper.getCroppedCanvas().toBlob((blob) => {
                    const formData = new FormData();
                    formData.append('ra', raValue);
                    formData.append('file', blob, 'imagem.jpg');

                    fetch('SalvarImagem.php', {
                            method: 'POST',
                            body: formData,
                        })
                        .then(response => response.text())
                        .then(data => {
                            console.log(data);
							
							// Parar a câmera
							const stream = video.srcObject;
							if (stream) {
								const tracks = stream.getTracks();
								tracks.forEach(track => track.stop());
							}

                            // Limpar os elementos e recursos usados para captura e recorte
                            video.style.display = 'block';
                            captureArea.style.display = 'none';
                            cropperContainer.style.display = 'none';
                            cropper.destroy();
                            capturedImage.src = ''; // Limpa a imagem capturada
							
							

                            // Outras ações que você deseja realizar após o recorte, se houver
                        })
                        .catch(error => {
                            console.error('Erro:', error);
                        });
                });
            }
        });
		
		fecharModal.addEventListener('click', () => {
			// Limpar os elementos e recursos usados para captura e recorte
					// Parar a câmera
                    const stream = video.srcObject;
                    if (stream) {
                        const tracks = stream.getTracks();
                        tracks.forEach(track => track.stop());
                    }
			
                    video.style.display = 'block';
                    captureArea.style.display = 'none';
                    cropperContainer.style.display = 'none';
					if(cropper){ 
						cropper.destroy();
					}
                    
                    capturedImage.src = ''; // Limpa a imagem capturada

                    
        });
		
		abrirModalAlunos();
    } else {
        alert('Nenhuma linha selecionada. Selecione uma linha para editar.');
    }
}

// Função para abrir o modal Pagamentos
function abrirModalAlunos() {
    var modal = document.getElementById('myModalAluno');
    modal.style.display = 'block';
}

// Função para fechar o modal Pagamentos
function fecharModalAlunos() {
    var modal = document.getElementById('myModalAluno');
    modal.style.display = 'none';
}

// Função para pesquisa em relatórios
document.addEventListener("DOMContentLoaded", function() {
    // Pega os elementos dos campos de filtro
    var inputRA = document.getElementById('RA');
    var inputAluno = document.getElementById('Aluno');
    var inputCPF = document.getElementById('CPF');
    var selectCurso = document.getElementById('Curso');

    var tabela = document.getElementById('tabela-alunos');
    var linhas = tabela.getElementsByTagName('tr');

    // Função para limpar os campos de pesquisa e reexibir todas as linhas da tabela
   function resetPesquisa() {
        inputRA.value = '';
        inputAluno.value = '';
        inputCPF.value = '';
        selectCurso.value = 'Todos';

        // Exibir todas as linhas da tabela
        for (var i = 1; i < linhas.length; i++) {
            var linha = linhas[i];
            linha.style.display = '';
        }
    }

     // Adicione um ouvinte de evento ao botão de pesquisa
     document.getElementById("botao-pesquisar").addEventListener("click", function() {
        var filtroRA = inputRA.value;
        var filtroAluno = inputAluno.value.toLowerCase();
        var filtroCPF = inputCPF.value;
        var filtroCurso = selectCurso.value.toLowerCase();


         // Loop através das linhas da tabela para aplicar o filtro
         for (var i = 1; i < linhas.length; i++) {
            var linha = linhas[i];
            var celulas = linha.getElementsByTagName('td');
	
			var RA = celulas[0].innerText;
			var Aluno = celulas[1].innerText.toLowerCase();
            var CPF = celulas[2].innerText;
            var Curso = celulas[3].innerText.toLowerCase();
    
			//alert("filtroCurso: " + filtroCurso + "\nCurso: " + Curso);
			
            if (
                (filtroRA === '' || RA.includes(filtroRA)) &&
                (filtroAluno === '' || Aluno.includes(filtroAluno)) &&
                (filtroCPF === '' || CPF.includes(filtroCPF)) &&
                (filtroCurso === 'todos' || Curso.includes(filtroCurso))
            ) {
				
                linha.style.display = ''; // Mostra a linha se atender aos critérios de filtro
            
			} else {
                linha.style.display = 'none'; // Oculta a linha se não atender aos critérios de filtro
            }
            
        }
    });

    // Adicione um ouvinte de evento ao botão de reset
   document.getElementById("botao-reset").addEventListener("click", function() {
        resetPesquisa();
    });
});

function preencherSelectComCursos() {
    // Obtém a tabela e suas linhas
    var table = document.getElementById("tabela-alunos");
    var rows = table.getElementsByTagName("tr");
    
    var cursosSet = new Set(); // Usando um Set para garantir valores únicos
    
    // Itera pelas linhas, começa em 1 para pular o cabeçalho
    for (var i = 1; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        if (cells.length >= 4) { // Verifica se há dados suficientes na linha
            var curso = cells[3].innerText.trim(); // A coluna do curso é a quarta (índice 3)
            cursosSet.add(curso);
        }
    }
    
    // Converte o Set para um array e ordena os cursos em ordem alfabética
    var cursosArray = Array.from(cursosSet).sort();

    // Preenche o select com os cursos ordenados
    var select = document.getElementById("Curso");
    select.innerHTML = ""; // Limpa as opções existentes

    // Adiciona a opção "Todos"
    var optionTodos = document.createElement("option");
    optionTodos.value = "Todos";
    optionTodos.text = "Todos";
    select.appendChild(optionTodos);

    // Adiciona as opções dos cursos
    for (var j = 0; j < cursosArray.length; j++) {
        var option = document.createElement("option");
        option.value = cursosArray[j];
        option.text = cursosArray[j];
        select.appendChild(option);
    }
}

// Chama a função para preencher o select ao carregar a página
preencherSelectComCursos();

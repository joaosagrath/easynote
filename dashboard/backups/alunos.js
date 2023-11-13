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
		
		/*
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
            //captureArea.style.display = 'none';

            const context = canvas.getContext('2d');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, video.videoWidth, video.videoHeight);
            capturedImage.src = canvas.toDataURL();
			
			alert(context);
			alert(canvas.width);
			alert(canvas.height);
			alert(context.drawImage);
			alert(capturedImage);
			
			
			
            // Inicializa o Cropper.js após a imagem ser carregada
            capturedImage.onload = function() {
				alert("AQUI SIM");
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

				fetch('salvar_imagem.php', {
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
 
	
		cropButton.addEventListener('click', () => {
// Agora você pode usar o Cropper.js para permitir ao usuário recortar a imagem capturada.
// Certifique-se de que o Cropper.js esteja devidamente configurado.
	if (cropper) {
		cropper.getCroppedCanvas().toBlob((blob) => {
			const raValue = "505319"
			const formData = new FormData();
			formData.append('ra', raValue);
			formData.append('file', blob, 'imagem.jpg');

			fetch('salvar_imagem.php', {
				method: 'POST',
				body: formData,
			})
				.then(response => response.text())
				.then(data => {
					console.log(data);
					// Faça algo com a resposta do servidor, se necessário
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
            if (cropper) {
                cropper.destroy();
            }

            capturedImage.src = ''; // Limpa a imagem capturada

        }); */

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
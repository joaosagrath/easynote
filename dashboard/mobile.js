var currentDiv = null; // Variável para armazenar a div clicada

var urlParams = new URLSearchParams(window.location.search);
var ra = urlParams.get('ra');

urlParams.get('ra');

// Função para abrir o popup e exibir o conteúdo da div clicada
function abrirPopup(div, marca, modelo, status, dataIn, dataOut, patrimonio, observacao, ra, nome, cpf, curso) {
	
    currentDiv = div;
    var popupContent = document.getElementById('popupContent');
    var popup = document.getElementById('popup');

    // Construir o conteúdo do popup com os valores
    var conteudo = `
                <div class='container'>
                    <div ><b>Patrimonio:</b> ${patrimonio}</div>
                    <div class='info-Marca col-md-4'><b>Equipamento:</b> ${marca} - ${modelo}</div>
                    <div class='info-situacao col-md-4'><b>Status:</b> ${status}</div>
                    <div class='info-situacao col-md-4'><b>Observação:</b> ${observacao}</div>
                </div>
				<hr>
                <div style='text-align: left; margin-top: 1%; margin-left: 7%; font-size: 14px;'><b>Hora da retirada:</b> ${dataIn}</div>
                <div style='text-align: left; margin-top: 0.1%; margin-left: 7%; font-size: 14px;'><b>Hora da devolucao:</b> ${dataOut}</div>
                <div style='text-align: left; margin-top: 0.1%; margin-left: 7%; font-size: 14px;'><b>RA:</b> ${ra}</div>
                <div style='text-align: left; margin-top: 0.1%; margin-left: 7%; font-size: 14px;'><b>Nome:</b> ${nome}</div>
                <div style='text-align: left; margin-top: 0.1%; margin-left: 7%; font-size: 14px;'><b>CPF:</b> ${cpf}</div>
                <div style='text-align: left; margin-top: 0.1%; margin-left: 7%; font-size: 14px;'><b>Curso:</b> ${curso}</div>
            `;

    // Inserir o conteúdo no popup
    popupContent.innerHTML = conteudo;

    // Exibir o popup
    popup.style.display = 'block';
}

var btnBarCode = document.getElementById('btnBarCode');
	btnBarCode.addEventListener('click', function() {
	abrirPopupBarCode(this, ra, nome, cpf, curso);
});

function abrirPopupBarCode(div, ra, nome, cpf, curso) {
    currentDiv = div;
    var popupContent = document.getElementById('popupContent');
    var popup = document.getElementById('popup');
    var inputValue = ra;

    // Definir o conteúdo do popup
    var conteudo = `
        <div>
            <input type="text" style="display: none" id="inputValue" value="${ra}" readonly/>
			
			<button id="btnCodigo" class="button" style="display: none" onclick="GerarCódigoDeBarras(inputValue)">Gerar Código de Barras</button>
			

        </div>
		<div style="text-align: center; inline: block;" >
			
			<img id="aluno-foto" src="alunos/${ra}.jpg" alt="" class="aluno-foto" style="width: 100px; height:134px; vertical-align: top; margin-top: 5px"/>
			<svg id="codBarras" display: block;" ></svg>
			<span id="nomeValue" style="padding: 8px; display: block;"><b>${nome}</b></span>
			<span id="cpfValue" style="padding: 8px; display: block;"><b>${cpf}</b></span>
			<span id="cursoValue" style="padding: 8px; display: block;"><b>${curso}</b></span>
		</div>
    `;

    // Inserir o conteúdo no popup
    popupContent.innerHTML = conteudo;

    // Exibir o popup
    popup.style.display = 'block';

    // Clique automático no botão "Gerar Código de Barras"
    document.getElementById('btnCodigo').click();

    console.log('Correspondência encontrada:');
    console.log('Índice 1:', nome);
    console.log('Índice 2:', cpf);
    console.log('Índice 3:', curso);
}

function GerarCódigoDeBarras(elementoInput) {
    /*A função JsBarcode não aceita string vazia*/
    if (!elementoInput.value) {
        elementoInput.value = 0;
    }
    JsBarcode('#codBarras', elementoInput.value);
}

// Função para fechar o popup
function fecharPopup() {
    var popup = document.getElementById('popup');
    popup.style.display = 'none';
    currentDiv = null;
}

let cropper; // Variável para manter a instância do Cropper.js

function choosePhoto(button) {
    // Recupere o valor de "ra" do atributo "data-ra" do botão clicado
    const raValue = button.getAttribute('data-ra');
    const fileInput = document.getElementById('fileInput');

    // Simula um clique no input de arquivo
    fileInput.click();

    // Adiciona um ouvinte de mudança para o input de arquivo
    fileInput.addEventListener('change', function(event) {
        const selectedFile = event.target.files[0];

        if (selectedFile) {
            // Exibir a imagem no modal
            const imageModal = document.getElementById('imageModal');
            const croppedImage = document.getElementById('croppedImage');
            const okButton = document.getElementById('okButton');
            const selectAnotherButton = document.getElementById('selectAnotherButton');
            imageModal.style.display = 'block';

            // Inicializa o Cropper.js
            croppedImage.src = URL.createObjectURL(selectedFile);
            cropper = new Cropper(croppedImage, {
                aspectRatio: 3 / 4, // Define a proporção de recorte (pode ajustar conforme necessário)
                viewMode: 1, // Define o modo de visualização
            });

            // Botão "OK"
            okButton.addEventListener('click', function() {
				
				
                // Redimensionar a imagem cortada antes de obter os dados
                const larguraDesejada = 187; // Defina a largura desejada em pixels
                const alturaDesejada = 250; // Defina a altura desejada em pixels
                const croppedData = cropper.getCroppedCanvas({
                    width: larguraDesejada,
                    height: alturaDesejada,
                }).toDataURL('image/jpeg', 1.0); // Qualidade 1.0 (máxima)

                // Converte a imagem base64 em um blob (formato de arquivo)
                const byteCharacters = atob(croppedData.split(',')[1]);
                const byteNumbers = new Array(byteCharacters.length);
                for (let i = 0; i < byteCharacters.length; i++) {
                    byteNumbers[i] = byteCharacters.charCodeAt(i);
                }
                const blob = new Blob([new Uint8Array(byteNumbers)], {
                    type: 'image/jpeg'
                });

                // Cria um objeto FormData para enviar a imagem
                const formData = new FormData();
                formData.append('ra', raValue); // Nome do arquivo será o valor de "ra"
                formData.append('file', blob, 'imagem.jpg');
				
				alert(raValue);

                // Envia a imagem para o servidor usando XMLHttpRequest
                const xhr = new XMLHttpRequest();
				
                xhr.open('POST', 'salvar_imagem.php', true); // Substitua 'salvar_imagem.php' pelo script do servidor que salvará a imagem
                xhr.send(formData);

                // Fecha o modal
                imageModal.style.display = 'none';
				
            });

            // Botão "Selecionar Outra Foto"
            selectAnotherButton.addEventListener('click', function() {
                // Oculta o modal atual
                imageModal.style.display = 'none';
                // Reinicializa o input de arquivo para permitir a seleção de outra foto
                fileInput.value = '';
                // Simula um clique no input de arquivo novamente
                fileInput.click();
            });
        }
    });
}

function editarFotoAluno() {

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
			btnStartCamera.style.display = 'none';
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

        });

        abrirModalAlunos();

}

// Função para abrir o modal Pagamentos
function abrirModalAlunos() {
    var modal = document.getElementById('myModalAluno');
    modal.style.display = 'block';
}

// Função para fechar o modal Pagamentos
function fecharModalAlunos() {

    var modal = document.getElementById('editarFotoAluno');

    modal.style.display = 'none';
}


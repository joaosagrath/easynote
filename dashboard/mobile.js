var currentDiv = null; // Variável para armazenar a div clicada

var urlParams = new URLSearchParams(window.location.search);
var ra = urlParams.get('ra');

urlParams.get('ra');

// Função para abrir o popup e exibir o conteúdo da div clicada
function abrirPopup(div, marca, modelo, status, dataIn, dataOut, patrimonio, observacao, ra, nome, cpf, curso, operador) {

    currentDiv = div;
    var popupContent = document.getElementById('popupContent');
    var popup = document.getElementById('popup');

    // Construir o conteúdo do popup com os valores
    var conteudo = `
                <div class='container' style="text-align: left">
                    <div ><b>Patrimonio:</b> ${patrimonio}</div>
                    <div class='info-Marca col-md-4'><b>Equipamento:</b> ${marca} - ${modelo}</div>
                    <div class='info-situacao col-md-4'><b>Status:</b> ${status}</div>
                    <div class='info-situacao col-md-4'><b>Observação:</b> ${observacao}</div>
                    <div class='info-situacao col-md-4'><b>Operador:</b> ${operador}</div>
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

var btnImprimirCarteira = document.getElementById('btnImprimirCarteira');

btnBarCode.addEventListener('click', function() {
	
    abrirPopupBarCode(this, ra, nome, cpf, curso);
	btnImprimirCarteira.style.display = 'block';
});

btnBarCodeDesktop.addEventListener('click', function() {
	
    abrirPopupBarCode(this, ra, nome, cpf, curso);
	btnImprimirCarteira.style.display = 'block';
});

var btnProfile = document.getElementById('btnProfile');
btnProfile.addEventListener('click', function() {

    abrirPopupProfile(this, ra, nome, cpf, curso);
});

var btnProfileDesktop = document.getElementById('btnProfileDesktop');
btnProfileDesktop.addEventListener('click', function() {

    abrirPopupProfile(this, ra, nome, cpf, curso);
});

function abrirPopupBarCode(div, ra, nome, cpf, curso) {
	
	refreshFoto();
	
    currentDiv = div;
    var popupContent = document.getElementById('popupContent');
    var popup = document.getElementById('popup');
    var inputValue = ra;

    // Definir o conteúdo do popup
    var conteudo = `
        <div>
            <input type="hidden" id="inputValue" value="${ra}" />
			<button id="btnCodigoBarCode" class="button" style="display: none" onclick="GerarCodigoDeBarras(inputValue)">Gerar Código de Barras</button>
        </div>
		
		<div class="popupProfile" >
			<div class="input-field">
				<img id="alunoFotoCarteira" src="alunos/${ra}.jpg" alt="" class="aluno-foto" style="width: 100px; height:134px; vertical-align: top; margin-top: 5px"/>
				<svg id="codBarras" display: block;" ></svg>
			</div>	

			<span id="nomeValue" style="padding: 8px 0; display: block;"><b>${nome}</b></span>
			<span id="cpfValue" style="padding: 8px 0; display: block;"><b>${cpf}</b></span>
			<span id="cursoValue" style="padding: 8px 0; display: block;"><b>${curso}</b></span>
		</div>
    `;

    // Inserir o conteúdo no popup
    popupContent.innerHTML = conteudo;

    // Exibir o popup
    popup.style.display = 'block';

    // Clique automático no botão "Gerar Código de Barras"
    document.getElementById('btnCodigoBarCode').click();

    console.log('Correspondência encontrada:');
    console.log('Índice 1:', nome);
    console.log('Índice 2:', cpf);
    console.log('Índice 3:', curso);
}

function refreshFoto() {
  const fotos = [
    'alunoFotoPerfil',
    'alunoFotoPerfilEdit',
    'alunoFotoCarteira'
  ];

  const refreshMS = 1000;

  setTimeout(() => {
    fotos.forEach((fotoId) => {
      const imgElement = document.getElementById(fotoId);

      if (!imgElement.src.includes('?')) {
        imgElement.src = `${imgElement.src}?${Date.now()}`;
      } else {
        imgElement.src =
          imgElement.src.slice(0, imgElement.src.indexOf('?') + 1) +
          Date.now();
      }
    });

    console.log('Fotos Atualizadas');
    console.log(fotos.map((fotoId) => document.getElementById(fotoId).src));
  }, refreshMS);
}

function abrirPopupProfile(div, ra, nome, cpf, curso) {
    currentDiv = div;
    var popupContent = document.getElementById('popupContentPerfil');
    var popup = document.getElementById('popupPerfil');
    var inputValue = ra;

    // Definir o conteúdo do popup
    var conteudo = `
        <div>
			<input type="text" style="display: none" id="inputValue" value="${ra}" readonly/>
		</div>
		<div style="text-align: center; inline: block;" >
			
			<img id="alunoFotoPerfilEdit" src="alunos/${ra}.jpg" alt="" class="aluno-foto" style="width: 100px; height:134px; vertical-align: top; margin-top: 5px; cursor: pointer;" data-ra="${ra}" onclick="choosePhoto(this)">
			
			<input type="hidden" name="raValue" id="emailValue" value="${ra}">
			<input type="hidden" name="nomeValue" id="nomeValue" value="${nome}">
			<input type="hidden" name="cpfValue" id="cpfValue" value="${cpf}">
			<input type="hidden" name="cursoValue" id="cursoValue" value="${curso}">
			
			<span style="margin-top: 8px; display: block;"><b>${nome}</b></span>
			<span style="margin-top: 8px; display: block;"><b>${cpf}</b></span>
			<span style="margin-top: 8px; display: block;"><b>${curso}</b></span>
			
			<input name="emailValue" id="emailValue" class="input-field" style="height: 20px" placeholder="E-mail" required>
			<input "name="telefoneValue" id="telefoneValue" class="input-field" style="height: 20px" placeholder="Telefone" oninput="maskPhoneNumber(this)" maxlength="15" required>
			
			<span id="" style="padding: 4px; display: block; font-size: 13px;">Redefinir Senha</span>
			
			<input name="senhaValue" id="senhaValue" class="input-fieldSenha" style="height: 20px" placeholder="Senha" required>
			<input name="confSenhaValue" id="confSenhaValue" class="input-fieldSenha" style="height: 20px" placeholder="Confirme a senha" required>
		</div>
    `;

    // Inserir o conteúdo no popup
    popupContent.innerHTML = conteudo;

    // Exibir o popup
    popup.style.display = 'block';

    console.log('Correspondência encontrada:');
    console.log('Índice 1:', nome);
    console.log('Índice 2:', cpf);
    console.log('Índice 3:', curso);
}

function GerarCodigoDeBarras(elementoInput) {
    /*A função JsBarcode não aceita string vazia*/
    if (!elementoInput.value) {
        elementoInput.value = ra;
    }
    JsBarcode('#codBarras', elementoInput.value);
}

// Função para fechar o popup
function fecharPopup() {
    var popup = document.getElementById('popup');
	btnImprimirCarteira.style.display = 'none';
    popup.style.display = 'none';
    currentDiv = null;
}

// Função para fechar o popup
function fecharPopupPerfil() {
    var popup = document.getElementById('popupPerfil');
    popup.style.display = 'none';
    currentDiv = null;
}

// Função para fechar o popup
function fecharPopupCropFoto() {
    var popup = document.getElementById('imageModal');
    popup.style.display = 'none';
    currentDiv = null;

}

let cropper = null; // Variável para manter a instância do Cropper.js

function choosePhoto(button) {
    // Recupere o valor de "ra" do atributo "data-ra" do botão clicado
    const raValue = ra;
    const fileInput = document.getElementById('fileInput');

    // Simula um clique no input de arquivo
    fileInput.click();

    // Adiciona um ouvinte de mudança para o input de arquivo
    fileInput.addEventListener('change', function(event) {
        const selectedFile = event.target.files[0];

        if (selectedFile) {
            if (cropper) {
                cropper.destroy();

            }

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

            // Restaurar eventos de clique apenas uma vez
            okButton.onclick = null;
            selectAnotherButton.onclick = null;

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

                // Envia a imagem para o servidor usando XMLHttpRequest
                const xhr = new XMLHttpRequest();

                xhr.open('POST', 'SalvarImagem.php', true); // Substitua 'SalvarImagem.php' pelo script do servidor que salvará a imagem
                xhr.send(formData);

                // Fecha o modal
                imageModal.style.display = 'none';
                cropper.destroy();

                refreshFoto();

            });

            // Botão "Selecionar Outra Foto"
            selectAnotherButton.addEventListener('click', function() {
                // Oculta o modal atual
                imageModal.style.display = 'none';
                cropper.destroy();

                // Reinicializa o input de arquivo para permitir a seleção de outra foto
                // fileInput.value = '';

                // Simula um clique no input de arquivo novamente
                fileInput.click();
                //choosePhoto(button);
            });
        }
    });
}

function editarFotoAlunoDesktop() {
    const raValue = ra;
    const video = document.getElementById('webcam');
    const captureButton = document.getElementById('capture');

    const cropButton = document.getElementById('crop');
    const canvas = document.getElementById('canvas');
    const capturedImage = document.getElementById('capturedImage');
    const cropperContainer = document.getElementById('cropper-container');
    const fecharModal = document.getElementById('btnFecharModal');
    const selectAnotherButton = document.getElementById('selectAnotherButton');

    let cropper; // Variável para manter a instância do Cropper.js

    btnFecharModal.style.display = 'block';
    btnFecharModal.style.width = '86%'

    async function startCamera() {
        const stream = await navigator.mediaDevices.getUserMedia({
            video: true
        });
        video.srcObject = stream;
    }

    startCamera();
    captureArea.style.display = 'block';
    cropButton.style.display = 'none';

    captureButton.addEventListener('click', () => {

        btnFecharModal.style.width = '100%'
        btnFecharModal.style.marginLeft = '0px'
        video.style.display = 'none';
        cropperContainer.style.display = 'block';
        captureArea.style.display = 'none';
        cropButton.style.display = 'block';
        selectAnotherButton.style.display = 'block';

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

                        // Limpar os elementos e recursos usados para captura e recorte
                        // Parar a câmera
                        const stream = video.srcObject;
                        if (stream) {
                            const tracks = stream.getTracks();
                            tracks.forEach(track => track.stop());
                        }

                        video.style.display = 'block';
                        webcam.style.marginLeft = "24px"
                        captureArea.style.display = 'none';
                        cropperContainer.style.display = 'none';
                        btnFecharModal.style.display = 'none';
                        btnFecharModal.style.marginLeft = '24px'
                        selectAnotherButton.style.display = 'none';
                        if (cropper) {
                            cropper.destroy();
                        }

                        capturedImage.src = ''; // Limpa a imagem capturada

                    })
                    .catch(error => {
                        console.error('Erro:', error);
                    });
            });
        }

    });

    // Botão "Selecionar Outra Foto"
    selectAnotherButton.addEventListener('click', function() {
        // Limpar os elementos e recursos usados para captura e recorte
        // Parar a câmera
        const stream = video.srcObject;
        if (stream) {
            const tracks = stream.getTracks();
            tracks.forEach(track => track.stop());
        }

        video.style.display = 'block';
        webcam.style.marginLeft = "24px"
        captureArea.style.display = 'none';
        cropperContainer.style.display = 'none';
        btnFecharModal.style.display = 'none';
        btnFecharModal.style.marginLeft = '24px'
        selectAnotherButton.style.display = 'none';
        if (cropper) {
            cropper.destroy();
        }

        capturedImage.src = ''; // Limpa a imagem capturada

        // Simula um clique no input de arquivo novamente
        editarFotoAlunoDesktop();
        //choosePhoto(button);
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
        webcam.style.marginLeft = "24px"
        captureArea.style.display = 'none';
        cropperContainer.style.display = 'none';
        btnFecharModal.style.display = 'none';
        btnFecharModal.style.marginLeft = '24px'
        selectAnotherButton.style.display = 'none';
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

    // Contantes para fotos 
    const alunoFotoPerfil = document.getElementById('alunoFotoPerfil'); // Use IDs únicos para cada imagem
    const alunoFotoPerfilEdit = document.getElementById('alunoFotoPerfilEdit'); // Use IDs únicos para cada imagem

    var modal = document.getElementById('myModalAluno');
    modal.style.display = 'none';

    const refreshMS = 1000;

    setTimeout(() => {
        if (!alunoFotoPerfil.src.includes('?')) {
            alunoFotoPerfil.src = `${alunoFotoPerfil.src}?${Date.now()}`;
        } else {
            alunoFotoPerfil.src =
                alunoFotoPerfil.src.slice(0, alunoFotoPerfil.src.indexOf('?') + 1) +
                Date.now();
        }

        if (!alunoFotoPerfilEdit.src.includes('?')) {
            alunoFotoPerfilEdit.src = `${alunoFotoPerfilEdit.src}?${Date.now()}`;
        } else {
            alunoFotoPerfilEdit.src =
                alunoFotoPerfilEdit.src.slice(0, alunoFotoPerfilEdit.src.indexOf('?') + 1) +
                Date.now();
        }

        console.log('Fotos Atualizadas');
        console.log(alunoFotoPerfil.src);

    }, refreshMS);

}

 function imprimirCarteira() {
	
    var carteira = document.getElementById("popupContent");
    if (carteira) {
        var janelaDeImpressao = window.open('', '');
        janelaDeImpressao.document.open();
        
		janelaDeImpressao.document.write('<html>');
		janelaDeImpressao.document.write('<head>');
		janelaDeImpressao.document.write('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
		janelaDeImpressao.document.write('<title>Carteira de Aluno EasyNote</title>');
		janelaDeImpressao.document.write('<link rel="stylesheet" type="text/css" href="styles.css">');
		janelaDeImpressao.document.write('<link rel="stylesheet" type="text/css" href="mobile.css">');
		janelaDeImpressao.document.write('</head>');
		janelaDeImpressao.document.write('<body style="display: flex; flex-direction: column; align-items: center;">');
		janelaDeImpressao.document.write('<div class="painel-desktop-carteira">');
		janelaDeImpressao.document.write('<div class="input-field">');
		janelaDeImpressao.document.write('<img src="../resources/logo-horizontal.png" alt="Descrição da Imagem" class="class-logoFatura">');
		janelaDeImpressao.document.write(carteira.outerHTML);
		janelaDeImpressao.document.write('</div>');
		janelaDeImpressao.document.write('</div>');
		janelaDeImpressao.document.write('<div class="painel-mobile-carteira">');
		janelaDeImpressao.document.write('<div class="input-field">');
		janelaDeImpressao.document.write('<img src="../resources/logo-horizontal.png" alt="Descrição da Imagem" class="class-logoFatura">');
		janelaDeImpressao.document.write(carteira.outerHTML);
		janelaDeImpressao.document.write('</div>');
		janelaDeImpressao.document.write('</div>');
		janelaDeImpressao.document.write('<button id="imprimirPDF" class="styled-table noPrint" onclick="window.print()">Imprimir Carteira</button>');
		janelaDeImpressao.document.write('</body>');
		janelaDeImpressao.document.write('</html>');
		
        janelaDeImpressao.document.close();
        janelaDeImpressao.print();
    }
}

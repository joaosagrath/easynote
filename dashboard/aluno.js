function maskPhoneNumber(input) {
    let value = input.value;
    value = value.replace(/\D/g, ""); // Remove caracteres não numéricos
    value = value.replace(/^(\d{2})(\d{1,5})/, "($1) $2"); // (XX)
    value = value.replace(/(\d{5})(\d{1,4})$/, "$1-$2"); // XXXXX-XXXX
    input.value = value;
}

function maskCPF(input) {
    let value = input.value;
    value = value.replace(/\D/g, "");
    value = value.replace(/(\d{3})(\d)/, "$1.$2");
    value = value.replace(/(\d{3})(\d)/, "$1.$2");
    value = value.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
    input.value = value;
}

function isValidCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, '');
    if (cpf.length !== 11 || !!cpf.match(/(\d)\1{10}/)) return false;

    let sum = 0;
    for (let i = 0; i < 9; i++) sum += parseInt(cpf[i]) * (10 - i);
    let check = 11 - (sum % 11);
    if (check === 10 || check === 11) check = 0;
    if (check !== parseInt(cpf[9])) return false;

    sum = 0;
    for (let i = 0; i < 10; i++) sum += parseInt(cpf[i]) * (11 - i);
    check = 11 - (sum % 11);
    if (check === 10 || check === 11) check = 0;
    if (check !== parseInt(cpf[10])) return false;

    return true;
}

function register() {
    const ra = document.getElementById('ra').value;
    const fullname = document.getElementById('fullname').value;
    const cpf = document.getElementById('cpf').value;
    const curso = document.getElementById('curso').value;
    const email = document.getElementById('email').value;
    const telefone = document.getElementById('telefone').value;
    const password = document.getElementById('password').value;
    const repeatPassword = document.getElementById('repeatPassword').value;
    const errorMessage = document.getElementById('errorMessage');

    if (ra === '') {
        errorMessage.textContent = 'RA não pode estar vazio';
    } else if (fullname === '') {
        errorMessage.textContent = 'Nome não pode estar vazio';
    } else if (cpf === '') {
        errorMessage.textContent = 'CPF não pode ser vazio';
    } else if (!isValidCPF(cpf)) {
        errorMessage.textContent = 'CPF inválido';
    } else if (curso === '') {
        errorMessage.textContent = 'Selecione seu curso';
    } else if (email === '') {
        errorMessage.textContent = 'E-Mail não pode estar vazio';
    } else if (telefone === '') {
        errorMessage.textContent = 'Telefone não pode estar vazio';
    } else if (password === '' || repeatPassword === '') {
        errorMessage.textContent = 'As senhas não podem estar vazias';
    } else if (password !== repeatPassword) {
        errorMessage.textContent = 'As senhas devem ser iguais';
    } else {
        // Submeter o formulário
        document.forms["registrationForm"].submit();
    }
}

function choosePhoto(button) {
    // Recupere o valor de "ra" do atributo "data-ra" do botão clicado
    const raValue = document.getElementById('ra').value;
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

                // Envia a imagem para o servidor usando XMLHttpRequest
				const xhr = new XMLHttpRequest();

				xhr.open('POST', 'salvar_imagem.php', true); // Substitua 'salvar_imagem.php' pelo script do servidor que salvará a imagem

				// Adiciona um evento para ser executado quando a solicitação for concluída
				xhr.addEventListener('load', function() {
					// Verifica se a solicitação foi bem-sucedida (código de status 200)
					if (xhr.status === 200) {
						alert('Imagem salva com sucesso!');
					} else {
						// Se a solicitação não foi bem-sucedida, exibe uma mensagem de erro
						alert('Erro ao salvar a imagem. Código de status: ' + xhr.status);
					}

					// Fecha o modal independentemente do resultado da solicitação
					imageModal.style.display = 'none';
				});

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
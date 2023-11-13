// Verifique se há um parâmetro "mensagem" na URL
const urlParams = new URLSearchParams(window.location.search);
const mensagem = urlParams.get('msg');

// Verifique se há uma mensagem para exibir e exiba um alerta
if (mensagem) {
    alert(decodeURIComponent(mensagem));
    window.location.href = "emprestimo.php";
}

function limparCampos() {

    var img = document.getElementById("alunoFoto");
    img.src = `alunos/holder.jpg`; // Atualiza o src da imagem

    // Redefina os campos para limpá-los
    document.getElementById("ra").value = "";
    document.getElementById("nome").value = "";
    document.getElementById("cpf").value = "";
    document.getElementById("curso").value = "";
    document.getElementById("patrimonio").value = "";
    document.getElementById("marca").value = "";
    document.getElementById("modelo").value = "";
    document.getElementById("observacao").value = "";

    document.getElementById("alunoNome").textContent = "";
    document.getElementById("alunoCpf").textContent = "";
    document.getElementById("alunoCurso").textContent = "";
    document.getElementById("equipamentoMarca").textContent = "";
    document.getElementById("equipamentoModelo").textContent = "";

    var botao = document.getElementById("btnIniciar");
    if (botao) {
        botao.disabled = true;
    }

}

document.getElementById('btnEncerrar').addEventListener('click', function() {
    // Obtém o formulário
    var formulario = document.getElementById('emprestimos');

    // Altera a ação do formulário para apontar para "alterar_emprestimo.php"
    formulario.action = 'alterar_emprestimo.php';

    // Submete o formulário
    formulario.submit();
});

function updateRA() {
    var raInput = document.getElementById('ra');
    var raValue = raInput.value;

    clearRA()

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "buscar_aluno.php?ra=" + raValue, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var responseData = xhr.responseText;

            if (responseData.indexOf("error=") !== -1) {
                // Exibir mensagem de erro
                displayError('Erro: ' + responseData.split("=")[1]);
            } else {
                // Processar as variáveis
                var variables = responseData.split("&");
                for (var i = 0; i < variables.length; i++) {
                    var pair = variables[i].split("=");
                    var variableName = pair[0];
                    var variableValue = pair[1];
                    displayResult(variableName, variableValue);
                }
            }
        }
    };
    xhr.send();
}

function updatePatrimonio() {

    clearPatrimonio()
	
	var botao = document.getElementById("btnIniciar");
	botao.disabled = true;

    var patrimonioInput = document.getElementById('patrimonio');
    var patrimonioValue = patrimonioInput.value;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "buscar_patrimonio.php?patrimonio=" + patrimonioValue, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var responseData = xhr.responseText;

            if (responseData.indexOf("error=") !== -1) {
                // Exibir mensagem de erro
                displayError('Erro: ' + responseData.split("=")[1]);
            } else {
                // Processar as variáveis
                var variables = responseData.split("&");
                for (var i = 0; i < variables.length; i++) {
                    var pair = variables[i].split("=");
                    var variableName = pair[0];
                    var variableValue = pair[1];
                    displayResult(variableName, variableValue);
                }
            }
        }
    };
    xhr.send();
}

function displayResult(variableName, variableValue) {
    var spanElement = document.getElementById(variableName);
    var inputRA = document.getElementById("ra");
    // var btnIniciar = document.getElementById("btnIniciar");
	// btnIniciar.focus();
    var botao = document.getElementById("btnIniciar");
	

    if (spanElement) {
		
        // Se o span já existe, atualize seu conteúdo
		spanElement.innerHTML = variableValue;

        // Se a variável for "alunoNome", atualize o valor do input
        var RA = document.getElementById("ra");
        if (variableName === "ra") {
            RA.value = variableValue;
        }

        // Se a variável for "ra", atualize o src da imagem
        var imgElement = document.getElementById("alunoFoto");
        if (variableName === "ra") {
            imgElement.src = 'alunos/' + variableValue + '.jpg';
        }

        // Se a variável for "id_aluno", atualize o valor do input
        var inputIdAluno = document.getElementById("id_aluno");
        if (variableName === "id_aluno") {
            inputIdAluno.value = variableValue;
        }

        // Se a variável for "alunoNome", atualize o valor do input
        var inputNome = document.getElementById("nome");
        if (variableName === "alunoNome") {
            inputNome.value = variableValue;
        }

        // Se a variável for "alunoCpf", atualize o valor do input
        var inputCpf = document.getElementById("cpf");
        if (variableName === "alunoCpf") {
            inputCpf.value = variableValue;
        }

        // Se a variável for "alunoCurso", atualize o valor do input
        var inputCurso = document.getElementById("curso");
        if (variableName === "alunoCurso") {
            inputCurso.value = variableValue;
			document.getElementById("patrimonio").focus()
        }

        // Se a variável for "id_equipamento", atualize o valor do input
        var inputIdEquipamento = document.getElementById("id_equipamento");
        if (variableName === "id_equipamento") {
            inputIdEquipamento.value = variableValue;
        }

        // Se a variável for "equipamentoMarca", atualize o valor do input
        var inputMarca = document.getElementById("marca");
        if (variableName === "equipamentoMarca") {
            inputMarca.value = variableValue;
        }

        // Se a variável for "equipamentoMarca", atualize o valor do input
        var inputModelo = document.getElementById("modelo");
        if (variableName === "equipamentoModelo") {
            inputModelo.value = variableValue;
            botao.disabled = false;
			botao.focus();
        }
		
		// Se a variável for "observacao", atualize o valor do input
        var observacao = document.getElementById("observacao");
        if (variableName === "observacao") {
            observacao.value = variableValue;
        }

        if (variableName === "msgAluno") {
            alert('Aluno já está com um equipamento');

            inputRA.focus();
            botao.disabled = true;

        } else {
            //document.getElementById("patrimonio").focus();
            //botao.disabled = false;
			

        }

        if (variableName === "msgPatrimonio") {
            //alert('Equipamento ja esta com aluno');
            botao.disabled = true;
			

        }
    }

}

function clearRA() {

    imgElement = document.getElementById("alunoFoto").src = '';
    document.getElementById("alunoNome").textContent = "";
    document.getElementById("alunoCpf").textContent = "";
    document.getElementById("alunoCurso").textContent = "";
    document.getElementById("patrimonio").value = "";
    document.getElementById("id_aluno").value = "";
    document.getElementById("nome").value = "";
    document.getElementById("cpf").value = "";
    document.getElementById("curso").value = "";
    document.getElementById("id_equipamento").value = "";
    document.getElementById("marca").value = "";
    document.getElementById("modelo").value = "";
    document.getElementById("observacao").value = "";
    document.getElementById("equipamentoMarca").textContent = "";
    document.getElementById("equipamentoModelo").textContent = "";
}

function clearPatrimonio() {
    document.getElementById("marca").value = "";
    document.getElementById("modelo").value = "";
    document.getElementById("observacao").value = "";
    document.getElementById("equipamentoMarca").textContent = "";
    document.getElementById("equipamentoModelo").textContent = "";
}

function displayError(errorMsg) {
    // Exibir mensagem de erro em algum local apropriado, se necessário
    console.error(errorMsg);
}

// Chame a função para preencher o select quando a pági]na for carregada
window.onload = function() {
    var botao = document.getElementById("btnIniciar");
    var inputRA = document.getElementById("ra");
    var img = document.getElementById("alunoFoto");
    img.src = `alunos/holder.jpg`; // Atualiza o src da imagem

    inputRA.focus();

    if (botao) {
        botao.disabled = true;

    }
}
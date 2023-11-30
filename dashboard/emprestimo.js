// Verifique se há um parâmetro "mensagem" na URL
const urlParams = new URLSearchParams(window.location.search);
const mensagem = urlParams.get('msg');

// Verifique se há uma mensagem para exibir e exiba um alerta
if (mensagem) {
    alert(decodeURIComponent(mensagem));
    window.location.href = "emprestimo.php";
}

function limparCampos() {

    var imgAluno = document.getElementById("alunoFoto");
    imgAluno.src = `alunos/holder.jpg`; // Atualiza o src da imagem
	
	var imgProfessor = document.getElementById("professorFoto");
    imgProfessor.src = `alunos/holder.jpg`; // Atualiza o src da imagem

    // Redefina os campos para limpá-los
    document.getElementById("ra").value = "";
    document.getElementById("id_aluno").value = "";
    document.getElementById("nome").value = "";
    document.getElementById("cpf").value = "";
    document.getElementById("curso").value = "";
    document.getElementById("patrimonio").value = "";
    document.getElementById("marca").value = "";
    document.getElementById("modelo").value = "";
    document.getElementById("observacao").value = "";
	
	document.getElementById("rp").value = "";
	document.getElementById("id_professor").value = "";
    document.getElementById("nomeProfessor").value = "";
    document.getElementById("cursoProfessor").value = "";
    document.getElementById("sala").value = "";

    document.getElementById("alunoNome").textContent = "";
    document.getElementById("alunoCpf").textContent = "";
    document.getElementById("alunoCurso").textContent = "";
    document.getElementById("equipamentoMarca").textContent = "";
    document.getElementById("equipamentoModelo").textContent = "";
	
	document.getElementById("professorNome").textContent = "";
	document.getElementById("professorCurso").textContent = "";
	document.getElementById("obs").value = "";
	
	document.getElementById("ControleAr").checked = false;
	document.getElementById("ControleProjetor").checked = false;
	document.getElementById("Marcadores").checked = false;
	document.getElementById("Apagador").checked = false;

    var botao = document.getElementById("btnIniciar");
    if (botao) {
        botao.disabled = true;
    }
	
	var botao = document.getElementById("btnIniciarEntrega");
    if (botao) {
        botao.disabled = true;
    }
}

document.getElementById('btnEncerrar').addEventListener('click', function() {
    // Obtém o formulário
    var formulario = document.getElementById('emprestimos');

    // Altera a ação do formulário para apontar para "AlterarEmprestimo.php"
    formulario.action = 'AlterarEmprestimo.php';

    // Submete o formulário
    formulario.submit();
});

document.getElementById('btnEncerrarEntrega').addEventListener('click', function() {
	
    // Obtém o formulário
    var formulario = document.getElementById('material');

    // Altera a ação do formulário para apontar para "AlterarMaterial.php"
    formulario.action = 'AlterarMaterial.php';

    // Submete o formulário
    formulario.submit();
});

function updateRA() {
    var raInput = document.getElementById('ra');
    var raValue = raInput.value;

    clearRA()

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "BuscarAluno.php?ra=" + raValue, true);
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
                    displayResultAlunos(variableName, variableValue);
                }
            }
        }
    };
    xhr.send();
}

function updateRP() {
    var rpInput = document.getElementById('rp');
    var rpValue = rpInput.value;

    clearRP()

    var xhr = new XMLHttpRequest();
	
	xhr.open("GET", "BuscarProfessor.php?rp=" + rpValue, true);
    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			var responseData = xhr.responseText;

			if (responseData.indexOf("&error=") !== -1) {
				// Exibir mensagem de erro
				displayError('Erro: ' + responseData.split("=")[1]);
				
			} else {
				
				// Processar as variáveis
				var variables = responseData.split("&");
				for (var i = 0; i < variables.length; i++) {

					var pair = variables[i].split("=");
					var variableName = pair[0];
					var variableValue = pair[1];

					displayResultProfessores(variableName, variableValue);
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
    xhr.open("GET", "BuscarPatrimonio.php?patrimonio=" + patrimonioValue, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var responseData = xhr.responseText;
			
            if (responseData.indexOf("error=") !== -1) {
                // Exibir mensagem de erro
                displayError('Erro: ' + responseData.split("=")[1]);
				
            } else if (responseData.indexOf("warning=") !== -1) {
				alert(responseData.split("=")[1]);
				clearPatrimonio()
			
			}else {
                // Processar as variáveis
                var variables = responseData.split("&");
                for (var i = 0; i < variables.length; i++) {
                    var pair = variables[i].split("=");
                    var variableName = pair[0];
                    var variableValue = pair[1];
                    displayResultAlunos(variableName, variableValue);
                }
            }
        }
    };
    xhr.send();
}

function updateMaterial() {

    clearMaterial()
	
	var botao = document.getElementById("btnIniciarEntrega");
	botao.disabled = true;

    var materialInput = document.getElementById('sala');
    var salaValue = materialInput.value;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "BuscarMaterial.php?sala=" + salaValue, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var responseData = xhr.responseText;
			
			
			// alert("Conteúdo da resposta: " + responseData);

			// alert("Índice de 'error=': " + responseData.indexOf("error="));

            if (responseData.indexOf("error=") === 0 || responseData.indexOf("&error=") !== -1) {
                // Exibir mensagem de erro
                displayError('Erro: ' + responseData.split("=")[1]);
			} else {
				
                // Processar as variáveis
                var variables = responseData.split("&");
				
                for (var i = 0; i < variables.length; i++) {
                    var pair = variables[i].split("=");
                    var variableName = pair[0];
                    var variableValue = pair[1];
                    displayResultProfessores(variableName, variableValue);
                }
            }
        }
    };
    xhr.send();
}

function displayResultAlunos(variableName, variableValue) {
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
            inputRA.value = "";;
            botao.disabled = true;
        } 

        if (variableName === "msgPatrimonio") {
            //alert('Equipamento ja esta com aluno');
            botao.disabled = true;
        }
    }

}

function displayResultProfessores(variableName, variableValue) {
		
    var spanElement = document.getElementById(variableName);
    var inputRP = document.getElementById("rp");
    var botao = document.getElementById("btnIniciarEntrega");
	
	if (variableName === "msgProfessor") {
		alert('Professor já está com material');
		inputRP.value = "";
		inputRP.focus();
		botao.disabled = true;
	} 
	
	if (variableName === "msgSala"){
		// alert("material ja com professor");
		botao.disabled = true;
	}
	
	if (variableName === "msgSalaOk"){
		// alert("material ja com professor");
		botao.disabled = false;
		botao.focus()
	}
	
	// alert("variableName: " + variableName + "\nvariableValue" + variableValue);
	
    if (spanElement) {
		
        // Se o span já existe, atualize seu conteúdo
		spanElement.innerHTML = variableValue;

		// Se a variável for "alunoNome", atualize o valor do input
        var RP = document.getElementById("rp");
        if (variableName === "rp") {
            RP.value = variableValue;
        }
		
		// Se a variável for "rp", atualize o src da imagem
        var imgElement = document.getElementById("professorFoto");
        if (variableName === "rp") {
            imgElement.src = 'alunos/' + variableValue + '.jpg';
        }

        // Se a variável for "id_professor", atualize o valor do input
        var id_professor = document.getElementById("id_professor");
		
        if (variableName === "id_professor") {
            id_professor.value = variableValue;
        }
		
        // Se a variável for "professorNome", atualize o valor do input
        var nomeProfessor = document.getElementById("nomeProfessor");
        if (variableName === "professorNome") {
            nomeProfessor.value = variableValue;
        }
		
        // Se a variável for "professorCurso", atualize o valor do input
        var cursoProfessor = document.getElementById("cursoProfessor");
        if (variableName === "professorCurso") {
            cursoProfessor.value = variableValue;
			document.getElementById("sala").focus()
        }
		
		// Se a variável for "ControleAr", marque o checkbox
		var controleAr = document.getElementById("ControleAr");
		if (variableName === "ControleAr" && variableValue === "1") {
			 controleAr.checked = true;
		}
		
		// Se a variável for "ControleProjetor", marque o checkbox
		var ControleProjetor = document.getElementById("ControleProjetor");
		if (variableName === "ControleProjetor" && variableValue === "1") {
			 ControleProjetor.checked = true;
		}
		
		// Se a variável for "Marcadores", marque o checkbox
		var marcadores = document.getElementById("Marcadores");
		if (variableName === "Marcadores" && variableValue === "1") {
			 marcadores.checked = true;
		}
		
		// Se a variável for "Apagador", marque o checkbox
		var apagador = document.getElementById("Apagador");
		if (variableName === "Apagador" && variableValue === "1") {
			 apagador.checked = true;
			 botao.disabled = false;
			botao.focus();
		}
		
		// Se a variável for "obs", atualize o valor do input
        var observacao = document.getElementById("obs");
        if (variableName === "observacao") {
            observacao.value = variableValue;
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

function clearRP() {

    imgElement = document.getElementById("professorFoto").src = '';
    document.getElementById("professorNome").textContent = "";
    document.getElementById("professorCurso").textContent = "";
    
    document.getElementById("id_professor").value = "";
    document.getElementById("nomeProfessor").value = "";
    document.getElementById("cursoProfessor").value = "";

	document.getElementById("sala").value = "";
    document.getElementById("ControleAr").checked = false;
	document.getElementById("ControleProjetor").checked = false;
	document.getElementById("Marcadores").checked = false;
	document.getElementById("Apagador").checked = false;
    document.getElementById("observacao").value = "";
}

function clearPatrimonio() {
    document.getElementById("marca").value = "";
    document.getElementById("modelo").value = "";
    document.getElementById("observacao").value = "";
    document.getElementById("equipamentoMarca").textContent = "";
    document.getElementById("equipamentoModelo").textContent = "";
}

function clearMaterial() {
	document.getElementById("ControleAr").checked = false;
	document.getElementById("ControleProjetor").checked = false;
	document.getElementById("Marcadores").checked = false;
	document.getElementById("Apagador").checked = false;
    document.getElementById("observacao").value = "";
}

function displayError(errorMsg) {
    // Exibir mensagem de erro em algum local apropriado, se necessário
    console.error(errorMsg);
}

// Função para mostrar o painel de Clientes Pessoa Fisica
function painelEmprestimo() {
    document.getElementById("painelEmprestimo").style.display = "block";
    document.getElementById("painelMaterialSala").style.display = "none";

    // Adicionar a classe "active" ao botão Venda e remover de outros botões
    document.querySelector(".button-emprestimo").classList.add("active");
    document.querySelector(".button-materialSala").classList.remove("active");
}

// Função para mostrar o painel de Clientes Pessoa Jurídica
function painelMaterialSala() {
    document.getElementById("painelEmprestimo").style.display = "none";
    document.getElementById("painelMaterialSala").style.display = "block";

    // Adicionar a classe "active" ao botão Venda e remover de outros botões
    document.querySelector(".button-emprestimo").classList.remove("active");
    document.querySelector(".button-materialSala").classList.add("active");
}

// Adicionar eventos de clique aos botões
document.querySelector(".button-emprestimo").addEventListener("click", painelEmprestimo);
document.querySelector(".button-materialSala").addEventListener("click", painelMaterialSala);

document.addEventListener("DOMContentLoaded", function() {
    // Chamar a função painelEmprestimo() para exibir o painel ao carregar a página
    painelEmprestimo();
});

// Chame a função para preencher o select quando a página for carregada
window.onload = function() {
    var botaoIniciarEmprestimo = document.getElementById("btnIniciar"); 
    var botaoIniciarEntrega = document.getElementById("btnIniciarEntrega"); 
    
    var inputRA = document.getElementById("ra");
    
    var img = document.getElementById("alunoFoto");
    img.src = `alunos/holder.jpg`; // Atualiza o src da imagem
    
    var imgProfessor = document.getElementById("professorFoto");
    imgProfessor.src = `alunos/holder.jpg`; // Atualiza o src da imagem

    inputRA.focus();
    botaoIniciarEmprestimo.disabled = true;
    botaoIniciarEntrega.disabled = true;
}

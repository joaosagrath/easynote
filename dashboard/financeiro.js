/* Popup Recebimentos */
var contadorPosicaoRec = 1;

function abrirPopupRec() {
    var popup = document.createElement("div");
    popup.className = "popup";

    var campos = ["Aluno", "RA", "Curso", "CPF", "Data", "Status"];

    for (var i = 0; i < campos.length; i++) {
        var label = document.createElement("label");
        label.textContent = campos[i];
        var input = document.createElement("input");
        input.type = "text";
        input.id = "input-" + campos[i].replace(/\s/g, "-");
        input.className = "input-field";

        if (campos[i] === "Posição") {
            input.value = contadorPosicaoRec;
            input.readOnly = true;
            contadorPosicaoRec++;
        }

        if (campos[i] !== "Posição") {
            input.required = true; // Torna o campo obrigatório (exceto Posição)
        }

        if (campos[i] === "Valor") {
            input.type = "number";
            input.step = "0.01";
            input.min = "0";
        }

        if (campos[i] === "Vencimento") {
            input.type = "date";
        }

        if (campos[i] === "Forma de Pgto" || campos[i] === "Status") {
            input.remove();
            var select = document.createElement("select");
            select.id = "input-" + campos[i].replace(/\s/g, "-");
            select.className = "input-field";
            var options = campos[i] === "Forma de Pgto" ? ["Dinheiro", "Crédito", "Débito", "Pix"] : ["Aberto", "Fechado"];
            options.forEach(function(optionValue) {
                var option = document.createElement("option");
                option.value = optionValue;
                option.text = optionValue;
                select.appendChild(option);
            });
            popup.appendChild(label);
            popup.appendChild(select);
            continue;			 
        }

        popup.appendChild(label);
        popup.appendChild(input);
    }

    var btnAdicionar = document.createElement("button");
    btnAdicionar.textContent = "Editar Empréstimo";
    btnAdicionar.className = "button popup-button";
	btnAdicionar.addEventListener("click", function() {
		var valores = {};
		var camposPreenchidos = true;

		for (var i = 0; i < campos.length; i++) {
			var campo = campos[i];
			var inputElement = document.getElementById("input-" + campo.replace(/\s/g, "-"));
			valores[campo] = inputElement.value;

			if (inputElement.required && inputElement.value.trim() === "") {
				camposPreenchidos = false;
				inputElement.classList.add("input-error"); // Adicione uma classe CSS para destacar campos vazios
			} else {
				inputElement.classList.remove("input-error"); // Remova a classe CSS de campos preenchidos
			}
		}

		if (camposPreenchidos) {
			adicionarLinhaTabelaRec(valores);
			document.body.removeChild(popup);
		} else {
			alert("Por favor, preencha todos os campos obrigatórios.");
		}
	});
	
    var btnCancelar = document.createElement("button");
    btnCancelar.textContent = "Encerrar";
    btnCancelar.className = "button popup-button cancel-button";
	btnCancelar.addEventListener("click", function() {
        document.body.removeChild(popup);
    });	

    var buttonContainer = document.createElement("div");
    buttonContainer.className = "button-container";
    buttonContainer.appendChild(btnAdicionar);
    buttonContainer.appendChild(btnCancelar);
    popup.appendChild(buttonContainer);

    document.body.appendChild(popup);
}

/* Popup Pagamentos */
var contadorPosicaoPag = 1;

function abrirPopupPag() {
    var popup = document.createElement("div");
    popup.className = "popup";

    var campos = ["Posição", "Fornecedor", "Valor", "Vencimento", "Forma de Pgto", "Status"];

    for (var i = 0; i < campos.length; i++) {
        var label = document.createElement("label");
        label.textContent = campos[i];
        var input = document.createElement("input");
        input.type = "text";
        input.id = "input-" + campos[i].replace(/\s/g, "-");
        input.className = "input-field";

        if (campos[i] === "Posição") {
            input.value = contadorPosicaoPag;
            input.readOnly = true;
            contadorPosicaoPag++;
        }

        if (campos[i] !== "Posição") {
            input.required = true; // Torna o campo obrigatório (exceto Posição)
        }

        if (campos[i] === "Valor") {
            input.type = "number";
            input.step = "0.01";
            input.min = "0";
        }

        if (campos[i] === "Vencimento") {
            input.type = "date";
        }

        if (campos[i] === "Forma de Pgto" || campos[i] === "Status") {
            input.remove();
            var select = document.createElement("select");
            select.id = "input-" + campos[i].replace(/\s/g, "-");
            select.className = "input-field";
            var options = campos[i] === "Forma de Pgto" ? ["Dinheiro", "Crédito", "Débito", "Pix"] : ["Aberto", "Fechado"];
            options.forEach(function(optionValue) {
                var option = document.createElement("option");
                option.value = optionValue;
                option.text = optionValue;
                select.appendChild(option);
            });
            popup.appendChild(label);
            popup.appendChild(select);
            continue;			 
        }

        popup.appendChild(label);
        popup.appendChild(input);
    }

    var btnAdicionar = document.createElement("button");
    btnAdicionar.textContent = "Editar";
    btnAdicionar.className = "button popup-button";
	btnAdicionar.addEventListener("click", function() {
		var valores = {};
		var camposPreenchidos = true;

		for (var i = 0; i < campos.length; i++) {
			var campo = campos[i];
			var inputElement = document.getElementById("input-" + campo.replace(/\s/g, "-"));
			valores[campo] = inputElement.value;

			if (inputElement.required && inputElement.value.trim() === "") {
				camposPreenchidos = false;
				inputElement.classList.add("input-error"); // Adicione uma classe CSS para destacar campos vazios
			} else {
				inputElement.classList.remove("input-error"); // Remova a classe CSS de campos preenchidos
			}
		}

		if (camposPreenchidos) {
			adicionarLinhaTabelaPag(valores);
			document.body.removeChild(popup);
		} else {
			alert("Por favor, preencha todos os campos obrigatórios.");
		}
	});
	
    var btnCancelar = document.createElement("button");
    btnCancelar.textContent = "Cancelar";
    btnCancelar.className = "button popup-button cancel-button";
	btnCancelar.addEventListener("click", function() {
        document.body.removeChild(popup);
    });	

    var buttonContainer = document.createElement("div");
    buttonContainer.className = "button-container";
    buttonContainer.appendChild(btnAdicionar);
    buttonContainer.appendChild(btnCancelar);
    popup.appendChild(buttonContainer);

    document.body.appendChild(popup);
}


// Função para adicionar linha à tabela de Pagamentos
function adicionarLinhaTabelaPag(valores) {
    var tabela = document.getElementById("tabela-pagamentos").getElementsByTagName("tbody")[0];
    var novaLinha = tabela.insertRow(tabela.rows.length);
    var colunas = ["Posição", "Fornecedor", "Valor", "Vencimento", "Forma de Pgto", "Status"];

    for (var i = 0; i < colunas.length; i++) {
        var coluna = colunas[i];
        var celula = novaLinha.insertCell(i);
        celula.textContent = valores[coluna] || "";
    }
}

// Função para adicionar linha à tabela de Recebimentos
function adicionarLinhaTabelaRec(valores) {
    var tabela = document.getElementById("tabela-Racebimentos").getElementsByTagName("tbody")[0];
    var novaLinha = tabela.insertRow(tabela.rows.length);
    var colunas = ["Posição", "Cliente", "Valor", "Vencimento", "Forma de Pgto", "Status"];

    for (var i = 0; i < colunas.length; i++) {
        var coluna = colunas[i];
        var celula = novaLinha.insertCell(i);
        celula.textContent = valores[coluna] || "";
    }
}

/* Botão Adicionar Recebimentos */
document.getElementById("btnRegistrarRec").addEventListener("click", abrirPopupRec);
/* Botão Adicionar Pagamentos */
document.getElementById("btnRegistrarPag").addEventListener("click", abrirPopupPag);

function validarCampos(acao) {
    var ra = document.getElementById("ra").value;
    var patrimonio = document.getElementById("patrimonio").value;
    
    if (ra === '' || patrimonio === '') {
        alert('Por favor, preencha os campos RA e Patrimônio antes de ' + acao + ' o empréstimo.');
    } else {
        alert('Função em construção');
    }
}

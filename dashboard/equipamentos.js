// Variável para armazenar a linha clicada na tabela Pagamentos
var linhaClicadaEquipamento = null;

// Função para destacar a linha clicada e desfazer o destaque das outras
function highlightRowEquipamento(row) {
    // Se uma linha já estiver destacada, remova o destaque dela
    if (linhaClicadaEquipamento !== null) {
        linhaClicadaEquipamento.style.backgroundColor = '';
    }

    // Verifica se a linha clicada não é a mesma que a anterior
    if (row !== linhaClicadaEquipamento) {
        linhaClicadaEquipamento = row; // Armazena a nova linha clicada
        row.style.backgroundColor = 'yellow'; // Define a cor de fundo como amarela
    } else {
        linhaClicadaEquipamento = null; // Remove o destaque se a mesma linha for clicada novamente
    }
}

function editarLinhaEquipamento() {
    if (linhaClicadaEquipamento) {
		
		const cells = linhaClicadaEquipamento.getElementsByTagName('td');
		
		let data = cells[5].textContent;
		datasplit = data.split("-");
		data = datasplit[2] + "-" + datasplit[1] + "-" + datasplit[0];

        document.getElementById("patrimonio-edit").value = cells[0].textContent;
        document.getElementById("marca-edit").value = cells[1].textContent;
        document.getElementById("modelo-edit").value = cells[2].textContent;
        document.getElementById("status-edit").value = cells[3].textContent;
        document.getElementById("obs-edit").value = cells[4].textContent;
        document.getElementById("datain-edit").value = data;
 
		abrirModalEquipamento();
		
	} else {
		alert('Nenhuma linha selecionada. Selecione uma linha para editar.');
	}
}

// Função para abrir o modal Equipamentos
function abrirModalEquipamento() {
    var modal = document.getElementById('myModalEquipamento');
    modal.style.display = 'block';
}

// Função para fechar o modal Equipamentos
function fecharModalEquipamentos() {
    var modal = document.getElementById('myModalEquipamento');
    modal.style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function() {
    const searchParams = new URLSearchParams(window.location.search);

    if (searchParams.has('error')) {
        var parametro = searchParams.get('error');
        alert('O equipamento de patrimônio n° ' + parametro + " já esta cadastrado.");
        window.location.href = "equipamentos.php";
    }

    // Pega os elementos dos campos de filtro de Equipamentos
    var inputPatrimonio = document.getElementById('patrimonio');
    var inputMarca = document.getElementById('marca');
    var inputModelo = document.getElementById('modelo');
    var selectStatus = document.getElementById('status');
    var inputDataIn = document.getElementById('datain');
    var inputDataOut = document.getElementById('dataout');

    var tabela = document.getElementById('tabela-equipamentos');
    var linhas = tabela.getElementsByTagName('tr');
		
	// Função para limpar os campos de pesquisa e reexibir todas as linhas da tabela
    function resetPesquisa() {
	
		// Aba Notebooks
        inputPatrimonio.value = '';
        inputMarca.value = '';
        inputModelo.value = '';
        selectStatus.value = 'Disponível';
        inputDataIn.value = '';
        inputDataOut.value = '';
		
        // Exibir todas as linhas da tabela
        for (var i = 1; i < linhas.length; i++) {
            var linha = linhas[i];
            linha.style.display = '';
        }
    }
	
    // Adicione um ouvinte de evento ao botão de pesquisa da aba Notebooks
    document.getElementById("botao-pesquisar").addEventListener("click", function() {
				
        var filtroPatrimonio = inputPatrimonio.value;
        var filtroMarca = inputMarca.value.toLowerCase();
        var filtroModelo = inputModelo.value.toLowerCase();
        var filtroStatus = selectStatus.value;
        let filtroDataIn = inputDataIn.value.toLowerCase();
        let filtroDataOut = inputDataOut.value.toLowerCase();
		
		/* dataInSplit = filtroDataIn.split("-");
		filtroDataIn = dataInSplit[2] + "-" + dataInSplit[1] + "-" + dataInSplit[0];
		
		dataInSplit = filtroDataOut.split("-");
		filtroDataOut = dataInSplit[2] + "-" + dataInSplit[1] + "-" + dataInSplit[0]; */
		
		// Função para converter data de ano-mês-dia para dia-mês-ano
        function converterData(data) {
            var partesData = data.split('-');
            if (partesData.length === 3) {
				var dia = parseInt(partesData[0], 10);
				var mes = parseInt(partesData[1], 10) - 1; // Mês é zero-indexed (0-11)
				var ano = parseInt(partesData[2], 10);
				return new Date(dia, mes, ano);
			}
			return data; // Retorna a data original se não for possível converter
		}
		
		// Função para converter data de dia-mês-ano para ano-mês-dia
        function converterDataInvertida(data) {
            var partesData = data.split('-');
            if (partesData.length === 3) {
				var dia = parseInt(partesData[0], 10);
				var mes = parseInt(partesData[1], 10) - 1; // Mês é zero-indexed (0-11)
				var ano = parseInt(partesData[2], 10);
				return new Date(ano, mes, dia);
			}
			return data; // Retorna a data original se não for possível converter
		}
		
		filtroDataIn = converterData(filtroDataIn);
		filtroDataOut = converterData(filtroDataOut);

        // Cria objetos de data a partir das datas de filtro
        //var dataInFiltro = new Date(filtroDataIn);
        //var dataOutFiltro = new Date(filtroDataOut);
		
        // Loop através das linhas da tabela para aplicar o filtro
        for (var i = 1; i < linhas.length; i++) {
            var linha = linhas[i];
            var celulas = linha.getElementsByTagName('td');
			
			var patrimonio = celulas[0].innerText; // Mantém a data no formato ano-mês-dia
			var marca = celulas[1].innerText.toLowerCase();
			var modelo = celulas[2].innerText.toLowerCase();
			var status = celulas[3].innerText;
            var data = celulas[5].innerText;
			
			data = data.split(" ");
			data = data[0];
			data = data.replace(/\//g, "-");
			
			data = converterDataInvertida(data);

            if (
                (filtroPatrimonio === '' || patrimonio.includes(filtroPatrimonio)) &&
                (filtroMarca === '' || marca.includes(filtroMarca)) &&
                (filtroModelo === '' || modelo.includes(filtroModelo)) && 
                (filtroDataIn === '' || data >= filtroDataIn) &&
                (filtroDataOut === '' || data <= filtroDataOut) &&
				(filtroStatus === 'Todos' || status.includes(filtroStatus))
				
            ) {
                linha.style.display = ''; // Mostra a linha se atender aos critérios de filtro
				
            } else {
                linha.style.display = 'none'; // Oculta a linha se não atender aos critérios de filtro
            }
        }
    });

	// Adicione um ouvinte de evento ao botão de reset da aba notebooks
    document.getElementById("botao-reset").addEventListener("click", function() {
        resetPesquisa();
    });
});

let colIndex = -1;
let ascending = true;

// Função para ordenar os valores da coluna
function ordenarColuna(index) {
    const tabela = document.getElementById('tabela-equipamentos');
    const tbody = tabela.querySelector('tbody');
    const linhas = Array.from(tbody.querySelectorAll('tr'));

    ascending = colIndex === index ? !ascending : true;
    colIndex = index;

    linhas.sort((a, b) => {
        const valorA = a.cells[index].innerText.trim();
        const valorB = b.cells[index].innerText.trim();

        const compareResult = isNaN(valorA) ? valorA.localeCompare(valorB) : valorB - valorA;
        return ascending ? compareResult : -compareResult;
    });

    tbody.innerHTML = '';
    linhas.forEach((linha) => tbody.appendChild(linha));
}

// Adiciona evento de clique para as células do cabeçalho
document.getElementById('th-patrimonio').addEventListener('click', () => {
    ordenarColuna(0); // Índice da coluna Patrimônio
});

document.getElementById('th-marca').addEventListener('click', () => {
    ordenarColuna(1); // Índice da coluna Marca
});

// Adiciona evento de clique para as células do cabeçalho
document.getElementById('th-modelo').addEventListener('click', () => {
    ordenarColuna(2); // Índice da coluna Patrimônio
});

document.getElementById('th-status').addEventListener('click', () => {
    ordenarColuna(3); // Índice da coluna Marca
});

// Adiciona evento de clique para as células do cabeçalho
document.getElementById('th-observacoes').addEventListener('click', () => {
    ordenarColuna(4); // Índice da coluna Patrimônio
});

document.getElementById('th-aquisicao').addEventListener('click', () => {
    ordenarColuna(5); // Índice da coluna Marca
});

// Adiciona evento de clique para as células do cabeçalho
document.getElementById('th-utilizacoes').addEventListener('click', () => {
    ordenarColuna(6); // Índice da coluna Patrimônio
});

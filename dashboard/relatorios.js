function mostrarPainelHistorico() {
    document.getElementById("painel-historico").style.display = "block";
    document.getElementById("painel-hist-material-de-sala").style.display = "none";

    // Adicionar a classe "active" ao botão Cadastros e remover de outros botões
    document.querySelector(".button-historico").classList.add("active");
    document.querySelector(".button-hist-material-de-sala").classList.remove("active");
}

// Função para mostrar o painel de Tabelas
function mostrarPainelHistoricoMaterialSala() {
    document.getElementById("painel-historico").style.display = "none";
    document.getElementById("painel-hist-material-de-sala").style.display = "block";

    // Adicionar a classe "active" ao botão Tabelas e remover de outros botões
    document.querySelector(".button-historico").classList.remove("active");
    document.querySelector(".button-hist-material-de-sala").classList.add("active");
}

// Adicionar eventos de clique aos botões
document.querySelector(".button-historico").addEventListener("click", mostrarPainelHistorico);
document.querySelector(".button-hist-material-de-sala").addEventListener("click", mostrarPainelHistoricoMaterialSala);

// Exibir o painel de Cadastros ao carregar a página
window.addEventListener("load", mostrarPainelHistorico);

// Variável para armazenar a linha clicada na tabela Pagamentos
var linhaClicadaRelatorio = null;

// Função para destacar a linha clicada e desfazer o destaque das outras
function highlightRowRelatorio(row) {
    // Se uma linha já estiver destacada, remova o destaque dela
    if (linhaClicadaRelatorio !== null) {
        linhaClicadaRelatorio.style.backgroundColor = '';
    }

    // Verifica se a linha clicada não é a mesma que a anterior
    if (row !== linhaClicadaRelatorio) {
        linhaClicadaRelatorio = row; // Armazena a nova linha clicada
        row.style.backgroundColor = 'yellow'; // Define a cor de fundo como amarela
    } else {
        linhaClicadaRelatorio = null; // Remove o destaque se a mesma linha for clicada novamente
    }
}

// Cor do texto diferente para o campo Status da tabela
var tabelaEquipamento = document.getElementById("tabela-relatorios");
var linhasEquipamento = tabelaEquipamento.getElementsByTagName("tr");

for (var i = 1; i < linhasEquipamento.length; i++) { // Comece com 1 para pular o cabeçalho
    var colunas = linhasEquipamento[i].getElementsByTagName("td");
    var statusColuna = colunas[10]; // 10 é o índice da coluna "Status" (base 0)

    if (statusColuna.textContent.trim() === "Em Andamento") {
        statusColuna.classList.add("status-em-uso");
    }
}

var tabelaMaterial = document.getElementById("tabela-retirada");
var linhasMaterial = tabelaMaterial.getElementsByTagName("tr");
		
		for (var i = 1; i < linhasMaterial.length; i++) { // Comece com 1 para pular o cabeçalho
		var colunas = linhasMaterial[i].getElementsByTagName("td");

		for (var j = 0; j < colunas.length; j++) {
		var statusColuna = colunas[j];

		if (statusColuna.textContent.trim() === "Faltando" || statusColuna.textContent.trim() === "Em Uso") {
			statusColuna.classList.add("status-faltando");
		}
	}
}

// Função para pesquisa em relatórios
document.addEventListener("DOMContentLoaded", function() {
    // Pega os elementos dos campos de filtro da Aba Notebooks
    var inputPatrimonio = document.getElementById('patrimonio');
    var inputDataIn = document.getElementById('datain');
    var inputDataOut = document.getElementById('dataout');
    var selectStatus = document.getElementById('status');
    var inputMarca = document.getElementById('marca');
    var inputModelo = document.getElementById('modelo');
    var inputRA = document.getElementById('RA');
    var inputNome = document.getElementById('nome');
    var inputCPF = document.getElementById('CPF');
    var selectCurso = document.getElementById('cursos');
    var selectOperadores = document.getElementById('operadores');  

    var tabelaNotebooks = document.getElementById('tabela-relatorios');
    var linhasNotebooks = tabelaNotebooks.getElementsByTagName('tr');
	
	// Pega os elementos dos campos de filtro da Aba Material de Sala
	var inputSala = document.getElementById('sala');
	var inputDataInMaterial = document.getElementById('datain-material');
    var inputDataOutMaterial = document.getElementById('dataout-material');
    var inputProfessor = document.getElementById('nome-professor');
	var selectStatusMaterial = document.getElementById('status-material');
	var selectOperadoresRetirada = document.getElementById('operadores-retirada');
	
	var tabelaMateriais = document.getElementById('tabela-retirada');
    var linhasMateriais = tabelaMateriais.getElementsByTagName('tr');
	
	// Função para limpar os campos de pesquisa e reexibir todas as linhas da tabela
    function resetPesquisa() {
	
		// Aba Notebooks
        inputPatrimonio.value = '';
        inputDataIn.value = '';
        inputDataOut.value = '';
        selectStatus.value = 'Ambos';
        inputMarca.value = '';
        inputModelo.value = '';
        inputRA.value = '';
        inputNome.value = '';
        inputCPF.value = '';
        selectCurso.value = 'Todos';
        selectOperadores.value = 'Todos';
		
		// Aba Material de Sala
		inputSala.value = '';
		inputDataInMaterial.value = '';
		inputDataOutMaterial.value = '';
		inputProfessor.value = '';
		selectStatusMaterial.value = 'Ambos';
		selectOperadoresRetirada.value = 'Todos';
		
        // Exibir todas as linhas da tabela
        for (var i = 1; i < linhasNotebooks.length; i++) {
            var linhaNotebook = linhasNotebooks[i];
            linhaNotebook.style.display = '';
        }
		
		// Exibir todas as linhas da tabela
        for (var i = 1; i < linhasMateriais.length; i++) {
            var linhaMaterial = linhasMateriais[i];
            linhaMaterial.style.display = '';
        }
    }
	
    // Adicione um ouvinte de evento ao botão de pesquisa da aba Notebooks
    document.getElementById("botao-pesquisar-notebooks").addEventListener("click", function() {
        var filtroPatrimonio = inputPatrimonio.value;
        var filtroDataIn = inputDataIn.value;
        var filtroDataOut = inputDataOut.value;
        var filtroStatus = selectStatus.value;
        var filtroMarca = inputMarca.value.toLowerCase();
        var filtroModelo = inputModelo.value.toLowerCase();
        var filtroRA = inputRA.value;
        var filtroNome = inputNome.value.toLowerCase();
        var filtroCPF = inputCPF.value;
        var filtroCurso = selectCurso.value.toLowerCase();
        var filtroOperadores = selectOperadores.value.toLowerCase();

        // Função para converter data de ano-mês-dia para dia-mês-ano
        function converterData(data) {
            var partesData = data.split('/');
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
        var dataInFiltro = new Date(filtroDataIn);
        var dataOutFiltro = new Date(filtroDataOut);
        
		dataOutFiltro.setDate(dataOutFiltro.getDate() + 1);

        // Loop através das linhas da tabela para aplicar o filtro
        for (var i = 1; i < linhasNotebooks.length; i++) {
            var linhaNotebook = linhasNotebooks[i];
            var celulas = linhaNotebook.getElementsByTagName('td');
			
			var dataIn = celulas[0].innerText; // Mantém a data no formato ano-mês-dia
            var patrimonio = celulas[1].innerText;
			var marca = celulas[2].innerText.toLowerCase();
			var modelo = celulas[3].innerText.toLowerCase();
			var RA = celulas[4].innerText;
			var nome = celulas[5].innerText.toLowerCase();
            var CPF = celulas[6].innerText;
            var curso = celulas[7].innerText.toLowerCase();
            var dataOut = celulas[8].innerText; // Mantém a data no formato ano-mês-dia
            var status = celulas[10].innerText;
            var operador = celulas[11].innerText.toLowerCase();
			
            dataIn = dataIn.split(" ");
            dataOut = dataOut.split(" ");

            dataIn = dataIn[0];
            dataOut = dataOut[0];

            // Converte as datas da tabela antes de comparar
            dataIn = converterData(dataIn);
            dataOut = converterData(dataOut);

            // Cria objetos de data a partir das datas na tabela
            var dataInTabela = new Date(dataIn);
            var dataOutTabela = new Date(dataOut);
			
			console.log("operador: ", operador + "\nfiltroOperadores: ", filtroOperadores);

            if (
                (filtroPatrimonio === '' || patrimonio.includes(filtroPatrimonio)) &&
                (filtroStatus === 'Ambos' || status.includes(filtroStatus)) &&
                (filtroMarca === '' || marca.includes(filtroMarca)) &&
                (filtroModelo === '' || modelo.includes(filtroModelo)) &&
                (filtroRA === '' || RA.includes(filtroRA)) &&
                (filtroNome === '' || nome.includes(filtroNome)) &&
                (filtroCPF === '' || CPF.includes(filtroCPF)) &&
                (filtroCurso === 'todos' || curso.includes(filtroCurso)) &&
                (filtroDataIn === '' || dataInTabela >= dataInFiltro) &&
				(filtroDataOut === '' || dataOutTabela <= dataOutFiltro) && 
				(filtroOperadores === 'todos' || operador.includes(filtroOperadores))
				
            ) {
                linhaNotebook.style.display = ''; // Mostra a linha se atender aos critérios de filtro
				
            } else {
                linhaNotebook.style.display = 'none'; // Oculta a linha se não atender aos critérios de filtro
            }
			
        }
    });

	// Adicione um ouvinte de evento ao botão de pesquisa da aba Notebooks
    document.getElementById("botao-pesquisar-materiais").addEventListener("click", function() {
	
        var filtroSala = inputSala.value;
        var filtroDataInMaterial = inputDataInMaterial.value;
        var filtroDataOutMaterial = inputDataOutMaterial.value;
		var filtroProfessor = inputProfessor.value.toLowerCase();
        var filtroStatusMaterial = selectStatusMaterial.value;
        var filtroOperadoresRetirada = selectOperadoresRetirada.value.toLowerCase();

        // Função para converter data de ano-mês-dia para dia-mês-ano
        function converterData(data) {
            var partesData = data.split('/');
            if (partesData.length === 3) {
				var dia = parseInt(partesData[0], 10);
				var mes = parseInt(partesData[1], 10) - 1; // Mês é zero-indexed (0-11)
				var ano = parseInt(partesData[2], 10);
				return new Date(ano, mes, dia);
			}
			return data; // Retorna a data original se não for possível converter
				}
		
		
		filtroDataInMaterial = converterData(filtroDataInMaterial);
		filtroDataOutMaterial = converterData(filtroDataOutMaterial);

        // Cria objetos de data a partir das datas de filtro
        var dataInFiltroMaterial = new Date(filtroDataInMaterial);
        var dataOutFiltroMaterial = new Date(filtroDataOutMaterial);
        
		dataOutFiltroMaterial.setDate(dataOutFiltroMaterial.getDate() + 1);
		
        // Loop através das linhas da tabela para aplicar o filtro
        for (var i = 1; i < linhasMateriais.length; i++) {

            var linhaMaterial = linhasMateriais[i];
            var celulas = linhaMaterial.getElementsByTagName('td');
			
			var dataInMaterial = celulas[0].innerText; // Mantém a data no formato ano-mês-dia
            var sala = celulas[1].innerText;
			var professorMaterial = celulas[2].innerText.toLowerCase();
			var cursoMaterial = celulas[3].innerText.toLowerCase();
            var dataOutMaterial = celulas[8].innerText; // Mantém a data no formato ano-mês-dia
            var status = celulas[10].innerText;
            var operadorRetirada = celulas[11].innerText.toLowerCase();
			
            dataInMaterial = dataInMaterial.split(" ");
            dataOutMaterial = dataOutMaterial.split(" ");

            dataInMaterial = dataInMaterial[0];
            dataOutMaterial = dataOutMaterial[0];

            // Converte as datas da tabela antes de comparar
            dataInMaterial = converterData(dataInMaterial);
            dataOutMaterial = converterData(dataOutMaterial);

            // Cria objetos de data a partir das datas na tabela
            var dataInTabelaMaterial = new Date(dataInMaterial);
            var dataOutTabelaMaterial = new Date(dataOutMaterial);

            if (
                (filtroSala === '' || sala.includes(filtroSala)) &&
                (filtroStatusMaterial === 'Ambos' || status.includes(filtroStatusMaterial)) &&
                (filtroProfessor === '' || professorMaterial.includes(filtroProfessor)) &&
                (filtroDataInMaterial === '' || dataInTabelaMaterial >= dataInFiltroMaterial) &&
				(filtroDataOutMaterial === '' || dataOutTabelaMaterial <= dataOutFiltroMaterial) &&
				(filtroOperadoresRetirada === 'todos' || operadorRetirada.includes(filtroOperadoresRetirada))
				
            ) {
                linhaMaterial.style.display = ''; // Mostra a linha se atender aos critérios de filtro
				
            } else {
                linhaMaterial.style.display = 'none'; // Oculta a linha se não atender aos critérios de filtro
            }
        }

		
	
	});

	
	// Adicione um ouvinte de evento ao botão de reset da aba notebooks
    document.getElementById("botao-reset-notebooks").addEventListener("click", function() {
        resetPesquisa();
    });
	
	// Adicione um ouvinte de evento ao botão de reset da aba notebooks
    document.getElementById("botao-reset-retirada").addEventListener("click", function() {
        resetPesquisa();
    });
});


let colIndexEquipamentos = -1;
let ascendingEquipamentos = true;

// Função para ordenar os valores da coluna
function ordenarColunaRelatorios(index) {
    const tabela = document.getElementById('tabela-relatorios');
    const tbody = tabela.querySelector('tbody');
    const linhas = Array.from(tbody.querySelectorAll('tr'));

    ascendingEquipamentos = colIndexEquipamentos === index ? !ascendingEquipamentos : true;
    colIndexEquipamentos = index;

    linhas.sort((a, b) => {
        const valorA = a.cells[index].innerText.trim();
        const valorB = b.cells[index].innerText.trim();

        const compareResult = isNaN(valorA) ? valorA.localeCompare(valorB) : valorB - valorA;
        return ascendingEquipamentos ? compareResult : -compareResult;
    });

    tbody.innerHTML = '';
    linhas.forEach((linha) => tbody.appendChild(linha));
}

// Adiciona evento de clique para as células do cabeçalho
document.getElementById('th-emprestimo').addEventListener('click', () => {
    ordenarColunaRelatorios(0); // Índice da coluna Patrimônio
});

document.getElementById('th-patrimonio').addEventListener('click', () => {
    ordenarColunaRelatorios(1); // Índice da coluna Marca
});

// Adiciona evento de clique para as células do cabeçalho
document.getElementById('th-marca').addEventListener('click', () => {
    ordenarColunaRelatorios(2); // Índice da coluna Patrimônio
});

document.getElementById('th-modelo').addEventListener('click', () => {
    ordenarColunaRelatorios(3); // Índice da coluna Marca
});

// Adiciona evento de clique para as células do cabeçalho
document.getElementById('th-ra').addEventListener('click', () => {
    ordenarColunaRelatorios(4); // Índice da coluna Patrimônio
});

document.getElementById('th-aluno').addEventListener('click', () => {
    ordenarColunaRelatorios(5); // Índice da coluna Marca
});

document.getElementById('th-cpf').addEventListener('click', () => {
    ordenarColunaRelatorios(6); // Índice da coluna Marca
});

document.getElementById('th-curso').addEventListener('click', () => {
    ordenarColunaRelatorios(7); // Índice da coluna Marca
});

document.getElementById('th-devolucao').addEventListener('click', () => {
    ordenarColunaRelatorios(8); // Índice da coluna Marca
});

document.getElementById('th-observacao').addEventListener('click', () => {
    ordenarColunaRelatorios(9); // Índice da coluna Marca
});

document.getElementById('th-status').addEventListener('click', () => {
    ordenarColunaRelatorios(10); // Índice da coluna Marca
});

document.getElementById('th-operador').addEventListener('click', () => {
    ordenarColunaRelatorios(11); // Índice da coluna Marca
});

let colIndexRetirada = -1;
let ascendingRetirada = true;

// Função para ordenar os valores da coluna
function ordenarColunaRetirada(index) {
    const tabela = document.getElementById('tabela-retirada');
    const tbody = tabela.querySelector('tbody');
    const linhas = Array.from(tbody.querySelectorAll('tr'));

    ascendingRetirada = colIndexRetirada === index ? !ascendingRetirada : true;
    colIndexRetirada = index;

    linhas.sort((a, b) => {
        const valorA = a.cells[index].innerText.trim();
        const valorB = b.cells[index].innerText.trim();

        const compareResult = isNaN(valorA) ? valorA.localeCompare(valorB) : valorB - valorA;
        return ascendingRetirada ? compareResult : -compareResult;
    });

    tbody.innerHTML = '';
    linhas.forEach((linha) => tbody.appendChild(linha));
}

// Adiciona evento de clique para as células do cabeçalho
document.getElementById('th-retirada').addEventListener('click', () => {
    ordenarColunaRetirada(0); // Índice da coluna Patrimônio
});

document.getElementById('th-sala').addEventListener('click', () => {
    ordenarColunaRetirada(1); // Índice da coluna Marca
});

// Adiciona evento de clique para as células do cabeçalho
document.getElementById('th-professor').addEventListener('click', () => {
    ordenarColunaRetirada(2); // Índice da coluna Patrimônio
});

document.getElementById('th-curso-retirada').addEventListener('click', () => {
    ordenarColunaRetirada(3); // Índice da coluna Marca
});

// Adiciona evento de clique para as células do cabeçalho
document.getElementById('th-controle-ar').addEventListener('click', () => {
    ordenarColunaRetirada(4); // Índice da coluna Patrimônio
});

document.getElementById('th-controle-projetor').addEventListener('click', () => {
    ordenarColunaRetirada(5); // Índice da coluna Marca
});

document.getElementById('th-marcadores').addEventListener('click', () => {
    ordenarColunaRetirada(6); // Índice da coluna Marca
});

document.getElementById('th-apagador').addEventListener('click', () => {
    ordenarColunaRetirada(7); // Índice da coluna Marca
});

document.getElementById('th-devolucao-material').addEventListener('click', () => {
    ordenarColunaRetirada(8); // Índice da coluna Marca
});

document.getElementById('th-obs').addEventListener('click', () => {
    ordenarColunaRetirada(9); // Índice da coluna Marca
});

document.getElementById('th-status-retirada').addEventListener('click', () => {
    ordenarColunaRetirada(10); // Índice da coluna Marca
});

document.getElementById('th-operador-retirada').addEventListener('click', () => {
    ordenarColunaRetirada(11); // Índice da coluna Marca
});




function preencherSelectComCursos() {
    // Obtém a tabela e suas linhas
    var table = document.getElementById("tabela-relatorios");
    var rows = table.getElementsByTagName("tr");
    
    var cursosSet = new Set(); // Usando um Set para garantir valores únicos
    
    // Itera pelas linhas, começa em 1 para pular o cabeçalho
    for (var i = 1; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        if (cells.length >= 8) { // Verifica se há dados suficientes na linha
            var curso = cells[7].innerText.trim(); // A coluna do curso é a quarta (índice 3)
            cursosSet.add(curso);
        }
    }
    
    // Converte o Set para um array e ordena os cursos em ordem alfabética
    var cursosArray = Array.from(cursosSet).sort();

    // Preenche o select com os cursos ordenados
    var select = document.getElementById("cursos");
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

function preencherSelectComOperadores() {
    // Obtém a tabela e suas linhas
    var table = document.getElementById("tabela-relatorios");
    var rows = table.getElementsByTagName("tr");
    
    var cursosSet = new Set(); // Usando um Set para garantir valores únicos
    
    // Itera pelas linhas, começa em 1 para pular o cabeçalho
    for (var i = 1; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        if (cells.length >= 11) { // Verifica se há dados suficientes na linha
            var curso = cells[11].innerText.trim(); // A coluna do curso é a quarta (índice 3)
            cursosSet.add(curso);
        }
    }
    
    // Converte o Set para um array e ordena os cursos em ordem alfabética
    var cursosArray = Array.from(cursosSet).sort();

    // Preenche o select com os cursos ordenados
    var select = document.getElementById("operadores");
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

function preencherSelectComOperadoresMaterial() {
    // Obtém a tabela e suas linhas
    var table = document.getElementById("tabela-retirada");
    var rows = table.getElementsByTagName("tr");
    
    var cursosSet = new Set(); // Usando um Set para garantir valores únicos
    
    // Itera pelas linhas, começa em 1 para pular o cabeçalho
    for (var i = 1; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        if (cells.length >= 11) { // Verifica se há dados suficientes na linha
            var curso = cells[11].innerText.trim(); // A coluna do curso é a quarta (índice 3)
            cursosSet.add(curso);
        }
    }
    
    // Converte o Set para um array e ordena os cursos em ordem alfabética
    var cursosArray = Array.from(cursosSet).sort();

    // Preenche o select com os cursos ordenados
    var select = document.getElementById("operadores-retirada");
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

preencherSelectComOperadores();

preencherSelectComOperadoresMaterial();
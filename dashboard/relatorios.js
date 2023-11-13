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
var tabela = document.getElementById("tabela-relatorios");
var linhas = tabela.getElementsByTagName("tr");

for (var i = 1; i < linhas.length; i++) { // Comece com 1 para pular o cabeçalho
    var colunas = linhas[i].getElementsByTagName("td");
    var statusColuna = colunas[10]; // 10 é o índice da coluna "Status" (base 0)

    if (statusColuna.textContent.trim() === "Em Andamento") {
        statusColuna.classList.add("status-em-uso");
    }
}

// Função para pesquisa em relatórios
document.addEventListener("DOMContentLoaded", function() {
    // Pega os elementos dos campos de filtro
    var inputPatrimonio = document.getElementById('patrimonio');
    var inputDataIn = document.getElementById('datain');
    var inputDataOut = document.getElementById('dataout');
    var selectStatus = document.getElementById('status');
    var inputMarca = document.getElementById('marca');
    var inputModelo = document.getElementById('modelo');
    var inputRA = document.getElementById('RA');
    var inputNome = document.getElementById('nome');
    var inputCPF = document.getElementById('CPF');
    var selectCurso = document.getElementById('curso');

    var tabela = document.getElementById('tabela-relatorios');
    var linhas = tabela.getElementsByTagName('tr');
	
	// Função para limpar os campos de pesquisa e reexibir todas as linhas da tabela
    function resetPesquisa() {
        inputPatrimonio.value = '';
        inputDataIn.value = '';
        inputDataOut.value = '';
        selectStatus.value = 'Ambos';
        inputMarca.value = '';
        inputModelo.value = '';
        inputRA.value = '';
        inputNome.value = '';
        inputCPF.value = '';
        selectCurso.value = 'todos';

        // Exibir todas as linhas da tabela
        for (var i = 1; i < linhas.length; i++) {
            var linha = linhas[i];
            linha.style.display = '';
        }
    }
	
    // Adicione um ouvinte de evento ao botão de pesquisa
    document.getElementById("botao-pesquisar").addEventListener("click", function() {
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

        // Função para converter data de ano-mês-dia para dia-mês-ano
        function converterData(data) {
            var partesData = data.split('-');
            if (partesData.length === 3) {
                return partesData[2] + '-' + partesData[1] + '-' + partesData[0];
            }
            return data; // Retorna a data original se não for possível converter
        }

        // Cria objetos de data a partir das datas de filtro
        var dataInFiltro = new Date(filtroDataIn);
        var dataOutFiltro = new Date(filtroDataOut);

        // Loop através das linhas da tabela para aplicar o filtro
        for (var i = 1; i < linhas.length; i++) {
            var linha = linhas[i];
            var celulas = linha.getElementsByTagName('td');
			
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
                (filtroDataOut === '' || dataOutTabela <= dataOutFiltro)
				
				
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
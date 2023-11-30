// Variável para armazenar a linha clicada na tabela Pagamentos
var linhaClicadaMaterial = null;

// Função para destacar a linha clicada e desfazer o destaque das outras
function highlightRowMaterial(row) {
    // Se uma linha já estiver destacada, remova o destaque dela
    if (linhaClicadaMaterial !== null) {
        linhaClicadaMaterial.style.backgroundColor = '';
    }

    // Verifica se a linha clicada não é a mesma que a anterior
    if (row !== linhaClicadaMaterial) {
        linhaClicadaMaterial = row; // Armazena a nova linha clicada
        row.style.backgroundColor = 'yellow'; // Define a cor de fundo como amarela
    } else {
        linhaClicadaMaterial = null; // Remove o destaque se a mesma linha for clicada novamente
    }
}

function editarLinhaMaterial() {
    if (linhaClicadaMaterial) {
		
		const cells = linhaClicadaMaterial.getElementsByTagName('td');
		
		const controleArTexto = cells[1].textContent.trim();
		const controleProjetorTexto = cells[2].textContent.trim();
		const marcadoresTexto = cells[3].textContent.trim();
		const apagadorTexto = cells[4].textContent.trim();
		
		const controleArCheckbox = document.getElementById('ControleAr-edit');
		const controleProjetorCheckbox = document.getElementById('ControleProjetor-edit');
		const marcadoresCheckbox = document.getElementById('Marcadores-edit');
		const apagadorCheckbox = document.getElementById('Apagador-edit');
		
        document.getElementById("sala-edit").value = cells[0].textContent;
		
		if (controleArTexto === 'Presente') {
			controleArCheckbox.checked = true; // Marca a caixa de seleção se o texto for "Presente"
		} else {
			controleArCheckbox.checked = false; // Desmarca a caixa de seleção se o texto for "Faltando"
		}
		
		if (controleProjetorTexto === 'Presente') {
			controleProjetorCheckbox.checked = true; // Marca a caixa de seleção se o texto for "Presente"
		} else {
			controleProjetorCheckbox.checked = false; // Desmarca a caixa de seleção se o texto for "Faltando"
		}
        
		if (marcadoresTexto === 'Presente') {
			marcadoresCheckbox.checked = true; // Marca a caixa de seleção se o texto for "Presente"
		} else {
			marcadoresCheckbox.checked = false; // Desmarca a caixa de seleção se o texto for "Faltando"
		}
		
		if (apagadorTexto === 'Presente') {
			apagadorCheckbox.checked = true; // Marca a caixa de seleção se o texto for "Presente"
		} else {
			apagadorCheckbox.checked = false; // Desmarca a caixa de seleção se o texto for "Faltando"
		}
		
		document.getElementById("obs-edit").value = cells[5].textContent; 

		abrirModalMaterial();
		
	} else {
		alert('Nenhuma linha selecionada. Selecione uma linha para editar.');
	}
}

// Função para abrir o modal Equipamentos
function abrirModalMaterial() {
    var modal = document.getElementById('myModalMaterial');
    modal.style.display = 'block';
}

// Função para fechar o modal Equipamentos
function fecharModalMaterial() {
    var modal = document.getElementById('myModalMaterial');
    modal.style.display = 'none';
}

var tabela = document.getElementById("tabela-materiais");
var linhas = tabela.getElementsByTagName("tr");

for (var i = 1; i < linhas.length; i++) { // Comece com 1 para pular o cabeçalho
    var colunas = linhas[i].getElementsByTagName("td");

    for (var j = 1; j < colunas.length; j++) {
        var statusColuna = colunas[j];

        if (statusColuna.textContent.trim() === "Faltando") {
            statusColuna.classList.add("status-faltando");
        }
    }
}

// Função para pesquisa em relatórios
document.addEventListener("DOMContentLoaded", function() {
    // Pega os elementos dos campos de filtro
    var inputSala = document.getElementById('sala');;

    var tabela = document.getElementById('tabela-materiais');
    var linhas = tabela.getElementsByTagName('tr');

    // Função para limpar os campos de pesquisa e reexibir todas as linhas da tabela
   function resetPesquisa() {
        inputSala.value = '';

        // Exibir todas as linhas da tabela
        for (var i = 1; i < linhas.length; i++) {
            var linha = linhas[i];
            linha.style.display = '';
        }
    }

     // Adicione um ouvinte de evento ao botão de pesquisa
     document.getElementById("botao-pesquisar").addEventListener("click", function() {
        var filtroSala = inputSala.value;

         // Loop através das linhas da tabela para aplicar o filtro
         for (var i = 1; i < linhas.length; i++) {
            var linha = linhas[i];
            var celulas = linha.getElementsByTagName('td');
	
			var sala = celulas[0].innerText;
			
            if (filtroSala === '' || sala.includes(filtroSala)) {
				
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


window.onload = function() {
	var sala = document.getElementById("sala");
	sala.focus()
}

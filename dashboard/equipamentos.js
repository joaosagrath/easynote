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
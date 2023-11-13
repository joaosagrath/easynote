	document.getElementById('imprimirPDF').addEventListener('click', function() {
	window.print();
	});
	
	function imprimirTabelaRelatorio() {
    var tabela = document.getElementById("tabela-relatorios");
    if (tabela) {
        var janelaDeImpressao = window.open('', '');
        janelaDeImpressao.document.open();
        janelaDeImpressao.document.write('<html><head><title>Equipamentos</title><link rel="stylesheet" href="styles.css"></head><body>');
        janelaDeImpressao.document.write('<table class="styled-table"><tr><td><div class="logoFatura-container">')
        janelaDeImpressao.document.write('<img src="../resources/descomplica.png" alt="Descrição da Imagem" class="class-logoFatura">')
        janelaDeImpressao.document.write('</div></td>')
        janelaDeImpressao.document.write('<td class="container-esquerda">')
        janelaDeImpressao.document.write('<div>')
        janelaDeImpressao.document.write('<p><strong>Endereço: </strong> <span>Avenida das Cataratas, 1118</span></p>')
        janelaDeImpressao.document.write('<p><strong>Bairro:</strong> <span>Vila Yolnada</span></p>')
        janelaDeImpressao.document.write('<p><strong>Cidade:</strong> <span>Foz do Iguaçu</span></p>')
        janelaDeImpressao.document.write('<p><strong>Estado:</strong> <span>Paraná</span></p>')
        janelaDeImpressao.document.write('<p><strong>CNPJ:</strong> <span>05.888.999/0001-05</span></p>')
        janelaDeImpressao.document.write('</div></td></tr>')
        janelaDeImpressao.document.write(tabela.outerHTML);
        janelaDeImpressao.document.write('<button id="imprimirPDF" class="styled-table noPrint" onclick="window.print()">Imprimir PDF</button>')
        janelaDeImpressao.document.write('</body></html>');
        janelaDeImpressao.document.close();
        janelaDeImpressao.print();
    }
}
	
	
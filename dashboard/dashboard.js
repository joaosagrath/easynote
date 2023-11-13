// Função para Criar o Barra Horizontal Semanal
function criarGraficoHorizontalBar(EquipHoje, EquipSemanaPassada, EquipSemanaRetrasada) {
    // Obtém uma referência ao elemento canvas para o chart de equipamentos
    var EquipChart = document.getElementById('horizontalBarEquipChart').getContext('2d');
    var WeekEquipChart = document.getElementById('horizontalBarWeekEquipChart').getContext('2d');

    // Obtém os rótulos dos elementos <span>
    var equipTotal = document.getElementById('equipTotal').textContent;
    var equipUso = document.getElementById('equipUso').textContent;
    var alunosAti = document.getElementById('alunosAti').textContent;
    var span_equipTotal = document.getElementById('span_equipTotal').textContent;
    var span_equipUso = document.getElementById('span_equipUso').textContent;
    var span_alunosAti = document.getElementById('span_alunosAti').textContent;

    // Dados do gráfico de pizza
    var dataEquipChart = {
        labels: [equipTotal, equipUso, alunosAti], 
        datasets: [{
            data: [span_equipTotal, span_equipUso, span_alunosAti],
            backgroundColor: ['blue', 'yellow', 'green']
        }]
    };

    // Cria o gráfico de pizza
    var equipChart = new Chart(EquipChart, {
		type: 'bar', // Defina o tipo como 'bar' para barras horizontais
		data: dataEquipChart,
		options: {
			indexAxis: 'y', // Defina o eixo Y como o eixo de categoria
			plugins: {
				legend: {
					display: false
				},
				title: {
					display: true,
					text: 'Equipamentos e Alunos' // Aqui você define o título que deseja exibir
				}
			}
		}
	});
	
	// Dados do gráfico de pizza
    var dataWeekEquipChart = {
        labels: ["Hoje", "7 Dias", "14 Dias"],
        datasets: [{
            data: [EquipHoje, EquipSemanaPassada, EquipSemanaRetrasada],
            backgroundColor: ['blue', 'yellow', 'green']
        }]
    };

    var equipChart = new Chart(WeekEquipChart, {
		type: 'bar', // Defina o tipo como 'bar' para barras horizontais
		data: dataWeekEquipChart,
		options: {
			indexAxis: 'y', // Defina o eixo Y como o eixo de categoria
			plugins: {
				legend: {
					display: false
				},
				title: {
					display: true,
					text: 'Equipamentos por Período' // Aqui você define o título que deseja exibir
				}
			}
		}
	});
	
}

function encontrarEquipamentoMaiorUtilizacao() {
    const divResultado = document.getElementById('span_equipMaisUso');

		// Atualiza a div com o equipamento de maior utilização
		divResultado.innerHTML = '<b>' + patrimonioMaisUtilizado.patrimonio + ": " + patrimonioMaisUtilizado.marca + " - " + patrimonioMaisUtilizado.modelo + '</b>';
		
		criarGraficoBarras(nomeTop, valoresTop10);
}

// Função para Criar o Grafico Barras
function criarGraficoBarras(nomeTop, valoresTop10) {
    // Obtém uma referência ao elemento canvas para o chart de equipamentos
    var ctx = document.getElementById('barChart').getContext('2d');


    // Dados do gráfico de pizza
    var data = {
        labels: nomeTop,
        datasets: [{
            data: valoresTop10,
            backgroundColor: ['blue', 'yellow', 'green', 'red', 'purple', 'orange', 'pink', 'teal', 'cyan', 'magenta']
        }]
    };

    // Cria o gráfico de pizza
    var equipChart = new Chart(ctx, {
        type: 'bar',
        data: data,
		options: {
			plugins: {
				legend: {
					display: false
				},
				title: {
					display: true,
					text: 'Equipamentos mais Usados' // Aqui você define o título que deseja exibir
				}
			}
		}
    });
}

// Array com os 10 patrimônios mais utilizados
var nomeTop = dezMaisUtilizados.map(function(item) {
    return item.patrimonio;
});

// Array com as quantidades correspondentes dos 10 mais utilizados
var valoresTop10 = dezMaisUtilizados.map(function(item) {
    return item.total_utilizacoes;
});

const totalEquipamentosBD = document.getElementById('span_equipTotal');
totalEquipamentosBD.innerHTML = '<b>' + totalEquipamentos + '</b>';

const inputUso = document.getElementById('span_equipUso');
inputUso.innerHTML = '<b>' + equipamentosEmUso + '</b>';

const alunosAtivos = document.getElementById('span_alunosAti');
alunosAtivos.innerHTML = '<b>' + totalAlunos + '</b>';

const divAlunoMaisAtivo = document.getElementById('span_alunoMaisAtivo');
const divCursoMaisAtivo = document.getElementById('span_cursoMaisAtivo');

divAlunoMaisAtivo.innerHTML = '<b>' + alunoMaisAtivo.ra + ': ' + alunoMaisAtivo.aluno + '</b>';
divCursoMaisAtivo.innerHTML = '<b>' + cursoMaisAtivo.curso + '</b>';

criarGraficoHorizontalBar(equipamentosHoje, equipamentos7Dias, equipamentos14Dias);

encontrarEquipamentoMaiorUtilizacao();

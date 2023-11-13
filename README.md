O Centro Universitário União das Américas Descomplica em Foz do Iguaçu disponibiliza um serviço de empréstimo de notebooks aos alunos da instituição. No entanto, o registro dos empréstimos é realizado de forma manual e não há uma forma rápida e eficaz de visualizar os dados em tempo real.
Atualmente, o processo de empréstimo consiste no recolhimento de um documento de identificação do aluno e assinatura do mesmo em uma lista impressa, constando o registro do equipamento e a data. Este processo basea-se na confiança de que o equipamento será devolvido ao final de cada aula, mas não há uma forma de rastrear o equipamento, controlar a duração do empréstimo ou garantir de que o mesmo será devolvido. 
O EasyNote V2 tem como objetivo suprir essa lacuna entre a segurança e o controle dos equipamentos por meio de um sistema intuitivo, que permitirá o cadastro de equipamentos, incluindo o registro de defeitos e especificações de cursos; A vinculação do equipamento ao aluno por meio do número patrimonial e registro acadêmico (RA); A visualização dos equipamentos em uso; Geração de relatório de dados específicos e a visualização do histórico dos empréstimos realizados pelo aluno. 

METODOLOGIA

O projeto foi idealizado a partir de uma reunião com os colaboradores do espaço HUB da instituição, espaço instituicional direcionado ao armazenamento de equipamentos, que são diretamente responsáveis pelo processo de empréstimo e devolução dos notebooks da instituição. 
Primeiramente, houve um levantamento de requisitos para definir quais seriam as funcionalidades essenciais do sistema, que foram organizadas por ordem de prioridade em conjunto com os colaboradores, conforme conta na Figura 1. Esses requisitos foram detalhados e documentados em um Termo de Abertura de Projeto (TAP) e alterados conforme demanda ou necessidade. Após esse processo, o sistema começou a ser desenhado de acordo com os requisitos levantados e, a partir desse processo, iniciamos o desenvolvimento. 
A príncipio, utilizamos tecnologias básicas como HTML e CSS para construir páginas estáticas, apenas para ilustrar as primeiras telas do sistema. Posteriormente, implementamos a linguagem de programação, Javascript, para adicionar funcionalidades a botões, tabelas e janelas pop-up. 
Com um modelo parcialmente funcional, nos reunimos novamente com os colaboradores e também com um representate do setor de TI da instituição, com o intuito de identificar possíveis mudanças na estética e funcionalidades do sistema. 
Após esse contato, inicia
mos uma implementação-teste de arquivos CSV, ou Comma-separated values, como forma de salvar alterações feitas no sistema. Para tal finalidade, outra tecnologia se fez necessária: o PHP. Com as alterações feitas, foi possível implementar um banco de dados local, ainda em fase de teste, para que seja mantido todos os dados e alterações feitas em uma sessão dentro do sistema. 

Figura 1. Ordem de prioridade dos requisitos levantados.
![unnamed](https://github.com/joaosagrath/easynote.github.io/assets/16491360/7e5e1874-413f-4879-919d-d984a8da462a)

RESULTADOS E DISCUSSÃO

Durante o processo de levantamento de requisitos, identificamos a necessidade da instituição em controlar a entrada e saída de equipamentos e, também. visualizar de forma geral as etapas desse processo. Pensando nisso, iniciamos o sistema com um painel de controle, dashboard, inteiramente integrada com o processo de empréstimo, apresentando dados em tempo real como os equipamentos mais utilizados, quantos estão em uso, em qual período houve uma maior procura por equipamentos e qual curso busca mais por esse serviço. Vide Figura 2.

Figura 2. Tela inicial do sistema com o painel de controle
![unnamed](https://github.com/joaosagrath/easynote.github.io/assets/16491360/6841cdc3-769d-4ebf-8da3-83c6a7c411d9)

ara resolvermos a principal problemática apresentada pelos colaboradores, optamos pela implementação de um processo simplificado, onde apenas o número do registro acadêmico (RA) do aluno e o número do patrimônio do equipamento serão necessários para iniciar e encerrar o empréstimo, conforme ilustrado na Figura 3.

Figura 3. Tela principal onde serão realizados os empréstimos
![unnamed](https://github.com/joaosagrath/easynote.github.io/assets/16491360/a1ceb316-c1fa-47f1-975f-54b4baaaa134)

Como forma de controle dos equipamentos, foi implementado uma aba de cadastro, onde todos os equipamentos serão adicionados e gerenciados pelos colaboradores, podendo analisar o número de utilizações e observações, conforme Figura 4. 

Figura 4. Tela de cadastro e visualização dos equipamentos
![unnamed](https://github.com/joaosagrath/easynote.github.io/assets/16491360/db49e00e-34fe-49f0-af21-cb916e2c9d35)

Para garantir a segurança dos equipamentos, cada empréstimo poderá ser visualizado na aba de relatórios, tornando mais fácil para a instituição identificar em que perído os equipamentos começaram a apresentar problemas, quais alunos ainda estão com empréstimo ativo, e também o horário em que o equipamento foi devolvido. Vide Figura 5.

Figura 5. Tela de relatório dos empréstimos
![unnamed](https://github.com/joaosagrath/easynote.github.io/assets/16491360/6e4d1701-0fdd-4dc5-b159-be690afa8d40)


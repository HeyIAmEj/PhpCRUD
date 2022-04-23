# PhpCRUD
## Este projeto é um CRUD simples feito em PHP.
### Página Inicial
<img src="https://hermes.digitalinnovation.one/courses/badge/f052cd75-9758-4df2-a592-f2600276c05c.png" alt="Spread Java Developer DIO Badge" height="200" width="200" />
<br>

### Criação
<img src="https://hermes.digitalinnovation.one/courses/badge/f052cd75-9758-4df2-a592-f2600276c05c.png" alt="Spread Java Developer DIO Badge" height="200" width="200" />
<br>

### Leitura
<img src="https://hermes.digitalinnovation.one/courses/badge/f052cd75-9758-4df2-a592-f2600276c05c.png" alt="Spread Java Developer DIO Badge" height="200" width="200" />
<br>

### Alteração
<img src="https://hermes.digitalinnovation.one/courses/badge/f052cd75-9758-4df2-a592-f2600276c05c.png" alt="Spread Java Developer DIO Badge" height="200" width="200" />
<br>

- Tecnologias utilizadas:
  - HTML5
  - CSS
  - Bootstrap
  - Javascript
  - JQuery
  - Mysql
  - MySQL Workbench
  - PhpStorm 2022.1
  - Postman
  - Wampserver

## Utilização
<p>É necessário um servidor capaz de rodar PHP.</p>
<p>O banco de dados deve ser MySQL. E o seu script está disponível neste repositório. Sendo necessário apenas executar o import do script.</p>
<p>Os arquivos de configuração do Banco de Dados estão no repositório (modules/db/config.php) [user: root | pass: root].</p>

## Dificuldades & Desenvolvimento 
<p>Inicialmente parei para realizar pesquisas dos melhores
métodos utilizados para desenvolver um CRUD em PHP.</p>

<p>Como tenho familiaridade com Java Spring Boot, resolvi 
seguir na mesma pegada de modelo MVC.</p>

<p>Comecei a estudar rapidamente sobre os conceitos de POO com PHP, 
já que havia tempo que não utilizava o PHP.</p>

<p>Então comecei desenvolvendo o model, controller e view.
Em seguida comecei com o template base do site. Comecei a focar com o Bootstrap
como framework há alguns meses, então decidi utiliza-lo.</p>

<p>Depois comecei a fazer a ligação do front com o back, utilizando JQuery.
E aí chegou a primeira dificuldade, permanecer no modelo MVC. Não estava conciliando 
a ligação do front com o back desta forma, então fui seguindo para uma pegada mais API.</p>

<p>Por fim, desenvolvi ENDPOINTS para receber os dados e utilizá-los.</p>

- (GET) /chamados/todos -> Retorna todos os chamados cadastrados.
- (GET) /chamados/{id} -> Retorna um chamado específico por Id.
- (POST) /chamados/criar -> Cria um chamado.
- (PUT) /chamados/alterar -> Altera um chamado enviando o Id no request params.

<p>Infelizmente, ainda não consegui fazer a ligação do front com o back para o endpoint PUT.</p>
<p>Até o momento foram esses os desenvolvimentos deste CRUD.</p>
<p>Tendo como maior dificuldade, o tempo (20/04/2022 até 22/04/2022).</p>

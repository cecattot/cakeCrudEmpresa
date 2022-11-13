# Teste Técnico

Atendendo ao teste a aplicação foi desenvolvida usando CakePHP com Bootstrap e Datatables.
Para a utilização é necessário configurar o banco de dados, para isso acesse "config/app_local"
e edite as propriedades de 'Datasources', colocando as informações de acesso ao banco de dados.
Em seguida execute o comando abaixo no diretório bin.
```bash
bin/cake server
```
Caso queira especificar a porta execute:
```bash
bin/cake server -p 8765
```
Para criar o Banco de Dados execute
```bash
bin/cake migrations migrate
```
Outra possibilidade é utilizar o arquivo "banco.sql" localizado na raiz do projeto.

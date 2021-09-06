# Todo List App com Laravel

Pequeno projeto realizado como teste para vaga de estagio

Tecnologias: Bootstrap 4, PHP, Framework Laravel 7x

## Requisitos para utilização

Para a utização, é necessario que seu computador possua a instalação dos seguintes programas:

- PHP
- Apache2
- Banco de dados MySQL
- Composer

No meu computador, as respectivas versões em que desenvolvi são: 

- Apache/2.4.41
- PHP 7.4.3
- MySQL 8.0.21 
- Composer 1.10.10

## Como baixar e atualizar o projeto

Clone o repositorio pelo seu terminal utilizando o seguinte comando:

```
$ git clone https://github.com/alexanderdelfim/todo_list_app
```

Após o download terminar, entre na pasta que foi criada.

```
$ cd todo_list_app
```

Agora, execute o seguinte comando no seu terminal:

```
$ composer update
```

### Execução do projeto

Para executar o projeto, voce terá que configurar os dados do seu banco de dados dentro 
do arquivo `.env`, basta copiar o arquivo `.env-example` e preencher os seguintes camposnele.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_list_app
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

 de preferencia um banco ressem criado para evitar erros no processo.
Após isso, escreva o seguinte comando no terminal:

```
$ php artisan serve
```

Antes de começãr a utilizar, realiza este ultimo comando, ele ira realizar a criação das tabelas
dentro do banco de dados que você configurou;

```
$ php artisan migrate
```

Agora basta abrir a aplicação no navegador, ela estará rodando em uma das seguintes portas:

## Portas 

[http://localhost:8000](http://localhost:8000) ou [http://127.0.0.1:8000](http://127.0.0.1:8000)

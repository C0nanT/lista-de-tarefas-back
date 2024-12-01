# Lista de Tarefas Backend

Este é o projeto backend para a aplicação de lista de tarefas. Ele foi desenvolvido utilizando PHP no backend e React no frontend.

## Frontend

O repositório do frontend pode ser encontrado aqui: [https://github.com/C0nanT/lista-de-tarefas-front](https://github.com/C0nanT/lista-de-tarefas-front)

## Funcionalidades

- Adicionar novas tarefas
- Marcar tarefas como concluídas
- Remover tarefas
- Editar tarefas

## Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:
- [PHP](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/)

## Instalação

```bash
# Clone este repositório
$ git clone https://github.com/C0nanT/lista-de-tarefas-back

# Acesse a pasta do projeto no terminal/cmd
$ cd lista-de-tarefas-back

# Instale as dependências
$ composer install

# Configure o banco de dados
# Crie um banco de dados no MySQL e importe o arquivo database.sql

# Configure o arquivo .env com as informações do banco de dados
# Exemplo:
# DB_HOST=localhost
# DB_DATABASE=nome_do_banco
# DB_USERNAME=seu_usuario
# DB_PASSWORD=sua_senha

# Inicie o servidor no Xampp, Laragon ou da forma que preferir
```
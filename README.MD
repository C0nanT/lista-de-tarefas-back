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

## Recomendação de Ambiente

Para um ambiente de desenvolvimento mais fácil e rápido, recomendo o uso do [Laragon](https://laragon.org/) ou [XAMPP](https://www.apachefriends.org/index.html). Ambos fornecem uma maneira simples de configurar um servidor local com PHP, MySQL e outras ferramentas necessárias.

- **Laragon**: É uma ótima opção para desenvolvedores que procuram um ambiente leve e rápido. Ele vem com uma interface amigável e várias ferramentas úteis.
- **XAMPP**: É uma das opções mais populares e amplamente utilizadas. Ele é fácil de instalar e configurar, e possui uma grande comunidade de suporte.

Escolha a ferramenta que melhor se adapta às suas necessidades e siga as instruções de instalação fornecidas pelos respectivos sites.

## Instalação

```bash
# Clone este repositório
$ git clone https://github.com/C0nanT/lista-de-tarefas-back

# Acesse a pasta do projeto no terminal/cmd
$ cd lista-de-tarefas-back

# Instale as dependências
$ composer install

# Clone o arquivo .env.example para .env (Linux/Mac)
$ cp .env.example .env

# Clone o arquivo .env.example para .env (Windows)
$ copy .env.example .env

# Configure o arquivo .env com as informações do banco de dados
# Exemplo:
# DB_HOST=localhost
# DB_DATABASE=nome_do_banco
# DB_USERNAME=seu_usuario
# DB_PASSWORD=sua_senha

# Inicie o servidor no Xampp, Laragon ou da forma que preferir

# Acesse o index.php do projeto para a geração do banco de dados
```

# Lista de Tarefas - Backend

Este é o backend do projeto Lista de Tarefas, desenvolvido com Node.js e Express.

## Requisitos

- Node.js
- npm ou yarn
- Banco de dados (ex: MongoDB, MySQL)

## Instalação

1. Clone o repositório:
    ```bash
    git clone https://github.com/seu-usuario/lista-de-tarefas-back.git
    ```
2. Navegue até o diretório do projeto:
    ```bash
    cd lista-de-tarefas-back
    ```
3. Instale as dependências:
    ```bash
    npm install
    ```
    ou
    ```bash
    yarn install
    ```

## Configuração

1. Crie um arquivo `.env` na raiz do projeto e configure as variáveis de ambiente necessárias:
    ```env
    PORT=3000
    DB_CONNECTION_STRING=sua-string-de-conexao
    ```

## Execução

1. Inicie o servidor:
    ```bash
    npm start
    ```
    ou
    ```bash
    yarn start
    ```

## Endpoints

- `GET /tarefas` - Lista todas as tarefas
- `POST /tarefas` - Cria uma nova tarefa
- `PUT /tarefas/:id` - Atualiza uma tarefa existente
- `DELETE /tarefas/:id` - Remove uma tarefa

## Contribuição

1. Faça um fork do projeto
2. Crie uma nova branch (`git checkout -b feature/nova-feature`)
3. Faça suas alterações e commit (`git commit -am 'Adiciona nova feature'`)
4. Envie para o repositório remoto (`git push origin feature/nova-feature`)
5. Abra um Pull Request

## Licença

Este projeto está licenciado sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
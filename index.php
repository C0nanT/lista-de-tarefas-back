<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Tarefas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
        }

        .button {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Lista de Tarefas Backend</h1>
        <button class="button" onclick="window.location.href='Migrations/CreateTarefas.php'">Criar ou Alimentar a tabela Tarefas</button>
    </div>
</body>

</html>
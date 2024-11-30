<?php

require_once '../api/Classes/Database.php';

try {

    $pdo = Database::getInstance()->getConnection();

    $result = $pdo->query("SHOW TABLES LIKE 'Tarefas'");
    if ($result->rowCount() > 0) {
        echo "A tabela 'Tarefas' já existe.";
        exit;
    }

    $sql = "
        CREATE TABLE IF NOT EXISTS Tarefas (
            id INT AUTO_INCREMENT PRIMARY KEY,
            text VARCHAR(255) NOT NULL,
            done BOOLEAN NOT NULL DEFAULT FALSE,
            category VARCHAR(50) NOT NULL,
            doneAt DATE,
            createdAt DATE NOT NULL,
            `limit` DATE 
        );
    ";


    $pdo->exec($sql);
    echo "Tabela 'Tarefas' criada com sucesso.\n";

    $data = [
        ['text' => 'Planejar o Layout', 'done' => 0, 'category' => 'Frontend', 'doneAt' => NULL, 'createdAt' => '2023-10-26', 'limit' => '2025-12-30'],
        ['text' => 'Criar o Header', 'done' => 0, 'category' => 'Frontend', 'doneAt' => NULL, 'createdAt' => '2023-10-26', 'limit' => NULL],
        ['text' => 'Planejar o Backend', 'done' => 0, 'category' => 'Backend', 'doneAt' => NULL, 'createdAt' => '2023-10-26', 'limit' => '2025-12-30'],
        ['text' => 'Montar o banco de dados', 'done' => 0, 'category' => 'Banco de dados', 'doneAt' => NULL, 'createdAt' => '2023-10-26', 'limit' => '2025-12-30'],
        ['text' => 'Criar o servidor', 'done' => 0, 'category' => 'Backend', 'doneAt' => NULL, 'createdAt' => '2023-10-26', 'limit' => NULL],
    ];

    $stmt = $pdo->prepare("
        INSERT INTO Tarefas (text, done, category, doneAt, createdAt, `limit`)
        VALUES (:text, :done, :category, :doneAt, :createdAt, :limit)
    ");

    foreach ($data as $item) {
        $stmt->execute($item);
    }

    echo "Dados inseridos com sucesso.\n";

} catch (PDOException $e) {
    echo "Erro ao criar a tabela ou inserir os dados: " . $e->getMessage();
}

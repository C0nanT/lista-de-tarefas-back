<?php

require_once '../api/Classes/Database.php';
require_once '../vendor/autoload.php';

try {
    $pdo = Database::getInstance()->getConnection();
    $faker = Faker\Factory::create();

    $result = $pdo->query("SHOW TABLES LIKE 'Tarefas'");

    if ($result->rowCount() > 0) {
        $pdo->exec("DROP TABLE Tarefas");
    }

    $sql = "CREATE TABLE IF NOT EXISTS Tarefas (
                id INT AUTO_INCREMENT PRIMARY KEY,
                text VARCHAR(255) NOT NULL,
                done BOOLEAN NOT NULL DEFAULT FALSE,
                category VARCHAR(50) NOT NULL DEFAULT 'Outros',
                doneAt DATE,
                createdAt DATE NOT NULL DEFAULT CURRENT_DATE,
                limit_date DATE);";

        $pdo->exec($sql);
    echo "Tabela 'Tarefas' criada com sucesso.<br>";
    
    $data = [];
    $categories = ['Frontend', 'Backend', 'Banco de dados', 'DevOps', 'Mobile', 'Outros'];

    for ($i = 0; $i < 10; $i++) {
        $data[] = [
            'text' => $faker->sentence,
            'done' => $faker->boolean ? 1 : 0,
            'category' => $faker->randomElement($categories),
            'doneAt' => $faker->optional()->date,
            'createdAt' => $faker->date,
            'limit_date' => $faker->optional()->date
        ];
    }

    $stmt = $pdo->prepare("
            INSERT INTO Tarefas (text, done, category, doneAt, createdAt, limit_date)
            VALUES (:text, :done, :category, :doneAt, :createdAt, :limit_date)
    ");

    foreach ($data as $item) {
        $stmt->execute($item);
    }

    echo "Dados inseridos com sucesso.<br>";

} catch (PDOException $e) {
    echo "Erro ao criar a tabela ou inserir os dados: " . $e->getMessage();
}
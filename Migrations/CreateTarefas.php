<?php

require_once '../api/Classes/Database.php';
require_once '../vendor/autoload.php';

try {
    $pdo = Database::getInstance()->getConnection();
    $faker = Faker\Factory::create();

    $result = $pdo->query("SHOW TABLES LIKE 'Tasks'");

    if ($result->rowCount() > 0) {
        $pdo->exec("DROP TABLE Tasks");
    }

    $sql = "CREATE TABLE IF NOT EXISTS Tasks (
        id INT AUTO_INCREMENT PRIMARY KEY,
        description VARCHAR(255) NOT NULL,
        done BOOLEAN NOT NULL DEFAULT FALSE,
        category VARCHAR(50) NOT NULL DEFAULT 'Outros',
        doneAt DATE,
        createdAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        limit_date DATE
    );";

    $pdo->exec($sql);

    echo "Tabela 'Tasks' criada com sucesso.<br>";
    
    $data = [];
    $categories = ['Frontend', 'Backend', 'Banco de dados', 'DevOps', 'Mobile', 'Outros'];

    for ($i = 0; $i < 10; $i++) {
        $data[] = [
            'description' => $faker->sentence,
            'done' => $faker->boolean ? 1 : 0,
            'category' => $faker->randomElement($categories),
            'doneAt' => $faker->optional()->date,
            'createdAt' => date('Y-m-d'),
            'limit_date' => $faker->optional()->date
        ];
    }

    $stmt = $pdo->prepare("
            INSERT INTO Tasks (description, done, category, doneAt, createdAt, limit_date)
            VALUES (:description, :done, :category, :doneAt, :createdAt, :limit_date)
    ");

    foreach ($data as $item) {
        $stmt->execute($item);
    }

    echo "Dados inseridos com sucesso.<br>";

} catch (PDOException $e) {
    echo "Erro ao criar a tabela ou inserir os dados: " . $e->getMessage();
}
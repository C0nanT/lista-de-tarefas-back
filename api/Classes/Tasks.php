<?php
class Tasks
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createTask($description, $category, $limit_date)
    {
        $sql = "INSERT INTO Tasks (description, category, limit_date) VALUES (:description, :category, :limit_date)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':limit_date', $limit_date);
        return $stmt->execute();
    }

    public function getTasks()
    {
        $sql = "SELECT * FROM Tasks";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTaskById($id)
    {
        $sql = "SELECT * FROM Tasks WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateTask($id, $description, $category, $limit_date)
    {
        $sql = "UPDATE Tasks SET description = :description, category = :category, limit_date = :limit_date WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':limit_date', $limit_date);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            throw new Exception("Nenhuma tarefa foi atualizada. Verifique o ID ou os dados fornecidos.");
        }
    }

    public function deleteTask($id)
    {
        $sql = "DELETE FROM Tasks WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            throw new Exception("Nenhuma tarefa foi deletada. Verifique o ID fornecido.");
        }

        return true;
    }
}
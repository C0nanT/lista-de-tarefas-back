<?php
class Tarefas
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createTarefa($text, $category, $limit_date)
    {
        $sql = "INSERT INTO Tarefas (text, category, limit_date) VALUES (:text, :category, :limit_date)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':limit_date', $limit_date);
        return $stmt->execute();
    }

    public function getTarefas()
    {
        $sql = "SELECT * FROM Tarefas";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTarefaById($id)
    {
        $sql = "SELECT * FROM Tarefas WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateTarefa($id, $text, $category, $limit_date)
    {
        $sql = "UPDATE Tarefas SET text = :text, category = :category, limit_date = :limit_date WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':limit_date', $limit_date);
        return $stmt->execute();
    }

    public function deleteTarefa($id)
    {
        $sql = "DELETE FROM Tarefas WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
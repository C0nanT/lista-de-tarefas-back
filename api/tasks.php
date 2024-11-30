<?php
include_once 'utils.php';
include_once 'Classes/Tasks.php';

$data = json_decode(file_get_contents('php://input'), true);

logMessage("Requisição recebida: " . $_SERVER['REQUEST_METHOD']);
logMessage("Dados recebidos: " . json_encode($data, JSON_UNESCAPED_UNICODE));

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: *");

    $description = isset($data['description']) ? trim($data['description']) : '';
    $category = isset($data['category']) ? trim($data['category']) : '';
    $limitDate = isset($data['limit_date']) ? trim($data['limit_date']) : '';

    $errors = [];

    if (empty($description)) {
        $errors[] = 'O campo Descrição é obrigatório.';
    }

    if (empty($category)) {
        $errors[] = 'O campo Categoria é obrigatório.';
    }

    if (!empty($limitDate) && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $limitDate)) {
        $errors[] = 'A data limite deve estar no formato YYYY-MM-DD.';
    }

    if (!empty($errors)) {
        logMessage("Erros de validação: " . json_encode($errors, JSON_UNESCAPED_UNICODE));
        echo json_encode(['status' => 'ERROR', 'errors' => $errors], JSON_UNESCAPED_UNICODE);
        exit;
    } else {
        try {
            $tarefas = new Tasks($pdo);

            $tarefas->createTask($description, $category, $limitDate);

            logMessage("Tarefa criada com sucesso: " . json_encode($data, JSON_UNESCAPED_UNICODE));
            echo json_encode(['status' => 'OK', 'message' => 'Tarefa criada com sucesso!'], JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            logMessage("Erro ao criar tarefa: " . $e->getMessage());
            echo json_encode(['status' => 'ERROR', 'error' => '#01 - ' . $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $tarefas = new Tasks($pdo);

        $tasks = $tarefas->getTasks();

        logMessage("Tarefas recuperadas com sucesso");
        echo json_encode(['status' => 'OK', 'tasks' => $tasks], JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        logMessage("Erro ao recuperar tarefas: " . $e->getMessage());
        echo json_encode(['status' => 'ERROR', 'error' => '#01 - ' . $e->getMessage()], JSON_UNESCAPED_UNICODE);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $id = isset($data['id']) ? (int) $data['id'] : 0;
    $description = isset($data['description']) ? trim($data['description']) : '';
    $category = isset($data['category']) ? trim($data['category']) : '';
    $limitDate = isset($data['limit_date']) ? trim($data['limit_date']) : '';

    $errors = [];

    if ($id <= 0) {
        $errors[] = 'O campo ID é obrigatório.';
    }

    if (empty($description)) {
        $errors[] = 'O campo Descrição é obrigatório.';
    }

    if (empty($category)) {
        $errors[] = 'O campo Categoria é obrigatório.';
    }

    if (!empty($limitDate) && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $limitDate)) {
        $errors[] = 'A data limite deve estar no formato YYYY-MM-DD.';
    }

    if (!empty($errors)) {
        logMessage("Erros de validação: " . json_encode($errors, JSON_UNESCAPED_UNICODE));
        echo json_encode(['status' => 'ERROR', 'errors' => $errors], JSON_UNESCAPED_UNICODE);
        exit;
    } else {
        try {
            $tarefas = new Tasks($pdo);

            $tarefas->updateTask($id, $description, $category, $limitDate);

            logMessage("Tarefa atualizada com sucesso: " . json_encode($data, JSON_UNESCAPED_UNICODE));
            echo json_encode(['status' => 'OK', 'message' => 'Tarefa atualizada com sucesso!'], JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            logMessage("Erro ao atualizar tarefa: " . $e->getMessage());
            echo json_encode(['status' => 'ERROR', 'error' => '#01 - ' . $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = isset($data['id']) ? (int) $data['id'] : 0;

    if ($id <= 0) {
        logMessage("Erro de validação: O campo ID é obrigatório.");
        echo json_encode(['status' => 'ERROR', 'errors' => ['O campo ID é obrigatório.']], JSON_UNESCAPED_UNICODE);
        exit;
    } else {
        try {
            $tarefas = new Tasks($pdo);

            $tarefas->deleteTask($id);

            logMessage("Tarefa excluída com sucesso: ID " . $id);
            echo json_encode(['status' => 'OK', 'message' => 'Tarefa excluída com sucesso!'], JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            logMessage("Erro ao excluir tarefa: " . $e->getMessage());
            echo json_encode(['status' => 'ERROR', 'error' => '#01 - ' . $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
    }
} else {
    logMessage("Método não permitido: " . $_SERVER['REQUEST_METHOD']);
    echo json_encode(['status' => 'ERROR', 'error' => 'Método não permitido.'], JSON_UNESCAPED_UNICODE);
}
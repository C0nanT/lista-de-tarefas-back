<?php
// testa conexão com o banco
include_once 'utils.php';
include_once 'Classes/Tarefas.php';

$tarefas = new Tarefas($pdo);

$tarefas->createTarefa('Estudar PHP', 'PHP', '2024-12-31');

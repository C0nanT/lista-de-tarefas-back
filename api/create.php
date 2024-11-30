<?php
// testa conexão com o banco
require_once 'Classes/Database.php';
var_dump(Database::getInstance()->getConnection());
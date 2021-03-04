<?php

// разрешить CORS запросы Open Server
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Credentials: true');
//----------------------------------------------------------

require_once 'database_connection.php';

$id = intval($_GET['id']);

$query = sprintf("SELECT * FROM users WHERE id = '%d'", $id);
$result = $link->query($query);
$row = $result->fetch_assoc();

echo json_encode($row);

?>
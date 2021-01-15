<?php

// разрешить CORS запросы Open Server
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Credentials: true');
//----------------------------------------------------------


require_once 'database_connection.php';

$query = sprintf("SELECT friends FROM users WHERE id = '%d'", 8);
$result = $link->query($query);
$row = $result->fetch_row();
$array_id = explode(", ", $row[0]);
$friends = [];

for ($i = 0; $i <= count($array_id) - 1; $i++) {
  $query = sprintf("SELECT id, name, photo, status FROM users WHERE id = '%d'", $array_id[$i]);
  $result = $link->query($query);
  $row = $result->fetch_assoc();

  array_push($friends, $row);
}

echo json_encode($friends);

?>
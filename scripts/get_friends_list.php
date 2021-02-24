<?php

// разрешить CORS запросы Open Server
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Credentials: true');
//----------------------------------------------------------


require_once 'database_connection.php';

$page = intval($_GET['page']);
$count = intval($_GET['count']);
$trimCount = ($count * $page) - $count;

$query = sprintf("SELECT friends FROM users WHERE id = '%d'", 8);
$result = $link->query($query);
$row = $result->fetch_row();
$array_id = explode(", ", $row[0]);
$trim_array_id = [];
$counter = 0;

for ($i = 0; $i <= count($array_id) - 1; $i++) {
  if($i >= $trimCount) {
    array_push($trim_array_id, $array_id[$i]);
    $counter++;
  }
  if ($counter === $count) break;
}

$friends = [];

for ($i = 0; $i <= count($trim_array_id) - 1; $i++) {
  $query = sprintf("SELECT id, name, photo, status FROM users WHERE id = '%d'", $trim_array_id[$i]);
  $result = $link->query($query);
  $row = $result->fetch_assoc();

  array_push($friends, $row);
}

$data['totalCount'] = count($array_id) - 1;
$data['friends'] = $friends;

echo json_encode($data);

?>
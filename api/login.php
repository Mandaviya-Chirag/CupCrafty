<?php

require '../includes/init.php';
header("Content-type:application/json");

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM Users WHERE Username =? AND Password =?";
$params = [$username, $password];

$result = selectOne($query, $params);
if ($result) {
    echo json_encode(["success" => true]);
    $_SESSION['loggedIn'] = true;
    $_SESSION['userId'] = $result['Id'];
} else {
    echo json_encode(["success" => false]);
}
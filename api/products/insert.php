<?php
require '../../includes/init.php';
header("Content-type:application/json");

$categoryId = $_POST['categoryId'];
$Name = $_POST['Name'];
$Description = $_POST['Description'];
$Price = $_POST['Price'];

$time = time();
$fileName = "$time-" . $_FILES['Image']['name']; 
$tmpFileName = $_FILES['Image']['tmp_name'];
move_uploaded_file($tmpFileName, pathOf("assets/img/uploads/$fileName"));

$query = "INSERT INTO Products (categoryId, Name, Description, Price, ImageFileName) VALUES(?,?,?,?,?)";
$params = [$categoryId, $Name, $Description, $Price, $fileName];

$result = execute($query, $params);
if ($result)
    echo json_encode(["success" => true]);
else
    echo json_encode(["success" => false]);
?>
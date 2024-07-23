<?php
require '../../includes/init.php';
header("Content-type:application/json");

$Id = $_POST['Id'];
$categoryId = $_POST['categoryId'];
$Name = $_POST['Name'];
$Description = $_POST['Description'];
$Price = $_POST['Price'];
$Image = $_FILES['Image'];

$time = time();
$fileName = "$time-" . $_FILES['Image']['name'];
$tmpFileName = $_FILES['Image']['tmp_name'];
move_uploaded_file($tmpFileName, pathOf("assets/img/uploads/$fileName"));

$query = "UPDATE Products SET CategoryId=?, Name=?, Description=?, Price=?, ImageFileName=? WHERE Id=?";
$params = [$categoryId, $Name, $Description, $Price, $fileName, $Id];

$result = execute($query, $params);
if ($result)
    echo json_encode(["success" => true]);
else
    echo json_encode(["success" => false]);
?>
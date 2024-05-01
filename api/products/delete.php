<?php

include ('../includes/init.php');

$id = $_GET['id'];

$q = "DELETE FROM just WHERE `id` = $id";
$params = [$id];

$statement = $connection->prepare($q);
$data = $statement->execute($params);

echo "deleted successfully !!";




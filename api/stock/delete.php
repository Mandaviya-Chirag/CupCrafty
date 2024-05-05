<?php

require ('../../includes/init.php');
$Id = $_POST['Id'];
$query = "DELETE FROM stock WHERE Id = ?";
$param = [$Id];
$result = execute($query, $param);
header('location:../../pages/stock/index.php');

?>

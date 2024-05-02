<?php

require ('../../includes/init.php');
$Id = $_POST['Id'];
$query = "DELETE FROM Expense WHERE Id = ?";
$param = [$Id];
$result = execute($query, $param);
header('location:../../pages/expense/index.php');
?>

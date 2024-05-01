<?php

require ('../../includes/init.php');
$Id = $_GET['id'];
$query = "DELETE FROM branchdetails WHERE Id = ?";
$param = [$Id];
$result = execute($query, $param);
header('location:../../pages/branchdetails/index.php');
?>
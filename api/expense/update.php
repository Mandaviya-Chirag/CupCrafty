<?php

require ('../../includes/init.php');
$Id = $_POST["Id"];
$BranchId = $_POST["BranchId"];
$Name = $_POST["Name"];
$Amount = $_POST["Amount"];
$query = "UPDATE  Expense SET BranchId=?, Name=?, Amount=? WHERE Id=?";
$param = [$BranchId, $Name, $Amount, $Id];
$result = execute($query, $param);

?>


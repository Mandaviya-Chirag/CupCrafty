<?php

require ('../../includes/init.php');
$BranchId = $_POST["BranchId"];
$Name = $_POST["Name"];
$Amount = $_POST["Amount"];
$query = "INSERT INTO expense (BranchId, Name, Amount) VALUES (?,?,?)";
$param = [$BranchId, $Name, $Amount];
execute($query, $param);

?>


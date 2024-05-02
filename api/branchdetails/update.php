<?php

require ('../../includes/init.php');
$Id = $_POST["Id"];
$cityId = $_POST["cityId"];
$OwnerName = $_POST["OwnerName"];
$SquareFeet = $_POST["SquareFeet"];
$Address = $_POST["Address"];
$query = "UPDATE  branchdetails SET cityId=?, OwnerName=?, SquareFeet=?, Address=? WHERE Id=?";
$param = [$cityId, $OwnerName, $SquareFeet, $Address, $Id];
$result = execute($query, $param);

?>



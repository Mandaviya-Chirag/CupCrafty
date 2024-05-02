<?php

require ('../../includes/init.php');
$cityId = $_POST["cityId"];
$OwnerName = $_POST["OwnerName"];
$SquareFeet = $_POST["SquareFeet"];
$Address = $_POST["Address"];
$query = "INSERT INTO branchdetails (cityId, OwnerName, SquareFeet, Address) VALUES (?,?,?,?)";
$param = [$cityId, $OwnerName, $SquareFeet, $Address];
execute($query, $param);

?>



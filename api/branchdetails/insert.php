<?php

require ('../../includes/init.php');
$cityId = $_POST["cityId"];
$OwnerName = $_POST["OwnerName"];
$Squarefeet = $_POST["Squarefeet"];
$Address = $_POST["Address"];
$query = "INSERT INTO branchdetails (cityId, OwnerName, Squarefeet, Address) VALUES (?,?,?,?)";
$param = [$cityId, $OwnerName, $Squarefeet, $Address];
execute($query, $param);

?>


<?php

require ('../../includes/init.php');
$roleId = $_POST["roleId"];
$Name = $_POST["Name"];
$Password = $_POST["Password"];
$Mobile = $_POST["Mobile"];
$Email = $_POST["Email"];
$Address = $_POST["Address"];
$query = "INSERT INTO users (roleId, Name, Password, Mobile, Email, Address) VALUES (?,?,?,?,?)";
$param = [$roleId, $Name, $Password, $Mobile, $Email, $Address];
execute($query, $param);

?>



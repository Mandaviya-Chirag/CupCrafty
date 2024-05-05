<?php

require ('../../includes/init.php');
$Id = $_POST["Id"];
$roleId = $_POST["roleId"];
$Name = $_POST["Name"];
$Password = $_POST["Password"];
$Mobile = $_POST["Mobile"];
$Email = $_POST["Email"];
$Address = $_POST["Address"];
$query = "UPDATE users SET RoleId=?, Name=?, Password=?, Mobile=?, Email=?, Address=? WHERE Id=?";
$result = execute($query, [$roleId, $Name, $Password, $Mobile, $Email, $Address, $Id]);

?>
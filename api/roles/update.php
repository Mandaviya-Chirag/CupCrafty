<?php

require ('../../includes/init.php');
$Id = $_POST['Id'];
$Name = $_POST['Name'];

$query = "UPDATE roles SET Name=? WHERE Id=?";
$param = [$Name, $Id];
$result = execute($query, $param);

?>
<?php

include 'connection.php';

$id = $_GET['id'];

$q = " DELETE FROM `request` WHERE id = $id ";

mysqli_query($con, $q);

header('location:adminrequest.php');

?>

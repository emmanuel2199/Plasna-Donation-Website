<?php

include 'connection.php';

$id = $_GET['id'];

$q = " DELETE FROM `donor` WHERE id = $id ";

mysqli_query($con, $q);

header('location:admindonor.php');

?>

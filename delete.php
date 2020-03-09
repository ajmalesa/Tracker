<?php 
	require 'php/connect.php';

	$id = $_GET['reference'];
	$sql = "DELETE FROM `bugs` WHERE `bugs`.`id` = $id";

	$result = mysqli_query($conn, $sql);	
	
	mysqli_close($conn);

	header("Location: index.php");
	exit;
?>
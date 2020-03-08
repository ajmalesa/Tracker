<?php 
	require 'php/connect.php';

	if(!empty($_POST['descriptionInput'])) {
		$description = $_POST['descriptionInput'];
		$software = $_POST['softwareInput'];
		$priority = $_POST['priorityInput'];

		// Use session from previous page to retrieve id value without having to query database again
		session_start();
		$id  = $_SESSION['id'];

		$sql = "UPDATE `bugs` 
				SET `description` = '$description', 
					`software` = '$software', 
					`priority` = '$priority' 
				WHERE `bugs`.`id` =  $id";

		$result = mysqli_query($conn, $sql);	
	} else {
		header("Location: index.php");
	}
	
	mysqli_close($conn);

	header("Location: index.php");
	exit;
?>
<?php 
	require 'php/connect.php';

	if(!empty($_POST['descriptionInput'])) {
		$description = $_POST['descriptionInput'];
		$software = $_POST['softwareInput'];
		$priority = $_POST['priorityInput'];

		$sql = "INSERT INTO bugs (description, software, priority, timestamp, user) VALUES ('$description', '$software', '$priority', current_timestamp(), 'admin');";

		$result = mysqli_query($conn, $sql);	
	} else {
		header("Location: index.php");
	}
	
	mysqli_close($conn);

	header("Location: index.php");
	exit;
?>
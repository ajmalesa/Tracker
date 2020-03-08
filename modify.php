<?php
	require 'php/connect.php';

	$sql = "SELECT * FROM bugs WHERE id='" . $_GET['reference'] . "'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	// Use a session to retain id value for next page (the update.php page where we need the reference id)
	session_start();
	$_SESSION['id'] = $row['id'];
?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<title>Tracker</title>

		<link rel="icon" type="image/png" href="img/favicon.png">
	</head>

	<body>

		<div class='container-fluid'>

			<header>
				<a href="index.php"><h1>Tracker</h1></a>
			</header>

			<form action="update.php" method="POST">
				<div class="form-group w-50 p-3">
					<label for="descriptionInput">Description</label>
					<input type="text" name="descriptionInput" class="form-control" value="<?php echo $row['description'];?>" required>
				</div>
				<div class="form-group w-50 p-3">
					<label for="softwareInput">Application</label>
					<input type="text" name="softwareInput" class="form-control" value="<?php echo $row['software'];?>" required>
				</div>
				<div class="form-group w-50 p-3">
					<label for="priorityInput">Priority</label>
					<select name="priorityInput" class="form-control" required>
						<option value="low" <?php if($row['priority'] === 'low') echo "selected";?>>Low</option>
						<option value="medium" <?php if($row['priority'] === 'medium') echo "selected";?>>Medium</option>
						<option value="urgent" <?php if($row['priority'] === 'urgent') echo "selected";?>>Urgent</option>
					</select>
				</div>

				<button type="submit" id="submit_button" class="btn btn-dark">Update</button>
			</form>
			
		</div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="js/removeBanner.js"></script>
	</body>
</html>
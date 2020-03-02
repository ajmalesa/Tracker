<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<title>Tracker</title>

		<link rel="icon" type="image/png" href="img/favicon.png">
	</head>

	<body>

		<?php require 'php/connect.php';?>


		<div class='container-fluid'>

			<header>
				<a href="index.php"><h1>Tracker</h1></a>
			</header>
			
			<div class='row-fluid'>
				<div class='span11'>
					<div class='table-responsive'>
						<table class="table table-hover table-dark table-striped" id="my_table">
							<div class="my-table-rules">
								<thead>
									<tr>
										<th scope="col">Reference</th>
										<th scope="col">Software</th>
										<th scope="col">Description</th>
										<th scope="col">Priority</th>
										<th scope="col">Created</th>
										<th scope="col">User</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql = "SELECT * FROM bugs";
										$result = mysqli_query($conn, $sql);

										if(mysqli_num_rows($result) > 0) {
											// Populate bootstrap table using database
											while($row = mysqli_fetch_assoc($result)) {
												echo 
													"<tr>
														<th scope='row'>" . $row["id"] . "</th>
														<td>" . $row["software"] . "</td>
														<td>" . $row["description"] . "</td>
														<td>" . $row["priority"] . "</td>
														<td>" . $row["timestamp"] . "</td>
														<td>" . $row["user"] . "</td>
													</tr>";
											}
										} else {
											echo "no results";
										}

										mysqli_close($conn);
									?>
								</tbody>
							</div>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<a class="btn btn-dark" href="new.php" role="button">Report bug or request feature</a>
		</div>
		


		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="js/removeBanner.js"></script>

		<script>
			$(document).ready( function () {
    			$('#my_table').DataTable({"paging":   false,});

			} );
		</script>
	</body>
</html>
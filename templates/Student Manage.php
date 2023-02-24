<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Management</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Student Management
				<form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="search by name">
				</form>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Code</th>
							<th>FullName</th>
							<th>Email</th>
                            <th>Image</th>
                            <th>Class</th>
							<!-- <a href="Add_Student.html">ADD</a> -->
							<!-- <td><button class="btn btn-success"href="Add_Student.php">Add</button></td> -->
							<a class="btn btn-success" href="Add_Student.php">Add</a>
							<a class="btn btn-success" href="Edit_student.php">Edit</a>
							<!-- <td><button class="btn btn-warning"href="delete_student.php">Edit</button></td> -->
							<td><button class="btn btn-danger"href="Delete_student.php">Delete</button></td>

							<!-- <a class="btn btn-success" href="">Edit</a>

                            <a class="btn btn-success" href="">Delele</a> -->
					</thead>
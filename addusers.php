<?php
include './config/connection.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="./assets/css/bootstrap.css">
	<link rel="shortcut icon" href="./assets/img/MoozLogo.png" type="image/x-icon">
	<link rel="stylesheet" href="./assets/css/custom.css?v=1.1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<title>Mooz</title>
</head>

<body class="d-flex flex-column gap-4 h-100">
	<div class="img vw-100">
		<div>
			<?php include 'navbar.php' ?>
		</div>
		<div class="content m-5 p-5 rounded-4 bg-body-tertiary">
			<div class="d-flex flex-column gap-5 justify-content-center align-items-center">
				<h1 class="fw-bolder border-bottom" style="color: #0077B6;">ADD USER</h1>
				<div class="slide-in-bottom w-50">
					<form method="POST" enctype="multipart/form-data">
						<div class="mb-3">
							<label for="inputName" class="form-label">Name</label>
							<input type="text" name="name" class="form-control" id="inputName">
						</div>
						<div class="mb-3">
							<label for="inputPassword" class="form-label">Images</label>
							<input type="file" name="image[]" class="form-control" id="inputPassword" accept="image/jpg, image/png, image/jpeg, image/svg">
						</div>
						<button name="addusers" class="btn gradient-custom-2 border-0 text-white fw-bolder">Submit</button>
					</form>
				</div>
			</div>

		</div>
	</div>
	<?php
	if (isset($_POST["addusers"])) {

		$imagename = $_FILES["image"]["name"];
		$imagelocation = $_FILES["image"]["tmp_name"];
		move_uploaded_file($imagelocation[0], "./images/" . $imagename[0]);
		$result = $connection->query("INSERT INTO users VALUES('', '$_POST[name]', '$imagename[0]')");
		$users_recently = $connection->insert_id;

		foreach ($imagename as $key => $recent_name) {
			$recent_location = $imagelocation[$key];
			move_uploaded_file($recent_location, "./images/" . $recent_name);
			$result_now = $connection->query("INSERT INTO users_img(id_users, users_img_name) VALUES('$users_recently','$recent_name')");
		}

		if ($result and $result_now) {
			echo "<script>alert('Data added successfully');window.location='userslist.php';</script>";
		}
	}
	?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
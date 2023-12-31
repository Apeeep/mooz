﻿<?php
session_start();
include './config/connection.php';

if (!isset($_SESSION['admin'])) {
	header('location:login.php');
}

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
				<h1 class="fw-bolder border-bottom" style="color: #0077B6;">Welcome to Mooz Camera</h1>
				<h3 class="w-50 text-center" style="color: #0077B6;">The Mooz Meeting application is a useful tool for businesses, education, or personal purposes that require remote communication through video conferencing. Although the name "Zoom" has been replaced with "Mooz," the basic concept and functionality remain the same, so users will find it familiar to use.</h3>
				<a href="userslist.php" class="btn gradient-custom-2 text-white border-0 fw-bolder">
					<h4 class="m-0 p-3"><i class="bi bi-box-arrow-up-right"></i> Go to User List</h4>
				</a>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
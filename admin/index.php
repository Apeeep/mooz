<?php
session_start();
include '../config/connection.php';

if (!isset($_SESSION['admin'])) {
	header('location:login.php');
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="shortcut icon" href="../assets/img/MoozLogo.png" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<title>Mooz</title>
	<style>
		* {
			font-family: 'Open Sans', sans-serif;
		}

		.gradient-custom-2 {
			/* fallback for old browsers */
			background: #fccb90;

			/* Chrome 10-25, Safari 5.1-6 */
			background: -webkit-linear-gradient(to right, #48CAE4, #00B4D8, #0096C7, #0077B6);

			/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
			background: linear-gradient(to right, #48CAE4, #00B4D8, #0096C7, #0077B6);
		}
	</style>
</head>

<body style="background-color: #EEEEEE;" class="d-flex flex-column gap-4">
	<div>
		<?php include 'navbar.php' ?>
	</div>
	<div class="p-5 rounded-5 bg-white">
		<h2 class="border-bottom mb-3">USER DATA</h2>
		<table class="table table-hover align-middle">
			<thead class="table-light">
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Picture</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php $get = $connection->query("SELECT * FROM users") ?>
				<?php while ($data = $get->fetch_assoc()) : ?>
					<tr>
						<td>
							<?= $no; ?>
						</td>
						<td>
							<?= $data["users_name"]; ?>
						</td>
						<td>
							<img src="../images/<?= $data["users_img"]; ?>" width="100">
						</td>
						<td class="">
							<a href="index.php?page=updateusers&id=<?= $data['id_users']; ?>" class="btn btn-warning">CHANGE</a>
							<a href="deleteusers.php?id=<?= $data['id_users']; ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger">DELETE</a>
						</td>
					</tr>
					<?php $no++; ?>
				<?php endwhile; ?>
			</tbody>
		</table>
		<a href="addusers.php" class="btn btn-primary">Tambah Data Produk</a>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
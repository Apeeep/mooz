<?php
session_start();
include '../config/connection.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="shortcut icon" href="../assets/img/MoozLogo.png" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<title>Login</title>
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

		.img {
			background: url("../assets/img/Hexagon.svg");
			width: 100%;
			height: 100%;
			-webkit-animation: bg-pan-left 30s cubic-bezier(0.785, 0.135, 0.150, 0.860) infinite both;
			animation: bg-pan-left 30s cubic-bezier(0.785, 0.135, 0.150, 0.860) infinite both;
		}

		@-webkit-keyframes bg-pan-left {
			0% {
				background-position: 0% 100%;
			}

			25% {
				background-position: 100% 0%;
			}

			50% {
				background-position: 100% 100%;
			}

			75% {
				background-position: 0% 0%;
			}

			100% {
				background-position: 0% 100%;
			}
		}

		@keyframes bg-pan-left {
			0% {
				background-position: 0% 100%;
			}

			25% {
				background-position: 100% 0%;
			}

			50% {
				background-position: 100% 100%;
			}

			75% {
				background-position: 0% 0%;
			}

			100% {
				background-position: 0% 100%;
			}

		}

		@media (min-width: 768px) {
			.gradient-form {
				height: 100vh !important;
			}
		}

		@media (min-width: 769px) {
			.gradient-custom-2 {
				border-top-right-radius: .3rem;
				border-bottom-right-radius: .3rem;
			}
		}
	</style>
</head>



<body class="vh-100 d-flex flex-column justify-content-center">
	<section class="h-100 gradient-form" style="background-color: #eee;">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-xl-10">
					<div class="card rounded-3 text-black">
						<div class="row g-0">
							<div class="col-lg-6">
								<div class="card-body p-md-5 mx-md-4">
									<div class="text-center">
										<img src="../assets/img/MoozLogo.png" style="width: 100px;" alt="logo" class="pb-3">
										<h4 class="mb-4 pb-4">Welcome to Mooz</h4>
									</div>
									<form method="POST">
										<p>Please login to your account</p>
										<div class="form-floating mb-3">
											<input type="text" name="user" class="form-control" id="floatingInput" placeholder="name@example.com">
											<label for="floatingInput">Username</label>
										</div>
										<div class="form-floating mb-3">
											<input type="password" name="pass" class="form-control" id="floatingInput" placeholder="name@example.com">
											<label for="floatingInput">Password</label>
										</div>
										<div class="text-center pt-1 mb-5 pb-1 d-grid">
											<button class="btn btn-primary gradient-custom-2 mb-3 border-0" name="login">LOGIN</button>
											<a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="#!">Forgot password?</a>
										</div>
									</form>
								</div>
							</div>
							<div class="position-relative overflow-hidden col-lg-6 d-flex align-items-center gradient-custom-2">
								<span class="img d-flex justify-content-center align-items-center">
									<?php if (isset($_POST['login'])) {
										$user = $_POST['user'];
										$pass = $_POST['pass'];
										$get = $connection->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password='$_POST[pass]'");
										$suitable = $get->num_rows;

										if (empty($user) || empty($pass)) { ?>
											<span class="d-flex flex-column justify-content-center align-items-center" style="filter :drop-shadow(0px 0px 3px black)">
												<i class="bi bi-exclamation-triangle text-white fs-1"></i>
												<h4 class="text-white text-center fw-bold w-50">Username atau Password tidak boleh kosong</h4>
											</span>
										<?php } else if ($suitable == 1) {
											$_SESSION['admin'] = $get->fetch_assoc(); ?>
											<span class="d-flex flex-column justify-content-center align-items-center" style="filter :drop-shadow(0px 0px 3px black)">
												<i class="bi bi-check-lg text-white fs-1"></i>
												<h4 class="text-white text-center fw-bold w-100">Berhasil Login</h4>
											</span>
											<meta http-equiv='refresh' content='1;url=index.php'>
										<?php } else { ?>
											<span class="d-flex flex-column justify-content-center align-items-center" style="filter :drop-shadow(0px 0px 3px black)">
												<i class="bi bi-exclamation-triangle text-white fs-1"></i>
												<h4 class="text-white text-center fw-bold w-50">Username atau Password salah</h4>
											</span>
									<?php }
									}
									?>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- font awesome icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
	<!-- Custom CSS file -->
	<link rel="stylesheet" href="adstyle.css">

	<title>Login</title>



</head>

<body>
	<main id="login-main" class=" ">
		<div id="login-left" class="color-primary-bg-light">
			<div class="logo">
				<img src="../assets/admin/adminLogo.jpg" alt="TechMagAdmin">
			</div>
		</div>
		<div id="login-right" class="bg-light">
			<div class="card col-md-8">
				<div class="card-body">
					<form action="Admin Partials/_handleLogin.php" method="post">
						<div class="form-group">
							<label for="userName" class="control-label"><b>Логин</b></label>
							<input type="text" id="userName" name="userName" class="form-control">
						</div>
						<div class="form-group">
							<label for="password" class="control-label"><b>Пароль</b></label>
							<input type="password" id="password" name="password" class="form-control">
						</div>
						<center><button type="submit" class="btn-sm btn-block button-std col-md-4 border-0 ">Войти</button>
						</center>
					</form>
				</div>
			</div>
		</div>
	</main>

	<?php
	if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false") {
		echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Неверные данные. <strong>В доступе отказано!</strong> 
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                </div>';
	}
	?>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
</body>

</html>
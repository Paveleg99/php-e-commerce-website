<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title id="title">Computer Shop</title>

	<!-- Bootstrap CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- Owl-carousel CDN -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

	<!-- font awesome icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

	<!-- google icons -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<!-- Custom CSS file -->
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="wrapper">
		<div class="main-content">
			<!-- start #header -->
			<header id="header">

				<?php
				session_start();
				if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
					$loggedin = true;
					$userID = $_SESSION['userID'];
					$userName = $_SESSION['userName'];
				} else {
					$loggedin = false;
					$userID = 0;
				}
				?>

				<!-- Primary Navigation -->
				<nav class="navbar navbar-expand-lg navbar-light color-light ">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<a class="navbar-brand color-gradient font-size-26" href="index.php">Техно Маг</a>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav mr-auto mb-2 mb-lg-0 font-rubik">
							<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false"> Категории </a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<?php
									$sql = "SELECT categoryName, categoryID FROM `category`";
									$result = mysqli_query($con, $sql);
									while ($row = mysqli_fetch_assoc($result)) {
										echo '<li><a class="dropdown-item" href="productList.php?catID=' . $row['categoryID'] . '">' . $row['categoryName'] . '</a></li>';
									} ?>
								</ul>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#topSale">Популярное</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#specialPrice">Скидки</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#newPhones">Новинки</a>
							</li>
							<form class="form-search form-inline" action="productSearch.php">
								<input class="search-area form-control" type="search" name="search" id="search" placeholder="Найти товар" aria-label="Search">
								<button class="btn  my-sm-0 py-0" type="submit"><span class="font-size-18 "><i class="fas fa-search"></i></span></button>
							</form>
						</ul>

						<div class="utility-buttons ">
							<ul class="navbar-nav mr-auto   font-rubik">
								<?php
								if ($loggedin) {
								?>

									<li class="nav-item dropdown  ">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"> Добро пожаловать <?php echo $userName ?></a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<a class="dropdown-item" href="orderList.php">Мои заказы</a>
											<a class="dropdown-item" href="Partial Templates/_logout.php">Выйти</a>
										</div>
									</li>

									<div class="text-center image-size-small position-relative">
										<a href=""><img src="assets/users/<?php echo $userID ?>.jpg" class="rounded-circle" onError="this.src ='./assets/users/profilePic.jpg';" style="width:30px; height:30px"></a>
									</div>
								<?php  } else {
								?>
									<li class="nav-item my-2">
										<form action="#" role="button" data-toggle="modal" data-target="#loginModal" class="mx-3 font-size-16 font-rale color-gradient">
											<a href="#" class="">
												<span><i class="material-icons">person</i></span>

											</a>
										</form>
									</li>
								<?php } ?>
								<li class="nav-item my-2">
									<form action="#" class=" whish-button mx-lg-3 font-size-14 font-rale">
										<a href="#" class="py-2 rounded-pill color-primary-bg">
											<span class="font-size-16 px-2 text-white"><i class="far fa-heart"></i></span>
											<span class="px-3 py-2 rounded-pill text-dark bg-light">0</span>
										</a>
									</form>
								</li>
								<li class="nav-item my-2">
									<form action="" class="cart-button font-size-14  font-rale">
										<?php
										$countsql = "SELECT SUM(`cartItemQuantity`) FROM `cart` WHERE `userID`=$userID";
										$countresult = mysqli_query($con, $countsql);
										$countrow = mysqli_fetch_assoc($countresult);
										$count = $countrow['SUM(`cartItemQuantity`)'];
										if (!$count) {
											$count = 0;
										} ?>
										<a href="cart.php" class="py-2 rounded-pill color-primary-bg">
											<span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
											<span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo $count ?></span>
										</a>
									</form>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				<!-- !Primary Navigation -->
				<?php
				include 'Partial Templates/_loginModal.php';
				include 'Partial Templates/_signupModal.php';

				if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
					echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Поздравляю!</strong> Вы зарегистрировались на сайте.
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
				  </div>';
				}
				if (isset($_GET['error']) && $_GET['signupsuccess'] == "false") {
					echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Ошибка!</strong> ' . $_GET['error'] . '
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
				  </div>';
				}
				if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "true") {
					echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Поздравляю!</strong> Вы авторизовались в системе
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
				  </div>';
				}
				if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false") {
					echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Ошибка!</strong> Неправильные логин или пароль
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
				  </div>';
				}
				?>


			</header>
			<!-- !start #header -->

			<!-- start #main-site -->
			<main id="main-site">
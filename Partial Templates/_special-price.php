	<section id="specialPrice" class="">
		<div class="container py-5 ">
			<div class="title_container">
				<h4 class="font-rubik font-size-20 font-weight-title">Выгодная цена</h4>
				<hr>
			</div>
			<div class="row">
				<?php
				$sql = "SELECT * FROM `product` WHERE productRating>=3.50  ORDER BY productPrice ASC LIMIT 16 ";
				$result = mysqli_query($con, $sql);
				while ($row = mysqli_fetch_assoc($result)) {
					$productID = $row['productID'];
					$productName = $row['productName'];
					$productPrice = $row['productPrice'];
					$productRating = $row['productRating'];
					$productImage = $row['productImage']; ?>
					<div class="col-md-6 col-lg-4 col-xl-3 mt-2">
						<div class="card ">
							<div class="card-img">
								<a href="#">
									<img src="<?php echo $productImage ?>" alt="<?php echo $productName ?>">
								</a>
							</div>
							<div class="card-body bg-light text-center">
								<div class="card-name font-montserrat font-size-16 font-weight-normal">

									<span><?php echo $productName ?></span>

								</div>
								<div class="card-rating font-montserrat font-size-16 font-weight-normal">

									<?php echo $productRating ?>

								</div>
								<div class="card-price font-rubik font-size-16 font-weight-normal">
									<span><?php echo $productPrice ?> руб</span>
								</div>
								<div class="card-add-button">
									<?php if ($loggedin) {
										$quaSql = "SELECT `cartItemQuantity` FROM `cart` WHERE productID = '$productID' AND `userID`='$userID'";
										$quaresult = mysqli_query($con, $quaSql);
										$quaExistRows = mysqli_num_rows($quaresult);
										if ($quaExistRows == 0) {
											echo '<form action="Partial Templates/_updateCart.php" method="POST">
                                              			<input type="hidden" name="itemID" value="' . $productID . '">
                                              			<button type="submit" name="addToCart" class="btn color-primary-bg font-size-12 font-rubik font-weight-normal">Добавить
													в корзину</button>';
										} else {
											echo '<a href="cart.php"><button class="btn color-primary-bg font-size-12 font-rubik font-weight-normal">Перейти в корзину</button></a>';
										}
									} else {
										echo '<button class="btn color-primary-bg font-size-12 font-rubik font-weight-normal" data-toggle="modal" data-target="#loginModal">Добавить в корзину</button>';
									}
									echo '</form>'
									?>

								</div>
							</div>
						</div>
					</div>
				<?php }  ?>
			</div>
		</div>
	</section>
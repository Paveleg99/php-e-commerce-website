<section id="newPhones">
	<div class="container py-5">
		<div class="row">
			<div class="col">
				<div class="newPhones_main_container">
					<div class="newPhones_title_container">
						<h4 class="font-rubik font-size-20 font-weight-title">Новые товары</h4>
						<hr>
						<div class="newPhones_nav_container">
							<div class="newPhones_nav newPhones_prev"><i class="fas fa-chevron-left"></i>
							</div>
							<div class="newPhones_nav newPhones_next"><i class="fas fa-chevron-right"></i>
							</div>
						</div>
					</div>
					<div class="newPhones_slider_container">
						<div class="owl-carousel owl-theme">
							<?php
							$sql = "SELECT * FROM `product` ORDER BY productAddDate DESC LIMIT 12 ";
							$result = mysqli_query($con, $sql);
							while ($row = mysqli_fetch_assoc($result)) {
								$productID = $row['productID'];
								$productName = $row['productName'];
								$productPrice = $row['productPrice'];
								$productRating = $row['productRating'];
								$productImage = $row['productImage']; ?>
								<div class="newPhones_item d-flex flex-column align-items-center justify-content-center text-center bg-light">
									<div class="newPhones_product font-rale">
										<div class="product-img">
											<a href="#">
												<img src="<?php echo $productImage ?>" alt="<?php echo $productName ?>">
											</a>
										</div>
										<div class="product-content text-center">
											<div class="product-name font-montserrat font-size-16 font-weight-normal">

												<span><?php echo $productName ?></span>

											</div>
											<div class="product-rating font-montserrat font-size-16 font-weight-normal">

												<?php echo $productRating ?>

											</div>
											<div class="product-price font-rubik font-size-16 font-weight-normal ">
												<span><?php echo $productPrice ?> руб</span>
											</div>
											<div class="product-add-button">
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
				</div>
			</div>
		</div>
	</div>
</section>
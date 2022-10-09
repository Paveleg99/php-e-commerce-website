<section id="shopCart" class="py-3">
	<?php
	if ($loggedin) {
	?>
		<div class="container" id="cont">
			<div class="row">
				<div class="col-lg-12 text-center border rounded color-primary-bg-light my-3">
					<h1 class="font-rubik font-weight-title">Моя корзина</h1>
				</div>
				<div class="col-lg-9 px-0">
					<div class="card wish-list mb-3">
						<table class="table text-center">
							<thead class="thead-light fo ">
								<tr>
									<th scope="col">№</th>
									<th scope="col">Наименование</th>
									<th scope="col">Цена за ед.</th>
									<th scope="col">Количество</th>
									<th scope="col">Цена общая</th>
									<th scope="col">
										<form action="Partial Templates/_updateCart.php" method="POST">
											<button name="removeAllItem" class="btn btn-sm btn-outline-danger">Очистить корзину</button>
											<input type="hidden" name="userID" value="<?php $userID = $_SESSION['userID'];
																						echo $userID ?>">
										</form>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM `cart` WHERE `userID`= $userID";
								$result = mysqli_query($con, $sql);
								$counter = 0;
								$totalPrice = 0;
								$quantotal = 0;
								while ($row = mysqli_fetch_assoc($result)) {
									$productID = $row['productID'];
									$Quantity = $row['cartItemQuantity'];
									$mysql = "SELECT * FROM `product` WHERE productID = $productID";
									$myresult = mysqli_query($con, $mysql);
									$myrow = mysqli_fetch_assoc($myresult);
									$productName = $myrow['productName'];
									$productPrice = $myrow['productPrice'];
									$total = $productPrice * $Quantity;
									$counter++;
									$totalPrice = $totalPrice + $total;
									$quantotal = $quantotal + $Quantity;
								?>
									<tr class="cart_product_row">
										<td><?php echo $counter ?></td>
										<td>
											<div class="product-name font-montserrat font-size-16 font-weight-normal">

												<span><?php echo $productName ?></span>

											</div>
										</td>
										<td>
											<div class="product-price font-rubik font-size-16 font-weight-light ">
												<span><?php echo $productPrice ?>руб</span>
											</div>
										</td>
										<td>
											<form id="frm<?php echo $productID ?>">
												<input type="hidden" name="productID" value="<?php echo $productID ?>">
												<input type="number" name="quantity" value="<?php echo $Quantity ?>" class="text-center" onchange="updateCart(<?php echo $productID ?>)" onkeyup="return false" style="width:60px" min=1 oninput="check(this)" onClick="this.select();">
											</form>
										</td>
										<td>
											<div class="product-price-total font-rubik font-size-16 font-weight-normal ">
												<span><?php echo $total ?>руб</span>
											</div>
										</td>
										<td>
											<form action="Partial Templates/_updateCart.php" method="POST">
												<button name="addToWish" class="btn  btn-sm button-std mb-2 border-0">Отложить
													покупку</button>
												<input type="hidden" name="itemID" value="<?php echo $productID ?>">
												<button name="removeItem" class="btn btn-sm btn-outline-danger ">Удалить</button>
												<input type="hidden" name="itemID" value="<?php echo $productID ?>">

											</form>
										</td>
									</tr>
								<?php
								}
								if ($counter == 0) {
								?><script>
										document.getElementById("cont").innerHTML = '<div class="col-md-12 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>Ваша корзина пуста</strong></h3><a href="index.php" class="btn button-std border-0 cart-btn-transform m-3" data-abc="true">Продолжить покупки</a> </div></div></div></div>';
									</script> <?php
											}
												?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-lg-3 pr-0">
					<div class="card wish-list mb-3">
						<div class="pt-4 border bg-light rounded p-3">
							<h5 class="mb-3 text-uppercase font-weight-bold text-center">Сумма заказа</h5>
							<div class="text-center">
								<span>Вы покупаете товаров<strong> (<?php echo $quantotal ?>)</strong> на сумму: <strong><?php echo $totalPrice ?> руб.</strong>
								</span>
							</div>
							<button type="button" class="btn button-std btn-block my-2 border-0" data-toggle="modal" data-target="#orderDetailModal">Оформить заказ</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	} else {
		echo '<div class="container" style="min-height : 610px;">
        <div class="alert alert-info my-3">
            <font style="font-size:22px"><center>Для доступа к корзине необходимо <strong><a class="alert-link" data-toggle="modal" data-target="#loginModal">авторизоваться</a></strong></center></font>
        </div></div>';
	}
	?>

	<?php include 'Partial Templates/_orderDetailModal.php'; ?>

	<script>
		function check(input) {
			if (input.value <= 0) {
				input.value = 1;
			}
		}

		function updateCart(id) {
			$.ajax({
				url: 'Partial Templates/_updateCart.php',
				type: 'POST',
				data: $("#frm" + id).serialize(),
				success: function(res) {
					location.reload();
				}
			})
		}
	</script>
</section>
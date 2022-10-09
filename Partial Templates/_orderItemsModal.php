<?php
$itemModalSql = "SELECT * FROM `orders` WHERE `userID`= $userID";
$itemModalResult = mysqli_query($con, $itemModalSql);
while ($itemModalRow = mysqli_fetch_assoc($itemModalResult)) {
	$orderID = $itemModalRow['orderID'];

?>

	<!-- Modal -->
	<div class="modal fade" id="orderItem<?php echo $orderID; ?>" tabindex="-1" role="dialog" aria-labelledby="orderItem<?php echo $orderID; ?>" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="orderItem<?php echo $orderID; ?>">Список заказанных товаров</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="container">
						<div class="row">
							<!-- Shopping cart table -->
							<div class="table-responsive">
								<table class="table text">
									<thead>
										<tr>
											<th scope="col" class="border-0 bg-light">
												<div class="px-3">Товар</div>
											</th>
											<th scope="col" class="border-0 bg-light">
												<div class="text-center">Цена</div>
											</th>
											<th scope="col" class="border-0 bg-light">
												<div class="text-center">Количество</div>
											</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$mysql = "SELECT * FROM `orderitems` WHERE orderID = $orderID";
										$myresult = mysqli_query($con, $mysql);
										while ($myrow = mysqli_fetch_assoc($myresult)) {
											$productID = $myrow['productID'];
											$itemQuantity = $myrow['orderItemQuantity'];

											$itemsql = "SELECT * FROM `product` WHERE productID = $productID";
											$itemresult = mysqli_query($con, $itemsql);
											$itemrow = mysqli_fetch_assoc($itemresult);
											$productName = $itemrow['productName'];
											$productPrice = $itemrow['productPrice'];
											$productImage = $itemrow['productImage'];
										?>

											<tr>
												<th scope="row">
													<div class="p-2">
														<img src="<?php echo $productImage ?>" alt="<?php echo $productName ?>" width="70" class="img-fluid ">
														<div class="ml-3 d-inline-block align-middle">
															<h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?php echo $productName ?></a></h5>
														</div>
													</div>
												</th>
												<td class="align-middle text-center"><strong><?php echo $productPrice ?> руб</strong></td>
												<td class="align-middle text-center"><strong><?php echo $itemQuantity ?></strong></td>
											</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
							<!-- End -->
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

<?php
}
?>
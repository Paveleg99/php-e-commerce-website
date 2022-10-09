<?php
ob_start();
// include header.php file
include('Partial Templates/_dbconnect.php');
include('Partial Templates/_header.php');
?>

<section id="orderList" class="">
	<div class="container">
		<div class="table-wrapper" id="empty">
			<div class="table-title color-primary-bg-medium">
				<div class="row">
					<div class="col-sm-4">
						<h2><b>Список заказов</b></h2>
					</div>
					<div class="col-sm-8">
						<a href="" class="btn button-std"><i class="material-icons">&#xE863;</i> <span>Обновить</span></a>
					</div>
				</div>
			</div>

			<table class="table table-striped table-hover text-center">
				<thead>
					<tr>
						<th>ID Заказа</th>
						<th>Адрес</th>
						<th>Номер телефона</th>
						<th style="width:5%;">Количество товаров</th>
						<th>Сумма заказа</th>
						<th>Дата заказа</th>
						<th>Статус заказа</th>
						<th>Товары</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT * FROM `orders` WHERE `userID`= $userID";
					$result = mysqli_query($con, $sql);
					$counter = 0;
					while ($row = mysqli_fetch_assoc($result)) {
						$orderID = $row['orderID'];
						$address = $row['address'];
						$postIndex = $row['postIndex'];
						$phoneNumber = $row['phoneNumber'];
						$amount = $row['orderAmount'];
						$quantity = $row['orderQuantity'];
						$orderDate = $row['orderDate'];
						$orderStatus = $row['orderStatus'];

						$counter++;

						echo '<tr>
                                    <td>' . $orderID . '</td>
                                    <td title="' . $address . '">' . substr($address, 0, 20) . '...</td>
                                    <td>' . $phoneNumber . '</td>
                                    <td>' . $quantity . '</td>
                                    <td>' . $amount . ' руб</td>
                                    <td>' . $orderDate . '</td>
                                    <td><a  href="#"  data-toggle="modal" data-target="#orderStatus' . $orderID . '" class="view color-gradient"><i class="material-icons">&#xE5C8;</i></a></td>
                                    <td><a href="#"  data-toggle="modal" data-target="#orderItem' . $orderID . '" class="view color-gradient" title="Список товаров"><i class="material-icons">&#xE5C8;</i></a></td>
                                    
                                </tr>';
					}

					if ($counter == 0) {
					?> <script>
							document.getElementById("empty").innerHTML = '<div class="col-md-12 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>Сейчас у вас нет заказов.</strong></h3> <a href="index.php" class="btn button-std cart-btn-transform m-3" data-abc="true">Продолжить покупки</a> </div></div></div></div>';
						</script>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<?php include 'Partial Templates/_orderStatusModal.php'; ?>
<?php include 'Partial Templates/_orderItemsModal.php'; ?>
<?php include('footer.php'); ?>
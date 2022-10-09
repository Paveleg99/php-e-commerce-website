<section id="orderList" class="">
	<div class="container" style="margin-top:98px;background: aliceblue;">
		<div class="table-wrapper">
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

			<table class="table table-striped table-hover text-center" id="NoOrder">
				<thead style="background-color: rgb(111 202 203);">
					<tr>
						<th>ID Заказа</th>
						<th>ID Покупателя</th>
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
					$sql = "SELECT * FROM `orders`";
					$result = mysqli_query($con, $sql);
					$counter = 0;
					while ($row = mysqli_fetch_assoc($result)) {
						$orderID = $row['orderID'];
						$userID = $row['userID'];
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
									<td>' . $userID . '</td>
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
					?><script>
							document.getElementById("NoOrder").innerHTML = '<div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%"> У вас пока нет заказов!</div>';
						</script> <?php
								}
									?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<?php include 'Admin Partials/_orderStatusModal.php'; ?>
<?php include 'Admin Partials/_orderItemModal.php'; ?>



<script>
	$(document).ready(function() {
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>
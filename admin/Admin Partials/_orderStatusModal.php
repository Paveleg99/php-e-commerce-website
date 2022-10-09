<?php
$statusModalSql = "SELECT * FROM `orders`";
$statusModalResult = mysqli_query($con, $statusModalSql);
while ($statusModalRow = mysqli_fetch_assoc($statusModalResult)) {
	$orderID = $statusModalRow['orderID'];
	$userID = $statusModalRow['userID'];
	$orderStatus = $statusModalRow['orderStatus'];
	if ($orderStatus == 0)
		$valueStatus = "Заказ создан.";
	elseif ($orderStatus == 1)
		$valueStatus = "Заказ подтвержден.";
	elseif ($orderStatus == 2)
		$valueStatus = "Заказ комплектуется.";
	elseif ($orderStatus == 3)
		$valueStatus = "Заказ в пути";
	elseif ($orderStatus == 4)
		$valueStatus = "Заказ доставлен.";
	elseif ($orderStatus == 5)
		$valueStatus = "Заказ отменен.";
	else
		$valueStatus = "Заказ завершен.";

?>

	<!-- Modal -->
	<div class="modal fade" id="orderStatus<?php echo $orderID; ?>" tabindex="-1" role="dialog" aria-labelledby="orderStatus<?php echo $orderID; ?>" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: rgb(111 202 203);">
					<h5 class="modal-title" id="orderStatus<?php echo $orderID; ?>">Статус заказа</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="partials/_orderManage.php" method="post" style="border-bottom: 2px solid #dee2e6;">
						<div class="text-left my-2">
							<b><label for="userType">Статус заказа</label></b>
							<select name="userType" id="userType" class="custom-select browser-default" required>
							<?php 
                            if($orderStatus == 0) {
                        ?>
                            <option value="0">User</option>
                            <option value="1" selected>Admin</option>
							<option value="2">User</option>
							<option value="3">User</option>
							<option value="4">User</option>
							<option value="5">User</option>
							<option value="6">User</option>
						</div>
						<input type="hidden" id="orderID" name="orderID" value="<?php echo $orderID; ?>">
						<button type="submit" class="btn btn-success mb-2" name="updateStatus">Обновить</button>
					</form>



				</div>
			</div>
		</div>
	</div>

<?php
}

}
?>
<style>
	.popover {
		top: -77px !important;
	}
</style>

<script>
	$(function() {
		$('[data-toggle="popover"]').popover();
	});
</script>
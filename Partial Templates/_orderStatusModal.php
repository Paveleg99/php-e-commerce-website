<style>
	/* .modal-body {
        background-color: #eeeeee;
        font-family: 'Open Sans', serif
    } */

	.card {
		position: relative;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-orient: vertical;
		-webkit-box-direction: normal;
		-ms-flex-direction: column;
		flex-direction: column;
		min-width: 0;
		word-wrap: break-word;
		background-color: #fff;
		background-clip: border-box;
		border: 1px solid rgba(0, 0, 0, 0.1);
		border-radius: 0.10rem
	}

	.card-header:first-child {
		border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
	}

	.card-header {
		padding: 0.75rem 1.25rem;
		margin-bottom: 0;
		background-color: #fff;
		border-bottom: 1px solid rgba(0, 0, 0, 0.1)
	}

	.track {
		position: relative;
		background-color: #ddd;
		height: 7px;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		margin-bottom: 60px;
		margin-top: 50px
	}

	.track .step {
		-webkit-box-flex: 1;
		-ms-flex-positive: 1;
		flex-grow: 1;
		width: 25%;
		margin-top: -18px;
		text-align: center;
		position: relative
	}

	.track .step.active:before {
		background: linear-gradient(to right, #0250c582 0%, #d43f8c84 100%);
	}

	.track .step::before {
		height: 7px;
		position: absolute;
		content: "";
		width: 100%;
		left: 0;
		top: 18px
	}

	.track .step.active .icon {
		background: linear-gradient(to right, #0250c5 0%, #d43f8d 100%);
		color: #fff
	}

	.track .step.deactive:before {
		background: #030303;
	}

	.track .step.deactive .icon {
		background: #030303;
		color: #fff
	}

	.track .icon {
		display: inline-block;
		width: 40px;
		height: 40px;
		line-height: 40px;
		position: relative;
		border-radius: 100%;
		background: #ddd
	}

	.track .step.active .text {
		font-weight: 400;
		color: #000
	}

	.track .text {
		display: block;
		margin-top: 7px
	}
</style>
<?php
$statusmodalsql = "SELECT * FROM `orders` WHERE `userID`= $userID";
$statusmodalresult = mysqli_query($con, $statusmodalsql);
while ($statusmodalrow = mysqli_fetch_assoc($statusmodalresult)) {
	$orderID = $statusmodalrow['orderID'];
	$status = $statusmodalrow['orderStatus'];
	if ($status == 0)
		$tstatus = "Заказ создан.";
	elseif ($status == 1)
		$tstatus = "Заказ подтвержден.";
	elseif ($status == 2)
		$tstatus = "Заказ комплектуется.";
	elseif ($status == 3)
		$tstatus = "Заказ в пути";
	elseif ($status == 4)
		$tstatus = "Заказ доставлен.";
	elseif ($status == 5)
		$tstatus = "Заказ отменен.";
	else
		$tstatus = "Заказ завершен.";



?>
	<!-- Modal -->
	<div class="modal fade" id="orderStatus<?php echo $orderID; ?>" tabindex="-1" role="dialog" aria-labelledby="orderStatus<?php echo $orderID; ?>" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="orderStatus<?php echo $orderID; ?>">Статус заказа</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="printThis">
					<div class="container" style="padding-right: 0px;padding-left: 0px;">
						<article class="card">
							<div class="card-body">
								<h6><strong>ID заказа:</strong> <?php echo $orderID; ?></h6>
								<h6><strong>Статус заказа:</strong> <?php echo $tstatus; ?></h6>
								<div class="track">
									<?php
									if ($status == 0) {
										echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Заказ создан</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Заказ подтвержден</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text"> Заказ комплектуется</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Заказ в пути </span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Заказ доставлен</span> </div>';
									} elseif ($status == 1) {
										echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Заказ создан</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Заказ подтвержден</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text"> Заказ комплектуется</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Заказ в пути </span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Заказ доставлен</span> </div>';
									} elseif ($status == 2) {
										echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Заказ создан</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Заказ подтвержден</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Заказ комплектуется</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Заказ в пути </span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Заказ доставлен</span> </div>';
									} elseif ($status == 3) {
										echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Заказ создан</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Заказ подтвержден</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Заказ комплектуется</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Заказ в пути </span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Заказ доставлен</span> </div>';
									} elseif ($status == 4) {
										echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Заказ создан</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Заказ подтвержден</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Заказ комплектуется</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Заказ в пути </span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Заказ доставлен</span> </div>';
									} elseif ($status == 5) {
										echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Заказ создан</span> </div>
                                          <div class="step deactive"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Заказ отменен.</span> </div>';
									} else {
										echo '<div class="step active"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Заказ завершен.</span> </div>';
									}
									?>
								</div>
								<?php
								if ($status == 4) {
									echo '<a href="" class="btn btn-success" data-abc="true">Потвердить доставку</a>';
								}
								if ($status == 5) {
									echo '<a href="" class="btn btn-warning" data-abc="true">Связаться с администратором</a>';
								}
								?>
							</div>
						</article>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
?>
<div class="modal fade" id="orderDetailModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="orderDetailModal">Заполните информацию по заказу:</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="Partial Templates/_updateCart.php" method="post">
					<div class="form-group">
						<b><label for="region">Область/Регион</label></b>
						<input class="form-control" id="region" name="region" placeholder="Ивановская обл." type="text">
					</div>
					<div class="form-group">
						<b><label for="city">Город</label></b>
						<input class="form-control" id="city" name="city" placeholder="Иваново" type="text">
					</div>
					<div class="form-group">
						<b><label for="address">Улица, дом, квартира</label></b>
						<input class="form-control" id="address" name="address" placeholder="Кудряшова, 121, 32" type="text" required minlength="3" maxlength="255">
					</div>
					<div class="form-row">
						<div class="form-group col-md-6 mb-0">
							<b><label for="phone">Номер телефона</label></b>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon">+79</span>
								</div>
								<input type="tel" class="form-control" id="phone" name="phone" placeholder="xxxxxxxxx" required pattern="[0-9]{9}" maxlength="9">
							</div>
						</div>
						<div class="form-group col-md-6 mb-0">
							<b><label for="postIdx">Почтовый индекс</label></b>
							<input type="text" class="form-control" id="postIdx" name="postIdx" placeholder="xxxxxx" required pattern="[0-9]{6}" maxlength="6">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
						<input type="hidden" name="amount" value="<?php echo $totalPrice ?>">
						<input type="hidden" name="quant" value="<?php echo $quantotal ?>">
						<button type="submit" name="createOrder" class="btn btn-success">Оформить заказ</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
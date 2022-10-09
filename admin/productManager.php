<div class="container-fluid" style="margin-top:98px">

	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
				<form action="Admin Partials/_productManage.php" method="post" enctype="multipart/form-data">
					<div class="card mb-3">
						<div class="card-header" style="background-color: rgb(111 202 203);">
							<b>Добавить товар</b>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label class="control-label">Наименование: </label>
								<input type="text" class="form-control" name="name" required>
							</div>
							<div class="form-group">
								<label class="control-label">Цена</label>
								<input type="number" class="form-control" name="price" required min="1">
							</div>
							<div class="form-group">
								<label class="control-label">Описание: </label>
								<textarea cols="30" rows="3" class="form-control" name="description" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Категория: </label>
								<select name="categoryID" id="categoryID" class="custom-select browser-default" required>
									<option hidden disabled selected value></option>
									<?php
									$catsql = "SELECT * FROM `category`";
									$catresult = mysqli_query($con, $catsql);
									while ($row = mysqli_fetch_assoc($catresult)) {
										$catID = $row['categoryID'];
										$catName = $row['categoryName'];
										echo '<option value="' . $catID . '">' . $catName . '</option>';
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Производитель: </label>
								<select name="brandID" id="brandID" class="custom-select browser-default" required>
									<option hidden disabled selected value></option>
									<?php
									$brandsql = "SELECT * FROM `brand`";
									$brandresult = mysqli_query($con, $brandsql);
									while ($row = mysqli_fetch_assoc($brandresult)) {
										$brandID = $row['brandID'];
										$brandtName = $row['brandName'];
										echo '<option value="' . $brandID . '">' . $brandName . '</option>';
									}
									?>
								</select>
							</div>

							<div class="form-group">
								<label for="image" class="control-label">Изображение</label>
								<input type="file" name="image" id="image" accept=".webp" class="form-control" required style="border:none;">

							</div>
						</div>

						<div class="card-footer">
							<div class="row">
								<div class="mx-auto">
									<button type="submit" name="createItem" class="btn btn-sm btn-primary"> Создать </button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover mb-0">
							<thead style="background-color: rgb(111 202 203);">
								<tr>
									<th class="text-center" style="width:7%;">ID</th>
									<th class="text-center">Изображение</th>
									<th class="text-center" style="width:58%;">Информация о товаре</th>
									<th class="text-center" style="width:18%;">Действия</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM `product`";
								$result = mysqli_query($con, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									$productID = $row['productID'];
									$productName = $row['productName'];
									$productPrice = $row['productPrice'];
									$productDesc = $row['productDescription'];
									$productImage = $row['productImage'];
									echo '<tr>
                                            <td class="text-center">' . $productID . '</td>
                                            <td>
                                                <img src=".' . $productImage . '" alt="' . $productImage . '" width="150px" >
                                            </td>
                                            <td>
                                                <p>Наименование : <b>' . $productName . '</b></p>
												<p>Цена : <b>' . $productPrice . ' руб</b></p>
                                                
                                                
                                            </td>
                                            <td class="text-center">
												<div class="row mx-auto" style="width:170px">
													<button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#updateItem' . $productID . '">Изменить</button>
													<form action="Admin Partials/_productManage.php" method="POST">
														<button name="removeItem" class="btn btn-sm btn-danger" style="margin-left:5px;">Удалить</button>
														<input type="hidden" name="productID" value="' . $productID . '">
													</form>
												</div>
                                            </td>
                                        </tr>';
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>
</div>

<?php
$productsql = "SELECT * FROM `product`";
$productResult = mysqli_query($con, $productsql);
while ($productRow = mysqli_fetch_assoc($productResult)) {
	$productID = $productRow['productID'];
	$productName = $productRow['productName'];
	$productPrice = $productRow['productPrice'];
	$productCategoryID = $productRow['categoryID'];
	$productBrandID = $productRow['brandID'];
	$productDesc = $productRow['productDescription'];
?>

	<!-- Modal -->
	<div class="modal fade" id="updateItem<?php echo $productID; ?>" tabindex="-1" role="dialog" aria-labelledby="updateItem<?php echo $productID; ?>" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: rgb(111 202 203);">
					<h5 class="modal-title" id="updateItem<?php echo $productID; ?>">ID: <?php echo $productID; ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="Admin Partials/_productManage.php" method="post" enctype="multipart/form-data">
						<div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
							<div class="form-group col-md-8">
								<b><label for="image">Изображение</label></b>
								<input type="file" name="itemimage" id="itemimage" accept=".webp" class="form-control" required style="border:none;" onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])">
								<small id="Info" class="form-text text-muted mx-3">Пожалуйста, загрузите изображение.</small>
								<input type="hidden" id="productName" name="productName" value="<?php echo $productName; ?>">
								<button type="submit" class="btn btn-success my-1" name="updateItemPhoto">Обновить изображение</button>
							</div>
							<div class="form-group col-md-4">
								<img src="/diploma/assets/products/<?php echo $productName; ?>.webp" id="itemPhoto" name="itemPhoto" alt="Изображение" width="100" height="100">
							</div>
						</div>
					</form>
					<form action="Admin Partials/_productManage.php" method="post">
						<div class="text-left my-2">
							<b><label for="name">Наименование</label></b>
							<input class="form-control" id="name" name="name" value="<?php echo $productName; ?>" type="text" required>
						</div>
						<div class="text-left my-2 row">
							<div class="form-group col-md-4">
								<b><label for="price">Цена</label></b>
								<input class="form-control" id="price" name="price" value="<?php echo $productPrice; ?>" type="number" min="1" required>
							</div>
							<div class="form-group col-md-4">
								<b><label for="catId">ID Категории</label></b>
								<input class="form-control" id="catId" name="catId" value="<?php echo $productCategoryID; ?>" type="number" min="1" required>
							</div>
							<div class="form-group col-md-4">
								<b><label for="brandId">ID Производителя</label></b>
								<input class="form-control" id="brandId" name="brandId" value="<?php echo $productBrandID; ?>" type="number" min="1" required>
							</div>
						</div>
						<div class="text-left my-2">
							<b><label for="desc">Описание</label></b>
							<textarea class="form-control" id="desc" name="desc" rows="2" required minlength="6"><?php echo $productDesc; ?></textarea>
						</div>
						<input type="hidden" id="productID" name="productID" value="<?php echo $productID; ?>">
						<button type="submit" class="btn btn-success" name="updateItem">Обновить</button>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php
}
?>
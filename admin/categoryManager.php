<div class="container-fluid" style="margin-top:98px">
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4 mt-3">
				<form action="Admin Partials/_categoryManage.php" method="post" enctype="multipart/form-data">
					<div class="card">
						<div class="card-header" style="background-color: rgb(111 202 203);">
							<b> Добавить категорию </b>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label class="control-label">Название категории: </label>
								<input type="text" class="form-control" name="name" required>
							</div>
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col-md-12">
									<button type="submit" name="createCategory" class="btn btn-sm btn-primary col-sm-3 offset-md-4"> Создать </button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8 mb-3">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover mb-0">
							<thead style="background-color: rgb(111 202 203);">
								<tr>
									<th class="text-center">ID Категории</th>
									<th class="text-center" style="width:50%;">Название категории</th>
									<th class="text-center" style="width:30%;">Действия</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM `category`";
								$result = mysqli_query($con, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									$catID = $row['categoryID'];
									$catName = $row['categoryName'];


									echo '<tr>
                                        <td class="text-center"><b>' . $catID . '</b></td>
                                        <td class="text-center"><b>' . $catName . '</b> </td>
                                        <td class="text-center">
                                            <div class="row mx-auto" style="width:170px">
                                            <button class="btn btn-sm btn-primary edit_cat" type="button" data-toggle="modal" data-target="#updateCat' . $catID . '">Изменить</button>
                                            <form action="Admin Partials/_categoryManage.php" method="POST">
                                                <button name="removeCategory" class="btn btn-sm btn-danger" style="margin-left:9px;">Удалить</button>
                                                <input type="hidden" name="catID" value="' . $catID . '">
                                            </form></div>
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
$catsql = "SELECT * FROM `category`";
$catResult = mysqli_query($con, $catsql);
while ($catRow = mysqli_fetch_assoc($catResult)) {
	$catID = $catRow['categoryID'];
	$catName = $catRow['categoryName'];
?>

	<!-- Modal -->
	<div class="modal fade" id="updateCat<?php echo $catID; ?>" tabindex="-1" role="dialog" aria-labelledby="updateCat<?php echo $catID; ?>" aria-hidden="true" style="width: -webkit-fill-available;">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: rgb(111 202 203);">
					<h5 class="modal-title" id="updateCat<?php echo $catID; ?>">ID Категории: <b><?php echo $catID; ?></b></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="Admin Partials/_categoryManage.php" method="post">
						<div class="text-left my-2">
							<b><label for="name">Название категории</label></b>
							<input class="form-control" id="name" name="name" value="<?php echo $catName; ?>" type="text" required>
						</div>
						<input type="hidden" id="catID" name="catID" value="<?php echo $catID; ?>">
						<button type="submit" class="btn btn-success" name="updateCategory">Изменить</button>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php
}
?>
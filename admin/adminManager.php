<div class="container-fluid" style="margin-top:98px">

	<div class="row">
		<div class="col-lg-12">
			<button class="btn button-std border-0 float-right btn-sm" data-toggle="modal" data-target="#newUser"><i class="fa fa-plus"></i> Добавить </button>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12 text-center">
					<thead class="color-primary-bg-light">
						<tr>
							<th style="width:7%">ID</th>
							<th style="width:7%">Фото</th>
							<th>Логин</th>
							<th>Имя</th>
							<th>Email</th>
							<th>Роль</th>
							<th>Действия</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = "SELECT * FROM users WHERE userType = '1'";
						$result = mysqli_query($con, $sql);
						while ($row = mysqli_fetch_assoc($result)) {
							$userID = $row['userID'];
							$userName = $row['userName'];
							$firstName = $row['firstName'];
							$secondName = $row['secondName'];
							$email = $row['email'];
							$userType = "Администратор";

						?>
							<tr>
								<td><?php echo $userID ?></td>
								<td><img src="assets/users/<?php echo $userID ?>.jpg" alt="userImage" onError="this.src ='../assets/users/profilePic.jpg';" width="100px" height="100px"></td>
								<td><?php echo $userName ?></td>
								<td>
									<p>Имя: <b><?php echo  $firstName  ?></b></p>
									<p>Фамилия: <b><?php echo $secondName ?></b></p>
								</td>
								<td><?php echo $email ?></td>
								<td><?php echo $userType ?></td>
								<td class="text-center">
									<div class="row mx-auto" style="width:170px">
										<button class="btn btn-sm button-std border-0" data-toggle="modal" data-target="#editUser<?php echo $userID ?>" type="button">Изменить</button>
										<?php if ($userID == 3) { ?>
											<button class="btn btn-sm btn-danger" disabled style="margin-left:9px;">Удалить</button>
										<?php		} else {   ?>
											<form action="Admin Partials/_adminManage.php" method="POST">
												<button name="removeAdmin" class="btn btn-sm btn-danger" style="margin-left:9px;">Удалить</button>
												<input type="hidden" name="userID" value="<?php echo $userID ?>">
											</form>
										<?php	}
										?>

									</div>
								</td>
							</tr>
						<?php    }
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- newUser Modal -->
<div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="newUser" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: rgb(111 202 203);">
				<h5 class="modal-title" id="newUser">Регистрация нового администратора</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="Admin Partials/_adminManage.php" method="post">
					<div class="form-group">
						<b><label for="userName">Логин</label></b>
						<input class="form-control" id="userName" name="userName" placeholder="Придумайте уникальный логин" type="text" required minlength="3" maxlength="11">
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<b><label for="firstName">Имя:</label></b>
							<input type="text" class="form-control" id="firstName" name="firstName" placeholder="Имя" required>
						</div>
						<div class="form-group col-md-6">
							<b><label for="secondName">Фамилия:</label></b>
							<input type="text" class="form-control" id="secondName" name="secondName" placeholder="Фамилия" required>
						</div>
					</div>
					<div class="form-group">
						<b><label for="email">Email:</label></b>
						<input type="email" class="form-control" id="email" name="email" placeholder="Введите Email" required>
					</div>
					<div class="form-group">
						<b><label for="password">Пароль:</label></b>
						<input class="form-control" id="password" name="password" placeholder="Придумайте пароль" type="password" required data-toggle="password" minlength="4" maxlength="21">
					</div>
					<div class="form-group">
						<b><label for="password1">Повторно введите пароль:</label></b>
						<input class="form-control" id="cpassword" name="cpassword" placeholder="Повторите пароль" type="password" required data-toggle="password" minlength="4" maxlength="21">
					</div>
					<button type="submit" name="createAdmin" class="btn button-std">Зарегистрировать</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
$usersql = "SELECT * FROM `users`";
$userResult = mysqli_query($con, $usersql);
while ($userRow = mysqli_fetch_assoc($userResult)) {
	$userID = $userRow['userID'];
	$userName = $userRow['userName'];
	$firstName = $userRow['firstName'];
	$secondName = $userRow['secondName'];
	$email = $userRow['email'];
	$userType = $userRow['userType'];


?>
	<!-- editUser Modal -->
	<div class="modal fade" id="editUser<?php echo $userID ?>" tabindex="-1" role="dialog" aria-labelledby="editUser<?php echo $userID ?>" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: rgb(111 202 203);">
					<h5 class="modal-title" id="editUser<?php echo $userID ?>">ID Пользователя: <b><?php echo $userID ?></b></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">


					<form action="Admin Partials/_adminManage.php" method="post">
						<div class="form-group">
							<b><label for="userName">Логин</label></b>
							<input class="form-control" id="userName" name="userName" value="<?php echo $userName; ?>" type="text" disabled>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<b><label for="firstName">Имя:</label></b>
								<input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>" required>
							</div>
							<div class="form-group col-md-6">
								<b><label for="secondName">Фамилия:</label></b>
								<input type="text" class="form-control" id="secondName" name="secondName" value="<?php echo $secondName; ?>" required>
							</div>
						</div>
						<div class="form-group">
							<b><label for="email">Email:</label></b>
							<input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
						</div>
						<input type="hidden" id="userID" name="userID" value="<?php echo $userID ?>">
						<button type="submit" name="editAdmin" class="btn button-std">Изменить</button>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php
}
?>
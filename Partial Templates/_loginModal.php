<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header " style="background: linear-gradient(to right, #0250c57a 0%, #d43f8c83 100%);">
				<h5 class="modal-title" id="loginModal">Войти в систему</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="Partial Templates/_handleLogin.php" method="post">
					<div class="text-left my-2">
						<b><label for="username">Логин</label></b>
						<input class="form-control" id="loginusername" name="loginusername" placeholder="Введите логин" type="text" required>
					</div>
					<div class="text-left my-2">
						<b><label for="password">Пароль</label></b>
						<input class="form-control" id="loginpassword" name="loginpassword" placeholder="Введите пароль" type="password" required data-toggle="password">
					</div>
					<button type="submit" class="btn button-std">Войти</button>
				</form>
				<p class="mb-0 mt-1">У вас еще нет аккаунта? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signupModal">Создайте его</a>.</p>
			</div>
		</div>
	</div>
</div>
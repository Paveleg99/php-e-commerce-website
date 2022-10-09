  <!-- Sign up Modal -->
  <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModal" aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header" style="background: linear-gradient(to right, #0250c57a 0%, #d43f8c83 100%);">
  				<h5 class="modal-title" id="signupModal">Регистрация пользователя</h5>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<form action="Partial Templates/_handleSignup.php" method="post">
  					<div class="form-group">
  						<b><label for="username">Логин</label></b>
  						<input class="form-control" id="userName" name="userName" placeholder="Создайте уникальный логин" type="text" required minlength="5" maxlength="11">
  					</div>
  					<div class="form-row">
  						<div class="form-group col-md-6">
  							<b><label for="firstName">Имя:</label></b>
  							<input type="text" class="form-control" id="firstName" name="firstName" placeholder="Имя" required>
  						</div>
  						<div class="form-group col-md-6">
  							<b><label for="lastName">Фамилия:</label></b>
  							<input type="text" class="form-control" id="secondName" name="secondName" placeholder="Фамилия" required>
  						</div>
  					</div>
  					<div class="form-group">
  						<b><label for="email">Email:</label></b>
  						<input type="email" class="form-control" id="email" name="email" placeholder="Введите свой Email" required>
  					</div>
  					<div class="text-left my-2">
  						<b><label for="password">Пароль:</label></b>
  						<input class="form-control" id="password" name="password" placeholder="Придумайте пароль" type="password" required data-toggle="password" minlength="4" maxlength="21">
  					</div>
  					<div class="text-left my-2">
  						<b><label for="password1">Повторный ввод пароля:</label></b>
  						<input class="form-control" id="cpassword" name="cpassword" placeholder="Повторно введите пароль" type="password" required data-toggle="password" minlength="4" maxlength="21">
  					</div>
  					<button type="submit" class="btn button-std">Далее</button>
  				</form>
  				<p class="mb-0 mt-1">Уже есть аккаунт? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Войдите в систему</a>.</p>
  			</div>
  		</div>
  	</div>
  </div>
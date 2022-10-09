    <header class="header" id="header">
    	<div class="header__toggle">
    		<i class='bx bx-menu' id="header-toggle"></i>
    	</div>

    	<div class="header__img">
    		<img src="../assets/users/profilePic.jpg" alt="">
    	</div>
    </header>

    <div class="l-navbar" id="nav-bar">
    	<nav class="nav">
    		<div>
    			<a href="index.php" class="nav__logo">
    				<i class='bx bx-layer nav__logo-icon'></i>
    				<span class="nav__logo-name">ТехноМаг Админ</span>
    			</a>

    			<div class="nav__list">
    				<a href="index.php" class="nav__link nav-home">
    					<i class='bx bx-grid-alt nav__icon'></i>
    					<span class="nav__name">Главная</span>
    				</a>
    				<a href="index.php?page=orderManager" class="nav-orderManage nav__link ">
    					<i class='bx bx-spreadsheet nav__icon'></i>
    					<span class="nav__name">Заказы</span>
    				</a>
    				<a href="index.php?page=categoryManager" class="nav__link nav-categoryManage">
    					<i class='bx bx-folder nav__icon'></i>
    					<span class="nav__name">Категории</span>
    				</a>
    				<a href="index.php?page=productManager" class="nav__link nav-productManage">
    					<i class='bx bx-devices nav__icon'></i>
    					<span class="nav__name">Товары</span>
    				</a>
    				<a href="index.php?page=adminManager" class="nav__link nav-adminManage">
    					<i class='bx bx-user nav__icon'></i>
    					<span class="nav__name">Администраторы</span>
    				</a>
    			</div>
    		</div>
    		<a href="Admin Partials/_logout.php" class="nav__link">
    			<i class='bx bx-log-out nav__icon'></i>
    			<span class="nav__name">Выход</span>
    		</a>
    	</nav>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
    	<?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
    	$('.nav-<?php echo $page; ?>').addClass('active')
    </script>
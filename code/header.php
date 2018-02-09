<header>
  	<div class="navbar navbar-light  box-shadow" id="main-header">
		<div class="container">
		  <a href="#" class="navbar-brand d-flex align-items-center">
			<img id="logo" src="./img/logo.png">
		  </a>

		  <nav class="">
		  	 
			    <?php if (isset($_SESSION['username'])) : ?>
			    <div class="dropdown show">
					<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					9175302862
					</a>

					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<a class="dropdown-item" href="#">Logout</a>
					</div>
				</div>
			    <?php else: ?>
				<a class="" href="#">TRACK</a>				
			    <?php endif ?>
			</nav>
		</div>
  	</div>
</header>
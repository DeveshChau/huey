<!DOCTYPE html>
<html lang="en" class="no-js">
  	<head>
		<meta charset="utf-8">
		<title>PaceMove</title>
		<meta name="description" content="Packers and Movers">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="./css/style.css">
		<style type="text/css">
			html {
			  	background: url(img/bg.png) no-repeat center center fixed;
			  	-webkit-background-size: cover;
			  	-moz-background-size: cover;
			  	-o-background-size: cover;
			  	background-size: cover;
			}
		</style>
  	</head>
  	<body>
  		<header>
  	<div class="navbar navbar-light  box-shadow" id="main-header">
		<div class="container">
		  <a href="#" class="navbar-brand d-flex align-items-center">
			<img id="logo" src="./img/logo.png">
		  </a>

		  <nav class="">
		  	 
			    <?php if (isset($_SESSION['usermobile'])) { ?>
			    <div class="dropdown">
					<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<?php echo $_SESSION['usermobile']?>
					</a>

					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<a class="dropdown-item" href="logout.php">Logout</a>
					</div>
				</div>
			    <?php } else{ ?>
				<a class="trackModal" href="#" data-toggle="modal" data-target="#track">TRACK</a>				
				<div class="modal fade" id="track" tabindex="-1" role="dialog" aria-labelledby="otpModalLabel" aria-hidden="true" data-backdrop="static">
				  <div class="modal-dialog" role="document">
				    	<div class="modal-content">
				      		<div class="modal-body">
								<ul class="nav nav-pills nav-fill" role="tablist">
						  			<li class="nav-item active" hidden>
						    			<a class="nav-link" href="#track-mobile-modal">Pickup</a>
						  			</li>
						  			<li class="nav-item" hidden>
						    			<a class="nav-link" href="#track-otp-modal">Drop</a>
						  			</li>						  			
								</ul>
								<div class="tab-content" id="bookingTabContent">
							  		<div class="tab-pane fade show active" id="track-mobile-modal" role="tabpanel" aria-labelledby="track-mobile-modal-tab">								
										<form data-toggle="validator" role="form">	
											<div class="form-group">
												<label for="header-track-user-mobile">Enter Mobile Number</label>
												<input type="tel" class="form-control"  pattern="^[789]\d{9}$" id="header-track-user-mobile" placeholder="Enter mobile number" required>
											<div class="help-block with-errors"></div>
											</div>
										  
										  	<br>

										  	<div class="form-group" style="text-align: center;">
											<button type="button" class="btn btn-primary  btn-lg " id="header-track-next">Next</button>
										 	</div>	
										</form>
							  		</div>				
				      			
							  		<div class="tab-pane fade" id="track-otp-modal" role="tabpanel" aria-labelledby="track-otp-modal-tab">								
										<form data-toggle="validator" role="form">											
											<div class="form-group">
												<label for="header-track-otp">Enter OTP</label>
												<input type="tel" class="form-control" id="header-track-otp" placeholder="Enter 4 Digit OTP"  pattern="^\d{4}$" required>
												<div class="help-block with-errors"></div>
											</div>
										  
										  	<br>

										  	<div class="form-group">
												<button type="button" class="btn btn-primary" id="header-track-otp-submit" style="text-align: center;">Submit</button>
												<a class="float-right" id="retry-otp" href="#">Resend OTP</a>
											</div>	
										</form>
							  		</div>				
				      			</div>
				    		</div>
				  		</div>
					</div>
				</div>
			    <?php } ?>
			</nav>
		</div>
  	</div>
</header>
  		<main role="main">
        <div id="order-wrapper">
    			<p>Stress free moving just a call away</p>
        	<a href="details.php" class="btn btn-primary">Move with pacemove</a>
        </div>
  		</main>
		<?php include 'footer.php';?>
  	</body>
</html>

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
				<a class="" href="#" data-toggle="modal" data-target="#track">TRACK</a>				
				<div class="modal fade" id="track" tabindex="-1" role="dialog" aria-labelledby="otpModalLabel" aria-hidden="true" data-backdrop="static">
				  <div class="modal-dialog" role="document">
				    	<div class="modal-content">
				      		<div class="modal-body">
								<ul class="nav nav-pills nav-fill" role="tablist" id="tack-tab">
						  			<li class="nav-item active" hidden>
						    			<a class="nav-link" href="#track-mobile-modal" data-toggle="tab">Pickup</a>
						  			</li>
						  			<li class="nav-item" hidden>
						    			<a class="nav-link" href="#track-otp-modal" data-toggle="tab">Drop</a>
						  			</li>						  			
								</ul>
								<div class="tab-content" id="bookingTabContent">
							  		<div class="tab-pane fade show active" id="track-mobile-modal" role="tabpanel" aria-labelledby="track-mobile-modal-tab">								
										<form data-toggle="validator" role="form">	
											<div class="form-group">
												<label for="header-track-user-mobile">Enter Mobile Number</label>
												<input type="tel" class="form-control"  pattern="^\d{10}$" id="header-track-user-mobile" placeholder="Enter mobile number">
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
												<input type="tel" class="form-control" id="header-track-otp" placeholder="Enter 4 Digit OTP"  pattern="^\d{4}$">
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

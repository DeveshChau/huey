$(document).ready(function(){
	
	$('#details-tab a').on('click', function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	})

	
	$("#pickup-next").on("click", function(e){
		$("a[href='#drop']").tab("show");
	});	

	$("#drop-previous").on("click", function(e){
		$("a[href='#pickup']").tab("show");
	});	

	$("#drop-next").on("click", function(e){
		$("a[href='#profile']").tab("show");
	});

	$("#profile-previous").on("click", function(e){
		$("a[href='#drop']").tab("show");
	});


	$("#profile-next").on("click", function(e){		
		var usermobile = document.getElementById("usermobile").value;
		//append country code to mobile
		var mobile = "91".concat(usermobile);		
		var data = {mobile: mobile};        
        $.ajax({
            type: "POST",
            dataType:'json',
            url: "http://localhost/huey/code/test.php", //sendotp.php
            data: data,
            success: function(data) {
            console.log("returnedData", data);
          	}
        });
	});
	$("#retry-otp").on("click", function(e){		
		var usermobile = document.getElementById("usermobile").value;
		//append country code to mobile
		var mobile = "91".concat(usermobile);		
		var data = {mobile: mobile};        
        $.ajax({
            type: "POST",
            dataType:'json',
            url: "http://localhost/huey/code/test.php", //retryotp.php
            data: data,
            success: function(data) {
            console.log("returnedData", data);
          	}
        });
	});
	$("#btn-otp-submit").on("click", function(e){
		var usermobile = document.getElementById("usermobile").value;				
		//append country code to mobile
		var mobile = "91".concat(usermobile);			
		var otp = document.getElementById("otp").value;
        var data = {mobile: mobile, otp: otp};        
        $.ajax({
            type: "POST",
            dataType:'json',
            url: "http://localhost/huey/code/test.php", //verifyotp.php
            data: data,
            success: function(data) {
            console.log("returnedData", data);
            	
             window.location = "http://localhost/huey/code/movables.html";
          	}
        });
	});
	    
});




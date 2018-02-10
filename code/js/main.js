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

	$("#header-track-next").on("click", function(e){
		$("a[href='#track-otp-modal']").tab("show");
		var usermobile = document.getElementById("header-track-user-mobile").value;
		//append country code to mobile
		var mobile = "91".concat(usermobile);		
		var data = {mobile: mobile, usermobile: usermobile};        
       console.log(usermobile);
        $.ajax({
            type: "POST",
            dataType:'json',
            url: "http://localhost/huey/code/testsendotp.php", //sendotp.php
            /*url: "http://www.loopor.com/pacemove/code/sendotp.php",*/
            data: data,
            success: function(data) {
            console.log("returnedData", data);
          	}
        });
	});

	$("#header-track-otp-submit").on("click", function(e){		
		var usermobile = document.getElementById("header-track-otp").value;				
		//append country code to mobile
		var mobile = "91".concat(usermobile);			
		var otp = document.getElementById("header-track-otp").value;
        var data = {mobile: mobile, otp: otp, usermobile: usermobile};        
        $.ajax({
            type: "POST",
            dataType:'json',
            url: "http://localhost/huey/code/testverifyotp.php", //verifyotp.php
            /*url: "http://www.loopor.com/pacemove/code/verifyotp.php",*/
            data: data,
            success: function(data) {
            console.log("returnedData", data);
            	
             window.location = "http://localhost/huey/code/userdashboard.php";
             /*window.location = "http://www.loopor.com/pacemove/code/userdashboard.php";*/
          	}
        });		
	});

	$("#profile-next").on("click", function(e){		
        
        // usermobile need to select from session variable*********
        var usermobile = document.getElementById("usermobile").value;
		//append country code to mobile
		var mobile = "91".concat(usermobile);		
		var data = {mobile: mobile, usermobile: usermobile};//remove usermobile on server        

        console.log(data,mobile,usermobile);
        $.ajax({
            type: "POST",
            dataType:'json',
            url: "http://localhost/huey/code/testsendotp.php", //sendotp.php
            /*url: "http://www.loopor.com/pacemove/code/sendotp.php",*/
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
            /*url: "http://www.loopor.com/pacemove/code/retryotp.php",*/
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
        var data = {mobile: mobile, otp: otp, usermobile: usermobile};     
        console.log(usermobile);   
        $.ajax({
            type: "POST",
            dataType:'json',
            url: "http://localhost/huey/code/testverifyotp.php", //verifyotp.php
            /*url: "http://www.loopor.com/pacemove/code/verifyotp.php",*/
            data: data,
            success: function(data) {
            console.log("returnedData", data);
            	
             window.location = "http://localhost/huey/code/movables.php";
             /*window.location = "http://www.loopor.com/pacemove/code/movables.php";*/
          	}
        });
	});    
});
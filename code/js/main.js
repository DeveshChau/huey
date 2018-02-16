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

    $("#trackpickupnext").on("click", function(e){        
        $("a[href='#drop']").tab("show");        
    }); 

    $("#trackdropprevious").on("click", function(e){
        $("a[href='#pickup']").tab("show");
    }); 

    $('#trackpickupdate').datepicker({
        format: 'mm/dd/yyyy',
        
    });    
    
    $("#trackdropnext").on("click", function(e){

        var pickupLocationApartment = document.getElementById("trackpickupLocationApartment").value;
        var pickupfloor = document.getElementById("trackpickupfloor").value;
        var pickuplift = document.getElementById("trackpickuplift").value;
        var dropLocationApartment = document.getElementById("trackdropLocationApartment").value;
        var dropfloor = document.getElementById("trackdropfloor").value;
        var droplift = document.getElementById("trackdroplift").value;
        var pickupdate = document.getElementById("trackpickupdate").value;       
        //append country code to mobile                   
        var data = {pickupLocationApartment: pickupLocationApartment, 
                    pickupfloor: pickupfloor, 
                    pickuplift: pickuplift,
                    droplift: droplift,
                    dropfloor: dropfloor,
                    dropLocationApartment: dropLocationApartment,
                    pickupdate: pickupdate};
        /*console.log(pickuplift,pickupfloor,pickupLocationApartment,dropLocationApartment,dropfloor,droplift) ;*/
        

        $.ajax({
            type: "POST",
            dataType:'json',
            url: "http://localhost/huey/code/trackverifyotp.php", //verifyotp.php
            /*url: "http://www.loopor.com/pacemove/code/verifyotp.php",*/
            data: data,
             success: function(data) {
            console.log("success", data);
                
            window.location = "http://localhost/huey/code/movables.php";
             /*window.location = "http://www.loopor.com/pacemove/code/movables.php";*/
            },
            error: function(data) {
            console.log("error", data);         
            }     
        });
    });

	$("#profile-previous").on("click", function(e){
		$("a[href='#drop']").tab("show");
	});

	$("#header-track-next").on("click", function(e){        
		var usermobile = document.getElementById("header-track-user-mobile").value;
		//append country code to mobile
		var mobile = "91".concat(usermobile);		
		var data = {mobile: mobile, usermobile: usermobile};
        console.log(usermobile);               
        $.ajax({
            type: "POST",
            dataType:'json',
            data: {usermobile: usermobile},
            url: "http://localhost/huey/code/testsendotp.php", //sendotp.php
            /*url: "http://www.loopor.com/pacemove/code/sendotp.php",*/
            data: data,
            success: function(data) {
            $("a[href='#track-otp-modal']").tab("show");
            console.log("returnedData", data);
          	},
            error: function(data) {
                window.location = "http://localhost/huey/code/details.php";
            console.log("error", data);         
            } 
        });
	});

	$("#header-track-otp-submit").on("click", function(e){     
        var usermobile = document.getElementById("header-track-user-mobile").value;             
        //append country code to mobile
        var mobile = "91".concat(usermobile);           
        var otp = document.getElementById("header-track-otp").value;
        var data = {mobile: mobile, otp: otp, usermobile: usermobile}; 
        console.log(usermobile);       
        $.ajax({
            type: "POST",
            dataType:'json',
            url: "http://localhost/huey/code/tracksession.php", //verifyotp.php
            /*url: "http://www.loopor.com/pacemove/code/verifyotp.php",*/
            data: data,
            success: function(data) {
            console.log("returnedData", data);
                
            window.location = "http://localhost/huey/code/userdashboard.php";
             /*window.location = "http://www.loopor.com/pacemove/code/userdashboard.php";*/
            },
            error: function(data) {
            console.log("error", data);         
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
    $('#datepicker').datepicker({
        format: 'mm/dd/yyyy',
        startDate: '+1d'
    });



	$("#btn-otp-submit").on("click", function(e){
        var usermobile = document.getElementById("usermobile").value;
        var username = document.getElementById("username").value;
        var useremail = document.getElementById("useremail").value;
        var pickupLocationApartment = document.getElementById("pickupLocationApartment").value;
        var pickupfloor = document.getElementById("pickupfloor").value;
        var pickuplift = document.getElementById("pickuplift").value;
        var dropLocationApartment = document.getElementById("dropLocationApartment").value;
        var dropfloor = document.getElementById("dropfloor").value;
        var droplift = document.getElementById("droplift").value;
        var pickupdate = document.getElementById("datepicker").value;
        //console.log(typeof (pickupdate));        
        //append country code to mobile        
        var mobile = "91".concat(usermobile);           
        var otp = document.getElementById("otp").value;
console.log(mobile,username,useremail,pickupLocationApartment,pickupdate,dropLocationApartment);

        var data = {mobile: mobile, 
                    otp: otp, 
                    usermobile: usermobile, 
                    username: username, 
                    useremail: useremail, 
                    pickupLocationApartment: pickupLocationApartment, 
                    pickupfloor: pickupfloor, 
                    pickuplift: pickuplift,
                    droplift: droplift,
                    dropfloor: dropfloor,
                    dropLocationApartment: dropLocationApartment,
                    pickupdate: pickupdate};
        //console.log(pickuplift,pickupfloor,pickupLocationApartment);
        $.ajax({
            type: "POST",
            dataType:'json',
            url: "http://localhost/huey/code/testverifyotp.php", //verifyotp.php
            /*url: "http://www.loopor.com/pacemove/code/verifyotp.php",*/
            data: data,
             success: function(data) {
            console.log("success", data);
            
            /*window.location = "http://localhost/huey/code/userdashboard.php";*/
            window.location = "http://localhost/huey/code/movables.php";
            },
            error: function(data) {
            console.log("error", data);         
            }     
        });   
	});
});
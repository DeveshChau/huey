function updateStatus(pmorderid){        
    var d = 'statuslist' + pmorderid;
    var statuslist = document.getElementById(d).value;
    data = {pmorderid: pmorderid, statuslist: statuslist };
    var test = "#"+d+" option";

    if (statuslist =='Order Delivered') {               
        $("#"+d+" option[value='Move Booked']").prop("disabled","disabled");
        $("#"+d+" option[value='Order Picked Up']").prop("disabled","disabled");
        $("#"+d+" option[value='In Transit (Place)']").prop("disabled","disabled");
        $("#"+d+" option[value='Order Delivered']").prop("disabled","disabled");        
    }else if (statuslist=='In Transit (Place)') {               
        $("#"+d+" option[value='Move Booked']").prop("disabled","disabled");
        $("#"+d+" option[value='Order Picked Up']").prop("disabled","disabled");
        $("#"+d+" option[value='In Transit (Place)']").prop("disabled","disabled");        
    }else if (statuslist=='Order Picked Up') {               
        $("#"+d+" option[value='Move Booked']").prop("disabled","disabled");
        $("#"+d+" option[value='Order Picked Up']").prop("disabled","disabled");
    }

    console.log(pmorderid,statuslist,test);
    $.ajax({
        type: "POST",
        dataType:'json',
        url: "http://localhost/huey/code/status.php",
        data: data,
         success: function(data) {
           	var st = data;
           	
            console.log(st);
            window.location = "http://localhost/huey/code/admindashboard.php";
            
        },
        error: function(data) {
        console.log("error", data);         
        }
    });

};

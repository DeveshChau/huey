function updateStatus(pmorderid){        
    var d = 'statuslist' + pmorderid;
    var statuslist = document.getElementById(d).value;
    data = {pmorderid: pmorderid, statuslist: statuslist };
    var test = "#"+d+" option";

    if (statuslist =='Drop') {               
        $("#"+d+" option[value='Booked']").prop("disabled","disabled");
        $("#"+d+" option[value='Pickup']").prop("disabled","disabled");
        $("#"+d+" option[value='Moving']").prop("disabled","disabled");
        $("#"+d+" option[value='Drop']").prop("disabled","disabled");        
    }else if (statuslist=='Moving') {               
        $("#"+d+" option[value='Booked']").prop("disabled","disabled");
        $("#"+d+" option[value='Pickup']").prop("disabled","disabled");
        $("#"+d+" option[value='Moving']").prop("disabled","disabled");        
    }else if (statuslist=='Pickup') {               
        $("#"+d+" option[value='Booked']").prop("disabled","disabled");
        $("#"+d+" option[value='Pickup']").prop("disabled","disabled");
    }

    console.log(pmorderid,statuslist,test);
    $.ajax({
        type: "POST",
        dataType:'json',
        url: "http://www.loopor.com/pacemove/code/status.php",
        data: data,
         success: function(data) {
           	var st = data;
           	
            console.log(st);
            
        },
        error: function(data) {
        console.log("error", data);         
        }
    });

};

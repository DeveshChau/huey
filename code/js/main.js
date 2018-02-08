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
		// $("a[href='#drop']").tab("show");
	});

});





$(document).ready(function(){

	$("#get-checked-data").on("click",function(){
		var checked_courses = $("#courseForm").serialize();
		console.log(checked_courses);
		if(checked_courses!=""){
				$.ajax({
				url:'courseSelectionForm',
				data:{formData:checked_courses},
				type:"GET",
				success:function(response){
					 $('body').html(response);
				},
				error:function(e){
					console.log(e);
				}
		});
		} else {
			console.log("empty");
			$("#courseError").show();
		}
	});
	
});

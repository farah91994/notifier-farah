
/**
 * Created by Farah on 4/16/2016.
 */


$(document).ready(function(){
    $("#signup-button").on("click",function(e){
        var formData = $("#signup-form").serialize();
        $.ajax({
           url: 'signup',
            data:formData,
            type:"POST",
            success:function(response){
                console.log(response);
            }
        });
    });
});
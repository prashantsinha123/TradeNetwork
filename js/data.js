function Valid(evt){
	var Code = (evt.which) ? evt.which:event.keyCode
    if (Code > 31 && (Code< 48||Code > 57))
        return false;
    return true;
}

$(document).ready(function () {
    $('#signup_form').on('submit', function (e) {
			
			e.preventDefault();

            var url = "handler.php";

            $.ajax({
                method: "POST",
                url: url,
                data: $('#signup_form').serialize(),
                success: function (data)
                {			
                     if(data=='success'){
				$("#download_modal").modal('show');
			}else{
			$("#net_msg").html(data);
			}
                }
            });
    });
});



$(document).ready(function(){
	$("#verify").click(function(){
		var code= $("#verification").val();
		$.post("handler.php",{
		code:code
},function(data,status){
if(data == 'success'){ 
$("#mistake").html(data);
      setTimeout(function(){
           location.reload(); 
      }, 2000); 
   }else{
	$("#mistake").html(data);
}

});
});
});


		$(document).ready(function(){
			$("#sforget_submit").click(function(){
				var email=$("#sforget_email").val();
				var password=$("#sforget_password").val();
				var repassword=$("#sforget_repassword").val();
				$.post("handler.php",{
				sforget_email:email,
				sforget_password:password,
				sforget_repassword:repassword
},function(data){
	if(data=='success'){
	$("#wrong1").html(data);
	$("#sforget_modal").modal("show");

}else{
	$("#wrong1").html(data);
}

});

});
});

$(document).ready(function(){
	$("#sforget_verify").click(function(){
		var scode= $("#seller_forget_verify").val();
		$.post("handler.php",{
		scode:scode
},function(data,status){
if(data == 'success'){ 
$("#mistaken1").html(data);
      setTimeout(function(){
           location.reload(); 
      }, 2000); 
   }else{
	$("#mistaken1").html(data);
}

});
});
});




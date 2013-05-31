$(function() 
// ---------------------------------------- Validates form and then adds new user to database without page refresh ----------------------------------------
{
	$('.error').hide();
    $(".button").click(function() //function starts when submit button is pressed
	{
		$('.error').hide();
  	    var username = $("input#username").val();
  		var password1 = $("input#password1").val(); 		
  		var password2 = $("input#password2").val();

		if (username == "" || password1 == "" || password2 == "" || password1 != password2) 
		{ 
			if (username == "") 
			{
				$("label#username_error").show();
				$("input#username").focus();
			}
			if (password1 == "") 
			{
				$("label#password1_error").show();
				$("input#password1").focus();
			}
			if (password2 == "") 
			{
            $("label#password2_error").show();
            $("input#password2").focus();
			}
			if (password1 != password2 && password1 != "" && password2 != "") 
			{
		    $("label#password_error").show();
            $("input#password2").focus();
			}
			return false;
		}
		
		var dataString = 'username='+ username + '&password1=' + password1 + '&password2=' + password2;
		
		// passes to helper function to add to database
		$.ajax(
		{
			type: "POST",
			url: "process.php",
			data: dataString,
			success: function() 
			{
				$('#contact_form').html("<div id='message'></div>");
				$('#message').html("<h2>Successfully Registered!</h2>")
				.append("<p>You're now ready to <a href=\"loginAJAX.php\">Log In!</a> <p>")
				.hide()
				.fadeIn(1500, function() 
				{
					$('#message');
				});
			}
		});
  
		// adds new user to table without refresh
		$.post("updatetable.php", {
		username: $('#username').val(),
		}, function(response2)
		{
			setTimeout("finishAjax2('Info2', '"+escape(response2)+"')", 450);
		});
  
		return false;
    });
  
});
  
function finishAjax2(id, response)
{
	$('#'+id).html(unescape(response));
	var valid = $("#Info2").html();
	if (valid == '0') 
	{
       alert("Error processing request.");
	}
	else 
	{
		$('#Members').hide();
		$('#Info2').show();
	}
} 
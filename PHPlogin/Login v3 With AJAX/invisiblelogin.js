$(function() 
// ---------------------------------------- Verifies form fields have entries ----------------------------------------
	{
		$('.error').hide();
		$(".button").click(function() 
		{
			$('.error').hide();
			var username = $("input#username").val();
			var password = $("input#password").val(); 		

			if (username == "" || password == "") 
			{ 
				if (username == "") 
				{
					$("label#username_error2").show();
					$("input#username").focus();
				}
				if (password == "") 
				{
					$("label#password_error").show();
					$("input#password").focus();
				}
				return false;
			}
			return false;
		});
	});
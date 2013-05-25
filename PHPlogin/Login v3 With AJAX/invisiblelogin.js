  $(function() {
    $('.error').hide();
    $(".button").click(function() {
      // validate and process form here

      $('.error').hide();
  	    var username = $("input#username").val();
  		var password = $("input#password").val(); 		

		if (username == "" || password == "") { 
  		  if (username == "") {
            $("label#username_error2").show();
            $("input#username").focus();
          }
          if (password == "") {
            $("label#password_error").show();
            $("input#password").focus();
          }
		  return false;
		}
		
	  /*var dataString = 'username='+ username + '&password1=' + password1 + '&password2=' + password2;

  $.ajax({
    type: "POST",
    url: "process.php",
    data: dataString,
    success: function() {
      $('#contact_form').html("<div id='message'></div>");
      $('#message').html("<h2>Successfully Registered!</h2>")
      .append("<p>You're now ready to <a href=\"login.php\">Log In!</a> <p>")
      .hide()
      .fadeIn(1500, function() {
        $('#message');
      });
    }
  });*/
  
	
  
  return false;
    });
	

  
  
  });

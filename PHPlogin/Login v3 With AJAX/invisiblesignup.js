  $(function() {
    $('.error').hide();
    $(".button").click(function() {
      // validate and process form here

      $('.error').hide();
  	    var username = $("input#username").val();
  		var password1 = $("input#password1").val(); 		
  		var password2 = $("input#password2").val();

		if (username == "" || password1 == "" || password2 == "" || password1 != password2) { 
  		  if (username == "") {
            $("label#username_error").show();
            $("input#username").focus();
          }
          if (password1 == "") {
            $("label#password1_error").show();
            $("input#password1").focus();
          }
          if (password2 == "") {
            $("label#password2_error").show();
            $("input#password2").focus();
          }
	  	  if (password1 != password2 && password1 != "" && password2 != "") {
		    $("label#password_error").show();
            $("input#password2").focus();
          }
		  return false;
		}
		
	  var dataString = 'username='+ username + '&password1=' + password1 + '&password2=' + password2;

  $.ajax({
    type: "POST",
    url: "process.php",
    data: dataString,
    success: function() {
	  $('#Members').fadeIn(1500);
      $('#contact_form').html("<div id='message'></div>");
      $('#message').html("<h2>Successfully Registered!</h2>")
      .append("<p>You're now ready to <a href=\"login.php\">Log In!</a> <p>")
      .hide()
      .fadeIn(1500, function() {
        $('#message');
      });
    }
  });
  return false;
    });
  });
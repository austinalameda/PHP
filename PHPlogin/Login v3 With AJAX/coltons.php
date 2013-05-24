$(".submit").click(function() {
var firstname = $("#firstname").val();
var lastname = $("#lastname").val();
var lastname = $("#email").val();
var username = $("#username").val();
var password = $("#password").val();
var dataString = 'firstname='+ firstname  + '&lastname=' + lastname + "&email" + email + '&username=' + username + '&password=' + password;
document.location.href = “contacts.php”,


 
 function() {
           var subjectString = 'Your list has been denied.';
           $.ajax({
               method: 'get',
               url: 'http://cjtrautz.me/testscript.php',
                   data: {    
                      'subject': subjectString,    
                      'ajax': true
                   },
                   success: function(data) {
                       $('#data').text(data);
                   }
           });
            $( this ).dialog( "close" );
     },
     Cancel: function() {
       $( this ).dialog( "close" );
     }
   }
So i think youll want to Post instead of get
and you will need to somehow get the data to pass in js which might be a little tricky
let me check 1 more resource
aha!
try something like this
$(".submit").click(function() {
var firstname = $("#firstname").val();
var lastname = $("#lastname").val();
var lastname = $("#email").val();
var username = $("#username").val();
var password = $("#password").val();
var dataString = 'firstname='+ firstname  + '&lastname=' + lastname + "&email" + email + '&username=' + username + '&password=' + password;
document.location.href = “contacts.php”,
the href will redirect
 Colton is typing…

 
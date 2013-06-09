$(document).on('mouseenter', 'tr', function()
{
	$(this).css('border','5px solid red');  
});

$(document).on('mouseleave','tr', function() 
{
	$(this).css('border','1px solid black');
});
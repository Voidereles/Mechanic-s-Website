$('input#idn-submit').on('click',function()
{
	//alert(1);
	var idn = $('input#idn').val();
	
	if($.trim(idn) != "")
	{
		$.post('sprawdzZamowienie.php', {idn:idn},function(data)
			{
				$('div#idn-data').html(data);
			});
	}
});


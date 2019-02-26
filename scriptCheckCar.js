$('input#idn-submit').on('click',function()
{
	//alert(1);
	var idn = $('input#idn').val();
	
	if($.trim(idn) != "")
	{
		$.post('writeCar.php', {idn:idn},function(data)
			{
				$('div#idn-data').html(data);
			});
	}
});


<?php
if(isset($_POST['idn']) == true && empty($_POST['idn']) === false)
{
	require 'connect.php';
	
	$idn = $connection->real_escape_string($_POST['idn']); 
	$sql = $connection->query("SELECT car, koszt, etap FROM naprawy WHERE idn='$idn' ");
		if($sql->num_rows > 0)
		{
			while ($data = $sql->fetch_array())
			{
                echo "Naprawa Twojego auta <span class='bold'>{$data['car']}</span> jest na etapie: <span class='bold'>{$data['etap']}</span> <xmp></xmp> Koszt naprawy wyniósł <span class='bold'>{$data['koszt']}</span> zł.";
			}
		}
		else
		{
			echo 'Auto nie znajduje się w bazie danych lub koszt nie został jeszcze wprowadzony.';
		}
}

?>

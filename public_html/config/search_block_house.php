<?php

require_once '../../base/connection_base.php'; 

$rate_bufer =  $db->query('SELECT * FROM rate');			// обращаемся к таблице цен
$read_rate = $rate_bufer->fetchAll();

foreach ($read_rate as $rate_field)
	{
		if ($rate_field['block'] == '0')
			{
				echo '<script>	
						document.getElementById("house_'.$rate_field['number_house'].'").style.display = "none";
						document.getElementById("house_'.$rate_field['number_house'].'_block").style.display = "block"
					</script>';
			}
	}

?>
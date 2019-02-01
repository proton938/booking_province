<?php

require_once '../../base/connection_base.php';


$year = 2020;
$month = '01';
$count_day = 31;
$date = 0;
$weekday = 3; 							// день недели первого числа месяца

for ($i = 1; $i <= $count_day; $i++)
	{
		$date++;
		$weekday++;							// отсчет дней недели с воскресенья
		
		if ($weekday > 7)
			{
				$weekday = 1;
			}

		$db->query('INSERT INTO numbers ( 
										year, 
										month,
										date,
										weekday
												)
												VALUES	(
															"'.$year.'",
															 "'.$month.'",
															 "'.$date.'",
															 "'.$weekday.'"
															 )');
	}
	
$bufer = $db->query('SELECT * FROM numbers');
$readbufer = $bufer->fetchAll();

foreach ($readbufer as $field)	
	{
		echo $field['date'].' _ '.$field['weekday'].'<br>';
	}

?>
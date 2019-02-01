<?php 

if (isset($_REQUEST['user_number'])) { $user_number = $_REQUEST['user_number']; }                  	// номер пользователя в таблице
if (isset($_REQUEST['number_request'])) { $number_request = $_REQUEST['number_request']; }			// номер заявки

require_once '../../base/connection_base.php';

$request_bufer = $db->query('SELECT * FROM hotel_accounts WHERE SITENUMBER = "'.$number_request.'"');     // обращаемся к таблице для delfin				
$read_request = $request_bufer->fetchAll();

$payment_bufer = $db->query('SELECT * FROM hotel_accountpayments');    			// обращаемся к таблице истории платежей
$read_payment = $payment_bufer->fetchAll();

$success_payment = 0;								// определяем - есть ли успешные платежи
foreach ($read_payment as $payment_field)
	{
		if ($payment_field['SITENUMBER'] == $number_request && $payment_field['SUCCESS'] == 1)
			{
				if ($payment_field['IDPAYMENTTYPE'] == 16 or $payment_field['IDPAYMENTTYPE'] == 90 or $payment_field['IDPAYMENTTYPE'] == 103)
					{
						$success_payment = 0;
					}
				else
					{
						$success_payment = 1;
					}
			}
	}

$db->query('UPDATE hotel_accounts SET APPROVAL = "1" WHERE SITENUMBER = "'.$number_request.'"');

foreach ($read_request as $request_field)
	{
		$rate_bufer =  $db->query('SELECT * FROM rate WHERE id_room = "'.$request_field['IDROOM'].'"');			// обращаемся к таблице цен
		$read_rate = $rate_bufer->fetchAll();
		
		foreach ($read_rate as $rate_field)
			{
				$current_number_id = $rate_field['id'];						// выводим номер
			}
			
		$checkin =	$request_field['CHECKIN'];								// дата заезда
		$checkin = preg_split('/\./', $checkin);
		
		$checkout =	$request_field['CHECKOUT'];								// дата выезда
		$checkout = preg_split('/\./', $checkout);
										
		$payment = $request_field['BALANCE'];
	}
	
$number_bufer = $db->query('SELECT * FROM numbers');			// обращаемся к таблице прайса номеров
$read_number = $number_bufer->fetchAll();
	
foreach ($read_number as $number_field)
	{
		if ($number_field['year']==$checkin[2] && $number_field['month']==$checkin[1] && $number_field['date']==$checkin[0])
			{										
				 $switch = 1;	
			}
		if ($number_field['year']==$checkout[2] && $number_field['month']==$checkout[1] && $number_field['date']==$checkout[0])
			{										
				 $switch = 0;	
			}
		if ($switch == 1)
			{
				// убираем бронирование - вводим "" в соответствующее поле
				$db->query('UPDATE numbers SET number_'.$current_number_id.' = "'.$success_payment.'" WHERE id = "'.$number_field['id'].'"'); 
				$db->query('UPDATE numbers SET user_'.$current_number_id.' = "'.$user_number.'" WHERE id = "'.$number_field['id'].'"');
			}
	}
	
echo '<script>setTimeout("load_user_history_'.$user_number.'()", 100);</script>';	
	
?>


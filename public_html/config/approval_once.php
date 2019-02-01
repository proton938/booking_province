<?php 

if (isset($_REQUEST['user_number'])) { $user_number = $_REQUEST['user_number']; }                  				// номер пользователя в таблице
if (isset($_REQUEST['number_request'])) { $number_request = $_REQUEST['number_request']; }						// номер заявки
if (isset($_REQUEST['id_block_request'])) { $id_block_request = $_REQUEST['id_block_request']; }			// номер блока заявок

require_once '../../base/connection_base.php';

$request_bufer = $db->query('SELECT * FROM hotel_accounts WHERE SITENUMBER = "'.$number_request.'"');     // обращаемся к таблице для delfin				
$read_request = $request_bufer->fetchAll();

foreach ($read_request as $request_field)
	{
		$payment = $request_field['BALANCE'];
	}

$history_bufer =  $db->query('SELECT * FROM history WHERE id = "'.$id_block_request.'"');			// обращаемся к таблице истории блоков заявок по id 
$read_history = $history_bufer->fetchAll();

foreach ($read_history as $field_history)
	{
		$sum_payment = $field_history['payment'] - $payment;
	}
		
$db->query('UPDATE history SET payment = "'.$sum_payment.'" WHERE id = "'.$id_block_request.'"'); 


$db->query('UPDATE hotel_accounts SET APPROVAL = "1" WHERE SITENUMBER = "'.$number_request.'"');
$db->query('UPDATE hotel_accounts SET BALANCE = "0" WHERE SITENUMBER = "'.$number_request.'"');

echo '<script>setTimeout("load_user_history_'.$user_number.'()", 100);</script>';
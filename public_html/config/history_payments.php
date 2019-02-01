<?php

if (isset($_REQUEST['sitenumber'])) {$sitenumber = $_REQUEST['sitenumber'];}


require_once '../../base/connection_base.php'; 

$payment_bufer = $db->query('SELECT * FROM hotel_accountpayments');    			// обращаемся к таблице истории платежей
$read_payment = $payment_bufer->fetchAll();


foreach ($read_payment as $payment_field)
	{
		if ($payment_field['SITENUMBER'] == $sitenumber && $payment_field['SUCCESS'] == 1)
			{
				$payment_type_bufer = $db->query('SELECT * FROM hotel_paymenttypes WHERE id_payment_type = "'.$payment_field['IDPAYMENTTYPE'].'"');     // обращаемся к таблице тип оплаты
				$read_payment_type = $payment_type_bufer->fetchAll();
				foreach ($read_payment_type as $payment_type_field)
					{
						$description_payment_type = $payment_type_field['description'];
					}
					
				echo '<br>
						<table style = "width: 96%; padding: 5px 10px 5px 10px; background: #eee;">
							<tr>
								<td style = "width: 65%; height: 35px;" >
									<a style = "font-weight: normal; font-size: 14px;" >Платеж:</a> <br>							
									<a style = " font-weight: normal; font-size: 13px; color: red;"> '.$payment_field['SITEPAY'].'</a>
								</td>
							
								<td style = "width: 33%; text-align: left; height: 35px;" >
									<a style = "font-weight: normal; font-size: 13px;" >Дата:</a> <br>
									<a style = "font-weight: normal; font-size: 13px; color: red;"> '.$payment_field['DATEDOC'].'</a>
								</td>
							</tr>
							<tr>
								<td style = "width: 65%; height: 35px;" >
									<a style = "font-weight: normal; font-size: 13px;" >Файл в архиве:</a><br> 							
									<a style = " font-weight: normal;  font-size: 13px; color: red;"> '.$payment_field['FILE_NAME'].'</a>
								</td>
								<td>
									<a style = "font-weight: normal; font-size: 13px;" >'.$payment_field['COMMENT'].'</a>
								</td>
							</tr>
						</table>
						<table style = "width: 96%; padding: 5px 10px 5px 10px; background: #eee;" >
							<tr>
								<td>
									<a style = "font-weight: normal; font-size: 14px;" >Сумма:</a>							
									<a style = " font-weight: normal;  font-size: 16px; color: red;"> '.$payment_field['SUMMA'].'</a>
								</td>
								<td style = "text-align: right; width: 50%;">						
									<a style = " font-weight: normal; font-size: 13px;">'.$description_payment_type.'</a>
								</td>
							</tr>
						</table>
					';
				if ($payment_field['BANK_ORDER_ID'] != '')
					{	
						echo '<div style = "width: 96%; background: #eee; padding: 10px 0px 10px 0px; ">
								<table style = "width: 90%; background: #fff; background: #fff; border: dotted 1px #bbb;">
									<tr>
										<td style = "width: 35%; height: 35px; border: dotted 1px #bbb; padding-left: 10px;" >
											<a style = "font-weight: normal; font-size: 13px;" >id СБЕРБАНК:</a><br> 							
										</td>
										<td style = "width: 55%; height: 35px; border: dotted 1px #bbb; padding-left: 10px;" >
											<a style = " font-weight: normal;  font-size: 13px; color: red;"> '.$payment_field['BANK_ORDER_ID'].'</a>
										</td>
									</tr>
								</table>
							</div>
							';
					}
			}
	}

	
?>
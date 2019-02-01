<?php

$email = 'proton938@mail.ru';
$return = mail($email, 'Оплата заявки: '.$request_field['SITENUMBER'], 	'
						'.$request_field['FIO'].' т.  '.$request_field['PHONE'].'
						
						Гостиничный номер: '.$name_room.'
						Заезд: '.$request_field['CHECKIN'].'
						Выезд: '.$request_field['CHECKOUT'].'
						
						Оплачено: '.$payment_field['SUMMA'].'
						Осталось доплатить: '.($request_field['FULL_RATE'] - $payment_field['SUMMA']).'
						
						Код платежа: '.$payment_field['SITEPAY'].'						
						id СБЕРБАНКа: '.$payment_field['BANK_ORDER_ID'], "Content-type: text/plain; charset=utf-8");          // отправляем отчет на email

?>
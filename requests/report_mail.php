<?php

$email = 'proton938@mail.ru';
$return = mail($email, 'Заявка '.$accountnumber, '

						'.$surname.' '.$name.' '.$patronymic.' т. '.$telephone.'
 
						Гостиничный номер: '.$rate_field['name_room'].'
						Дата заезда: '.$start.' 
						Дата выезда: '.$end.' 
						
						Заявлено к оплате: '.$sum_interval*$prepayment.'
						Полная стоимось проживания: '.$sum_interval.'
						Остаток: '.($sum_interval - $sum_interval*$prepayment), "Content-type: text/plain; charset=utf-8");          // отправляем отчет на email

?>
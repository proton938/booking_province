
<?php

	if (isset($_REQUEST['user_number'])) { $user_number = $_REQUEST['user_number']; }


	require_once '../../base/connection_base.php';

	$user_bufer = $db->query('SELECT * FROM user WHERE id = "'.$user_number.'"');     // обращаемся к таблице пользователей для вывода фамилии и телефона в заголовке
	$read_user = $user_bufer->fetchAll();


	foreach ($read_user as $user_field)
		{
			echo '	<script>
						document.getElementById("surname").value = "'.$user_field['surname'].'";
						document.getElementById("name").value = "'.$user_field['name'].'";
						document.getElementById("patronymic").value = "'.$user_field['patronymic'].'";
						document.getElementById("telephone").value = "'.$user_field['telephone'].'";
						document.getElementById("email").value = "'.$user_field['email'].'";
						document.getElementById("passport_series").value = "'.$user_field['passport_series'].'";
						document.getElementById("passport_number").value = "'.$user_field['passport_number'].'";
						document.getElementById("passport_who_issue").value = "'.$user_field['passport_who_issue'].'";
						document.getElementById("date_issue").value = "'.$user_field['date_issue'].'";
					</script>';
		}
 


	echo '<table cellspacing = "15px;" style = "width: 470px;">';


	$history_bufer =  $db->query('SELECT * FROM history ORDER BY id DESC');						// обращаемся к таблице истории заявок
	$read_history = $history_bufer->fetchAll();
				
	foreach($read_history as $history_field)													// выводим историю пользователя
		{
			if ($history_field['user_id'] == $user_field['id'])
				{	
					$event_date = preg_split('/ /', $history_field['time']);
					$event_time = $event_date[0];
					$event_date = $event_date[1];
					echo '<tr style = "vertical-align: top;">
							<td style = "position: relative; background: rgba(255, 255, 255, 1); padding: 10px; border-radius: 5px; background: rgba(245, 245, 245, 1);">
							<a style = " position: absolute; top: -5px; left: -5px; background: rgba(255, 165, 0, 1); padding: 5px; -10px; border-radius: 5px;">'.$event_time.' <span style = "opacity: 0;">___</span> '.$event_date.'</a>
							';
					$number_house = preg_split('/ number:/', $history_field['booking']);
					$counter = '';
					for ($i = 1; $i <= count($number_house)-1; $i++)
						{
							$dates = preg_split('/dates:/', $number_house[$i]);
							$hotel_number = $dates[0];
							$dates = $dates[1];
							$counter = $counter.'<div style = "	width: 100%; 
																padding: 5px 10px 5px 10px; 
																margin-left: -10px; 
																background: #FFA500; 
																font-size: 12px;"> Номер: '.$hotel_number.'<br>Бронируемые даты: '.$dates.'</div>';
						}
					$number_house = $number_house[0];
					
					echo '	<a 	style = "float: right; cursor: pointer;"
								onclick = "unload_load_house_'.$number_house.'()"><strong>Дом: '.$number_house.'</a><br><br>';
							
					$counter_request = preg_split('/,/', $history_field['request_code']);
					for ($i = 0; $i <= count($counter_request)-1; $i++)
						{
							$request_bufer = $db->query('SELECT * FROM hotel_accounts WHERE SITENUMBER = "'.$counter_request[$i].'"');     // обращаемся к таблице для delfin
							$read_request = $request_bufer->fetchAll();
							
							foreach ($read_request as $request_field)
								{
									$rate_bufer =  $db->query('SELECT * FROM rate WHERE id_room = "'.$request_field['IDROOM'].'"');			// обращаемся к таблице цен
									$read_rate = $rate_bufer->fetchAll();
									
									foreach ($read_rate as $rate_field)
										{
											$current_number = $rate_field['name_room'];
										}
									
									$residue = $request_field['FULL_RATE'] - $request_field['BALANCE'];       // выводим остаток
									
									$payment_type_bufer = $db->query('SELECT * FROM hotel_paymenttypes WHERE id_payment_type = "'.$request_field['IDPAYMENTTYPE'].'"');     // обращаемся к таблице тип оплаты
									$read_payment_type = $payment_type_bufer->fetchAll();
									foreach ($read_payment_type as $payment_type_field)
										{
											$description_payment_type = $payment_type_field['description'];
											$id_payment_type = $payment_type_field['id_payment_type'];
										}
									
									echo '	
										<div style = "background: #fff; border: dotted 1px #bbb;">
										<br>
										
										<span style = "margin-left: 20px; font-weight: normal; " >Заявка №: 											
										<a style = "color: #aaa;">'.$counter_request[$i].'</a></span><br><br>
										
										<span style = "margin-left: 20px; font-weight: normal; " >Имя файла: 											
										<a style = "color: #aaa;">'.$request_field['FILE_NAME'].'</a></span><br><br>
										
										<span style = "margin-left: 20px; font-weight: normal; " >Гостиничный номер: 											
										<a style = "color: #aaa;">'.$current_number.'</a></span><br><br>
										
										<center>		
										<table style = "width: 80%;">	
										  <tr>
											<td style = "width: 40%; height: 20px; font-size: 15px; color: #555;">
												Заезд: <span style = "font-size: 17px; color: red;">'.$request_field['CHECKIN'].'</span>
											</td>
											<td style = "width: 40%; height: 20px; font-size: 15px; color: #555;">
												Выезд: <span style = "font-size: 17px; color: red;">'.$request_field['CHECKOUT'].'</span>
											</td>
										  </tr>										
										</table><br>
										

										
										<table cellspacing = "10px;" class = "request_table">
											<tr>
												<td>
													<a style = "color: #555; font-size: 15px;">
														Тариф: 
													</a>
												</td>
												<td>
													<span style = "font-size: 17px; color: red;">'.$history_field['tarif'].'</span>
												</td>
											</tr>
											<tr>
												<td>
													<a style = "color: #555; font-size: 15px;">
														Сумма к оплате: 
													</a>
												</td>
												<td>
													<span style = "font-size: 17px; color: red;">'.$request_field['FULL_RATE'].'</span>
												</td>
											</tr>
											<tr>
												<td>		
													<a style = "color: #555; float: left; font-size: 15px;">
														Оплачено: 
													</a>
												</td>
												<td>
													<span style = "font-size: 17px; color: red;">'.$request_field['BALANCE'].'</span>
												</td>
											</tr>
											<tr>
												<td>	
													<a style = "color: #555;  font-size: 15px;">
														Остаток: 
													</a>
												</td>
												<td>
													<span style = "font-size: 17px; color: red;">'.$residue.'</span>
												</td>
											</tr>
											<tr>
												<td>	
													<a style = "color: #555;  font-size: 15px;">
														Тип оплаты: 
													</a>
												</td>
												<td>
													<span style = "font-size: 17px; color: red;">'.$description_payment_type.'</span>
												</td>
											</tr>
										</table>

										
										<script>
											function load_outputting_row_'.$counter_request[$i].'()
												{
													$("#load_approval").load("../config/outputting_row.php", "request_code='.$counter_request[$i].'");
													document.getElementById("request_'.$counter_request[$i].'").innerHTML = "<a href = \'../requests/import/'.$counter_request[$i].'.xml\' download>Скачать</a>";
												}
										</script>
										
										<div style = " position: relative; width: 90%;">
											<br><input 	type = "button" 
												style = "float: right;
														right: 0px;
														background: #ddd; 
														border: none; padding: 3px 10px 3px 10px; 
														border-radius: 5px;
														cursor: pointer;" value = "Выгрузить"
														onclick = "load_outputting_row_'.$counter_request[$i].'()"
														/>
											<div id = "request_'.$counter_request[$i].'" 
												style = "float: right; padding: 0px 20px 0px 0px;"></div>
										</div>										
										<br><br>';

									if ($request_field['FROM_THE_SITE'] == 1 && $request_field['APPROVAL'] == 1)									// если блок заявок был отправлен с сайта и заявка утверждена
										{
											if ($request_field['BALANCE'] != $request_field['FULL_RATE'])		// если оплачено не 100% выводим опцию доплаты
												{
													echo '
													<div style = "float: left; background: #fff; width: 150px; padding: 10px; border: dotted 1px #bbb; margin-left: 10px;">
													<table style = "">
														<tr style = "vertical-align: top;">
															<td>
																<div style = "position: relative; width: 130px;">
																	<a style = "position: relative; font-size: 13px;" >Тип доплаты:</a><br><br>
																	<div class = "get_tarif" style = "margin-top: -10px;" > 
																	<center>
																		<input type = "hidden" style = "width: 30px;" value = "" id = "select_type_debt_'.$request_field['id'].'" name = "select_type_debt" />
																		<input type = "text" value = "" id = "name_type_debt_'.$request_field['id'].'" style =  "width: 120px; text-align: center; background: #ddd; border: solid 1px #fff; border-style: inset; height: 25px;" />
																		
																		<script>
																			function сash_debt_'.$request_field['id'].'()
																				{
																					document.getElementById("name_type_debt_'.$request_field['id'].'").value = "Наличный платеж";
																					document.getElementById("select_type_debt_'.$request_field['id'].'").value = "15";
																					document.getElementById("button_payment_100_'.$request_field['id'].'").style.display = "block";
																				}				
																			function non_cash_debt_'.$request_field['id'].'()
																				{
																					document.getElementById("name_type_debt_'.$request_field['id'].'").value = "Безналичный платеж";
																					document.getElementById("select_type_debt_'.$request_field['id'].'").value = "30";
																					document.getElementById("button_payment_100_'.$request_field['id'].'").style.display = "block";
																				}
																			function credit_card_debt_'.$request_field['id'].'()
																				{
																					document.getElementById("name_type_debt_'.$request_field['id'].'").value = "Банковская карта";
																					document.getElementById("select_type_debt_'.$request_field['id'].'").value = "77";
																					document.getElementById("button_payment_100_'.$request_field['id'].'").style.display = "block";
																				}
																			function gift_debt_'.$request_field['id'].'()
																				{
																					document.getElementById("name_type_debt_'.$request_field['id'].'").value = "Подарок";
																					document.getElementById("select_type_debt_'.$request_field['id'].'").value = "143";
																					document.getElementById("button_payment_100_'.$request_field['id'].'").style.display = "block";
																				}
																			function certificate_debt_'.$request_field['id'].'()
																				{
																					document.getElementById("name_type_debt_'.$request_field['id'].'").value = "Оплата сертификатом";
																					document.getElementById("select_type_debt_'.$request_field['id'].'").value = "174";
																					document.getElementById("button_payment_100_'.$request_field['id'].'").style.display = "block";
																				}
																		</script>
																		
																		<div id = "all_tarif" class = "all_tarif" >
																			<input type = "button" value = "Наличный платеж" onclick = "сash_debt_'.$request_field['id'].'()"  /><br>
																			<input type = "button" value = "Безналичный платеж" onclick = "non_cash_debt_'.$request_field['id'].'()" /><br>
																			<input type = "button" value = "Банковская карта" onclick = "credit_card_debt_'.$request_field['id'].'()" />
																			<input type = "button" value = "Подарок" onclick = "gift_debt_'.$request_field['id'].'()" />
																			<input type = "button" value = "Оплата сертификатом" onclick = "certificate_debt_'.$request_field['id'].'()" />
																			<br>
																		</div>
																	</center>
																	</div>
																</div>
															</td>
														</tr>
														<tr>
															<td style = "width: 70px;"><br><br>
																<script>
																	function load_payment_100_'.$user_number.'_'.$history_field['id'].'_'.$request_field['id'].'()
																		{
																			var read_select_type_debt = document.getElementById("select_type_debt_'.$request_field['id'].'").value;
																			$("#load_approval").load("../config/payment_100.php", "user_number='.$user_number.'&number_request='.$counter_request[$i].'&id_block_request='.$history_field['id'].'&payment_type="+read_select_type_debt);
																		}
																</script>
																<input 	type = "button" 
																	id = "button_payment_100_'.$request_field['id'].'"
																	style = "display: none;
																			float: right;
																			background: rgba(255, 165, 0, 1); 
																			border: none; padding: 3px 10px 3px 10px; 
																			border-radius: 5px;
																			cursor: pointer;" value = "Доплата"
																			onclick = "load_payment_100_'.$user_number.'_'.$history_field['id'].'_'.$request_field['id'].'()"
																			>
															</td>
														<tr>
													</table>
													</div>
													';
												}
												
											if ($request_field['BALANCE'] != 0)		// если баланс пустой
												{						
													// опция отказа
													echo   '
														<div style = "float: right; background: #fff; width: 150px; padding: 10px; border: dotted 1px #bbb; float: right; margin-right: 10px;">	
															<table>
																<tr style = "vertical-align: top;">
																	<td>
																		<div style = "position: relative; width: 130px;">
																			<a style = "position: relative; font-size: 13px;" >Тип возврата:</a><br><br>
																			<div class = "get_tarif" style = "margin-top: -10px;" > 
																			<center>
																				<input type = "hidden" style = "width: 30px;" value = "" id = "select_type_return_'.$request_field['id'].'" name = "select_type_return" />
																				<input type = "text" value = "" id = "name_type_return_'.$request_field['id'].'" style =  "width: 120px; text-align: center; background: #ddd; border: solid 1px #fff; border-style: inset; height: 25px;" />
																				
																				<script>
																					function сash_return_'.$request_field['id'].'()
																						{
																							document.getElementById("name_type_return_'.$request_field['id'].'").value = "Наличными";
																							document.getElementById("select_type_return_'.$request_field['id'].'").value = "16";
																							document.getElementById("button_refusal_once_'.$request_field['id'].'").style.display = "block";
																						}				
																					function non_cash_return_'.$request_field['id'].'()
																						{
																							document.getElementById("name_type_return_'.$request_field['id'].'").value = "Безналичный";
																							document.getElementById("select_type_return_'.$request_field['id'].'").value = "103";
																							document.getElementById("button_refusal_once_'.$request_field['id'].'").style.display = "block";
																						}
																					function credit_card_return_'.$request_field['id'].'()
																						{
																							document.getElementById("name_type_return_'.$request_field['id'].'").value = "Банковская карта";
																							document.getElementById("select_type_return_'.$request_field['id'].'").value = "90";
																							document.getElementById("button_refusal_once_'.$request_field['id'].'").style.display = "block";
																						}
																				</script>
																				
																				<div id = "all_tarif" class = "all_tarif" >
																					<input type = "button" value = "Наличными" onclick = "сash_return_'.$request_field['id'].'()"  /><br>
																					<input type = "button" value = "Безналичный" onclick = "non_cash_return_'.$request_field['id'].'()" /><br>
																					<input type = "button" value = "Банковская карта" onclick = "credit_card_return_'.$request_field['id'].'()" />
																					<br>
																				</div>
																			</center>
																			</div>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td style = "width: 70px;"><br><br>
																		<input type = "button"
																				id = "button_refusal_once_'.$request_field['id'].'"
																				style = "display: none;
																						float: right;
																						background: rgba(255, 165, 0, 1); 
																						border: none; padding: 3px 10px 3px 10px; 
																						border-radius: 5px;
																						cursor: pointer;" value = "Отказ"
																						onclick = "load_refusal_once_'.$user_number.'_'.$history_field['id'].'_'.$request_field['id'].'()"
																						>
																		<script>
																			function load_refusal_once_'.$user_number.'_'.$history_field['id'].'_'.$request_field['id'].'()
																				{
																					var read_select_type_return = document.getElementById("select_type_return_'.$request_field['id'].'").value;
																					$("#load_approval").load("../config/refusal_once.php", "user_number='.$user_number.'&number_request='.$counter_request[$i].'&id_block_request='.$history_field['id'].'&payment_type="+read_select_type_return);
																				}
																		</script>
																	</td>
																</tr>
															</table>
														</div>';
												}
										}
										
									if ($request_field['APPROVAL'] == '0')									// если блок заявок был отправлен с сайта и заявка утверждена
										{
											echo '<br>
												<a 	 style = " 
													background: rgba(150, 0, 0, 1); 
													border: none; padding: 3px 10px 3px 10px; 
													border-radius: 5px;
													color: #eee;">
														Отменена
													</a><br><br>
												<input 	type = "button" 
														style = " 
																background: rgba(255, 165, 0, 1); 
																border: none; padding: 3px 10px 3px 10px; 
																border-radius: 5px;
																cursor: pointer;" value = "Вернуть"
																onclick = "load_bring_back_once_'.$user_number.'_'.$history_field['id'].'_'.$request_field['id'].'()"
													>
												<script>
													function load_bring_back_once_'.$user_number.'_'.$history_field['id'].'_'.$request_field['id'].'()
														{
															$("#load_approval").load("../config/bring_back_once.php", "user_number='.$user_number.'&number_request='.$counter_request[$i].'");
														}
												</script><br><br>';
										}
										
									if ($request_field['FROM_THE_SITE'] == 1 && $request_field['APPROVAL'] == 1)									// если блок заявок был отправлен с сайта
										{
											echo '<br><br><br><br><br><br><br><br>
												<input 	type = "button" 
														style = " 
																background: rgba(255, 165, 0, 1); 
																border: none; padding: 3px 10px 3px 10px; 
																border-radius: 5px;
																cursor: pointer;" value = "Отменить заявку"
																onclick = "load_cancellation_'.$user_number.'_'.$history_field['id'].'_'.$request_field['id'].'()"
													>
												<script>
													function load_cancellation_'.$user_number.'_'.$history_field['id'].'_'.$request_field['id'].'()
														{
															$("#load_approval").load("../config/cancellation_once.php", "user_number='.$user_number.'&number_request='.$counter_request[$i].'");
														}
												</script><br><br>';
										}
										
									echo '										
											<span style = "font-weight: normal;" >
												Утвержденные платежи: 
											</span>
											
											<div class = "output_payments" id = "output_payments_'.$request_field['SITENUMBER'].'">
												<div onclick = "load_history_payments_'.$request_field['SITENUMBER'].'()">
													<hr style = "width: 90%;" color = "#eee" size = "3px" noshade">
													<div style = "border: 20px solid transparent; width: 0px; margin-top: -10px; border-top: 20px solid #eee;"></div>
												</div>
											</div>
											
											<script>
												function load_history_payments_'.$request_field['SITENUMBER'].'()
													{
														$("#output_payments_'.$request_field['SITENUMBER'].'").load("../config/history_payments.php", "sitenumber='.$request_field['SITENUMBER'].'");
													}
											</script>
											
											<br>
										</div>
										<br>';
								}
						}
					$full_residue = $history_field['sum'] - $history_field['payment']; 		// выводим полный остаток
					echo	'
							<a style = "color: red; ">
								Полная сумма: <strong>'.$history_field['sum'].'</strong>
							</a>
							<br><br>
							<a style = "color: red; ">
								Оплачено: <strong>'.$history_field['payment'].'</strong>
							</a>
							<br><br>
							<a  style = "color: red; ">
								Остаток: <strong>'.$full_residue.'</strong>
							</a>';
								
							
					if ($history_field['approval'] == '' && $request_field['FROM_THE_SITE'] != 1)
						{
							echo '	<input 	type = "button" 
											style = "float: right; 
													background: rgba(255, 165, 0, 1); 
													border: none; padding: 3px 10px 3px 10px; 
													border-radius: 5px;
													cursor: pointer;" value = "Утвердить блок заявок"
													onclick = "load_approval_'.$user_number.'_'.$history_field['id'].'()"
													>
									<br>
									<br>
									<script>
										function load_approval_'.$user_number.'_'.$history_field['id'].'()
											{
												$("#load_approval").load("../config/approval.php", "user_number='.$user_number.'&number_request='.$history_field['id'].'&booking='.$history_field['booking'].'&payment_type='.$id_payment_type.'");
											}
									</script>									
								
									<input type = "button" 
											style = "float: right; 
													background: rgba(255, 165, 0, 1); 
													border: none; padding: 3px 10px 3px 10px; 
													border-radius: 5px;
													cursor: pointer;" value = "Отменить блок заявок"
													onclick = "load_cancellation_'.$user_number.'_'.$history_field['id'].'()"
													>
									<script>
										function load_cancellation_'.$user_number.'_'.$history_field['id'].'()
											{
												$("#load_approval").load("../config/cancellation.php", "user_number='.$user_number.'&number_request='.$history_field['id'].'&booking='.$history_field['booking'].'");
											}
									</script>
									';
						}
						
					if ($history_field['approval'] == 'on')
						{										
							echo '	<a 	 style = "float: right; 
										background: rgba(150, 0, 0, 1); 
										border: none; padding: 3px 10px 3px 10px; 
										border-radius: 5px;
										color: #eee;"> 
											Утверждено
										</a>
										<br>
										<br><br>';
										
							if ($history_field['payment'] != $history_field['sum'])
								{
									echo '	<div style = "float: left; background: #fff; width: 150px; padding: 10px; border: dotted 1px #bbb; margin-left: 10px;">
											<table style = "">
												<tr style = "vertical-align: top;">
													<td>
														<div style = "position: relative; width: 130px;">
															<a style = "position: relative; font-size: 13px;" >Тип доплаты:</a><br><br>
															<div class = "get_tarif" style = "margin-top: -10px;" > 
															<center>
																<input type = "hidden" style = "width: 30px;" value = "77" id = "select_type_debt" name = "select_type_debt" />
																<input type = "text" value = "Банковская карта" id = "name_type_debt" style =  "width: 120px; text-align: center; background: #ddd; border: solid 1px #fff; border-style: inset; height: 25px;" />
																
																<script>
																	function сash_debt()
																		{
																			document.getElementById("name_type_debt").value = "Наличный платеж";
																			document.getElementById("select_type_debt").value = "15";
																		}				
																	function non_cash_debt()
																		{
																			document.getElementById("name_type_debt").value = "Безналичный платеж";
																			document.getElementById("select_type_debt").value = "30";
																		}
																	function credit_card_debt()
																		{
																			document.getElementById("name_type_debt").value = "Банковская карта";
																			document.getElementById("select_type_debt").value = "77";
																		}
																	function gift_debt()
																		{
																			document.getElementById("name_type_debt").value = "Подарок";
																			document.getElementById("select_type_debt").value = "143";
																		}
																	function certificate_debt()
																		{
																			document.getElementById("name_type_debt").value = "Оплата сертификатом";
																			document.getElementById("select_type_debt").value = "174";
																		}
																</script>
																
																<div id = "all_tarif" class = "all_tarif" >
																	<input type = "button" value = "Наличный платеж" onclick = "сash_debt()"  /><br>
																	<input type = "button" value = "Безналичный платеж" onclick = "non_cash_debt()" /><br>
																	<input type = "button" value = "Банковская карта" onclick = "credit_card_debt()" />
																	<input type = "button" value = "Подарок" onclick = "gift_debt()" />
																	<input type = "button" value = "Оплата сертификатом" onclick = "certificate_debt()" />
																	<br>
																</div>
															</center>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td style = "width: 70px;"><br><br>
														<script>
															function load_approval_100_'.$user_number.'_'.$history_field['id'].'()
																{
																	var read_select_type_debt = document.getElementById("select_type_debt").value;
																	$("#load_approval").load("../config/approval_100.php", "user_number='.$user_number.'&number_request='.$history_field['id'].'&booking='.$history_field['booking'].'&payment_type="+read_select_type_debt);
																}
														</script>
														<input 	type = "button" 
															style = "float: right;
																	background: rgba(255, 165, 0, 1); 
																	border: none; padding: 3px 10px 3px 10px; 
																	border-radius: 5px;
																	cursor: pointer;" value = "Доплата"
																	onclick = "load_approval_100_'.$user_number.'_'.$history_field['id'].'()"
																	>
													</td>
												<tr>
											</table>
											</div>		';
								}
																																		
							echo   '<div style = "background: #fff; width: 150px; padding: 10px; border: dotted 1px #bbb; float: right; margin-right: 10px;">	
										<table>
											<tr style = "vertical-align: top;">
												<td>
													<div style = "position: relative; width: 130px;">
														<a style = "position: relative; font-size: 13px;" >Тип возврата:</a><br><br>
														<div class = "get_tarif" style = "margin-top: -10px;" > 
														<center>
															<input type = "hidden" style = "width: 30px;" value = "90" id = "select_type_return" name = "select_type_return" />
															<input type = "text" value = "Банковская карта" id = "name_type_return" style =  "width: 120px; text-align: center; background: #ddd; border: solid 1px #fff; border-style: inset; height: 25px;" />
															
															<script>
																function сash_return()
																	{
																		document.getElementById("name_type_return").value = "Наличными";
																		document.getElementById("select_type_return").value = "16";
																	}				
																function non_cash_return()
																	{
																		document.getElementById("name_type_return").value = "Безналичный";
																		document.getElementById("select_type_return").value = "103";
																	}
																function credit_card_return()
																	{
																		document.getElementById("name_type_return").value = "Банковская карта";
																		document.getElementById("select_type_return").value = "90";
																	}
															</script>
															
															<div id = "all_tarif" class = "all_tarif" >
																<input type = "button" value = "Наличными" onclick = "сash_return()"  /><br>
																<input type = "button" value = "Безналичный" onclick = "non_cash_return()" /><br>
																<input type = "button" value = "Банковская карта" onclick = "credit_card_return()" />
																<br>
															</div>
														</center>
														</div>
													</div>
												</td>
											</tr>
											<tr>
												<td style = "width: 70px;"><br><br>
													<input type = "button" 
															style = "float: right;
																	background: rgba(255, 165, 0, 1); 
																	border: none; padding: 3px 10px 3px 10px; 
																	border-radius: 5px;
																	cursor: pointer;" value = "Отказ"
																	onclick = "load_refusal_'.$user_number.'_'.$history_field['id'].'()"
																	>
													<script>
														function load_refusal_'.$user_number.'_'.$history_field['id'].'()
															{
																var read_select_type_return = document.getElementById("select_type_return").value;
																$("#load_approval").load("../config/refusal.php", "user_number='.$user_number.'&number_request='.$history_field['id'].'&booking='.$history_field['booking'].'&payment_type="+read_select_type_return);
															}
													</script>
												</td>
											</tr>
										</table>
									</div><br><br><br><br><br><br><br><br><br>';
						}
						
					if ($history_field['approval'] == 'no')
						{
							echo '	<a 	 style = "float: right; 
										background: rgba(150, 0, 0, 1); 
										border: none; padding: 3px 10px 3px 10px; 
										border-radius: 5px;
										color: #eee;"> 
											Отменено
										</a>
										<br>
										<br>
										<input 	type = "button" 
												style = "float: right; 
														background: rgba(255, 165, 0, 1); 
														border: none; padding: 3px 10px 3px 10px; 
														border-radius: 5px;
														cursor: pointer;" value = "Вернуть"
														onclick = "load_cancellation_'.$user_number.'_'.$history_field['id'].'()"
														>
										<script>
											function load_cancellation_'.$user_number.'_'.$history_field['id'].'()
												{
													$("#load_approval").load("../config/bring_back.php", "user_number='.$user_number.'&number_request='.$history_field['id'].'&booking='.$history_field['booking'].'");
												}
										</script>';
						}
				
				}
		}
				
				
	echo '</td></tr></table>';

	?>


	



<div id = "load_approval">
</div>







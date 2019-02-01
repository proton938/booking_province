<!-- передвижной поисковик -->

<div style = "position: absolute; top: 0px;">
	<input type = "hidden" id = "count_children" value = "" style = "position: fixed; width: 100px; height: 25px; background: #fff; top: 40px; z-index: 999;">               <!--  буфер количества найденных пользователей в поисковике  -->
	<div id = "search_resultat" style = "position: fixed; left: 0; top: 0px; width: 400px; background: #fff; z-index: 100;" ></div>
</div>


<?php

if (isset($_REQUEST['number_house'])) { $number_house = $_REQUEST['number_house'];}  	// считываем номер дома 
if (isset($_REQUEST['my_history'])) { $my_history = $_REQUEST['my_history'];}  	// считываем имя файла оперативной истории

// процедура вывода суммы к оплате из файла оперативной истории
		
	$file = '../../history/'.$my_history.'.txt';					// открываем файл оперативной истории для чтения	
	$contents = file_get_contents($file); 							// считываем содержимое
	$contents = preg_split('/;/', $contents);						// разбиваем на массив по регулярному выражению ";"
	
	for ($i=0; $i<=count($contents); $i++)
		{
			$booking_date = preg_split('/,/', $contents[$i]);
			$sum = $sum + $booking_date[6];
		}
	
?>

<iframe name = "status" 
		width = "0px" 
		height = "0px" 
		style = "border: none; position: absolute; top: 0px; left: 0px; z-index: 999; ">
</iframe>


<table>
<tr style = "vertical-align: top;">
	<td>
	
	<form method = "POST" enctype = "multipart/form-data" action = "../config/insert_base_for_admin.php" target = "status">
	
		<input type = "hidden" id = "again_my_history" name = "again_my_history" value = "<?echo $my_history;?>" >
	
		<div style = "	position: relative; 
						width: 360px;
						height: 760px;						
						border: solid 1px #CAA79C; 
						border-style: outset;
						background: #CAA79C;
						display: inline-block; 
						vertical-align: top;
						padding-left: 40px;
						padding-right: 40px;
						padding-top: 10px;
						padding-bottom: 10px;
						">
		<strong>
		<a id = "number_house" style = "font-size: 35px; font-family: pragmatica; color: #fff; cursor: pointer;">
		<?echo $number_house;?>
		</a>
		<input id = "input_select_dates" name = "number_house" type = "hidden" value = "<?echo $number_house;?>"  >
			<br><br><br>
			<table style = "float: left;" >
				<tr>
					<td>
					<strong>
						<a style = "color: #fff; padding-right: 15px; font-size: 15px; font-family: pragmatica; float: left;" >
							Фамилия:
						</a>
					</strong>
					</td>
					<td style = "padding-left: 20px;" >
					<strong>
						<a style = "color: #fff; padding-right: 15px; font-size: 15px; font-family: pragmatica; float: left;" >
							Имя:
						</a>
					</strong>
					</td>
					<td style = "padding-left: 20px;" >
					<strong>
						<a style = "color: #fff; padding-right: 15px; font-size: 15px; font-family: pragmatica; float: left;" >
							Отчество:
						</a>
					</strong>
					</td>
				</tr>
				<tr>
					<td>
						<script>
							function search_goto_surname()                 // плавающий поисковик
								{
									var obj = document.getElementById("surname");
									var rect = obj.getBoundingClientRect();
									
									document.getElementById("search_resultat").style.left = rect.left+"px";
									document.getElementById("search_resultat").style.top = rect.top+27+"px";
								}
						</script>
						<input 	type = "text" autocomplete="off" 
								id = "surname" 
								name = "surname" 
								style = "border: solid 1px #CAA79C; border-style: inset; float: left; height: 25px; width: 100px; margin-top: 5px;"
								onclick = "start_search_user(); search_goto_surname()"
								required> 
					</td>
					<td style = "padding-left: 20px;" >
						<script>
							function search_goto_name()						// плавающий поисковик
								{
									var obj = document.getElementById("name");
									var rect = obj.getBoundingClientRect();
									
									document.getElementById("search_resultat").style.left = rect.left+"px";
									document.getElementById("search_resultat").style.top = rect.top+27+"px";
								}
						</script>
						<input 	type = "text" autocomplete="off" 
								id = "name" 
								name = "name" 
								style = "border: solid 1px #CAA79C; border-style: inset; float: left; height: 25px; width: 100px; margin-top: 5px;" 
								onclick = "start_search_user(); search_goto_name()"
								required> 
					</td>
					<td style = "padding-left: 20px;" >
						<script>
							function search_goto_patronymic()				// плавающий поисковик
								{
									var obj = document.getElementById("patronymic");
									var rect = obj.getBoundingClientRect();
									
									document.getElementById("search_resultat").style.left = rect.left+"px";
									document.getElementById("search_resultat").style.top = rect.top+27+"px";
								}
						</script>
						<input 	type = "text" autocomplete="off" 
								id = "patronymic" 
								name = "patronymic" 
								style = "border: solid 1px #CAA79C; border-style: inset; float: left; height: 25px; width: 100px; margin-top: 5px;" 
								onclick = "start_search_user(); search_goto_patronymic()"
								required> 
					</td>
				</tr>
			</table>
			<br><br><br><br>
			
			<table>
				<tr>
					<td>
						<a style = "color: #fff; padding-right: 20px; font-size: 15px; font-family: pragmatica; float: left;" >
						<strong>
							Телефон:
						</strong>
						</a>
					</td>
					<td style = "padding-left: 20px;" >
						<a style = "color: #fff; padding-right: 20px; font-size: 15px; font-family: pragmatica; float: left;" >
						<strong>
							E-mail:
						</strong> 
						</a>
					</td>
				</tr>
				<tr style = "vertical-align: top;">
					<td>
						<script>
							function search_goto_telephone()					// плавающий поисковик
								{
									var obj = document.getElementById("telephone");
									var rect = obj.getBoundingClientRect();
									
									document.getElementById("search_resultat").style.left = rect.left+"px";
									document.getElementById("search_resultat").style.top = rect.top+27+"px";
								}
						</script>
						<input 	type = "text" autocomplete="off"
								id = "telephone" 
								name = "telephone" 
								style = "position: relative; border: solid 1px #CAA79C; border-style: inset; float: left; height: 25px; margin-top: 5px; z-index: 10;"
								onclick = "start_search_user(); search_goto_telephone();"		
								required >
					</td>
					<td style = "padding-left: 20px;" >
						<script>
							function search_goto_email()						// плавающий поисковик
								{
									var obj = document.getElementById("email");
									var rect = obj.getBoundingClientRect();
									
									document.getElementById("search_resultat").style.left = rect.left+"px";
									document.getElementById("search_resultat").style.top = rect.top+27+"px";
								}
						</script>
						<input 	type = "text"  autocomplete="off" 
								id = "email"
								name = "email" 
								style = "border: solid 1px #CAA79C; border-style: inset; float: left; height: 25px; margin-top: 5px;" 
								onclick = "start_search_user(); search_goto_email();"
								>
					</td>
				</tr>
			</table>
			
			<br><br>
			
			<a style = "color: #fff; padding-right: 20px; font-size: 15px; font-family: pragmatica;" >
				Паспорт
			</a>
			 
			<br>
			
			<table>
				<tr>
					<td>
						<a style = "color: #fff; padding-right: 20px; font-size: 15px; font-family: pragmatica;" >
						<strong>
							серия:
						</strong>
						</a>
					</td>
					<td style = "padding-left: 20px;" >
						<a style = "color: #fff; padding-right: 20px; font-size: 15px; font-family: pragmatica;" >
						<strong>
							номер:
						</strong>
						</a> 
					</td>
				</tr>
				<tr>
					<td>			
						<input type = "text" id = "passport_series" name = "passport_series" style = "border: solid 1px #fff; border-style: inset; float: left; height: 25px; margin-top: 5px;" ><a style = "opacity: 0;"></a> 
					</td>
					<td style = "padding-left: 20px;" >
						<input type = "text" id = "passport_number" name = "passport_number" style = "border: solid 1px #fff; border-style: inset; float: left; height: 25px; margin-top: 5px;" >
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td>
						<a style = "color: #fff; padding-right: 20px; font-size: 15px; font-family: pragmatica;" >
						<strong>
						<br>
							кем выдан:
						</strong>
						</a>
					</td>
					<td style = "padding-left: 20px;" >
						<a style = "color: #fff; padding-right: 20px; font-size: 15px; font-family: pragmatica;" >
						<strong>
						<br>
							дата выдачи:
						</strong>
						</a> 
					</td>
				</tr>
				<tr style = "vertical-align: top;">
					<td>			
						<textarea rows="5" id = "passport_who_issue" name = "passport_who_issue" style = "border: solid 1px #fff; border-style: inset; float: left; margin-top: 5px; resize: none; " ></textarea>
					</td>
					<td style = "padding-left: 20px;" >
						<input type = "text" id = "date_issue" name = "date_issue" style = "border: solid 1px #fff; border-style: inset; float: left; height: 25px; margin-top: 5px;" >
					</td>
				</tr>
			</table>
			
			<br><br>
			
			<input 	id = "sum_confirm" 
					name = "sum_confirm" 
					type = "text" 
					class = "noredakt_text" 
					style = "background: rgba(113, 76, 70, 1); padding-top: 5px; padding-bottom: 5px; text-align: right; float: left; border: solid 1px #CAA79C; border-style: inset;"
					value = "<?echo $sum;?>"
					readonly=true>
					
			
			<div id = "manual_manager" >		
				<div style = "position: relative; float: right; margin-top: -40px; width: 100px;">
					<a style = "position: relative; color: #fff; " >Тип оплаты:</a><br><br>
					<div class = "get_tarif" style = "margin-top: -10px;" > 
					<center>
						<input type = "hidden" style = "width: 30px;" value = "" id = "select_type_rate" name = "select_type_rate" />
						<input type = "text" value = "" id = "name_type_rate" style =  "width: 120px; text-align: center; border: solid 1px #fff; border-style: inset; height: 25px;" />
						
						<script>
							function сash()
								{
									document.getElementById("name_type_rate").value = "Наличный платеж";
									document.getElementById("select_type_rate").value = "15";
									document.getElementById("panel_active").style.display = "block";
								}				
							function non_cash()
								{
									document.getElementById("name_type_rate").value = "Безналичный платеж";
									document.getElementById("select_type_rate").value = "30";
									document.getElementById("panel_active").style.display = "block";
								}
							function credit_card()
								{
									document.getElementById("name_type_rate").value = "Банковская карта";
									document.getElementById("select_type_rate").value = "77";
									document.getElementById("panel_active").style.display = "block";
								}
							function gift()
								{
									document.getElementById("name_type_rate").value = "Подарок";
									document.getElementById("select_type_rate").value = "143";
									document.getElementById("panel_active").style.display = "block";
								}
							function certificate()
								{
									document.getElementById("name_type_rate").value = "Оплата сертификатом";
									document.getElementById("select_type_rate").value = "174";
									document.getElementById("panel_active").style.display = "block";
								}
						</script>
						
						<div id = "all_tarif" class = "all_tarif" >
							<input type = "button" value = "Наличный платеж" onclick = "сash()"  /><br>
							<input type = "button" value = "Безналичный платеж" onclick = "non_cash()" /><br>
							<input type = "button" value = "Банковская карта" onclick = "credit_card()" />
							<input type = "button" value = "Подарок" onclick = "gift()" />
							<input type = "button" value = "Оплата сертификатом" onclick = "certificate()" />
							<br>
						</div>
					</center>
					</div>
				</div>
		
				
				<br><br><br>
				
				
				<div>
				<input onclick = "	document.getElementById('surname').value = '';
									document.getElementById('name').value = '';
									document.getElementById('patronymic').value = '';
									document.getElementById('telephone').value = '';
									document.getElementById('email').value = '';
									$('#read_request').load('../load/dummy.txt');
									" 
						style = "float: left;" 
						type = "button" 
						class = "number_select" 
						value = "Очистиь" >
				
				<input onclick = "	clearTimeout(cycle_search);
									reset_select_date_for_admin();
									var number_house = document.getElementById('number_house').innerHTML;		
									number_house = number_house.split('№');
									number_house = number_house[1];
									setTimeout('unload_load_house_'+number_house+'()', 50);
									" style = "float: right;" type = "button" class = "number_select" value = "Отмена" >
				</div>
									
				<br><br>					
									
				<table id = "panel_active" style = "width: 100%; display: none;">
					<tr>
						<td>
							<a style = "color: #fff; padding-right: 20px; font-size: 15px; font-family: pragmatica; float: left;" >
										<strong>
										<br>
											Сумма вручную:
										</strong>
										</a><br><br>
							<input 	type = "text" 
									id = "manual_input"
									name = "manual_input" 
									style = "border: solid 1px #fff; border-style: inset; float: left; height: 25px; margin-top: 5px; float: left;"
									value = "0" > <br><br>
							
							<input 	style = "float: left;" 
									type = "submit" 
									name = "payment_manual"
									class = "number_select" 
									value = "Оплата вручную" 
									onclick = "setTimeout('load_read_user()', 100); setTimeout('reload_read_request()', 100); " > <br><br>
						</td>
						<td style = "width: 250px; padding-left: 50px;">
							<input 	style = "float: right;" 
									type = "submit" 
									name = "payment_100"
									class = "number_select" 
									value = "Оплата 100%" 
									onclick = "setTimeout('load_read_user()', 100); document.getElementById('manual_input').value = 'start'; setTimeout('reload_read_request()', 100); " > <br><br>
												
							<input 	style = "float: right;" 
									type = "submit" 
									name = "payment_30"
									class = "number_select" 
									value = "Оплата 30%" 
									onclick = "setTimeout('load_read_user()', 100); document.getElementById('manual_input').value = 'start'; setTimeout('reload_read_request()', 100); " >	<br><br>
						</td>
					</tr>	
				</table>
				
			</div>
			
		</strong>
		</div>	 

	</form>
	</td>
	
	
	<td>
	
		<script>
			function reload_read_request()
				{
					var verify_sum_confirm = document.getElementById("sum_confirm").value;
					if (verify_sum_confirm != 0)
						{
							var verify_manual_input = document.getElementById("manual_input").value;
							if (verify_manual_input != 0)
								{
									document.getElementById("manual_manager").style.display = "none";
									var read_id_user = document.getElementById("id_user").value;
									setTimeout("load_user_history_"+read_id_user+"()", 300);
								}
						}
				}
		</script>
		 
	<input id = "id_user" type = "hidden">                         
	<div id = "read_request" style = "width: 500px; height: 780px; overflow: auto;">	
	</div>
	
	</td>

</tr>

</table>
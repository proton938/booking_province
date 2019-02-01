<!-- передвижной поисковик -->
<div style = "position: absolute; top: 0px;">
	<input type = "hidden" id = "count_children" value = "" style = "position: fixed; width: 100px; height: 25px; background: #fff; top: 40px; z-index: 999;">               <!--  буфер количества найденных пользователей в поисковике  -->
	<div id = "search_resultat" style = "position: fixed; left: 0; top: 0px; width: 400px; background: #fff; z-index: 100;" ></div>
</div>




<iframe name = "status" 
		width = "0px" 
		height = "0px" 
		style = "border: none; position: absolute; top: 0px; left: 0px; z-index: 999; ">
</iframe>


<table>
<tr style = "vertical-align: top;">
	<td>
	
	<form method = "POST" enctype = "multipart/form-data" action = "../config/insert_base_for_admin.php" target = "status">
	
		<div style = "	position: relative; 
						width: 360px;
						height: 600px;						
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
			<br>
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
			
			<input 	id = "sum_confirm" 
					name = "sum_confirm" 
					type = "hidden" 
					class = "noredakt_text" 
					style = "background: rgba(113, 76, 70, 1); padding-top: 5px; padding-bottom: 5px; text-align: right; float: right; border: solid 1px #CAA79C; border-style: inset;"
					value = "0"
					readonly=true>
		
			
			<br><br>
			
			<input 	style = "float: right;" 
					type = "submit" 
					class = "number_select" 
					value = "Утвердить" 
					onclick = "setTimeout('load_read_user()', 100); setTimeout('reload_read_request()', 100); " >
			
			<input onclick = "$('#browser').load('../config/search_user_form.php');" 
					style = "float: left;" 
					type = "button" 
					class = "number_select" 
					value = "Очистиь" >
			

			
		</strong>
		</div>	 

	</form>
	</td>
	
	
	<td>
		<script>
			function reload_read_request()
				{
					var read_id_user = document.getElementById("id_user").value;
					$("#read_request").load("../config/read_requests.php", "user_number="+read_id_user);
				}
		</script>
		
	<input id = "id_user" type = "hidden">                         
	<div id = "read_request" style = "width: 500px; height: 780px; overflow: auto;">	
	</div>
	
	</td>

</tr>

</table>
<script>
	setTimeout("load_house_1()", 100);
	setTimeout("start_house_1()", 100);
	setTimeout("load_read_user()", 100);
	function remove_style()
		{
			for (i=1; i<=9; i++)
				{
					document.getElementById('house_'+i).style.borderStyle = "outset";
					document.getElementById('house_'+i).style.background = "#CAA79C";
				}
			for (i=11; i<=44; i++)
				{
					document.getElementById('house_'+i).style.borderStyle = "outset";
					document.getElementById('house_'+i).style.background = "#CAA79C";
				}
		}
	function start_house_1()
		{
			document.getElementById("house_1").style.borderStyle = "inset";
			document.getElementById("house_1").style.background = "rgba(113, 76, 70, 1)";
		}
</script>


<input type = "button" value = "ШАХМАТКА" onclick = "load_ches()" style = "position: absolute; top: 10px; left: 10px;" >
<!-- функция  load_ches() находится в файле verify_admin.php -->
<br><br>

<table cellspacing = "20px">
	<tr style = "vertical-align: top;">
		<td style = "width: 200px; border: solid 1px #CAA79C; border-style: inset; background: #CAA79C;">
			<center>
			<div	style = "position: relative; top: 30px; left: 0px; z-index: 5; font-size: 30px; color: #fff; font-family: pragmatica;">
				Дома
			</div>

			<strong>
			<div id = "house_select_panel" style = "position: relative; top: 60px; width: 170px; height: 650px; background: rgba(113, 76, 70, 1); border: solid 1px #CAA79C; border-style: inset; ">

				<div id = "house_1" onclick = "	unload_load_house_1();
												load_read_user();
												remove_style();
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)';">
							1
				</div>
				
				<div id = "house_2" onclick = "unload_load_house_2();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							2
				</div>
				
				<div id = "house_3" onclick = "unload_load_house_3();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							3
				</div>
				
				<div id = "house_4" onclick = "unload_load_house_4();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							4
				</div>
				
				<div id = "house_5" onclick = "unload_load_house_5();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							5
				</div>
				
				<div id = "house_6" onclick = "unload_load_house_6();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							6
				</div>
				
				<div id = "house_7"  onclick = "unload_load_house_7();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							7
				</div>
				
				<div id = "house_8" onclick = "unload_load_house_8();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							8
				</div>
				
				<div id = "house_9" onclick = "unload_load_house_9();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							9
				</div>
				
				
				<div id = "house_11" onclick = "unload_load_house_11();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							11
				</div>
				
				<div id = "house_12" onclick = "unload_load_house_12();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							12
				</div>
				
				<div id = "house_13" onclick = "unload_load_house_13();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							13
				</div>
				
				<div id = "house_14" onclick = "unload_load_house_14();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							14
				</div>
				
				<div id = "house_15" onclick = "unload_load_house_15();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							15
				</div>
				
				<div id = "house_16" onclick = "unload_load_house_16();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							16
				</div>
				
				<div id = "house_17" onclick = "unload_load_house_17();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							17
				</div>
				
				<div id = "house_18" onclick = "unload_load_house_18();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							18
				</div>
				
				<div id = "house_19" onclick = "unload_load_house_19();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							19
				</div>
				
				<div id = "house_20" onclick = "unload_load_house_20();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							20
				</div>
				
				<div id = "house_21" onclick = "unload_load_house_21();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							21
				</div>
				
				<div id = "house_22" onclick = "unload_load_house_22();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							22
				</div>
				
				<div id = "house_23" onclick = "unload_load_house_23();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							23
				</div>
				
				<div id = "house_24" onclick = "unload_load_house_24();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							24
				</div>
				
				<div id = "house_25" onclick = "unload_load_house_25();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							25
				</div>
				
				<div id = "house_26" onclick = "unload_load_house_26();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							26
				</div>
				
				<div id = "house_27" onclick = "unload_load_house_27();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							27
				</div>
				
				<div id = "house_28" onclick = "unload_load_house_28();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							28
				</div>
				
				<div id = "house_29" onclick = "unload_load_house_29();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							29
				</div>
				
				<div id = "house_30" onclick = "unload_load_house_30();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							30
				</div>
				
				<div id = "house_31" onclick = "unload_load_house_31();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							31
				</div>
				
				<div id = "house_32" onclick = "unload_load_house_32();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							32
				</div>
				
				<div id = "house_33" onclick = "unload_load_house_33();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							33
				</div>
				
				<div id = "house_34" onclick = "unload_load_house_34();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							34
				</div>
				
				<div id = "house_35" onclick = "unload_load_house_35();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							35
				</div>
				
				<div id = "house_36" onclick = "unload_load_house_36();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							36
				</div>
				
				<div id = "house_37" onclick = "unload_load_house_37();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							37
				</div>
				
				<div id = "house_38" onclick = "unload_load_house_38();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							38
				</div>
				
				<div id = "house_39" onclick = "unload_load_house_39();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							39
				</div>
				
				<div id = "house_40" onclick = "unload_load_house_40();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							40
				</div>
				
				<div id = "house_41" onclick = "unload_load_house_41();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							41
				</div>
				
				<div id = "house_42" onclick = "unload_load_house_42();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							42
				</div>
				
				<div id = "house_43" onclick = "unload_load_house_43();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							43
				</div>
				
				<div id = "house_44" onclick = "unload_load_house_44();
												load_read_user();
												remove_style();	
												this.style.borderStyle = 'inset'; 
												this.style.background = 'rgba(113, 76, 70, 1)'; ">
							44
				</div>

			</div>
			</strong>
			</center>
		</td>
		<td style = "border: solid 1px #CAA79C; border-style: inset;" >
			<center>
			<div id = "browser" style = "position: relative; width: 1000px; border: solid 1px #CAA79C; background: rgba(113, 76, 70, 1); border-style: inset; height: 800px; overflow: auto;" >
			</div>
			</center>
		</td>
		<td style = "border: solid 1px #CAA79C; height: 800px; background: #CAA79C; border-style: inset; " >
			<center>
			<div style = "position: relative; width: 300px; top: 30px; left: 0px; z-index: 5; font-size: 30px; color: #fff; font-family: pragmatica; ">
				Клиенты
					<input 	type = "button" 
							value = "Поиск" 
							class="final_button" 
							style = "position: absolute; left: 0px; top: -30px;" 
							onclick = "$('#browser').load('../config/search_user_form.php');"
							>
			</div>
			<div id = "user_list" style = "position: relative; top: 60px; width: 280px; height: 700px; overflow: auto;  border: solid 1px #CAA79C; background: rgba(113, 76, 70, 1); border-style: inset; " >
			</div>
			</center>
		</td>
	</tr>
</table>



<!-- объекты буфера -->

<div style = "position: absolute; top: 10px; left: 120px;">
	<!-- пишем в базу выбранные номера в реальном времени -->

	<div id = "load_insert_current_number" style = "position: relative; top: 100%; left: 0px; padding: 10px; background: red; display: none;">    
	</div> 
	
	<input type = "button" value = "start" onclick = "write_current_time_for_admin()" style = "position: relative; left: 10px; float: left;" >
	<input type = "button" value = "stop" onclick = "clearTimeout(current_time_control_for_admin)" style = "position: relative; left: 10px; float: left;" >
	
	<input type = "text" value = "0" id = "verify_control" style = "position: relative; float: left; left: 40px; padding: 5px 10px 5px 10px; border: solid 1px #CAA79C; border-style: inset; " >

	<!-- хранилище имен файлов оперативной истории -->

	<input id="my_history" style="position: relative; left: 60px; z-index: 10; float: left; padding: 5px 10px 5px 10px; border: solid 1px #CAA79C; border-style: inset;" value="" type="text">

	<!-- оперативная запись текущего времени -->

	<div id = "time_control" style = "position: relative; float: left; background: #fff; left: 80px; overflow: auto; padding: 5px 10px 5px 10px; z-index: 10; display: block; border: solid 1px #CAA79C; border-style: inset; color: #888;" >
	</div> 
</div>
	
	<br><br><br><br><br><br><br><br>






	
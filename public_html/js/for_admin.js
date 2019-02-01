





function input_password()
	{
		$("#initial_load").load("../load/password_window.html");
	}
	
function load_read_base_for_admin()
	{
		var login = document.getElementById("login").value;
		var password = document.getElementById("password").value;
		$("#status").load("../config/verify_admin.php", "login="+login+"&password="+password);
	}


	
	
function unload_load_house_1()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=1");		/* отправляем имя истории для снятия брони записанных дат,
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_1();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_1()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=1&count_place_1=4&count_place_2=3");
	}
	
	

function unload_load_house_2()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=2");		/* отправляем имя истории для снятия брони записанных дат,
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_2();
				clearTimeout(current_time_control_for_admin);
			}
	}
function load_house_2()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=2&count_place_1=8");
	}
	

	
function unload_load_house_3()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=3");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_3();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_3()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=3&count_place_1=9");
	}
	
	

function unload_load_house_4()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=4");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_4();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_4()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=4&count_place_1=11&count_place_2=11");
	}



function unload_load_house_5()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=5");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_5();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_5()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=5&count_place_1=5&count_place_2=5&count_place_3=5&count_place_4=4");
	}
	
	
		
function unload_load_house_6()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=6");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_6();
				clearTimeout(current_time_control_for_admin);
			}
	}
function load_house_6()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=6&count_place_1=2&count_place_2=2");
	}
	

	
function unload_load_house_7()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=7");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_7();
				clearTimeout(current_time_control_for_admin);
			}
	}
function load_house_7()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=7&count_place_1=7");
	}
	
		

function unload_load_house_8()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=8");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_8();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_8()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=8&count_place_1=5");
	}
	
		
	
function unload_load_house_9()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=9");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_9();
				clearTimeout(current_time_control_for_admin);
			}
	}
function load_house_9()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=9&count_place_1=3");
	}
	
	
	
function unload_load_house_11()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=11");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_11();
				clearTimeout(current_time_control_for_admin);
			}
	}
function load_house_11()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=11&count_place_1=4");
	}



function unload_load_house_12()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=12");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_12();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_12()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=12&count_place_1=4");
	}
	
	
	
function unload_load_house_13()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=13");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_13();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_13()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=13&count_place_1=2");
	}



function unload_load_house_14()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=14");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_14();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_14()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=14&count_place_1=4");
	}
	
	
		
function unload_load_house_15()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=15");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_15();
				clearTimeout(current_time_control_for_admin);
			}
	}
function load_house_15()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=15&count_place_1=4");
	}
	
	
		
function unload_load_house_16()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=16");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_16();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_16()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=16&count_place_1=4");
	}
	
	
		
function unload_load_house_17()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=17");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_17();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_17()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=17&count_place_1=4");
	}
	
		
	
function unload_load_house_18()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=18");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_18();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_18()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=18&count_place_1=4");
	}
	
	
function unload_load_house_19()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=19");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_19();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_19()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=19&count_place_1=2");
	}
	
	
function unload_load_house_20()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=20");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_20();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_20()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=20&count_place_1=2");
	}
	
	
function unload_load_house_21()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=21");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_21();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_21()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=21&count_place_1=2");
	}
	
	
	
function unload_load_house_22()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=22");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_22();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_22()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=22&count_place_1=2");
	}
	
	
	
function unload_load_house_23()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=23");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_23();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_23()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=23&count_place_1=2");
	}
	
	
	
	
function unload_load_house_24()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=24");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_24();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_24()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=24&count_place_1=2");
	}
	
	
	
	
function unload_load_house_25()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=25");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_25();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_25()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=25&count_place_1=2");
	}
	
	
	
function unload_load_house_26()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=26");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_26();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_26()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=26&count_place_1=4");
	}
	
	
	
function unload_load_house_27()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=27");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_27();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_27()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=27&count_place_1=4");
	}
	
	
	
function unload_load_house_28()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=28");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_28();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_28()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=28&count_place_1=4");
	}
	
	
	
function unload_load_house_29()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=29");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_29();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_29()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=29&count_place_1=2");
	}
	
	
	
function unload_load_house_30()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=30");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_30();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_30()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=30&count_place_1=4");
	}
	
	
	
function unload_load_house_31()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=31");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_31();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_31()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=31&count_place_1=4");
	}
	
	
	
function unload_load_house_32()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=32");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_32();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_32()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=32&count_place_1=2");
	}
	
	
	
function unload_load_house_33()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=33");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_33();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_33()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=33&count_place_1=2");
	}
	
	
	
function unload_load_house_34()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=34");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_34();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_34()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=34&count_place_1=2");
	}
	
	
	
function unload_load_house_35()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=35");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_35();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_35()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=35&count_place_1=4");
	}
	
	
	
function unload_load_house_36()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=36");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_36();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_36()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=36&count_place_1=2");
	}
	
	
	
function unload_load_house_37()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=37");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_37();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_37()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=37&count_place_1=4");
	}
	


function unload_load_house_38()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=38");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_38();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_38()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=38&count_place_1=2");
	}



function unload_load_house_39()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=39");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_39();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_39()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=39&count_place_1=4");
	}



function unload_load_house_40()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=40");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_40();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_40()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=40&count_place_1=4");
	}	
	
	
	
function unload_load_house_41()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=41");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_41();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_41()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=41&count_place_1=4");
	}
	
	
	
function unload_load_house_42()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=42");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_42();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_42()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=42&count_place_1=4");
	}
	
	
	
function unload_load_house_43()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=43");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_43();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_43()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=43&count_place_1=6");
	}
	
	
	
function unload_load_house_44()
	{
		var my_history = document.getElementById("my_history");
		if (my_history) 
			{
				var my_history = document.getElementById("my_history").value;															// читаем имя файла оперативной истории
				$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house=44");		/* отправляем имя истории для снятия брони записанных дат,	
																																			а так же номер дома для последующей его загрузки */
				document.getElementById("my_history").value = "";  																		// чистим окно имени истории
			}
		else
			{
				load_house_44();
				clearTimeout(current_time_control_for_admin);
			}
	}	
function load_house_44()
	{
		$("#browser").load("../config/read_house_for_admin.php", "number_house=44&count_place_1=2");
	}
	
	
	

	
function load_calendar_for_admin_1()
	{	
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
		
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=1&count_place_1=4&count_place_2=3&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_2()
	{	
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
		
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=2&count_place_1=8&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_3()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
		
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=3&count_place_1=9&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_4()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}

		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=4&count_place_1=11&count_place_2=11&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_5()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
		
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=5&count_place_1=5&count_place_2=5&count_place_3=5&count_place_4=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_6()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
		
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=6&count_place_1=2&count_place_2=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_7()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
		
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=7&count_place_1=7&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_8()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
		
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=8&count_place_1=5&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_9()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
		
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=9&count_place_1=3&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_11()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=11&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_12()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=12&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_13()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=13&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_14()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=14&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_15()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=15&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_16()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=16&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_17()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=17&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_18()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=18&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_19()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=19&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_20()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=20&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_21()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=21&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_22()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=22&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_23()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=23&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
		
function load_calendar_for_admin_24()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=24&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
		
function load_calendar_for_admin_25()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=25&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_26()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=26&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_27()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=27&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_28()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=28&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_29()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=29&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_30()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=30&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_31()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=31&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}	
	
function load_calendar_for_admin_32()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=32&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_33()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=33&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_34()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=34&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_35()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=35&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_36()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=36&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_37()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=37&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_38()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=38&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_39()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=39&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_40()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=40&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_41()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=41&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_42()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 				// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=42&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_43()
	{
		var current_number = document.getElementById("current_number"); 		// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 			// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=43&count_place_1=6&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
function load_calendar_for_admin_44()
	{
		var current_number = document.getElementById("current_number"); 			// Получаем выбранный текущий номер в многокомнатном доме
		if (current_number)
			{
				current_number = document.getElementById("current_number").value;
			}
		else
			{
				current_number = "/1";
			}
			
		var name_tarif = document.getElementById("select_tarif").value; 			// Получаем выбранный тариф
		var select_month = document.getElementById("select_month").value; 			// Получаем выбранный месяц	
		var select_year = document.getElementById("select_year").value; 			// Получаем выбранный год
		var my_history  = document.getElementById("my_history").value;
		
		$("#browser").load("../config/calendar_for_admin.php", "number_house=44&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number);
	}
	
	
	
	
function load_read_user()
	{
		$("#user_list").load("../config/read_user.php");
	}
	
	
	
var verify_control = 0;

var current_time_control_for_admin;

function write_current_time_for_admin()
	{
		current_time_control_for_admin = setTimeout("write_current_time_for_admin()", 1500);
		
		verify_control++;
		document.getElementById("verify_control").value = verify_control;
		
		var isset_number_house = document.getElementById("number_house");
		if (isset_number_house)
			{				
				var isset_select_month = document.getElementById("select_month");
				
				if (isset_select_month)
					{
						var number_house = document.getElementById("number_house").innerHTML;                   // процедура считывания номера дома
						number_house = number_house.split("№");
						number_house = number_house[1];
				
						var select_month = document.getElementById("select_month").value;						
						var select_tarif = document.getElementById("select_tarif").value;
						
						var my_history = document.getElementById("my_history").value;
										
						if (my_history != "")
							{						
								$("#time_control").load("../config/time_write_for_admin.php", "my_history="+my_history+"&number_house="+number_house+"&select_month="+select_month+"&select_tarif="+select_tarif);         		// вызываем файл контроля времени и оповещения об изменении											
							}
						else	
							{
								clearTimeout(current_time_control_for_admin);
								$("#time_control").load("../load/dummy.txt");
							}
					}
				else
					{						
						clearTimeout(current_time_control_for_admin);
						document.getElementById("my_history").value = "";
						$("#time_control").load("../load/dummy.txt");						
					}
			}
		else
			{
				var isset_data_scroll = document.getElementById("data_scroll");
				if (isset_data_scroll) 
					{
						clearTimeout(current_time_control_for_admin);  			// если открыта шахматка - окно имени оператора не опустошаем
						$("#time_control").load("../load/dummy.txt");
					}
				else
					{
						clearTimeout(current_time_control_for_admin);
						document.getElementById("my_history").value = "";   
						$("#time_control").load("../load/dummy.txt");
					}
			}
	}
	
	


var current_time_control_for_chess;										// контроллер базы для шахматки

function write_current_time_for_chess()
	{					
		var isset_data_scroll = document.getElementById("data_scroll");   // если существует этот объект - значит открыта шахматка
		if (isset_data_scroll) 
			{
				var my_history = document.getElementById("my_history").value;			// если поле имени истории оператора не пустое продолжается цикл
				if (my_history != "")
					{
						current_time_control_for_chess = setTimeout("write_current_time_for_chess()", 1500);
					
						var stop_control = document.getElementById("stop_control").value;			
						if (stop_control < 1)													// если курсор шевельнулся запрашиваем изменения в базе для вывода текущей картины
							{
								stop_control++;
								
								verify_control++;
								document.getElementById("verify_control").value = verify_control;		// пишем количество запросов на сервер
							
								var display_month = document.getElementById("display_current_month").value;
								var display_year = document.getElementById("display_current_year").value;
								var next_month = document.getElementById("display_next_month").value;
								var next_year = document.getElementById("display_next_year").value;
								$("#time_control").load("../config/time_write_for_chess.php", "my_history="+my_history+"&display_month="+display_month+"&display_year="+display_year+"&next_month="+next_month+"&next_year"+next_year);
								
								document.getElementById("stop_control").value = stop_control;		// стоп запросы на сервер если курсор не шевелится
							}
					}
				else
					{
						clearTimeout(current_time_control_for_chess);
						$("#time_control").load("../load/dummy.txt");
					}
			}
		else
			{
				clearTimeout(current_time_control_for_chess);
				$("#time_control").load("../load/dummy.txt");
			}
	}


	
	
	
	
function reset_select_date_for_admin()															// функция сброса для админа
	{
		var number_house = document.getElementById("number_house").innerHTML;					// процедура считывания номера дома
		number_house = number_house.split("№");
		number_house = number_house[1];
		var isset_my_history = document.getElementById("my_history");
		if (isset_my_history)
			{
				var my_history = document.getElementById("my_history").value;
			}
		
		var isset_again_my_history = document.getElementById("again_my_history");
		if (isset_again_my_history)
			{
				var my_history = document.getElementById("again_my_history").value;
			}
			
		$("#load_insert_current_number").load("../config/reset_select_date_for_admin.php", "number_house="+number_house+"&my_history="+my_history);
		setTimeout("document.getElementById('sum').value = '0'", 100);
	}
	

	
function close_modal_for_admin()
	{
		var number_house = document.getElementById("number_house").innerHTML;                   // процедура считывания номера дома
		number_house = number_house.split("№");
		number_house = number_house[1];
		
		var my_history = document.getElementById("my_history").value;																		// читаем имя файла оперативной истории
		$("#modal_window").load("../config/delete_my_history_for_admin.php", "my_history="+my_history+"&number_house="+number_house);		/* отправляем имя истории для снятия брони записанных дат,
																																				а так же номер дома для последующей его загрузки */
		document.getElementById("my_history").value = "";  																					// чистим окно имени истории
		$("#time_control").load("../load/dummy.txt");
		clearTimeout(current_time_control_for_admin);
	}
	
	
	

function load_approval()
	{
		$("#load_approval").load("../config/approval.php");
	}
	
	


// процедура поиска пользователей	
	
	
var cycle_search; 
var buf_tel_value = "   ";
var buf_surname_value = "   ";
var buf_name_value = "   ";
var buf_patronymic_value = "   ";
var buf_email_value = "   ";
		
function start_search_user()                                              	// запуск поиска
	{
		cycle_search = setTimeout("start_search_user()", 200);
		search_user();
	}	
	
function search_user()
	{
		var surname_value = document.getElementById("surname").value;
		var name_value = document.getElementById("name").value;
		var patronymic_value = document.getElementById("patronymic").value;
		var tel_value = document.getElementById("telephone").value;
		var email_value = document.getElementById("email").value;
		
		if (surname_value.length > 1)											// если содержимое поисковика больше двух символов - начинаем поиск в базе для вывода подсказок
			{
				if (surname_value != buf_surname_value)
							{
								$("#search_resultat").load("../config/search_user.php", "surname_value="+surname_value+"&name_value="+name_value+"&patronymic_value="+patronymic_value+"&tel_value="+tel_value+"&email_value="+email_value);
								buf_surname_value = surname_value;
								var select_found = 1;
							}
			}
		else
			{
				if (name_value.length > 1)											// если содержимое поисковика больше двух символов - начинаем поиск в базе для вывода подсказок
					{
						if (name_value != buf_name_value)
									{
										$("#search_resultat").load("../config/search_user.php", "surname_value="+surname_value+"&name_value="+name_value+"&patronymic_value="+patronymic_value+"&tel_value="+tel_value+"&email_value="+email_value);
										buf_name_value = name_value;
										var select_found = 1;
									}
					}
				else
					{
						if (patronymic_value.length > 1)											// если содержимое поисковика больше двух символов - начинаем поиск в базе для вывода подсказок
							{
								if (patronymic_value != buf_patronymic_value)
									{
										$("#search_resultat").load("../config/search_user.php", "surname_value="+surname_value+"&name_value="+name_value+"&patronymic_value="+patronymic_value+"&tel_value="+tel_value+"&email_value="+email_value);
										buf_patronymic_value = patronymic_value;
										var select_found = 1;
									}
							}
						else
							{
								if (tel_value.length > 1)											// если содержимое поисковика больше двух символов - начинаем поиск в базе для вывода подсказок
									{
										if (tel_value != buf_tel_value)
											{
												$("#search_resultat").load("../config/search_user.php", "surname_value="+surname_value+"&name_value="+name_value+"&patronymic_value="+patronymic_value+"&tel_value="+tel_value+"&email_value="+email_value);
												buf_tel_value = tel_value;
												var select_found = 1;
											}
									}
								else
									{
										if (email_value.length > 1)
											{
												if (email_value != buf_email_value)
													{
														$("#search_resultat").load("../config/search_user.php", "surname_value="+surname_value+"&name_value="+name_value+"&patronymic_value="+patronymic_value+"&tel_value="+tel_value+"&email_value="+email_value);
														buf_email_value = email_value;
														var select_found = 1;
													}
											}
										else
											{
												document.getElementById("search_resultat").innerHTML = "";
												var select_found = 1;
											}
									}
							}
					}
			}
	}
	
	
	
var select_found = 1;


function select_found_user(e){                               // скрипт управления поиском с клавиатуры
     
    switch(e.keyCode){
		case 40:   // если нажата клавиша вниз
			var count_children = document.getElementById("count_children").value;
			if (select_found < count_children)
				{
					for (i = 1; i <= count_children; i++)
						{
							document.getElementById("goto_count_user_" + i).style.background = "none";
							document.getElementById("goto_count_user_" + i).style.color = "#aaa";
						}
					select_found++;
					document.getElementById("goto_count_user_" + select_found).style.background = "#eee";
					document.getElementById("goto_count_user_" + select_found).style.color = "red";
				}
		break;
			
        case 38:   // если нажата клавиша вниз
			var count_children = document.getElementById("count_children").value;
			if (select_found > 1)
				{
					for (i = 1; i <= count_children; i++)
						{
							document.getElementById("goto_count_user_" + i).style.background = "none";
							document.getElementById("goto_count_user_" + i).style.color = "#aaa";
						}
					select_found--;
					document.getElementById("goto_count_user_" + select_found).style.background = "#eee";
					document.getElementById("goto_count_user_" + select_found).style.color = "red";
				}
        break;
		
		case 13:									// если нажата клавиша enter
			document.getElementById("goto_count_user_" + select_found).click();
			document.getElementById("search_resultat").innerHTML = "";
			select_found = 1;
		break;
    }
}
 
addEventListener("keydown", select_found_user);

	
	
function get_count_children()	
	{
		var count_children = document.getElementById("count_children").value;
		for (i = 1; i <= count_children; i++)
			{
				document.getElementById("goto_count_user_" + i).style.background = "none";
				document.getElementById("goto_count_user_" + i).style.color = "#999";
			}
	}
	
	
	
	
function active_top_menu()
	{
		var y_wind = window.pageYOffset;
		
		var count_button_top_menu = 8;
				
		
		var block_1 = document.getElementById("home");     								/* обращаемся к блоку "главная" */
		top_block_1 = block_1.offsetTop;												/* определяем положение блока по вертикали */
		var height_block_1 = block_1.clientHeight;										/* определяем высоту блока */
		if (y_wind >= top_block_1-20 && y_wind < height_block_1-20)
			{
				document.getElementById("button_1").style.background = "rgba(0, 0, 0, 0.1)";
			}
		else
			{
				document.getElementById("button_1").style.background = "none";
			}
			
			
		var block_2 = document.getElementById("ng_holiday");     						/* обращаемся блоку "Новогодние предложения" */
		top_block_2 = block_2.offsetTop;												/* определяем положение блока по вертикали */
		var height_block_2 = block_2.clientHeight;										/* определяем высоту блока */
		if (y_wind >= top_block_2-20 && y_wind < top_block_2+height_block_2-20)
			{
				document.getElementById("button_2").style.background = "rgba(0, 0, 0, 0.1)";
			}
		else
			{
				document.getElementById("button_2").style.background = "none";
			}
			
		var block_3 = document.getElementById("news_action");     						/* обращаемся блоку "новости и акции" */
		top_block_3 = block_3.offsetTop;												/* определяем положение блока по вертикали */
		var height_block_3 = block_3.clientHeight;										/* определяем высоту блока */
		if (y_wind >= top_block_3-20 && y_wind < top_block_3+height_block_3-20)
			{
				document.getElementById("button_3").style.background = "rgba(0, 0, 0, 0.1)";
			}
		else
			{
				document.getElementById("button_3").style.background = "none";
			}
			
		var block_4 = document.getElementById("services");     							/* обращаемся блоку "развлечения" */
		top_block_4 = block_4.offsetTop;												/* определяем положение блока по вертикали */
		var height_block_4 = block_4.clientHeight;										/* определяем высоту блока */
		if (y_wind >= top_block_4-20 && y_wind < top_block_4+height_block_4-20)
			{
				document.getElementById("button_4").style.background = "rgba(0, 0, 0, 0.1)";
			}
		else
			{
				document.getElementById("button_4").style.background = "none";
			}
			
		var block_5 = document.getElementById("rate");     								/* обращаемся блоку "цены" */
		top_block_5 = block_5.offsetTop;												/* определяем положение блока по вертикали */
		var height_block_5 = block_5.clientHeight;										/* определяем высоту блока */
		if (y_wind >= top_block_5-20 && y_wind < top_block_5+height_block_5-20)
			{
				document.getElementById("button_5").style.background = "rgba(0, 0, 0, 0.1)";
			}
		else
			{
				document.getElementById("button_5").style.background = "none";
			}
			
		var block_6 = document.getElementById("booking_sistem");     					/* обращаемся блоку "Система online-бронирования домов" */
		top_block_6 = block_6.offsetTop;												/* определяем положение блока по вертикали */
		var height_block_6 = block_6.clientHeight;										/* определяем высоту блока */
		if (y_wind >= top_block_6-20 && y_wind < top_block_6+height_block_6-20)
			{
				document.getElementById("button_6").style.background = "rgba(0, 0, 0, 0.1)";
			}
		else
			{
				document.getElementById("button_6").style.background = "none";
			}
			
		var block_7 = document.getElementById("portfolio");     						/* обращаемся блоку "Галерея" */
		top_block_7 = block_7.offsetTop;												/* определяем положение блока по вертикали */
		var height_block_7 = block_7.clientHeight;										/* определяем высоту блока */
		if (y_wind >= top_block_7-20 && y_wind < top_block_7+height_block_7-20)
			{
				document.getElementById("button_7").style.background = "rgba(0, 0, 0, 0.1)";
			}
		else
			{
				document.getElementById("button_7").style.background = "none";
			}
			
		var block_8 = document.getElementById("contact");     						/* обращаемся блоку "Галерея" */
		top_block_8 = block_8.offsetTop;												/* определяем положение блока по вертикали */
		var height_block_8 = block_8.clientHeight;										/* определяем высоту блока */
		if (y_wind >= top_block_8-20 && y_wind < top_block_8+height_block_8-20)
			{
				document.getElementById("button_8").style.background = "rgba(0, 0, 0, 0.1)";
			}
		else
			{
				document.getElementById("button_8").style.background = "none";
			}
	}


window.onscroll = function() 
	{
		var browser_width = document.body.clientWidth;
		
		if (browser_width > 1500)
			{				
				var obj_booking_interface = document.getElementById("booking_sistem");
				var rect = obj_booking_interface.getBoundingClientRect();
				
				document.getElementById("search_resultat_info").value = rect.top;
				
				if (rect.top <= 40)
					{
						document.getElementById("booking_interface").style.position = "fixed";
						document.getElementById("booking_interface").style.top = 40 + "px";
					}
				if 	(rect.top > 40)
					{
						document.getElementById("booking_interface").style.position = "absolute"; 
						document.getElementById("booking_interface").style.top = 0 + "px";
					}
				
				var obj_booking_height = obj_booking_interface.clientHeight;
					
				if	(rect.top <= -1100)
					{
						document.getElementById("booking_interface").style.position = "absolute";
						document.getElementById("booking_interface").style.top = 1140 + "px";
					}
			}
		else
			{
				document.getElementById("booking_interface").style.position = "absolute";
				document.getElementById("booking_interface").style.top = 0 + "px";
			}
			
		active_top_menu();
	}




function load_house_1_foto1()
	{
		document.getElementById("house_1_foto1").innerHTML = "<br><br><br><br><table cellspacing = '5px' class = 'house_info'><tr><td style = 'background: #fff; padding: 5px;'><strong> кол-во мест: 4 </strong> <br>пн-пт 2400 руб. <br> сб-вс 2800 руб.</td><td style = 'background: #fff; padding: 5px;'><strong> кол-во мест: 3 </strong> <br>пн-пт 1800 руб. <br> сб-вс 2100 руб.</td></tr></table><img src = 'images/foto/house_1_foto1.jpg' width = '96%'>";
		document.getElementById("house_1").style.width = "14%";
	}
function unload_house_1_foto1()
	{
		document.getElementById("house_1_foto1").innerHTML = "";
		document.getElementById("house_1").style.width = "3%";
	}
	
	
function load_house_2_foto1()
	{
		document.getElementById("house_2_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 8 </strong> <br>пн-пт 4800 руб. <br> сб-вс 5600 руб.</td></tr></table><img src = 'images/foto/house_2_foto1.jpg' width = '96%'>";
		document.getElementById("house_2").style.width = "14%";
	}
function unload_house_2_foto1()
	{
		document.getElementById("house_2_foto1").innerHTML = "";
		document.getElementById("house_2").style.width = "3%";
	}
	
	
function load_house_3_foto1()
	{
		document.getElementById("house_3_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 9 </strong> <br>пн-пт 5400 руб. <br> сб-вс 6300 руб.</td></tr></table><img src = 'images/foto/house_3_foto1.jpg' width = '96%'>";
		document.getElementById("house_3").style.width = "14%";
	}
function unload_house_3_foto1()
	{
		document.getElementById("house_3_foto1").innerHTML = "";
		document.getElementById("house_3").style.width = "3%";
	}
	
	
function load_house_4_foto1()
	{
		document.getElementById("house_4_foto1").innerHTML = "<br><br><br><br><br><table cellspacing = '5px' class = 'house_info'><tr><td style = 'background: #fff; padding: 5px;'><strong> кол-во мест: 11 </strong> <br>пн-пт 6600 руб. <br> сб-вс 7700 руб.</td><td style = 'background: #fff; padding: 5px;'><strong> кол-во мест: 11 </strong> <br>пн-пт 6600 руб. <br> сб-вс 7700 руб.</td></tr></table><img src = 'images/foto/house_4_foto1.jpg' width = '96%'>";
		document.getElementById("house_4").style.width = "14%";
	}
function unload_house_4_foto1()
	{
		document.getElementById("house_4_foto1").innerHTML = "";
		document.getElementById("house_4").style.width = "8%";
	}
	
	
function load_house_5_foto1()
	{
		document.getElementById("house_5_foto1").innerHTML = "<br><br><br><br><br><table cellspacing = '5px' class = 'house_info'><tr><td style = 'background: #fff; padding: 5px;'><strong> кол-во мест: 5 </strong> <br>пн-пт 3000 руб. <br> сб-вс 3500 руб.</td><td style = 'background: #fff; padding: 5px;'><strong> кол-во мест: 5 </strong> <br>пн-пт 3000 руб. <br> сб-вс 3500 руб.</td></tr><tr><td style = 'background: #fff; padding: 5px;'><strong> кол-во мест: 5 </strong> <br>пн-пт 3000 руб. <br> сб-вс 3500 руб.</td><td style = 'background: #fff; padding: 5px;'><strong> кол-во мест: 4 </strong> <br>пн-пт 2400 руб. <br> сб-вс 2800 руб.</td></tr></table><img src = 'images/foto/house_5_foto1.jpg' width = '96%'>";
		document.getElementById("house_5").style.width = "14%";
	}
function unload_house_5_foto1()
	{
		document.getElementById("house_5_foto1").innerHTML = "";
		document.getElementById("house_5").style.width = "4%";
	}
	
	
function load_house_6_foto1()
	{
		document.getElementById("house_6_foto1").innerHTML = "<br><br><br><br><table cellspacing = '5px' class = 'house_info'><tr><td style = 'background: #fff; padding: 5px;'><strong> кол-во мест: 2 </strong> <br>пн-пт 1200 руб. <br> сб-вс 1400 руб.</td><td style = 'background: #fff; padding: 5px;'><strong> кол-во мест: 2 </strong> <br>пн-пт 1200 руб. <br> сб-вс 1400 руб.</td></tr></table><img src = 'images/foto/house_6_foto1.jpg' width = '96%'>";
		document.getElementById("house_6").style.width = "14%";
	}
function unload_house_6_foto1()
	{
		document.getElementById("house_6_foto1").innerHTML = "";
		document.getElementById("house_6").style.width = "3.5%";
	}
	
	
function load_house_7_foto1()
	{
		document.getElementById("house_7_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 7 </strong> <br>пн-пт 4200 руб. <br> сб-вс 4900 руб.</td></tr></table><img src = 'images/foto/house_7_foto1.jpg' width = '96%'>";
		document.getElementById("house_7").style.width = "20%";
	}
function unload_house_7_foto1()
	{
		document.getElementById("house_7_foto1").innerHTML = "";
		document.getElementById("house_7").style.width = "5%";
	}
	
	
function load_house_8_foto1()
	{
		document.getElementById("house_8_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 5 </strong> <br>пн-пт 3000 руб. <br> сб-вс 3500 руб.</td></tr></table><img src = 'images/foto/house_8_foto1.jpg' width = '96%'>";
		document.getElementById("house_8").style.width = "16%";
	}
function unload_house_8_foto1()
	{
		document.getElementById("house_8_foto1").innerHTML = "";
		document.getElementById("house_8").style.width = "4%";
	}
	
	
function load_house_9_foto1()
	{
		document.getElementById("house_9_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 3 </strong> <br>пн-пт 1800 руб. <br> сб-вс 2100 руб.</td></tr></table><img src = 'images/foto/house_9_foto1.jpg' width = '96%'>";
		document.getElementById("house_9").style.width = "16%";
	}
function unload_house_9_foto1()
	{
		document.getElementById("house_9_foto1").innerHTML = "";
		document.getElementById("house_9").style.width = "4%";
	}
	
	
function load_house_11_foto1()
	{
		document.getElementById("house_11_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 4 </strong> <br>пн-пт 4000 руб. <br> сб-вс 4800 руб.</td></tr></table><img src = 'images/foto/house_11_foto1.jpg' width = '96%'>";
		document.getElementById("house_11").style.width = "14%";
	}
function unload_house_11_foto1()
	{
		document.getElementById("house_11_foto1").innerHTML = "";
		document.getElementById("house_11").style.width = "4.5%";
	}
	
	
function load_house_12_foto1()
	{
		document.getElementById("house_12_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 4 </strong> <br>пн-пт 4000 руб. <br> сб-вс 4800 руб.</td></tr></table><img src = 'images/foto/house_12_foto1.jpg' width = '96%'>";
		document.getElementById("house_12").style.width = "14%";
	}
function unload_house_12_foto1()
	{
		document.getElementById("house_12_foto1").innerHTML = "";
		document.getElementById("house_12").style.width = "4.5%";
	}
	
	
function load_house_13_foto1()
	{
		document.getElementById("house_13_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 2 </strong> <br>пн-пт 2000 руб. <br> сб-вс 2400 руб.</td></tr></table><img src = 'images/foto/house_13_foto1.jpg' width = '96%'>";
		document.getElementById("house_13").style.width = "14%";
	}
function unload_house_13_foto1()
	{
		document.getElementById("house_13_foto1").innerHTML = "";
		document.getElementById("house_13").style.width = "4.5%";
	}
	
	
function load_house_14_foto1()
	{
		document.getElementById("house_14_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 4 </strong> <br>пн-пт 4000 руб. <br> сб-вс 4800 руб.</td></tr></table><img src = 'images/foto/house_14_foto1.jpg' width = '96%'>";
		document.getElementById("house_14").style.width = "18%";
	}
function unload_house_14_foto1()
	{
		document.getElementById("house_14_foto1").innerHTML = "";
		document.getElementById("house_14").style.width = "5%";
	}
	
	
function load_house_15_foto1()
	{
		document.getElementById("house_15_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 4 </strong> <br>пн-пт 4000 руб. <br> сб-вс 4800 руб.</td></tr></table><img src = 'images/foto/house_15_foto1.jpg' width = '96%'>";
		document.getElementById("house_15").style.width = "14%";
	}
function unload_house_15_foto1()
	{
		document.getElementById("house_15_foto1").innerHTML = "";
		document.getElementById("house_15").style.width = "4%";
	}
	
	
function load_house_16_foto1()
	{
		document.getElementById("house_16_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 4 </strong> <br>пн-пт 4000 руб. <br> сб-вс 4800 руб.</td></tr></table><img src = 'images/foto/house_16_foto1.jpg' width = '96%'>";
		document.getElementById("house_16").style.width = "14%";
	}
function unload_house_16_foto1()
	{
		document.getElementById("house_16_foto1").innerHTML = "";
		document.getElementById("house_16").style.width = "3.5%";
	}
	
	
function load_house_17_foto1()
	{
		document.getElementById("house_17_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 4 </strong> <br>пн-пт 4000 руб. <br> сб-вс 4800 руб.</td></tr></table><img src = 'images/foto/house_17_foto1.jpg' width = '96%'>";
		document.getElementById("house_17").style.width = "14%";
	}
function unload_house_17_foto1()
	{
		document.getElementById("house_17_foto1").innerHTML = "";
		document.getElementById("house_17").style.width = "5.5%";
	}
	
	
function load_house_18_foto1()
	{
		document.getElementById("house_18_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 4 </strong> <br>пн-пт 4000 руб. <br> сб-вс 4800 руб.</td></tr></table><img src = 'images/foto/house_18_foto1.jpg' width = '96%'>";
		document.getElementById("house_18").style.width = "16%";
	}
function unload_house_18_foto1()
	{
		document.getElementById("house_18_foto1").innerHTML = "";
		document.getElementById("house_18").style.width = "5.5%";
	}
	
	
function load_house_19_foto1()
	{
		document.getElementById("house_19_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 2 </strong> <br>пн-пт 2000 руб. <br> сб-вс 2400 руб.</td></tr></table><img src = 'images/foto/house_19_foto1.jpg' width = '96%'>";
		document.getElementById("house_19").style.width = "14%";
	}
function unload_house_19_foto1()
	{
		document.getElementById("house_19_foto1").innerHTML = "";
		document.getElementById("house_19").style.width = "4%";
	}
	
	
function load_house_20_foto1()
	{
		document.getElementById("house_20_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 2 </strong> <br>пн-пт 2000 руб. <br> сб-вс 2400 руб.</td></tr></table><img src = 'images/foto/house_20_foto1.jpg' width = '96%'>";
		document.getElementById("house_20").style.width = "14%";
	}
function unload_house_20_foto1()
	{
		document.getElementById("house_20_foto1").innerHTML = "";
		document.getElementById("house_20").style.width = "4%";
	}

	
function load_house_21_foto1()
	{
		document.getElementById("house_21_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 2 </strong> <br>пн-пт 2000 руб. <br> сб-вс 2400 руб.</td></tr></table><img src = 'images/foto/house_21_foto1.jpg' width = '96%'>";
		document.getElementById("house_21").style.width = "14%";
	}
function unload_house_21_foto1()
	{
		document.getElementById("house_21_foto1").innerHTML = "";
		document.getElementById("house_21").style.width = "4%";
	}
	
	
function load_house_22_foto1()
	{
		document.getElementById("house_22_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 2 </strong> <br>пн-пт 2000 руб. <br> сб-вс 2400 руб.</td></tr></table><img src = 'images/foto/house_22_foto1.jpg' width = '96%'>";
		document.getElementById("house_22").style.width = "14%";
	}
function unload_house_22_foto1()
	{
		document.getElementById("house_22_foto1").innerHTML = "";
		document.getElementById("house_22").style.width = "4%";
	}
	
	
function load_house_23_foto1()
	{
		document.getElementById("house_23_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 2 </strong> <br>пн-пт 2000 руб. <br> сб-вс 2400 руб.</td></tr></table><img src = 'images/foto/house_23_foto1.jpg' width = '96%'>";
		document.getElementById("house_23").style.width = "14%";
	}
function unload_house_23_foto1()
	{
		document.getElementById("house_23_foto1").innerHTML = "";
		document.getElementById("house_23").style.width = "4%";
	}
	
	
function load_house_24_foto1()
	{
		document.getElementById("house_24_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 2 </strong> <br>пн-пт 2000 руб. <br> сб-вс 2400 руб.</td></tr></table><img src = 'images/foto/house_24_foto1.jpg' width = '96%'>";
		document.getElementById("house_24").style.width = "14%";
	}
function unload_house_24_foto1()
	{
		document.getElementById("house_24_foto1").innerHTML = "";
		document.getElementById("house_24").style.width = "4%";
	}
	
	
function load_house_25_foto1()
	{
		document.getElementById("house_25_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 2 </strong> <br>пн-пт 2000 руб. <br> сб-вс 2400 руб.</td></tr></table><img src = 'images/foto/house_25_foto1.jpg' width = '96%'>";
		document.getElementById("house_25").style.width = "14%";
	}
function unload_house_25_foto1()
	{
		document.getElementById("house_25_foto1").innerHTML = "";
		document.getElementById("house_25").style.width = "4%";
	}
	

function load_house_26_foto1()
	{
		document.getElementById("house_26_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 4 </strong> <br>пн-пт 4000 руб. <br> сб-вс 4800 руб.</td></tr></table><img src = 'images/foto/house_26_foto1.jpg' width = '96%'>";
		document.getElementById("house_26").style.width = "13%";
	}
function unload_house_26_foto1()
	{
		document.getElementById("house_26_foto1").innerHTML = "";
		document.getElementById("house_26").style.width = "3.4%";
	}
	
	
function load_house_27_foto1()
	{
		document.getElementById("house_27_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 4 </strong> <br>пн-пт 4000 руб. <br> сб-вс 4800 руб.</td></tr></table><img src = 'images/foto/house_27_foto1.jpg' width = '96%'>";
		document.getElementById("house_27").style.width = "13%";
	}
function unload_house_27_foto1()
	{
		document.getElementById("house_27_foto1").innerHTML = "";
		document.getElementById("house_27").style.width = "3.6%";
	}
	
	
function load_house_28_foto1()
	{
		document.getElementById("house_28_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 2 </strong> <br>пн-пт 2000 руб. <br> сб-вс 2400 руб.</td></tr></table><img src = 'images/foto/house_28_foto1.jpg' width = '96%'>";
		document.getElementById("house_28").style.width = "14%";
	}
function unload_house_28_foto1()
	{
		document.getElementById("house_28_foto1").innerHTML = "";
		document.getElementById("house_28").style.width = "3.2%";
	}
	
		
function load_house_29_foto1()
	{
		document.getElementById("house_29_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 2 </strong> <br>пн-пт 2000 руб. <br> сб-вс 2400 руб.</td></tr></table><img src = 'images/foto/house_29_foto1.jpg' width = '96%'>";
		document.getElementById("house_29").style.width = "14%";
	}
function unload_house_29_foto1()
	{
		document.getElementById("house_29_foto1").innerHTML = "";
		document.getElementById("house_29").style.width = "3.2%";
	}
	
	
function load_house_30_foto1()
	{
		document.getElementById("house_30_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 2 </strong> <br>пн-пт 2000 руб. <br> сб-вс 2400 руб.</td></tr></table><img src = 'images/foto/house_30_foto1.jpg' width = '96%'>";
		document.getElementById("house_30").style.width = "14%";
	}
function unload_house_30_foto1()
	{
		document.getElementById("house_30_foto1").innerHTML = "";
		document.getElementById("house_30").style.width = "3.2%";
	}
	
	
function load_house_31_foto1()
	{
		document.getElementById("house_31_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 2 </strong> <br>пн-пт 2000 руб. <br> сб-вс 2400 руб.</td></tr></table><img src = 'images/foto/house_31_foto1.jpg' width = '96%'>";
		document.getElementById("house_31").style.width = "14%";
	}
function unload_house_31_foto1()
	{
		document.getElementById("house_31_foto1").innerHTML = "";
		document.getElementById("house_31").style.width = "3.2%";
	}
	
		
function load_house_32_foto1()
	{
		document.getElementById("house_32_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 2 </strong> <br>пн-пт 2000 руб. <br> сб-вс 2400 руб.</td></tr></table><img src = 'images/foto/house_32_foto1.jpg' width = '96%'>";
		document.getElementById("house_32").style.width = "14%";
	}
function unload_house_32_foto1()
	{
		document.getElementById("house_32_foto1").innerHTML = "";
		document.getElementById("house_32").style.width = "4%";
	}
	
	
function load_house_33_foto1()
	{
		document.getElementById("house_33_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 2 </strong> <br>пн-пт 2000 руб. <br> сб-вс 2400 руб.</td></tr></table><img src = 'images/foto/house_33_foto1.jpg' width = '96%'>";
		document.getElementById("house_33").style.width = "14%";
	}
function unload_house_33_foto1()
	{
		document.getElementById("house_33_foto1").innerHTML = "";
		document.getElementById("house_33").style.width = "3.2%";
	}
	
	
function load_house_34_foto1()
	{
		document.getElementById("house_34_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 2 </strong> <br>пн-пт 2000 руб. <br> сб-вс 2400 руб.</td></tr></table><img src = 'images/foto/house_34_foto1.jpg' width = '96%'>";
		document.getElementById("house_34").style.width = "14%";
	}
function unload_house_34_foto1()
	{
		document.getElementById("house_34_foto1").innerHTML = "";
		document.getElementById("house_34").style.width = "4%";
	}

	
function load_house_35_foto1()
	{
		document.getElementById("house_35_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 4 </strong> <br>пн-пт 4000 руб. <br> сб-вс 4800 руб.</td></tr></table><img src = 'images/foto/house_35_foto1.jpg' width = '96%'>";
		document.getElementById("house_35").style.width = "15%";
	}
function unload_house_35_foto1()
	{
		document.getElementById("house_35_foto1").innerHTML = "";
		document.getElementById("house_35").style.width = "4.5%";
	}
	

function load_house_36_foto1()
	{
		document.getElementById("house_36_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 2 </strong> <br>пн-пт 2000 руб. <br> сб-вс 2400 руб.</td></tr></table><img src = 'images/foto/house_36_foto1.jpg' width = '96%'>";
		document.getElementById("house_36").style.width = "17%";
	}
function unload_house_36_foto1()
	{
		document.getElementById("house_36_foto1").innerHTML = "";
		document.getElementById("house_36").style.width = "4%";
	}
	
	
function load_house_37_foto1()
	{
		document.getElementById("house_37_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 4 </strong> <br>пн-пт 4000 руб. <br> сб-вс 4800 руб.</td></tr></table><img src = 'images/foto/house_37_foto1.jpg' width = '96%'>";
		document.getElementById("house_37").style.width = "14%";
	}
function unload_house_37_foto1()
	{
		document.getElementById("house_37_foto1").innerHTML = "";
		document.getElementById("house_37").style.width = "3.6%";
	}
	
	
function load_house_38_foto1()
	{
		document.getElementById("house_38_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 2 </strong> <br>пн-пт 2000 руб. <br> сб-вс 2400 руб.</td></tr></table><img src = 'images/foto/house_38_foto1.jpg' width = '96%'>";
		document.getElementById("house_38").style.width = "14%";
	}
function unload_house_38_foto1()
	{
		document.getElementById("house_38_foto1").innerHTML = "";
		document.getElementById("house_38").style.width = "4%";
	}
	
	
function load_house_39_foto1()
	{
		document.getElementById("house_39_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 4 </strong> <br>пн-пт 4000 руб. <br> сб-вс 4800 руб.</td></tr></table><img src = 'images/foto/house_39_foto1.jpg' width = '96%'>";
		document.getElementById("house_39").style.width = "17%";
	}
function unload_house_39_foto1()
	{
		document.getElementById("house_39_foto1").innerHTML = "";
		document.getElementById("house_39").style.width = "3.3%";
	}
	
	
function load_house_40_foto1()
	{
		document.getElementById("house_40_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 4 </strong> <br>пн-пт 4000 руб. <br> сб-вс 4800 руб.</td></tr></table><img src = 'images/foto/house_40_foto1.jpg' width = '96%'>";
		document.getElementById("house_40").style.width = "14%";
	}
function unload_house_40_foto1()
	{
		document.getElementById("house_40_foto1").innerHTML = "";
		document.getElementById("house_40").style.width = "3.6%";
	}
	
		
function load_house_41_foto1()
	{
		document.getElementById("house_41_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 4 </strong> <br>пн-пт 4000 руб. <br> сб-вс 4800 руб.</td></tr></table><img src = 'images/foto/house_41_foto1.jpg' width = '96%'>";
		document.getElementById("house_41").style.width = "15%";
	}
function unload_house_41_foto1()
	{
		document.getElementById("house_41_foto1").innerHTML = "";
		document.getElementById("house_41").style.width = "4.3%";
	}
	
	
function load_house_42_foto1()
	{
		document.getElementById("house_42_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 4 </strong> <br>пн-пт 4000 руб. <br> сб-вс 4800 руб.</td></tr></table><img src = 'images/foto/house_42_foto1.jpg' width = '96%'>";
		document.getElementById("house_42").style.width = "14%";
	}
function unload_house_42_foto1()
	{
		document.getElementById("house_42_foto1").innerHTML = "";
		document.getElementById("house_42").style.width = "3.3%";
	}
	
	
function load_house_43_foto1()
	{
		document.getElementById("house_43_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 6 </strong> <br>пн-пт 6000 руб. <br> сб-вс 7200 руб.</td></tr></table><img src = 'images/foto/house_43_foto1.jpg' width = '96%'>";
		document.getElementById("house_43").style.width = "15%";
	}
function unload_house_43_foto1()
	{
		document.getElementById("house_43_foto1").innerHTML = "";
		document.getElementById("house_43").style.width = "5.7%";
	}
	
	
function load_house_44_foto1()
	{
		document.getElementById("house_44_foto1").innerHTML = "<table style = 'background: #fff; padding-left: 10px; padding-right: 10px;' class = 'house_info'><tr><td><strong> кол-во мест: 2 </strong> <br>пн-пт 2000 руб. <br> сб-вс 2400 руб.</td></tr></table><img src = 'images/foto/house_44_foto1.jpg' width = '96%'>";
		document.getElementById("house_44").style.width = "15%";
	}
function unload_house_44_foto1()
	{
		document.getElementById("house_44_foto1").innerHTML = "";
		document.getElementById("house_44").style.width = "4%";
	}
	
	
																		// вывод из базы
	
function load_read_base_1()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=1&count_place_1=4&count_place_2=3");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_2()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=2&count_place_1=8");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_3()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=3&count_place_1=9");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_4()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=4&count_place_1=11&count_place_2=11");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_5()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=5&count_place_1=5&count_place_2=5&count_place_3=5&count_place_4=4");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_6()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=6&count_place_1=2&count_place_2=2");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_7()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=7&count_place_1=7");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_8()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=8&count_place_1=5");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_9()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=9&count_place_1=3");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_11()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=11&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_12()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=12&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_13()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=13&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_14()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=14&count_place_1=4");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_15()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=15&count_place_1=4");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_16()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=16&count_place_1=4");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_17()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=17&count_place_1=4");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_18()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=18&count_place_1=4");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_19()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height = 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=19&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_20()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=20&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_21()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=21&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_22()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=22&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_23()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=23&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}
		
function load_read_base_24()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=24&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}
		
function load_read_base_25()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=25&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_26()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=26&count_place_1=4");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_27()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=27&count_place_1=4");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_28()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=28&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_29()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=29&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_30()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=30&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_31()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=31&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}	
	
function load_read_base_32()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=32&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_33()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=33&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_34()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=34&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_35()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=35&count_place_1=4");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_36()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=36&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_37()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=37&count_place_1=4");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_38()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=38&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_39()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=39&count_place_1=4");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_40()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=40&count_place_1=4");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_41()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=41&count_place_1=4");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_42()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=42&count_place_1=4");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_43()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=43&count_place_1=6");
		document.getElementById("all_blocks").style.display = "none";
	}
	
function load_read_base_44()
	{
		document.getElementById("modal_window").style.background = "rgba(113, 76, 70, 1)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 999;
		$("#modal_window").load("config/read_base.php", "number_house=44&count_place_1=2");
		document.getElementById("all_blocks").style.display = "none";
	}
	
	
	
	
	
                                                                     // переключение календаря
																	 

function load_calendar_1()
	{	
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=1&count_place_1=4&count_place_2=3&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_2()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=2&count_place_1=8&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_3()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=3&count_place_1=9&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_4()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=4&count_place_1=11&count_place_2=11&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_5()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=5&count_place_1=5&count_place_2=5&count_place_3=5&count_place_4=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_6()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=6&count_place_1=2&count_place_2=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_7()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=7&count_place_1=7&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_8()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=8&count_place_1=5&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_9()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=9&count_place_1=3&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_11()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=11&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_12()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=12&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_13()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=13&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_14()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=14&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_15()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=15&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_16()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=16&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_17()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=17&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_18()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=18&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_19()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=19&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_20()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=20&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_21()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=21&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_22()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=22&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_23()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=23&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
		
function load_calendar_24()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=24&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
		
function load_calendar_25()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=25&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_26()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=26&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_27()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=27&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_28()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=28&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_29()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=29&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_30()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=30&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_31()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=31&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}	
	
function load_calendar_32()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=32&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_33()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=33&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_34()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=34&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_35()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=35&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_36()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=36&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_37()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=37&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_38()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=38&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_39()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=39&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_40()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=40&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_41()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=41&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_42()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=42&count_place_1=4&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_43()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=43&count_place_1=6&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
function load_calendar_44()
	{
		var isset_id_accaunt = document.getElementById("id_accaunt");							
		if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
			{
				var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
			}
		else
			{
				id_accaunt = "no";
			}
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
		
		$("#modal_window").load("config/calendar.php", "number_house=44&count_place_1=2&select_month="+select_month+"&select_year="+select_year+"&my_history="+my_history+"&name_tarif="+name_tarif+"&current_number="+current_number+"&id_accaunt="+id_accaunt);
	}
	
	
	
	
	
	
	
	
var current_time_control;

function write_current_time()
	{
		current_time_control = setTimeout("write_current_time()", 1200);
		
		var isset_number_house = document.getElementById("number_house");
		if (isset_number_house)
			{
				var number_house = document.getElementById("number_house").innerHTML;					// процедура считывания номера дома
				number_house = number_house.split("№");
				number_house = number_house[1];
				
				var isset_id_accaunt = document.getElementById("id_accaunt");							
				if (isset_id_accaunt)																	// если пользотель вошел в личный кабинет...
					{
						var id_accaunt = document.getElementById("id_accaunt").value;					// определем id номер пользователя в базе
					}
				else
					{
						id_accaunt = "no";
					}
				
				var my_history = document.getElementById("my_history").value;
				var select_month = document.getElementById("select_month").value;
				var select_tarif = document.getElementById("select_tarif").value;

				if (my_history != '')
					{
						$("#time_control").load("config/time_write.php", "my_history="+my_history+"&number_house="+number_house+"&select_month="+select_month+"&select_tarif="+select_tarif+"&id_accaunt="+id_accaunt);         		// вызываем файл контроля времени и оповещения об изменении				
					}
				else	
					{
						$("#time_control").load("load/dummy.txt");
						clearTimeout(current_time_control);
					}
			}
		else
			{
				clearTimeout(current_time_control);
				document.getElementById("my_history").value = "Конец";
				$("#time_control").load("load/dummy.txt");
			}
	}
	
	
	
function reset_select_date()																	// функция сброса
	{
		var number_house = document.getElementById("number_house").innerHTML;					// процедура считывания номера дома
		number_house = number_house.split("№");
		number_house = number_house[1];
		var my_history = document.getElementById("my_history").value;
		$("#load_insert_current_number").load("config/reset_select_date.php", "number_house="+number_house+"&my_history="+my_history);
		setTimeout("document.getElementById('sum').value = '0'", 100);
	}
	
	
	
function close_modal()
	{
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
		$("#modal_window").load("config/delete_my_history.php", "my_history="+my_history);
		document.getElementById("modal_window").style.background = "none";
		document.getElementById("modal_window").style.width = 0 + "%";
		document.getElementById("modal_window").style.height= 0 + "%";
		document.getElementById("modal_window").style.zIndex = 100;
		document.getElementById("my_history").value = "";
		$("#time_control").load("load/dummy.txt");
		clearTimeout(current_time_control);
		document.getElementById("all_blocks").style.display = "block";
		document.location.hash = "booking_sistem";
		document.location.href = "#booking_sistem";
	}
	
	
function load_registration()
	{
		document.getElementById("modal_window").style.background = "rgba(0, 0, 0, 0.7)";
		document.getElementById("modal_window").style.width = 100 + "%";
		document.getElementById("modal_window").style.height= 100 + "%";
		document.getElementById("modal_window").style.zIndex = 5;
		$("#modal_window").load("load/user_registration.html");
	}
	
function close_registration()
	{
		document.getElementById("modal_window").style.background = "none";
		document.getElementById("modal_window").style.width = 0 + "%";
		document.getElementById("modal_window").style.height= 0 + "%";
		document.getElementById("modal_window").style.zIndex = 100;
		var tel_number = document.getElementById("telephone").value;
		if (tel_number != "")
			{
				$("#modal_window").load("config/delete_reg_file.php", "number="+tel_number);
			}
		else 
			{
				$("#time_control").load("load/dummy.txt");
			}
	}
	
	
function load_read_account()
	{
		var read_tel_or_mail = document.getElementById("tel_or_mail").value;
		if ( read_tel_or_mail != "")
			{
				var read_my_password = document.getElementById("my_password").value;
				if (read_my_password != "")
					{
						$("#account_display").load("config/read_account.php", "tel_or_mail="+read_tel_or_mail+"&my_password="+read_my_password);
					}
			}
	}
	
	
function unload_read_account()
	{
		$("#account_display").load("load/dummy.txt");
		document.getElementById("input_account").style.display = "block";
		document.getElementById("output_account").style.display = "none";
		document.getElementById("reg_button").style.display = "block";
		document.getElementById("reg_button_noactive").style.display = "none";
		document.getElementById("my_password").value = "";
		document.getElementById("tel_or_mail").value = "";
	}
	
	

<iframe src = "" ></iframe>
		
		<input 	type = "button" 
				style = "position: absolute;
						right: 100px;
						top: 100px;						
						background: rgba(255, 165, 0, 1); 
						border: none; padding: 3px 10px 3px 10px; 
						border-radius: 5px;
						font-size: 25px; 
						cursor: pointer;" value = "< Назад"
						onclick = "back_insert()"
						>
		
		<script>
		
			function back_insert()
				{
					document.getElementById("load_request_sberbank").style.width = "0px";
					document.getElementById("load_request_sberbank").style.height = "0px";
					$("#load_request_sberbank").load("../load/dummy.txt")
				}
				
		</script>

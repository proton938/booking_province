<meta charset = "utf-8">
<?
// проверяем наличие класса SoapClient
if (class_exists('SoapClient'))
	{  
		echo 'есть';
		
		// отключаем кэширование
		ini_set("soap.wsdl_cache_enabled", "0" );
		 
		// подключаемся к серверу
		$client = new SoapClient("https://3dsec.sberbank.ru/payment/webservices/merchant-ws?wsdl");
		
		echo $client;
		
		
		$client = new SoapClient("https://3dsec.sberbank.ru/payment/webservices/merchant-ws?wsdl", array('proxy_host'   => "localhost",
                                            'proxy_port'     => 443));
						
		$params = array(
		  "id" => 100,
		  "name" => "John",
		  "description" => "Barrel of Oil",
		  "amount" => 500,
		);
		$response = $client->__soapCall("Function1", array($params));
	} 
else
	{
		echo "Включите поддержку SOAP в PHP!";
	}
?>
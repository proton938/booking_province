<meta charset = "utf-8">

<?php
if (class_exists('SoapClient'))
	{  
		echo 'есть<br>';
	}



ini_set("soap.wsdl_cache_enabled", "0");

$wsdlurl = 'https://3dsec.sberbank.ru/payment/webservices/merchant-ws?wsdl';
$token = '9na06usmbdmbrqsuetva9aio57';
$locale = 'ru';

// Инициализация SOAP-клиента
$client = new SoapClient($wsdlurl,
    array(
        'trace'=> true,
        'exceptions' => false,
        'encoding' => 'UTF-8'
    )
);
 
// Формирование заголовков SOAP-запроса
$client->__setSoapHeaders(
   array(
      new SoapHeader('API', 'token', $token, false),
      new SoapHeader('API', 'locale', $locale, false)
   )
);

// Выполнение запроса к серверу API Директа
$result = $client->GetClientInfo();

// Вывод запроса и ответа
echo "Запрос:<pre>".htmlspecialchars($client->__getLastRequest()) ."</pre>";
echo "Ответ:<pre>".htmlspecialchars($client->__getLastResponse())."</pre>";


// Вывод отладочной информации в случае возникновения ошибки
if (is_soap_fault($result)) { echo("SOAP Fault: (faultcode: {$result->faultcode}, faultstring: {$result->faultstring}, detail: {$result->detail})"); }

?>
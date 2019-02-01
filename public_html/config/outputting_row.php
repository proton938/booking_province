<?php

	if (isset($_REQUEST['request_code'])) { $request_code= $_REQUEST['request_code']; }


	require_once '../../base/connection_base.php';

	$request_bufer = $db->query('SELECT * FROM hotel_accounts WHERE SITENUMBER = "'.$request_code.'"');     // обращаемся к таблице для delfin
	$read_request = $request_bufer->fetchAll();
	
	foreach ($read_request as $request_field)
		{
			$accountnumber = $request_field['SITENUMBER'];
			$file_name = $request_field['FILE_NAME'];
		}
	
	//Создает XML-строку и XML-документ при помощи DOM 
	$dom = new DomDocument('1.0', 'UTF-8');
	
	//добавление корня - <data> 
	$data = $dom->appendChild($dom->createElement('data'));
	
	//добавление корня - <table> 
	$table = $data->appendChild($dom->createElement('table'));
	// добавление элемента текстового узла <table> в <table> 
	$table->appendChild($dom->createTextNode('HOTEL_ACCOUNTS'));
	
	//добавление корня - <row> 
	$row = $data->appendChild($dom->createElement('row'));
	
	foreach ($read_request as $request_field)
		{
			//добавление элемента <SITENUMBER> в <row> 
			$SITENUMBER = $row->appendChild($dom->createElement('SITENUMBER')); 
			// добавление элемента текстового узла <SITENUMBER> в <SITENUMBER> 
			$SITENUMBER->appendChild($dom->createTextNode($request_field['SITENUMBER']));

			//добавление элемента <ACCOUNTNUMBER> в <row> 
			$ACCOUNTNUMBER= $row->appendChild($dom->createElement('ACCOUNTNUMBER')); 
			// добавление элемента текстового узла <ACCOUNTNUMBER> в <ACCOUNTNUMBER> 
			$ACCOUNTNUMBER->appendChild($dom->createTextNode($request_field['ACCOUNTNUMBER']));
			
			//добавление элемента <NUMBER> в <row> 
			$NUMBER = $row->appendChild($dom->createElement('NUMBER')); 
			// добавление элемента текстового узла <NUMBER> в <NUMBER> 
			$NUMBER->appendChild($dom->createTextNode($request_field['NUMBER'])); 
			
			//добавление элемента <IDACCOUNT> в <row> 
			$IDACCOUNT = $row->appendChild($dom->createElement('IDACCOUNT')); 		
			// добавление элемента текстового узла <IDACCOUNT> в <IDACCOUNT> 
			$IDACCOUNT->appendChild($dom->createTextNode($request_field['IDACCOUNT']));
			
			//добавление элемента <CR> в <row> 
			$CR = $row->appendChild($dom->createElement('CR')); 		
			// добавление элемента текстового узла <CR> в <CR> 
			$CR->appendChild($dom->createTextNode($request_field['CR']));
			
			//добавление элемента <IDHOTEL> в <row> 
			$IDHOTEL = $row->appendChild($dom->createElement('IDHOTEL')); 	
			// добавление элемента текстового узла <IDHOTEL> в <IDHOTEL> 
			$IDHOTEL->appendChild($dom->createTextNode($request_field['IDHOTEL'])); 
			
			//добавление элемента <IDPERSON> в <row> 
			$IDPERSON = $row->appendChild($dom->createElement('IDPERSON')); 
			// добавление элемента текстового узла <IDPERSON> в <IDPERSON> 
			$IDPERSON->appendChild($dom->createTextNode($request_field['IDPERSON']));
			
			//добавление элемента <FIO> в <row> 
			$FIO = $row->appendChild($dom->createElement('FIO')); 
			// добавление элемента текстового узла <FIO> в <FIO> 
			$FIO->appendChild($dom->createTextNode($request_field['FIO']));
				
			//добавление элемента <BIRTHDATE> в <row> 
			$BIRTHDATE = $row->appendChild($dom->createElement('BIRTHDATE'));			
			// добавление элемента текстового узла <BIRTHDATE> в <BIRTHDATE> 
			$BIRTHDATE->appendChild($dom->createTextNode($request_field['BIRTHDATE']));
			
			//добавление элемента <BIRTHPLACE> в <row> 
			$BIRTHPLACE = $row->appendChild($dom->createElement('BIRTHPLACE')); 
			// добавление элемента текстового узла <BIRTHPLACE> в <BIRTHPLACE> 
			$BIRTHPLACE->appendChild($dom->createTextNode($request_field['BIRTHPLACE']));
			
			//добавление элемента <IDGUESTTYPE> в <row> 
			$IDGUESTTYPE = $row->appendChild($dom->createElement('IDGUESTTYPE'));
			// добавление элемента текстового узла <IDGUESTTYPE> в <IDGUESTTYPE> 
			$IDGUESTTYPE->appendChild($dom->createTextNode($request_field['IDGUESTTYPE']));
			
			//добавление элемента <CHECKIN> в <row> 
			$CHECKIN = $row->appendChild($dom->createElement('CHECKIN')); 
			// добавление элемента текстового узла <CHECKIN> в <CHECKIN> 
			$CHECKIN->appendChild($dom->createTextNode($request_field['CHECKIN']));
			
			//добавление элемента <CHECKOUT> в <row> 
			$CHECKOUT = $row->appendChild($dom->createElement('CHECKOUT')); 			
			// добавление элемента текстового узла <CHECKOUT> в <CHECKOUT> 
			$CHECKOUT->appendChild($dom->createTextNode($request_field['CHECKOUT']));
			
			//добавление элемента <MEN> в <row> 
			$MEN = $row->appendChild($dom->createElement('MEN')); 
			// добавление элемента текстового узла <MEN> в <MEN> 
			$MEN->appendChild($dom->createTextNode($request_field['MEN']));
			
			//добавление элемента <CHILDREN> в <row> 
			$CHILDREN = $row->appendChild($dom->createElement('CHILDREN'));
			// добавление элемента текстового узла <CHILDREN> в <CHILDREN> 
			$CHILDREN->appendChild($dom->createTextNode($request_field['CHILDREN']));
			
			//добавление элемента <IDTYPEROOM> в <row> 
			$IDTYPEROOM = $row->appendChild($dom->createElement('IDTYPEROOM'));
			// добавление элемента текстового узла <IDTYPEROOM> в <IDTYPEROOM> 
			$IDTYPEROOM->appendChild($dom->createTextNode($request_field['IDTYPEROOM']));
			
			//добавление элемента <IDROOM> в <row> 
			$IDROOM = $row->appendChild($dom->createElement('IDROOM')); 
			// добавление элемента текстового узла <IDROOM> в <IDROOM> 
			$IDROOM->appendChild($dom->createTextNode($request_field['IDROOM']));
			
			//добавление элемента <IDRATEPLAN> в <row> 
			$IDRATEPLAN = $row->appendChild($dom->createElement('IDRATEPLAN'));
			// добавление элемента текстового узла <IDRATEPLAN> в <IDRATEPLAN> 
			$IDRATEPLAN->appendChild($dom->createTextNode($request_field['IDRATEPLAN']));
			
			//добавление элемента <ISHIDERATE> в <row> 
			$ISHIDERATE = $row->appendChild($dom->createElement('ISHIDERATE')); 
			// добавление элемента текстового узла <ISHIDERATE> в <ISHIDERATE> 
			$ISHIDERATE->appendChild($dom->createTextNode($request_field['ISHIDERATE']));
			
			//добавление элемента <CONTACT> в <row> 
			$CONTACT = $row->appendChild($dom->createElement('CONTACT'));
			// добавление элемента текстового узла <CONTACT> в <CONTACT> 
			$CONTACT->appendChild($dom->createTextNode($request_field['CONTACT']));
			
			//добавление элемента <IDKA> в <row> 
			$IDKA = $row->appendChild($dom->createElement('IDKA')); 	
			// добавление элемента текстового узла <IDKA> в <IDKA> 
			$IDKA->appendChild($dom->createTextNode($request_field['IDKA']));
			
			//добавление элемента <IDTA> в <row> 
			$IDTA = $row->appendChild($dom->createElement('IDTA'));
			// добавление элемента текстового узла <IDTA> в <IDTA> 
			$IDTA->appendChild($dom->createTextNode($request_field['IDTA']));
			
			//добавление элемента <IDFIRM> в <row> 
			$IDFIRM = $row->appendChild($dom->createElement('IDFIRM')); 
			// добавление элемента текстового узла <IDFIRM> в <IDFIRM> 
			$IDFIRM->appendChild($dom->createTextNode($request_field['IDFIRM']));
			
			//добавление элемента <IDCOUNTRY> в <row> 
			$IDCOUNTRY = $row->appendChild($dom->createElement('IDCOUNTRY')); 
			// добавление элемента текстового узла <IDCOUNTRY> в <IDCOUNTRY> 
			$IDCOUNTRY->appendChild($dom->createTextNode($request_field['IDCOUNTRY']));
			
			//добавление элемента <IDCITY> в <row> 
			$IDCITY = $row->appendChild($dom->createElement('IDCITY')); 
			// добавление элемента текстового узла <IDCITY> в <IDCITY> 
			$IDCITY->appendChild($dom->createTextNode($request_field['IDCITY']));
			
			//добавление элемента <ADDRESS> в <row> 
			$ADDRESS = $row->appendChild($dom->createElement('ADDRESS'));
			// добавление элемента текстового узла <ADDRESS> в <ADDRESS> 
			$ADDRESS->appendChild($dom->createTextNode($request_field['ADDRESS']));
			
			//добавление элемента <EMAIL> в <row> 
			$EMAIL = $row->appendChild($dom->createElement('EMAIL')); 
			// добавление элемента текстового узла <EMAIL> в <EMAIL> 
			$EMAIL->appendChild($dom->createTextNode($request_field['EMAIL']));
			
			//добавление элемента <COMMENT> в <row> 
			$COMMENT = $row->appendChild($dom->createElement('COMMENT')); 
			// добавление элемента текстового узла <COMMENT> в <COMMENT> 
			$COMMENT->appendChild($dom->createTextNode($request_field['COMMENT']));
			
			//добавление элемента <PHONE> в <row> 
			$PHONE = $row->appendChild($dom->createElement('PHONE')); 
			// добавление элемента текстового узла <PHONE> в <PHONE> 
			$PHONE->appendChild($dom->createTextNode($request_field['PHONE']));
			
			//добавление элемента <IDWARRANTY> в <row> 
			$IDWARRANTY = $row->appendChild($dom->createElement('IDWARRANTY')); 
			// добавление элемента текстового узла <IDWARRANTY> в <IDWARRANTY> 
			$IDWARRANTY->appendChild($dom->createTextNode($request_field['IDWARRANTY']));
			
			//добавление элемента <IDSOURCE> в <row> 
			$IDSOURCE = $row->appendChild($dom->createElement('IDSOURCE'));
			// добавление элемента текстового узла <IDSOURCE> в <IDSOURCE> 
			$IDSOURCE->appendChild($dom->createTextNode($request_field['IDSOURCE']));
			
			//добавление элемента <CAR> в <row> 
			$CAR = $row->appendChild($dom->createElement('CAR'));
			// добавление элемента текстового узла <CAR> в <CAR> 
			$CAR->appendChild($dom->createTextNode($request_field['CAR']));
			
			//добавление элемента <IDGEO> в <row> 
			$IDGEO = $row->appendChild($dom->createElement('IDGEO'));
			// добавление элемента текстового узла <IDGEO> в <IDGEO> 
			$IDGEO->appendChild($dom->createTextNode($request_field['IDGEO']));
			
			//добавление элемента <IDLANGUAGE> в <row> 
			$IDLANGUAGE = $row->appendChild($dom->createElement('IDLANGUAGE'));
			// добавление элемента текстового узла <IDLANGUAGE> в <IDLANGUAGE> 
			$IDLANGUAGE->appendChild($dom->createTextNode($request_field['IDLANGUAGE']));
			
			//добавление элемента <IDAIM> в <row> 
			$IDAIM = $row->appendChild($dom->createElement('IDAIM'));
			// добавление элемента текстового узла <IDAIM> в <IDAIM> 
			$IDAIM->appendChild($dom->createTextNode($request_field['IDAIM']));
			
			//добавление элемента <ISNC> в <row> 
			$ISNC = $row->appendChild($dom->createElement('ISNC')); 
			// добавление элемента текстового узла <ISNC> в <ISNC> 
			$ISNC->appendChild($dom->createTextNode($request_field['ISNC']));
			
			//добавление элемента <ISPAIDCOMM> в <row> 
			$ISPAIDCOMM = $row->appendChild($dom->createElement('ISPAIDCOMM')); 
			// добавление элемента текстового узла <ISPAIDCOMM> в <ISPAIDCOMM> 
			$ISPAIDCOMM->appendChild($dom->createTextNode($request_field['ISPAIDCOMM']));
			
			//добавление элемента <PROCCOMM> в <row> 
			$PROCCOMM = $row->appendChild($dom->createElement('PROCCOMM'));
			// добавление элемента текстового узла <PROCCOMM> в <PROCCOMM> 
			$PROCCOMM->appendChild($dom->createTextNode($request_field['PROCCOMM']));
			
			//добавление элемента <IDGROUP> в <row> 
			$IDGROUP = $row->appendChild($dom->createElement('IDGROUP')); 
			// добавление элемента текстового узла <IDGROUP> в <IDGROUP> 
			$IDGROUP->appendChild($dom->createTextNode($request_field['IDGROUP']));
			
			//добавление элемента <ISTAX> в <row> 
			$ISTAX = $row->appendChild($dom->createElement('ISTAX')); 	
			// добавление элемента текстового узла <ISTAX> в <ISTAX> 
			$ISTAX->appendChild($dom->createTextNode($request_field['ISTAX']));
			
			//добавление элемента <IDSTATUS> в <row> 
			$IDSTATUS = $row->appendChild($dom->createElement('IDSTATUS')); 
			// добавление элемента текстового узла <IDSTATUS> в <IDSTATUS> 
			$IDSTATUS->appendChild($dom->createTextNode($request_field['IDSTATUS']));
			
			//добавление элемента <IDDENIAL> в <row> 
			$IDDENIAL = $row->appendChild($dom->createElement('IDDENIAL')); 
			// добавление элемента текстового узла <IDDENIAL> в <IDDENIAL> 
			$IDDENIAL->appendChild($dom->createTextNode($request_field['IDDENIAL']));
			
			//добавление элемента <IDCANCELLATION> в <row> 
			$IDCANCELLATION = $row->appendChild($dom->createElement('IDCANCELLATION')); 
			// добавление элемента текстового узла <IDCANCELLATION> в <IDCANCELLATION> 
			$IDCANCELLATION->appendChild($dom->createTextNode($request_field['IDCANCELLATION']));
			
			//добавление элемента <ISCONFIRMATLON> в <row> 
			$ISCONFIRMATLON= $row->appendChild($dom->createElement('ISCONFIRMATLON'));
			// добавление элемента текстового узла <ISCONFIRMATLON> в <ISCONFIRMATLON> 
			$ISCONFIRMATLON->appendChild($dom->createTextNode($request_field['ISCONFIRMATLON']));
			
			//добавление элемента <LOGINCREATE> в <row> 
			$LOGINCREATE = $row->appendChild($dom->createElement('LOGINCREATE')); 
			// добавление элемента текстового узла <LOGINCREATE> в <LOGINCREATE> 
			$LOGINCREATE->appendChild($dom->createTextNode($request_field['LOGINCREATE']));
			
			//добавление элемента <DATECHANGE> в <row> 
			$DATECHANGE = $row->appendChild($dom->createElement('DATECHANGE')); 
			// добавление элемента текстового узла <DATECHANGE> в <DATECHANGE> 
			$DATECHANGE->appendChild($dom->createTextNode($request_field['DATECHANGE']));
			
			//добавление элемента <LOGINCHANGE> в <row> 
			$LOGINCHANGE = $row->appendChild($dom->createElement('LOGINCHANGE'));
			// добавление элемента текстового узла <LOGINCHANGE> в <LOGINCHANGE> 
			$LOGINCHANGE->appendChild($dom->createTextNode($request_field['LOGINCHANGE']));
			
			//добавление элемента <BALANCE> в <row> 
			$BALANCE = $row->appendChild($dom->createElement('BALANCE')); 
			// добавление элемента текстового узла <BALANCE> в <BALANCE> 
			$BALANCE->appendChild($dom->createTextNode(''));
			
			//добавление элемента <IDOWNER> в <row> 
			$IDOWNER = $row->appendChild($dom->createElement('IDOWNER')); 
			// добавление элемента текстового узла <IDOWNER> в <IDOWNER> 
			$IDOWNER->appendChild($dom->createTextNode($request_field['IDOWNER']));
			
			//добавление элемента <IDINOWNER> в <row> 
			$IDINOWNER = $row->appendChild($dom->createElement('IDINOWNER'));
			// добавление элемента текстового узла <IDINOWNER> в <IDINOWNER> 
			$IDINOWNER->appendChild($dom->createTextNode($request_field['IDINOWNER']));
			
			//добавление элемента <RECORDCOLOR> в <row> 
			$RECORDCOLOR = $row->appendChild($dom->createElement('RECORDCOLOR'));
			// добавление элемента текстового узла <RECORDCOLOR> в <RECORDCOLOR> 
			$RECORDCOLOR->appendChild($dom->createTextNode($request_field['RECORDCOLOR']));
			
			//добавление элемента <RECORDFONT> в <row> 
			$RECORDFONT = $row->appendChild($dom->createElement('RECORDFONT')); 
			// добавление элемента текстового узла <RECORDFONT> в <RECORDFONT> 
			$RECORDFONT->appendChild($dom->createTextNode($request_field['RECORDFONT']));
			
			//добавление элемента <STATUS> в <row> 
			$STATUS = $row->appendChild($dom->createElement('STATUS'));
			// добавление элемента текстового узла <STATUS> в <STATUS> 
			$STATUS->appendChild($dom->createTextNode($request_field['STATUS']));
			
			//добавление элемента <DATECREATE> в <row> 
			$DATECREATE = $row->appendChild($dom->createElement('DATECREATE')); 
			// добавление элемента текстового узла <DATECREATE> в <DATECREATE> 
			$DATECREATE->appendChild($dom->createTextNode($request_field['DATECREATE']));
			
			//добавление элемента <CITY> в <row> 
			$CITY = $row->appendChild($dom->createElement('CITY'));
			// добавление элемента текстового узла <CITY> в <CITY> 
			$CITY->appendChild($dom->createTextNode($request_field['CITY']));
			
			//добавление элемента <SMALLCHILDREN> в <row> 
			$SMALLCHILDREN = $row->appendChild($dom->createElement('SMALLCHILDREN')); 
			// добавление элемента текстового узла <SMALLCHILDREN> в <SMALLCHILDREN> 
			$SMALLCHILDREN->appendChild($dom->createTextNode($request_field['SMALLCHILDREN']));
			
			//добавление элемента <WARRANTYDATE> в <row> 
			$WARRANTYDATE = $row->appendChild($dom->createElement('WARRANTYDATE')); 
			// добавление элемента текстового узла <WARRANTYDATE> в <WARRANTYDATE> 
			$WARRANTYDATE->appendChild($dom->createTextNode($request_field['WARRANTYDATE']));
			
			//добавление элемента <IDVIPCUSTOMER> в <row> 
			$IDVIPCUSTOMER = $row->appendChild($dom->createElement('IDVIPCUSTOMER'));
			// добавление элемента текстового узла <IDVIPCUSTOMER> в <IDVIPCUSTOMER> 
			$IDVIPCUSTOMER->appendChild($dom->createTextNode($request_field['IDVIPCUSTOMER']));
			
			//добавление элемента <IDMANAGER> в <row> 
			$IDMANAGER = $row->appendChild($dom->createElement('IDMANAGER')); 
			// добавление элемента текстового узла <IDMANAGER> в <IDMANAGER> 
			$IDMANAGER->appendChild($dom->createTextNode($request_field['IDMANAGER']));
			
			//добавление элемента <PRIORITET> в <row> 
			$PRIORITET = $row->appendChild($dom->createElement('PRIORITET')); 
			// добавление элемента текстового узла <PRIORITET> в <PRIORITET> 
			$PRIORITET->appendChild($dom->createTextNode($request_field['PRIORITET']));
			
			//добавление элемента <ISSHAREROOM> в <row> 
			$ISSHAREROOM = $row->appendChild($dom->createElement('ISSHAREROOM')); 
			// добавление элемента текстового узла <ISSHAREROOM> в <ISSHAREROOM> 
			$ISSHAREROOM->appendChild($dom->createTextNode($request_field['ISSHAREROOM']));
			
			//добавление элемента <BEDS> в <row> 
			$BEDS = $row->appendChild($dom->createElement('BEDS'));
			// добавление элемента текстового узла <BEDS> в <BEDS> 
			$BEDS->appendChild($dom->createTextNode($request_field['BEDS']));
			
			//добавление элемента <CHILDREN2> в <row> 
			$CHILDREN2 = $row->appendChild($dom->createElement('CHILDREN2'));
			// добавление элемента текстового узла <CHILDREN2> в <CHILDREN2> 
			$CHILDREN2->appendChild($dom->createTextNode($request_field['CHILDREN2']));
			
			//добавление элемента <IDACCOUNTSHAREROOM> в <row> 
			$IDACCOUNTSHAREROOM = $row->appendChild($dom->createElement('IDACCOUNTSHAREROOM'));
			// добавление элемента текстового узла <IDACCOUNTSHAREROOM> в <IDACCOUNTSHAREROOM> 
			$IDACCOUNTSHAREROOM->appendChild($dom->createTextNode($request_field['IDACCOUNTSHAREROOM']));
			
			//добавление элемента <KINDSHAREROOM> в <row> 
			$KINDSHAREROOM = $row->appendChild($dom->createElement('KINDSHAREROOM')); 
			// добавление элемента текстового узла <KINDSHAREROOM> в <KINDSHAREROOM> 
			$KINDSHAREROOM->appendChild($dom->createTextNode($request_field['KINDSHAREROOM']));
			
			//добавление элемента <IDSUBJECT> в <row> 
			$IDSUBJECT = $row->appendChild($dom->createElement('IDSUBJECT')); 
			// добавление элемента текстового узла <IDSUBJECT> в <IDSUBJECT> 
			$IDSUBJECT->appendChild($dom->createTextNode($request_field['IDSUBJECT']));
			
			//добавление элемента <VOUCHER> в <row> 
			$VOUCHER = $row->appendChild($dom->createElement('VOUCHER'));
			// добавление элемента текстового узла <VOUCHER> в <VOUCHER> 
			$VOUCHER->appendChild($dom->createTextNode($request_field['VOUCHER']));
			
			//добавление элемента <ISSPECIALRATE> в <row> 
			$ISSPECIALRATE = $row->appendChild($dom->createElement('ISSPECIALRATE')); 
			// добавление элемента текстового узла <ISSPECIALRATE> в <ISSPECIALRATE> 
			$ISSPECIALRATE->appendChild($dom->createTextNode($request_field['ISSPECIALRATE']));
			
			//добавление элемента <SPECIALRATE> в <row> 
			$SPECIALRATE = $row->appendChild($dom->createElement('SPECIALRATE')); 
			// добавление элемента текстового узла <SPECIALRATE> в <SPECIALRATE> 
			$SPECIALRATE->appendChild($dom->createTextNode($request_field['SPECIALRATE']));
			
			//добавление элемента <IDGROUPTYPEROOM> в <row> 
			$IDGROUPTYPEROOM = $row->appendChild($dom->createElement('IDGROUPTYPEROOM'));
			// добавление элемента текстового узла <IDGROUPTYPEROOM> в <IDGROUPTYPEROOM> 
			$IDGROUPTYPEROOM->appendChild($dom->createTextNode($request_field['IDGROUPTYPEROOM']));
			
			//добавление элемента <IDMENUKIND> в <row> 
			$IDMENUKIND = $row->appendChild($dom->createElement('IDMENUKIND')); 
			// добавление элемента текстового узла <IDMENUKIND> в <IDMENUKIND> 
			$IDMENUKIND->appendChild($dom->createTextNode($request_field['IDMENUKIND']));
			
			//добавление элемента <CRCHANNEL> в <row> 
			$CRCHANNEL = $row->appendChild($dom->createElement('CRCHANNEL'));
			// добавление элемента текстового узла <CRCHANNEL> в <CRCHANNEL> 
			$CRCHANNEL->appendChild($dom->createTextNode($request_field['CRCHANNEL']));
			
			//добавление элемента <ANCILLARY> в <row> 
			$ANCILLARY = $row->appendChild($dom->createElement('ANCILLARY'));  
			// добавление элемента текстового узла <ANCILLARY> в <ANCILLARY> 
			$ANCILLARY->appendChild($dom->createTextNode($request_field['ANCILLARY']));
							   
		}
		
	//генерация xml 
	$dom->formatOutput = true; // установка атрибута formatOutput
							   // domDocument в значение true 
	// save XML as string or file 
	$test1 = $dom->saveXML(); // передача строки в test1 
	$dom->save('../../requests/import/'.$file_name); // сохранение файла 
		
		
	/*
	$file =  fopen('../../requests/'.$request_code.'.csv', 'w');			// открываем файл оперативной истории для чтения				
	
	foreach ($read_request as $request_field)
		{
			$contents .= $request_field['SITENUMBER'].','.$request_field['ACCOUNTNUMBER'].','.$request_field['NUMBER'].','.$request_field['IDACCOUNT'].','.$request_field['CR'].','.$request_field['IDHOTEL'].','.$request_field['IDPERSON'].','.$request_field['FIO'].','.$request_field['BIRTHDATE'].','.$request_field['BIRTHPLACE'].','.$request_field['IDGUESTTYPE'].','.$request_field['CHECKIN'].','.$request_field['CHECKOUT'].','.$request_field['MEN'].','.$request_field['CHILDREN'].','.$request_field['IDTYPEROOM'].','.$request_field['IDROOM'].','.$request_field['IDRATEPLAN'].','.$request_field['ISHIDERATE'].','.$request_field['CONTACT'].','.$request_field['IDKA'].','.$request_field['IDTA'].','.$request_field['IDFIRM'].','.$request_field['IDCOUNTRY'].','.$request_field['IDCITY'].','.$request_field['ADDRESS'].','.$request_field['EMAIL'].','.$request_field['COMMENT'].','.$request_field['PHONE'].','.$request_field['IDWARRANTY'].','.$request_field['IDSOURCE'].','.$request_field['CAR'].','.$request_field['IDGEO'].','.$request_field['IDLANGUAGE'].','.$request_field['IDAIM'].','.$request_field['ISNC'].','.$request_field['ISPAIDCOMM'].','.$request_field['PROCCOMM'].','.$request_field['IDGROUP'].','.$request_field['ISTAX'].','.$request_field['IDSTATUS'].','.$request_field['IDDENIAL'].','.$request_field['IDCANCELLATION'].','.$request_field['ISCONFIRMATLON'].','.$request_field['LOGINCREATE'].','.$request_field['DATECHANGE'].','.$request_field['LOGINCHANGE'].','.$request_field[''].','.$request_field['IDOWNER'].','.$request_field['IDINOWNER'].','.$request_field['RECORDCOLOR'].','.$request_field['RECORDFONT'].','.$request_field['STATUS'].','.$request_field['DATECREATE'].','.$request_field['CITY'].','.$request_field['SMALLCHILDREN'].','.$request_field['WARRANTYDATE'].','.$request_field['IDVIPCUSTOMER'].','.$request_field['IDMANAGER'].','.$request_field['PRIORITET'].','.$request_field['ISSHAREROOM'].','.$request_field['BEDS'].','.$request_field['CHILDREN2'].','.$request_field['IDACCOUNTSHAREROOM'].','.$request_field['KINDSHAREROOM'].','.$request_field['IDSUBJECT'].','.$request_field['VOUCHER'].','.$request_field['ISSPECIALRATE'].','.$request_field['SPECIALRATE'].','.$request_field['IDGROUPTYPEROOM'].','.$request_field['IDMENUKIND'].','.$request_field['CRCHANNEL'].','.$request_field['ANCILLARY'];				   
		}
			
	fwrite($file, $contents."\n");                            // пишем результат
	fclose($file);  */

?>
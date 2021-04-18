<?php

if(!extension_loaded("soap")){
  dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled","0");

$server = new SoapServer("pretvori.wsdl");

function pretvori($valuta, $kolicina){
	
	if ($valuta == 'BamToEur'){
		$rezultat = $kolicina/1.955830;
	}
	else if ($valuta == 'EurToBam'){
		$rezultat = $kolicina*1.955830;
	}
	
	return $rezultat;
}

$server->AddFunction("pretvori");
$server->handle();
?>
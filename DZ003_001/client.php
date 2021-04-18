<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

try{
	error_reporting(0);
	ini_set('soap.wsdl_cache_enabled',0);
	ini_set('soap.wsdl_cache_ttl',0);
	
	$endPointWSDL = "http://localhost/dz3/pretvori.wsdl";
  
	$sClient = new SoapClient($endPointWSDL,
							array(
							'cache_wsdl'=>WSDL_CACHE_NONE,
							'trace' => 1)
							);
		//primjer pokretanja bez dodatnih opcija
		//$sClient = new SoapClient('pretvori.wsdl');
		
		$valuta 	= $_POST['valuta'];
		$kolicina = $_POST['kolicina'];
		// echo "Odgovor web servisa uz info o varijabli (var_dump)\n";
		$response = $sClient->pretvori($valuta, $kolicina);
		//print_r($response);
		//var_dump($response);
		echo "\n\n";
		
		// 4 retka ispopd mozete komentirati, sluze za primjer kako izgeldaju req i res 
		//echo "SOAP REQUEST HEADERS:\n" . $sClient->__getLastRequestHeaders() . "\n";
		//echo "SOAP REQUEST :\n" . $sClient->__getLastRequest() . "\n";
		//echo "SOAP RESPONSE HEADERS:\n" . $sClient->__getLastResponseHeaders() . "\n";
		//echo "SOAP RESPONSE :\n" . $sClient->__getLastResponse() . "\n";  
		
	  
		//var_dump($sClient->__getLastResponseHeaders());
		//var_dump($sClient->__getLastResponse());
		//$sClient->__getLastResponse();
	
} catch(SoapFault $e){
  var_dump($e);
  echo $e;
 } 
	
?>

  
    <form id="form" action="./client.php" method="post">
		
		<label id="label_txt">Odaberi:</label>
		<div id="valuta" >
		  <input type="radio" name="valuta" value="BamToEur" checked>
			<label>BAM >> EUR</label><br />
		  <input type="radio" name="valuta" value="EurToBam">
			<label>EUR >> BAM</label>
		</div>	
		<input type="text" id="kol" name="kolicina" placeholder="Količina">  

		<input id="btnPretvori" type="submit" name="submit" value="Pretvori">
		<input id="btnReset" type="reset" value="Reset">
	
		<div id="rezultat">
			<input type="text" id="rez" name="id" placeholder="Rezultat" value=" <?php echo  number_format($response, 2, '.', '');	?>" >
			<label>EUR/BAM<label>
		</div>
	
    </form>      
  


</body> 
</html>
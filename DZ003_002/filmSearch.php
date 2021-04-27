<?php
$s = $_REQUEST["s"];
try{
	error_reporting(0);
	//$endPointWSDL = "https://localhost:44380/WebService1.asmx?WSDL";
  
	/* $sClient = new SoapClient($endPointWSDL,
							array(
							'cache_wsdl'=>WSDL_CACHE_NONE,
							'trace' => 1)
							); */
		//primjer pokretanja bez dodatnih opcija
		//$sClient = new SoapClient($endPointWSDL);
		$options = [
			'cache_wsdl'     => WSDL_CACHE_NONE,
			'trace'          => 1,
			'stream_context' => stream_context_create(
				[
					'ssl' => [
						'verify_peer'       => false,
						'verify_peer_name'  => false,
						'allow_self_signed' => true
					]
				]
			)
		];
		$wsdlUrl = 'https://localhost:44380/WebService1.asmx?WSDL';
		$client = new SoapClient($wsdlUrl, $options);
		$params = array("id" => $s);
		$result = $client->getInfoMovieJson($params);
		// "Odgovor web servisa uz info o varijabli (var_dump)\n";
		//var_dump($result);
		$value = get_object_vars($result)['getInfoMovieJsonResult'];
		$jsonObj = json_decode($value);
		$myStr1 = "<table id=\"novaTabela\"><thead>
	    <th>Naziv Filma</th> <th>Opis</th> <th>Datum</th>
		<th>Trajanje (m)</th> <th>Certifikat</th> <th>Ocjena</th></thead>
		<tbody>";
		$mystr2 = $myStr1 . "<tr> ";
		$mystr2 = $mystr2 . "<td> " . $jsonObj[0]->movieTitle . "</td>";
		$mystr2 = $mystr2 . "<td> " . $jsonObj[0]->movieDesc . "</td>";
		$mystr2 = $mystr2 . "<td> " . $jsonObj[0]->movieReleaseDate . "</td>";
		$mystr2 = $mystr2 . "<td> " . $jsonObj[0]->movieRuntime . "</td>";
		$mystr2 = $mystr2 . "<td> " . $jsonObj[0]->movieCertificate . "</td>";
		$mystr2 = $mystr2 . "<td> " . $jsonObj[0]->movieRating . "</td>";
		$mystr2 = $mystr2 . "</tr></tbody></table>";
		echo $mystr2;
		
		
		//$mystr2 = $mystr2 . "</tr></tbody></table>"
		//echo $mystr2;
		//echo $result->getInfoMovieResult;
		//$response = $sClient->getInfoMovieJson($params);
		//echo $response;
		//echo string($result);
		//var_dump($response);
		//echo "\n\n";
} catch(SoapFault $e){
  var_dump($e);
  echo $e;
 } 
	
?>
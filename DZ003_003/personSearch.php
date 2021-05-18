<?php
error_reporting(0);
$s = $_REQUEST["s"];
try{
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
		$params = array("searchString" => $s);
		$result = $client->getPersonByStringJson($params);
		$value = get_object_vars($result)['getPersonByStringJsonResult'];
		$jsonObj = json_decode($value);
		if ($jsonObj[0]==NULL)
		{
			echo "<p> Ne postoji nijedna osoba koja ima traženi upit u imenu/prezimenu! </p>";
		}
		else
		{
			$myStr1 = "<table id=\"novaTabela\"><thead>
			<th>Ime</th> <th>Prezime</th> <th>Nacionalnost</th>
			<th>Link slike</th></thead>
			<tbody>";
			$mystr2  = $myStr1 . "<tr> ";
			for ($x = 0; $x < count($jsonObj); $x++) {
			$mystr2 = $mystr2 . "<td> " . $jsonObj[$x]->personFirstName . "</td>";
			$mystr2 = $mystr2 . "<td> " . $jsonObj[$x]->personLastName . "</td>";
			$mystr2 = $mystr2 . "<td> " . $jsonObj[$x]->personNationality . "</td>";
			$mystr2 = $mystr2 . "<td> " . $jsonObj[$x]->personPicture . "</td>";
			$mystr2 = $mystr2 . "</tr>";
			}
			$mystr2 = $mystr2 . "</tbody></table>";
			echo $mystr2;
		}
} catch(SoapFault $e){
  var_dump($e);
  echo $e;
 } 
	
?>
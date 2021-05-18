<?php 
$s  = $_REQUEST['bandName'];
$db = mysqli_connect("localhost", "root", "", "sequelmovie");
if($db){

	$sql = "SELECT artisteName
					  FROM artiste
						INNER JOIN artiste_band
							ON artiste.artisteID = artiste_band.a_artisteID
						INNER JOIN band
							ON artiste_band.b_bandID = band.bandID
					 WHERE bandName = '$s' ";
					 
	$response = mysqli_query($db, $sql) or die("database error:". mysqli_error($db));	
	
	$n=mysqli_num_rows($response);
	if ($n > 0){
	
		echo "<table id=\"novaTabela\">
			<thead>
			  <th>Nazivi članova benda</th>
			</thead>";
	while ($myrow=mysqli_fetch_row($response)){
		 
		echo " <tbody>
			  <tr>
			    <td data-label='artisteName'>$myrow[0]</td>
			 </tr>
		       </tbody>";
		}
		 echo "</table>";
	}
	else echo "<p> Traženi bend nije pronađen </p>";
}
else {
	echo "<br>Nije se uspostavila veza sa bazom.<br>";
	}
?>	

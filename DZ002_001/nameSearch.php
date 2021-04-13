<?php
$s = $_REQUEST["s"];
$hint3 = "";
if ($s !== "") {
    $s = strtolower($s);
    $len=strlen($s);
$db = new mysqli("127.0.0.1","root","");

if($db) {

$result = $db->select_db("imdb") or die("Došlo je do problema prilikom odabira baze...");
$result2= $db->query("SELECT * FROM names_ where LEFT(LOWER(name_),$len) LIKE '%$s%'") or die("Došlo je do problema");
//echo $sql;
$n=$result2->num_rows;
if ($n > 0){
    $hint2 = "<table id=\"novaTabela\"><thead><th> Ime i prezime </th> <th>Godina rođenja</th> </thead>
            <tbody>";
	while ($myrow=mysqli_fetch_row($result2)){
			//echo $myrow[0].",".$myrow[1].",".$myrow[2];
			$hint1 = "<tr name=\"result\" class=\"rezultati\" id=\"".$myrow[0]."\"> <td>".$myrow[1]."</td> <td>".$myrow[2]." </td></tr>";
            $hint2 = $hint2 . $hint1;
		}
        $hint3 = $hint2 . "</tbody></table>";
	}
else {
echo "Nema rezultata<br>";
}	
}
else {
echo "<br>Nije proslo spajanje<br>";
}
/**********************************************************/
	
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint3 === "" ? "no suggestion" : $hint3;

?>
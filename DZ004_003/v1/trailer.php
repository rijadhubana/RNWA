<?php
// Connect to database
	include("../connection.php");
	include("../functions.php");
	$db = new dbObj();
     $connection =  $db->getConnstring();
	// $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	// $uri = explode( '/', $uri );
	// var_dump($uri);
	$request_method=$_SERVER["REQUEST_METHOD"];
	switch($request_method)
	{
		case 'GET':
			// Retrieve trailer
			//print_r($_GET);
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				get_trailer($id);
			}
			else
			{
				get_trailer();
			}
			break;
			
			case 'POST':
			// Insert trailer
			insert_trailer();
			break;	
			
			case 'PUT':
			// Update trailer		
			if (isset($_GET["id"])){
				$id=intval($_GET["id"]);
				update_trailer($id);				
			}
			else{
				header('Content-Type: application/json');
				echo json_encode("Error while calling method and parametars");
				
			}				
			
			break;				
			case 'DELETE':
			// Delete trailer
			$id=intval($_GET["id"]);
			delete_trailer($id);
			break;
			
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}
?>
 
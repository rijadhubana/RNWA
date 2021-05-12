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
			// Retrive post
			//print_r($_GET);
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				get_post($id);
			}
			else
			{
				get_post();
			}
			break;
			
			case 'POST':
			// Insert post
			insert_post();
			break;	
			
			case 'PUT':
			// Update post		
			if (isset($_GET["id"])){
				$id=intval($_GET["id"]);
				update_post($id);				
			}
			else{
				header('Content-Type: application/json');
				echo json_encode("Error while calling method and parametars");
				
			}				
			
			break;				
			case 'DELETE':
			// Delete post
			$id=intval($_GET["id"]);
			delete_post($id);
			break;
			
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}
?>

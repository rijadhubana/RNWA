<?php
$valid_passwords = array ("admin" => "admin");
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

if (!$validated) {
  header('WWW-Authenticate: Basic realm="My Realm"');
  header('HTTP/1.0 401 Unauthorized');
  die ("Not authorized");
}



Class dbObj
  {
	/* Database connection start */
	var $servername = "localhost";
	var $username = "root";
	var $password = "";
	var $dbname = "sequelmovie";
	var $conn;
	function getConnstring() {
		$con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
 
		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		} else {
			$this->conn = $con;
		}
		return $this->conn;
  }
}
  function get_trailer($id=0)
    {
	global $connection;
	$query="SELECT * FROM trailer";
	if($id != 0)
	{
		$query.=" WHERE trailerID=".$id." LIMIT 100";
	}
	$response=array();
	$result=mysqli_query($connection, $query);
	while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
	{
		$response[]=$row;
	}
	header('Content-Type: application/json');
	echo json_encode($response);
    }
function insert_update_error_log($tmovieId,$tid,$queryParam='')
  {
			$tmovieIdmessage='';
			$tidmessage='';
			$metodaTekst='';
			if ($_SERVER["REQUEST_METHOD"] == 'POST')
				$metodaTekst = 'Addition';
			else 
				$metodaTekst = 'Updation';
			if ($tmovieId==NULL)
				$tmovieIdmessage='Trailer movie id is missing (mandatory). ';
			if ($tid==NULL&&$_SERVER["REQUEST_METHOD"] == 'POST')
				$tidmessage ='Trailer id is missing (mandatory). ';
			if ($tid==NULL&&$_SERVER["REQUEST_METHOD"] == 'PUT')
				$tidmessage ='Invalid trailer id. ';

				$response=array(
				'status' => 0,
				'query' => $queryParam,
				'broj_redaka' => 0,
				'status_message' =>'Trailer ' . $metodaTekst . ' Failed. '.$tmovieIdmessage . $tidmessage
			);
			return $response;
  }
function insert_trailer()
	{
		$context = stream_context_create([
			'http' => [
				'method' => 'POST',
				'header' => "Content-type: application/json\r\n" .
							"Accept: application/json\r\n" .
							"Connection: close\r\n" .
							"Content-length: " . strlen('php://input') . "\r\n",
				'protocol_version' => 1.1,
				'content' => 'php://input'
			],
			'ssl' => [
				'verify_peer' => false,
				'verify_peer_name' => false
			]
			]);
		global $connection;
		$getData =  file_get_contents("php://input", false, $context);
		$data =  json_decode($getData, TRUE);
		//var_dump($data);
		$trailer_id	= $data["trailerID"];
		$trailer_length		=$data["trailerLength"];
		$trailer_URL		=$data["trailerURL"];
		$trailer_movieId		=$data["t_movieID"]; 
		if ($trailer_id==NULL || $trailer_movieId==NULL)
		{
			$response = insert_update_error_log($trailer_movieId,$trailer_id);
			header('Content-Type: application/json');
			echo json_encode($response);
			return;
		}

		echo $query="INSERT INTO trailer VALUES ($trailer_id, '".$trailer_length."','".$trailer_URL."','".$trailer_movieId."')";
		if(mysqli_query($connection, $query))
		{
			$broj_redaka = mysqli_affected_rows($connection);
			$response=array(
				'status' => 1,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Trailer Added Successfully.'
			);
		}
		else
		{
			$broj_redaka = mysqli_affected_rows($connection);
			$response = insert_update_error_log($trailer_movieId,$trailer_id,$query);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
function update_trailer($id)
	{
		global $connection;
		$context = stream_context_create([
			'http' => [
				'method' => 'PUT',
				'header' => "Content-type: application/json\r\n" .
							"Accept: application/json\r\n" .
							"Connection: close\r\n" .
							"Content-length: " . strlen('php://input') . "\r\n",
				'protocol_version' => 1.1,
				'content' => 'php://input'
			],
			'ssl' => [
				'verify_peer' => false,
				'verify_peer_name' => false
			]
			]);
		$getData =  file_get_contents("php://input", false, $context);
		$data =  json_decode($getData, TRUE);
		$trailer_length		=$data["trailerLength"];
		$trailer_URL		=$data["trailerURL"];
		$trailer_movieId		=$data["t_movieID"]; 
		if ($trailer_movieId==NULL || $id<=0)
			{
				$response = insert_update_error_log($trailer_movieId,NULL);
				header('Content-Type: application/json');
				echo json_encode($response);
				return;
			}
		$query="UPDATE trailer SET trailerLength='".$trailer_length."', trailerURL='".$trailer_URL."', t_movieID='".$trailer_movieId."' WHERE trailerID=".$id;	
		$result=mysqli_query($connection, $query);
		$broj_redaka = mysqli_affected_rows($connection);;
		
		if($result)
		{
			$response=array(
				'status' => 1,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Trailer Updated Successfully.'
			);
		}
		else
		{
			$response = insert_update_error_log($trailer_movieId,$id,$query);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}

function delete_trailer($id)
  {
	global $connection;
	$query="DELETE FROM trailer WHERE trailerID=".$id;
	if($result = mysqli_query($connection, $query))
	{
		//$broj_redaka = mysqli_num_rows($result);
		$response=array(
			'status' => 1,
			//'brojredaka' => $broj_redaka,
			'status_message' =>'Trailer Deleted Successfully.'
		);
	}
	else
	{
		$response=array(
			'status' => 0,
			'status_message' =>'Trailer Deletion Failed.'
		);
	}
	header('Content-Type: application/json');
	echo json_encode($response);
  }
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
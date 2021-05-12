<?php

function get_post($id=0)
{
	global $connection;
	$query="SELECT * FROM posts";
	if($id != 0)
	{
		$query.=" WHERE id=".$id." LIMIT 100";
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
function insert_update_error_log($title,$body,$userId,$queryParam='')
{
			$titlemessage='';
			$bodymessage='';
			$useridMessage='';
			$metodaTekst='';
			if ($_SERVER["REQUEST_METHOD"] == 'POST')
				$metodaTekst = 'Addition';
			else 
				$metodaTekst = 'Updation';
			if ($title==NULL)
				$titlemessage='Post title is missing (mandatory). ';
			if ($body==NULL)
				$bodymessage='Post body is missing (mandatory). ';
			if ($userId==NULL)
				$useridMessage='Post user id is missing (mandatory). ';
			$response=array(
				'status' => 0,
				'query' => $queryParam,
				'broj_redaka' => 0,
				'status_message' =>'Post ' . $metodaTekst . ' Failed. '.$titlemessage . $bodymessage . $useridMessage
			);
			return $response;
}
function insert_post()
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
		$post_title	= $data["title"];
		$post_body		=$data["body"];
		$post_userId		=$data["user_id"];
		$post_thumbnail		=$data["post_thumbnail"]; 
		if ($post_thumbnail == NULL)
				$post_thumbnail = 'None';
		if ($post_title==NULL || $post_body==NULL || $post_userId==NULL)
		{
			$response = insert_update_error_log($post_title,$post_body,$post_userId);
			header('Content-Type: application/json');
			echo json_encode($response);
			return;
		}

		echo $query="INSERT INTO posts VALUES (NULL, '".$post_title."','".$post_body."','".$post_userId."', '".$post_thumbnail."',NULL,NOW(),NULL)";
		if(mysqli_query($connection, $query))
		{
			$broj_redaka = mysqli_affected_rows($connection);
			$response=array(
				'status' => 1,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Post Added Successfully.'
			);
		}
		else
		{
			$broj_redaka = mysqli_affected_rows($connection);
			$response = insert_update_error_log($post_title,$post_body,$post_userId,$query);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
function update_post($id)
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
		$post_title		=$data["title"];
		$post_body		=$data["body"];
		$post_userId	=$data["user_id"];
		$post_thumbnail		=$data["post_thumbnail"];
		if ($post_thumbnail == NULL)
				$post_thumbnail = 'None';
		if ($post_title==NULL || $post_body==NULL || $post_userId==NULL)
			{
				$response = insert_update_error_log($post_title,$post_body,$post_userId);
				header('Content-Type: application/json');
				echo json_encode($response);
				return;
			}
		$query="UPDATE posts SET title='".$post_title."', body='".$post_body."', user_id='".$post_userId."',post_thumbnail='".$post_thumbnail."',updated_at=NOW() WHERE id=".$id;
		
		$result=mysqli_query($connection, $query);
		$broj_redaka = mysqli_affected_rows($connection);;
		
		if($result)
		{
			$response=array(
				'status' => 1,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Post Updated Successfully.'
			);
		}
		else
		{
			$response = insert_update_error_log($post_title,$post_body,$post_userId,$query);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}

function delete_post($id)
{
	global $connection;
	$query="DELETE FROM posts WHERE id=".$id;
	if($result = mysqli_query($connection, $query))
	{
		//$broj_redaka = mysqli_num_rows($result);
		$response=array(
			'status' => 1,
			//'brojredaka' => $broj_redaka,
			'status_message' =>'Post Deleted Successfully.'
		);
	}
	else
	{
		$response=array(
			'status' => 0,
			'status_message' =>'Post Deletion Failed.'
		);
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}


?>

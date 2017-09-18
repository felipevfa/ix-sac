<?php 
	$user_name = $_POST["user_name"];
	$user_id = $_POST["user_id"];

	$server_host = "";
	$server_username = "";
	$server_pwd = "";
	$server_db = "";
	$server_port = "";

	$conexao = mysqli_connect($server_host, $server_username, $server_pwd, $server_db, $server_port);

	//procura pelos certificados daquela identificação.
	$sql = "SELECT url, certification
			FROM  pet_certificates
			WHERE user_id = $user_id";

	$query = mysqli_query($conexao, $sql);	

	echo  json_encode(mysqli_fetch_array($query, MYSQL_ASSOC));

	mysqli_close($conexao);
?>
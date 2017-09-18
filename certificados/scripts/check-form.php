<?php 
	$user_name = $_POST["user_name"];
	$user_id = $_POST["user_id"];

	$server_host = "";
	$server_username = "";
	$server_pwd = "";
	$server_db = "";
	$server_port = "";

	$conexao = mysqli_connect($server_host, $server_username, $server_pwd, $server_db, $server_port);

	//verifica se o usuário já preencheu o formulário.
	$sql = "SELECT user_id
			FROM pet_public
			WHERE user_id = $user_id
				  AND form = 'sim'";

	$query = mysqli_query($conexao,$sql);

	if (mysqli_num_rows($query) === 0) {
			echo 'false';
	}
	else {
		echo 'true';
	}		

	mysqli_close($conexao);
?>
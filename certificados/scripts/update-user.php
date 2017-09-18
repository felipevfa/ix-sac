<?php 
	$user_name = $_POST["user_name"];
	$user_id = $_POST["user_id"];

	$server_host = "";
	$server_username = "";
	$server_pwd = "";
	$server_db = "";
	$server_port = "";

	$conexao = mysqli_connect($server_host, $server_username, $server_pwd, $server_db, $server_port);

	//atualiza a informação indicando que o usuário já preencheu o formulário.
	$sql = "UPDATE pet_public
			SET form = 'sim'
			WHERE user_id = $user_id";
				  
	$query = mysqli_query($conexao,$sql);

	mysqli_close($conexao);
?>
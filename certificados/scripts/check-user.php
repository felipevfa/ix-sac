<?php 
	$user_name = $_POST["user_name"];
	$user_id = $_POST["user_id"];

	$server_host = "";
	$server_username = "";
	$server_pwd = "";
	$server_db = "";
	$server_port = "";

	$conexao = mysqli_connect($server_host, $server_username, $server_pwd, $server_db, $server_port);

	if ($user_id === '') {
		echo 'true';
	}
	else {
		//verifica se há usuário com aquela identificação.
		$sql = "SELECT user_id
				FROM pet_public
				WHERE user_id = $user_id";

		$query = mysqli_query($conexao, $sql);

		if (mysqli_num_rows($query) === 0) {
				echo 'true';
		}
		else {
			echo 'false';
		}		
	}
	mysqli_close($conexao);
?>
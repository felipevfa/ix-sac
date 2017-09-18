<meta charset="UTF-8">

<?php 
	$server_host = "";
	$server_username = "";
	$server_pwd = "";
	$server_db = "";
	$server_port = "";

	$conexao = mysqli_connect($server_host, $server_username, $server_pwd, $server_db, $server_port);

	if (mysqli_connect_errno()) {
		echo "<script>
					alert('Erro ao tentar conectar ao banco de dados:' . mysqli_connect_error());
					window.location.href = 'index.html';
			  </script>";
	}

	mysqli_query("SET NAMES 'utf8'");
	mysqli_query('SET character_set_connection=utf8');
	mysqli_query('SET character_set_client=utf8');
	mysqli_query('SET character_set_results=utf8');

	$user_name = $_POST['user_name'];
	$user_id = $_POST['user_id'];
	$id_type = $_POST['id_type'];
	$user_contact = $_POST['user_contact'];
	$ufcid = $_POST['ufcid'];

	//Verificando se o indivíduo já está inscrito no sistema do PET
	$dados = mysqli_query($conexao, "SELECT user_id FROM pet_public 
		                             WHERE user_id = $user_id");	

	if (mysqli_num_rows($dados) === 0) {		
	
		if (!empty($ufcid)) {
			$sql = "INSERT INTO pet_public
					VALUES ('$user_name', '$id_type', $user_id, '$user_contact',
							   		    $ufcid)";
		}
		else {
			$sql = "INSERT INTO pet_public (user_name, id_type, user_id, user_contact)
					VALUES ('$user_name', '$id_type', $user_id, '$user_contact')";
		}

		$query = mysqli_query($conexao, $sql);

		if ($query) {
			echo "<script>
					alert('Cadastro concluído com sucesso!');
			 	  </script>";
		}
		else {
			echo mysqli_error($conexao);
		}
	}
	else {
		echo "<script>
				alert('Você já está cadastrado no sistema do PET!');
			  </script>";
	}
	
	mysqli_close($conexao);

	echo "<script>window.location.href = 'index.html'</script>";
?>
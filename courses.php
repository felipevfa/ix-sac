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

	$user_id = $_POST['regnum'];

	//Verificando se o indivíduo já está inscrito no sistema do PET
	$cadastro = mysqli_query($conexao, "SELECT user_id FROM pet_public 
		                             WHERE user_id = $user_id");	

	if (mysqli_num_rows($cadastro) === 0) {
		echo "<script>
				alert('É necessário cadastrar-se no sistema PET para fazer a pré-inscrição!');
			  </script>";
	}
	else {
		//event code: 1 - NoSQL
		if (!empty($_POST['nosql-submit'])) {
			$cadastro = mysqli_query($conexao, "SELECT user_id FROM pet_subscriptions
												WHERE user_id = $user_id 
													  AND event_id = 1");

			if (mysqli_num_rows($cadastro) === 0) {
				$sql = "INSERT INTO pet_subscriptions (user_id, event_id)
							   VALUES ($user_id, 1)";

				$query = mysqli_query($conexao, $sql);

				if ($query) {
					echo "<script>
							alert('Pré-cadastro concluído com sucesso!');
						  </script>";
				}
				else {
					echo mysqli_error($conexao);
				}

			}
			else {
				echo "<script>
						alert('Você já efetou o pré-cadastro neste minicurso!');
					  </script>";
			}
		}

		//event code: 2 - Web
		if (!empty($_POST['web-submit'])) {
			$cadastro = mysqli_query($conexao, "SELECT user_id FROM pet_subscriptions
												WHERE user_id = $user_id 
													  AND event_id = 2");

			if (mysqli_num_rows($cadastro) === 0) {
				$sql = "INSERT INTO pet_subscriptions (user_id, event_id)
							   VALUES ($user_id, 2)";

				$query = mysqli_query($conexao, $sql);

				if ($query) {
					echo "<script>
							alert('Pré-cadastro concluído com sucesso!');
						  </script>";
				}
				else {
					echo mysqli_error($conexao);
				}

			}
			else {
				echo "<script>
						alert('Você já efetou o pré-cadastro neste minicurso!');
					  </script>";
			}
		}

		//event code: 3 - Python
		if (!empty($_POST['python-submit'])) {
			$cadastro = mysqli_query($conexao, "SELECT user_id FROM pet_subscriptions
												WHERE user_id = $user_id 
													  AND event_id = 3");

			if (mysqli_num_rows($cadastro) === 0) {
				$sql = "INSERT INTO pet_subscriptions (user_id, event_id)
							   VALUES ($user_id, 3)";

				$query = mysqli_query($conexao, $sql);

				if ($query) {
					echo "<script>
							alert('Pré-cadastro concluído com sucesso!');
						  </script>";
				}
				else {
					echo mysqli_error($conexao);
				}

			}
			else {
				echo "<script>
						alert('Você já efetou o pré-cadastro neste minicurso!');
					  </script>";
			}
		}

		//event code: 4 - Arduino
		if (!empty($_POST['arduino-submit'])) {
			$cadastro = mysqli_query($conexao, "SELECT user_id FROM pet_subscriptions
												WHERE user_id = $user_id 
													  AND event_id = 4");

			if (mysqli_num_rows($cadastro) === 0) {
				$sql = "INSERT INTO pet_subscriptions (user_id, event_id)
							   VALUES ($user_id, 4)";

				$query = mysqli_query($conexao, $sql);

				if ($query) {
					echo "<script>
							alert('Pré-cadastro concluído com sucesso!');
						  </script>";
				}
				else {
					echo mysqli_error($conexao);
				}

			}
			else {
				echo "<script>
						alert('Você já efetou o pré-cadastro neste minicurso!');
					  </script>";
			}
		}


		//event code: 6 - Unity
		if (!empty($_POST['unity-submit'])) {
			$cadastro = mysqli_query($conexao, "SELECT user_id FROM pet_subscriptions
												WHERE user_id = $user_id 
													  AND event_id = 6");

			if (mysqli_num_rows($cadastro) === 0) {
				$sql = "INSERT INTO pet_subscriptions (user_id, event_id)
							   VALUES ($user_id, 6)";

				$query = mysqli_query($conexao, $sql);

				if ($query) {
					echo "<script>
							alert('Pré-cadastro concluído com sucesso!');
						  </script>";
				}
				else {
					echo mysqli_error($conexao);
				}

			}
			else {
				echo "<script>
						alert('Você já efetou o pré-cadastro neste minicurso!');
					  </script>";
			}
		}
	}

	mysqli_close($conexao);

	echo "<script>window.location.href = 'index.html'</script>"

?>

var form = $("#order-certificate");

$("#btn_require").click(function() {
	$("#disclaimer").fadeOut('fast', function() {
		$("#require-certificate").fadeIn('fast');
	});
});

$("#btn_certificate").click(function() {
	
	//verifica se o usuário está cadastrado no sistema.
	$.ajax({

			url: "scripts/check-user.php",
			type: form.attr('method'),
			dataType: "text",
			data: form.serialize(),

			success: function (r) {

				if (r == 'true') {
					$("#require-certificate").fadeOut('fast', function() {
						$("#not-found").fadeIn('fast');
					});
				}
				else if (r == 'false') {
					//recupera os certificados do usuário e os coloca na área devida.
					$.ajax({
						url: "scripts/search-certificate.php",
						type: form.attr('method'),
						data: form.serialize(),
						dataType: "json",

						success: function (r) {
							
							$("#certificates .form-table ul").append(
								"<li><img src='img/pdf.png'><a href="+'"'+r["url"]+'.pdf">'+"IX Semana Acadêmica da Computação"+"</a></li>"
							);
							

							//verifica se o usuário já preencheu o formulário de avaliação.
							$.ajax({
								url: "scripts/check-form.php",
								type: form.attr('method'),
								data: form.serialize(),

								success: function(r) { 
									
									//se não, pede gentilmente para que ele o preencha.
									if (r == 'false') {
										$("#require-certificate").fadeOut('fast', function() {
											$("#feedback").fadeIn('fast');
										});
									}
									else {
										//caso tenha preenchido, só mostra os certificados.
										$("#require-certificate").fadeOut('fast', function() {
											$("#certificates").fadeIn('fast');
										});
									}
								}
							});
						}
					});
				}	
			}
		});
});

$("#feedback_sac").submit(function() {
	//atualiza a informação para confirmar que o usuário preencheu o formulário.
	$.ajax({
			url: "scripts/update-user.php",
			type: form.attr('method'),
			data: form.serialize()

	}).done(function (r) {
		$("#feedback").fadeOut('fast', function() {
			$("#certificates").fadeIn('fast');
		});
	});
});

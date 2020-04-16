<?php
	header('Content-Type: text/html; charset=utf-8');
	
	if(isset($_POST['nome']) && !empty($_POST['nome'])){



	$quebra_linha      = "\n";
	$emailsender 	   = "wandeberg88@gmail.com";
	$nomeremetente     = $_POST['nome'];
	$emailremetente    = trim($_POST['email']);
	$telefone          = $_POST['telefone'];
	$emaildestinatario = "wandeberg88@gmail.com";
	$comcopia          = "";
	$comcopiaoculta    = "";
	$assunto           = "CoronaNews - Novo contato através do portal";
	$mensagem          = $_POST['msg'];



	$corpo = "<strong>Formulário enviado a partir do site:</strong>\n"."<br>";
	$corpo .= "<strong>Nome:</strong> " . $nomeremetente . "\n"."<br>";
	$corpo .= "<strong>Email:</strong> " . $emailremetente . "\n"."<br>";
	$corpo .= "<strong>Telefone:</strong> " . $telefone . "\n"."<br>";
	$corpo .= "<strong>Comentários:</strong> " . $mensagem . "\n"."<br>";



	$headers = "MIME-Version: 1.1".$quebra_linha;
	$headers .= "Content-type: text/html; charset=utf-8".$quebra_linha;

	$headers .= "From: ".$emailsender.$quebra_linha;
	$headers .= "Return-Path: " . $emailsender . $quebra_linha;

	if(strlen($comcopia) > 0) $headers .= "Cc: ".$comcopia.$quebra_linha;
	if(strlen($comcopiaoculta) > 0) $headers .= "Bcc: ".$comcopiaoculta.$quebra_linha;
	$headers .= "Reply-To: ".$emailremetente.$quebra_linha;

	 

	$status = mail($emaildestinatario, $assunto, $corpo, $headers, "-r". $emailsender);
	if ($status) {
	  echo "<script> alert('Obrigado pelo seu contato, te retorno em breve! ;) '); window.location='contato.php'</script>";
	  
	} else {
	  echo "<script> alert('Falha ao enviar o Formulário.'); </script>";
	  
	//mensagem de erro no envio. 

	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Contato</title>
		<link rel="stylesheet" type="text/css" href="assets/css/estilo.css"/>
		<meta charset="UTF-8"/>	
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	</head>
	<body>
		<div class="menu">
		<div class="img_logo">
			<img src="assets/images/virus-logo.png" width="160"/>
		</div>				
			<nav>
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="sobre.html">Sobre</a></li>
					<li><a href="contato.php">Contato</a></li>
					<li><a href="saiba-mais.html">Saiba Mais</a></li>
				</ul>
			</nav>
		</div>
		<section>
			<div class="container">
				<div class="titulo_sessao">
					<h1>Contato</h1>
					<p>Envie uma mensagem, será um prazer retribuir.</p>
				</div>
				<hr>
				<div class="box_form">
					<div class="box_form_int">
						<form method="POST">
							<div class="campo_form">
								<label for="nome">Nome: </label><br/>
								<input type="text" name="nome" required/><br/><br/>
							</div>
							<div class="campo_form">
								<label for="email">E-mail: </label><br/>
								<input type="email" name="email" required/><br/><br/>
							</div>
							<div class="campo_form">
								<label for="telefone">Telefone: </label><br/>
								<input type="number" name="telefone" min="8" required><br/><br/>
							</div>
							<div class="campo_form">
								<label for="msg">Mensagem:</label><br/>
								<textarea name="msg" rows="10" required/></textarea><br/><br/>
							</div>   
							<input type="submit" value="Enviar" class="enviar"/>
						</form>
					</div>
				</div>				
			</div>								
		</section>
		<footer>
			<div class="footer">
				<p>Todos os direitos reservados.</p>
			</div>
		</footer>
	</body>
</html>
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
<?php

// Assunto
if(!empty($_POST['tipo']))
	$tipo = $_POST['tipo'];
if(empty($_POST['tipo']))
	$tipo = "";

//Parametros padrões de envio
$emailDeEnvio="contato@chvhost.com.br";//Email de envio
$emailDestinatario="contato@chvhost.com.br";//Destinatário padrão
$sucesso = "alert(\"Formulário enviado com sucesso! Obrigado por entrar em contato conosco.\")";
$erro 	 = "alert(\"Houve um erro ao tentar enviar o formulário, favor entre em contato pelo endereço de e-mail contato@chvhost.com.br, que alguem de nossa equipe retornará.\")";


//Campos do formulário
		$FormNome			= ($_POST['nome']);
		$FormDestinatatio	= ($_POST['email']);
		$FormObs			= ($_POST['obs']);
		
		$FormMotivo_contato	= ($_POST['motivo_contato']);
		
		
		$domino				= ($_POST['domino']);
		$FormSenha			= ($_POST['senha']);
		$FormTel			= ($_POST['tel']);
		$FormCodPagSeguros	= ($_POST['code']);
		

//Conteúdo do email dinâmico
switch($tipo){
	case 'cadastro':
		//Campos
		
		//Cabeçalho
		$emailDestinatario="cadastro@chvhost.com.br;contato@chvhost.com.br;".$FormDestinatatio;//Destinatário padrão
		$subject = utf8_decode('Cadastro Novo Cliente ('.$FormNome.')');//Assunto
		//Mensagem
		$message = utf8_decode('
			<html>
				<head>
					<title>Formulário Cadastro  ('.$FormMotivo_contato.'). </title>
				</head>
				<body>
					<img src="http://chvhost.com.br/assets/img/logo.png" width="300px"  alt="logo"/>
					<br /><br /><br />
					<p>Domínio: ('.$domino.')</p>
					<p>Email de Contato:  ('.$FormDestinatatio.')</p>
					<p>Nome: ('.$FormNome.')</p>
					<p>Nome: ('.$FormTel.')</p>
					
					
					<p>Senha: ('.$FormSenha.')</p>
					<p>Codigo PagSeguros: ('.$FormCodPagSeguros.')</p>
					
					<p>Motivo Contato: "Cadastro"</p>
					<p></p>
					<p>Mensagem: </p>
					<p>'.$FormObs.'</p>
					
				</body>
			</html>
		');
	break;
	default:
		/*
		//Cabeçalho
		$subject = utf8_decode('Contato CHV HOST ('.$FormMotivo_contato.')');//Assunto
		//Mensagem
		$message = utf8_decode('
			<html>
				<head>
					<title>Formulário de contato Chevalier Doces ('.$FormMotivo_contato.'). </title>
				</head>
				<body>
					<img src="http://chvhost.com.br/assets/img/logo.png" width="300px"  alt="logo"/>
					<br /><br /><br />
					<p>Email de Contato Chevalier Doces ('.$FormMotivo_contato.')</p>
					<p>Nome: '.$FormNome.' / Email: '.$FormDestinatatio.'</p>
					<p>Telefone: '.$FormTelefone.'</p>
					<p>Motivo Contato: '.$FormMotivo_contato.'</p>
					<p></p>
					<p>Mensagem: </p>
					<p>'.$FormMensagem.'</p>
				</body>
			</html>
		');
		*/
	break;
}

$to = $emailDestinatario;

// Para o envio do HTML, deve configurar o Content-type header
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To:' . $to . "\r\n";
$headers .= 'From:' . $emailDeEnvio . "\r\n";
$headers .= 'Cc:' . $FormDestinatatio . "\r\n";


// Envia o Email
$envio = mail($to, $subject, $message, $headers);

if($envio){
	echo"
		<script type=\"text/javascript\">	
			".$sucesso."
			history.back(-1);
		</script>
	";
	}
else{
	echo"
		<script type=\"text/javascript\">	
			".$erro."
			history.back(-1);
		</script>
	";
	}
?>
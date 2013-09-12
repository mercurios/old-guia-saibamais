<?php 
if (isset($_POST['recSenha'])) {

	// Recebe o valor enviado pelo formulário
	$recover = mysql_real_escape_string($_POST['email']);

	// Verifica se o e-mail é válido
	if (valMail($recover)) {

		// Busca no banco o e-mail informado
		$readRec = read('guia_user',"WHERE email_user = '$recover'");

		if(!$readRec){
			showMsg('E-mail não confere!', 'warning');
		}else{
			
			$usuario = $readRec[0];

			$recId	  = $usuario['id_user'];
			$recNome  = $usuario['nome_user'];
			$recEmail = $usuario['email_user'];
			$recCode  = substr($usuario['senha_user'], 0, 10);
			$newSenha = md5($recCode);

			$msg = '
				<h3 style="font:16px \'Trebuchet MS\', Arial, Helvetica, sans-serif; color:#099;">
					Prezado ' . $recNome . ', recupere seu acesso!
				</h3>

				<p style="font:bold 12px Arial, Helvetica, sans-serif; color:#666;">
					Estamos entrando em contato pois foi solicitado em nosso painel administrativo a recuperação de dados de acesso. 
					Por motivos de segurança, estamos enviando uma nova senha de acesso. Verifique abaixo:
				</p><hr>

				<p style="font:italic 14px \'Trebuchet MS\', Arial, Helvetica, sans-serif; color:#069">
					E-mail: <strong>' . $recEmail . '</strong><br>Nova senha: <strong>' . $recCode . '</strong>
				</p><hr>

				<p style="font:bold 12px Arial, Helvetica, sans-serif; color:#F00;">
					Recomendamos que você altere seus dados em seu perfil após efetuar o login!
				</p><hr>

				<p style="font:bold 12px Arial, Helvetica, sans-serif; color:#666;">
					Atenciosamente a administração - '.date('d/m/Y H:i:s').' - <a style="color:#900" href="#" title="Guia saiba mais">GUIA SAIBA MAIS</a>
				</p>';

			// Envia um e-mail com as informações
			if (sendMail('Recupere seus dados!', $msg, MAILUSER, SITENAME, $recEmail, $recNome)) {


				// Faz o atualiza a senha do usuário
				$dados 		 = array("senha_user" => $newSenha);
				$updateSenha = update('guia_user', $dados, "id_user = '$recId'");

				// Mostra a mensagem de sucesso.
				showMsg('Nova senha enviada com sucesso, verifique seu e-mail <br /> <a href="index.php" title="Voltar para a página de login">Voltar para a página de login</a>', 'success');
				salvaLog('Recuperou a senha', $recNome);
			}
			else {
				showMsg('Erro ao enviar e-mail com nova senha.', 'warning');
			}
		}
	}
	else {
		showMsg('Formato do e-mail informado não é válido!', 'warning');		
	}
}
?>
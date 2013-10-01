<?php  
if (isset($_POST['sendLogin'])) {
    
    // Pega as informações do formulário de login
    $email      = mysql_real_escape_string($_POST['email']);
    $senha      = mysql_real_escape_string($_POST['senha']);
    $remember   = mysql_real_escape_string($_POST['remember']);

    if (empty($email)) {
        showMsg('O campo e-mail é obrigatório.', 'warning');
    }
    elseif (!valMail($email)) {
        showMsg('O e-mail informado é inválido, tente novamente.', 'warning');
    }
    elseif (empty($senha)) {
        showMsg('O campo senha é obrigatório.', 'warning');
    }
    else {
        $autEmail    = $email;
        $autSenha    = md5($senha);
        $validaEmail = read('guia_user', "WHERE email_user = '$autEmail'");

        if ($validaEmail) {
            foreach($validaEmail as $user) {
                if ($autEmail == $user['email_user'] && $autSenha == $user['senha_user']) {
                    if ($user['status_user'] != 1) {
                        showMsg('Você está bloqueado temporariamente, entre em contato com o administrador.', 'warning');
                    }
                    else {
                        if ($remember) {
                            $cookiesalva = base64_encode($autEmail).'&'.base64_encode($senha);
                            setcookie('autUser', $cookiesalva, time()+60*60*24*30, '/');
                        }
                        else{
                            setcookie('autUser', '', time()+3600, '/');
                        }
                        $_SESSION['autUser'] = $user;
                        $idUser = $user['id_user'];

                        $dados = array("acesso_user" => date("Y-m-d H:i:s", mktime()));
                        update('guia_user', $dados, "id_user ='$idUser'");
                        header('Location: ' . $_SERVER['PHP_SELF']);
                    }  
                }
                else {
                    showMsg('Senha incorreta.', 'warning');
                }
            }
        }
        else {
            showMsg('O e-mail informado não está cadastrado em nosso banco.', 'warning');
        }
    }
}
elseif (!empty($_COOKIE['autUser'])) {
    $cookies = $_COOKIE['autUser'];
    $cookies = explode('&', $cookies);
    $email   = base64_decode($cookies[0]);
    $senha   = base64_decode($cookies[1]);
    $remember = 1;
}
?>
<?php 
ob_start();
session_start();
require('../dts/dbaSis.php'); 

if (!empty($_SESSION['autUser'])) {
    header('Location: painel.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Painel administrativo</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />    
        
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
        <link href="css/font-awesome.css" rel="stylesheet" />
        <link href="css/adminia.css" rel="stylesheet" /> 
        <link href="css/adminia-responsive.css" rel="stylesheet" /> 
        <link href="css/pages/login.css" rel="stylesheet" /> 

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>

    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span>              
                    </a>
                    
                    <a class="brand" href="#">Painel administrativo</a>
                    
                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <li class="">
                                <a href="javascript:;"><i class="icon-chevron-left"></i> Voltar para o site</a>
                            </li>
                        </ul>
                    </div> <!-- /nav-collapse -->
                </div> <!-- /container -->
            </div> <!-- /navbar-inner -->
        </div> <!-- /navbar -->

        <?php if( isset($_GET['acao']) && $_GET['acao'] == 'recuperarsenha' ) { ?>

        <div id="login-container">
            <?php require('actions/recsenha.php'); ?>
            <div id="login-header">
                <h3>Recuperar senha</h3>
            </div> <!-- /login-header -->

            <div id="login-content" class="clearfix">
                <form name="recSenha" method="post" action="">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="username">Informe seu e-mail</label>
                            <div class="controls">
                                <input type="text" class="" name="email" id="username" value="<?php if($recover) { echo $recover; } ?>" />
                            </div>
                        </div><!-- /control-group -->
                    </fieldset>

                    <div class="pull-right">
                        <button type="submit" name="recSenha" class="btn btn-warning btn-large">Resgatar</button>
                    </div>
                </form><!-- /form -->      
            </div> <!-- /login-content -->
        </div><!-- /login-container -->

        <div id="login-extra">
            <p>Voltar ao painel de <a href="index.php">login</a></p>
        </div> <!-- /login-extra -->

        <?php } else { ?>

        <div id="login-container">
            <div id="login-header">
                <h3>Faça seu login</h3>
            </div> <!-- /login-header -->
            
            <div id="login-content" class="clearfix">
                <form name="formLogin" method="post" action="">
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
                            $validaEmail = read('guia_users', "WHERE email_user = '$autEmail'");

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

                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="username">E-mail</label>
                            <div class="controls">
                                <input type="text" class="" name="email" id="username" value="<?php if(isset($email)) { echo $email; } ?>" />
                            </div>
                        </div><!-- /control-group -->

                        <div class="control-group">
                            <label class="control-label" for="password">Senha</label>
                            <div class="controls">
                                <input type="password" class="" name="senha" id="password" value="<?php if(isset($senha)) { echo $senha; } ?>" />
                            </div>
                        </div><!-- /control-group -->
                    </fieldset>
                            
                    <div id="remember-me" class="pull-left">
                        <input type="checkbox" name="remember" id="remember" value="1" <?php if(isset($remember)) echo 'checked="checked"' ?> /> 
                        <label id="remember-label" for="remember">Lembrar senha</label>
                    </div>
                            
                    <div class="pull-right">
                        <button type="submit" name="sendLogin" class="btn btn-warning btn-large">Entrar</button>
                    </div>
                </form><!-- /form -->           
            </div> <!-- /login-content -->
        </div><!-- /form-container -->
                
        <div id="login-extra">
            <p>Esqueceu a senha? <a href="index.php?acao=recuperarsenha">Recuperar</a></p>
        </div> <!-- /login-extra -->

        <?php } ?>

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/app.js"></script>
    </body>
    <?php ob_end_flush();?>
</html>
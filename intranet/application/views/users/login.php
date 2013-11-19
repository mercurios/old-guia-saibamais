<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js ie ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js ie ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->

    <head>
        <meta charset="utf-8">

        <title> Guia saiba mais | Intranet</title>

        <!-- Mobile viewport optimized: j.mp/bplateviewport -->
        <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">

        <!-- Stylles -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
        <style type="text/css">
            @import "http://datatables.github.com/Plugins/integration/bootstrap/2/dataTables.bootstrap.css";
        </style>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css" />
        <!--<link rel="shortcut icon" type="image/x-icon" href="" />-->

        <!--[if lt IE 9]>
         <script src="js/html5shiv.js"></script>
        <![endif]-->
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
                    
                    
                    <div class="row">
                        <p></p>
                        <?php if (isset($msg)) { echo $msg; } ?>
                        <div class="span5 offset4"> <?php echo form_error('email'); ?><?php echo form_error('senha'); ?></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div id="login-wraper">
                <form class="form login-form" method="post" action="<?php echo base_url('users/logar'); ?>">
                    <legend><span class="blue">Intranet</span> Guia Saiba Mais</legend>

                    <div class="body">
                        <label for="email">E-mail </label>
                        <input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>">

                        <label for="senha">Senha </label>
                        <input type="password" name="senha" id="senha" value="<?php echo set_value('senha'); ?>">
                    </div>

                    <div class="footer">
                        <label class="checkbox inline">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> Manter conectado
                        </label>

                        <button type="submit" class="btn btn-success">Login</button>
                    </div>

                </form>
            </div>
        </div>

        <footer class="white navbar-fixed-bottom">
            Esqueceu a senha? <a href="register.html" class="btn btn-black">Recuperar</a>
        </footer>

        <!-- JavaScript -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="http://wbpreview.com/previews/WB0F56883/js/backstretch.min.js"></script>
		<script type="text/javascript">
		    jQuery(document).ready(function($) {
                $.backstretch([
                  "<?php echo base_url('assets/img/bg1.jpg'); ?>", 
                  "http://viajandopelorio.com.br/blog/wp-content/uploads/2013/04/litoral-pernambucano.jpg"
                ], {duration: 5000, fade: 750});
                    
            });
		</script>
    </body>
</html>
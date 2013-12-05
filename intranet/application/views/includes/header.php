<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js ie ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js ie ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->

    <head>
        <meta charset="utf-8">

        <title>Guia saiba mais | Intranet</title>

        <!-- Mobile viewport optimized: j.mp/bplateviewport -->
        <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">

        <!-- Stylles -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="http://datatables.github.com/Plugins/integration/bootstrap/2/dataTables.bootstrap.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/stylle.css" />
        <!--<link rel="shortcut icon" type="image/x-icon" href="" />-->

        <!--[if lt IE 9]>
         <script src="js/html5shiv.js"></script>
        <![endif]-->
    </head>

    <body>

    <div class="topo">
        <div class="container">
            <div class="row">
                <div class="span9">
                    <a href="<?php echo base_url('home') ?>" title=""><img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="" /></a>
                </div>
                <div class="span3">

                    <div class="btn-group margin-topo">
                        <button class="btn btn-large btn-inverse"><i class="icon-user"></i> <?php echo $this->session->userdata('usuario'); ?></button>
                        <button class="btn btn-large btn-inverse dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                        </button>

                        <ul class="dropdown-menu btn-inverse color-white">
                            <!-- Links de menu dropdown -->
                            <li><a href="#" title=""><i class="icon-user margin-icon-right"></i> Perfil </a></li>
                            
                            <li><a href="<?php echo base_url('users/editar') . '/' . $this->session->userdata('id'); ?>" title=""><i class="icon-pencil margin-icon-right"></i> Editar </a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url('users/logoff') ?>" title=""><i class="icon-off margin-icon-right"></i> Sair </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="navbar navbar-static-top navbar-inverse margin-bottom-20">
        <div class="navbar-inner">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <ul class="nav">
                            <li class="active"><a href="<?php echo base_url('home') ?>">Home</a></li>

                            <li class="divider-vertical"></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Restaurantes <b class="caret"></b></a>
                                <ul class="dropdown-menu btn-inverse color-white">
                                    <li><a href="<?php echo base_url('restaurantes/novo') ?>"><i class="icon-plus"></i> Adicionar</a></li>
                                    <li><a href="<?php echo base_url('restaurantes/') ?>"><i class="icon-pencil"></i> Gerenciar</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url('chamadas/listar/restaurante') ?>"><i class="icon-edit"></i> Chamadas</a></li>
                                </ul>
                            </li>

                            <li class="divider-vertical"></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Lanchonetes <b class="caret"></b></a>
                                <ul class="dropdown-menu btn-inverse color-white">
                                    <li><a href="<?php echo base_url('lanchonetes/novo') ?>"><i class="icon-plus"></i> Adicionar</a></li>
                                    <li><a href="<?php echo base_url('lanchonetes/') ?>"><i class="icon-pencil"></i> Gerenciar</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url('chamadas/listar/lanchonete') ?>"><i class="icon-edit"></i> Chamadas</a></li>
                                </ul>
                            </li>

                            <li class="divider-vertical"></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bebidas <b class="caret"></b></a>
                                <ul class="dropdown-menu btn-inverse color-white">
                                    <li><a href="<?php echo base_url('bebidas/novo') ?>"><i class="icon-plus"></i> Adicionar</a></li>
                                    <li><a href="<?php echo base_url('bebidas/') ?>"><i class="icon-pencil"></i> Gerenciar</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url('chamadas/listar/bebida') ?>"><i class="icon-edit"></i> Chamadas</a></li>
                                </ul>
                            </li>

                            <li class="divider-vertical"></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Passeio e lazer <b class="caret"></b></a>
                                <ul class="dropdown-menu btn-inverse color-white">
                                    <li class="nav-header">Locais</li>
                                    <li><a href="<?php echo base_url('locais/novo') ?>"><i class="icon-plus"></i> Adicionar</a></li>
                                    <li><a href="<?php echo base_url('locais/') ?>"><i class="icon-pencil"></i> Gerenciar</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Esportes</li>
                                    <li><a href="<?php echo base_url('esportes/novo') ?>"><i class="icon-plus"></i> Adicionar</a></li>
                                    <li><a href="<?php echo base_url('esportes') ?>"><i class="icon-pencil"></i> Gerenciar</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Rotas para passeio</li>
                                    <li><a href="<?php echo base_url('rotas/novo') ?>"><i class="icon-plus"></i> Adicionar</a></li>
                                    <li><a href="<?php echo base_url('rotas/') ?>"><i class="icon-pencil"></i> Gerenciar</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url('chamadas/listar/lazer') ?>"><i class="icon-edit"></i> Chamadas</a></li>
                                </ul>
                            </li>

                            <li class="divider-vertical"></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Estadias <b class="caret"></b></a>
                                <ul class="dropdown-menu btn-inverse color-white">
                                    <li><a href="<?php echo base_url('estadias/novo') ?>"><i class="icon-plus"></i> Adicionar</a></li>
                                    <li><a href="<?php echo base_url('estadias/') ?>"><i class="icon-pencil"></i> Gerenciar</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url('chamadas/listar/estadia') ?>"><i class="icon-edit"></i> Chamadas</a></li>
                                </ul>
                            </li>

                            <li class="divider-vertical"></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Entretenimentos <b class="caret"></b></a>
                                <ul class="dropdown-menu btn-inverse color-white">
                                    <li><a href="<?php echo base_url('entretenimentos/novo') ?>"><i class="icon-plus"></i> Adicionar</a></li>
                                    <li><a href="<?php echo base_url('entretenimentos/listar') ?>"><i class="icon-pencil"></i> Gerenciar</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url('chamadas/listar/entretenimento') ?>"><i class="icon-edit"></i> Chamadas</a></li>
                                </ul>
                            </li>

                            <li class="divider-vertical"></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Publicidades <b class="caret"></b></a>
                                <ul class="dropdown-menu btn-inverse color-white">
                                    <li><a href="<?php echo base_url('publicidades/novo') ?>"><i class="icon-plus"></i> Adicionar</a></li>
                                    <li><a href="<?php echo base_url('publicidades/listar') ?>"><i class="icon-pencil"></i> Gerenciar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
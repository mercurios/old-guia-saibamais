<?php
ob_start(); session_start();
require('../dts/dbaSis.php');

if (empty($_SESSION['autUser'])) {
    header('Location: index.php');
}
if (isset($_GET['acao']) && $_GET['acao'] == 'sair') {
    session_destroy();
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Guia saiba mais | Painel do Cliente</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <!-- Css Style -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/adminia.css" rel="stylesheet" />
    <link href="css/adminia-responsive.css" rel="stylesheet" />
    <link href="css/pages/dashboard.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: ''
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>

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
                <a class="brand" href="painel.php">Guia Saiba Mais </a>

                <div class="nav-collapse">
                    <ul class="nav pull-right">
                        <li class="divider-vertical"></li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <?php echo $_SESSION['autUser']['nome_user']; ?> <b class="caret"></b>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="painel.php?pg=usuario-novo" title="Novo usuário"><i class="icon-plus-sign"></i> Novo usuário</a></li>
                                <li class="divider"></li>
                                <li><a href="painel.php?pg=usuario-listar" title="Listar usuários"><i class="icon-list"></i> Listar usuários</a></li>
                                <li class="divider"></li>
                                <li><a href="painel.php?acao=sair" title="Sair"><i class="icon-off"></i> Sair</a></li>
                            </ul>
                        </li>
                        <li class="divider-vertical"></li>
                    </ul>
                </div> <!-- /nav-collapse -->
            </div> <!-- /container -->
        </div> <!-- /navbar-inner -->
    </div> <!-- /navbar -->

    <div id="content">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <?php require('includes/menu.php'); ?>
                </div> <!-- /span12 -->
            </div> <!-- /row -->

            <div class="row">
                <?php
                    if(empty($_GET['pg'])){
                        require('pages/home.php');
                    }elseif(file_exists('pages/' . $_GET['pg'].'.php')){
                        require('pages/' . $_GET['pg'].'.php');
                    }else{
                       echo '
                        <div class="span12">
                            <div class="row">

                                <div class="span12">
                                    <div class="widget">
                                        <div class="widget-header">
                                            <h3>Ops, Erro 404</h3>
                                        </div><!-- /widget-header -->

                                        <div class="widget-content">
                                            <p class="text-error">Página solicitada não existe! :\'(</p>
                                        </div><!-- /widget-content -->
                                    </div><!-- /widget -->
                                </div><!-- /span12 -->
                            </div><!-- /row -->
                        </div><!-- /span12 -->
                        ';    
                    }
                ?>
            </div><!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /content -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
    <script src="js/input.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/tinymce/tinymce.min.js"></script>
    <script src="js/datatable/js/jquery.dataTables.min.js"></script>
    <script src="js/jquery.jqEasyCharCounter.min.js"></script>
    <script src="js/app.js"></script>
    
    <script type="text/javascript">
    tinymce.init({
        selector: ".editorTiny",
        height : 200,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
        ],
        toolbar: "insertfile undo redo | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
    });
    </script>
</body>
    <?php ob_end_flush();?>
</html>
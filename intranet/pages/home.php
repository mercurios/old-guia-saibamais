    <div class="span12">
        <div class="row">
            <div class="span6">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Acessos</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                        <div id="chart_div"></div>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span6 -->

            <div class="span6">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Acessos</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                        <div id="chart_div2"></div>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span6 -->
        </div><!-- /row -->

        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Últimas ações no sistema</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                    <?php  
                    $readLog = read('guia_logs', "ORDER BY id_log DESC LIMIT 10");

                    if ($readLog) { 
                    ?>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Usuário</th>
                                <th>Data / Hora</th>
                                <th>IP</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($readLog as $log) { ?>
                            <tr>
                                <td><?php echo $log['id_log']; ?></td>
                                <td><?php echo ($log['user_log'] == '') ? 'Desconhecido' : $log['user_log']; ?></td>
                                <td><?php echo formDate($log['hora_log']); ?></td>
                                <td><?php echo $log['ip_log']; ?></td>
                                <td><?php echo $log['msg_log']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <a href="painel.php?pg=log-completo" class="btn pull-right" title="Ver log completo">Visualizar log completo</a>

                    <?php
                    }
                    else {
                        message('Nenhum registro no momento.', 'info');
                    }
                    ?>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
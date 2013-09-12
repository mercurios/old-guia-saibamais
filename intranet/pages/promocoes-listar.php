    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Listar promoções</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                        <?php
                        $_categoria = $_GET['categoria'];
                        $_idcliente = $_GET['idcliente'];

                        if (empty($_idcliente) || empty($_categoria)) {
                            header('Location: painel.php');
                        }
                        ?>
                        <table id="" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="50">#</th>
                                    <th>Titulo</th>
                                    <th>Data de início</th>
                                    <th>Data de finalização</th>
                                    <th>Dia da semana</th>
                                    <th width="120">
                                        <a href="painel.php?pg=promocoes-nova&idcliente=<?php echo $_idcliente; ?>&categoria=<?php echo $_categoria; ?>" class="btn btn-small btn-success pull-right" title="Adicionar promoção"> 
                                            <i class="icon-plus"></i> Nova promoção
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                $readPromo = read('guia_promocoes', "WHERE id_cliente = '$_idcliente' && categoria_promocao = '$_categoria'");

                                if ($readPromo) {
                                    foreach ($readPromo as $promo) {
                                ?>
                                <tr>
                                    <td><?php echo $promo['id_promocao']; ?></td>
                                    <td><?php echo $promo['titulo_promocao']; ?></td>
                                    <td><?php echo formDate($promo['data_inicio']); ?></td>
                                    <td><?php echo formDate($promo['data_final']); ?></td>
                                    <td><?php echo $promo['dia_semana']; ?></td>
                                    <td class="action-td">
                                        <a href="#" class="tool btn btn-small btn-warning" title="Editar promoção" data-placement="right" rel="tooltip">
                                            <i class="icon-pencil"></i>      
                                        </a>

                                        <a href="#" class="tool btn btn-small btn-danger" title="Excluir promoção" data-placement="right" rel="tooltip">
                                            <i class="icon-remove"></i>   
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                else {
                                    message('Nenhuma promoção cadastrada para esse cliente.', 'warning');
                                }
                                ?>
                            </tbody>
                        </table>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
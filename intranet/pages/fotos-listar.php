    <div class="span12">
        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Listar fotos</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                        <?php  
                        $_cliente   = $_GET['idcliente'];
                        $_categoria = $_GET['categoria'];
                        $_idfoto    = $_GET['idfoto'];
                        $_foto      = $_GET['name'];

                        if (empty($_cliente) || empty($_categoria)) {
                            header('Location: painel.php');
                        }

                        if (isset($_idfoto)) {
                            delete('guia_fotos', "id_foto = '$_idfoto'");
                            unlink ("../uploads/fotos/".$_foto);
                        }

                        ?>
                    	<table id="tabela" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th width="100">
                                        <a href="painel.php?pg=fotos-nova&categoria=<?php echo $_categoria; ?>&cliente=<?php echo $_cliente; ?>" class="btn btn-small btn-success" title="Adicionar novo cliente"> <i class="icon-plus"></i> Enviar foto</a>
                                    </th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                $readFotos = read('guia_fotos', "WHERE categoria_foto = '$_categoria' && id_cliente = '$_cliente'");

                                if (isset($readFotos)) {
                                    foreach ($readFotos as $foto) {
                                ?>
                                <tr>
                                    <td><?php echo $foto['id_foto']; ?></td>
                                    <td><?php echo $foto['titulo_foto']; ?></td>
                                    <td class="action-td">
                                        <!-- Button to trigger modal -->
                                        <a href="#<?php echo md5($foto['id_foto']); ?>" role="button" class="btn" data-toggle="modal">ver</a>
                                        <a href="painel.php?pg=fotos-listar&idfoto=<?php echo $foto['id_foto']; ?>&categoria=<?php echo $foto['categoria_foto']; ?>&idcliente=<?php echo $foto['id_cliente']; ?>&name=<?php echo $foto['img_foto']; ?>" class="tool btn btn-small btn-danger" title="Excluir teatro" data-placement="right" rel="tooltip">
                                            <i class="icon-remove"></i>     
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div id="<?php echo md5($foto['id_foto']); ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 id="myModalLabel"><?php echo $foto['titulo_foto']; ?></h3>
                                    </div>

                                    <div class="modal-body">
                                        <img src="../uploads/fotos/<?php echo $foto['img_foto']; ?>" width="525" title="<?php echo $foto['titulo_foto']; ?>" />
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
                                    </div>
                                </div>

                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
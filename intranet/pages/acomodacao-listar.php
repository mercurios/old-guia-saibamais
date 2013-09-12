    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Listar pratos</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                        <?php  

                        $_categoria = $_GET['categoria'];
                        $_idcliente = $_GET['idcliente'];

                        if (isset($_GET['delete'])) {
                            $delete = $_GET['delete'];
                            delete('guia_acomodacoes', "id_acomodacao = '$delete'");
                        }

                        if (empty($_idcliente) || empty($_categoria)) {
                            header('Location: painel.php');
                        }

                        $readPratos = read('guia_acomodacoes', "WHERE id_cliente = '$_idcliente'");
                        ?>
                        <table id="tabela" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Fotos</th>
                                    <th width="100">
                                        <a href="painel.php?pg=acomodacao-nova&categoria=<?php echo $_categoria; ?>&idcliente=<?php echo $_idcliente; ?>" class="btn btn-small pull-right btn-success" title="novo prato"> 
                                            <i class="icon-plus"></i> Nova acomodação
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            
                            <tbody>
                        <?php
                        if ($readPratos) {
                            foreach ($readPratos as $prato) {
                            ?>

                                <tr>
                                    <td><?php echo $prato['id_acomodacao']; ?></td>
                                    <td><?php echo $prato['nome_acomodacao']; ?></td>
                                    <td><a href="painel.php?pg=fotos-listar&categoria=acomodacao&idcliente=<?php echo $prato['id_acomodacao']; ?>" class="btn btn-small" title="Fotos do local">Listar fotos</a></td>
                                    <td class="action-td">
                                        <a href="painel.php?pg=acomodacao-editar&id=<?php echo $prato['id_acomodacao']; ?>" class="btn btn-small btn-warning" title="Excluir restaurante">
                                            <i class="icon-pencil"></i>
                                        </a>
                                        <a href="painel.php?pg=acomodacaos-listar&delete=<?php echo $prato['id_acomodacao']; ?>&categoria=<?php echo $_categoria; ?>&idcliente=<?php echo $_idcliente; ?>" class="btn btn-small btn-danger" title="Excluir restaurante">
                                            <i class="icon-remove"></i>
                                        </a>
                                    </td>
                                </tr>
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
    <div class="span12">
        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Listar exposições</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                    	<table id="tabela" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Nome</th>
									<th>Opções</th>
									<th><a href="painel.php?pg=feiraevento-novo" class="btn btn-small btn-success" title="Adicionar novo cliente"> <i class="icon-plus"></i> Novo</a></th>
								</tr>
							</thead>
							
							<tbody>
                                <?php  
                                if (isset($_GET['delete'])) {
                                    $_delete = $_GET['delete'];
                                    delete('guia_feiraeventos', "id_feiraevento = '$_delete'");
                                }


                                $readExpo = read('guia_feiraeventos');

                                if ($readExpo) {
                                    foreach ($readExpo as $expo) {
                                ?>

								<tr>
									<td><?php echo $expo['id_feiraevento']; ?></td>
									<td><?php echo $expo['nome_feiraevento']; ?></td>
									<td>
										<div class="btn-group">									
											<a href="painel.php?pg=fotos-listar&categoria=feiraevento&idcliente=<?php echo $expo['id_feiraevento']; ?>" class="btn btn-small" title="Fotos do local">Listar fotos</a>
										</div>
									</td>
									<td class="action-td">
										<a href="painel.php?pg=feiraevento-editar&id=<?php echo $expo['id_feiraevento']; ?>" class="tool btn btn-small btn-warning" title="Editar cinema" data-placement="right" rel="tooltip">
											<i class="icon-pencil"></i>			
										</a>
										<a href="painel.php?pg=feiraevento-listar&delete=<?php echo $expo['id_feiraevento']; ?>" class="tool btn btn-small btn-danger" title="Excluir cinema" data-placement="right" rel="tooltip">
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
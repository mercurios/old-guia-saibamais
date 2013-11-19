    <div class="span12">
        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Listar teatros</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                    	<table id="tabela" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Nome</th>
									<th>Endereço</th>
									<th>Opções</th>
									<th><a href="painel.php?pg=teatro-novo" class="btn btn-small btn-success" title="Adicionar novo cliente"> <i class="icon-plus"></i> Novo</a></th>
								</tr>
							</thead>
							
							<tbody>
                                <?php  

                                $readTeatro = read('guia_teatros');

                                if ($readTeatro) {
                                    foreach ($readTeatro as $teatro) {
                                ?>

								<tr>
									<td><?php echo $teatro['id_teatro']; ?></td>
									<td><?php echo $teatro['nome_teatro']; ?></td>
									<td><?php echo $teatro['rua_teatro'] . ', ' . $teatro['num_teatro'] . ', ' . $teatro['bairro_teatro'] . ' - ' . $teatro['cidade_teatro']; ?></td>
									<td>
										<div class="btn-group">									
											<a href="painel.php?pg=peca-listar&idcliente=<?php echo $teatro['id_teatro']; ?>" class="tool btn" title="Listar peças" data-placement="top" rel="tooltip"><i class="icon-film"></i></a>
											<a href="painel.php?pg=fotos-listar&categoria=teatro&idcliente=<?php echo $teatro['id_teatro']; ?>" class="tool btn" title="Galeria de imagens" data-placement="top" rel="tooltip"><i class="icon-camera"></i></a>
										</div>
									</td>
									<td class="action-td">
										<a href="painel.php?pg=teatro-editar&id=<?php echo $teatro['id_teatro']; ?>" class="tool btn btn-small btn-warning" title="Editar teatro" data-placement="right" rel="tooltip">
											<i class="icon-pencil"></i>			
										</a>
										<a href="#" class="tool btn btn-small btn-danger" title="Excluir teatro" data-placement="right" rel="tooltip">
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
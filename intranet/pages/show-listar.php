    <div class="span12">
        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Listar shows</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                    	<table id="tabela" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Nome</th>
									<th>Opções</th>
									<th><a href="painel.php?pg=show-novo" class="btn btn-small btn-success" title="Adicionar novo cliente"> <i class="icon-plus"></i> Novo</a></th>
								</tr>
							</thead>
							
							<tbody>
								<?php

								if (isset($_GET['delete'])) {
									$delete = $_GET['delete'];
									delete('guia_shows', "id_show = '$delete'");
								}

								$readShow = read('guia_shows');

								if ($readShow) {
									foreach ($readShow as $show) {
								?>
								<tr>
									<td><?php echo $show['id_show']; ?></td>
									<td><?php echo $show['nome_show']; ?></td>
									<td>
										<div class="btn-group">									
											<a href="painel.php?pg=fotos-listar&categoria=show&idcliente=<?php echo $show['id_show']; ?>" class="tool btn" title="Fotos" data-placement="top" rel="tooltip"><i class="icon-camera"></i></a>
										</div>
									</td>
									<td class="action-td">
										<a href="painel.php?pg=show-editar&id=<?php echo $show['id_show']; ?>" class="tool btn btn-small btn-warning" title="Editar show" data-placement="right" rel="tooltip">
											<i class="icon-pencil"></i>			
										</a>
										<a href="painel.php?pg=show-listar&delete=<?php echo $show['id_show']; ?>" class="tool btn btn-small btn-danger" title="Excluir cinema" data-placement="right" rel="tooltip">
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
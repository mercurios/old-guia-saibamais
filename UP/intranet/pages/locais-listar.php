<div class="span12">
    <div class="row">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <h3>Listar locais</h3>
                </div><!-- /widget-header -->

                <div class="widget-content">
                	<table id="tabela" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Nome</th>
								<th>Endereço</th>
								<th>Fotos</th>
								<th width="110">
									<a href="painel.php?pg=locais-novo" class="btn tool btn-small pull-right btn-success" data-placement="right" rel="tooltip" title="Adicionar novo local"> 
										<i class="icon-plus"></i> Novo local
									</a>
								</th>
							</tr>
						</thead>
						
						<tbody>
							<?php

							if (isset($_GET['delete'])) {
								$delete = $_GET['delete'];
								delete('guia_locais', "id_local = '$delete'");
							}

							$readLocal = read('guia_locais');

							if ($readLocal) {
								foreach ($readLocal as $local) {
							?>

							<tr>
								<td><?php echo $local['id_local']; ?></td>
								<td><?php echo $local['nome_local']; ?></td>
								<td><?php echo $local['rua_local'] . ' - ' .$local['bairro_local'] ; ?></td>
								<td><a href="painel.php?pg=fotos-listar&categoria=locais&idcliente=<?php echo $local['id_local']; ?>" class="btn btn-small" title="Fotos do local">Listar fotos</a></td>
								<td class="action-td">
									<a href="painel.php?pg=locais-editar&id=<?php echo $local['id_local']; ?>" class="tool btn btn-small btn-warning" title="Editar local" data-placement="right" rel="tooltip">
										<i class="icon-pencil"></i>
									</a>

									<a href="painel.php?pg=locais-listar&delete=<?php echo $local['id_local']; ?>" class="tool btn btn-small btn-danger" title="Excluir local" data-placement="right" rel="tooltip">
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
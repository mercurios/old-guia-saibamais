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
									<a href="painel.php?pg=esporte-novo" class="btn tool btn-small pull-right btn-success" data-placement="right" rel="tooltip" title="Adicionar novo esporte"> 
										<i class="icon-plus"></i> Novo esporte
									</a>
								</th>
							</tr>
						</thead>
						
						<tbody>
							<?php

							if (isset($_GET['delete'])) {
								$delete = $_GET['delete'];
								delete('guia_esportes', "id_esporte = '$delete'");
							}

							$readesporte = read('guia_esportes');

							if ($readesporte) {
								foreach ($readesporte as $esporte) {
							?>

							<tr>
								<td><?php echo $esporte['id_esporte']; ?></td>
								<td><?php echo $esporte['nome_esporte']; ?></td>
								<td><?php echo $esporte['rua_esporte'] . ' - ' .$esporte['bairro_esporte'] ; ?></td>
								<td><a href="painel.php?pg=fotos-listar&categoria=esporte&idcliente=<?php echo $esporte['id_esporte']; ?>" class="btn btn-small" title="Fotos do esporte">Listar fotos</a></td>
								<td class="action-td">
									<a href="painel.php?pg=esporte-editar&id=<?php echo $esporte['id_esporte']; ?>" class="tool btn btn-small btn-warning" title="Editar esporte" data-placement="right" rel="tooltip">
										<i class="icon-pencil"></i>
									</a>

									<a href="painel.php?pg=esporte-listar&delete=<?php echo $esporte['id_esporte']; ?>" class="tool btn btn-small btn-danger" title="Excluir esporte" data-placement="right" rel="tooltip">
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
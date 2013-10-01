    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">                    
                    <div class="widget-header">
                        <h3>Listar lanchonetes</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                    	<?php  $_idcliente = $_GET['idcliente']; ?>
                    	<table id="tabela" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Nome</th>
									<th><a href="painel.php?pg=filme-novo&idcliente=<?php echo $_idcliente; ?>" class="btn btn-small btn-success" title="Adicionar novo cliente"> <i class="icon-plus"></i> Novo</a></th>
								</tr>
							</thead>
							
							<tbody>
								<?php 
								$readFilme = read('guia_filmes', "WHERE id_filme = '$_idcliente'"); 

		                    	if ($readFilme) {
		                    		foreach ($readFilme as $filme) {
		                    	?>

								<tr>
									<td><?php echo $filme['id_filme']; ?></td>
									<td><?php echo $filme['titulo_filme']; ?></td>
									<td class="action-td">
										<a href="painel.php?pg=filme-editar&id=<?php echo $filme['id_filme']; ?>" class="tool btn btn-small btn-warning" title="Editar cinema" data-placement="right" rel="tooltip">
											<i class="icon-pencil"></i>			
										</a>
										<a href="#" class="tool btn btn-small btn-danger" title="Excluir cinema" data-placement="right" rel="tooltip">
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
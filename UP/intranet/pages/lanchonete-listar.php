    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Listar lanchonetes</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                    	<table id="tabela" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Nome</th>
									<th>Endereço</th>
									<th>Opções</th>
									<th>Status</th>
									<th width="130">
										<a href="painel.php?pg=lanchonete-novo" class="btn tool btn-small pull-right btn-success" data-placement="right" rel="tooltip" title="Adicionar nova lanchonete"> 
											<i class="icon-plus"></i> Nova lanchonete
										</a>
									</th>
								</tr>
							</thead>
							
							<tbody>
								<?php 
								$readRest = read('guia_lanchonetes');

								if (isset($readRest)) {
									foreach ($readRest as $rest) {
								?>
								<tr>
									<td><?php echo $rest['id_lanchonete']; ?></td>
									<td><?php echo $rest['nome_lanchonete']; ?></td>
									<td><?php echo $rest['bairro_lanchonete'] . ' - ' . $rest['cidade_lanchonete']; ?></td>
									<td>
										<div class="btn-group">									
											<a href="painel.php?pg=videos-listar&categoria=lanchonete&idcliente=<?php echo $rest['id_lanchonete']; ?>" class="tool btn" title="Vídeos" data-placement="top" rel="tooltip"><i class="icon-film"></i></a>
											<a href="painel.php?pg=fotos-listar&categoria=lanchonete&idcliente=<?php echo $rest['id_lanchonete']; ?>" class="tool btn" title="Fotos" data-placement="top" rel="tooltip"><i class="icon-camera"></i></a>
											<a href="painel.php?pg=cardapios-listar&categoria=lanchonete&idcliente=<?php echo $rest['id_lanchonete']; ?>" class="tool btn" title="Cardápio" data-placement="top" rel="tooltip"><i class="icon-list"></i></a>
											<a href="painel.php?pg=promocoes-listar&idcliente=<?php echo $rest['id_lanchonete']; ?>&categoria=lanchonete" class="tool btn" title="Promoções" data-placement="top" rel="tooltip"><i class="icon-thumbs-up"></i></a>
											<a href="painel.php?pg=lanchonete-editar&id=<?php echo $rest['id_lanchonete']; ?>" class="tool btn" title="Editar Informações" data-placement="top" rel="tooltip"><i class="icon-info-sign"></i></a>
										</div>
									</td>
									<td>Ativo</td>
									<td class="action-td">
										<a href="painel.php?pg=lanchonete-listar&acao=delete" class="tool btn btn-small btn-danger" title="Excluir lanchonete" data-placement="right" rel="tooltip">
											<i class="icon-remove"></i>	Excluir lanchonete
										</a>
									</td>
								</tr>
								<?php
									}
								}
								else {
									message('<strong>Não foi encontrado registro de lanchonetes.</strong>');
								}
								?>
							</tbody>
						</table>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
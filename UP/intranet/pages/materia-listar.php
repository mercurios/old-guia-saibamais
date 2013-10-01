    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Matérias sobre <?php echo ($_GET['categoria'] == 'passeiolazer') ? 'passeio e lazer' : $_GET['categoria']; ?></h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                        <?php $_categoria = $_GET['categoria']; ?>
                    	<table id="tabela" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Titulo</th>
									<th width="110">
										<a href="painel.php?pg=materia-novo&categoria=<?php echo $_categoria; ?>" class="btn tool btn-small pull-right btn-success" data-placement="right" rel="tooltip" title="Adicionar nova matéria"> 
											<i class="icon-plus"></i> Nova matéria
										</a>
									</th>
								</tr>
							</thead>
							
							<tbody>
                            <?php  
                            if (isset($_GET['delete'])) {
                                $delete = $_GET['delete'];
                                delete('guia_chamadas', "id_chamada = '$delete'");
                            }

                            if (empty($_categoria)) {
                                header('Location: painel.php');
                            }

                            $readChamada = read('guia_chamadas', "WHERE categoria_chamada = '$_categoria'");

                            if (isset($readChamada)) {
                                foreach ($readChamada as $chamada) {
                            ?>
								<tr>
									<td><?php echo $chamada['id_chamada']; ?></td>
									<td><?php echo $chamada['titulo_chamada']; ?></td>
									<td class="action-td">
                                        <a href="painel.php?pg=materia-editar&categoria=<?php echo $_categoria; ?>&id=<?php echo $chamada['id_chamada']; ?>" class="btn tool btn-small btn-warning" title="Editar matéria" data-placement="left" rel="tooltip">
                                            <i class="icon-pencil"></i>
                                        </a>
										<a href="painel.php?pg=materia-listar&categoria=<?php echo $_categoria; ?>&delete=<?php echo $chamada['id_chamada']; ?>" class="btn tool btn-small btn-danger" title="Excluir matéria" data-placement="right" rel="tooltip">
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
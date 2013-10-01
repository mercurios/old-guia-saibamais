    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Frases</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                    	<table id="tabela" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Titulo</th>
                                    <th>Autor</th>
                                    <th>Dia da semana</th>
									<th>Editar</th>
								</tr>
							</thead>
							
							<tbody>
                                <?php $readFrases = read('guia_frases'); foreach ($readFrases as $frase) { ?>
								<tr>
									<td><?php echo $frase['id_frase']; ?></td>
									<td><?php echo $frase['titulo_frase']; ?></td>
                                    <td><?php echo $frase['autor_frase']; ?></td>
                                    <td><?php echo $frase['dia_frase']; ?></td>
									<td class="action-td">
                                        <a href="painel.php?pg=frase-editar&id=<?php echo $frase['id_frase']; ?>" class="btn tool btn-small btn-warning" title="Editar frase" data-placement="right" rel="tooltip">
                                            <i class="icon-pencil"></i>
                                        </a>
									</td>
								</tr>
                                <?php  } ?>
							</tbody>
						</table>
                        
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
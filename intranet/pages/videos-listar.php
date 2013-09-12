    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Listar vídeos</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                    	<?php  
						$_categoria = $_GET['categoria'];
						$_idcliente = $_GET['idcliente'];

						if (isset($_GET['delete'])) {
							$id = $_GET['delete'];
							delete('guia_videos', "id_video = '$id'");
						}

						$readVideos = read('guia_videos', "WHERE categoria_video = '$_categoria' && id_cliente = '$_idcliente'");

						if ($readVideos) {
						?>
                    	<table id="tabela" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Titulo do vídeo</th>
									<th>Link do vídeo</th>
								</tr>
							</thead>
							
							<tbody>
								<?php
									foreach ($readVideos as $video) {
								?>
								<tr>
									<td><?php echo $video['id_video'] ?></td>
									<td><?php echo $video['titulo_video'] ?></td>
									<td><?php echo $video['link_video'] ?></td>
									<td class="action-td">
										<a href="painel.php?pg=videos-editar&idvideo=<?php echo $video['id_video'] ?>" class="tool btn btn-small btn-warning" title="Editar vídeo" data-placement="right" rel="tooltip">
											<i class="icon-pencil"></i>
										</a>
										<a href="painel.php?pg=videos-listar&delete=<?php echo $video['id_video'] ?>" class="tool btn btn-small btn-danger" title="Excluir vídeo" data-placement="right" rel="tooltip">
											<i class="icon-remove"></i>
										</a>
									</td>
								</tr>
							</tbody>
						</table>

						<?php
							}
						}
						else {
							echo '<p>O cliente ainda não tem vídeo cadastrado, <a href="painel.php?pg=videos-novo&categoria='.$_categoria.'&idcliente='.$_idcliente.'" title="Cadastrar agora">cadastrar agora?</a></p>';
						}
						?>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
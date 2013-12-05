<?php if (!empty($msg)) : echo $msg; endif; ?>
<div class="row">
	<div class="span12">
		<div class="widget">
			<div class="widget-head">
				<button href="#myModal" role="button" class="btn btn-success pull-right" data-toggle="modal" <?php if (count($fotos) >= 20 ) { echo 'disabled'; }?>>Enviar foto</button>
				<div class="pull-left"><i class="icon-list"></i> Fotos do cliente</div>
				<div class="widget-icons pull-right">
					<!-- Modal -->
					<form name="newFoto" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('fotos/upload') ?>">
						<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h3 id="myModalLabel">Adicionar uma nova foto</h3>
							</div>
							<div class="modal-body">
									<div class="span5">
										<label>Logo: 
											<span class="badge badge-info tool" 
											title="Atenção: Só são permitidos imagens de no máximo 2MB, caso o tamanho exceda ou voçê tente enviar outro arquivo que não seja imagem, o programa altomaticamente irá salva sua imagem como NULA." 										data-placement="top" rel="popover"><i class="icon-info"></i></span>
										</label>
										<input type="file" name="foto" class="filestyle" data-buttonText="Selecionar aquivo">
									</div>

									<div class="span5">
										</br>
										<label>Titulo da foto</label>
										<input type="text" name="titulo" value="" class="input-block-level" />
										<input type="hidden" name="categoria" value="<?php echo $this->uri->segment(3); ?>" />
										<input type="hidden" name="idCliente" value="<?php echo $this->uri->segment(4); ?>" />
									</div>
							</div>
							<div class="modal-footer">
								<button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
								<input type="submit" class="btn btn-primary" name="sendFoto" value="Enviar foto">
							</div>
						</div>
					</form>
				</div>  
				<div class="clearfix"></div>
			</div>

			<div class="widget-content">
				<div class="padd">
					<div class="row padding-left-110">
						<ul class="thumbnails">
						<?php 
						if (!empty($fotos)) 
						{
							foreach ($fotos as $foto)
							{
						?>
							<li class="span2">
								<div class="thumbnail">
									<a href="#" class="thumbnail inner-border">
										<span></span>
										<?php echo image_thumb('../uploads/fotos/' . $foto->img_foto, 163, 121 ); ?>
										<div class="caption">
											<p><?php echo character_limiter($foto->titulo_foto, 15); ?></p>
											<p>
												<?php  
												if ($foto->status_foto == 1)
												{
													echo '<a href="'. base_url('fotos/status/ativada') . '/' . $foto->id_foto . '/' . $foto->categoria_foto . '/' . $foto->id_cliente . '/' .'" title="" class="btn btn-warning"> Desativar </a>';
												}
												else
												{
													echo '<a href="'. base_url('fotos/status/desativada') . '/' . $foto->id_foto . '/' . $foto->categoria_foto . '/' . $foto->id_cliente . '/' .'" title="" class="btn"> Ativar </a>';
												}
												?>
												<button href="#confirm<?php echo $foto->id_foto ?>" role="button" class="btn btn-danger" data-toggle="modal"><i class="icon-remove"></i></button>
											</p>
										</div>
									</a>
								</div>
							</li>

							<div id="confirm<?php echo $foto->id_foto ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h3 id="myModalLabel">Você deseja deletar essa imagem?</h3>
									<h4><?php echo $foto->titulo_foto ?></h4>
								</div>
								<div class="modal-body">
										<div class="span5">
											<?php echo image_thumb('../uploads/fotos/' . $foto->img_foto, 500, 300 ); ?>
										</div>
								</div>
								<div class="modal-footer">
									<a href="<?php echo base_url('fotos/deletar') . '/' . $foto->id_foto . '/' . $foto->categoria_foto . '/' . $foto->id_cliente . '/' . $foto->img_foto ?>" title="" class="btn btn-success">Sim, desejo deletar</a>
									<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Não</button>
								</div>
							</div>
						<?php
							}
						}
						else
						{
							echo '<p class="text-error">O cliente ainda não possue nenhuma foto.</p>';
						} 
						?>
						</ul>
					</div>
				</div><!-- Padd -->

				<div class="widget-foot">
					<p class="">Só são permitido <strong>10</strong> fotos ativadas. (<?php echo count($fotos); ?> de 20 fotos permitidas.) </p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<form name="edtlanchonete" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('chamadas/update') ?>">
		<div class="span12">
			<?php if (isset($msg)) : echo $msg; endif; ?>
			<div class="widget">
				<div class="widget-head">
					<div class="pull-left"><i class="icon-pencil"></i> Editar chamada</div>
					<div class="widget-icons pull-right"></div>  
					<div class="clearfix"></div>
				</div>

				<div class="widget-content padding-left-35">
					<div class="padd">
						<?php if (!empty($chamada)) { foreach ($chamada as $res) : ?>
							<div class="row">
								<div class="span11">
									<label class="titulo-separator">Informações Básicas</label>
								</div>

								<div class="span2">
									<span class="thumbnail">
										<?php echo $this->biblioteca->image_thumb('../uploads/chamadas/' . $res->img_chamada, 250, 200 ); ?>
									</span>
								</div>

								<div class="span3">
									<label>Nova imagem: 
										<span class="badge badge-info tool" 
										title="Atenção: Só são permitidos imagens de no máximo 2MB, caso o tamanho exceda ou voçê tente enviar outro arquivo que não seja imagem, o programa altomaticamente irá salva sua imagem como NULA." data-placement="top" rel="popover"><i class="icon-info"></i></span>
									</label>
									<input type="file" name="logo" class="filestyle" data-input="false" data-buttonText="Selecionar uma nova imagem">
								</div>

								<span class="span6">
									<label for="nome">Titulo: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('titulo'); ?></span></small></label>
									<input type="text" class="input-block-level" id="titulo" name="titulo" value="<?php echo $res->titulo_chamada ?>" />
								</span>

								<div class="span9">
									</br>
									<label for="nome">Link: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('link'); ?></span></small></label>
									<input type="text" class="input-block-level" id="link" name="link" value="<?php echo $res->link_chamada ?>" />										
								</div>

								<div class="span11">
									</br>
									<label>Descrição: <span class="text-error">*</span><small><span class="text-error"><?php echo form_error('descricao'); ?></span></small></label>
									<textarea class="input-block-level" rows="5" name="descricao"><?php echo $res->desc_chamada ?></textarea>
								</div>

							</div>
						</div>
					</div><!-- Padd -->

					<div class="widget-foot">
						<input type="hidden" name="id" value="<?php echo $res->id_chamada ?>">
						<input type="hidden" name="imgAtual" value="<?php echo $res->img_chamada ?>">
						<input type="submit" class="btn btn-success pull-right" name="cadastrar" value="Atualizar chamada" />
						<p>Os campos marcados com <strong>(*)</strong>, são obrigatórios.</p>
					</div>
					<?php endforeach; } else { echo 'Não existe lanchonete com o ID informado.'; } ?>
				</div>
			</div>
		</div>
	</form>
</div>
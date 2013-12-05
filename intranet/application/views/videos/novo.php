<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button>
	O cliente ainda não tem nenhum vídeo cadastrado, cadastre um agora.
</div>
<div class="row">
	<form name="updateUser" class="form-horizontal" method="post" action="<?php echo base_url('videos/save') ?>">
		<div class="span12">
			<div class="widget">
				<div class="widget-head">
					<div class="pull-left"><i class="icon-plus"></i> Cadastrar vídeo</div>
					<div class="widget-icons pull-right"></div>  
					<div class="clearfix"></div>
				</div>

				<div class="widget-content">
					<div class="padd">
							<div class="row">
								<div class="span12">
									<div class="control-group">
					    				<label for="titulo" class="control-label">Título do vídeo: <span class="text-error">*</span></label>
					    				<div class="controls">
					    					<input class="span6" name="titulo" type="text" value="<?php echo set_value('titulo'); ?>" id="titulo">
					    					<span class="help-inline"><p class="text-error"><strong><?php echo form_error('titulo'); ?></strong></p></span>
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="link" class="control-label">Link do youtube: <span class="text-error">*</span></label>
					    				<div class="controls">
					    					<input class="span6" name="link" type="text" value="<?php echo set_value('link'); ?>" id="link">
					    					<span class="help-inline"><p class="text-error"><strong><?php echo form_error('link'); ?></strong></p></span>
					    				</div>
					    			</div>
								</div>
							</div>
					</div><!-- Padd -->

					<div class="widget-foot">
						<input type="hidden" name="categoria" value="<?php echo $categoria ?>" />
						<input type="hidden" name="idCliente" value="<?php echo $idCliente ?>" />
						<input type="submit" class="btn btn-success pull-right" name="atualizar" value="Atualizar vídeo" />
						<p class="">Os campos com <strong>(*)</strong>, são obrigatórios.</p>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
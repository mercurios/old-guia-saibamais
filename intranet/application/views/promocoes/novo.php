<div class="row">
	<form name="newRestaurante" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('promocoes/save') ?>">
		<div class="span12">
			<div class="widget">
				<div class="widget-head">
					<div class="pull-left"><i class="icon-plus"></i> Adicionar promoção</div>
					<div class="widget-icons pull-right"></div>  
					<div class="clearfix"></div>
				</div>

				<div class="widget-content">
					<div class="padd">
							<div class="row">
								<div class="span12">
									<div class="control-group">
					    				<label for="titulo" class="control-label">Imagem: <span class="text-error">*</span></label>
					    				<div class="controls">
											<input type="file" name="imagem" class="filestyle" data-buttonText="Selecionar aquivo">
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="titulo" class="control-label">Titulo da promoção: <span class="text-error">*</span></label>
					    				<div class="controls">
					    					<input class="span7" name="titulo" type="text" value="" id="titulo">
					    					<span class="help-inline"><p class="text-error"><strong><?php echo form_error('titulo'); ?></strong></p></span>
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="dataInicio" class="control-label">Data de início: </label>
					    				<div class="controls">
					    					<input class="span7" name="dataInicio" type="text" value="" id="dataInicio">
					    					<span class="help-inline"><p class="text-error"><strong></strong></p></span>
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="dataFinal" class="control-label">Data final: </label>
					    				<div class="controls">
					    					<input class="span7" name="dataFinal" type="text" value="" id="dataFinal">
					    					<span class="help-inline"><p class="text-error"><strong></strong></p></span>
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="diaSemana" class="control-label">Por dia: </label>
					    				<div class="controls">
					    					<label class="checkbox inline">
												<input type="checkbox" id="diaSemana" name="diaSemana[]" value="Segunda"> Segunda
											</label>

											<label class="checkbox inline">
												<input type="checkbox" id="diaSemana" name="diaSemana[]" value="Terça"> Terça
											</label>

											<label class="checkbox inline">
												<input type="checkbox" id="diaSemana" name="diaSemana[]" value="Quarta"> Quarta
											</label>

											<label class="checkbox inline">
												<input type="checkbox" id="diaSemana" name="diaSemana[]" value="Quinta"> Quinta
											</label>

											<label class="checkbox inline">
												<input type="checkbox" id="diaSemana" name="diaSemana[]" value="Sexta"> Sexta
											</label>

											<label class="checkbox inline">
												<input type="checkbox" id="diaSemana" name="diaSemana[]" value="Sábado"> Sábado
											</label>

											<label class="checkbox inline">
												<input type="checkbox" id="diaSemana" name="diaSemana[]" value="Domingo"> Domingo
											</label>
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="descricao" class="control-label">Descrição: <span class="text-error">*</span></label>
					    				<div class="controls">
					    					<textarea name="descricao" class="span7" rows="5" id="descricao"></textarea>
					    					<span class="help-inline"><p class="text-error"><strong><?php echo form_error('descricao'); ?></strong></p></span>
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="dataFinal" class="control-label"><span class="label label-warning">Aviso</span></label>
					    				<div class="controls">
					    					<p class="text-warning">Ao escolher a forma da promoção por dia da semana, os dias de início e final serão ignorados.</p>
					    				</div>
					    			</div>
								</div>
							</div>
					</div><!-- Padd -->

					<div class="widget-foot">
						<input type="hidden" name="categoria" value="<?php echo $categoria; ?>" />
						<input type="hidden" name="idCliente" value="<?php echo $idCliente; ?>" />
						<input type="submit" class="btn btn-success pull-right" name="atualizar" value="Cadastrar promoção" />
						<p>Os campos com <strong>(*)</strong>, são obrigatórios.</p>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
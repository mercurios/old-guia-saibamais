<div class="row">
	<form name="updatePratos" class="form-horizontal" method="post" action="<?php echo base_url('cardapios/save') ?>">
		<div class="span12">
			<div class="widget">
				<div class="widget-head">
					<div class="pull-left"><i class="icon-plus"></i> Novo prato</div>
					<div class="widget-icons pull-right"></div>  
					<div class="clearfix"></div>
				</div>

				<div class="widget-content">
					<div class="padd">
						<div class="row">
							<div class="span12">
								<div class="control-group">
				    				<label for="nome" class="control-label">Nome do prato: <span class="text-error">*</span></label>
				    				<div class="controls">
				    					<input class="span7" name="nome" type="text" value="" id="nome">
				    					<span class="help-inline"><p class="text-error"><strong><?php echo form_error('nome'); ?></strong></p></span>
				    				</div>
				    			</div>
							</div>

							<div class="span12">
								<div class="control-group">
				    				<label for="descricao" class="control-label">Descrição: <span class="text-error">*</span></label>
				    				<div class="controls">
				    					<textarea class="span7" name="descricao" id="descricao" rows="5"></textarea>
				    					<span class="help-inline"><p class="text-error"><strong><?php echo form_error('descricao'); ?></strong></p></span>
				    				</div>
				    			</div>
							</div>

							<div class="span12">
								<div class="control-group">
				    				<label for="titulo1" class="control-label">Titulo 1:</label>
				    				<div class="controls">
				    					<input class="span7" name="titulo1" type="text" value="" id="titulo1" placeholder="Ex: Prato Médio" />
				    					<span class="help-inline"><p class="text-error"><strong></strong></p></span>
				    				</div>
				    			</div>
							</div>

							<div class="span12">
								<div class="control-group">
				    				<label for="valor1" class="control-label">Valor 1:</label>
				    				<div class="controls">
				    					<input class="span7" name="valor1" type="text" value="" id="valor1" placeholder="Ex: 10,00" />
				    					<span class="help-inline"><p class="text-error"><strong></strong></p></span>
				    				</div>
				    			</div>
							</div>

							<div class="span12">
								<div class="control-group">
				    				<label for="titulo2" class="control-label">Titulo 2:</label>
				    				<div class="controls">
				    					<input class="span7" name="titulo2" type="text" value="" id="titulo2" placeholder="Ex: Prato grande" />
				    					<span class="help-inline"><p class="text-error"><strong></strong></p></span>
				    				</div>
				    			</div>
							</div>

							<div class="span12">
								<div class="control-group">
				    				<label for="valor2" class="control-label">Valor 2:</label>
				    				<div class="controls">
				    					<input class="span7" name="valor2" type="text" value="" id="valor2" placeholder="Ex: 20,00" />
				    					<span class="help-inline"><p class="text-error"><strong></strong></p></span>
				    				</div>
				    			</div>
							</div>

							<div class="span12">
								<div class="control-group">
				    				<label for="titulo3" class="control-label">Titulo 3:</label>
				    				<div class="controls">
				    					<input class="span7" name="titulo3" type="text" value="" id="titulo3" placeholder="Ex: Prato gigante" />
				    					<span class="help-inline"><p class="text-error"><strong></strong></p></span>
				    				</div>
				    			</div>
							</div>

							<div class="span12">
								<div class="control-group">
				    				<label for="valor3" class="control-label">Valor 3:</label>
				    				<div class="controls">
				    					<input class="span7" name="valor3" type="text" value="" id="valor3" placeholder="Ex: 30,00" />
				    					<span class="help-inline"><p class="text-error"><strong></strong></p></span>
				    				</div>
				    			</div>
							</div>

							<div class="span12">
								<div class="control-group">
				    				<label for="valor3" class="control-label">Tipo do prato: <span class="text-error">*</span></label>
				    				<div class="controls">
				    					<select name="tipoPrato">
				    						<option value="">Selecione um tipo</option>
				    						<option value="pratoprincipal">Prato principal</option>
				    						<option value="normal">Prato normal</option>
				    						<option value="bebida">Bebida</option>
				    					</select>
				    					<span class="help-inline"><p class="text-error"><strong><?php echo form_error('tipoPrato'); ?></strong></p></span>
				    				</div>
				    			</div>
							</div>

							<div class="span12">
								<div class="control-group">
				    				<label for="valor3" class="control-label">Dia da semana:</label>
				    				<div class="controls">
		                                <label class="checkbox inline">
		                                    <input type="checkbox" id="inlineCheckbox1" name="diaprato[]" value="segunda" /> Segunda
		                                </label>

		                                <label class="checkbox inline">
		                                    <input type="checkbox" id="inlineCheckbox1" name="diaprato[]" value="terca" /> Terça
		                                </label>

		                                <label class="checkbox inline">
		                                    <input type="checkbox" id="inlineCheckbox1" name="diaprato[]" value="quarta" /> Quarta
		                                </label>

		                                <label class="checkbox inline">
		                                    <input type="checkbox" id="inlineCheckbox1" name="diaprato[]" value="quinta" /> Quinta
		                                </label>

		                                <label class="checkbox inline">
		                                    <input type="checkbox" id="inlineCheckbox1" name="diaprato[]" value="sexta" /> Sexta
		                                </label>

		                                <label class="checkbox inline">
		                                    <input type="checkbox" id="inlineCheckbox1" name="diaprato[]" value="sabado" /> Sábado
		                                </label>

		                                <label class="checkbox inline">
		                                    <input type="checkbox" id="inlineCheckbox1" name="diaprato[]" value="domingo" /> Domingo
		                                </label>
				    				</div>
				    			</div>
							</div>
						</div>
					</div><!-- Padd -->

					<div class="widget-foot">
						<input type="hidden" name="categoria" value="<?php echo $categoria ?>" />
						<input type="hidden" name="idCliente" value="<?php echo $idCliente ?>" />
						<input type="submit" class="btn btn-success pull-right" name="atualizar" value="Atualizar informações" />
						<p>Os campos com <strong>(*)</strong>, são obrigatórios.</p>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
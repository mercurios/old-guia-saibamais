<div class="row">
	<form name="newEstadia" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('acomodacoes/save') ?>">
		<div class="span12">
			<div class="widget">
				<div class="widget-head">
					<div class="pull-left"><i class="icon-plus"></i> Cadastrar acomodações</div>
					<div class="widget-icons pull-right"></div>  
					<div class="clearfix"></div>
				</div>

				<div class="widget-content">
					<div class="padd">
						<div class="padding-left-35">
							<div class="row">
								<div class="span12">
									<div class="control-group">
					    				<label for="nome" class="control-label">Nome da acomodação: <span class="text-error">*</span></label>
					    				<div class="controls">
					    					<input class="span7" name="nome" type="text" value="" id="nome">
					    					<span class="help-inline"><p class="text-error"><strong><?php echo form_error('nome'); ?></strong></p></span>
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="nome" class="control-label">Descrição: <span class="text-error">*</span></label>
					    				<div class="controls">
					    					<textarea class="span7" name="descricao" id="descricao" rows="5"></textarea>
					    					<span class="help-inline"><p class="text-error"><strong><?php echo form_error('descricao'); ?></strong></p></span>
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="nome" class="control-label">Informações extras: </label>
					    				<div class="controls">
					    					<textarea class="span7" name="infoExtras" id="infoExtras" rows="5"></textarea>
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="tituloUm" class="control-label">Titulo preço um: </label>
					    				<div class="controls">
					    					<input class="span7" name="tituloUm" type="text" value="" id="tituloUm" placeholder="1 Hora">
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="valorUm" class="control-label">Valor preço um: </label>
					    				<div class="controls">
					    					<input class="span7" name="valorUm" type="text" value="" id="valorUm" placeholder="20,00">
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="tituloDois" class="control-label">Titulo preço dois: </label>
					    				<div class="controls">
					    					<input class="span7" name="tituloDois" type="text" value="" id="tituloDois" placeholder="2 Horas">
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="valorDois" class="control-label">Valor preço dois: </label>
					    				<div class="controls">
					    					<input class="span7" name="valorDois" type="text" value="" id="valorDois" placeholder="25,00">
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="tituloTres" class="control-label">Titulo preço três: </label>
					    				<div class="controls">
					    					<input class="span7" name="tituloTres" type="text" value="" id="tituloTres" placeholder="Pernoite">
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="valorTres" class="control-label">Valor preço três: </label>
					    				<div class="controls">
					    					<input class="span7" name="valorTres" type="text" value="" id="valorTres" placeholder="60,00">
					    				</div>
					    			</div>
								</div>
	                          </div>
						</div>
					</div><!-- Padd -->

					<div class="widget-foot">
						<input type="hidden" name="idCliente" value="<?php echo $idCliente; ?>">
						<input type="submit" class="btn btn-success pull-right" name="cadastrar" value="Cadastrar estadia" />
						<p>Os campos marcados com <strong>(*)</strong>, são obrigatórios.</p>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
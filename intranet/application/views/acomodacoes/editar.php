<div class="row">
	<form name="newEstadia" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('acomodacoes/update') ?>">
		<div class="span12">
			<div class="widget">
				<div class="widget-head">
					<div class="pull-left"><i class="icon-pencil"></i> Editar acomodação</div>
					<div class="widget-icons pull-right"></div>  
					<div class="clearfix"></div>
				</div>

				<div class="widget-content">
					<?php if (isset($acomodacao)) { foreach ($acomodacao as $res) { ?>
					<div class="padd">
						<div class="padding-left-35">
							<div class="row">
								<div class="span12">
									<div class="control-group">
					    				<label for="nome" class="control-label">Nome da acomodação: <span class="text-error">*</span></label>
					    				<div class="controls">
					    					<input class="span7" name="nome" type="text" value="<?php echo $res->nome_acomodacao ?>" id="nome">
					    					<span class="help-inline"><p class="text-error"><strong><?php echo form_error('nome'); ?></strong></p></span>
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="descricao" class="control-label">Descrição: <span class="text-error">*</span></label>
					    				<div class="controls">
					    					<textarea class="span7" name="descricao" id="descricao" rows="5"><?php echo $res->desc_acomodacao ?></textarea>
					    					<span class="help-inline"><p class="text-error"><strong><?php echo form_error('descricao'); ?></strong></p></span>
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="tituloUm" class="control-label">Titulo preço um: </label>
					    				<div class="controls">
					    					<input class="span7" name="tituloUm" type="text" value="<?php echo $res->titulo_preco_um ?>" id="tituloUm" placeholder="1 Hora">
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="valorUm" class="control-label">Valor preço um: </label>
					    				<div class="controls">
					    					<input class="span7" name="valorUm" type="text" value="<?php echo $res->valor_preco_um ?>" id="valorUm" placeholder="20,00">
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="tituloDois" class="control-label">Titulo preço dois: </label>
					    				<div class="controls">
					    					<input class="span7" name="tituloDois" type="text" value="<?php echo $res->titulo_preco_dois ?>" id="tituloDois" placeholder="2 Horas">
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="valorDois" class="control-label">Valor preço dois: </label>
					    				<div class="controls">
					    					<input class="span7" name="valorDois" type="text" value="<?php echo $res->valor_preco_dois ?>" id="valorDois" placeholder="25,00">
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="tituloTres" class="control-label">Titulo preço três: </label>
					    				<div class="controls">
					    					<input class="span7" name="tituloTres" type="text" value="<?php echo $res->titulo_preco_tres ?>" id="tituloTres" placeholder="Pernoite">
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="valorTres" class="control-label">Valor preço três: </label>
					    				<div class="controls">
					    					<input class="span7" name="valorTres" type="text" value="<?php echo $res->valor_preco_tres ?>" id="valorTres" placeholder="60,00">
					    				</div>
					    			</div>
								</div>
	                        </div>
						</div>
						<?php }} ?>
					</div><!-- Padd -->

					<div class="widget-foot">
						<input type="hidden" name="idAcomodacao" value="<?php echo $res->id_acomodacao; ?>">
						<input type="hidden" name="idCliente" value="<?php echo $res->id_cliente; ?>">
						<input type="submit" class="btn btn-success pull-right" name="cadastrar" value="Atualizar acomodação" />
						<p>Os campos marcados com <strong>(*)</strong>, são obrigatórios.</p>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
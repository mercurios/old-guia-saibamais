<div class="row">
	<form name="newpeca" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('pecas/update') ?>">
		<div class="span12">
			<div class="widget">
				<div class="widget-head">
					<div class="pull-left"><i class="icon-plus"></i> Editar peca</div>
					<div class="widget-icons pull-right"></div>  
					<div class="clearfix"></div>
				</div>

				<?php if (!empty($peca)) { foreach ($peca as $res) { ?>
				<div class="widget-content padding-left-35">
					<div class="padd">
						<div class="row">
							<div class="span11">
								<label class="titulo-separator">Informações Básicas</label>
							</div>

							<div class="span2">
								<span class="thumbnail">
									<?php echo $this->biblioteca->image_thumb('../uploads/pecas/' . $res->logo_peca, 250, 200 ); ?>
								</span>
							</div>

							<div class="span3">
								<label>Nova imagem: 
									<span class="badge badge-info tool" 
									title="Atenção: Só são permitidos imagens de no máximo 2MB, caso o tamanho exceda ou voçê tente enviar outro arquivo que não seja imagem, o programa altomaticamente irá salva sua imagem como NULA." data-placement="top" rel="popover"><i class="icon-info"></i></span>
								</label>
								<input type="file" name="logo" class="filestyle" data-input="false" data-buttonText="Selecionar um novo aquivo">

								</br></br>

								<label for="titulo">Titulo: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('titulo'); ?></span></small></label>
								<input type="text" class="input-block-level" id="titulo" name="titulo" value="<?php echo $res->titulo_peca ?>" />	
							</div>

							<div class="span6">
								<label>Descrição: <span class="text-error">*</span><small><span class="text-error"><?php echo form_error('descricao'); ?></span></small></label>
								<textarea class="input-block-level" rows="5" name="descricao"><?php echo $res->desc_peca ?></textarea>
							</div>

							<div class="span11">
								</br>
								<label for="categoria">Categoria: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('categoria'); ?></span></small></label>
								<input type="text" class="input-block-level" id="categoria" name="categoria" value="<?php echo $res->categoria_peca ?>" />
							</div>

							<div class="span11">
								</br>
								<label for="duracao">Duração: </label>
								<input type="text" class="input-block-level" id="duracao" name="duracao" value="<?php echo $res->duracao_peca ?>" />
							</div>

							<div class="span11">
								</br>
								<label for="censura">Censura: </label>
								<input type="text" class="input-block-level" id="censura" name="censura" value="<?php echo $res->idade_peca ?>" />
							</div>

							<div class="span11">
                                <label class="titulo-separator">Preços</label>
                            </div>

                            <div class="span11">
								<label for="val_inteira">Valor entrada inteira: </label>
								<input type="text" class="input-block-level" id="val_inteira" name="val_inteira" value="<?php echo $res->val_inteira ?>" />
							</div>

							<div class="span11">
								</br>
								<label for="val_meia">Valor meia entrada: </label>
								<input type="text" class="input-block-level" id="val_meia" name="val_meia" value="<?php echo $res->val_meia ?>" />
							</div>

                            <div class="span11">
                                <label class="titulo-separator">Horários</label>
                            </div>

                            <div class="span11">
                            	<p class="text-error pull-right"><span class="label label-warning">Aviso</span> Separe os horádios por vígula. Ex: 12:00, 14:00, 19:00</p>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="info">
                                            <td width="80"><strong>Dia </strong></td>
                                            <td width="560"><strong>Horário </strong></td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><strong>Domingo:</strong></td>
                                            <td><input class="input-block-level" value="<?php echo $res->h_dom ?>" name="h_dom" type="text" placeholder="Ex: 12:00, 14:00, 19:00"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Segunda:</strong></td>
                                            <td><input class="input-block-level" value="<?php echo $res->h_seg ?>" name="h_seg" type="text" placeholder="Ex: 12:00, 14:00, 19:00"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Terça:</strong></td>
                                            <td><input class="input-block-level" value="<?php echo $res->h_ter ?>" name="h_ter" type="text" placeholder="Ex: 12:00, 14:00, 19:00"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Quarta:</strong></td>
                                            <td><input class="input-block-level" value="<?php echo $res->h_qua ?>" name="h_qua" type="text" placeholder="Ex: 12:00, 14:00, 19:00"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Quinta:</strong></td>
                                            <td><input class="input-block-level" value="<?php echo $res->h_qui ?>" name="h_qui" type="text" placeholder="Ex: 12:00, 14:00, 19:00"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Sexta:</strong></td>
                                            <td><input class="input-block-level" value="<?php echo $res->h_sex ?>" name="h_sex" type="text" placeholder="Ex: 12:00, 14:00, 19:00"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Sábado:</strong></td>
                                            <td><input class="input-block-level" value="<?php echo $res->h_sex ?>" name="h_sab" type="text" placeholder="Ex: 12:00, 14:00, 19:00"></td>
                                        </tr>
                                    </tbody>
	                            </table>
                        	</div>
                        </div>
					</div><!-- Padd -->

					<div class="widget-foot">
						<input type="hidden" name="imgAtual" value="<?php echo $res->logo_peca ?>" />
						<input type="hidden" name="idpeca" value="<?php echo $res->id_peca ?>" />
						<input type="hidden" name="idCliente" value="<?php echo $res->id_teatro ?>" />
						<input type="submit" class="btn btn-success pull-right" name="cadastrar" value="Atualizar peça" />
						<p>Os campos marcados com <strong>(*)</strong>, são obrigatórios.</p>
					</div>
				</div>
				<?php }} ?>
			</div>
		</div>
	</form>
</div>
<div class="row">
	<form name="newEstadia" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('estadias/update') ?>">
		<div class="span12">
			<?php if (isset($msg)) : echo $msg; endif; ?>
			<div class="widget">
				<div class="widget-head">
					<div class="pull-left"><i class="icon-pencil"></i> Editar estadias</div>
					<div class="widget-icons pull-right"></div>  
					<div class="clearfix"></div>
				</div>

				<div class="widget-content">
					<div class="padd">
						<?php if (!empty($estadia)) { foreach ($estadia as $res) : ?>
						<div class="padding-left-35">
							<div class="row">
								<div class="span11">
	                                <label class="titulo-separator">Informações básicas</label>
	                            </div>

	                           <div class="span2">
									<span class="thumbnail">
										<?php echo $this->biblioteca->image_thumb('../uploads/logos/' . $res->logo_estadia, 250, 200 ); ?>
									</span>
								</div>

								<div class="span3">
									<label>Nova imagem: 
										<span class="badge badge-info tool" 
										title="Atenção: Só são permitidos imagens de no máximo 2MB, caso o tamanho exceda ou voçê tente enviar outro arquivo que não seja imagem, o programa altomaticamente irá salva sua imagem como NULA." data-placement="top" rel="popover"><i class="icon-info"></i></span>
									</label>
									<input type="file" name="logo" class="filestyle" data-input="false" data-buttonText="Selecionar um novo aquivo">

									</br></br>

									<label for="nome">Nome: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('nome'); ?></span></small></label>
									<input type="text" class="input-block-level" id="nome" name="nome" value="<?php echo $res->nome_estadia ?>" />	
								</div>

								<div class="span6">
									<label>Descrição: <span class="text-error">*</span><small><span class="text-error"><?php echo form_error('descricao'); ?></span></small></label>
									<textarea class="input-block-level" rows="5" name="descricao"><?php echo $res->desc_estadia ?></textarea>
								</div>

								<div class="span11">
								</br>
	                                <label for="nome">Status: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('nome'); ?></span></small></label>
									<select name="status" class="input-block-level">
										<option value="1" <?php echo ($res->status_estadia == 1) ? 'selected' : '' ?>>Ativo</option>
										<option value="0" <?php echo ($res->status_estadia == 0) ? 'selected' : '' ?>>Bloqueado</option>
									</select>
	                            </div>

	                            <div class="span11">
	                                <label class="titulo-separator">Localização</label>
	                            </div>

	                            <div class="span5">
	                            	<label for="estado">Estado: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('estado'); ?></span></small></label>
									<select name="estado" class="input-block-level" id="estado">
										<option value="">Selecione um estado</option>
										<?php foreach ($estados as $estado) : ?>
											<option value="<?php echo $estado->cd_uf ?>" <?php echo ($res->uf_estadia == $estado->cd_uf) ? 'selected' : '' ?>><?php echo $estado->ds_uf_nome ?></option>
										<?php endforeach; ?>
									</select>
	                            </div>

	                            <div class="span6">
	                            	<label for="cidade">Cidade: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('cidade'); ?></span></small></label>
									<select name="cidade" class="input-block-level" id="cidade">
										<option value="">Selecione uma cidade</option>
										<?php foreach ($cidades as $cidade) : ?>
											<option value="<?php echo $cidade->cd_cidade ?>" <?php echo ($res->cidade_estadia == $cidade->cd_cidade) ? 'selected' : '' ?>><?php echo $cidade->ds_cidade_nome ?></option>
										<?php endforeach; ?>
									</select>
	                            </div>

	                            <div class="span5">
	                            	</br>
	                            	<label for="bairro">Bairro: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('bairro'); ?></span></small></label>
									<select name="bairro" class="input-block-level" id="bairro">
										<option value="">Selecione um bairro</option>
										<?php foreach ($bairros as $bairro) : ?>
											<option value="<?php echo $bairro->cd_bairro ?>" <?php echo ($res->bairro_estadia == $bairro->cd_bairro) ? 'selected' : '' ?>><?php echo $bairro->ds_bairro_nome ?></option>
										<?php endforeach; ?>
									</select>
	                            </div>

	                            <div class="span6">
	                            	</br>
	                            	<label for="rua">Rua: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('rua'); ?></span></small></label>
									<input type="text" name="rua" id="rua" value="<?php echo $res->rua_estadia ?>" class="input-block-level">
	                            </div>

	                            <div class="span5">
	                            	</br>
	                            	<label for="numero">Numero: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('numero'); ?></span></small></label>
									<input type="text" name="numero" id="numero" value="<?php echo $res->num_estadia ?>" class="input-block-level">
	                            </div>

	                            <div class="span6">
	                            	</br>
	                            	<label for="cep">Cep: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('cep'); ?></span></small></label>
									<input type="text" name="cep" id="cep" value="<?php echo $res->cep_estadia ?>" class="input-block-level maskCep">
	                            </div>

	                            <div class="span5">
	                            	</br>
	                            	<label for="longitude">Longitude: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('longitude'); ?></span></small></label>
									<input type="text" name="longitude" id="longitude" value="<?php echo $res->long_estadia ?>" class="input-block-level">
	                            </div>

	                            <div class="span6">
	                            	</br>
	                            	<label for="latitude">Latitude: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('latitude'); ?></span></small></label>
									<input type="text" name="latitude" id="latitude" value="<?php echo $res->lati_estadia ?>" class="input-block-level">
	                            </div>

	                            <div class="span11">
	                                <label class="titulo-separator">Contatos</label>
	                            </div>

	                            <div class="span5">
	                                <label>Telefone:</label>
	                                <input class="input-block-level maskTelefone" value="<?php echo $res->fone_estadia ?>" name="num_atendimento" type="text" placeholder="">
	                            </div>

	                            <div class="span6">
	                                <label>E-mail:</label>
	                                <input name="email" class="input-block-level" value="<?php echo $res->email_estadia ?>" name="email" type="text" placeholder="">
	                            </div>

	                            <div class="span11">
	                            	</br>
	                                <label>Site:</label>
	                                <input name="site" class="input-block-level" value="<?php echo $res->site_estadia ?>" name="site" type="text">
	                            </div>

	                            <div class="span11">
	                                <label class="titulo-separator">Redes Sociais</label>
	                            </div>

	                            <div class="span5">
	                                <label>Twitter:</label>
	                                <input class="input-block-level" name="twitter" type="text" value="<?php echo $res->twitter_estadia ?>" />
	                            </div>

	                            <div class="span6">
	                                <label>Facebook:</label>
	                                <input class="input-block-level" name="facebook" type="text" value="<?php echo $res->facebook_estadia ?>" />
	                            </div>

	                            <div class="span5">
	                            	</br>
	                                <label>Youtube:</label>
	                                <input class="input-block-level" name="youtube" type="text" value="<?php echo $res->youtube_estadia ?>" />
	                            </div>

	                            <div class="span6">
	                            	</br>
	                                <label>Instagram:</label>
	                                <input class="input-block-level" name="instagram" type="text" value="<?php echo $res->insta_estadia ?>" />
	                            </div>

	                            <div class="span5">
	                            	</br>
	                                <label>Flickr:</label>
	                                <input class="input-block-level" name="flickr" type="text" value="<?php echo $res->flickr_estadia ?>" />
	                            </div>

	                            <div class="span6">
	                            	</br>
	                                <label>Google +:</label>
	                                <input class="input-block-level" name="google" type="text" value="<?php echo $res->googleplus_estadia ?>" />
	                            </div>

	                            <div class="span11">
	                                <label class="titulo-separator">Informações extras</label>
	                            </div>

	                            <div class="span11">
	                                <?php $_infoExtras = explode(",", $res->extra_estadia); ?>
									<label class="checkbox inline">
										<input type="checkbox" id="infoExtras" name="infoExtras[]" value="wifi" <?php echo (in_array('wifi', $_infoExtras)) ? 'checked' : ''; ?>> Wifi
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="infoExtras" name="infoExtras[]" value="piscina" <?php echo (in_array('piscina', $_infoExtras)) ? 'checked' : ''; ?>> Piscina
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="infoExtras" name="infoExtras[]" value="cafe-da-manha" <?php echo (in_array('cafe-da-manha', $_infoExtras)) ? 'checked' : ''; ?>> Café da manhã
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="infoExtras" name="infoExtras[]" value="estacionamento" <?php echo (in_array('estacionamento', $_infoExtras)) ? 'checked' : ''; ?>> Estacionamento
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="infoExtras" name="infoExtras[]" value="shows-ao-vivo" <?php echo (in_array('shows-ao-vivo', $_infoExtras)) ? 'checked' : ''; ?>> Show ao vivo
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="infoExtras" name="infoExtras[]" value="lutas-ao-vivo" <?php echo (in_array('lutas-ao-vivo', $_infoExtras)) ? 'checked' : ''; ?>> Luta ao vivo
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="infoExtras" name="infoExtras[]" value="jogos-ao-vivo" <?php echo (in_array('jogos-ao-vivo', $_infoExtras)) ? 'checked' : ''; ?>> Jogos ao vivo
									</label>
	                            </div>

	                            <div class="span11">
	                                <label class="titulo-separator">Categoria</label>
	                            </div>

	                            <div class="span11">
	                                <label><strong>Por tipo:</strong></label>
	                                <?php $_porTipo = explode(",", $res->tipo_estadia); ?>
	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="albergue" <?php echo (in_array('albergue', $_porTipo)) ? 'checked' : ''; ?>> Albergue
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="chale" <?php echo (in_array('chale', $_porTipo)) ? 'checked' : ''; ?>> Chalé
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="hotel" <?php echo (in_array('hotel', $_porTipo)) ? 'checked' : ''; ?>> Hotel
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="pousada" <?php echo (in_array('pousada', $_porTipo)) ? 'checked' : ''; ?>> Pousada
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="prive" <?php echo (in_array('prive', $_porTipo)) ? 'checked' : ''; ?>> Privê
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="resort" <?php echo (in_array('resort', $_porTipo)) ? 'checked' : ''; ?>> Resort
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="outros" <?php echo (in_array('outros', $_porTipo)) ? 'checked' : ''; ?>> Outros
	                                </label>
	                            </div>

	                            <div class="span11">
	                                <div>&nbsp</div>
	                                <label><strong>Por localidade:</strong></label>
	                                <?php $_porLocalidade = explode(",", $res->localidade_estadia); ?>
	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="campo" <?php echo (in_array('campo', $_porLocalidade)) ? 'checked' : ''; ?>> Campo
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="cidade" <?php echo (in_array('cidade', $_porLocalidade)) ? 'checked' : ''; ?>> Cidade
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="mata" <?php echo (in_array('mata', $_porLocalidade)) ? 'checked' : ''; ?>> Mata
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="maritimo" <?php echo (in_array('maritimo', $_porLocalidade)) ? 'checked' : ''; ?>> Marítimo
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="praia" <?php echo (in_array('praia', $_porLocalidade)) ? 'checked' : ''; ?>> Praia
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="outros" <?php echo (in_array('outros', $_porLocalidade)) ? 'checked' : ''; ?>> Outros
	                                </label>
	                            </div><!-- /span11 -->

	                            <div class="span11">
	                                <div>&nbsp</div>
	                                <label><strong>Por classificação</strong></label>
	                                <?php $_porClasse = explode(",", $res->class_estadia); ?>
	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoClassificacao[]" value="tresestrelas" <?php echo (in_array('tresestrelas', $_porClasse)) ? 'checked' : ''; ?>> 3 Estrelas
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoClassificacao[]" value="quatroestrelas" <?php echo (in_array('quatroestrelas', $_porClasse)) ? 'checked' : ''; ?>> 4 Estrelas
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoClassificacao[]" value="cincoestrelas" <?php echo (in_array('cincoestrelas', $_porClasse)) ? 'checked' : ''; ?>> 5 Estrelas
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoClassificacao[]" value="seisestrelas" <?php echo (in_array('seisestrelas', $_porClasse)) ? 'checked' : ''; ?>> 6 Estrelas
	                                </label>
	                            </div><!-- /span11 -->

	                            <div class="span11">
	                                <label class="titulo-separator">Acessível</label>
	                            </div>

	                            <div class="span11">
	                            	<?php $_adaptado = explode(",", $res->adaptado_estadia); ?>
	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="cego" <?php echo (in_array('cego', $_adaptado)) ? 'checked' : ''; ?>> Cego
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="surdo" <?php echo (in_array('surdo', $_adaptado)) ? 'checked' : ''; ?>> Surdo
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="deficientefisico" <?php echo (in_array('deficientefisico', $_adaptado)) ? 'checked' : ''; ?>> Deficiente fisico
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="braile" <?php echo (in_array('braile', $_adaptado)) ? 'checked' : ''; ?>> Braile
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="obeso" <?php echo (in_array('obeso', $_adaptado)) ? 'checked' : ''; ?>> Obeso

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="idoso" <?php echo (in_array('idoso', $_adaptado)) ? 'checked' : ''; ?>> Idoso
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="gestante" <?php echo (in_array('gestante', $_adaptado)) ? 'checked' : ''; ?>> Gestante
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="bebe" <?php echo (in_array('bebe', $_adaptado)) ? 'checked' : ''; ?>> Bêbe
	                            	</label>
	                            </div>
							</div>
						</div>
					</div><!-- Padd -->

					<div class="widget-foot">
						<input type="hidden" name="id" value="<?php echo $res->id_estadia ?>">
						<input type="hidden" name="imgAtual" value="<?php echo $res->logo_estadia ?>">
						<input type="submit" class="btn btn-success pull-right" name="cadastrar" value="Editar estadia" />
						<p>Os campos marcados com <strong>(*)</strong>, são obrigatórios.</p>
					</div>
				<?php endforeach; } else { echo 'Não existe estadias com o ID informado.'; } ?>
				</div>
			</div>
		</div>
	</form>
</div>
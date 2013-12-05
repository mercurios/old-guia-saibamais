<div class="row">
	<form name="newEstadia" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('estadias/save') ?>">
		<div class="span12">
			<div class="widget">
				<div class="widget-head">
					<div class="pull-left"><i class="icon-plus"></i> Cadastrar estadias</div>
					<div class="widget-icons pull-right"></div>  
					<div class="clearfix"></div>
				</div>

				<div class="widget-content">
					<div class="padd">
						<div class="padding-left-35">
							<div class="row">
								<div class="span11">
	                                <label class="titulo-separator">Informações básicas</label>
	                            </div>

	                            <div class="span5">
	                            	<label>Logo: 
										<span class="badge badge-info tool" 
										title="Atenção: Só são permitidos imagens de no máximo 2MB, caso o tamanho exceda ou voçê tente enviar outro arquivo que não seja imagem, o programa altomaticamente irá salva sua imagem como NULA." 										data-placement="top" rel="popover"><i class="icon-info"></i></span>
									</label>
									<input type="file" name="logo" class="filestyle" data-buttonText="Selecionar aquivo">	

									</br></br>

									<label for="nome">Nome: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('nome'); ?></span></small></label>
									<input type="text" class="input-block-level" id="nome" name="nome" value="" />
								</div>

								<div class="span6">
									<label>Descrição: <span class="text-error">*</span><small><span class="text-error"><?php echo form_error('descricao'); ?></span></small></label>
									<textarea class="input-block-level" rows="5" name="descricao"></textarea>
								</div>

	                            <div class="span11">
	                                <label class="titulo-separator">Localização</label>
	                            </div>

	                            <div class="span5">
	                            	<label for="estado">Estado: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('estado'); ?></span></small></label>
									<select name="estado" class="input-block-level" id="estado">
										<option value="">Selecione um estado</option>
										<?php
										foreach ($estados as $estado) :
											echo '<option value="'. $estado->cd_uf .'">'. $estado->ds_uf_nome .'</option>';
										endforeach;  
										?>
									</select>
	                            </div>

	                            <div class="span6">
	                            	<label for="cidade">Cidade: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('cidade'); ?></span></small></label>
									<select name="cidade" class="input-block-level" id="cidade">
										<option value="">Selecione uma cidade</option>
									</select>
	                            </div>

	                            <div class="span5">
	                            	</br>
	                            	<label for="bairro">Bairro: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('bairro'); ?></span></small></label>
									<select name="bairro" class="input-block-level" id="bairro">
										<option value="">Selecione um bairro</option>
									</select>
	                            </div>

	                            <div class="span6">
	                            	</br>
	                            	<label for="rua">Rua: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('rua'); ?></span></small></label>
									<input type="text" name="rua" id="rua" value="" class="input-block-level">
	                            </div>

	                            <div class="span5">
	                            	</br>
	                            	<label for="numero">Numero: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('numero'); ?></span></small></label>
									<input type="text" name="numero" id="numero" value="" class="input-block-level">
	                            </div>

	                            <div class="span6">
	                            	</br>
	                            	<label for="cep">Cep: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('cep'); ?></span></small></label>
									<input type="text" name="cep" id="cep" value="" class="input-block-level maskCep">
	                            </div>

	                            <div class="span5">
	                            	</br>
	                            	<label for="longitude">Longitude: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('longitude'); ?></span></small></label>
									<input type="text" name="longitude" id="longitude" value="" class="input-block-level">
	                            </div>

	                            <div class="span6">
	                            	</br>
	                            	<label for="latitude">Latitude: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('latitude'); ?></span></small></label>
									<input type="text" name="latitude" id="latitude" value="" class="input-block-level">
	                            </div>

	                            <div class="span11">
	                                <label class="titulo-separator">Contatos</label>
	                            </div>

	                            <div class="span5">
	                                <label>Telefone:</label>
	                                <input class="input-block-level maskTelefone" name="num_atendimento" type="text" placeholder="">
	                            </div>

	                            <div class="span6">
	                                <label>E-mail:</label>
	                                <input name="email" class="input-block-level" name="email" type="text" placeholder="">
	                            </div>

	                            <div class="span11">
	                            	</br>
	                                <label>Site:</label>
	                                <input name="site" class="input-block-level" name="site" type="text">
	                            </div>

	                            <div class="span11">
	                                <label class="titulo-separator">Redes Sociais</label>
	                            </div>

	                            <div class="span5">
	                                <label>Twitter:</label>
	                                <input class="input-block-level" name="twitter" type="text">
	                            </div>

	                            <div class="span6">
	                                <label>Facebook:</label>
	                                <input class="input-block-level" name="facebook" type="text">
	                            </div>

	                            <div class="span5">
	                            	</br>
	                                <label>Youtube:</label>
	                                <input class="input-block-level" name="youtube" type="text">
	                            </div>

	                            <div class="span6">
	                            	</br>
	                                <label>Instagram:</label>
	                                <input class="input-block-level" name="instagram" type="text">
	                            </div>

	                            <div class="span5">
	                            	</br>
	                                <label>Flickr:</label>
	                                <input class="input-block-level" name="flickr" type="text">
	                            </div>

	                            <div class="span6">
	                            	</br>
	                                <label>Google +:</label>
	                                <input class="input-block-level" name="google" type="text">
	                            </div>

	                            <div class="span11">
	                            </br>
	                                <label>Orkut:</label>
	                                <input class="input-block-level" name="orkut" type="text">
	                            </div>

	                            <div class="span11">
	                                <label class="titulo-separator">Informações extras</label>
	                            </div>

	                            <div class="span11">
	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="infoExtras[]" value="wifi" > Wifi
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="infoExtras[]" value="estacionamento" > Estacionamento
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="infoExtras[]" value="lutas-ao-vivo" > Lutas ao vivo
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="infoExtras[]" value="jogos-ao-vivo" > Jogos ao vivo
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="infoExtras[]" value="shows-ao-vivo" > Shows ao vivo
	                                </label>
	                            </div>

	                            <div class="span11">
	                                <label class="titulo-separator">Categoria</label>
	                            </div>

	                            <div class="span11">
	                                <label><strong>Por tipo:</strong></label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="albergue"> Albergue
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="chale"> Chalé
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="hotel"> Hotel
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="pousada"> Pousada
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="prive"> Privê
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="resort"> Resort
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="outros"> Outros
	                                </label>
	                            </div>

	                            <div class="span11">
	                                <div>&nbsp</div>
	                                <label><strong>Por localidade:</strong></label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="campo"> Campo
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="cidade"> Cidade
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="mata"> Mata
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="maritimo"> Marítimo
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="praia"> Praia
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="outros"> Outros
	                                </label>
	                            </div><!-- /span11 -->

	                            <div class="span11">
	                                <div>&nbsp</div>
	                                <label><strong>Por classificação</strong></label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoClassificacao[]" value="tresestrelas"> 3 Estrelas
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoClassificacao[]" value="quatroestrelas"> 4 Estrelas
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoClassificacao[]" value="cincoestrelas"> 5 Estrelas
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoClassificacao[]" value="seisestrelas"> 6 Estrelas
	                                </label>
	                            </div><!-- /span11 -->

	                            <div class="span11">
	                                <label class="titulo-separator">Acessível</label>
	                            </div>

	                            <div class="span11">
	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="cego"> Cego
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="surdo"> Surdo
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="deficientefisico"> Deficiente fisico
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="braile"> Braile
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="obeso"> Obeso

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="idoso"> Idoso
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="gestante"> Gestante
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="bebe"> Bêbe
	                            	</label>
	                            </div>
							</div>
						</div>
					</div><!-- Padd -->

					<div class="widget-foot">
						<input type="submit" class="btn btn-success pull-right" name="cadastrar" value="Cadastrar estadia" />
						<p>Os campos marcados com <strong>(*)</strong>, são obrigatórios.</p>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
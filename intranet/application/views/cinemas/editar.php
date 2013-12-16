<div class="row">
	<form name="newRestaurante" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('cinemas/update') ?>">
		<div class="span12">
			<div class="widget">
				<div class="widget-head">
					<div class="pull-left"><i class="icon-plus"></i> Cadastrar cinema</div>
					<div class="widget-icons pull-right"></div>  
					<div class="clearfix"></div>
				</div>

				<div class="widget-content padding-left-35">
					<div class="padd">
						<?php if (!empty($cinema)) { foreach ($cinema as $res) { ?>
						<div class="row">
							<div class="span11">
								<label class="titulo-separator">Informações Básicas</label>
							</div>

							<div class="span2">
								<span class="thumbnail">
									<?php echo $this->biblioteca->image_thumb('../uploads/logos/' . $res->logo_cinema, 250, 200 ); ?>
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
								<input type="text" class="input-block-level" id="nome" name="nome" value="<?php echo $res->nome_cinema ?>" />	
							</div>

							<div class="span6">
								<label>Descrição: <span class="text-error">*</span><small><span class="text-error"><?php echo form_error('descricao'); ?></span></small></label>
								<textarea class="input-block-level" rows="5" name="descricao"><?php echo $res->desc_cinema ?></textarea>
							</div>

							<div class="span11">
                                <label class="titulo-separator">Redes Sociais</label>
                            </div>

                            <div class="span5">
                                <label>Twitter:</label>
                                <input class="input-block-level" name="twitter" type="text" value="<?php echo $res->twitter_cinema ?>" />
                            </div>

                            <div class="span6">
                                <label>Facebook:</label>
                                <input class="input-block-level" name="facebook" type="text" value="<?php echo $res->facebook_cinema ?>" />
                            </div>

                            <div class="span5">
                            	</br>
                                <label>Youtube:</label>
                                <input class="input-block-level" name="youtube" type="text" value="<?php echo $res->youtube_cinema ?>" />
                            </div>

                            <div class="span6">
                            	</br>
                                <label>Instagram:</label>
                                <input class="input-block-level" name="instagram" type="text" value="<?php echo $res->insta_cinema ?>" />
                            </div>

                            <div class="span5">
                            	</br>
                                <label>Flickr:</label>
                                <input class="input-block-level" name="flickr" type="text" value="<?php echo $res->flickr_cinema ?>" />
                            </div>

                            <div class="span6">
                            	</br>
                                <label>Google +:</label>
                                <input class="input-block-level" name="google" type="text" value="<?php echo $res->googleplus_cinema ?>" />
                            </div>

                            <div class="span11">
                            </br>
                                <label>Orkut:</label>
                                <input class="input-block-level" name="orkut" type="text" value="<?php echo $res->orkut_cinema ?>" />
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Localização</label>
                            </div>

                            <div class="span5">
                            	<label for="estado">Estado: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('estado'); ?></span></small></label>
								<select name="estado" class="input-block-level" id="estado">
									<option value="">Selecione um estado</option>
									<?php foreach ($estados as $estado) : ?>
										<option value="<?php echo $estado->cd_uf ?>" <?php echo ($res->uf_cinema == $estado->cd_uf) ? 'selected' : '' ?>><?php echo $estado->ds_uf_nome ?></option>
									<?php endforeach; ?>
								</select>
                            </div>

                            <div class="span6">
                            	<label for="cidade">Cidade: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('cidade'); ?></span></small></label>
								<select name="cidade" class="input-block-level" id="cidade">
									<option value="">Selecione uma cidade</option>
									<?php foreach ($cidades as $cidade) : ?>
										<option value="<?php echo $cidade->cd_cidade ?>" <?php echo ($res->cidade_cinema == $cidade->cd_cidade) ? 'selected' : '' ?>><?php echo $cidade->ds_cidade_nome ?></option>
									<?php endforeach; ?>
								</select>
                            </div>

                            <div class="span5">
                            	</br>
                            	<label for="bairro">Bairro: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('bairro'); ?></span></small></label>
								<select name="bairro" class="input-block-level" id="bairro">
									<option value="">Selecione um bairro</option>
									<?php foreach ($bairros as $bairro) : ?>
										<option value="<?php echo $bairro->cd_bairro ?>" <?php echo ($res->bairro_cinema == $bairro->cd_bairro) ? 'selected' : '' ?>><?php echo $bairro->ds_bairro_nome ?></option>
									<?php endforeach; ?>
								</select>
                            </div>

                            <div class="span6">
                            	</br>
                            	<label for="rua">Rua: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('rua'); ?></span></small></label>
								<input type="text" name="rua" id="rua" value="<?php echo $res->rua_cinema ?>" class="input-block-level">
                            </div>

                            <div class="span5">
                            	</br>
                            	<label for="numero">Numero: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('numero'); ?></span></small></label>
								<input type="text" name="numero" id="numero" value="<?php echo $res->num_cinema ?>" class="input-block-level">
                            </div>

                            <div class="span6">
                            	</br>
                            	<label for="cep">Cep: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('cep'); ?></span></small></label>
								<input type="text" name="cep" id="cep" value="<?php echo $res->cep_cinema ?>" class="input-block-level maskCep">
                            </div>

                            <div class="span5">
                            	</br>
                            	<label for="longitude">Longitude: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('longitude'); ?></span></small></label>
								<input type="text" name="longitude" id="longitude" value="<?php echo $res->long_cinema ?>" class="input-block-level">
                            </div>

                            <div class="span6">
                            	</br>
                            	<label for="latitude">Latitude: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('latitude'); ?></span></small></label>
								<input type="text" name="latitude" id="latitude" value="<?php echo $res->lati_cinema ?>" class="input-block-level">
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Contatos</label>
                            </div>

                            <div class="span5">
                                <label>Atendimento:</label>
                                <input class="input-block-level maskTelefone" value="<?php echo $res->fone_cinema ?>" name="num_atendimento" type="text" placeholder="">
                            </div>

                            <div class="span6">
                                <label>E-mail:</label>
                                <input name="email" class="input-block-level" value="<?php echo $res->email_cinema ?>" name="email" type="text" placeholder="">
                            </div>

                            <div class="span11">
                            	</br>
                                <label>Site:</label>
                                <input name="site" class="input-block-level" value="<?php echo $res->site_cinema ?>" name="site" type="text">
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Preços</label>
                            </div>

                            <div class="span11">
                                <table class="table table-bordered table-striped">
									<thead>
										<tr class="info">
											<td><strong>Dia / Tilulo</strong></td>
											<td><strong><input class="input-block-level" name="t_1_cinema" type="text" value="<?php echo $res->t_1_cinema ?>" placeholder="Inteira"></strong></td>
											<td><strong><input class="input-block-level" name="t_2_cinema" type="text" value="<?php echo $res->t_2_cinema ?>" placeholder="Meia"></strong></td>
											<td><strong><input class="input-block-level" name="t_3_cinema" type="text" value="<?php echo $res->t_3_cinema ?>" placeholder="3D"></strong></td>
											<td><strong><input class="input-block-level" name="t_4_cinema" type="text" value="<?php echo $res->t_4_cinema ?>" placeholder="Meia 3D"></strong></td>
										</tr>
									</thead>

									<tbody>
										<tr>
											<td><strong>Domingo:</strong></td>
											<td><input class="input-block-level" name="dom_1_cinema" type="text" value="<?php echo $res->dom_1_cinema ?>" placeholder="15,00"></td>
											<td><input class="input-block-level" name="dom_2_cinema" type="text" value="<?php echo $res->dom_2_cinema ?>" placeholder="11,00"></td>
											<td><input class="input-block-level" name="dom_3_cinema" type="text" value="<?php echo $res->dom_3_cinema ?>" placeholder="30,00"></td>
											<td><input class="input-block-level" name="dom_4_cinema" type="text" value="<?php echo $res->dom_4_cinema ?>" placeholder="15,00"></td>
										</tr>

										<tr>
											<td><strong>Segunda:</strong></td>
											<td><input class="input-block-level" name="seg_1_cinema" type="text" value="<?php echo $res->seg_1_cinema ?>" placeholder="15,00"></td>
											<td><input class="input-block-level" name="seg_2_cinema" type="text" value="<?php echo $res->seg_2_cinema ?>" placeholder="11,00"></td>
											<td><input class="input-block-level" name="seg_3_cinema" type="text" value="<?php echo $res->seg_3_cinema ?>" placeholder="30,00"></td>
											<td><input class="input-block-level" name="seg_4_cinema" type="text" value="<?php echo $res->seg_4_cinema ?>" placeholder="15,00"></td>
										</tr>

										<tr>
											<td><strong>Terça:</strong></td>
											<td><input class="input-block-level" name="ter_1_cinema" type="text" value="<?php echo $res->ter_1_cinema ?>" placeholder="15,00"></td>
											<td><input class="input-block-level" name="ter_2_cinema" type="text" value="<?php echo $res->ter_2_cinema ?>" placeholder="11,00"></td>
											<td><input class="input-block-level" name="ter_3_cinema" type="text" value="<?php echo $res->ter_3_cinema ?>" placeholder="30,00"></td>
											<td><input class="input-block-level" name="ter_4_cinema" type="text" value="<?php echo $res->ter_4_cinema ?>" placeholder="15,00"></td>
										</tr>

										<tr>
											<td><strong>Quarta:</strong></td>
											<td><input class="input-block-level" name="qua_1_cinema" type="text" value="<?php echo $res->qua_1_cinema ?>" placeholder="15,00"></td>
											<td><input class="input-block-level" name="qua_2_cinema" type="text" value="<?php echo $res->qua_2_cinema ?>" placeholder="11,00"></td>
											<td><input class="input-block-level" name="qua_3_cinema" type="text" value="<?php echo $res->qua_3_cinema ?>" placeholder="30,00"></td>
											<td><input class="input-block-level" name="qua_4_cinema" type="text" value="<?php echo $res->qua_4_cinema ?>" placeholder="15,00"></td>
										</tr>

										<tr>
											<td><strong>Quinta:</strong></td>
											<td><input class="input-block-level" name="qui_1_cinema" type="text" value="<?php echo $res->qui_1_cinema ?>" placeholder="15,00"></td>
											<td><input class="input-block-level" name="qui_2_cinema" type="text" value="<?php echo $res->qui_2_cinema ?>" placeholder="11,00"></td>
											<td><input class="input-block-level" name="qui_3_cinema" type="text" value="<?php echo $res->qui_3_cinema ?>" placeholder="30,00"></td>
											<td><input class="input-block-level" name="qui_4_cinema" type="text" value="<?php echo $res->qui_4_cinema ?>" placeholder="15,00"></td>
										</tr>

										<tr>
											<td><strong>Sexta:</strong></td>
											<td><input class="input-block-level" name="sex_1_cinema" type="text" value="<?php echo $res->sex_1_cinema ?>" placeholder="15,00"></td>
											<td><input class="input-block-level" name="sex_2_cinema" type="text" value="<?php echo $res->sex_2_cinema ?>" placeholder="11,00"></td>
											<td><input class="input-block-level" name="sex_3_cinema" type="text" value="<?php echo $res->sex_3_cinema ?>" placeholder="30,00"></td>
											<td><input class="input-block-level" name="sex_4_cinema" type="text" value="<?php echo $res->sex_4_cinema ?>" placeholder="15,00"></td>
										</tr>

										<tr>
											<td><strong>Sábado:</strong></td>
											<td><input class="input-block-level" name="sab_1_cinema" type="text" value="<?php echo $res->sab_1_cinema ?>" placeholder="15,00"></td>
											<td><input class="input-block-level" name="sab_2_cinema" type="text" value="<?php echo $res->sab_2_cinema ?>" placeholder="11,00"></td>
											<td><input class="input-block-level" name="sab_3_cinema" type="text" value="<?php echo $res->sab_3_cinema ?>" placeholder="30,00"></td>
											<td><input class="input-block-level" name="sab_4_cinema" type="text" value="<?php echo $res->sab_4_cinema ?>" placeholder="15,00"></td>
										</tr>

										<tr>
											<td><strong>Feriado:</strong></td>
											<td><input class="input-block-level" name="fer_1_cinema" type="text" value="<?php echo $res->fer_1_cinema ?>" placeholder="15,00"></td>
											<td><input class="input-block-level" name="fer_2_cinema" type="text" value="<?php echo $res->fer_2_cinema ?>" placeholder="11,00"></td>
											<td><input class="input-block-level" name="fer_3_cinema" type="text" value="<?php echo $res->fer_3_cinema ?>" placeholder="30,00"></td>
											<td><input class="input-block-level" name="fer_4_cinema" type="text" value="<?php echo $res->fer_4_cinema ?>" placeholder="15,00"></td>
										</tr>
									</tbody>
								</table>
                            </div>

                            <div class="span11">
								<label class="titulo-separator">Categoria</label>
							</div>

							<div class="span11">
								<?php $_categoria = explode(",", $res->categoria_cinema); ?>
								<p><strong>Atividade:</strong></p>
								<label class="checkbox inline">
									<input type="checkbox" id="categoria" name="categoria[]" value="assistir" <?php echo (in_array('assistir', $_categoria)) ? 'checked' : ''; ?>> Assistir
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="categoria" name="categoria[]" value="comprar" <?php echo (in_array('comprar', $_categoria)) ? 'checked' : ''; ?>> Comprar
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="categoria" name="categoria[]" value="dancar" <?php echo (in_array('dancar', $_categoria)) ? 'checked' : ''; ?>> Dançar
								</label>

								</br></br>
								<p><strong>Público:</strong></p>
								<label class="checkbox inline">
									<input type="checkbox" id="categoria" name="categoria[]" value="adolecentes" <?php echo (in_array('adolecentes', $_categoria)) ? 'checked' : ''; ?>> Adolecentes
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="categoria" name="categoria[]" value="adultos" <?php echo (in_array('adultos', $_categoria)) ? 'checked' : ''; ?>> Adultos
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="categoria" name="categoria[]" value="criancas" <?php echo (in_array('criancas', $_categoria)) ? 'checked' : ''; ?>> Crianças
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="categoria" name="categoria[]" value="idosos" <?php echo (in_array('idosos', $_categoria)) ? 'checked' : ''; ?>> Idosos
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="categoria" name="categoria[]" value="jovens" <?php echo (in_array('jovens', $_categoria)) ? 'checked' : ''; ?>> Jovens
								</label>
							</div>

                            <div class="span11">
								<label class="titulo-separator">Formas de pagamento</label>
							</div>

							<div class="span11">
								<?php $_formaPagamento = explode(",", $res->pag_cinema); ?>	
								<label class="checkbox inline">
									<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="dinheiro" <?php echo (in_array('dinheiro', $_formaPagamento)) ? 'checked' : ''; ?>> Dinheiro
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="visa" <?php echo (in_array('visa', $_formaPagamento)) ? 'checked' : ''; ?>> Visa
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="master" <?php echo (in_array('master', $_formaPagamento)) ? 'checked' : ''; ?>> Master Card
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="hiper" <?php echo (in_array('hiper', $_formaPagamento)) ? 'checked' : ''; ?>> Hiper Card
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="diners" <?php echo (in_array('diners', $_formaPagamento)) ? 'checked' : ''; ?>> Diners
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="elo" <?php echo (in_array('elo', $_formaPagamento)) ? 'checked' : ''; ?>> Elo
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="american" <?php echo (in_array('american', $_formaPagamento)) ? 'checked' : ''; ?>> American
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="visaelectro" <?php echo (in_array('visaelectro', $_formaPagamento)) ? 'checked' : ''; ?>> Visa Eletro
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="paggo" <?php echo (in_array('paggo', $_formaPagamento)) ? 'checked' : ''; ?>> Paggo
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="redeshop" <?php echo (in_array('redeshop', $_formaPagamento)) ? 'checked' : ''; ?>> Redeshop
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="vr" <?php echo (in_array('vr', $_formaPagamento)) ? 'checked' : ''; ?>> Vale Refeição
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="aura" <?php echo (in_array('aura', $_formaPagamento)) ? 'checked' : ''; ?>> Aura
								</label>
								</br>
								<label class="checkbox inline">
									<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="toppremium" <?php echo (in_array('toppremium', $_formaPagamento)) ? 'checked' : ''; ?>> Top Premium
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="sodexo" <?php echo (in_array('sodexo', $_formaPagamento)) ? 'checked' : ''; ?>> Sodexo
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="sodexopass" <?php echo (in_array('sodexopass', $_formaPagamento)) ? 'checked' : ''; ?>> Sodexo Pass
								</label>
							</div>

	                        <div class="span11">
                                <label class="titulo-separator">Acessível</label>
                            </div>

                            <div class="span11">
                            	<?php $_adaptado = explode(",", $res->adaptado_cinema); ?>
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
                                </label>

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
						<?php } } ?>
					</div><!-- Padd -->

					<div class="widget-foot">
						<input type="hidden" name="id" value="<?php echo $res->id_cinema ?>">
						<input type="hidden" name="imgAtual" value="<?php echo $res->logo_cinema ?>">
						<input type="submit" class="btn btn-success pull-right" name="cadastrar" value="Atualizar cinema" />
						<p>Os campos marcados com <strong>(*)</strong>, são obrigatórios.</p>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
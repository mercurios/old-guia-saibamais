<div class="row">
	<form name="edtRestaurante" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('restaurantes/update') ?>">
		<div class="span12">
			<?php if (isset($msg)) : echo $msg; endif; ?>
			<div class="widget">
				<div class="widget-head">
					<div class="pull-left"><i class="icon-pencil"></i> Editar restaurantes</div>
					<div class="widget-icons pull-right"></div>  
					<div class="clearfix"></div>
				</div>

				<div class="widget-content padding-left-35">
					<div class="padd">
						<?php if (!empty($restaurante)) { foreach ($restaurante as $res) : ?>
							<div class="row">
								<div class="span11">
									<label class="titulo-separator">Informações Básicas</label>
								</div>

								<div class="span2">
									<span class="thumbnail">
										<?php echo image_thumb('../uploads/logos/' . $res->logo_restaurante, 250, 200 ); ?>
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
									<input type="text" class="input-block-level" id="nome" name="nome" value="<?php echo $res->nome_restaurante ?>" />	
								</div>

								<div class="span6">
									<label>Descrição: <span class="text-error">*</span><small><span class="text-error"><?php echo form_error('descricao'); ?></span></small></label>
									<textarea class="input-block-level" rows="5" name="descricao"><?php echo $res->desc_restaurante ?></textarea>
								</div>

								<div class="span11">
	                                <label class="titulo-separator">Redes Sociais</label>
	                            </div>

	                            <div class="span5">
	                                <label>Twitter:</label>
	                                <input class="input-block-level" name="twitter" type="text" value="<?php echo $res->twitter_restaurante ?>" />
	                            </div>

	                            <div class="span6">
	                                <label>Facebook:</label>
	                                <input class="input-block-level" name="facebook" type="text" value="<?php echo $res->facebook_restaurante ?>" />
	                            </div>

	                            <div class="span5">
	                            	</br>
	                                <label>Youtube:</label>
	                                <input class="input-block-level" name="youtube" type="text" value="<?php echo $res->youtube_restaurante ?>" />
	                            </div>

	                            <div class="span6">
	                            	</br>
	                                <label>Instagram:</label>
	                                <input class="input-block-level" name="instagram" type="text" value="<?php echo $res->insta_restaurante ?>" />
	                            </div>

	                            <div class="span5">
	                            	</br>
	                                <label>Flickr:</label>
	                                <input class="input-block-level" name="flickr" type="text" value="<?php echo $res->flickr_restaurante ?>" />
	                            </div>

	                            <div class="span6">
	                            	</br>
	                                <label>Google +:</label>
	                                <input class="input-block-level" name="google" type="text" value="<?php echo $res->googleplus_restaurante ?>" />
	                            </div>

	                            <div class="span11">
	                            </br>
	                                <label>Orkut:</label>
	                                <input class="input-block-level" name="orkut" type="text" value="<?php echo $res->orkut_restaurante ?>" />
	                            </div>

	                            <div class="span11">
	                                <label class="titulo-separator">Localidade</label>
	                            </div>

	                            <div class="span5">
	                            	<label for="estado">Estado: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('estado'); ?></span></small></label>
									<select name="estado" class="input-block-level" id="estado">
										<option value="">Selecione um estado</option>
										<?php foreach ($estados as $estado) : ?>
											<option value="<?php echo $estado->cd_uf ?>" <?php echo ($res->uf_restaurante == $estado->cd_uf) ? 'selected' : '' ?>><?php echo $estado->ds_uf_nome ?></option>
										<?php endforeach; ?>
									</select>
	                            </div>

	                            <div class="span6">
	                            	<label for="cidade">Cidade: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('cidade'); ?></span></small></label>
									<select name="cidade" class="input-block-level" id="cidade">
										<option value="">Selecione uma cidade</option>
										<?php foreach ($cidades as $cidade) : ?>
											<option value="<?php echo $cidade->cd_cidade ?>" <?php echo ($res->cidade_restaurante == $cidade->cd_cidade) ? 'selected' : '' ?>><?php echo $cidade->ds_cidade_nome ?></option>
										<?php endforeach; ?>
									</select>
	                            </div>

	                            <div class="span5">
	                            	</br>
	                            	<label for="bairro">Bairro: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('bairro'); ?></span></small></label>
									<select name="bairro" class="input-block-level" id="bairro">
										<option value="">Selecione um bairro</option>
										<?php foreach ($bairros as $bairro) : ?>
											<option value="<?php echo $bairro->cd_bairro ?>" <?php echo ($res->bairro_restaurante == $bairro->cd_bairro) ? 'selected' : '' ?>><?php echo $bairro->ds_bairro_nome ?></option>
										<?php endforeach; ?>
									</select>
	                            </div>

	                            <div class="span6">
	                            	</br>
	                            	<label for="rua">Rua: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('rua'); ?></span></small></label>
									<input type="text" name="rua" id="rua" value="<?php echo $res->rua_restaurante ?>" class="input-block-level">
	                            </div>

	                            <div class="span5">
	                            	</br>
	                            	<label for="numero">Numero: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('numero'); ?></span></small></label>
									<input type="text" name="numero" id="numero" value="<?php echo $res->num_restaurante ?>" class="input-block-level">
	                            </div>

	                            <div class="span6">
	                            	</br>
	                            	<label for="cep">Cep: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('cep'); ?></span></small></label>
									<input type="text" name="cep" id="cep" value="<?php echo $res->cep_restaurante ?>" class="input-block-level maskCep">
	                            </div>

	                            <div class="span5">
	                            	</br>
	                            	<label for="longitude">Longitude: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('longitude'); ?></span></small></label>
									<input type="text" name="longitude" id="longitude" value="<?php echo $res->long_restaurante ?>" class="input-block-level">
	                            </div>

	                            <div class="span6">
	                            	</br>
	                            	<label for="latitude">Latitude: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('latitude'); ?></span></small></label>
									<input type="text" name="latitude" id="latitude" value="<?php echo $res->lati_restaurante ?>" class="input-block-level">
	                            </div>

	                            <div class="span11">
	                                <label class="titulo-separator">Contato</label>
	                            </div>

	                            <div class="span5">
	                                <label>Atendimento:</label>
	                                <input class="input-block-level maskTelefone" value="<?php echo $res->fone_atend_restaurante ?>" name="num_atendimento" type="text" placeholder="">
	                            </div>

	                            <div class="span6">
	                                <label>Disk-Entrega:</label>
	                                <input class="input-block-level maskTelefone" value="<?php echo $res->fone_entrega_restaurante ?>" name="num_entrega" type="text" placeholder="">
	                            </div>

	                            <div class="span5">
	                            	</br>
	                                <label>E-mail:</label>
	                                <input name="email" class="input-block-level" value="<?php echo $res->email_restaurante ?>" name="email" type="text" placeholder="">
	                            </div>

	                            <div class="span6">
	                            	</br>
	                                <label>Site:</label>
	                                <input name="site" class="input-block-level" value="<?php echo $res->site_restaurante ?>" name="site" type="text">
	                            </div>

	                            <div class="span11">
	                                <label class="titulo-separator">Horário de funcionamento</label>
	                            </div>

	                            <div class="span11">
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
	                                            <td><input class="input-block-level" value="<?php echo $res->h_dom ?>" name="h_dom" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
	                                        </tr>

	                                        <tr>
	                                            <td><strong>Segunda:</strong></td>
	                                            <td><input class="input-block-level" value="<?php echo $res->h_seg ?>" name="h_seg" type="text" placeholder="Não funcionamos" maxlength="31"></td>
	                                        </tr>

	                                        <tr>
	                                            <td><strong>Terça:</strong></td>
	                                            <td><input class="input-block-level" value="<?php echo $res->h_ter ?>" name="h_ter" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
	                                        </tr>

	                                        <tr>
	                                            <td><strong>Quarta:</strong></td>
	                                            <td><input class="input-block-level" value="<?php echo $res->h_qua ?>" name="h_qua" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
	                                        </tr>

	                                        <tr>
	                                            <td><strong>Quinta:</strong></td>
	                                            <td><input class="input-block-level" value="<?php echo $res->h_qui ?>" name="h_qui" type="text" placeholder="18:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
	                                        </tr>

	                                        <tr>
	                                            <td><strong>Sexta:</strong></td>
	                                            <td><input class="input-block-level" value="<?php echo $res->h_sex ?>" name="h_sex" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
	                                        </tr>

	                                        <tr>
	                                            <td><strong>Sábado:</strong></td>
	                                            <td><input class="input-block-level" value="<?php echo $res->h_sab ?>" name="h_sab" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
	                                        </tr>
	                                    </tbody>
	                                </table>
	                            </div>

	                            <div class="span11">
									<label class="titulo-separator">Formas de pagamento</label>
								</div>

								<div class="span11">
									<?php $_formaPagamento = explode(",", $res->pag_restaurante); ?>	
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
									<label class="titulo-separator">Informações Extras</label>
								</div>

								<div class="span11">
									<?php $_infoExtras = explode(",", $res->extra_restaurante); ?>
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
	                            	<?php $_tipoCozinha = explode(",", $res->tipo_cozinha_restaurante); ?>
	                                <label><strong>Tipo de cozinha</strong></label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoCozinha[]" value="africanas" <?php echo (in_array('africanas', $_tipoCozinha)) ? 'checked' : ''; ?>> Africanas
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoCozinha[]" value="arabes" <?php echo (in_array('arabes', $_tipoCozinha)) ? 'checked' : ''; ?>> Árabe
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoCozinha[]" value="brasileiras" <?php echo (in_array('brasileiras', $_tipoCozinha)) ? 'checked' : ''; ?>> Brasileira 
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoCozinha[]" value="europeias" <?php echo (in_array('europeias', $_tipoCozinha)) ? 'checked' : ''; ?>> Europeia
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoCozinha[]" value="italianas" <?php echo (in_array('italianas', $_tipoCozinha)) ? 'checked' : ''; ?>> Italiana
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoCozinha[]" value="latinas" <?php echo (in_array('latinas', $_tipoCozinha)) ? 'checked' : ''; ?>> Latinas
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoCozinha[]" value="orientais" <?php echo (in_array('orientais', $_tipoCozinha)) ? 'checked' : ''; ?>> Orientais
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoCozinha[]" value="regionais" <?php echo (in_array('regionais', $_tipoCozinha)) ? 'checked' : ''; ?>> Regional
	                                </label>
	                            </div><!-- /span11 -->

	                            <div class="span11">
	                            	<?php $_tipoComida = explode(",", $res->tipo_comida_restaurante); ?>
	                                <div>&nbsp</div>
	                                <label><strong>Tipo de comida</strong></label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="carnes" <?php echo (in_array('carnes', $_tipoComida)) ? 'checked' : ''; ?>> Carne
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="crustaceos" <?php echo (in_array('crustaceos', $_tipoComida)) ? 'checked' : ''; ?>> Crustáceos
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="especiais" <?php echo (in_array('especiais', $_tipoComida)) ? 'checked' : ''; ?>> Light / Especiais 
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="massas" <?php echo (in_array('massas', $_tipoComida)) ? 'checked' : ''; ?>> Massa
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="naturais" <?php echo (in_array('naturais', $_tipoComida)) ? 'checked' : ''; ?>> Natural
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="peixes" <?php echo (in_array('peixes', $_tipoComida)) ? 'checked' : ''; ?>> Peixes
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="vegetais" <?php echo (in_array('vegetais', $_tipoComida)) ? 'checked' : ''; ?>> Vegetais
	                                </label>
	                            </div><!-- /span11 -->

	                            <div class="span11">
	                            	<?php $_tipoServico = explode(",", $res->tipo_servico_restaurante); ?>
	                                <div>&nbsp</div>
	                                <label><strong>Tipo de Serviço</strong></label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoServico[]" value="alacartes" <?php echo (in_array('alacartes', $_tipoServico)) ? 'checked' : ''; ?>> A lá carte
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoServico[]" value="delivery" <?php echo (in_array('delivery', $_tipoServico)) ? 'checked' : ''; ?>> Delivery
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoServico[]" value="drive-thrur" <?php echo (in_array('drive-thrur', $_tipoServico)) ? 'checked' : ''; ?>> Drive-thrur 
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoServico[]" value="rodizios" <?php echo (in_array('rodizios', $_tipoServico)) ? 'checked' : ''; ?>> Rodizio
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoServico[]" value="self-service" <?php echo (in_array('self-service', $_tipoServico)) ? 'checked' : ''; ?>> Self-Serviçe
	                                </label>
	                            </div>

	                            <div class="span11">
                                <label class="titulo-separator">Adaptado</label>
                            </div>

                            <div class="span11">
                            	<?php $_adaptado = explode(",", $res->adaptado_restaurante); ?>
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
					</div><!-- Padd -->

					<div class="widget-foot">
						<input type="hidden" name="id" value="<?php echo $res->id_restaurante ?>">
						<input type="hidden" name="imgAtual" value="<?php echo $res->logo_restaurante ?>">
						<p class="pull-right">Os campos marcados com <strong>(*)</strong>, são obrigatórios.</p>
						<input type="submit" class="btn btn-success" name="atualizar" value="Atualizar restaurante" />
					</div>
					<?php endforeach; } else { echo 'Não existe restaurante com o ID informado.'; } ?>
				</div>
			</div>
		</div>
	</form>
</div>
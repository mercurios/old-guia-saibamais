<div class="row">
	<form name="newexposicao" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('exposicoes/update') ?>">
		<div class="span12">
			<div class="widget">
				<div class="widget-head">
					<div class="pull-left"><i class="icon-pencil"></i> Editar exposições</div>
					<div class="widget-icons pull-right"></div>  
					<div class="clearfix"></div>
				</div>

				<?php if (!empty($exposicao)) { foreach ($exposicao as $res) { ?>
				<div class="widget-content padding-left-35">
					<div class="padd">
						<div class="row">
							<div class="span11">
								<label class="titulo-separator">Informações Básicas</label>
							</div>

							<div class="span2">
								<span class="thumbnail">
									<?php echo $this->biblioteca->image_thumb('../uploads/logos/' . $res->logo_exposicao, 250, 200 ); ?>
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
								<input type="text" class="input-block-level" id="nome" name="nome" value="<?php echo $res->nome_exposicao ?>" />	
							</div>

							<div class="span6">
								<label>Descrição: <span class="text-error">*</span><small><span class="text-error"><?php echo form_error('descricao'); ?></span></small></label>
								<textarea class="input-block-level" rows="5" name="descricao"><?php echo $res->desc_exposicao ?></textarea>
							</div>

							<div class="span11">
								</br>
								<label for="data">Data:</label>
								<input type="text" class="input-block-level" id="data" name="data" value="<?php echo $res->data_exposicao ?>" placeholder="ex: 30, 31 de novembro" />
							</div>

							<div class="span5">
								</br>
								<label for="horario">Horário:</label>
								<input type="text" class="input-block-level" id="horario" name="horario" value="<?php echo $res->horario_exposicao ?>" placeholder="ex: Das 19:20 ás 21:00" />
							</div>

							<div class="span6">
								</br>
								<label for="censura">Censura:</label>
								<input type="text" class="input-block-level" id="censura" name="censura" value="<?php echo $res->censura_exposicao ?>" placeholder="ex: 12 anos" />
							</div>

							<div class="span11">
                                <label class="titulo-separator">Redes Sociais</label>
                            </div>

                            <div class="span5">
                                <label>Twitter:</label>
                                <input class="input-block-level" name="twitter" type="text" value="<?php echo $res->twitter_exposicao ?>" />
                            </div>

                            <div class="span6">
                                <label>Facebook:</label>
                                <input class="input-block-level" name="facebook" type="text" value="<?php echo $res->facebook_exposicao ?>" />
                            </div>

                            <div class="span5">
                            	</br>
                                <label>Youtube:</label>
                                <input class="input-block-level" name="youtube" type="text" value="<?php echo $res->youtube_exposicao ?>" />
                            </div>

                            <div class="span6">
                            	</br>
                                <label>Instagram:</label>
                                <input class="input-block-level" name="instagram" type="text" value="<?php echo $res->insta_exposicao ?>" />
                            </div>

                            <div class="span5">
                            	</br>
                                <label>Flickr:</label>
                                <input class="input-block-level" name="flickr" type="text" value="<?php echo $res->flickr_exposicao ?>" />
                            </div>

                            <div class="span6">
                            	</br>
                                <label>Google +:</label>
                                <input class="input-block-level" name="google" type="text" value="<?php echo $res->googleplus_exposicao ?>" />
                            </div>

                            <div class="span11">
                            </br>
                                <label>Orkut:</label>
                                <input class="input-block-level" name="orkut" type="text" value="<?php echo $res->orkut_exposicao ?>" />
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Contatos</label>
                            </div>

                            <div class="span5">
                                <label>Atendimento:</label>
                                <input class="input-block-level maskTelefone" value="<?php echo $res->fone_exposicao ?>" name="num_atendimento" type="text" placeholder="">
                            </div>

                            <div class="span6">
                                <label>E-mail:</label>
                                <input name="email" class="input-block-level" value="<?php echo $res->email_exposicao ?>" name="email" type="text" placeholder="">
                            </div>

                            <div class="span11">
                            	</br>
                                <label>Site:</label>
                                <input name="site" class="input-block-level" value="<?php echo $res->site_exposicao ?>" name="site" type="text">
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Preços</label>
                            </div>

                            <div class="span11">
                                <p class="text-error"><span class="label label-warning">Aviso</span> Se o valor da exposição for Grátis, deixe os campos abaixo em branco.</p>   
                            </div>                         

                            <div class="span5">
                                </br>
                                <label>Titulo:</label>
                                <input class="input-block-level" value="<?php echo $res->titulo_preco_um ?>" name="tituloUm" type="text" placeholder="Inteira">
                            </div>

                            <div class="span6">
                                </br>
                                <label>Valor:</label>
                                <input class="input-block-level" value="<?php echo $res->val_preco_um ?>" name="valorUm" type="text" placeholder="10,00">
                            </div>

                            <div class="span5">
                                </br>
                                <label>Titulo:</label>
                                <input class="input-block-level" value="<?php echo $res->titulo_preco_dois ?>" name="tituloDois" type="text" placeholder="Meia">
                            </div>

                            <div class="span6">
                                </br>
                                <label>Valor:</label>
                                <input class="input-block-level" value="<?php echo $res->val_preco_dois ?>" name="valorDois" type="text" placeholder="10,00">
                            </div>

                            <div class="span5">
                                </br>
                                <label>Titulo:</label>
                                <input class="input-block-level" value="<?php echo $res->titulo_preco_tres ?>" name="tituloTres" type="text" placeholder="Especial">
                            </div>

                            <div class="span6">
                                </br>
                                <label>Valor:</label>
                                <input class="input-block-level" value="<?php echo $res->val_preco_tres ?>" name="valorTres" type="text" placeholder="10,00">
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Localização</label>
                            </div>

                            <div class="span5">
                            	<label for="estado">Estado: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('estado'); ?></span></small></label>
								<select name="estado" class="input-block-level" id="estado">
									<option value="">Selecione um estado</option>
									<?php foreach ($estados as $estado) : ?>
										<option value="<?php echo $estado->cd_uf ?>" <?php echo ($res->uf_exposicao == $estado->cd_uf) ? 'selected' : '' ?>><?php echo $estado->ds_uf_nome ?></option>
									<?php endforeach; ?>
								</select>
                            </div>

                            <div class="span6">
                            	<label for="cidade">Cidade: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('cidade'); ?></span></small></label>
								<select name="cidade" class="input-block-level" id="cidade">
									<option value="">Selecione uma cidade</option>
									<?php foreach ($cidades as $cidade) : ?>
										<option value="<?php echo $cidade->cd_cidade ?>" <?php echo ($res->cidade_exposicao == $cidade->cd_cidade) ? 'selected' : '' ?>><?php echo $cidade->ds_cidade_nome ?></option>
									<?php endforeach; ?>
								</select>
                            </div>

                            <div class="span5">
                            	</br>
                            	<label for="bairro">Bairro: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('bairro'); ?></span></small></label>
								<select name="bairro" class="input-block-level" id="bairro">
									<option value="">Selecione um bairro</option>
									<?php foreach ($bairros as $bairro) : ?>
										<option value="<?php echo $bairro->cd_bairro ?>" <?php echo ($res->bairro_exposicao == $bairro->cd_bairro) ? 'selected' : '' ?>><?php echo $bairro->ds_bairro_nome ?></option>
									<?php endforeach; ?>
								</select>
                            </div>

                            <div class="span6">
                            	</br>
                            	<label for="rua">Rua: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('rua'); ?></span></small></label>
								<input type="text" name="rua" id="rua" value="<?php echo $res->rua_exposicao ?>" class="input-block-level">
                            </div>

                            <div class="span5">
                            	</br>
                            	<label for="numero">Numero: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('numero'); ?></span></small></label>
								<input type="text" name="numero" id="numero" value="<?php echo $res->num_exposicao ?>" class="input-block-level">
                            </div>

                            <div class="span6">
                            	</br>
                            	<label for="cep">Cep: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('cep'); ?></span></small></label>
								<input type="text" name="cep" id="cep" value="<?php echo $res->cep_exposicao ?>" class="input-block-level maskCep">
                            </div>

                            <div class="span5">
                            	</br>
                            	<label for="longitude">Longitude: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('longitude'); ?></span></small></label>
								<input type="text" name="longitude" id="longitude" value="<?php echo $res->long_exposicao ?>" class="input-block-level">
                            </div>

                            <div class="span6">
                            	</br>
                            	<label for="latitude">Latitude: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('latitude'); ?></span></small></label>
								<input type="text" name="latitude" id="latitude" value="<?php echo $res->lati_exposicao ?>" class="input-block-level">
                            </div>

                            <div class="span11">
								<label class="titulo-separator">Formas de pagamento</label>
							</div>

							<div class="span11">
								<?php $_formaPagamento = explode(",", $res->pag_exposicao); ?>	
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
								<label class="titulo-separator">Categoria</label>
							</div>

							<div class="span11">
                                <?php $_categoria = explode(",", $res->categoria_exposicao); ?>
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
						</div>
					</div><!-- Padd -->

					<div class="widget-foot">
                        <input type="hidden" name="id" value="<?php echo $res->id_exposicao ?>" />
                        <input type="hidden" name="imgAtual" value="<?php echo $res->logo_exposicao ?>" />                        
						<input type="submit" class="btn btn-success pull-right" name="cadastrar" value="Editar exposição" />
						<p>Os campos marcados com <strong>(*)</strong>, são obrigatórios.</p>
					</div>
				</div>
				<?php } }  ?>
			</div>
		</div>
	</form>
</div>
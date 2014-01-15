<div class="row">
	<form name="newlanchonete" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('lanchonetes/save') ?>">
		<div class="span12">
			<div class="widget">
				<div class="widget-head">
					<div class="pull-left"><i class="icon-plus"></i> Cadastrar lanchonetes</div>
					<div class="widget-icons pull-right"></div>  
					<div class="clearfix"></div>
				</div>

				<div class="widget-content padding-left-35">
					<div class="padd">
							<div class="row">
								<div class="span11">
									<label class="titulo-separator">Informações Básicas</label>
								</div>

								<div class="span5">
									<label for="nome">Nome: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('nome'); ?></span></small></label>
									<input type="text" class="input-block-level" id="nome" name="nome" value="" />

									</br></br>

									<label>Logo: 
										<span class="badge badge-info tool" 
										title="Atenção: Só são permitidos imagens de no máximo 2MB, caso o tamanho exceda ou voçê tente enviar outro arquivo que não seja imagem, o programa altomaticamente irá salva sua imagem como NULA." 										data-placement="top" rel="popover"><i class="icon-info"></i></span>
									</label>
									<input type="file" name="logo" class="filestyle" data-buttonText="Selecionar aquivo">	
								</div>

								<div class="span6">
									<label>Descrição: <span class="text-error">*</span><small><span class="text-error"><?php echo form_error('descricao'); ?></span></small></label>
									<textarea class="input-block-level" rows="5" name="descricao"></textarea>
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
	                                <label>Atendimento:</label>
	                                <input class="input-block-level maskTelefone" name="num_atendimento" type="text" placeholder="">
	                            </div>

	                            <div class="span6">
	                                <label>Disk-Entrega:</label>
	                                <input class="input-block-level maskTelefone" name="num_entrega" type="text" placeholder="">
	                            </div>

	                            <div class="span5">
	                            	</br>
	                                <label>E-mail:</label>
	                                <input name="email" class="input-block-level" name="email" type="text" placeholder="">
	                            </div>

	                            <div class="span6">
	                            	</br>
	                                <label>Site:</label>
	                                <input name="site" class="input-block-level" name="site" type="text">
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
	                                            <td><input class="input-block-level" name="h_dom" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
	                                        </tr>

	                                        <tr>
	                                            <td><strong>Segunda:</strong></td>
	                                            <td><input class="input-block-level" name="h_seg" type="text" placeholder="Não funcionamos" maxlength="31"></td>
	                                        </tr>

	                                        <tr>
	                                            <td><strong>Terça:</strong></td>
	                                            <td><input class="input-block-level" name="h_ter" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
	                                        </tr>

	                                        <tr>
	                                            <td><strong>Quarta:</strong></td>
	                                            <td><input class="input-block-level" name="h_qua" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
	                                        </tr>

	                                        <tr>
	                                            <td><strong>Quinta:</strong></td>
	                                            <td><input class="input-block-level" name="h_qui" type="text" placeholder="18:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
	                                        </tr>

	                                        <tr>
	                                            <td><strong>Sexta:</strong></td>
	                                            <td><input class="input-block-level" name="h_sex" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
	                                        </tr>

	                                        <tr>
	                                            <td><strong>Sábado:</strong></td>
	                                            <td><input class="input-block-level" name="h_sab" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
	                                        </tr>
	                                    </tbody>
	                                </table>
	                            </div>

	                            <div class="span11">
									<label class="titulo-separator">Formas de pagamento</label>
								</div>

								<div class="span11">
									<label class="checkbox inline">
										<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="dinheiro"> Dinheiro
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="visa"> Visa
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="master"> Master Card
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="hiper"> Hiper Card
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="diners"> Diners
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="elo"> Elo
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="american"> American
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="visaelectro"> Visa Eletro
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="paggo"> Paggo
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="redeshop"> Redeshop
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="vr"> Vale Refeição
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="aura"> Aura
									</label>
									</br>
									<label class="checkbox inline">
										<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="toppremium"> Top Premium
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="sodexo"> Sodexo
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="formaPagamento" name="formaPagamento[]" value="sodexopass"> Sodexo Pass
									</label>
								</div>

								<div class="span11">
									<label class="titulo-separator">Extras do local</label>
								</div>

								<div class="span11">
									<label class="checkbox inline">
										<input type="checkbox" id="infoExtras" name="infoExtras[]" value="wifi"> Wifi
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="infoExtras" name="infoExtras[]" value="piscina"> Piscina
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="infoExtras" name="infoExtras[]" value="cafe-da-manha"> Café da manhã
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="infoExtras" name="infoExtras[]" value="estacionamento"> Estacionamento
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="infoExtras" name="infoExtras[]" value="shows-ao-vivo"> Show ao vivo
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="infoExtras" name="infoExtras[]" value="lutas-ao-vivo"> Luta ao vivo
									</label>

									<label class="checkbox inline">
										<input type="checkbox" id="infoExtras" name="infoExtras[]" value="jogos-ao-vivo"> Jogos ao vivo
									</label>
								</div>

								<div class="span11">
	                                <label class="titulo-separator">Sobre o cardápio</label>
	                            </div>

	                            <div class="span11">
	                                <label><strong>Tipo de lanchonete:</strong></label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLanchonete[]" value="doces"> Doces
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLanchonete[]" value="gelados"> Gelados
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLanchonete[]" value="massas"> Massas 
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLanchonete[]" value="especiais"> Light / Especiais
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLanchonete[]" value="naturais"> Naturais
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLanchonete[]" value="salgados"> Salgados
	                                </label>
	                            </div><!-- /span11 -->

	                            <div class="span11">
	                                <div>&nbsp</div>
	                                <label><strong>Tipo de comida</strong></label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="acai"> Açaí
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="crepes"> Crepes
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="doces"> Doces
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="fondue"> Fondue
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="hamburguers"> Hamburguers
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="iorgutes"> Iorgute
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="pasteis"> Pasteis
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="pizzas"> Pizzas
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="salgados"> Salgados
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="sanduiches"> Sanduiches
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="sorvete-picole"> Sorvetes / Picolés
	                                </label>
	                                </br>
	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="sushi-temaki"> Sushi / Temakis
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="outros"> Outros
	                                </label>
	                            </div><!-- /span11 -->

	                            <div class="span11">
	                                <div>&nbsp</div>
	                                <label><strong>Tipo de Serviço</strong></label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoServico[]" value="fast-food"> Fast-food
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoServico[]" value="delivery"> Delivery
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoServico[]" value="drive-thrur"> Drive-thrur 
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="tipoServico[]" value="rodizios"> Rodizio
	                                </label>
	                            </div>

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
                                </label>

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
					</div><!-- Padd -->

					<div class="widget-foot">
						<input type="submit" class="btn btn-success pull-right" name="cadastrar" value="Cadastrar lanchonete" />
						<p>Os campos marcados com <strong>(*)</strong>, são obrigatórios.</p>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
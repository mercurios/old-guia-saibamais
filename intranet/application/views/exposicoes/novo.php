<div class="row">
	<form name="newRestaurante" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('exposicoes/save') ?>">
		<div class="span12">
			<div class="widget">
				<div class="widget-head">
					<div class="pull-left"><i class="icon-plus"></i> Cadastrar exposições</div>
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

							<div class="span5">
								</br>
								<label for="data">Data:</label>
								<input type="text" class="input-block-level" id="data" name="data" value="" placeholder="ex: 30, 31 de novembro" />
							</div>

							<div class="span6">
								</br>
								<label for="horario">Horário:</label>
								<input type="text" class="input-block-level" id="horario" name="horario" value="" placeholder="ex: Das 19:20 ás 21:00" />
							</div>

							<div class="span11">
								</br>
								<label for="censura">Censura:</label>
								<input type="text" class="input-block-level" id="censura" name="censura" value="" placeholder="ex: 12 anos" />
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
                                <label class="titulo-separator">Contatos</label>
                            </div>

                            <div class="span5">
                                <label>Atendimento:</label>
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
                                <label class="titulo-separator">Preços</label>
                            </div>

                            <div class="span11">
                                <p class="text-error"><span class="label label-warning">Aviso</span> Se o valor da exposição for Grátis, deixe os campos abaixo em branco.</p>   
                            </div>                         

                            <div class="span5">
                                </br>
                                <label>Titulo:</label>
                                <input class="input-block-level" name="tituloUm" type="text" placeholder="Inteira">
                            </div>

                            <div class="span6">
                                </br>
                                <label>Valor:</label>
                                <input class="input-block-level" name="valorUm" type="text" placeholder="10,00">
                            </div>

                            <div class="span5">
                                </br>
                                <label>Titulo:</label>
                                <input class="input-block-level" name="tituloDois" type="text" placeholder="Meia">
                            </div>

                            <div class="span6">
                                </br>
                                <label>Valor:</label>
                                <input class="input-block-level" name="valorDois" type="text" placeholder="10,00">
                            </div>

                            <div class="span5">
                                </br>
                                <label>Titulo:</label>
                                <input class="input-block-level" name="tituloTres" type="text" placeholder="Especial">
                            </div>

                            <div class="span6">
                                </br>
                                <label>Valor:</label>
                                <input class="input-block-level" name="valorTres" type="text" placeholder="10,00">
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
								<label class="titulo-separator">Categoria</label>
							</div>

							<div class="span11">
								<p><strong>Atividade:</strong></p>
								<label class="checkbox inline">
									<input type="checkbox" id="categoria" name="categoria[]" value="assistir"> Assistir
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="categoria" name="categoria[]" value="comprar"> Comprar
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="categoria" name="categoria[]" value="dancar"> Dançar
								</label>

								</br></br>
								<p><strong>Público:</strong></p>
								<label class="checkbox inline">
									<input type="checkbox" id="categoria" name="categoria[]" value="adolecentes"> Adolecentes
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="categoria" name="categoria[]" value="adultos"> Adultos
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="categoria" name="categoria[]" value="criancas"> Crianças
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="categoria" name="categoria[]" value="idosos"> Idosos
								</label>

								<label class="checkbox inline">
									<input type="checkbox" id="categoria" name="categoria[]" value="jovens"> Jovens
								</label>
							</div>
						</div>
					</div><!-- Padd -->

					<div class="widget-foot">
						<input type="submit" class="btn btn-success pull-right" name="cadastrar" value="Cadastrar exposição" />
						<p>Os campos marcados com <strong>(*)</strong>, são obrigatórios.</p>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
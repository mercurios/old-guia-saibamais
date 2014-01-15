<div class="conteudo">
	<div id="publicidade_superior" class="publicidade">
		<div class="conteudo_publicidade">
			<div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider">
				<?php if (isset($pub_top)) { foreach ($pub_top as $pubtop) { ?>
					<div class="item-slider">
						<a href="<?php echo $pubtop->link_publicidade; ?>" title="" target="<?php echo ($pubtop->newtab_publicidade == 0 ? '_self' : '_blank' ); ?>">
							<?php echo image_thumb('uploads/publicidades/' . $pubtop->img_vd_publicidade, 914, 90 ); ?>
						</a>
					</div>
				<?php } } ?>
			</div>
		</div>
	</div><!-- Publicidade -->
</div>

<!-- Conteudo
================================================== -->
<div id="conteudo" class="">
	<div class="conteudo">
		<?php foreach ($conteudo as $restaurante) : ?>
		<div id="area_conteudo_superior">
			<div id="topo_pagina_anunciante" class="">
				<div id="redes_sociais_pagina">
					<ul>
						<li><a href="<?php echo $restaurante->flickr_restaurante; ?>" target="_blank" title="Flickr"><img src="<?php echo base_url('assets'); ?>/images/flickr_icon.jpg" alt="RS" /></a></li>
						<li><a href="<?php echo $restaurante->insta_restaurante; ?>" target="_blank" title="Instagram"><img src="<?php echo base_url('assets'); ?>/images/instagram_icon.jpg" alt="RS" /></a></li>
						<li><a href="<?php echo $restaurante->youtube_restaurante; ?>" target="_blank" title="Youtube"><img src="<?php echo base_url('assets'); ?>/images/youtube_icon.jpg" alt="RS" /></a></li>
						<li><a href="<?php echo $restaurante->orkut_restaurante; ?>" target="_blank" title="Orkut"><img src="<?php echo base_url('assets'); ?>/images/orkut_icon.jpg" alt="RS" /></a></li>
						<li><a href="<?php echo $restaurante->googleplus_restaurante; ?>" target="_blank" title="Google Plus"><img src="<?php echo base_url('assets'); ?>/images/gplus_icon.jpg" alt="RS" /></a></li>
						<li><a href="<?php echo $restaurante->twitter_restaurante; ?>" target="_blank" title="Twitter"><img src="<?php echo base_url('assets'); ?>/images/twitter_icon.jpg" alt="RS" /></a></li>
						<li><a href="<?php echo $restaurante->facebook_restaurante; ?>" target="_blank" title="Facebook"><img src="<?php echo base_url('assets'); ?>/images/facebook_icon.jpg" alt="RS" /></a></li>
					</ul>
				</div>
				<div id="logo_topo_pagina_anunciante" class="">
					<?php if (empty($restaurante->logo_restaurante)) { ?>
						<img src="<?php echo base_url('tim.php?src=uploads/logos/default.jpg&w=366&h=267'); ?>" alt="" />
					<?php } else { ?>
						<img src="<?php echo base_url('tim.php?src=uploads/logos/'. $restaurante->logo_restaurante .'&w=366&h=267'); ?>" alt="" />
					<?php } ?>
					<h3><?php echo $restaurante->nome_restaurante; ?></h3>
				</div>
				<div id="contatos_pagina">
					<div class="contatos_pagina">
						<h4 class="titulo_contatos_pagina">Telefone:</h4> 
						<h6><?php echo $restaurante->fone_atend_restaurante; ?></h6>
					</div>
					<div class="contatos_pagina">
						<h4  class="titulo_contatos_pagina">Site:</h4>
						<h6><?php echo $restaurante->site_restaurante; ?></h6>
					</div>
					<div class="contatos_pagina">
						<h4  class="titulo_contatos_pagina">E-mail:</h4>
						<h6><?php echo $restaurante->email_restaurante; ?></h6>
					</div>
				</div>
			</div>
		</div>

		<!-- Esquerda
		================================================== -->
		<div id="area_conteudo_esquerda">
			<div id="album">
				<div class="topo_area_pagina">
					<img src="<?php echo base_url('assets'); ?>/images/icone_foto.png" class="icone_area_pagina" />
					<h1 class="titulo_area_pagina">Fotos</h1>
				</div>
				</br></br></br>
				<div class="albun_fotos">	
					<div class="cycle-slideshow" 
						data-cycle-fx=fade
						data-cycle-pager="#adv-custom-pager"
						data-cycle-pager-template="<a href=#><img src='{{src}}' width=80 height=80></a>"
						>
						<?php if (!empty($fotos)) { foreach ($fotos as $foto) { ?>
							<img src="<?php echo base_url('tim.php?src=uploads/fotos/'. $foto->img_foto .'&w=666&h=400'); ?>" alt="" />
						<?php } } else { ?>
							<img src="<?php echo base_url('tim.php?src=uploads/fotos/default.jpg&w=666&h=400'); ?>" alt="" />
						<?php } ?>
					</div>
					<!-- empty element for pager links -->
					<div id=adv-custom-pager class="center external"></div>
				</div>
			</div><!-- /album -->

			<div id="cardapio">
				<div class="topo_area_pagina">
					<img src="<?php echo base_url('assets'); ?>/images/icone_cardapio.png" class="icone_area_pagina" />
					<h1 class="titulo_area_pagina">Cardápio</h1>
				</div>

				<p id="abas">
					<a href="#pratos_principais" class="selected">Pratos principais</a>
					<a href="#outros_pratos">Outros pratos</a>
					<a href="#pratos_bebidas">Bebidas</a>
				</p><!-- /Titulo abas -->

				<ul id="conteudo_cardapio">
					<li id="pratos_principais">
						<?php 
						if (isset($p_principal)) { 
							foreach ($p_principal as $pratop) {
						?>
						<div class="pratos_cardapio">
							<div class="pratos_cardapio_esquerda">
								<h4><?php echo $pratop->nome_prato; ?></h4>
								<p>R$ <?php echo $pratop->desc_prato; ?></p>
							</div>
							<div class="pratos_cardapio_direita">
								<div class="preco_cardapio">
									<h5><?php echo $pratop->titulo_preco_um; ?></h5>
									<p>R$ <?php echo $pratop->valor_preco_um; ?></p>
								</div>
								<div class="preco_cardapio">
									<h5><?php echo $pratop->titulo_preco_dois; ?></h5>
									<p>R$ <?php echo $pratop->valor_preco_dois; ?></p>
								</div>
								<div class="preco_cardapio">
									<h5><?php echo $pratop->titulo_preco_tres; ?></h5>
									<p>R$ <?php echo $pratop->valor_preco_tres; ?></p>
								</div>
							</div>
							<div class="linha_separatoria"></div>
						</div>
						
						<?php 
							} 
						}
						?>
					</li><!-- /pratos-principais -->

					<li id="outros_pratos">
						<?php 
						if (isset($p_normal)) { 
							foreach ($p_normal as $pnormal) {
						?>
						<div class="pratos_cardapio">
							<div class="pratos_cardapio_esquerda">
								<h4><?php echo $pnormal->nome_prato; ?></h4>
								<p><?php echo $pnormal->desc_prato; ?></p>
							</div>
							<div class="pratos_cardapio_direita">
								<div class="preco_cardapio">
									<h5><?php echo $pnormal->titulo_preco_um; ?></h5>
									<p>R$ <?php echo $pnormal->valor_preco_um; ?></p>
								</div>
								<div class="preco_cardapio">
									<h5><?php echo $pnormal->titulo_preco_dois; ?></h5>
									<p>R$ <?php echo $pnormal->valor_preco_dois; ?></p>
								</div>
								<div class="preco_cardapio">
									<h5><?php echo $pnormal->titulo_preco_tres; ?></h5>
									<p>R$ <?php echo $pnormal->valor_preco_tres; ?></p>
								</div>
							</div>
						</div>
						<div class="linha_separatoria"></div>
						<?php 
							} 
						}
						?>
					</li><!-- /outros-pratos -->

					<li id="pratos_bebidas">
						<?php 
						if (isset($bebidas)) { 
							foreach ($bebidas as $bebida) {
						?>
						<div class="pratos_cardapio">
							<div class="pratos_cardapio_esquerda">
								<h4><?php echo $bebida->nome_prato; ?></h4>
								<p><?php echo $bebida->desc_prato; ?></p>
							</div>
							<div class="pratos_cardapio_direita">
								<div class="preco_cardapio">
									<h5><?php echo $bebida->titulo_preco_um; ?></h5>
									<p><?php echo $bebida->valor_preco_um; ?></p>
								</div>
								<div class="preco_cardapio">
									<h5><?php echo $bebida->titulo_preco_dois; ?></h5>
									<p><?php echo $bebida->valor_preco_dois; ?></p>
								</div>
								<div class="preco_cardapio">
									<h5><?php echo $bebida->titulo_preco_tres; ?></h5>
									<p><?php echo $bebida->valor_preco_tres; ?></p>
								</div>
							</div>
						</div>
						<div class="linha_separatoria"></div>
						<?php 
							} 
						}
						?>
					</li><!-- /pratos-bebidas -->
				</ul><!-- /abas -->
			</div><!-- /cardapio -->

			<div id="promocoes">
				<div class="topo_area_pagina">
					<img src="<?php echo base_url('assets'); ?>/images/icone_promocao.png" class="icone_area_pagina" />
					<h1 class="titulo_area_pagina">Promoções</h1>
				</div>
				<div class="promocao">
					<img src="" alt="" />
					<h3>Titulo da Promoção</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam blandit euismod viverra. Ut accumsan odio tincidunt ipsum feugiat eu sodales lacus condimentum. Nulla sapien elit, aliquet eu aliquam id, feugiat ut velit. Aliquam leo nibh, convallis ac consectetur non, pretium non purus. Proin mi massa, eu</p>
					<h4>Data ou dia da promoção:<span>32/13/1900</span></h4>
				</div>
			</div>
		</div><!-- /esquerda -->

		<!-- Direita
		================================================== -->
		<div id="area_conteudo_direita">

			<div id="descricao_pagina">
				<div class="topo_area_pagina">
					<img src="<?php echo base_url('assets'); ?>/images/icone_descricao.png" class="icone_area_pagina" />
					<h1 class="titulo_area_pagina">Descrição</h1>
				</div>
				<p class="texto_pagina">
					<?php echo $restaurante->desc_restaurante; ?>
				</p>
			</div><!-- /descriçao -->

			<div id="endereco_pagina">
				<div id="" class="topo_area_pagina">
					<img src="<?php echo base_url('assets'); ?>/images/icone_place.png" class="icone_area_pagina" />
					<h1 class="titulo_area_pagina">Endereço</h1>
				</div>
				<?php echo $map['html']; ?>
				<div id="directionsDiv"></div>
			</div><!-- /endereco -->

			<div id="funcionamento_pagina">
				<div class="topo_area_pagina">
					<img src="<?php echo base_url('assets'); ?>/images/icone_relogio.png" class="icone_area_pagina" />
					<h1 class="titulo_area_pagina">Funcionamento</h1>
				</div>
				<div class="funcionamento_pagina_semana">
					<h4>Domingo</h4>
					<p><?php echo $restaurante->h_dom; ?></p>
				</div>
				<div class="linha_separatoria"></div>
				<div class="funcionamento_pagina_semana">
					<h4>Segunda-feira</h4>
					<p><?php echo $restaurante->h_seg; ?></p>
				</div>
				<div class="linha_separatoria"></div>
				<div class="funcionamento_pagina_semana">
					<h4>Terça-feira</h4>
					<p><?php echo $restaurante->h_ter; ?></p>
				</div>
				<div class="linha_separatoria"></div>
				<div class="funcionamento_pagina_semana">
					<h4>Quarta-feira</h4>
					<p><?php echo $restaurante->h_qua; ?></p>
				</div>
				<div class="linha_separatoria"></div>
				<div class="funcionamento_pagina_semana">
					<h4>Quinta-feira</h4>
					<p><?php echo $restaurante->h_qui; ?></p>
				</div>
				<div class="linha_separatoria"></div>
				<div class="funcionamento_pagina_semana">
					<h4>Sexta-feira</h4>
					<p><?php echo $restaurante->h_sex; ?></p>
				</div>
				<div class="linha_separatoria"></div>
				<div class="funcionamento_pagina_semana">
					<h4>Sábado</h4>
					<p><?php echo $restaurante->h_sab; ?></p>
				</div>
			</div><!-- /funcionamento -->

			<div id="extras">
				<div id="" class="topo_area_pagina">
					<img src="<?php echo base_url('assets'); ?>/images/icone_acessivel.png" class="icone_area_pagina" />
					<h1 class="titulo_area_pagina">Extras do local</h1>
				</div>
				<?php $extras = explode(',', $restaurante->extra_restaurante); 
				if (in_array('wifi', $extras)) { echo '<img src="'. base_url('assets') .'/images/icone_wifi.jpg" alt="Wi-fi" title="Não possui Wi-fi" class="icone_esquerda"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_wifi_claro.jpg" alt="Wi-fi" title="Não possui Wi-fi" class="icone_esquerda"/>'; }

				if (in_array('piscina', $extras)) { echo '<img src="'. base_url('assets') .'/images/icone_piscina.jpg" alt="Estacionamento" title="Não possui estacionamento" class="icone_esquerda"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_piscina_claro.jpg" alt="Estacionamento" title="Não possui estacionamento" class="icone_esquerda"/>'; }

				if (in_array('cafe-da-manha', $extras)) { echo '<img src="'. base_url('assets') .'/images/icone_pao.jpg" alt="Piscina" title="Não possui piscina" class="icone_esquerda"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_pao_claro.jpg" alt="Piscina" title="Não possui piscina" class="icone_esquerda"/>'; }

				if (in_array('estacionamento', $extras)) { echo '<img src="'. base_url('assets') .'/images/icone_estacionamento.jpg" alt="Café da Manhã" title="Não possui café da manhã incluso" class="icone_esquerda"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_estacionamento_claro.jpg" alt="Café da Manhã" title="Não possui café da manhã incluso" class="icone_esquerda"/>'; }

				if (in_array('shows-ao-vivo', $extras)) { echo '<img src="'. base_url('assets') .'/images/icone_musica.jpg" alt="Musica" title="Não possui shows ao vivo" class="icone_esquerda"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_musica_claro.jpg" alt="Musica" title="Não possui shows ao vivo" class="icone_esquerda"/>'; }

				if (in_array('lutas-ao-vivo', $extras)) { echo '<img src="'. base_url('assets') .'/images/icone_ufc.jpg" alt="UFC" title="Não possui lutas transmitidas ao vivo" class="icone_esquerda"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_ufc_claro.jpg" alt="UFC" title="Não possui lutas transmitidas ao vivo" class="icone_esquerda"/>'; }

				if (in_array('jogos-ao-vivo', $extras)) { echo '<img src="'. base_url('assets') .'/images/icone_pfc.jpg" alt="PFC" title="Não possui jogos transmitidos ao vivo" class="icone_esquerda"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_pfc_claro.jpg" alt="PFC" title="Não possui jogos transmitidos ao vivo" class="icone_esquerda"/>'; }
				?>
			</div><!-- /extras -->

			<div id="formas_pagamento">
				<div id="" class="topo_area_pagina">
					<img src="<?php echo base_url('assets'); ?>/images/icone_valor.png" class="icone_area_pagina" />
					<h1 class="titulo_area_pagina">Formas de pagamento</h1>
				</div>
				<?php $pagamento = explode(',', $restaurante->pag_restaurante);
				if (in_array('dinheiro', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_dinheiro.jpg" alt="Não aceitamos pagamento com dinheiro" title="Dinheiro" class="icone_esquerda"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_dinheiro_claro.jpg" alt="Não aceitamos pagamento com dinheiro" title="Dinheiro" class="icone_esquerda"/>'; }

				if (in_array('visa', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_visa.jpg" alt="Visa crédito" title="Não aceitamos pagamento com visa crédito" class="icone_esquerda"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_visa_claro.jpg" alt="Visa crédito" title="Não aceitamos pagamento com visa crédito" class="icone_esquerda"/>'; }

				if (in_array('master', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_master.jpg" alt="Não aceitamos pagamento com master Card" title="Master Card" class="icone_esquerda"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_master_claro.jpg" alt="Não aceitamos pagamento com master Card" title="Master Card" class="icone_esquerda"/>'; }

				if (in_array('hiper', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_hiper.jpg" alt="HiperCard" title="Não aceitamos pagamento com hiperCard" class="icone_direita"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_hiper_claro.jpg" alt="HiperCard" title="Não aceitamos pagamento com hiperCard" class="icone_direita"/>'; }

				if (in_array('diners', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_diners.jpg" alt="Diners club" title="Não aceitamos pagamento com diners club" class="icone_esquerda"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_diners_claro.jpg" alt="Diners club" title="Não aceitamos pagamento com diners club" class="icone_esquerda"/>'; }

				if (in_array('elo', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_elo.jpg" alt="Elo" title="Não aceitamos pagamento com elo" class="icone_esquerda"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_elo_claro.jpg" alt="Elo" title="Não aceitamos pagamento com elo" class="icone_esquerda"/>'; }

				if (in_array('american', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_american.jpg" alt="American" title="Não aceitamos pagamento com american express" class="icone_esquerda"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_american_claro.jpg" alt="American" title="Não aceitamos pagamento com american express" class="icone_esquerda"/>'; }

				if (in_array('visaelectro', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_visaelectron.jpg" alt="Não aceitamos pagamento com visa Electron" title="Visa Electron" class="icone_direita"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_visaelectron_claro.jpg" alt="Não aceitamos pagamento com visa Electron" title="Visa Electron" class="icone_direita"/>'; }

				if (in_array('paggo', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_paggo.jpg" alt="Paggo" title="Não aceitamos pagamento com paggo" class="icone_esquerda"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_paggo_claro.jpg" alt="Paggo" title="Não aceitamos pagamento com paggo" class="icone_esquerda"/>'; }

				if (in_array('redeshop', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_redeshop.jpg" alt="RedeShop" title="Não aceitamos pagamento com redeShop" class="icone_esquerda"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_redeshop_claro.jpg" alt="RedeShop" title="Não aceitamos pagamento com redeShop" class="icone_esquerda"/>'; }

				if (in_array('vr', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_vr.jpg" alt="VR" title="Não aceitamos pagamento com VR" class="icone_esquerda"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_vr_claro.jpg" alt="VR" title="Não aceitamos pagamento com VR" class="icone_esquerda"/>'; }

				if (in_array('aura', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_aura.jpg" alt="Aura" title="Não aceitamos pagamento com aura" class="icone_direita"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_aura_claro.jpg" alt="Aura" title="Não aceitamos pagamento com aura" class="icone_direita"/>'; }

				if (in_array('toppremium', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_top.jpg" alt="Top premium" title="Não aceitamos pagamento com top premium" class="icone_grande_esquerda"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_top_claro.jpg" alt="Top premium" title="Não aceitamos pagamento com top premium" class="icone_grande_esquerda"/>'; }

				if (in_array('sodexo', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_sodexo.jpg" alt="Sodexo" title="Não aceitamos pagamento com sodexo" class="icone_grande_esquerda"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_sodexo_claro.jpg" alt="Sodexo" title="Não aceitamos pagamento com sodexo" class="icone_grande_esquerda"/>'; }

				if (in_array('sodexopass', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_sodexopass.jpg" alt="Sodexo Pass" title="Não aceitamos pagamento com sodexo Pass" class="icone_grande_direita"/>'; }
				else { echo '<img src="'. base_url('assets') .'/images/icone_sodexopass_claro.jpg" alt="Sodexo Pass" title="Não aceitamos pagamento com sodexo Pass" class="icone_grande_direita"/>'; }
				?>
			</div><!-- /formapagamento -->

			<div id="adaptado">
				<div id="" class="topo_area_pagina">
					<img src="<?php echo base_url('assets'); ?>/images/icone_acessivel.png" class="icone_area_pagina" />
					<h1 class="titulo_area_pagina">Acessível para</h1>
				</div>
				<?php $adaptado = explode(',', $restaurante->adaptado_restaurante);
				if (in_array('cego', $adaptado)){ echo '<img src="'. base_url() .'assets/images/icone_cego.jpg" alt="Cego" title="Deficientes visuais e cegos" class="icone_esquerda "/>'; }
				else { echo '<img src="'. base_url() .'assets/images/icone_cego_claro.jpg" alt="Cego" title="Deficientes visuais e cegos" class="icone_esquerda "/>'; }

				if (in_array('surdo', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_surdo.jpg" alt="Surdo" title="Deficientes auditivos e surdos" class="icone_esquerda "/>'; }
				else { echo '<img src="'. base_url() .'assets/images/icone_surdo_claro.jpg" alt="Surdo" title="Deficientes auditivos e surdos" class="icone_esquerda "/>'; }

				if (in_array('deficientefisico', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_deficiente.jpg" alt="Deficiente físico" title="Deficientes físicos" class="icone_esquerda "/>'; }
				else { echo '<img src="'. base_url() .'assets/images/icone_deficiente_claro.jpg" alt="Deficiente físico" title="Deficientes físicos" class="icone_esquerda "/>'; }

				if (in_array('braile', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_braille.jpg" alt="Braille" title="Braille" class="icone_direita "/>'; }
				else { echo '<img src="'. base_url() .'assets/images/icone_braille_claro.jpg" alt="Braille" title="Braille" class="icone_direita "/>'; }

				if (in_array('obeso', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_obeso.jpg" alt="Obeso" title="Pessoas com obesidade" class="icone_esquerda "/>'; }
				else { echo '<img src="'. base_url() .'assets/images/icone_obeso_claro.jpg" alt="Obeso" title="Pessoas com obesidade" class="icone_esquerda "/>'; }

				if (in_array('idoso', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_idoso.jpg" alt="Idoso" title="Idosos" class="icone_esquerda "/>'; }
				else { echo '<img src="'. base_url() .'assets/images/icone_idoso_claro.jpg" alt="Idoso" title="Idosos" class="icone_esquerda "/>'; }

				if (in_array('gestante', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_gestante.jpg" alt="Gestante" title="Gestantes" class="icone_esquerda "/>'; }
				else { echo '<img src="'. base_url() .'assets/images/icone_gestante_claro.jpg" alt="Gestante" title="Gestantes" class="icone_esquerda "/>'; }

				if (in_array('bebe', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_bebe.jpg" alt="Bebe" title="Recém nascidos ou Crianças de colo" class="icone_direita "/>'; }
				else { echo '<img src="'. base_url() .'assets/images/icone_bebe_claro.jpg" alt="Bebe" title="Recém nascidos ou Crianças de colo" class="icone_direita "/>'; }
				?>
			</div><!-- /adaptado -->
		</div><!-- /direita -->

	<?php endforeach; ?>

	</div><!-- /fim da classe conteudo -->
</div><!-- /conteudo -->

<div class="conteudo">
	<div id="publicidade_inferior" class="publicidade">
		<div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider">
			<?php
			if (isset($pub_bottom)) {
				foreach ($pub_bottom as $pubbottom) {
			?>
			<div class="item-slider">
				<a href="<?php echo $pubbottom->link_publicidade; ?>" title="<?php echo $pubbottom->titulo_publicidade; ?>" target="<?php echo ($pubbottom->newtab_publicidade == 0 ? '_self' : '_blank' ); ?>">
					<?php echo image_thumb('uploads/publicidades/' . $pubbottom->img_vd_publicidade, 980, 170, '', '', '' ); ?>
				</a>
			</div>
			<?php }} ?>
		</div>
	</div>
</div><!-- /publicidade -->
</div>
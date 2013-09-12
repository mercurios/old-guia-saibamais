<div id="publicidade_superior">
    <!-- Publicidade -->
</div>

<!-- Conteudo
================================================== -->
<div id="conteudo">
	<?php foreach ($conteudo as $lanchonete) : ?>
	<div id="area_conteudo_superior">
        <div id="topo_pagina_anunciante" class="">
            <div id="redes_sociais_pagina">
                <ul>
                    <li><a href="<?php echo $lanchonete->flickr_lanchonete; ?>" target="_blank" title="Flickr"><img src="<?php echo base_url('assets'); ?>/images/flickr_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $lanchonete->insta_lanchonete; ?>" target="_blank" title="Instagram"><img src="<?php echo base_url('assets'); ?>/images/instagram_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $lanchonete->youtube_lanchonete; ?>" target="_blank" title="Youtube"><img src="<?php echo base_url('assets'); ?>/images/youtube_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $lanchonete->orkut_lanchonete; ?>" target="_blank" title="Orkut"><img src="<?php echo base_url('assets'); ?>/images/orkut_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $lanchonete->googleplus_lanchonete; ?>" target="_blank" title="Google Plus"><img src="<?php echo base_url('assets'); ?>/images/gplus_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $lanchonete->twitter_lanchonete; ?>" target="_blank" title="Twitter"><img src="<?php echo base_url('assets'); ?>/images/twitter_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $lanchonete->facebook_lanchonete; ?>" target="_blank" title="Facebook"><img src="<?php echo base_url('assets'); ?>/images/facebook_icon.jpg" alt="RS" /></a></li>
                </ul>
            </div>
            <div id="logo_topo_pagina_anunciante" class="">
            	<?php 
            	if (empty($lanchonete->logo_lanchonete)) {
            		echo '<img src="'.base_url().'tim.php?src=uploads/logos/default.jpg&w=366&h=267" alt="Logo do anunciante" />';
            	}
            	else {
            		echo '<img src="'.base_url().'tim.php?src=uploads/logos/'. $lanchonete->logo_lanchonete .'&w=366&h=267" alt="Logo do anunciante" />';
            	}
            	?>
                <h3><?php echo $lanchonete->nome_lanchonete; ?></h3>
            </div>
            <div id="contatos_pagina">
                <div class="contatos_pagina">
                    <h4 class="titulo_contatos_pagina">Telefone:</h4> 
                    <h6><?php echo $lanchonete->fone_atend_lanchonete; ?></h6>
                </div>
                <div class="contatos_pagina">
                    <h4  class="titulo_contatos_pagina">Site:</h4>
                    <h6><?php echo $lanchonete->site_lanchonete; ?></h6>
                </div>
                <div class="contatos_pagina">
                    <h4  class="titulo_contatos_pagina">E-mail:</h4>
                    <h6><?php echo $lanchonete->email_lanchonete; ?></h6>
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
            <div class="albun_fotos">
                <ul id="pikame" class="jcarousel-skin-pika">
                	<?php
                	if (isset($fotos)) {
                		foreach ($fotos as $foto) {
                	?>
                    <li><img src="<?php echo base_url(); ?>tim.php?src=uploads/fotos/<?php echo $foto->img_foto; ?>&w=644"/></li>
                    <?php
                		}
                	}
                	else {
                		echo '<li><img src="'.base_url().'uploads/fotos/default.jpg"/></li>';
                	}
                	?>
                </ul>
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
					</div>
					<div class="linha_separatoria"></div>
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
			<?php  
			if (isset($promocoes)) {
				foreach ($promocoes as $promocao) {

					$_dataini 		= $promocao->data_inicio;
					$_dataini 		= explode(' ', $_dataini);
					$_data_inicio 	= $_dataini[0];
					$_data_inicio 	= explode('-', $_data_inicio);
					$_data_inicio	= $_data_inicio[2] . '/' . $_data_inicio[1] . '/' . $_data_inicio[0];

					$_datafim 	= $promocao->data_final;
					$_datafim 	= explode(' ', $_datafim);
					$_data_fim 	= $_datafim[0];
					$_data_fim 	= explode('-', $_data_fim);
					$_data_fim 	= $_data_fim[2] . '/' . $_data_fim[1] . '/' . $_data_fim[0];
					
					echo 'Essa promoção é válida de: '. $_data_inicio .' a '. $_data_fim .'<br>';
			?>
	    	<!--<div class="promocao">
	        	<img src="" alt="" />
	            <h3><?php echo $promocao->titulo_promocao; ?></h3>
	            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam blandit euismod viverra. Ut accumsan odio tincidunt ipsum feugiat eu sodales lacus condimentum. Nulla sapien elit, aliquet eu aliquam id, feugiat ut velit. Aliquam leo nibh, convallis ac consectetur non, pretium non purus. Proin mi massa, eu</p>
	            <h4>Data ou dia da promoção:<span>dsdfdfdf</span></h4>
	        </div>-->

	        <?php
				}
			}
			else {
				echo 'Nenhuma promoção cadastrada para esse cliente.';
			}
			?>
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
				<?php echo $lanchonete->desc_lanchonete; ?>
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
				<p><?php echo $lanchonete->h_dom; ?></p>
			</div>
			<div class="linha_separatoria"></div>
			<div class="funcionamento_pagina_semana">
				<h4>Segunda-feira</h4>
				<p><?php echo $lanchonete->h_seg; ?></p>
			</div>
			<div class="linha_separatoria"></div>
			<div class="funcionamento_pagina_semana">
				<h4>Terça-feira</h4>
				<p><?php echo $lanchonete->h_ter; ?></p>
			</div>
			<div class="linha_separatoria"></div>
			<div class="funcionamento_pagina_semana">
				<h4>Quarta-feira</h4>
				<p><?php echo $lanchonete->h_qua; ?></p>
			</div>
			<div class="linha_separatoria"></div>
			<div class="funcionamento_pagina_semana">
				<h4>Quinta-feira</h4>
				<p><?php echo $lanchonete->h_qui; ?></p>
			</div>
			<div class="linha_separatoria"></div>
			<div class="funcionamento_pagina_semana">
				<h4>Sexta-feira</h4>
				<p><?php echo $lanchonete->h_sex; ?></p>
			</div>
			<div class="linha_separatoria"></div>
			<div class="funcionamento_pagina_semana">
				<h4>Sábado</h4>
				<p><?php echo $lanchonete->h_sab; ?></p>
			</div>
		</div><!-- /funcionamento -->

		<div id="extras">
			<div id="" class="topo_area_pagina">
				<img src="<?php echo base_url('assets'); ?>/images/icone_acessivel.png" class="icone_area_pagina" />
				<h1 class="titulo_area_pagina">Extras do local</h1>
			</div>
			<?php $extras = explode(',', $lanchonete->extra_lanchonete);
			if (in_array('wifi', $extras)) { echo '<img src="'. base_url('assets') .'/images/icone_wifi.jpg" alt="Wi-fi" title="Wi-fi" class="icone_esquerda"/>'; }
			if (in_array('estacionamento', $extras)) { echo '<img src="'. base_url('assets') .'/images/icone_estacionamento.jpg" alt="Estacionamento" title="Estacionamento fácil" class="icone_esquerda"/>'; }
			if (in_array('lutas-ao-vivo', $extras)) { echo '<img src="'. base_url('assets') .'/images/icone_ufc.jpg" alt="UFC" title="Lutas transmitidas ao vivo" class="icone_esquerda"/>'; }
			if (in_array('jogos-ao-vivo', $extras)) { echo '<img src="'. base_url('assets') .'/images/icone_pfc.jpg" alt="PFC" title="Jogos transmitidos ao vivo" class="icone_direita"/>'; }
			if (in_array('shows-ao-vivo', $extras)) { echo '<img src="'. base_url('assets') .'/images/icone_musica.jpg" alt="Musica" title="Shows ao vivo" class="icone_esquerda"/>'; }
			?>
		</div><!-- /extras -->

		<div id="formas_pagamento">
			<div id="" class="topo_area_pagina">
				<img src="<?php echo base_url('assets'); ?>/images/icone_valor.png" class="icone_area_pagina" />
				<h1 class="titulo_area_pagina">Formas de pagamento</h1>
			</div>
			<?php $pagamento = explode(',', $lanchonete->pag_lanchonete);
			if (in_array('dinheiro', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_dinheiro.jpg" alt="Dinheiro" title="Dinheiro" class="icone_esquerda"/>'; }
			if (in_array('visa', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_visa.jpg" alt="Visa crédito" title="Visa crédito" class="icone_esquerda"/>'; }
			if (in_array('master', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_master.jpg" alt="Master Card" title="Master Card" class="icone_esquerda"/>'; }
			if (in_array('hiper', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_hiper.jpg" alt="HiperCard" title="HiperCard" class="icone_direita"/>'; }
			if (in_array('diners', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_diners.jpg" alt="Diners club" title="Diners club" class="icone_esquerda"/>'; }
			if (in_array('elo', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_elo.jpg" alt="Elo" title="Elo" class="icone_esquerda"/>'; }
			if (in_array('credcard', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_credcard.jpg" alt="Credcard" title="Credcard" class="icone_esquerda"/>'; }
			if (in_array('visaelectro', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_visaelectron.jpg" alt="Visa Electron" title="Visa Electron" class="icone_direita"/>'; }
			if (in_array('paggo', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_paggo.jpg" alt="Paggo" title="Paggo" class="icone_esquerda"/>'; }
			if (in_array('redeshop', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_redeshop.jpg" alt="RedeShop" title="RedeShop" class="icone_esquerda"/>'; }
			if (in_array('vr', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_vr.jpg" alt="VR" title="VR" class="icone_esquerda"/>'; }
			if (in_array('aura', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_aura.jpg" alt="Aura" title="Aura" class="icone_direita"/>'; }
			if (in_array('toppremium', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_top.jpg" alt="Top premium" title="Top premium" class="icone_grande_esquerda"/>'; }
			if (in_array('sodexo', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_sodexo.jpg" alt="Sodexo" title="Sodexo" class="icone_grande_esquerda"/>'; }
			if (in_array('sodexopass', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_sodexopass.jpg" alt="Sodexo Pass" title="Sodexo Pass" class="icone_grande_direita"/>'; }
			?>
		</div><!-- /formapagamento -->

		<div id="adaptado">
			<div id="" class="topo_area_pagina">
				<img src="<?php echo base_url('assets'); ?>/images/icone_acessivel.png" class="icone_area_pagina" />
				<h1 class="titulo_area_pagina">Acessível para</h1>
			</div>
			<?php $adaptado = explode(',', $lanchonete->adaptado_lanchonete);
			if (in_array('cego', $adaptado)) { echo '<img src="'. base_url('assets') .'/images/icone_cego.jpg" alt="Cego" title="Deficientes visuais e cegos" class="icone_esquerda"/>'; }
			if (in_array('surdo', $adaptado)) { echo '<img src="'. base_url('assets') .'/images/icone_surdo.jpg" alt="Surdo" title="Deficientes auditivos e surdos" class="icone_esquerda"/>'; }
			if (in_array('deficientefisico', $adaptado)) { echo '<img src="'. base_url('assets') .'/images/icone_deficiente.jpg" alt="Deficiente físico" title="Deficientes físicos" class="icone_esquerda"/>'; }
			if (in_array('braile', $adaptado)) { echo '<img src="'. base_url('assets') .'/images/icone_braille.jpg" alt="Braille" title="Braille" class="icone_direita"/>'; }
			if (in_array('obeso', $adaptado)) { echo '<img src="'. base_url('assets') .'/images/icone_obeso.jpg" alt="Obeso" title="Pessoas com obesidade" class="icone_esquerda"/>'; }
			if (in_array('idoso', $adaptado)) { echo '<img src="'. base_url('assets') .'/images/icone_idoso.jpg" alt="Idoso" title="Idosos" class="icone_esquerda"/>'; }
			if (in_array('gestante', $adaptado)) { echo '<img src="'. base_url('assets') .'/images/icone_gestante.jpg" alt="Gestante" title="Gestantes" class="icone_esquerda"/>'; }
			if (in_array('bebe', $adaptado)) { echo '<img src="'. base_url('assets') .'/images/icone_bebe.jpg" alt="Bebe" title="Recém nascidos ou Crianças de colo" class="icone_direita"/>'; }
			?>
		</div><!-- /adaptado -->
    </div><!-- /direita -->

<?php endforeach; ?>
</div>

<div id="publicidade_inferior">
    <!-- Publicidade -->
</div>
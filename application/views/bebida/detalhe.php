<div id="publicidade_superior" class="publicidade">
 	<div class="conteudo_publicidade">
        <div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider">
            <?php
        	if (isset($pub_top)) {
        		foreach ($pub_top as $pubtop) {
        	?>
    		<div class="item-slider">
                    <a href="<?php echo $pubtop->link_publicidade; ?>" title="" target="<?php echo ($pubtop->newtab_publicidade == 0 ? '_self' : '_blank' ); ?>">
                        <img src="<?php echo base_url('tim.php?src=uploads/publicidades/'. $pubtop->img_vd_publicidade .'&w=914&h=90'); ?>" alt="" />
                    </a>
                </div>
        	<?php } } ?>
        </div>
    </div>
</div><!-- Publicidade -->

<!-- Conteudo
================================================== -->
<div id="conteudo">
	<?php foreach ($conteudo as $bebida) : ?>
	<div id="area_conteudo_superior">
        <div id="topo_pagina_anunciante" class="">
            <div id="redes_sociais_pagina">
                <ul>
                    <li><a href="<?php echo $bebida->flickr_bebida; ?>" target="_blank" title="Flickr"><img src="<?php echo base_url('assets'); ?>/images/flickr_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $bebida->insta_bebida; ?>" target="_blank" title="Instagram"><img src="<?php echo base_url('assets'); ?>/images/instagram_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $bebida->youtube_bebida; ?>" target="_blank" title="Youtube"><img src="<?php echo base_url('assets'); ?>/images/youtube_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $bebida->orkut_bebida; ?>" target="_blank" title="Orkut"><img src="<?php echo base_url('assets'); ?>/images/orkut_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $bebida->googleplus_bebida; ?>" target="_blank" title="Google Plus"><img src="<?php echo base_url('assets'); ?>/images/gplus_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $bebida->twitter_bebida; ?>" target="_blank" title="Twitter"><img src="<?php echo base_url('assets'); ?>/images/twitter_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $bebida->facebook_bebida; ?>" target="_blank" title="Facebook"><img src="<?php echo base_url('assets'); ?>/images/facebook_icon.jpg" alt="RS" /></a></li>
                </ul>
            </div>
            <div id="logo_topo_pagina_anunciante" class="">
            	<?php 
            	if (empty($bebida->logo_bebida)) {
            		echo '<img src="'.base_url().'tim.php?src=uploads/logos/default.jpg&w=366&h=267" alt="Logo do anunciante" />';
            	}
            	else {
            		echo '<img src="'.base_url().'tim.php?src=uploads/logos/'. $bebida->logo_bebida .'&w=366&h=267" alt="Logo do anunciante" />';
            	}
            	?>
                <h3><?php echo $bebida->nome_bebida; ?></h3>
            </div>
            <div id="contatos_pagina">
                <div class="contatos_pagina">
                    <h4 class="titulo_contatos_pagina">Telefone:</h4> 
                    <h6><?php echo $bebida->fone_atend_bebida; ?></h6>
                </div>
                <div class="contatos_pagina">
                    <h4  class="titulo_contatos_pagina">Site:</h4>
                    <h6><?php echo $bebida->site_bebida; ?></h6>
                </div>
                <div class="contatos_pagina">
                    <h4  class="titulo_contatos_pagina">E-mail:</h4>
                    <h6><?php echo $bebida->email_bebida; ?></h6>
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
				<a href="#pratos_bebidas">Bebidas</a>
			</p><!-- /Titulo abas -->

			<ul id="conteudo_cardapio">
				<li id="pratos_bebidas">
					<?php 
					if (isset($card_bebidas)) { 
						foreach ($card_bebidas as $beb) {
					?>
					<div class="pratos_cardapio">
						<div class="pratos_cardapio_esquerda">
							<h4><?php echo $beb->nome_prato; ?></h4>
							<p><?php echo $beb->desc_prato; ?></p>
						</div>
						<div class="pratos_cardapio_direita">
							<div class="preco_cardapio">
								<h5><?php echo $beb->titulo_preco_um; ?></h5>
								<p><?php echo $beb->valor_preco_um; ?></p>
							</div>
							<div class="preco_cardapio">
								<h5><?php echo $beb->titulo_preco_dois; ?></h5>
								<p><?php echo $beb->valor_preco_dois; ?></p>
							</div>
							<div class="preco_cardapio">
								<h5><?php echo $beb->titulo_preco_tres; ?></h5>
								<p><?php echo $beb->valor_preco_tres; ?></p>
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
				<?php echo $bebida->desc_bebida; ?>
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

		<div id="extras">
			<div id="" class="topo_area_pagina">
				<img src="<?php echo base_url('assets'); ?>/images/icone_acessivel.png" class="icone_area_pagina" />
				<h1 class="titulo_area_pagina">Extras do local</h1>
			</div>
			<?php $extras = explode(',', $bebida->extra_bebida);
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

		<div id="adaptado">
			<div id="" class="topo_area_pagina">
				<img src="<?php echo base_url('assets'); ?>/images/icone_acessivel.png" class="icone_area_pagina" />
				<h1 class="titulo_area_pagina">Acessível para</h1>
			</div>
			<?php $adaptado = explode(',', $bebida->adaptado_bebida);
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
</div>

<div id="publicidade_inferior" class="publicidade">
	<div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider">
		<?php
    	if (isset($pub_bottom)) {
    		foreach ($pub_bottom as $pubbottom) {
    	?>
		<div class="item-slider">
            <a href="<?php echo $pubbottom->link_publicidade; ?>" title="<?php echo $pubbottom->titulo_publicidade; ?>" target="<?php echo ($pubbottom->newtab_publicidade == 0 ? '_self' : '_blank' ); ?>">
            	<img src="<?php echo base_url('tim.php?src=/uploads/publicidades') . '/' . $pubbottom->img_vd_publicidade; ?>&w=980&h=170" alt="<?php echo $pubbottom->titulo_publicidade; ?>"/>
            </a>
        </div>
        <?php }} ?>
	</div>
</div><!-- /publicidade -->
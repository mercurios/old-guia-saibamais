<div id="publicidade_superior">
    <!-- Publicidade -->
</div>

<!-- Conteudo
================================================== -->
<div id="conteudo">
	<?php foreach ($conteudo as $estadia) : ?>
	<div id="area_conteudo_superior">
        <div id="topo_pagina_anunciante" class="">
            <div id="redes_sociais_pagina">
                <ul>
                    <li><a href="<?php echo $estadia->flickr_estadia; ?>" target="_blank" title="Flickr"><img src="<?php echo base_url('assets'); ?>/images/flickr_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $estadia->insta_estadia; ?>" target="_blank" title="Instagram"><img src="<?php echo base_url('assets'); ?>/images/instagram_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $estadia->youtube_estadia; ?>" target="_blank" title="Youtube"><img src="<?php echo base_url('assets'); ?>/images/youtube_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $estadia->orkut_estadia; ?>" target="_blank" title="Orkut"><img src="<?php echo base_url('assets'); ?>/images/orkut_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $estadia->googleplus_estadia; ?>" target="_blank" title="Google Plus"><img src="<?php echo base_url('assets'); ?>/images/gplus_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $estadia->twitter_estadia; ?>" target="_blank" title="Twitter"><img src="<?php echo base_url('assets'); ?>/images/twitter_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $estadia->facebook_estadia; ?>" target="_blank" title="Facebook"><img src="<?php echo base_url('assets'); ?>/images/facebook_icon.jpg" alt="RS" /></a></li>
                </ul>
            </div>
            <div id="logo_topo_pagina_anunciante" class="">
            	<?php 
            	if (empty($estadia->logo_estadia)) {
            		echo '<img src="'.base_url().'tim.php?src=uploads/logos/default.jpg&w=366&h=267" alt="Logo do anunciante" />';
            	}
            	else {
            		echo '<img src="'.base_url().'tim.php?src=uploads/logos/'. $estadia->logo_estadia .'&w=366&h=267" alt="Logo do anunciante" />';
            	}
            	?>
                <h3><?php echo $estadia->nome_estadia; ?></h3>
            </div>
            <div id="contatos_pagina">
                <div class="contatos_pagina">
                    <h4 class="titulo_contatos_pagina">Telefone:</h4> 
                    <h6><?php echo $estadia->fone_estadia; ?></h6>
                </div>
                <div class="contatos_pagina">
                    <h4  class="titulo_contatos_pagina">Site:</h4>
                    <h6><?php echo $estadia->site_estadia; ?></h6>
                </div>
                <div class="contatos_pagina">
                    <h4  class="titulo_contatos_pagina">E-mail:</h4>
                    <h6><?php echo $estadia->email_estadia; ?></h6>
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
				<h1 class="titulo_area_pagina">Acomodações</h1>
			</div>

			<p id="abas">
				<a href="#pratos_principais" class="selected">Acomodações</a>
				<!--<a href="#outros_pratos">Outros pratos</a>
				<a href="#pratos_bebidas">Bebidas</a>-->
			</p><!-- /Titulo abas -->

			<ul id="conteudo_cardapio">
				<li id="pratos_principais">
					<?php 
					if (isset($acomodacoes)) { 
						foreach ($acomodacoes as $acomodacao) {
					?>
					<div class="pratos_cardapio">
						<div class="pratos_cardapio_esquerda">
							<h4><?php echo $acomodacao->nome_acomodacao; ?></h4>
							<p><?php echo $acomodacao->desc_acomodacao; ?></p>
						</div>
						<div class="pratos_cardapio_direita">
							<div class="preco_cardapio">
								<h5><?php echo $acomodacao->titulo_preco_um; ?></h5>
								<p>R$ <?php echo $acomodacao->valor_preco_um; ?></p>
							</div>
							<div class="preco_cardapio">
								<h5><?php echo $acomodacao->titulo_preco_dois; ?></h5>
								<p>R$ <?php echo $acomodacao->valor_preco_dois; ?></p>
							</div>
							<div class="preco_cardapio">
								<h5><?php echo $acomodacao->titulo_preco_tres; ?></h5>
								<p>R$ <?php echo $acomodacao->valor_preco_tres; ?></p>
							</div>
						</div>
					</div>
					<div class="linha_separatoria"></div>
					<?php 
						} 
					}
					?>
				</li><!-- /pratos-principais -->

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
				<?php echo $estadia->desc_estadia; ?>
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
			<?php $extras = explode(',', $estadia->extra_estadia);
			if (in_array('wifi', $extras)) { echo '<img src="'. base_url('assets') .'/images/icone_wifi.jpg" alt="Wi-fi" title="Wi-fi" class="icone_esquerda"/>'; }
			if (in_array('estacionamento', $extras)) { echo '<img src="'. base_url('assets') .'/images/icone_estacionamento.jpg" alt="Estacionamento" title="Estacionamento fácil" class="icone_esquerda"/>'; }
			if (in_array('lutas-ao-vivo', $extras)) { echo '<img src="'. base_url('assets') .'/images/icone_ufc.jpg" alt="UFC" title="Lutas transmitidas ao vivo" class="icone_esquerda"/>'; }
			if (in_array('jogos-ao-vivo', $extras)) { echo '<img src="'. base_url('assets') .'/images/icone_pfc.jpg" alt="PFC" title="Jogos transmitidos ao vivo" class="icone_direita"/>'; }
			if (in_array('shows-ao-vivo', $extras)) { echo '<img src="'. base_url('assets') .'/images/icone_musica.jpg" alt="Musica" title="Shows ao vivo" class="icone_esquerda"/>'; }
			?>
		</div><!-- /extras -->

		<div id="adaptado">
			<div id="" class="topo_area_pagina">
				<img src="<?php echo base_url('assets'); ?>/images/icone_acessivel.png" class="icone_area_pagina" />
				<h1 class="titulo_area_pagina">Acessível para</h1>
			</div>
			<?php $adaptado = explode(',', $estadia->adaptado_estadia);
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
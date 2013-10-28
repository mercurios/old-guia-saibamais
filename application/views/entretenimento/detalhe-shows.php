<!-- /inicio da publicidade -->
<div id="publicidade_superior"></div>
<!-- /fim da publicidade -->
<!-- Conteudo
================================================== -->
<div id="conteudo">
	<div id="area_conteudo_superior"><!-- /inicio da area de conteudo superior -->
    	<div id="topo_pagina_anunciante" class="">
            <div id="redes_sociais_pagina">
                <ul>
                    <li><a href="" title="Flickr"><img src="<?php echo base_url('assets'); ?>/images/flickr_icon.jpg" alt="RS" /></a></li>
                    <li><a href="" title="Instagram"><img src="<?php echo base_url('assets'); ?>/images/instagram_icon.jpg" alt="RS" /></a></li>
                    <li><a href="" title="Youtube"><img src="<?php echo base_url('assets'); ?>/images/youtube_icon.jpg" alt="RS" /></a></li>
                    <li><a href="" title="Orkut"><img src="<?php echo base_url('assets'); ?>/images/orkut_icon.jpg" alt="RS" /></a></li>
                    <li><a href="" title="Google Plus"><img src="<?php echo base_url('assets'); ?>/images/gplus_icon.jpg" alt="RS" /></a></li>
                    <li><a href="" title="Twitter"><img src="<?php echo base_url('assets'); ?>/images/twitter_icon.jpg" alt="RS" /></a></li>
                    <li><a href="" title="Facebook"><img src="<?php echo base_url('assets'); ?>/images/facebook_icon.jpg" alt="RS" /></a></li>
                </ul>
            </div>
            <div id="logo_topo_pagina_anunciante" class="">
                <img src="<?php echo base_url('assets'); ?>/images/logo_barretos.jpg" alt="Logo do anunciante" />
                <h3>Restaurante e Pizzaria barretos</h3>
            </div>
            <div id="contatos_pagina">
                <div class="contatos_pagina">
                    <h4 class="titulo_contatos_pagina">Telefone:</h4>
                    <h6>(81) 3333.3333</h6>
                </div>
                <div class="contatos_pagina">
                    <h4  class="titulo_contatos_pagina">Site:</h4>
                    <h6>sbm.guia/barretospizzaria</h6>
                </div>
                <div class="contatos_pagina">
                    <h4  class="titulo_contatos_pagina">E-mail:</h4>
                    <h6>barretospizzaria@gmail.com</h6>
                </div>
            </div>

           
           
        </div>
	</div><!-- /fim da area de conteudo superior -->
	<div id="area_conteudo_esquerda"><!-- /inicio da area de conteudo esquerda -->  
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
        <div id="descricao_pagina_grande" class="w-grande">
            <div class="topo_area_pagina">
                <img src="<?php echo base_url('assets'); ?>/images/icone_descricao.png" class="icone_area_pagina" />
                <h1 class="titulo_area_pagina">Descrição</h1>
            </div>
                <p class="texto_pagina">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tristique elementum arcu a cursus. Integer et congue nulla. Quisque laoreet tristique imperdiet. Donec vel sollicitudin lectus. Vivamus orci lectus, tincidunt id sagittis eget, lacinia non sapien. Nulla non ligula a lacus ornare aliquet sed in lacus. Etiam viverra purus </p>
        </div>
     
        <div id="informacoes_pagina" >
            <div class="topo_area_pagina">
                <img src="<?php echo base_url('assets'); ?>/images/icone_informacao.png" class="icone_area_pagina" />
                <h1 class="titulo_area_pagina">Informações</h1>
            </div>
			<div class="informacoes_pagina">
				<h4>Data(s):</h4> 
				<h6>30, 31, 01 e 02 de janeiro</h6>
			</div>

            <div class="informacoes_pagina">
                <h4>Preço(s):</h4> 
                <div class="precos_informacoes_pagina">
                	<h6>Inteira</h6>
                    <p>R$ 30,00</p>
                </div>
                <div class="precos_informacoes_pagina">
                	<h6>Meia</h6>
                    <p>R$ 30,00</p>
                </div>
                <div class="precos_informacoes_pagina">
                	<h6>Especial</h6>
                    <p>R$ 30,00</p>
                </div>
            </div>
            <div class="informacoes_pagina">
				<h4>Horário(s):</h4> 
				<h6>Das 13:00 hs às 21:00hs</h6>
			</div>
           
            <div class="informacoes_pagina">
                <h4>Censura:</h4> 
                <h6>12 anos</h6>
            </div>
			<div class="informacoes_pagina_pagamento">
				<h4>Formas de pagamento:</h4> 
				<div class="formas_pagamento">
					<img src="<?php echo base_url('assets'); ?>/images/icone_dinheiro.jpg" alt="Dinheiro" title="Dinheiro" class="icone_esquerda"/>
					<img src="<?php echo base_url('assets'); ?>/images/icone_visa.jpg" alt="Visa crédito" title="Visa crédito" class="icone_esquerda"/>
					<img src="<?php echo base_url('assets'); ?>/images/icone_master.jpg" alt="Master Card" title="Master Card" class="icone_esquerda"/>
					<img src="<?php echo base_url('assets'); ?>/images/icone_hiper.jpg" alt="HiperCard" title="HiperCard" class="icone_direita"/>
					<img src="<?php echo base_url('assets'); ?>/images/icone_diners.jpg" alt="Diners club" title="Diners club" class="icone_esquerda"/>
					<img src="<?php echo base_url('assets'); ?>/images/icone_elo.jpg" alt="Elo" title="Elo" class="icone_esquerda"/>
					<img src="<?php echo base_url('assets'); ?>/images/icone_credcard.jpg" alt="Credcard" title="Credcard" class="icone_esquerda"/>
					<img src="<?php echo base_url('assets'); ?>/images/icone_visaelectron.jpg" alt="Visa Electron" title="Visa Electron" class="icone_direita"/>
					<img src="<?php echo base_url('assets'); ?>/images/icone_paggo.jpg" alt="Paggo" title="Paggo" class="icone_esquerda"/>
					<img src="<?php echo base_url('assets'); ?>/images/icone_redeshop.jpg" alt="RedeShop" title="RedeShop" class="icone_esquerda"/>
					<img src="<?php echo base_url('assets'); ?>/images/icone_aura.jpg" alt="Aura" title="Aura" class="icone_esquerda"/>
				</div>
			</div>

            
           
        </div>
        
        <div id="endereco_pagina">
			<div id="" class="topo_area_pagina">
				<img src="<?php echo base_url('assets'); ?>/images/icone_place.png" class="icone_area_pagina" />
				<h1 class="titulo_area_pagina">Local</h1>
			</div>
			
		</div><!-- /endereco -->
	</div><!-- /fim da area de conteudo esquerda -->
	<div id="area_conteudo_direita_borda"><!-- /inicio da area de conteudo direita -->
		<div class="locais_proximos">
        	<a href="" title="">
            	<img src="" alt="logo do local" />
            	<h3>Pizzaria e Restaurante Barretos</h3>
            	<h5>Local: Graças - Recife</h5>
            </a>
    	</div>
        <div class="locais_proximos">
        	<a href="" title="">
            	<img src="" alt="logo do local" />
            	<h3>Pizzaria e Restaurante Barretos</h3>
            	<h5>Local: Graças - Recife</h5>
            </a>
    	</div>
        <div class="locais_proximos">
        	<a href="" title="">
            	<img src="" alt="logo do local" />
            	<h3>Pizzaria e Restaurante Barretos</h3>
            	<h5>Local: Graças - Recife</h5>
            </a>
    	</div>
        <div class="locais_proximos">
        	<a href="" title="">
            	<img src="" alt="logo do local" />
            	<h3>Pizzaria e Restaurante Barretos</h3>
            	<h5>Local: Graças - Recife</h5>
            </a>
    	</div>
        <div class="locais_proximos">
        	<a href="" title="">
            	<img src="" alt="logo do local" />
            	<h3>Pizzaria e Restaurante Barretos</h3>
            	<h5>Local: Graças - Recife</h5>
            </a>
    	</div>
        <div class="locais_proximos">
        	<a href="" title="">
            	<img src="" alt="logo do local" />
            	<h3>Pizzaria e Restaurante Barretos</h3>
            	<h5>Local: Graças - Recife</h5>
            </a>
    	</div>
        <div class="locais_proximos">
        	<a href="" title="">
            	<img src="" alt="logo do local" />
            	<h3>Pizzaria e Restaurante Barretos</h3>
            	<h5>Local: Graças - Recife</h5>
            </a>
    	</div>
    
	</div><!-- /fim da area de conteudo direita -->
</div>
<!-- /conteudo -->
<!-- /inicio da publicidade -->
<div id="publicidade_inferior"></div>
<!-- /fim da publicidade -->

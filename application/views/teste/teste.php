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
    <div id="area_conteudo_esquerda_borda"><!-- /inicio da area de conteudo esquerda -->
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
    </div><!-- /fim da area de conteudo esquerda -->
    <div id="area_conteudo_direita"><!-- /inicio da area de conteudo direita -->
    
    </div><!-- /fim da area de conteudo direita -->
</div>
<!-- /conteudo -->
<!-- /inicio da publicidade -->
<div id="publicidade_inferior"></div>
<!-- /fim da publicidade -->
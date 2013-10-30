<!-- /inicio da publicidade -->
<div id="publicidade_superior"></div>
<!-- /fim da publicidade -->
<!-- Conteudo
================================================== -->
<div id="conteudo">
	<div id="area_conteudo_superior"><!-- /inicio da area de conteudo superior -->
    	<div id="topo_pagina_anunciante" class="">
            
            <div id="logo_topo_pagina_lazer" class="">
                <img src="<?php echo base_url('assets'); ?>/images/logo_barretos.jpg" alt="Logo do anunciante" />
                <h3>Restaurante e Pizzaria barretos</h3>
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
        <div id="rotas">
        	<div class="topo_area_pagina">
                    <img src="<?php echo base_url('assets'); ?>/images/icone_rota.png" class="icone_area_pagina" />
                    <h1 class="titulo_area_pagina">Lugares da rota</h1>
            </div>
            <div class="rota">
            	<h1>1º lugar da rota</h1>
                <div class="rotas">
                    <img src="" alt="imagem da rota" />
                    <h2>Museu de arte moderna aloísio magalhães</h2>
                    <p>aqui fica a descrição do museu, auh dsuh ushduh dushuda hsudhsdk nsldhsi dohdos</p>
                    <h3>Preço por pessoa:<span>R$ 3,00</span></h3>
                </div>
            </div>
            <div class="rota">
            	<h1>2º lugar da rota</h1>
                <div class="rotas">
                    <img src="" alt="imagem da rota" />
                    <h2>Museu de arte moderna aloísio magalhães</h2>
                    <p>aqui fica a descrição do museu, auh dsuh ushduh dushuda hsudhsdk nsldhsi dohdos</p>
                    <h3>Preço por pessoa:<span>R$ 3,00</span></h3>
                </div>
            </div>
            <div class="rota">
            	<h1>3º lugar da rota</h1>
                <div class="rotas">
                    <img src="" alt="imagem da rota" />
                    <h2>Museu de arte moderna aloísio magalhães</h2>
                    <p>aqui fica a descrição do museu, auh dsuh ushduh dushuda hsudhsdk nsldhsi dohdos</p>
                    <h3>Preço por pessoa:<span>R$ 3,00</span></h3>
                </div>
            </div>
            <div id="rotas_valor_final">
            	<h1>O valor total que será gasto por pessoa, nessa rota é: <span>R$ 12,00</span></h1>
            </div>
        </div>
        <div id="descricao_pagina_grande" class="w-grande">
            <div class="topo_area_pagina">
                <img src="<?php echo base_url('assets'); ?>/images/icone_descricao.png" class="icone_area_pagina" />
                <h1 class="titulo_area_pagina">Descrição da rota</h1>
            </div>
                <p class="texto_pagina">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tristique elementum arcu a cursus. Integer et congue nulla. Quisque laoreet tristique imperdiet. Donec vel sollicitudin lectus. Vivamus orci lectus, tincidunt id sagittis eget, lacinia non sapien. Nulla non ligula a lacus ornare aliquet sed in lacus. Etiam viverra purus </p>
        </div>
        
        
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

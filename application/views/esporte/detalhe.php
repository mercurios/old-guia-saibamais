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
                <h4>Preço(s):</h4> 
                <div class="precos_informacoes_pagina">
                	<h6>Meia</h6>
                    <p>R$ 30,00</p>
                </div>
                <div class="precos_informacoes_pagina">
                	<h6>Especial</h6>
                    <p>R$ 30,00</p>
                </div>
            </div>
            <div class="informacoes_pagina_2">
                <h4>Dia(s) e horário(s) bons para praticar:</h4> 
                <div id="funcionamento_pagina">
                    <div class="funcionamento_pagina_semana">
                        <h2>Domingo</h2>
                        <p>8:00 às 13:00</p>
                    </div>
                    <div class="linha_separatoria"></div>
                    <div class="funcionamento_pagina_semana">
                        <h2>Segunda-feira</h2>
                        <p>8:00 às 13:00</p>
                    </div>
                    <div class="linha_separatoria"></div>
                    <div class="funcionamento_pagina_semana">
                        <h2>Terça-feira</h2>
                        <p>8:00 às 13:00</p>
                    </div>
                    <div class="linha_separatoria"></div>
                    <div class="funcionamento_pagina_semana">
                        <h2>Quarta-feira</h2>
                        <p>8:00 às 13:00</p>
                    </div>
                    <div class="linha_separatoria"></div>
                    <div class="funcionamento_pagina_semana">
                        <h2>Quinta-feira</h2>
                        <p>8:00 às 13:00</p>
                    </div>
                    <div class="linha_separatoria"></div>
                    <div class="funcionamento_pagina_semana">
                        <h2>Sexta-feira</h2>
                        <p>8:00 às 13:00</p>
                    </div>
                    <div class="linha_separatoria"></div>
                    <div class="funcionamento_pagina_semana">
                        <h2>Sábado</h2>
                        <p>8:00 às 13:00</p>
                    </div>
                </div>
            </div>
           
            <div class="informacoes_pagina">
                <h4>Idade mínima:</h4> 
                <h6>12 anos</h6>
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

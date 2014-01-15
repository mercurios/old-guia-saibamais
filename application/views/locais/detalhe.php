<div id="publicidade_superior" class="publicidade">
    <div class="conteudo_publicidade">
        <div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider">
            <?php
            if (isset($pub_top)) {
                foreach ($pub_top as $pubtop) {
            ?>
            <div class="item-slider">
                    <a href="<?php echo $pubtop->link_publicidade; ?>" title="" target="<?php echo ($pubtop->newtab_publicidade == 0 ? '_self' : '_blank' ); ?>">
                        <?php echo image_thumb('uploads/publicidades/' . $pubtop->img_vd_publicidade, 914, 90, '', ''); ?>
                    </a>
                </div>
            <?php } } ?>
        </div>
    </div>
</div><!-- Publicidade -->

<!-- Conteudo
================================================== -->
<div id="conteudo">
    <?php foreach ($conteudo as $local) : ?>
	<div id="area_conteudo_superior"><!-- /inicio da area de conteudo superior -->
    	<div id="topo_pagina_anunciante" class="">
            
            <div id="logo_topo_pagina_lazer" class="">
                <?php if (empty($local->logo_local)) { ?>
                    <?php echo image_thumb('uploads/logos/default.jpg', 366, 267, '', ''); ?>
                <?php } else { ?>
                    <?php echo image_thumb('uploads/logos/' . $local->logo_local, 366, 267, '', ''); ?>
                <?php } ?>
                <h3><?php echo $local->nome_local; ?></h3>
            </div>
        </div>
	</div><!-- /fim da area de conteudo superior -->
	<div id="area_conteudo_esquerda"><!-- /inicio da area de conteudo esquerda -->  
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
                        <?php echo image_thumb('uploads/fotos/' . $foto->img_foto, 666, 400, '', ''); ?>
                    <?php } } else { ?>
                        <?php echo image_thumb('uploads/fotos/default.jpg', 666, 400, '', ''); ?>
                    <?php } ?>
                </div>
                <!-- empty element for pager links -->
                <div id=adv-custom-pager class="center external"></div>
            </div>
        </div><!-- /album -->

        <div id="descricao_pagina_grande" class="w-grande">
            <div class="topo_area_pagina">
                <img src="<?php echo base_url('assets'); ?>/images/icone_descricao.png" class="icone_area_pagina" />
                <h1 class="titulo_area_pagina">Descrição</h1>
            </div>
                <p class="texto_pagina"><?php echo $local->desc_local ?></p>
        </div>
        <div id="informacoes_pagina" >
            <div class="topo_area_pagina">
                <img src="<?php echo base_url('assets'); ?>/images/icone_informacao.png" class="icone_area_pagina" />
                <h1 class="titulo_area_pagina">Informações</h1>
            </div>
            <div class="informacoes_pagina">
                <h4>Preço(s):</h4> 
                <div class="precos_informacoes_pagina">
                	<h6>Inteira</h6>
                    <p>R$ <?php echo $local->val_inteira_local ?></p>
                </div>
                <div class="precos_informacoes_pagina">
                	<h6>Meia</h6>
                    <p>R$ <?php echo $local->val_meia_local ?></p>
                </div>
                <div class="precos_informacoes_pagina">
                	<h6>Especial</h6>
                    <p>R$ <?php echo $local->val_especial_local ?></p>
                </div>
            </div>
            <div class="informacoes_pagina_2">
                <h4>Dia(s) e horário(s) para visitação:</h4> 
                <div id="funcionamento_pagina">
                    <div class="funcionamento_pagina_semana">
                        <h2>Domingo</h2>
                        <p><?php echo $local->h_dom ?></p>
                    </div>
                    <div class="linha_separatoria"></div>
                    <div class="funcionamento_pagina_semana">
                        <h2>Segunda-feira</h2>
                        <p><?php echo $local->h_seg ?></p>
                    </div>
                    <div class="linha_separatoria"></div>
                    <div class="funcionamento_pagina_semana">
                        <h2>Terça-feira</h2>
                        <p><?php echo $local->h_ter ?></p>
                    </div>
                    <div class="linha_separatoria"></div>
                    <div class="funcionamento_pagina_semana">
                        <h2>Quarta-feira</h2>
                        <p><?php echo $local->h_qua ?></p>
                    </div>
                    <div class="linha_separatoria"></div>
                    <div class="funcionamento_pagina_semana">
                        <h2>Quinta-feira</h2>
                        <p><?php echo $local->h_qui ?></p>
                    </div>
                    <div class="linha_separatoria"></div>
                    <div class="funcionamento_pagina_semana">
                        <h2>Sexta-feira</h2>
                        <p><?php echo $local->h_sex ?></p>
                    </div>
                    <div class="linha_separatoria"></div>
                    <div class="funcionamento_pagina_semana">
                        <h2>Sábado</h2>
                        <p><?php echo $local->h_sab ?></p>
                    </div>
                </div>
            </div>
           
            <div class="informacoes_pagina">
                <h4>Censura:</h4> 
                <h6><?php echo $local->censura_local ?></h6>
            </div>
        </div>
        
        <div id="endereco_pagina">
			<div id="" class="topo_area_pagina">
				<img src="<?php echo base_url('assets'); ?>/images/icone_place.png" class="icone_area_pagina" />
				<h1 class="titulo_area_pagina">Local</h1>
			</div>

            <?php echo $map['html']; ?>
            <div id="directionsDiv"></div>
			
		</div><!-- /endereco -->
        <div id="dicas">
        	<div id="" class="topo_area_pagina">
				<img src="<?php echo base_url('assets'); ?>/images/icone_dicas.png" class="icone_area_pagina" />
				<h1 class="titulo_area_pagina">O que fazer lá</h1>
			</div>

            <?php 
            $atv_titulo = explode('_-_', $local->fazer_titulo_local);
            $atv_desc   = explode('_-_', $local->fazer_desc_local);
            $atv_link   = explode('_-_', $local->fazer_link_local);
            $count_atv  = count($atv_titulo);
            for ($i=0; $i < $count_atv; $i++) { 
            ?>

            <div class="dicas">
                <a href="<?php echo $atv_link[$i] ?>" title="">  <h3><?php echo $atv_titulo[$i] ?></h3>
                <p><?php echo $atv_desc[$i] ?></p>
                <h6>Saiba mais +</h6> </a>
            </div>
            
            <?php } ?>
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
    <?php endforeach; ?>
</div>
<!-- /conteudo -->

<div id="publicidade_inferior" class="publicidade">
    <div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider">
        <?php
        if (isset($pub_bottom)) {
            foreach ($pub_bottom as $pubbottom) {
        ?>
        <div class="item-slider">
            <a href="<?php echo $pubbottom->link_publicidade; ?>" title="<?php echo $pubbottom->titulo_publicidade; ?>" target="<?php echo ($pubbottom->newtab_publicidade == 0 ? '_self' : '_blank' ); ?>">
                <?php echo image_thumb('uploads/publicidades/' . $pubbottom->img_vd_publicidade, 980, 170, $pubbottom->titulo_publicidade, ''); ?>
            </a>
        </div>
        <?php }} ?>
    </div>
</div><!-- /publicidade -->

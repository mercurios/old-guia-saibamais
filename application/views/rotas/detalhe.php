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
<!-- Conteudo
================================================== -->
<div id="conteudo">
    <?php foreach ($conteudo as $rota) : ?>
	<div id="area_conteudo_superior"><!-- /inicio da area de conteudo superior -->
    	<div id="topo_pagina_anunciante" class="">
            
            <div id="logo_topo_pagina_lazer" class="">
                <?php if (empty($rota->logo_rota)) { ?>
                    <img src="<?php echo base_url('tim.php?src=uploads/logos/default.jpg&w=366&h=267'); ?>" alt="" />
                <?php } else { ?>
                    <img src="<?php echo base_url('tim.php?src=uploads/logos/'. $rota->logo_rota .'&w=500&h=267'); ?>" alt="" />
                <?php } ?>
                <h3><?php echo $rota->titulo_rota ?></h3>
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
                        <img src="<?php echo base_url('tim.php?src=uploads/fotos/'. $foto->img_foto .'&w=666&h=400'); ?>" alt="" />
                    <?php } } else { ?>
                        <img src="<?php echo base_url('tim.php?src=uploads/fotos/default.jpg&w=666&h=400'); ?>" alt="" />
                    <?php } ?>
                </div>
                <!-- empty element for pager links -->
                <div id=adv-custom-pager class="center external"></div>
            </div>
        </div><!-- /album -->

        <div id="rotas">
        	<div class="topo_area_pagina">
                    <img src="<?php echo base_url('assets'); ?>/images/icone_rota.png" class="icone_area_pagina" />
                    <h1 class="titulo_area_pagina">Lugares da rota</h1>
            </div>

            <?php  

            $roteiro_titulo = explode('##',$rota->titulo_roteiro);
            $roteiro_foto   = explode('##',$rota->foto_roteiro);
            $roteiro_desc   = explode('##',$rota->desc_roteiro);
            $roteiro_valor  = explode('##',$rota->valor_roteiro);
            $count_roteiro  = count($roteiro_titulo);
            for ($i = 0; $i < $count_roteiro; $i++) {
            ?>

            <div class="rota">
                <h1><?php echo $i+1; ?>º lugar da rota</h1>
                <div class="rotas">
                    <img src="<?php echo base_url('tim.php?src=uploads/rotas/'. $roteiro_foto[$i] .'&w=240&h=170'); ?>" alt="" />
                    <h2><?php echo $roteiro_titulo[$i] ?></h2>
                    <p><?php echo $roteiro_desc[$i] ?></p>
                    <h3>Preço por pessoa:<span>R$ <?php echo $roteiro_valor[$i] ?></span></h3>
                </div>
            </div>

            <?php } ?>

            <div id="rotas_valor_final">
            	<h1>O valor total que será gasto por pessoa, nessa rota é: <span>R$ <?php echo $rota->valor_total; ?></span></h1>
            </div>
        </div>
        <div id="descricao_pagina_grande" class="w-grande">
            <div class="topo_area_pagina">
                <img src="<?php echo base_url('assets'); ?>/images/icone_descricao.png" class="icone_area_pagina" />
                <h1 class="titulo_area_pagina">Descrição da rota</h1>
            </div>
                <p class="texto_pagina"><?php echo $rota->desc_rota; ?></p>
        </div>
        
        
	</div><!-- /fim da area de conteudo esquerda -->
	<div id="area_conteudo_direita_borda"><!-- /inicio da area de conteudo direita -->
		<div class="locais_proximos">
        	<a href="" title="">
            	<img src="" alt="logo do rota" />
            	<h3>Pizzaria e Restaurante Barretos</h3>
            	<h5>rota: Graças - Recife</h5>
            </a>
    	</div>
        <div class="locais_proximos">
        	<a href="" title="">
            	<img src="" alt="logo do rota" />
            	<h3>Pizzaria e Restaurante Barretos</h3>
            	<h5>rota: Graças - Recife</h5>
            </a>
    	</div>
        <div class="locais_proximos">
        	<a href="" title="">
            	<img src="" alt="logo do rota" />
            	<h3>Pizzaria e Restaurante Barretos</h3>
            	<h5>rota: Graças - Recife</h5>
            </a>
    	</div>
        <div class="locais_proximos">
        	<a href="" title="">
            	<img src="" alt="logo do rota" />
            	<h3>Pizzaria e Restaurante Barretos</h3>
            	<h5>rota: Graças - Recife</h5>
            </a>
    	</div>
        <div class="locais_proximos">
        	<a href="" title="">
            	<img src="" alt="logo do rota" />
            	<h3>Pizzaria e Restaurante Barretos</h3>
            	<h5>rota: Graças - Recife</h5>
            </a>
    	</div>
        <div class="locais_proximos">
        	<a href="" title="">
            	<img src="" alt="logo do rota" />
            	<h3>Pizzaria e Restaurante Barretos</h3>
            	<h5>rota: Graças - Recife</h5>
            </a>
    	</div>
        <div class="locais_proximos">
        	<a href="" title="">
            	<img src="" alt="logo do rota" />
            	<h3>Pizzaria e Restaurante Barretos</h3>
            	<h5>rota: Graças - Recife</h5>
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
                <img src="<?php echo base_url('tim.php?src=/uploads/publicidades') . '/' . $pubbottom->img_vd_publicidade; ?>&w=980&h=170" alt="<?php echo $pubbottom->titulo_publicidade; ?>"/>
            </a>
        </div>
        <?php }} ?>
    </div>
</div><!-- /publicidade -->

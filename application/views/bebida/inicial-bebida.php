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

<!-- Conteudo
================================================== -->
<div id="conteudo" class="">
	<div class="topo_area_categoria">
		<img src="<?php echo base_url(); ?>/assets/images/icone_bebidas_laranja.png" class="icone_area_categoria" alt="icone" />
		<h1 class="titulo_area_categoria">Bebidas</h1>
	</div>
	<!--Inicio da área de conteúdo esquerda-->
	<div id="area_conteudo_esquerda" class="area_conteudo">
    	<div class="sliders-medium direita">
				<div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider" data-cycle-overlay-template="{{title}}">
					<?php
					if (isset($chamada_beb_s)) {
						foreach ($chamada_beb_s as $beb_s) {
					?>

					<div class="item-slider" data-title="<?php echo $beb_s->titulo_chamada; ?>">
                        <a href="<?php echo $beb_s->link_chamada; ?>" title="<?php echo $beb_s->titulo_chamada; ?>">
                            <?php echo image_thumb('uploads/chamadas/' . $beb_s->img_chamada, 326, 250, '', '', '' ); ?>
                        </a>
                    </div>

					<?php
						}
					}
					?>
					<div class="cycle-overlay"></div>
					<div class="cycle-pager"></div>
				</div>
			</div><!-- /sliders -->

			<!-- chamadas -->
			<div class="chamadas esquerda">
				<?php
				if (isset($chamada_p_top)) {
					foreach ($chamada_p_top as $beb_p_top) {
				?>

				<div class="chamada_pequena">
                    <a href="<?php echo $beb_p_top->link_chamada; ?>" title="<?php echo $beb_p_top->titulo_chamada; ?>">
                        <?php echo image_thumb('uploads/chamadas/' . $beb_p_top->img_chamada, 99, 77, $beb_p_top->titulo_chamada, 'img_chamada_pequena', '' ); ?>
                        <p><?php echo character_limiter($beb_p_top->desc_chamada, 120); ?></p>
                    </a>
                </div>

				<?php
					}
				}
				?>
			</div><!-- /chamadas -->

			<div class="chamada-horizontal">
				<?php
				if (isset($chamada_beb_m)) {
					foreach ($chamada_beb_m as $beb_m) {
				?>

				<div class="chamada_media">
                    <a href="<?php echo $beb_m->link_chamada; ?>" title="<?php echo $beb_m->titulo_chamada; ?>">
                        <?php echo image_thumb('uploads/chamadas/' . $beb_m->img_chamada, 154, 102, $beb_m->titulo_chamada, 'img_chamada_media', '' ); ?>
                        <h2><?php echo $beb_m->titulo_chamada; ?></h2>
                        <p><?php echo character_limiter($beb_m->desc_chamada, 80); ?></p>
                    </a>
                </div>

				<?php
					}
				}
				?>
			</div>
			<!-- sliders -->
			<div class="sliders-grande direita">
				<div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider" data-cycle-overlay-template="{{title}}">
				<?php
					if (isset($chamada_beb_s_f)) {
						foreach ($chamada_beb_s_f as $beb_s_f) {
					?>

					<div class="item-slider" data-title="<?php echo $beb_s_f->titulo_chamada; ?>">
                        <a href="<?php echo $beb_s_f->link_chamada; ?>" title="<?php echo $beb_s_f->titulo_chamada; ?>">
                            <?php echo image_thumb('uploads/chamadas/' . $beb_s_f->img_chamada, 670, 200, $beb_s_f->titulo_chamada, '', '' ); ?>
                        </a>
                    </div>

					<?php
						}
					}
					?>
					<div class="cycle-overlay"></div>
					<div class="cycle-pager"></div>
				</div>
			</div><!-- /sliders -->
            <div class="chamada-horizontal">
				<?php
                if (isset($chamada_p_bot)) {
                    foreach ($chamada_p_bot as $beb_p_bot) {
                ?>
                <div class="chamada_pequena">
                    <a href="<?php echo $beb_p_bot->link_chamada; ?>" title="<?php echo $beb_p_bot->titulo_chamada; ?>">
                        <?php echo image_thumb('uploads/chamadas/' . $beb_p_bot->img_chamada, 99, 77, $beb_p_bot->titulo_chamada, 'img_chamada_pequena', '' ); ?>
                        <p><?php echo character_limiter($beb_p_bot->desc_chamada, 80); ?></p>
                    </a>
                </div>
                <?php
                    }
                }
                ?>
			</div>
            <div class="chamadas_sidebar_esquerda">
        	<?php
        	if (isset($chamada_beb_m_p)) {
        		foreach ($chamada_beb_m_p as $beb_m_p) {
        	?>

        	<div class="chamada-captions">
                <?php echo image_thumb('uploads/chamadas/' . $beb_m_p->img_chamada, 154, 168, '', '', ''); ?>

                <span>
                    <a href="<?php echo $beb_m_p->link_chamada; ?>" title="<?php echo $beb_m_p->titulo_chamada; ?>"><?php echo $beb_m_p->titulo_chamada; ?></a>
                </span>
            </div>

            <?php
        		}
        	}
        	?>        
			</div>
            <div class="chamadas_sidebar_direita">
            	<?php
	        	if (isset($chamada_beb_m_f)) {
	        		foreach ($chamada_beb_m_f as $beb_m_f) {
	        	?>
            	<div class="chamada-captions-grande">
                    <?php echo image_thumb('uploads/chamadas/' . $beb_m_f->img_chamada, 343, 370, $beb_m_f->titulo_chamada, '', ''); ?>
                    <span>
                        <a href="<?php echo $beb_m_f->link_chamada; ?>" title="<?php echo $beb_m_f->titulo_chamada; ?>"><?php echo $beb_m_f->titulo_chamada; ?></a>
                    </span>
                </div>
	            <?php
	        		}
	        	}
	        	?> 
            </div>
            
            <!-- Publicidade -->
        <div id="publicidade_meio_index" class="publicidade">
            <div class="conteudo_publicidade">
                <div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider">
                    <?php
		        	if (isset($pub_contentbot)) {
		        		foreach ($pub_contentbot as $pubcontbottom) {
		        	?>
	        		<div class="item-slider">
                        <a href="<?php echo $pubcontbottom->link_publicidade; ?>" title="" target="<?php echo ($pubcontbottom->newtab_publicidade == 0 ? '_self' : '_blank' ); ?>">
                            <?php echo image_thumb('uploads/publicidades/' . $pubcontbottom->img_vd_publicidade, 620, 70, $pubcontbottom->titulo_publicidade, '', ''); ?>
                        </a>
                    </div>
		        	<?php } } ?>
                </div>
            </div>
        </div><!-- Publicidade -->
            
            <div class="chamada-horizontal">
				<?php
				if (isset($chamada_beb_m_2)) {
					foreach ($chamada_beb_m_2 as $beb_m) {
				?>

				<div class="chamada_media">
                    <a href="<?php echo $beb_m->link_chamada; ?>" title="<?php echo $beb_m->titulo_chamada; ?>">
                        <?php echo image_thumb('uploads/chamadas/' . $beb_m->img_chamada, 154, 102, $beb_m->titulo_chamada, 'img_chamada_media', ''); ?>
                        <h2><?php echo $beb_m->titulo_chamada; ?></h2>
                        <p><?php echo character_limiter($beb_m->desc_chamada, 80); ?></p>
                    </a>
                </div>

				<?php
					}
				}
				?>
			</div>
            
    </div> <!--Fim da área de conteúdo esquerda-->
    <!--Inicio da área de conteúdo direita-->
    <div id="area_conteudo_direita" class="area_conteudo">
    	<!--Inicio do campo de filtragem-->
        <div id="filtrar_ordenar">
			<div id="filtrar_pesquisa" class="select">
				<div id="topo_select_escolha_bebidas"></div>
                    <select name="filtrar_local_bebida" id="filtrar_local_bebida">
                        <option value="all">Por localização</option>

                        <optgroup label="Recife">
                            <?php foreach ($bairros as $bairro) : ?>
                                <option value="<?php echo $bairro->cd_bairro ?>" <?php if ($this->uri->segment(3) == $bairro->cd_bairro) { echo 'selected '; } ?>><?php echo $bairro->ds_bairro_nome ?></option>
                            <?php endforeach; ?>
                        </optgroup>
                    </select>
                    
                    <h4>ou</h4>
                 
                    <select id="filtrar_adaptado_bebida">
                        <option value="all">Que seja acessivel à:</option>
                        <option value="cego" <?php if ($this->uri->segment(4) == "cego") { echo 'selected '; } ?>>Cegos</option>
                        <option value="deficientes-fisicos" <?php if ($this->uri->segment(4) == "deficientes-fisicos") { echo 'selected '; } ?>>Deficientes físicos</option>
                        <option value="gestantes" <?php if ($this->uri->segment(4) == "gestantes") { echo 'selected '; } ?>>Gestantes</option>
                        <option value="idosos" <?php if ($this->uri->segment(4) == "idosos") { echo 'selected '; } ?>>Idosos</option>
                        <option value="obesos" <?php if ($this->uri->segment(4) == "obesos") { echo 'selected '; } ?>>Obesos</option>
                        <option value="surdos" <?php if ($this->uri->segment(4) == "surdos") { echo 'selected '; } ?>>Surdos</option>
                    </select>
                    
                    <h4>ou</h4>
                                        
                    <select id="filtrar_comida_bebida">
                        <option value="all" selected>Por lanche</option>
                            <option value="batidas" <?php if ($this->uri->segment(5) == "batidas") { echo 'selected '; } ?>>Batidas</option>
                            <option value="caipirinhas" <?php if ($this->uri->segment(5) == "caipirinhas") { echo 'selected '; } ?>>Caipirinhas</option>
                            <option value="cafes" <?php if ($this->uri->segment(5) == "cafes") { echo 'selected '; } ?>>Cafés</option>
                        </optgroup>
                    </select>
				</div>
			</div>
            <!--Fim do campo de filtragem-->
            <!-- publicidade -->
            <div id="publicidade_meio">
            <div class="publicidade_simples">
                <div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider">
					<?php
                    if (isset($pub_sidebar)) {
                        foreach ($pub_sidebar as $pubsidebar) {
                    ?>
                    <div class="item-slider">
                        <a href="<?php echo $pubsidebar->link_publicidade; ?>" title="<?php echo $pubsidebar->titulo_publicidade; ?>" target="<?php echo ($pubsidebar->newtab_publicidade == 0 ? '_self' : '_blank' ); ?>">
                            <?php echo image_thumb('uploads/publicidades/' . $pubsidebar->img_vd_publicidade, 306, 510, $pubsidebar->titulo_publicidade, '', ''); ?>
                        </a>
                    </div>
                    <?php }} ?>
				</div>
            </div>
        </div><!-- /publicidade -->
        <div id="promocoes_semana">
        	<div id="topo_promocoes_semana"></div>
            <div id="conteudo_promocoes_semana">
            	<div id="dia_promocoes_semana">
                	<h4>Segunda</h4>
                    <h2>Dia 10</h2>
                    <h6>Setembro de 2013</h6>
                </div>
                <div id="promocoes_promocoes_semana">
                	<ul>
                    	<a href="">
                    		<li>Compre uma pizza e leve outra gratis!</li>
                        	<li><span>Pizzaria Barretos</span></li>
                        </a>
                    </ul>
                    <ul>
                    	<a href="">
                    		<li>Compre uma pizza e leve outra gratis!</li>
                        	<li><span>Pizzaria Barretos</span></li>
                        </a>
                    </ul>
                    <ul>
                    	<a href="">
                    		<li>Compre uma pizza e leve outra gratis!</li>
                        	<li><span>Pizzaria Barretos</span></li>
                        </a>
                    </ul>
                    <ul>
                    	<a href="">
                    		<li>Compre uma pizza e leve outra gratis!</li>
                        	<li><span>Pizzaria Barretos</span></li>
                        </a>
                    </ul>
                </div>
                <div id="mais_promocoes">
                	<a href="">
                	   	<img src="assets/images/mais.png" alt=""/>
						<h4>Veja mais promoções aqui</h4>
                    </a>
                </div>            
            </div>
        </div>
    	
        
    </div><!--Fim da área de conteúdo direita-->
</div><!-- /conteudo -->

<div id="publicidade_inferior" class="publicidade">
	<div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider">
		<?php
    	if (isset($pub_bottom)) {
    		foreach ($pub_bottom as $pubbottom) {
    	?>
		<div class="item-slider">
            <a href="<?php echo $pubbottom->link_publicidade; ?>" title="<?php echo $pubbottom->titulo_publicidade; ?>" target="<?php echo ($pubbottom->newtab_publicidade == 0 ? '_self' : '_blank' ); ?>">
                <?php echo image_thumb('uploads/publicidades/' . $pubbottom->img_vd_publicidade, 980, 170, $pubbottom->titulo_publicidade, '', ''); ?>
            </a>
        </div>
        <?php }} ?>
	</div>
</div><!-- /publicidade -->
<div id="publicidade_superior" class="publicidade">
 	<div class="conteudo_publicidade">
        <div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider">
            <?php if (isset($pub_top)) { foreach ($pub_top as $pubtop) { ?>
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
<div id="conteudo" class="">
	<div class="topo_area_categoria">
		<img src="<?php echo base_url(); ?>/assets/images/icone_bicicleta_laranja.png" class="icone_area_categoria" alt="icone" />
		<h1 class="titulo_area_categoria">Passeio e Lazer</h1>
	</div>
	<!--Inicio da área de conteúdo esquerda-->
	<div id="area_conteudo_esquerda_pesquisa" class="area_conteudo">
	<!-- Listar all
	================================================== -->
		<?php 
		if (count($locais) != 0) {
			foreach ($locais as $local) {
		?>

		
		<div class="resultado_pesquisa">
	    	<img src="<?php echo base_url() ?>tim.php?src=uploads/logos/<?php echo $local->logo_local; ?>&w=240&h=146" alt="logo" class="logo_resultado_pesquisa" />
	        <h3 class="estabelecimento_resultado_pesquisa"><?php echo $local->nome_local; ?></h3>
	        <p class="local_resultado_pesquisa">Local: <?php echo $local->bairro_local; ?></p>
	        <div class="rodape_resultado_pesquisa">
	        	<a href="<?php echo base_url('locais/detalhe') . '/' . $local->slug_local . '/' . $local->id_local; ?>" title="">
	        		<img src="<?php echo base_url(); ?>assets/images/mais_pequeno.png" alt="" />
	            	<h2>Ver mais informações</h2>
	            </a>
	        </div>
	    </div>
		
	
	    <?php
			}
		}
		else {
			echo 'Ops! Ainda não tem locais cadastrados nessa categoria.';
		}
		?>
	</div><!-- /listar-all -->
	<!--Fim da área de conteúdo esquerda-->
	<!--Inicio da área de conteúdo direita-->
    <div id="area_conteudo_direita_pesquisa" class="area_conteudo">
		<!--Inicio do campo de filtragem-->
        <div id="filtrar_ordenar">
			<div id="filtrar_pesquisa" class="select">
				<div id="topo_select_filtrar"></div>
					<select id="filtrar_local_locais">
                        <option value="all">Por localização</option>

                        <optgroup label="Recife">
                            <?php foreach ($bairros as $bairro) : ?>
                                <option value="<?php echo $bairro->cd_bairro ?>" <?php if ($this->uri->segment(3) == $bairro->cd_bairro) { echo 'selected '; } ?>><?php echo $bairro->ds_bairro_nome ?></option>
                            <?php endforeach; ?>
                        </optgroup>
                    </select>
                    
                    <h4>ou</h4>
                 
                    <select id="filtrar_adaptado_locais">
                        <option value="all">Que seja acessivel à:</option>
                        <option value="cego" <?php if ($this->uri->segment(4) == "cego") { echo 'selected '; } ?>>Cegos</option>
                        <option value="deficientes-fisicos" <?php if ($this->uri->segment(4) == "deficientes-fisicos") { echo 'selected '; } ?>>Deficientes físicos</option>
                        <option value="gestantes" <?php if ($this->uri->segment(4) == "gestantes") { echo 'selected '; } ?>>Gestantes</option>
                        <option value="idosos" <?php if ($this->uri->segment(4) == "idosos") { echo 'selected '; } ?>>Idosos</option>
                        <option value="obesos" <?php if ($this->uri->segment(4) == "obesos") { echo 'selected '; } ?>>Obesos</option>
                        <option value="surdos" <?php if ($this->uri->segment(4) == "surdos") { echo 'selected '; } ?>>Surdos</option>
                    </select>
                    
                    <h4>ou</h4>
                                        
                    <select id="filtrar_atividades">
                        <option value="all" selected>Por atividade</option>
                            <optgroup label="Visitar locais">
                                <option value="cachoeiras" <?php if ($this->uri->segment(5) == "cachoeiras") { echo 'selected '; } ?>>Cachoeiras</option>
                                <option value="lugares-historicos" <?php if ($this->uri->segment(5) == "lugares-historicos") { echo 'selected '; } ?>>Lugares históricos</option>
                                <option value="matas" <?php if ($this->uri->segment(5) == "matas") { echo 'selected '; } ?>>Matas</option>
                        	</optgroup>
                    </select>
            </div>
            
                
			<div id="filtrar_pesquisa" class="select">
			<div id="topo_select_ordenar"></div>
				<select id="filtrar_ordem">
                    <option selected value="a-z">Por ordem alfabética:</option>
                    <option value="a-z" <?php if ($this->uri->segment(6) == "a-z") { echo 'selected '; } ?> >De A - Z</option>
                    <option value="z-a" <?php if ($this->uri->segment(6) == "z-a") { echo 'selected '; } ?> >De Z - A</option>
                </select>
				
				<h4>ou</h4>
				
				<select>
					<option selected>Por próximidade:</option>
					<option>Mais perto de mim</option>
					<option>Mais distante de mim</option>
				</select>
			</div>
		</div>
            <!--Fim do campo de filtragem-->
            
            
	</div><!--Fim da área de conteúdo direita-->

	

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
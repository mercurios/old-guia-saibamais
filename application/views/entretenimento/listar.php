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
<div id="conteudo" class="">
	<div class="topo_area_categoria">
		<img src="<?php echo base_url(); ?>/assets/images/icone_mascaras.png" class="icone_area_categoria" alt="icone" />
		<h1 class="titulo_area_categoria">Entretenimentos - <?php echo $this->uri->segment(2) . ': ' . $this->uri->segment(3) ?></h1>
	</div>

	<!--Inicio da área de conteúdo esquerda-->
	<div id="area_conteudo_esquerda_pesquisa" class="area_conteudo">
	<?php

	$cinemas 	= $conteudos['cinemas'];
	$exposicoes = $conteudos['exposicoes'];
	$eventos 	= $conteudos['eventos'];
	$shows 		= $conteudos['shows'];
	$teatros 	= $conteudos['teatros'];

	if (empty($cinemas) && empty($exposicoes) && empty($eventos) && empty($shows) && empty($teatros)) { echo 'Não existe nenhum entretenimento cadastrado nessa categoria.'; }

	?>

	<?php if (!empty($cinemas)) { foreach ($cinemas as $cinema) { ?>
		<div class="resultado_pesquisa">
	    	<img src="<?php echo base_url() ?>tim.php?src=uploads/logos/<?php echo $cinema->logo_cinema; ?>&w=240&h=146" alt="logo" class="logo_resultado_pesquisa" />
	        <h3 class="estabelecimento_resultado_pesquisa"><?php echo $cinema->nome_cinema; ?></h3>
	        <p class="local_resultado_pesquisa">Local: <?php echo $cinema->ds_bairro_nome; ?></p>
	        <div class="rodape_resultado_pesquisa">
	        	<a href="<?php echo base_url('cinemas/detalhe') . '/' . $cinema->slug_cinema . '/' . $cinema->id_cinema; ?>" title="">
	        		<img src="<?php echo base_url(); ?>assets/images/mais_pequeno.png" alt="" />
	            	<h2>Ver mais informações</h2>
	            </a>
	        </div>
	    </div>
	<?php } } ?>

	<?php if (!empty($exposicoes)) { foreach ($exposicoes as $exposicao) { ?>
		<div class="resultado_pesquisa">
	    	<img src="<?php echo base_url() ?>tim.php?src=uploads/logos/<?php echo $exposicao->logo_exposicao; ?>&w=240&h=146" alt="logo" class="logo_resultado_pesquisa" />
	        <h3 class="estabelecimento_resultado_pesquisa"><?php echo $exposicao->nome_exposicao; ?></h3>
	        <p class="local_resultado_pesquisa">Local: <?php echo $exposicao->ds_bairro_nome; ?></p>
	        <div class="rodape_resultado_pesquisa">
	        	<a href="<?php echo base_url('exposicoes/detalhe') . '/' . $exposicao->slug_exposicao . '/' . $exposicao->id_exposicao; ?>" title="">
	        		<img src="<?php echo base_url(); ?>assets/images/mais_pequeno.png" alt="" />
	            	<h2>Ver mais informações</h2>
	            </a>
	        </div>
	    </div>
	<?php } } ?>

	<?php if (!empty($eventos)) { foreach ($eventos as $evento) { ?>
		<div class="resultado_pesquisa">
	    	<img src="<?php echo base_url() ?>tim.php?src=uploads/logos/<?php echo $evento->logo_evento; ?>&w=240&h=146" alt="logo" class="logo_resultado_pesquisa" />
	        <h3 class="estabelecimento_resultado_pesquisa"><?php echo $evento->nome_evento; ?></h3>
	        <p class="local_resultado_pesquisa">Local: <?php echo $evento->ds_bairro_nome; ?></p>
	        <div class="rodape_resultado_pesquisa">
	        	<a href="<?php echo base_url('eventos/detalhe') . '/' . $evento->slug_evento . '/' . $evento->id_evento; ?>" title="">
	        		<img src="<?php echo base_url(); ?>assets/images/mais_pequeno.png" alt="" />
	            	<h2>Ver mais informações</h2>
	            </a>
	        </div>
	    </div>
	<?php } } ?>

	<?php if (!empty($shows)) { foreach ($shows as $show) { ?>
		<div class="resultado_pesquisa">
	    	<img src="<?php echo base_url() ?>tim.php?src=uploads/logos/<?php echo $show->logo_show; ?>&w=240&h=146" alt="logo" class="logo_resultado_pesquisa" />
	        <h3 class="estabelecimento_resultado_pesquisa"><?php echo $show->nome_show; ?></h3>
	        <p class="local_resultado_pesquisa">Local: <?php echo $show->ds_bairro_nome; ?></p>
	        <div class="rodape_resultado_pesquisa">
	        	<a href="<?php echo base_url('shows/detalhe') . '/' . $show->slug_show . '/' . $show->id_show; ?>" title="">
	        		<img src="<?php echo base_url(); ?>assets/images/mais_pequeno.png" alt="" />
	            	<h2>Ver mais informações</h2>
	            </a>
	        </div>
	    </div>
	<?php } } ?>

	<?php if (!empty($teatros)) { foreach ($teatros as $teatro) { ?>
		<div class="resultado_pesquisa">
	    	<img src="<?php echo base_url() ?>tim.php?src=uploads/logos/<?php echo $teatro->logo_teatro; ?>&w=240&h=146" alt="logo" class="logo_resultado_pesquisa" />
	        <h3 class="estabelecimento_resultado_pesquisa"><?php echo $teatro->nome_teatro; ?></h3>
	        <p class="local_resultado_pesquisa">Local: <?php echo $teatro->ds_bairro_nome; ?></p>
	        <div class="rodape_resultado_pesquisa">
	        	<a href="<?php echo base_url('teatros/detalhe') . '/' . $teatro->slug_teatro . '/' . $teatro->id_teatro; ?>" title="">
	        		<img src="<?php echo base_url(); ?>assets/images/mais_pequeno.png" alt="" />
	            	<h2>Ver mais informações</h2>
	            </a>
	        </div>
	    </div>
	<?php } } ?>

	</div><!-- /listar-all -->


	<!--Fim da área de conteúdo esquerda-->
	<!--Inicio da área de conteúdo direita-->
    <div id="area_conteudo_direita_pesquisa" class="area_conteudo">
		<!--Inicio do campo de filtragem-->
        <div id="filtrar_ordenar">
			<div id="filtrar_pesquisa" class="select">
				<div id="topo_select_filtrar"></div>
					<select id="filtro_local_entretenimento">
                        <option value="all">Por localização</option>

                        <optgroup label="Recife">
                            <?php foreach ($bairros as $bairro) : ?>
                                <option value="<?php echo $bairro->cd_bairro ?>" <?php if ($this->uri->segment(3) == $bairro->cd_bairro) { echo 'selected '; } ?>><?php echo $bairro->ds_bairro_nome ?></option>
                            <?php endforeach; ?>
                        </optgroup>
                    </select>
                    
                    <h4>ou</h4>
                 
                    <select id="filtro_adaptado_entretenimento">
                        <option value="all">Que seja acessivel à:</option>
                        <option value="cego" <?php if ($this->uri->segment(4) == "cego") { echo 'selected '; } ?>>Cegos</option>
                        <option value="deficientes-fisicos" <?php if ($this->uri->segment(4) == "deficientes-fisicos") { echo 'selected '; } ?>>Deficientes físicos</option>
                        <option value="gestantes" <?php if ($this->uri->segment(4) == "gestantes") { echo 'selected '; } ?>>Gestantes</option>
                        <option value="idosos" <?php if ($this->uri->segment(4) == "idosos") { echo 'selected '; } ?>>Idosos</option>
                        <option value="obesos" <?php if ($this->uri->segment(4) == "obesos") { echo 'selected '; } ?>>Obesos</option>
                        <option value="surdos" <?php if ($this->uri->segment(4) == "surdos") { echo 'selected '; } ?>>Surdos</option>
                    </select>
                    
                    <h4>ou</h4>
                                        
                    <select id="filter_categoria_entretenimento">
                        <option value="" selected>Por tipo</option>
                            <option value="cinemas" <?php if ($this->uri->segment(1) == "cinemas") { echo 'selected '; } ?>>Cinemas</option>
                            <option value="exposicoes" <?php if ($this->uri->segment(1) == "exposicoes") { echo 'selected '; } ?>>Exposições</option>
                            <option value="eventos" <?php if ($this->uri->segment(1) == "eventos") { echo 'selected '; } ?>>Feiras e eventos</option>
                            <option value="shows" <?php if ($this->uri->segment(1) == "shows") { echo 'selected '; } ?>>Shows</option>
                            <option value="teatros" <?php if ($this->uri->segment(1) == "teatros") { echo 'selected '; } ?>>Teatros</option>
                        </optgroup>
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
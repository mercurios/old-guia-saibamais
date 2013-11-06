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
	        <p class="local_resultado_pesquisa">Local: <?php echo $cinema->bairro_cinema; ?></p>
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
	        <p class="local_resultado_pesquisa">Local: <?php echo $exposicao->bairro_exposicao; ?></p>
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
	        <p class="local_resultado_pesquisa">Local: <?php echo $evento->bairro_evento; ?></p>
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
	        <p class="local_resultado_pesquisa">Local: <?php echo $show->bairro_show; ?></p>
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
	        <p class="local_resultado_pesquisa">Local: <?php echo $teatro->bairro_teatro; ?></p>
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
					<select>
                        <option selected>Por localização</option>
                        <optgroup label="Recife">
                            <option>Abreu e lima</option>
                            <option>Cabo de santo agostinho</option>
                            <option>Goiana</option>
                            <option>Igarassu</option>
                            <option>Ipojuca</option>
                            <option>Itamaracá</option>
                            <option>Jaboatão dos Guararapes</option>
                            <option>Olinda</option>
                            <option>Paulista</option>
                            <option>Recife</option>
                        </optgroup>
                    </select>
                    
                    <h4>ou</h4>
                 
                    <select>
                        <option selected>Que seja acessivel à:</option>
                        <option>Cegos</option>
                        <option>Deficientes físicos</option>
                        <option>Gestantes</option>
                        <option>Idosos</option>
                        <option>Obesos</option>
                        <option>Surdos</option>
                    </select>
                    
                    <h4>ou</h4>
                                        
                    <select>
                        <option selected>Por tipo</option>
                            <option>Cinemas</option>
                            <option>Exposições</option>
                            <option>Feiras / Eventos</option>
                        </optgroup>
                    </select>
            </div>
            
                
			<div id="filtrar_pesquisa" class="select">
			<div id="topo_select_ordenar"></div>
				<select>
					<option selected>Por ordem alfabética:</option>
                    <option>De A - Z</option>
                    <option>De Z - A</option>
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
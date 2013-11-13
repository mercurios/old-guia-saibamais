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
    $locais     = $resultados['locais'];
    $esportes   = $resultados['esportes'];
    $rotas      = $resultados['rotas'];

    foreach ($locais as $local){ ?>

    <div class="resultado_pesquisa">
        <img src="<?php echo base_url('tim.php?src=uploads/logos/'. $local->logo_local .'&w=240&h=146'); ?>" alt="logo" class="logo_resultado_pesquisa" />
        <h3 class="estabelecimento_resultado_pesquisa"><?php echo $local->nome_local; ?></h3>
        <p class="local_resultado_pesquisa">Local: <?php echo $local->bairro_local; ?></p>
        <div class="rodape_resultado_pesquisa">
            <a href="<?php echo base_url('locais/detalhe') . '/' . $local->slug_local . '/' . $local->id_local; ?>" title="">
                <img src="<?php echo base_url(); ?>assets/images/mais_pequeno.png" alt="" />
                <h2>Ver mais informações</h2>
            </a>
        </div>
    </div>


    <?php } foreach ($esportes as $esporte) { ?>

    <div class="resultado_pesquisa">
        <img src="<?php echo base_url('tim.php?src=uploads/logos/'. $esporte->logo_esporte .'&w=240&h=146'); ?>" alt="logo" class="logo_resultado_pesquisa" />
        <h3 class="estabelecimento_resultado_pesquisa"><?php echo $esporte->nome_esporte; ?></h3>
        <p class="local_resultado_pesquisa">Local: <?php echo $esporte->local_esporte; ?></p>
        <div class="rodape_resultado_pesquisa">
            <a href="<?php echo base_url('esportes/detalhe') . '/' . $esporte->slug_esporte . '/' . $esporte->id_esporte; ?>" title="">
                <img src="<?php echo base_url(); ?>assets/images/mais_pequeno.png" alt="" />
                <h2>Ver mais informações</h2>
            </a>
        </div>
    </div>

    <?php } foreach ($rotas as $rota) { ?>

    <div class="resultado_pesquisa">
            <img src="<?php echo base_url() ?>tim.php?src=uploads/logos/<?php echo $rota->logo_rota; ?>&w=240&h=146" alt="logo" class="logo_resultado_pesquisa" />
            <h3 class="estabelecimento_resultado_pesquisa"><?php echo $rota->titulo_rota; ?></h3>
            <p class="local_resultado_pesquisa">Categoria: <?php echo $rota->categoria_rota; ?></p>
            <div class="rodape_resultado_pesquisa">
                <a href="<?php echo base_url('rotas/detalhe') . '/' . $rota->slug_rota . '/' . $rota->id_rota; ?>" title="">
                    <img src="<?php echo base_url(); ?>assets/images/mais_pequeno.png" alt="" />
                    <h2>Ver mais informações</h2>
                </a>
            </div>
        </div>

    <?php } ?>

	</div><!-- /listar-all -->
	<!--Fim da área de conteúdo esquerda-->
	<!--Inicio da área de conteúdo direita-->
    <div id="area_conteudo_direita_pesquisa" class="area_conteudo">
		<!--Inicio do campo de filtragem-->
        <div id="filtrar_ordenar">
			<div id="filtrar_pesquisa" class="select">
				<div id="topo_select_filtrar"></div>
					<select id="filtrar_local_lazer">
                        <option value="all">Por localização</option>

                        <optgroup label="Recife">
                            <?php foreach ($bairros as $bairro) : ?>
                                <option value="<?php echo $bairro->cd_bairro ?>" <?php if ($this->uri->segment(4) == $bairro->cd_bairro) { echo 'selected '; } ?>><?php echo $bairro->ds_bairro_nome ?></option>
                            <?php endforeach; ?>
                        </optgroup>
                    </select>
                    
                    <h4>ou</h4>
                    
                    <select id="filtrar_adaptado_lazer">
                        <option value="all">Que seja acessivel à:</option>
                        <option value="cego" <?php if ($this->uri->segment(3) == "cego") { echo 'selected '; } ?>>Cegos</option>
                        <option value="deficientes-fisicos" <?php if ($this->uri->segment(3) == "deficientes-fisicos") { echo 'selected '; } ?>>Deficientes físicos</option>
                        <option value="gestantes" <?php if ($this->uri->segment(3) == "gestantes") { echo 'selected '; } ?>>Gestantes</option>
                        <option value="idosos" <?php if ($this->uri->segment(3) == "idosos") { echo 'selected '; } ?>>Idosos</option>
                        <option value="obesos" <?php if ($this->uri->segment(3) == "obesos") { echo 'selected '; } ?>>Obesos</option>
                        <option value="surdos" <?php if ($this->uri->segment(3) == "surdos") { echo 'selected '; } ?>>Surdos</option>
                    </select>
                    
                    <h4>ou</h4>
                    
                    <select id="filtrar_categoria_lazer">
                        <option value="all" selected>Por atividade</option>
                            <option value="locais">Conhecer locais</option>
                            <option value="esportes">Praticar esportes</option>
                            <option value="rotas">Rotas para passear</option>
                        </optgroup>
                    </select>            </div>
            
                
			<div id="filtrar_pesquisa" class="select">
			<div id="topo_select_ordenar"></div>
				<select id="filtrar_ordem_lazer">
                    <option selected value="a-z">Por ordem alfabética:</option>
                    <option value="a-z" <?php if ($this->uri->segment(5) == "a-z") { echo 'selected '; } ?> >De A - Z</option>
                    <option value="z-a" <?php if ($this->uri->segment(5) == "z-a") { echo 'selected '; } ?> >De Z - A</option>
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
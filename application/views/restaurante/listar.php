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
		<img src="<?php echo base_url(); ?>/assets/images/icone_restaurante_laranja.png" class="icone_area_categoria" alt="icone" />
		<h1 class="titulo_area_categoria">Restaurantes - <?php echo $bread; ?></h1>
	</div>

		<!--Inicio da área de conteúdo esquerda-->
	<div id="area_conteudo_esquerda_pesquisa" class="area_conteudo">

		<?php 
		if (count($restaurantes) != 0) {
			foreach ($restaurantes as $restaurante) {
		?>

		<div class="resultado_pesquisa <?php echo $restaurante->bairro_restaurante; ?>">
	    	<img src="<?php echo base_url('tim.php?src=uploads/logos/'. $restaurante->logo_restaurante .'&w=240&h=146'); ?>" alt="logo" class="logo_resultado_pesquisa" />
	        <h3 class="estabelecimento_resultado_pesquisa"><?php echo $restaurante->nome_restaurante; ?></h3>
	        <p class="local_resultado_pesquisa">Local: <?php echo $restaurante->bairro_restaurante; ?></p>
	        <h4>Acessível para:</h4>
	        <?php  
	        $adaptado = $restaurante->adaptado_restaurante;
	        $adaptado = explode(',', $adaptado);

	        if (in_array('cego', $adaptado)){ echo '<img src="'. base_url() .'assets/images/icone_cego_pequeno.jpg" alt="Cego" title="Deficientes visuais e cegos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
	        else { echo '<img src="'. base_url() .'assets/images/icone_cego_pequeno_claro.jpg" alt="Cego" title="Deficientes visuais e cegos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }

	        if (in_array('surdo', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_surdo_pequeno.jpg" alt="Surdo" title="Deficientes auditivos e surdos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
	        else { echo '<img src="'. base_url() .'assets/images/icone_surdo_pequeno_claro.jpg" alt="Surdo" title="Deficientes auditivos e surdos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }

	        if (in_array('deficientefisico', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_deficiente_pequeno.jpg" alt="Deficiente físico" title="Deficientes físicos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
	        else { echo '<img src="'. base_url() .'assets/images/icone_deficiente_pequeno_claro.jpg" alt="Deficiente físico" title="Deficientes físicos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }

	        if (in_array('braile', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_braille_pequeno.jpg" alt="Braille" title="Braille" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
	        else { echo '<img src="'. base_url() .'assets/images/icone_braille_pequeno_claro.jpg" alt="Braille" title="Braille" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }

	        if (in_array('obeso', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_obeso_pequeno.jpg" alt="Obeso" title="Pessoas com obesidade" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
	        else { echo '<img src="'. base_url() .'assets/images/icone_obeso_pequeno_claro.jpg" alt="Obeso" title="Pessoas com obesidade" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }

	        if (in_array('idoso', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_idoso_pequeno.jpg" alt="Idoso" title="Idosos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
	    	else { echo '<img src="'. base_url() .'assets/images/icone_idoso_pequeno_claro.jpg" alt="Idoso" title="Idosos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }

	        if (in_array('gestante', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_gestante_pequeno.jpg" alt="Gestante" title="Gestantes" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
	    	else { echo '<img src="'. base_url() .'assets/images/icone_gestante_pequeno_claro.jpg" alt="Gestante" title="Gestantes" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }

	        if (in_array('bebe', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_bebe_pequeno.jpg" alt="Bebe" title="Recém nascidos ou Crianças de colo" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
	    	else { echo '<img src="'. base_url() .'assets/images/icone_bebe_pequeno_claro.jpg" alt="Bebe" title="Recém nascidos ou Crianças de colo" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
	        ?>

	        <div class="rodape_resultado_pesquisa">
	        	<a href="<?php echo base_url('restaurantes/detalhe') . '/' . $restaurante->slug_restaurante . '/' . $restaurante->id_restaurante; ?>" title="">
	        		<img src="<?php echo base_url(); ?>assets/images/mais_pequeno.png" alt="" />
	            	<h2>Ver mais informações</h2>
	            </a>
	        </div>
	    </div>

	    <?php
			}
		}
		else {
			echo 'Ops! Ainda não tem restaurantes cadastrados nessa categoria.';
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
					<form name="filtrar_restaurantes">
							<select name="filtrar_local" id="filtrar_local">
								<option value="all">Por localização</option>

								<optgroup label="Recife">
									<?php foreach ($bairros as $bairro) : ?>
										<option value="<?php echo $bairro->cd_bairro ?>" <?php if ($this->uri->segment(3) == $bairro->cd_bairro) { echo 'selected '; } ?>><?php echo $bairro->ds_bairro_nome ?></option>
									<?php endforeach; ?>
								</optgroup>
							</select>


                    	<h4>ou</h4>
                 
	                    <select id="filtrar_adaptado">
	                        <option value="all">Que seja acessivel à:</option>
	                        <option value="cego" <?php if ($this->uri->segment(4) == "cego") { echo 'selected '; } ?>>Cegos</option>
	                        <option value="deficientes-fisicos" <?php if ($this->uri->segment(4) == "deficientes-fisicos") { echo 'selected '; } ?>>Deficientes físicos</option>
	                        <option value="gestantes" <?php if ($this->uri->segment(4) == "gestantes") { echo 'selected '; } ?>>Gestantes</option>
	                        <option value="idosos" <?php if ($this->uri->segment(4) == "idosos") { echo 'selected '; } ?>>Idosos</option>
	                        <option value="obesos" <?php if ($this->uri->segment(4) == "obesos") { echo 'selected '; } ?>>Obesos</option>
	                        <option value="surdos" <?php if ($this->uri->segment(4) == "surdos") { echo 'selected '; } ?>>Surdos</option>
	                    </select>
	                
                    	<h4>ou</h4>
                                        
	                    <select id="filtrar_comida">
	                        <option value="all" selected>Por comida</option>
	                        	<option value="crustaceos" <?php if ($this->uri->segment(5) == "crustaceos") { echo 'selected '; } ?>>Crustáceos</option>
	                            <option value="rodizios" <?php if ($this->uri->segment(5) == "rodizios") { echo 'selected '; } ?>>Rodízios</option>
	                            <option value="self-services" <?php if ($this->uri->segment(5) == "self-services") { echo 'selected '; } ?>>Self-services</option>
	                            <option value="a-la-carte" <?php if ($this->uri->segment(5) == "a-la-carte") { echo 'selected '; } ?>>A la carte</option>
	                            <option value="washington-redskins" <?php if ($this->uri->segment(5) == "washington-redskins") { echo 'selected '; } ?>>Washington Redskins</option>
	                            <option value="callas-cowboys" <?php if ($this->uri->segment(5) == "callas-cowboys") { echo 'selected '; } ?>>Dallas Cowboys</option>
	                        </optgroup>
	                    </select>
	                </form>
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
            	<img src="<?php echo base_url('tim.php?src=uploads/publicidades/'. $pubbottom->img_vd_publicidade .'&w=980&h=170'); ?>" 
                     alt="<?php echo $pubbottom->titulo_publicidade; ?>" 
                     class="" />
            </a>
        </div>
        <?php }} ?>
	</div>
</div><!-- /publicidade -->
<div class="conteudo">
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
</div>

<!-- Conteudo
================================================== -->
<div id="conteudo" class="">
	<div class="conteudo">
		<div class="topo_area_categoria">
			<img src="<?php echo base_url(); ?>/assets/images/icone_bebidas_laranja.png" class="icone_area_categoria" alt="icone" />
			<h1 class="titulo_area_categoria">Bebidas</h1>
		</div>
		<!--Inicio da área de conteúdo esquerda-->
		<div id="area_conteudo_esquerda_pesquisa" class="area_conteudo">
		<!-- Listar all
		================================================== -->
			<?php if (count($bebidas) != 0) { foreach ($bebidas as $bebida) { ?>
			<div class="resultado_pesquisa">
				<?php if (empty($bebida->logo_bebida)) { echo image_thumb('uploads/logos/default.jpg', 240, 146, '', 'logo_resultado_pesquisa', ''); } else { echo image_thumb('uploads/logos/' . $bebida->logo_bebida, 240, 146, '', 'logo_resultado_pesquisa', ''); } ?>
				<h3 class="estabelecimento_resultado_pesquisa"><?php echo $bebida->nome_bebida; ?></h3>
				<p class="local_resultado_pesquisa">Local: <?php echo $bebida->ds_bairro_nome; ?></p>
				<h4>Acessível para:</h4>
				<?php  
				$adaptado = $bebida->adaptado_bebida;
				$adaptado = explode(',', $adaptado);

				if (in_array('cego', $adaptado)){ echo '<img src="'. base_url() .'assets/images/icone_cego_pequeno.jpg" title="Adaptado para deficientes visuais e cegos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
		        else { echo '<img src="'. base_url() .'assets/images/icone_cego_pequeno_claro.jpg" title="Não adaptado para eficientes visuais e cegos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }

		        if (in_array('surdo', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_surdo_pequeno.jpg" title="Adaptado para deficientes auditivos e surdos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
		        else { echo '<img src="'. base_url() .'assets/images/icone_surdo_pequeno_claro.jpg" title="Não adaptado para deficientes auditivos e surdos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }

		        if (in_array('deficientefisico', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_deficiente_pequeno.jpg" title="Adaptado para deficiente físico" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
		        else { echo '<img src="'. base_url() .'assets/images/icone_deficiente_pequeno_claro.jpg" title="Não adaptado para deficientes físicos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }

		        if (in_array('braile', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_braille_pequeno.jpg" title="Local com cardápios em braile" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
		        else { echo '<img src="'. base_url() .'assets/images/icone_braille_pequeno_claro.jpg" title="O local não possue cardápios em braile" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }

		        if (in_array('obeso', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_obeso_pequeno.jpg" title="Local adaptado para obesos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
		        else { echo '<img src="'. base_url() .'assets/images/icone_obeso_pequeno_claro.jpg" title="Local não adaptado para obesos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }

		        if (in_array('idoso', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_idoso_pequeno.jpg" title="Local adaptado para idosos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
		    	else { echo '<img src="'. base_url() .'assets/images/icone_idoso_pequeno_claro.jpg" title="Local não adaptado para idosos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }

		        if (in_array('gestante', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_gestante_pequeno.jpg" title="Local adaptado para gestantes" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
		    	else { echo '<img src="'. base_url() .'assets/images/icone_gestante_pequeno_claro.jpg" title="Local não adaptado para gestantes" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }

		        if (in_array('bebe', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_bebe_pequeno.jpg" title="Local adaptado para crianças e/ou recém nascidos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
		    	else { echo '<img src="'. base_url() .'assets/images/icone_bebe_pequeno_claro.jpg" title="Local adaptado para crianças e/ou recém nascidos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
		        ?>

				<div class="rodape_resultado_pesquisa">
					<a href="<?php echo base_url('bebidas/detalhe') . '/' . $bebida->slug_bebida . '/' . $bebida->id_bebida; ?>" title="">
						<img src="<?php echo base_url(); ?>assets/images/mais_pequeno.png" alt="" />
						<h2>Ver mais informações</h2>
					</a>
				</div>
			</div>
			
			
			<?php
				}
			}
			else {
				echo 'Ops! Ainda não tem bebidas cadastrados nessa categoria.';
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
				
					
				<div id="filtrar_pesquisa" class="select">
				<div id="topo_select_ordenar"></div>
					<select id="filtrar_ordem_bebida">
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

	</div><!-- /fim da classe conteudo -->
</div><!-- /conteudo -->

<div class="conteudo">
	<div id="publicidade_inferior" class="publicidade">
		<div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider">
			<?php
			if (isset($pub_bottom)) {
				foreach ($pub_bottom as $pubbottom) {
			?>
			<div class="item-slider">
				<a href="<?php echo $pubbottom->link_publicidade; ?>" title="<?php echo $pubbottom->titulo_publicidade; ?>" target="<?php echo ($pubbottom->newtab_publicidade == 0 ? '_self' : '_blank' ); ?>">
					<?php echo image_thumb('uploads/publicidades/' . $pubbottom->img_vd_publicidade, 980, 170, '', '', '' ); ?>
				</a>
			</div>
			<?php }} ?>
		</div>
	</div>
</div><!-- /publicidade -->
</div>
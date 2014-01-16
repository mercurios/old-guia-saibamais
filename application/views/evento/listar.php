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
			<img src="<?php echo base_url(); ?>/assets/images/icone_mascaras.png" class="icone_area_categoria" alt="icone" />
			<h1 class="titulo_area_categoria">Entretenimento - Exposições</h1>
		</div>
		<!--Inicio da área de conteúdo esquerda-->
		<div id="area_conteudo_esquerda_pesquisa" class="area_conteudo">
		<!-- Listar all
		================================================== -->
			<?php 
			if (count($conteudo) != 0) {
				foreach ($conteudo as $evento) {
			?>

			<div class="resultado_pesquisa">
				<img src="<?php echo base_url('tim.php?src=uploads/logos/'. $evento->logo_evento .'&w=240&h=146'); ?>" alt="logo" class="logo_resultado_pesquisa" />
				<h3 class="estabelecimento_resultado_pesquisa"><?php echo $evento->nome_evento; ?></h3>
				<p class="local_resultado_pesquisa">Local: <?php echo $evento->ds_bairro_nome; ?></p>
				<div class="rodape_resultado_pesquisa">
					<a href="<?php echo base_url('eventos/detalhe') . '/' . $evento->slug_evento . '/' . $evento->id_evento; ?>" title="">
						<img src="<?php echo base_url(); ?>assets/images/mais_pequeno.png" alt="" />
						<h2>Ver mais informações</h2>
					</a>
				</div>
			</div>

			<?php
				}
			}
			else {
				echo 'Ops! Ainda não tem eventos cadastrados nessa categoria.';
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
						<select id="filtro_local_evento">
							<option value="all">Por localização</option>

							<optgroup label="Recife">
								<?php foreach ($bairros as $bairro) : ?>
									<option value="<?php echo $bairro->cd_bairro ?>" <?php if ($this->uri->segment(3) == $bairro->cd_bairro) { echo 'selected '; } ?>><?php echo $bairro->ds_bairro_nome ?></option>
								<?php endforeach; ?>
							</optgroup>
						</select>
						
						<h4>ou</h4>
					 
						<select id="filtro_adaptado_evento">
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
				
					
				<div id="filtrar_pesquisa" class="select">
				<div id="topo_select_ordenar"></div>
					<select id="filtrar_ordem_evento">
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
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
			<img src="<?php echo base_url(); ?>/assets/images/icone_bicicleta_laranja.png" class="icone_area_categoria" alt="icone" />
			<h1 class="titulo_area_categoria">Passeio e Lazer</h1>
		</div>
		<!--Inicio da área de conteúdo esquerda-->
		<div id="area_conteudo_esquerda_pesquisa" class="area_conteudo">
		<!-- Listar all
		================================================== -->
			<?php 
			if (count($rotas) != 0) {
				foreach ($rotas as $rota) {
			?>
			<div class="resultado_pesquisa">
				<img src="<?php echo base_url() ?>tim.php?src=uploads/logos/<?php echo $rota->logo_rota; ?>&w=240&h=146" alt="logo" class="logo_resultado_pesquisa" />
				<h3 class="estabelecimento_resultado_pesquisa"><?php echo $rota->titulo_rota; ?></h3>
				<div class="rodape_resultado_pesquisa">
					<a href="<?php echo base_url('rotas/detalhe') . '/' . $rota->slug_rota . '/' . $rota->id_rota; ?>" title="">
						<img src="<?php echo base_url(); ?>assets/images/mais_pequeno.png" alt="" />
						<h2>Ver mais informações</h2>
					</a>
				</div>
			</div>
			
			<?php } } else { echo 'Ops! Ainda não tem rotas cadastrados nessa categoria.'; } ?>
		</div><!-- /listar-all -->
		<!--Fim da área de conteúdo esquerda-->
		<!--Inicio da área de conteúdo direita-->
		<div id="area_conteudo_direita_pesquisa" class="area_conteudo">
			<!--Inicio do campo de filtragem-->
			<div id="filtrar_ordenar">
				<div id="filtrar_pesquisa" class="select">
					<div id="topo_select_filtrar"></div>
						<select>
							<option selected>Por rotaização</option>
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
							<option selected>Por atividade</option>
								<optgroup label="Visitar rotas	">
									<option>Cachoeiras</option>
									<option>Lugares históricos</option>
									<option>Matas</option>
								</optgroup>
								<optgroup label="Praticar rotas">
									<option>Arborismo</option>
									<option>Ciclismo</option>
									<option>Futebol</option>
								</optgroup>
								<optgroup label="Rotas para passeio">
									<option>Assustadoras</option>
									<option>Familiar</option>
									<option>rotas históricos</option>
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
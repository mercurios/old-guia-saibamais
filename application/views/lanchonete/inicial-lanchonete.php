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
			<img src="<?php echo base_url(); ?>/assets/images/icone_lanches_laranja2.png" class="icone_area_categoria" alt="icone" />
			<h1 class="titulo_area_categoria">Lanchonetes</h1>
		</div>

		<!--Inicio da área de conteúdo esquerda-->
		<div id="area_conteudo_esquerda" class="area_conteudo">
			<div class="sliders-medium esquerda">
				<div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider" data-cycle-overlay-template="{{title}}">
					<?php
					if (isset($chamada_lan_s)) {
						foreach ($chamada_lan_s as $lan_s) {
					?>

					<div class="item-slider" data-title="<?php echo $lan_s->titulo_chamada; ?>">
						<a class="various fancybox.ajax" href="<?php echo base_url('chamadas/detalhe' . '/' . $lan_s->id_chamada) ?>">
							<?php echo image_thumb('uploads/chamadas/' . $lan_s->img_chamada, 326, 250, $lan_s->titulo_chamada, '', ''); ?>
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
			<div class="chamadas direita">
				<?php
				if (isset($chamada_p_top)) {
					foreach ($chamada_p_top as $lan_p_top) {
				?>

				<div class="chamada_pequena">
					<a class="various fancybox.ajax" href="<?php echo base_url('chamadas/detalhe' . '/' . $lan_p_top->id_chamada) ?>">
						<?php echo image_thumb('uploads/chamadas/' . $lan_p_top->img_chamada, 99, 77, $lan_p_top->titulo_chamada, 'img_chamada_pequena', ''); ?>
						<p><?php echo character_limiter($lan_p_top->desc_chamada, 120); ?></p>
					</a>
				</div>

				<?php
					}
				}
				?>
			</div><!-- /chamadas -->

			<div class="chamada-horizontal">
				<?php
				if (isset($chamada_lan_m)) {
					foreach ($chamada_lan_m as $lan_m) {
				?>

				<div class="chamada_media">
					<a class="various fancybox.ajax" href="<?php echo base_url('chamadas/detalhe' . '/' . $lan_m->id_chamada) ?>">
						<?php echo image_thumb('uploads/chamadas/' . $lan_m->img_chamada, 154, 102, $lan_m->titulo_chamada, 'img_chamada_media', ''); ?>
						<h2><?php echo $lan_m->titulo_chamada; ?></h2>
						<p><?php echo character_limiter($lan_m->desc_chamada, 80); ?></p>
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
					if (isset($chamada_lan_s_f)) {
						foreach ($chamada_lan_s_f as $lan_s_f) {
					?>

					<div class="item-slider" data-title="<?php echo $lan_s_f->titulo_chamada; ?>">
						<a class="various fancybox.ajax" href="<?php echo base_url('chamadas/detalhe' . '/' . $lan_s_f->id_chamada) ?>">
							<?php echo image_thumb('uploads/chamadas/' . $lan_s_f->img_chamada, 670, 200, $lan_s_f->titulo_chamada, '', ''); ?>
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
					foreach ($chamada_p_bot as $lan_p_bot) {
				?>
				<div class="chamada_pequena">
					<a class="various fancybox.ajax" href="<?php echo base_url('chamadas/detalhe' . '/' . $lan_p_bot->id_chamada) ?>">
						<?php echo image_thumb('uploads/chamadas/' . $lan_p_bot->img_chamada, 99, 77, $lan_p_bot->titulo_chamada, 'img_chamada_pequena', ''); ?>
						<p><?php echo character_limiter($lan_p_bot->desc_chamada, 80); ?></p>
					</a>
				</div>
				<?php
					}
				}
				?>
			</div>

			<div class="chamadas_sidebar_esquerda">
				<?php
				if (isset($chamada_lan_m_p)) {
					foreach ($chamada_lan_m_p as $lan_m_p) {
				?>

				<div class="chamada-captions">
					<?php echo image_thumb('uploads/chamadas/' . $lan_m_p->img_chamada, 154, 168, $lan_m_p->titulo_chamada, '', ''); ?>
					<span>
						<a class="various fancybox.ajax" href="<?php echo base_url('chamadas/detalhe' . '/' . $lan_m_p->id_chamada) ?>"><?php echo $lan_m_p->titulo_chamada; ?></a>
					</span>
				</div>

				<?php
					}
				}
				?>        
			</div>

			<div class="chamadas_sidebar_direita">
				<?php
				if (isset($chamada_lan_m_f)) {
					foreach ($chamada_lan_m_f as $lan_m_f) {
				?>
				<div class="chamada-captions-grande">
					<?php echo image_thumb('uploads/chamadas/' . $lan_m_f->img_chamada, 343, 370, $lan_m_f->titulo_chamada, '', ''); ?>

					<span>
						<a class="various fancybox.ajax" href="<?php echo base_url('chamadas/detalhe' . '/' . $lan_m_f->id_chamada) ?>"><?php echo $lan_m_f->titulo_chamada; ?></a>
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
								<?php echo image_thumb('uploads/publicidades/' . $pubcontbottom->img_vd_publicidade, 620, 70, '', '', '' ); ?>
							</a>
						</div>
						<?php } } ?>
					</div>
				</div>
			</div><!-- Publicidade -->
				
			<div class="chamada-horizontal">
				<?php
				if (isset($chamada_lan_m_2)) {
					foreach ($chamada_lan_m_2 as $lan_m) {
				?>
				<div class="chamada_media">
					<a class="various fancybox.ajax" href="<?php echo base_url('chamadas/detalhe' . '/' . $lan_m->id_chamada) ?>">
						<?php echo image_thumb('uploads/chamadas/' . $lan_m->img_chamada, 154, 102, $lan_m->titulo_chamada, 'img_chamada_media', ''); ?>
						<h2><?php echo $lan_m->titulo_chamada; ?></h2>
						<p><?php echo character_limiter($lan_m->desc_chamada, 80); ?></p>
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
					<div id="topo_select_escolha_lanchonetes"></div>
						<select name="filtrar_local_lanchonete" id="filtrar_local_lanchonete">
							<option value="all">Por localização</option>

							<optgroup label="Recife">
								<?php foreach ($bairros as $bairro) : ?>
									<option value="<?php echo $bairro->cd_bairro ?>" <?php if ($this->uri->segment(3) == $bairro->cd_bairro) { echo 'selected '; } ?>><?php echo $bairro->ds_bairro_nome ?></option>
								<?php endforeach; ?>
							</optgroup>
						</select>
						
						<h4>ou</h4>
					 
						<select id="filtrar_adaptado_lanchonete">
							<option value="all">Que seja acessivel à:</option>
							<option value="cego" <?php if ($this->uri->segment(4) == "cego") { echo 'selected '; } ?>>Cegos</option>
							<option value="deficientes-fisicos" <?php if ($this->uri->segment(4) == "deficientes-fisicos") { echo 'selected '; } ?>>Deficientes físicos</option>
							<option value="gestantes" <?php if ($this->uri->segment(4) == "gestantes") { echo 'selected '; } ?>>Gestantes</option>
							<option value="idosos" <?php if ($this->uri->segment(4) == "idosos") { echo 'selected '; } ?>>Idosos</option>
							<option value="obesos" <?php if ($this->uri->segment(4) == "obesos") { echo 'selected '; } ?>>Obesos</option>
							<option value="surdos" <?php if ($this->uri->segment(4) == "surdos") { echo 'selected '; } ?>>Surdos</option>
						</select>
						
						<h4>ou</h4>
											
						<select id="filtrar_comida_lanchonete">
							<option value="all" selected>Por lanche</option>
								<option value="acai" <?php if ($this->uri->segment(5) == "acai") { echo 'selected '; } ?>>Acaí</option>
								<option value="crepes" <?php if ($this->uri->segment(5) == "crepes") { echo 'selected '; } ?>>Crepes</option>
								<option value="doces" <?php if ($this->uri->segment(5) == "doces") { echo 'selected '; } ?>>Doces</option>
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
								<?php echo image_thumb('uploads/publicidades/' . $pubsidebar->img_vd_publicidade, 306, 510, '', '', '' ); ?>
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
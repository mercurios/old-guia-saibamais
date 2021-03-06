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
			<h1 class="titulo_area_categoria">Entretenimento</h1>
		</div>
		<!--Inicio da área de conteúdo esquerda-->
		<div id="area_conteudo_esquerda" class="area_conteudo">
			<div class="sliders-medium esquerda">
					<div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider" data-cycle-overlay-template="{{title}}">
						<?php
						if (isset($chamada_entre_s)) {
							foreach ($chamada_entre_s as $entre_s) {
						?>

						<div class="item-slider" data-title="<?php echo $entre_s->titulo_chamada; ?>">
							<a href="<?php echo $entre_s->link_chamada; ?>" title="<?php echo $entre_s->titulo_chamada; ?>">
								<img src="<?php echo base_url('tim.php?src=uploads/chamadas/'. $entre_s->img_chamada .'&w=326&h=250'); ?>" 
									 alt="<?php echo $entre_s->titulo_chamada; ?>" 
									 class="" />
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
						foreach ($chamada_p_top as $entre_p_top) {
					?>

					<div class="chamada_pequena">
						<a href="<?php echo $entre_p_top->link_chamada; ?>" title="<?php echo $entre_p_top->titulo_chamada; ?>">
							<img src="<?php echo base_url('tim.php?src=uploads/chamadas/'. $entre_p_top->img_chamada .'&w=99&h=77'); ?>" 
									 alt="<?php echo $entre_p_top->titulo_chamada; ?>" 
									 class="img_chamada_pequena" />
							<p><?php echo character_limiter($entre_p_top->desc_chamada, 120); ?></p>
						</a>
					</div>

					<?php
						}
					}
					?>
				</div><!-- /chamadas -->

				<div class="chamada-horizontal">
					<?php
					if (isset($chamada_entre_m)) {
						foreach ($chamada_entre_m as $entre_m) {
					?>

					<div class="chamada_media">
						<a href="<?php echo $entre_m->link_chamada; ?>" title="<?php echo $entre_m->titulo_chamada; ?>">
							<img src="<?php echo base_url('tim.php?src=uploads/chamadas/'. $entre_m->img_chamada .'&w=154&h=102'); ?>" 
									 alt="<?php echo $entre_m->titulo_chamada; ?>" 
									 class="img_chamada_media" />
							<h2><?php echo $entre_m->titulo_chamada; ?></h2>
							<p><?php echo character_limiter($entre_m->desc_chamada, 80); ?></p>
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
						<?php if (isset($chamada_entre_s_f)) { foreach ($chamada_entre_s_f as $entre_s_f) { ?>
						<div class="item-slider" data-title="<?php echo $entre_s_f->titulo_chamada; ?>">
							<a href="<?php echo $entre_s_f->link_chamada; ?>" title="<?php echo $entre_s_f->titulo_chamada; ?>">
								<img src="<?php echo base_url('tim.php?src=uploads/chamadas/'. $entre_s_f->img_chamada .'&w=670&h=200'); ?>" alt="" />
							</a>
						</div>
						<?php } } ?>
						<div class="cycle-overlay"></div>
						<div class="cycle-pager"></div>
					</div>
				</div><!-- /sliders -->
			   <div class="chamada-horizontal">
					<?php
					if (isset($chamada_p_bot)) {
						foreach ($chamada_p_bot as $entre_p_bot) {
					?>
					<div class="chamada_pequena">
						<a href="<?php echo $entre_p_bot->link_chamada; ?>" title="<?php echo $entre_p_bot->titulo_chamada; ?>">
							<img src="<?php echo base_url('tim.php?src=uploads/chamadas/'. $entre_p_bot->img_chamada .'&w=99&h=77'); ?>" 
								 alt="<?php echo $entre_p_bot->titulo_chamada; ?>" 
								 class="img_chamada_pequena" />
							<p><?php echo character_limiter($entre_p_bot->desc_chamada, 80); ?></p>
						</a>
					</div>
					<?php
						}
					}
					?>
				</div>
				<div class="chamadas_sidebar_esquerda">
				<?php
				if (isset($chamada_entre_m_p)) {
					foreach ($chamada_entre_m_p as $entre_m_p) {
				?>

				<div class="chamada-captions">
					<img src="<?php echo base_url('tim.php?src=uploads/chamadas/'. $entre_m_p->img_chamada .'&w=154&h=168'); ?>" 
						 alt="<?php echo $entre_m_p->titulo_chamada; ?>" 
						 class="" />

					<span>
						<a href="<?php echo $entre_m_p->link_chamada; ?>" title="<?php echo $entre_m_p->titulo_chamada; ?>"><?php echo $entre_m_p->titulo_chamada; ?></a>
					</span>
				</div>

				<?php
					}
				}
				?>        
				</div>
				<div class="chamadas_sidebar_direita">
					<?php
					if (isset($chamada_entre_m_f)) {
						foreach ($chamada_entre_m_f as $entre_m_f) {
					?>
					<div class="chamada-captions-grande">
						<img src="<?php echo base_url('tim.php?src=uploads/chamadas/'. $entre_m_f->img_chamada .'&w=343&h=370'); ?>" 
							 alt="<?php echo $entre_m_f->titulo_chamada; ?>" 
							 class="" />
						<span>
							<a href="<?php echo $entre_m_f->link_chamada; ?>" title="<?php echo $entre_m_f->titulo_chamada; ?>"><?php echo $entre_m_f->titulo_chamada; ?></a>
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
								<img src="<?php echo base_url('tim.php?src=uploads/publicidades/'. $pubcontbottom->img_vd_publicidade .'&w=620&h=70'); ?>" 
									 alt="<?php echo $pubcontbottom->titulo_publicidade; ?>" 
									 class="" />
							</a>
						</div>
						<?php } } ?>
					</div>
				</div>
			</div><!-- Publicidade -->
				
				<div class="chamada-horizontal">
					<?php
					if (isset($chamada_entre_m_2)) {
						foreach ($chamada_entre_m_2 as $entre_m) {
					?>

					<div class="chamada_media">
						<a href="<?php echo $entre_m->link_chamada; ?>" title="<?php echo $entre_m->titulo_chamada; ?>">
							<img src="<?php echo base_url('tim.php?src=uploads/chamadas/'. $entre_m->img_chamada .'&w=154&h=102'); ?>" 
								 alt="<?php echo $entre_m->titulo_chamada; ?>" 
								 class="img_chamada_media" />
							<h2><?php echo $entre_m->titulo_chamada; ?></h2>
							<p><?php echo character_limiter($entre_m->desc_chamada, 80); ?></p>
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
					<div id="topo_select_escolha_entretenimento"></div>
						<select>
							<option selected>Por cidade</option>
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
						
						<select id="filter_categoria_entretenimento">
							<option value="" selected>Por tipo</option>
								<option value="cinemas">Cinemas</option>
								<option value="exposicoes">Exposições</option>
								<option value="eventos">Feiras e eventos</option>
								<option value="shows">Shows</option>
								<option value="teatros">Teatros</option>
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
								<img src="<?php echo base_url('tim.php?src=uploads/publicidades/'. $pubsidebar->img_vd_publicidade .'&w=306&h=510'); ?>" 
									 alt="<?php echo $pubsidebar->titulo_publicidade; ?>" 
									 class="" />
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
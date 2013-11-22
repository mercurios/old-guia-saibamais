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

<!-- Conteudo
================================================== -->
<div id="conteudo" class="">
	<div id="area_conteudo_esquerda" class="area_conteudo">

        <!-- conteudo Passeio e lazer -->
		<div id="area_conteudo_home_passeio" class="area_conteudo_home">
			<div class="topo_area_categoria">
				<img src="<?php echo base_url(); ?>/assets/images/icone_bicicleta_laranja.png" class="icone_area_categoria" alt="icone" />
				<h1 class="titulo_area_categoria">Passeio e Lazer</h1>
			</div>

			<!-- sliders -->
			<div class="sliders-grande direita">
				<div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider" data-cycle-overlay-template="{{title}}">
					<?php if (isset($lazer_slider)) { foreach ($lazer_slider as $slider_lazer) { ?>
					<div class="item-slider" data-title="<?php echo $slider_lazer->titulo_chamada; ?>">
						<a href="<?php echo $slider_lazer->link_chamada; ?>" title="<?php echo $slider_lazer->titulo_chamada; ?>">
							<?php echo image_thumb('uploads/chamadas/' . $slider_lazer->img_chamada, 670, 200 ); ?>
						</a>
					</div>
					<?php }} ?>
					<div class="cycle-overlay"></div>
					<div class="cycle-pager"></div>
				</div>
			</div><!-- /sliders -->

			<!-- chamadas -->

			<div class="chamada-horizontal">
				<?php
				if (isset($lazer_media)) {
					foreach ($lazer_media as $media_lazer) {
				?>
				<div class="chamada_media">
					<a href="<?php echo $media_lazer->link_chamada; ?>" title="<?php echo $media_lazer->titulo_chamada; ?>">
						<?php echo image_thumb('uploads/chamadas/' . $media_lazer->img_chamada, 154, 102, '', 'img_chamada_media' ); ?>
						<h2><?php echo $media_lazer->titulo_chamada; ?></h2>
						<p><?php echo character_limiter($media_lazer->desc_chamada, 80); ?></p>
					</a>
				</div>
				<?php
					}
				}
				?>
			</div>

			<div class="rodape_area_categoria">
				<a href="<?php echo base_url('passeio-e-lazer'); ?>" title="Clique aqui e acesse uma página esclusiva com informações, matérias, promoções e outras coisas sobre Passeio e lazer">
                	<div class="conteudo_rodape_pagina_categoria">
						<h4>Acessar página de Passeio e Lazer</h4>
                    	<img src="<?php echo base_url(); ?>/assets/images/mais.png" alt=""/>
					</div>
                </a>
			</div>
		</div><!-- /conteudo Passeio e lazer -->

         <!-- Publicidade -->
        <div id="publicidade_meio_index" class="publicidade">
            <div class="conteudo_publicidade">
                <div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider">
                    <?php
		        	if (isset($pub_contenttop)) {
		        		foreach ($pub_contenttop as $pubconttop) {
		        	?>
	        		<div class="item-slider">
		                <a href="<?php echo $pubconttop->link_publicidade; ?>" title="" target="<?php echo ($pubconttop->newtab_publicidade == 0 ? '_self' : '_blank' ); ?>">
			                <?php echo image_thumb('uploads/publicidades/' . $pubconttop->img_vd_publicidade, 620, 70, '', 'img_chamada_media', '' ); ?>
		                </a>
		            </div>
		        	<?php } } ?>
                </div>
            </div>
        </div><!-- Publicidade -->

		<!-- conteudo restaurante -->
		<div id="area_conteudo_home_restaurantes" class="area_conteudo_home">
			<div class="topo_area_categoria">
				<img src="<?php echo base_url(); ?>/assets/images/icone_restaurante_laranja.png" class="icone_area_categoria" alt="icone" />
				<h1 class="titulo_area_categoria">Restaurantes</h1>
			</div>

			<!-- sliders -->
			<div class="sliders-medium direita">
				<div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider" data-cycle-overlay-template="{{title}}">

					<?php
					if (isset($chamada_res_s)) {
						foreach ($chamada_res_s as $res_s) {
					?>

					<div class="item-slider" data-title="<?php echo $res_s->titulo_chamada; ?>">
						<a href="<?php echo $res_s->link_chamada; ?>" title="<?php echo $res_s->titulo_chamada; ?>">
							<?php echo image_thumb('uploads/chamadas/' . $res_s->img_chamada, 326, 250, '', '', '' ); ?>
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
			<div class="chamadas esquerda">
				<?php
				if (isset($chamada_res_p)) {
					foreach ($chamada_res_p as $res_p) {
				?>

				<div class="chamada_pequena">
					<a href="<?php echo $res_p->link_chamada; ?>" title="<?php echo $res_p->titulo_chamada; ?>">
						<?php echo image_thumb('uploads/chamadas/' . $res_p->img_chamada, 99, 77, '', 'img_chamada_pequena', '' ); ?>
                        <p><?php echo character_limiter($res_p->desc_chamada, 120); ?></p>
					</a>
				</div>

				<?php
					}
				}
				?>
			</div><!-- /chamadas -->

			<div class="chamada-horizontal">
				<?php
				if (isset($chamada_res_m)) {
					foreach ($chamada_res_m as $res_m) {
				?>

				<div class="chamada_media">
					<a href="<?php echo $res_m->link_chamada; ?>" title="<?php echo $res_m->titulo_chamada; ?>">
						<?php echo image_thumb('uploads/chamadas/' . $res_m->img_chamada, 154, 102, '', 'img_chamada_media', '' ); ?>
						<h2><?php echo $res_m->titulo_chamada; ?></h2>
						<p><?php echo character_limiter($res_m->desc_chamada, 80); ?></p>
					</a>
				</div>

				<?php
					}
				}
				?>
			</div><!-- /chamadas horizontais -->

			<div class="rodape_area_categoria">
				<a href="<?php echo base_url('restaurantes'); ?>" title="Clique aqui e acesse uma página esclusiva com informações, matérias, promoções e outras coisas sobre restaurantes">
                	<div class="conteudo_rodape_pagina_categoria">
						<h4>Acessar página de Restaurantes</h4>
                    	<img src="<?php echo base_url(); ?>/assets/images/mais.png" alt=""/>
					</div>
                </a>
			</div>
		</div><!-- /conteudo restaurante -->

		<!-- conteudo lanchonete -->
		<div id="area_conteudo_home_lanchonetes" class="area_conteudo_home">
			<div class="topo_area_categoria">
				<img src="<?php echo base_url(); ?>/assets/images/icone_lanches_laranja2.png" class="icone_area_categoria" alt="icone" />
				<h1 class="titulo_area_categoria">Lanchonetes</h1>
			</div>

			<div class="sliders-medium esquerda">
				<div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider" data-cycle-overlay-template="{{title}}">
					<?php
					if (isset($chamada_lan_s)) {
						foreach ($chamada_lan_s as $lan_s) {
					?>

					<div class="item-slider" data-title="<?php echo $lan_s->titulo_chamada; ?>">
						<a href="<?php echo $lan_s->link_chamada; ?>" title="<?php echo $lan_s->titulo_chamada; ?>">
							<?php echo image_thumb('uploads/chamadas/' . $lan_s->img_chamada, 326, 250, '', '', '' ); ?>
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

			<div class="chamadas direita">
				<?php
				if (isset($chamada_lan_p)) {
					foreach ($chamada_lan_p as $lan_p) {
				?>

				<div class="chamada_pequena">
					<a href="<?php echo $lan_p->link_chamada; ?>" title="<?php echo $lan_p->titulo_chamada; ?>">
						<?php echo image_thumb('uploads/chamadas/' . $lan_p->img_chamada, 99, 77, '', 'img_chamada_pequena', '' ); ?>
                        <p><?php echo character_limiter($lan_p->desc_chamada, 120); ?></p>
					</a>
				</div>

				<?php
					}
				}
				?>
			</div><!-- /chamadas direita -->

			<div class="chamada-horizontal">
				<?php
				if (isset($chamada_lan_m)) {
					foreach ($chamada_lan_m as $lan_m) {
				?>

				<div class="chamada_media">
					<a href="<?php echo $lan_m->link_chamada; ?>" title="<?php echo $lan_m->titulo_chamada; ?>">
						<?php echo image_thumb('uploads/chamadas/' . $lan_m->img_chamada, 154, 102, '', 'img_chamada_media', '' ); ?>
						<h2><?php echo $lan_m->titulo_chamada; ?></h2>
						<p><?php echo character_limiter($lan_m->desc_chamada, 80); ?></p>
					</a>
				</div>

				<?php
					}
				}
				?>
			</div><!-- /chamadas horizontais -->

			<div class="rodape_area_categoria">
				<a href="<?php echo base_url('lanchonetes'); ?>" title="Clique aqui e acesse uma página esclusiva com informações, matérias, promoções e outras coisas sobre lanchonetes">
                    <div class="conteudo_rodape_pagina_categoria">
                        <h4>Acessar página de Lanchonetes</h4>
                        <img src="<?php echo base_url(); ?>/assets/images/mais.png" alt=""/>
                    </div>
                </a>
			</div>
		</div><!-- /conteudo lanchonete -->

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

		<!-- conteudo bebidas -->
		<div id="area_conteudo_home_bebidas" class="area_conteudo_home">
			<div class="topo_area_categoria">
				<img src="<?php echo base_url(); ?>/assets/images/icone_bebidas_laranja.png" class="icone_area_categoria" alt="icone" />
				<h1 class="titulo_area_categoria">Bebidas</h1>
			</div>

			<!-- sliders -->
			<div class="sliders-medium direita">
				<div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider" data-cycle-overlay-template="{{title}}">
					<?php
					if (isset($chamada_beb_s)) {
						foreach ($chamada_beb_s as $beb_s) {
					?>

					<div class="item-slider" data-title="<?php echo $beb_s->titulo_chamada; ?>">
						<a href="<?php echo $beb_s->link_chamada; ?>" title="<?php echo $beb_s->titulo_chamada; ?>">
							<?php echo image_thumb('uploads/chamadas/' . $beb_s->img_chamada, 326, 250, '', '', '' ); ?>
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
			<div class="chamadas esquerda">
				<?php
				if (isset($chamada_beb_p)) {
					foreach ($chamada_beb_p as $beb_p) {
				?>

				<div class="chamada_pequena">
					<a href="<?php echo $beb_p->link_chamada; ?>" title="<?php echo $beb_p->titulo_chamada; ?>">
						<?php echo image_thumb('uploads/chamadas/' . $beb_p->img_chamada, 99, 77, '', 'img_chamada_pequena', '' ); ?>
                        <p><?php echo character_limiter($beb_p->desc_chamada, 120); ?></p>
					</a>
				</div>

				<?php
					}
				}
				?>
			</div><!-- /chamadas -->

			<div class="chamada-horizontal">
				<?php
				if (isset($chamada_beb_m)) {
					foreach ($chamada_beb_m as $beb_m) {
				?>

				<div class="chamada_media">
					<a href="<?php echo $beb_m->link_chamada; ?>" title="<?php echo $beb_m->titulo_chamada; ?>">
						<?php echo image_thumb('uploads/chamadas/' . $beb_m->img_chamada, 154, 102, '', 'img_chamada_media', '' ); ?>
						<h2><?php echo $beb_m->titulo_chamada; ?></h2>
						<p><?php echo character_limiter($beb_m->desc_chamada, 80); ?></p>
					</a>
				</div>

				<?php
					}
				}
				?>
			</div>

			<div class="rodape_area_categoria">
				<a href="<?php echo base_url('bebidas'); ?>" title="Clique aqui e acesse uma página esclusiva com informações, matérias, promoções e outras coisas sobre Bebidas">
                    <div class="conteudo_rodape_pagina_categoria">
                        <h4>Acessar página de Bebidas</h4>
                        <img src="<?php echo base_url(); ?>/assets/images/mais.png" alt=""/>
                    </div>
                </a>
			</div>
		</div><!-- /conteudo bebidas -->
	</div><!-- /conteudo esquerda -->

	<!-- conteudo direita -->
	<div id="area_conteudo_direita" class="area_conteudo esquerda">

		<!-- Frases do dia -->
		<div id="frase_do_dia">
            <div class="topo_area_categoria" >
                <img src="<?php echo base_url(); ?>/assets/images/icone_frase.png" alt="icone" class="icone_area_categoria" />
                <h1 class="titulo_area_categoria">Frase do dia</h1>
            </div>
            <?php
            if (isset($frases_dia)) {
            	foreach ($frases_dia as $frase) :
            ?>
                <?php echo $frase->texto_frase; ?>
                <p><span>"<?php echo $frase->autor_frase; ?>"</span></p>
            <?php
            	endforeach;
            }
            ?>
        </div><!-- /frases do dia -->

        <!-- Entretenimentos -->
        <div id="area_conteudo_home_entretenimento" class="area_conteudo_home">
        	<div class="topo_area_categoria">
                <img src="<?php echo base_url(); ?>/assets/images/icone_mascaras.png" alt="icone" class="icone_area_categoria" />
                <h1 class="titulo_area_categoria">Entretenimento</h1>
            </div>

            <div class="chamadas_sidebar_esquerda">
            	<?php
            	if (isset($chamada_ent_m_p)) {
            		foreach ($chamada_ent_m_p as $ent_m_p) {
            	?>

            	<div class="chamada-captions">
            		<?php echo image_thumb('uploads/chamadas/' . $ent_m_p->img_chamada, 154, 168, '', '', '' ); ?>

	            	<span>
	            		<a href="<?php echo $ent_m_p->link_chamada; ?>" title="<?php echo $ent_m_p->titulo_chamada; ?>"><?php echo $ent_m_p->titulo_chamada; ?></a>
	             	</span>
	            </div>

	            <?php
            		}
            	}
            	?>
            </div><!-- /chamadas_sidebar_esquerda -->

            <?php
			if (isset($chamada_ent_p)) {
				foreach ($chamada_ent_p as $ent_p) {
			?>

			<div class="chamada_pequena esquerda">
				<?php echo image_thumb('uploads/chamadas/' . $ent_p->img_chamada, 99, 77, '', 'img_chamada_pequena', '' ); ?>

				<p>
					<a href="<?php echo $ent_p->link_chamada; ?>" title="<?php echo $ent_p->titulo_chamada; ?>">
						<?php echo character_limiter($ent_p->desc_chamada, 120); ?>
					</a>
				</p>
			</div>

			<?php
				}
			}
			?>

            <div class="chamada-horizontal">
				<?php
				if (isset($chamada_ent_m)) {
					foreach ($chamada_ent_m as $ent_m) {
				?>

				<div class="chamada_media">
					<a href="<?php echo $ent_m->link_chamada; ?>" title="<?php echo $ent_m->titulo_chamada; ?>">
						<?php echo image_thumb('uploads/chamadas/' . $ent_m->img_chamada, 154, 102, '', 'img_chamada_media', '' ); ?>
						<h2><?php echo $ent_m->titulo_chamada; ?></h2>
						<p><?php echo character_limiter($ent_m->desc_chamada, 120); ?></p>
					</a>
				</div>

				<?php
					}
				}
				?>
			</div>

            <div class="rodape_area_categoria">
				<a href="<?php echo base_url('entretenimento'); ?>" title="Clique aqui e acesse uma página esclusiva com informações, matérias, promoções e outras coisas sobre Bebidas">
                    <div class="conteudo_rodape_pagina_categoria">
                        <h4>Acessar página de Entretenimento</h4>
                        <img src="<?php echo base_url(); ?>/assets/images/mais.png" alt=""/>
                    </div>
                </a>
			</div>

        </div><!-- /entretenimentos -->

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

        <div id="area_conteudo_home_estadias" class="area_conteudo_home">
            <div class="topo_area_categoria">
                <img src="<?php echo base_url(); ?>/assets/images/icone_estadias.png" alt="icone" class="icone_area_categoria" />
                <h1 class="titulo_area_categoria">Estadias</h1>
            </div>

            <!-- sliders -->
			<div class="sliders-medium direita">
				<div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider" data-cycle-overlay-template="{{title}}">
					<?php
					if (isset($chamada_est_s)) {
						foreach ($chamada_est_s as $est_s) {
					?>

					<div class="item-slider" data-title="<?php echo $est_s->titulo_chamada; ?>">
						<a href="<?php echo $est_s->link_chamada; ?>" title="<?php echo $est_s->titulo_chamada; ?>">
							<?php echo image_thumb('uploads/chamadas/' . $est_s->img_chamada, 326, 250, '', '', '' ); ?>
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

            <div class="chamada-horizontal">
				<?php
				if (isset($chamada_est_m)) {
					foreach ($chamada_est_m as $est_m) {
				?>

				<div class="chamada_media">
					<a href="<?php echo $est_m->link_chamada; ?>" title="<?php echo $est_m->titulo_chamada; ?>">
						<?php echo image_thumb('uploads/chamadas/' . $est_m->img_chamada, 154, 102, '', 'img_chamada_media', '' ); ?>
						<h2><?php echo $est_m->titulo_chamada; ?></h2>
						<p><?php echo character_limiter($est_m->desc_chamada, 80); ?></p>
					</a>
				</div>

				<?php
					}
				}
				?>
			</div>

            <?php
			if (isset($chamada_est_p)) {
				foreach ($chamada_est_p as $est_p) {
			?>

			<div class="chamada_pequena esquerda">
				<?php echo image_thumb('uploads/chamadas/' . $est_p->img_chamada, 99, 77, '', 'img_chamada_pequena', '' ); ?>
				<p><a href="<?php echo $est_p->link_chamada; ?>" title="<?php echo $est_p->titulo_chamada; ?>"><?php echo character_limiter($est_p->desc_chamada, 120); ?></a></p>
			</div>

			<?php
				}
			}
			?>

            <div class="rodape_area_categoria">
				<a href="<?php echo base_url('estadias'); ?>" title="Clique aqui e acesse uma página esclusiva com informações, matérias, promoções e outras coisas sobre Estadias">
                    <div class="conteudo_rodape_pagina_categoria">
                        <h4>Acessar página de Estadias</h4>
                        <img src="<?php echo base_url(); ?>/assets/images/mais.png" alt=""/>
                    </div>
                </a>
			</div>
        </div>
	</div><!-- /conteudo direita -->
</div><!-- /conteudo -->

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
</div><!-- /publicidade -->
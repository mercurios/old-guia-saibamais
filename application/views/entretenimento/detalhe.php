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
		<div id="area_conteudo_superior"><!-- /inicio da area de conteudo superior -->
			<div id="topo_pagina_anunciante" class="">
				<div id="redes_sociais_pagina">
					<ul>
						<li><a href="" title="Flickr"><img src="<?php echo base_url('assets'); ?>/images/flickr_icon.jpg" alt="RS" /></a></li>
						<li><a href="" title="Instagram"><img src="<?php echo base_url('assets'); ?>/images/instagram_icon.jpg" alt="RS" /></a></li>
						<li><a href="" title="Youtube"><img src="<?php echo base_url('assets'); ?>/images/youtube_icon.jpg" alt="RS" /></a></li>
						<li><a href="" title="Orkut"><img src="<?php echo base_url('assets'); ?>/images/orkut_icon.jpg" alt="RS" /></a></li>
						<li><a href="" title="Google Plus"><img src="<?php echo base_url('assets'); ?>/images/gplus_icon.jpg" alt="RS" /></a></li>
						<li><a href="" title="Twitter"><img src="<?php echo base_url('assets'); ?>/images/twitter_icon.jpg" alt="RS" /></a></li>
						<li><a href="" title="Facebook"><img src="<?php echo base_url('assets'); ?>/images/facebook_icon.jpg" alt="RS" /></a></li>
					</ul>
				</div>
				<div id="logo_topo_pagina_anunciante" class="">
					<img src="<?php echo base_url('assets'); ?>/images/logo_barretos.jpg" alt="Logo do anunciante" />
					<h3>Restaurante e Pizzaria barretos</h3>
				</div>
			   
			   
			</div>
		</div><!-- /fim da area de conteudo superior -->
		<div id="area_conteudo_esquerda"><!-- /inicio da area de conteudo esquerda -->  
			<div id="album">
				<div class="topo_area_pagina">
					<img src="<?php echo base_url('assets'); ?>/images/icone_foto.png" class="icone_area_pagina" />
					<h1 class="titulo_area_pagina">Fotos</h1>
				</div>
				<div class="albun_fotos">
					<ul id="pikame" class="jcarousel-skin-pika">
						<?php
						if (isset($fotos)) {
							foreach ($fotos as $foto) {
						?>
						<li><img src="<?php echo base_url(); ?>tim.php?src=uploads/fotos/<?php echo $foto->img_foto; ?>&w=644"/></li>
						<?php
							}
						}
						else {
							echo '<li><img src="'.base_url().'uploads/fotos/default.jpg"/></li>';
						}
						?>
					</ul>
				</div>
			</div><!-- /album -->
			<div id="descricao_pagina_grande" class="w-grande">
				<div class="topo_area_pagina">
					<img src="<?php echo base_url('assets'); ?>/images/icone_descricao.png" class="icone_area_pagina" />
					<h1 class="titulo_area_pagina">Descrição</h1>
				</div>
					<p class="texto_pagina">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tristique elementum arcu a cursus. Integer et congue nulla. Quisque laoreet tristique imperdiet. Donec vel sollicitudin lectus. Vivamus orci lectus, tincidunt id sagittis eget, lacinia non sapien. Nulla non ligula a lacus ornare aliquet sed in lacus. Etiam viverra purus </p>
			</div>
			<div id="cinema">
			<div class="topo_area_pagina">
				<img src="<?php echo base_url('assets'); ?>/images/icone_cardapio.png" class="icone_area_pagina" />
				<h1 class="titulo_area_pagina">Filmes</h1>
			</div>
			<div class="cartaz">
				<img src="img/cartaz.jpg" alt="" />
				<h4>Os instrumentos mortais - cidade dos ossos</h4>
				<p>Carne de sol assada na brasa, servida com arroz branco, batata fritas e salada Carne de sol assada na brasa, servida com arroz branco, batata fritas e salada Carne de sol assada na brasa, servida com arroz branco, batata fritas e salada</p>
				<div class="classificacao_indicativa">
					<h4>Duração:</h4>
					<p title="duração">1h40min </p>
					<span>/</span>
					<p title="Gênero">Aventura</p>
					<span>/</span>
					<p title="Censura">12 anos</p>
				</div>
					
				<div class="horarios_exibicao">
					<h3>Dias e horários de exibição:</h3>
					<div class="dia_exibicao">
						<h4>Seg</h4>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
					</div>
					<div class="dia_exibicao">
						<h4>Ter</h4>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
					</div>
					<div class="dia_exibicao">
						<h4>Qua</h4>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
					</div>
					<div class="dia_exibicao">
						<h4>Qui</h4>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
					</div>
					<div class="dia_exibicao">
						<h4>Sex</h4>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
					</div>
					<div class="dia_exibicao">
						<h4>Sab</h4>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
					</div>
					<div class="dia_exibicao">
						<h4>Dom</h4>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
					</div>
				</div>
			</div>
			<div class="cartaz">
				<img src="img/cartaz.jpg" alt="" />
				<h4>Os instrumentos mortais - cidade dos ossos</h4>
				<p>Carne de sol assada na brasa, servida com arroz branco, batata fritas e salada Carne de sol assada na brasa, servida com arroz branco, batata fritas e salada Carne de sol assada na brasa, servida com arroz branco, batata fritas e salada</p>
				<div class="classificacao_indicativa">
					<h4>Duração:</h4>
					<p title="duração">1h40min </p>
					<span>/</span>
					<p title="Gênero">Aventura</p>
					<span>/</span>
					<p title="Censura">12 anos</p>
				</div>
					
				<div class="horarios_exibicao">
					<h3>Dias e horários de exibição:</h3>
					<div class="dia_exibicao">
						<h4>Seg</h4>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
					</div>
					<div class="dia_exibicao">
						<h4>Ter</h4>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
					</div>
					<div class="dia_exibicao">
						<h4>Qua</h4>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
					</div>
					<div class="dia_exibicao">
						<h4>Qui</h4>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
					</div>
					<div class="dia_exibicao">
						<h4>Sex</h4>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
					</div>
					<div class="dia_exibicao">
						<h4>Sab</h4>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
					</div>
					<div class="dia_exibicao">
						<h4>Dom</h4>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
						<p>10:00</p>
					</div>
				</div>
			</div>
			
			 
		</div>
			<div id="informacoes_pagina" >
				<div class="topo_area_pagina">
					<img src="<?php echo base_url('assets'); ?>/images/icone_informacao.png" class="icone_area_pagina" />
					<h1 class="titulo_area_pagina">Informações</h1>
				</div>
				<div class="informacoes_pagina">
					<h4>Preço(s):</h4> 
					<div class="precos_informacoes_pagina">
						<h6>Inteira</h6>
						<p>R$ 30,00</p>
					</div>
					<div class="precos_informacoes_pagina">
						<h6>Meia</h6>
						<p>R$ 30,00</p>
					</div>
					<div class="precos_informacoes_pagina">
						<h6>Especial</h6>
						<p>R$ 30,00</p>
					</div>
				</div>
				<div class="informacoes_pagina_2">
					<h4>Dia(s) e horário(s) para visitação:</h4> 
					<div id="funcionamento_pagina">
						<div class="funcionamento_pagina_semana">
							<h2>Domingo</h2>
							<p>8:00 às 13:00 e 16:00 às 22:00</p>
						</div>
						<div class="linha_separatoria"></div>
						<div class="funcionamento_pagina_semana">
							<h2>Segunda-feira</h2>
							<p>8:00 às 13:00 e 16:00 às 22:00</p>
						</div>
						<div class="linha_separatoria"></div>
						<div class="funcionamento_pagina_semana">
							<h2>Terça-feira</h2>
							<p>8:00 às 13:00 e 16:00 às 22:00</p>
						</div>
						<div class="linha_separatoria"></div>
						<div class="funcionamento_pagina_semana">
							<h2>Quarta-feira</h2>
							<p>8:00 às 13:00 e 16:00 às 22:00</p>
						</div>
						<div class="linha_separatoria"></div>
						<div class="funcionamento_pagina_semana">
							<h2>Quinta-feira</h2>
							<p>8:00 às 13:00 e 16:00 às 22:00</p>
						</div>
						<div class="linha_separatoria"></div>
						<div class="funcionamento_pagina_semana">
							<h2>Sexta-feira</h2>
							<p>8:00 às 13:00 e 16:00 às 22:00</p>
						</div>
						<div class="linha_separatoria"></div>
						<div class="funcionamento_pagina_semana">
							<h2>Sábado</h2>
							<p>8:00 às 13:00 e 16:00 às 22:00</p>
						</div>
					</div>
				</div>
			   
				<div class="informacoes_pagina">
					<h4>Censura:</h4> 
					<h6>12 anos</h6>
				</div>
				
			   
			</div>
			
			<div id="endereco_pagina">
				<div id="" class="topo_area_pagina">
					<img src="<?php echo base_url('assets'); ?>/images/icone_place.png" class="icone_area_pagina" />
					<h1 class="titulo_area_pagina">Local</h1>
				</div>
				
			</div><!-- /endereco -->
		</div><!-- /fim da area de conteudo esquerda -->
		<div id="area_conteudo_direita_borda"><!-- /inicio da area de conteudo direita -->
			<div class="locais_proximos">
				<a href="" title="">
					<img src="" alt="logo do local" />
					<h3>Pizzaria e Restaurante Barretos</h3>
					<h5>Local: Graças - Recife</h5>
				</a>
			</div>
			<div class="locais_proximos">
				<a href="" title="">
					<img src="" alt="logo do local" />
					<h3>Pizzaria e Restaurante Barretos</h3>
					<h5>Local: Graças - Recife</h5>
				</a>
			</div>
			<div class="locais_proximos">
				<a href="" title="">
					<img src="" alt="logo do local" />
					<h3>Pizzaria e Restaurante Barretos</h3>
					<h5>Local: Graças - Recife</h5>
				</a>
			</div>
			<div class="locais_proximos">
				<a href="" title="">
					<img src="" alt="logo do local" />
					<h3>Pizzaria e Restaurante Barretos</h3>
					<h5>Local: Graças - Recife</h5>
				</a>
			</div>
			<div class="locais_proximos">
				<a href="" title="">
					<img src="" alt="logo do local" />
					<h3>Pizzaria e Restaurante Barretos</h3>
					<h5>Local: Graças - Recife</h5>
				</a>
			</div>
			<div class="locais_proximos">
				<a href="" title="">
					<img src="" alt="logo do local" />
					<h3>Pizzaria e Restaurante Barretos</h3>
					<h5>Local: Graças - Recife</h5>
				</a>
			</div>
			<div class="locais_proximos">
				<a href="" title="">
					<img src="" alt="logo do local" />
					<h3>Pizzaria e Restaurante Barretos</h3>
					<h5>Local: Graças - Recife</h5>
				</a>
			</div>
		
		</div><!-- /fim da area de conteudo direita -->

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
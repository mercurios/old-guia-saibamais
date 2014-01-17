<!-- Facebook Meta tags -->
<meta property="fb:app_id" content="626646137401213" /> 
<meta property="og:url" content="<?php echo current_url() ?>" />
<meta property="og:title" content="<?php echo $chamada[0]->titulo_chamada; ?>" />
<meta property="og:description" content="<?php echo $chamada[0]->desc_chamada; ?>" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Guia Saiba Mais"/>
<meta property="og:image" content="<?php echo base_url('uploads/chamadas/' . $chamada[0]->img_chamada) ?>" />
<link rel="image_src" href="<?php echo base_url('uploads/chamadas/' . $chamada[0]->img_chamada) ?>"/>
<meta property="fb:admins" content="100005072318424"/>

<div class="modal-full">

	<!-- Publicidade -->
	<div class="publicidade_modal">

	</div>

	<!-- Modal -->
	<div class="content-modal">
		<div id="topo_modal">
	        <h1><?php echo $chamada[0]->titulo_chamada; ?></h1>
	        <?php echo image_thumb('uploads/chamadas/' . $chamada[0]->logo_cliente, 186, 103 ); ?>
	    </div>

		<div id="conteudo_modal">
			<?php echo image_thumb('uploads/chamadas/' . $chamada[0]->img_chamada, 640, 356 ); ?>
			<p><?php echo $chamada[0]->desc_chamada; ?></p>
			<h6>Gostou? Então mostra para seus amigos!</h6>
			<div class="redes_sociais_chamada">
				<iframe 
					src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fguiasaibamais.com.br/<?php echo uri_string() ?>&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=21&amp;appId=137373289806884" 
					scrolling="no" 
					frameborder="0" 
					style="border:none; overflow:hidden; height:21px;" 
					allowTransparency="true">
				</iframe>
			</div>

			<div class="redes_sociais_chamada"></div>
			<div class="redes_sociais_chamada"></div>
		</div>

		<div id="rodape_modal">
			<h5>Clique e veja mais sobre esse local</h5>
	        <a href="<?php echo $chamada[0]->link_chamada; ?>" title="">
	        	<?php echo image_thumb('uploads/chamadas/' . $chamada[0]->logo_cliente, 293, 161, '', 'img_cliente_modal', ''); ?>
	            <h2><?php echo $chamada[0]->nome_cliente; ?></h2>
	        </a>
	    </div>
	</div>
</div>
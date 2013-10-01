<div id="publicidade_superior">
    <!-- Publicidade -->
</div>

<!-- Conteudo
================================================== -->
<div id="conteudo">

	<!-- Listar all
	================================================== -->
	<div class="content">

		<?php 
		if (count($locais) != 0) {
			foreach ($locais as $local) {
		?>

		<div class="resultado_pesquisa">
	    	<img src="<?php echo base_url() ?>tim.php?src=uploads/logos/<?php echo $local->logo_local; ?>&w=240&h=146" alt="logo" class="logo_resultado_pesquisa" />
	        <h3 class="estabelecimento_resultado_pesquisa"><?php echo $local->nome_local; ?></h3>
	        <p class="local_resultado_pesquisa">Local: <?php echo $local->bairro_local; ?></p>
	     

	        <div class="rodape_resultado_pesquisa">
	        	<a href="<?php echo base_url('locais/detalhe') . '/' . $local->slug_local . '/' . $local->id_local; ?>" title="">
	        		<img src="<?php echo base_url(); ?>assets/images/mais_pequeno.png" alt="" />
	            	<h2>Ver mais informações</h2>
	            </a>
	        </div>
	    </div>

	    <?php
			}
		}
		else {
			echo 'Ops! Ainda não tem locais cadastrados nessa categoria.';
		}
		?>
	</div><!-- /listar-all -->

	<!-- Sidebar
	================================================== -->
	<div class="sidebar">
		Sidebar
	</div><!-- /listar-all -->

</div>

<div id="publicidade_inferior">
    <!-- Publicidade -->
</div>
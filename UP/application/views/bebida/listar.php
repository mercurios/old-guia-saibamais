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
		if (isset($bebidas)) {
			foreach ($bebidas as $bebida) {
		?>

		<div class="resultado_pesquisa">
	    	<img src="<?php echo base_url() ?>tim.php?src=uploads/logos/<?php echo $bebida->logo_bebida; ?>&w=240&h=146" alt="logo" class="logo_resultado_pesquisa" />
	        <h3 class="estabelecimento_resultado_pesquisa"><?php echo $bebida->nome_bebida; ?></h3>
	        <p class="local_resultado_pesquisa">Local: <?php echo $bebida->bairro_bebida; ?></p>
	        <h4>Acessível para:</h4>
	        <?php  
	        $adaptado = $bebida->adaptado_bebida;
	        $adaptado = explode(',', $adaptado);

	        if (in_array('cego', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_cego_pequeno.jpg" alt="Cego" title="Deficientes visuais e cegos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
	        if (in_array('surdo', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_surdo_pequeno.jpg" alt="Surdo" title="Deficientes auditivos e surdos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
	        if (in_array('deficientefisico', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_deficiente_pequeno.jpg" alt="Deficiente físico" title="Deficientes físicos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
	        if (in_array('braile', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_braille_pequeno.jpg" alt="Braille" title="Braille" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
	        if (in_array('obeso', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_obeso_pequeno.jpg" alt="Obeso" title="Pessoas com obesidade" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
	        if (in_array('idoso', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_idoso_pequeno.jpg" alt="Idoso" title="Idosos" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
	        if (in_array('gestante', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_gestante_pequeno.jpg" alt="Gestante" title="Gestantes" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
	        if (in_array('bebe', $adaptado)) { echo '<img src="'. base_url() .'assets/images/icone_bebe_pequeno.jpg" alt="Bebe" title="Recém nascidos ou Crianças de colo" class="icone_esquerda icone_resultado_da_pesquisa"/>'; }
	        ?>

	        <div class="rodape_resultado_pesquisa">
	        	<a href="<?php echo base_url('bebida/detalhe') . '/' . $bebida->slug_bebida . '/' . $bebida->id_bebida; ?>" title="">
	        		<img src="<?php echo base_url(); ?>assets/images/mais_pequeno.png" alt="" />
	            	<h2>Ver mais informações</h2>
	            </a>
	        </div>
	    </div>

	    <?php
			}
		}
		else {
			echo 'Nenhum registro encontrado na categoria bebida.';
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
    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Novo vídeo</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                    	<?php
						if (isset($_POST['sendVideo'])) {

							$_categoria = $_GET['categoria'];
							$_idcliente = $_GET['idcliente'];
							$_titulo 	= $_POST['titulo'];
							$_link 		= $_POST['link'];

                            if (empty($_categoria) || empty($_idcliente)) {
                                header('Location: painel.php');
                            }

							$readCheked = read('guia_videos', "WHERE id_cliente = '$_idcliente' && categoria_video = '$_categoria'");

							if ($readCheked) {
								message('O cliente informado já possui vídeo.', 'warning');
							}
							else {

								// Coloca os dados em array
								$dados = array(
									"titulo_video" 		=> $_titulo,
									"link_video" 		=> $_link,
									"categoria_video" 	=> $_categoria,
									"id_cliente" 		=> $_idcliente
								);

								$save = create('guia_videos', $dados);

								if ($save) {
									message('Vídeo cadastrado com sucesso.', 'success');
								}
								else {
									message('Erro ao cadastrar vídeo, tente novamente.', 'warning');
								}
							}
                    	}
                    	?>

                    	<form name="edtVideo" method="post" action="">
                    		<div class="span11">
                    			<label><strong>Titulo:</strong></label>
                    			<input name="titulo" class="input-block-level" value="" placeholder="Informe o titulo do vídeo" />
                    		</div>	

                    		<div class="span11">
                    			<label><strong>Link (Youtube):</strong></label>
                    			<input name="link" class="input-block-level" value="" placeholder="Informe o titulo do vídeo no youtube" />
                    		</div>	

                    		<div class="span11">
                    			<input type="submit" name="sendVideo" value="Atualizar vídeo" class="btn btn-success pull-right" />
                    		</div>
                    	</form>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Editar vídeo</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                    	<?php
                    	$_idvideo	= $_GET['idvideo'];

                    	if (isset($_POST['upVideo'])) {
                    		$_titulo = $_POST['titulo'];
                    		$_link 	 = $_POST['link'];

                    		$dados = array(
                    			"titulo_video" => $_titulo,
                    			"link_video"   => $_link
                    		);

                    		$update = update('guia_videos', $dados, "id_video = '$_idvideo'");

                    		if ($update) {
                    			message('Vídeo atualizado com sucesso', 'success');
                    		}
              				else {
              					message('Erro ao atualizar vídeo', 'warning');
              				}
                    	}

                    	$readVideo 	= read('guia_videos', "WHERE id_video = '$_idvideo'");

                    	if ($readVideo) {
                    		foreach ($readVideo as $video) :
                    	?>
                    	<form name="edtVideo" method="post" action="">
                    		<div class="span11">
                    			<label><strong>Titulo:</strong></label>
                    			<input name="titulo" class="input-block-level" value="<?php echo $video['titulo_video'] ?>" placeholder="Informe o titulo do vídeo" />
                    		</div>	

                    		<div class="span11">
                    			<label><strong>Link (Youtube):</strong></label>
                    			<input name="link" class="input-block-level" value="<?php echo $video['link_video'] ?>" placeholder="Informe o titulo do vídeo no youtube" />
                    		</div>	

                    		<div class="span11">
                    			<input type="submit" name="upVideo" value="Atualizar vídeo" class="btn btn-success pull-right" />
                    		</div>
                    	</form>
                    	<?php
                    		endforeach;
                    	}
                    	?>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
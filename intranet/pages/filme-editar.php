    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Editar filme</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">

                    	<?php  

                    	$_id = $_GET['id'];

                    	$readFilme = read('guia_filmes', "WHERE id_filme = '$_id'");

                    	if (isset($_POST['sendFilme'])) {

                    		$_logo = $_FILES['logo'];

                            if ($_logo['name'] != '') {

                                $_logo = $_FILES['logo'];

                                // Cria nome único para a imagem
                                $nome_imagem = md5(uniqid(time()));

                                // Só permite imagens
                                $tipos = array('jpg', 'png', 'jpeg');

                                // Faz o uploads
                                $verifica = upload_imagem($_logo, '../uploads/logos/', $tipos, $nome_imagem);

                                // Verifica se existe erros
                                if ($verifica['erro']){
                                    echo $verifica['erro'];
                                }
                                else {
                                    $_newLogo = $verifica['nameimg'];
                                }
                            }
                            else {
                                $_newLogo = $readFilme[0]['logo_filme'];
                            }

                    		$_titulo 	= $_POST['titulo'];
                    		$_sinopse 	= $_POST['sinopse'];
                    		$_horaDom 	= $_POST['horaDom'];
                    		$_horaSeg 	= $_POST['horaSeg'];
                    		$_horaTer 	= $_POST['horaTer'];
                    		$_horaQua 	= $_POST['horaQua'];
                    		$_horaQui 	= $_POST['horaQui'];
                    		$_horaSex 	= $_POST['horaSex'];
                    		$_horaSab 	= $_POST['horaSab'];
                        	
                            $dados = array(
                            	"logo_filme" 	=> $_newLogo,
                            	"titulo_filme" 	=> $_titulo,
                            	"sinopse_filme" => $_sinopse,
                            	"h_dom" 		=> $_horaDom,
                            	"h_seg" 		=> $_horaSeg,
                            	"h_ter" 		=> $_horaTer,
                            	"h_qua"		 	=> $_horaQua,
                            	"h_qui" 		=> $_horaQui,
                            	"h_sex" 		=> $_horaSex,
                            	"h_sab" 		=> $_horaSab,
                            	"id_cinema"     => $_idcliente
                            );

                            // Grava no banco
                            $update = update('guia_filmes', $dados, "id_filme = '$_id'");

                            // Verifica se foi gravado com sucesso
                            if ($update) {
                                message('<strong>Filme atualizado com sucesso.</strong>', 'success');
                                salvaLog("Editou um filme.", $_SESSION['autUser']['nome_user']);
                            }
                            else {
                                message('<strong>Erro ao atualizar filme, tente novamente.</strong>', 'warning');
                            }
                    	}

                    	$readFilme = read('guia_filmes', "WHERE id_filme = '$_id'");
                    	foreach ($readFilme as $filme) :
                    	?>

                    	<form name="newFilme" method="post" action="" enctype="multipart/form-data">
                    		<fieldset>
                    			<!--<div class="span11">
                                	<label class="titulo-separator"></label>
                                </div>-->

                                <div class="span11">
	                                <label><strong>Imagem atual:</strong></label>
	                                <img src="../uploads/logos/<?php echo $filme['logo_filme']; ?>" width="200" />
	                            </div>

                                <div class="span11">
                                	<p></p>
									<input type="file" name="logo" title="Selecione a capa do filme" />
								</div>

                                <div class="span11">
                                	<br>
                                	<label><strong>Titulo:</strong></label>
                                	<input type="text" name="titulo" class="input-block-level" value="<?php echo $filme['titulo_filme']; ?>" placeholder="Titulo do filme" />
                                </div>

                                <div class="span11">
                                	<label><strong>Sinopse:</strong></label>
                                	<textarea name="sinopse" class="input-block-level" value="" placeholder="Sinopse do filme"><?php echo $filme['sinopse_filme']; ?></textarea>
                                </div>

                                <div class="span11">
                                	<label class="titulo-separator">Horário</label>
									<p><span class="label label-warning">Aviso:</span> <small>Os horários devem ser separados por vírgulas, ex: 12:00, 14:30, 15:40</small></p>
                                </div>

                                <div class="span11">
                                	<br>
									<table class="table table-bordered table-striped">
										<thead>
											<tr class="info">
												<td width="80"><strong>Dia </strong></td>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td><strong>Domingo:</strong></td>
												<td><input class="input-block-level" value="<?php echo $filme['h_dom']; ?>" name="horaDom" type="text" placeholder="12:30, 13:15, 14:50, 17:00..."></td>
											</tr>

											<tr>
												<td><strong>Segunda:</strong></td>
												<td><input class="input-block-level" value="<?php echo $filme['h_seg']; ?>" name="horaSeg" type="text" placeholder="12:30, 13:15, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Terça:</strong></td>
												<td><input class="input-block-level" value="<?php echo $filme['h_ter']; ?>" name="horaTer" type="text" placeholder="12:30, 13:15, 14:50, 17:00..."></td>
											</tr>

											<tr>
												<td><strong>Quarta:</strong></td>
												<td><input class="input-block-level" value="<?php echo $filme['h_qua']; ?>" name="horaQua" type="text" placeholder="12:30, 13:15, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Quinta:</strong></td>
												<td><input class="input-block-level" value="<?php echo $filme['h_qui']; ?>" name="horaQui" type="text" placeholder="12:30, 13:15, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Sexta:</strong></td>
												<td><input class="input-block-level" value="<?php echo $filme['h_sex']; ?>" name="horaSex" type="text" placeholder="12:30, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Sábado:</strong></td>
												<td><input class="input-block-level" value="<?php echo $filme['h_sab']; ?>" name="horaSab" type="text" placeholder="12:30, 13:15, 14:50, 17:00..."></td>
											</tr>
										</tbody>
									</table>
                                </div>

                                <div class="span11">
									<input type="submit" name="sendFilme" value="Atualizar filme" class="btn btn-success pull-right" />
								</div>
                            </fieldset>
                    	</form>
                    	<?php endforeach; ?>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
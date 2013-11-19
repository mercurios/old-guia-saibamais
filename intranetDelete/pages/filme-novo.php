    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Novo filme</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">

                    	<?php  

                    	$_idcliente = $_GET['idcliente'];

                    	if (isset($_POST['sendFilme'])) {

                    		$_logo 		= $_FILES['logo'];
                    		$_titulo 	= $_POST['titulo'];
                    		$_sinopse 	= $_POST['sinopse'];
                    		$_horaDom 	= $_POST['horaDom'];
                    		$_horaSeg 	= $_POST['horaSeg'];
                    		$_horaTer 	= $_POST['horaTer'];
                    		$_horaQua 	= $_POST['horaQua'];
                    		$_horaQui 	= $_POST['horaQui'];
                    		$_horaSex 	= $_POST['horaSex'];
                    		$_horaSab 	= $_POST['horaSab'];

                    		// Só permite imagens
                        	$tipos = array('jpg', 'png', 'jpeg');

                        	// Cria nome único para a imagem
                        	$nome_imagem = md5(uniqid(time()));

                        	// Faz o uploads
                        	$verifica = upload_imagem($_logo, '../uploads/logos/', $tipos, $nome_imagem);

                        	// Verifica se existe erros
	                        if ($verifica['erro']){
	                            echo $verifica['erro'];
	                        }
	                        else{
                           
                            	$_newLogo = $verifica['nameimg'];

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
                            	$save = create('guia_filmes', $dados);

                            	// Verifica se foi gravado com sucesso
                            	if ($save) {
                                	message('<strong>Filme adicionado com sucesso.</strong>', 'success');
                                    salvaLog("Adicionou um novo filme.", $_SESSION['autUser']['nome_user']);
                            	}
                            	else {
                                	message('<strong>Erro ao cadastrar filme, tente novamente.</strong>', 'warning');
                            	}
                        	}
                    	}

                    	?>

                    	<form name="newFilme" method="post" action="" enctype="multipart/form-data">
                    		<fieldset>
                    			<!--<div class="span11">
                                	<label class="titulo-separator"></label>
                                </div>-->

                                <div class="span11">
									<input type="file" name="logo" title="Selecione a capa do filme" />
								</div>

                                <div class="span11">
                                	<br>
                                	<label><strong>Titulo:</strong></label>
                                	<input type="text" name="titulo" class="input-block-level" value="" placeholder="Titulo do filme" />
                                </div>

                                <div class="span11">
                                	<label><strong>Sinopse:</strong></label>
                                	<textarea name="sinopse" class="input-block-level" value="" placeholder="Sinopse do filme"></textarea>
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
												<td><input class="input-block-level" name="horaDom" type="text" placeholder="12:30, 13:15, 14:50, 17:00..."></td>
											</tr>

											<tr>
												<td><strong>Segunda:</strong></td>
												<td><input class="input-block-level" name="horaSeg" type="text" placeholder="12:30, 13:15, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Terça:</strong></td>
												<td><input class="input-block-level" name="horaTer" type="text" placeholder="12:30, 13:15, 14:50, 17:00..."></td>
											</tr>

											<tr>
												<td><strong>Quarta:</strong></td>
												<td><input class="input-block-level" name="horaQua" type="text" placeholder="12:30, 13:15, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Quinta:</strong></td>
												<td><input class="input-block-level" name="horaQui" type="text" placeholder="12:30, 13:15, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Sexta:</strong></td>
												<td><input class="input-block-level" name="horaSex" type="text" placeholder="12:30, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Sábado:</strong></td>
												<td><input class="input-block-level" name="horaSab" type="text" placeholder="12:30, 13:15, 14:50, 17:00..."></td>
											</tr>
										</tbody>
									</table>
                                </div>

                                <div class="span11">
									<input type="submit" name="sendFilme" value="Cadastrar filme" class="btn btn-success pull-right" />
								</div>
                            </fieldset>
                    	</form>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
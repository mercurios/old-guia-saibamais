    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Nova peça</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                    	<?php  

                    	$_idcliente = $_GET['idcliente'];

                    	if (isset($_POST['sendPeca'])) {

                    		$_logo 		= $_FILES['logo'];
	                    	$_titulo 	= $_POST['titulo'];
	                    	$_desc 		= $_POST['sinopse'];
	                    	$_h_dom		= $_POST['h_dom'];
	                    	$_h_seg		= $_POST['h_seg'];
	                    	$_h_ter		= $_POST['h_ter'];
	                    	$_h_qua		= $_POST['h_qua'];
	                    	$_h_qui		= $_POST['h_qui'];
	                    	$_h_sex		= $_POST['h_sex'];
	                    	$_h_sab		= $_POST['h_sab'];
	                    	$_valint	= $_POST['valInteira'];
	                    	$_valmei	= $_POST['valMeia'];

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
                            else {

                            	$_newLogo = $verifica['nameimg'];

                            	$dados = array(
                            		"logo_peca" 	=> $_newLogo,
                            		"titulo_peca" 	=> $_titulo,
                            		"desc_peca" 	=> $_desc,
                            		"h_dom" 		=> $_h_dom,
                            		"h_seg" 		=> $_h_seg,
                            		"h_ter" 		=> $_h_ter,
                            		"h_qua" 		=> $_h_qua,
                            		"h_qui" 		=> $_h_qui,
                            		"h_sex" 		=> $_h_sex,
                            		"h_sab" 		=> $_h_sab,
                            		"val_inteira"	=> $_valint,
                            		"val_meia"		=> $_valmei,
                            		"id_teatro"     => $_idcliente
                            	);

                            	$save = create('guia_pecas', $dados);

                            	if ($save) {
                            		message('Peça cadastrada com sucesso', 'success');
                            	}
                            	else {
                            		message('Erro ao cadastrar peça.', 'warning');
                            	}
                            }
                    	}

                    	?>

                    	<form name="newTeatro" method="post" action="" enctype="multipart/form-data">
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
                                	<input type="text" name="titulo" class="input-block-level" value="" placeholder="Titulo da peça" />
                                </div>

                                <div class="span11">
                                	<label><strong>Descrição:</strong></label>
                                	<textarea name="sinopse" class="input-block-level" value="" placeholder="Decrição da peça"></textarea>
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
												<td><input class="input-block-level" name="h_dom" type="text" placeholder="12:30, 13:15, 14:50, 17:00..."></td>
											</tr>

											<tr>
												<td><strong>Segunda:</strong></td>
												<td><input class="input-block-level" name="h_seg" type="text" placeholder="12:30, 13:15, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Terça:</strong></td>
												<td><input class="input-block-level" name="h_ter" type="text" placeholder="12:30, 13:15, 14:50, 17:00..."></td>
											</tr>

											<tr>
												<td><strong>Quarta:</strong></td>
												<td><input class="input-block-level" name="h_qua" type="text" placeholder="12:30, 13:15, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Quinta:</strong></td>
												<td><input class="input-block-level" name="h_qui" type="text" placeholder="12:30, 13:15, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Sexta:</strong></td>
												<td><input class="input-block-level" name="h_sex" type="text" placeholder="12:30, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Sábado:</strong></td>
												<td><input class="input-block-level" name="h_sab" type="text" placeholder="12:30, 13:15, 14:50, 17:00..."></td>
											</tr>
										</tbody>
									</table>
                                </div>

                                <div class="span11">
                                	<label class="titulo-separator">Valor</label>
                                </div>

                                <div class="span5">
                                	<label><strong>Inteira:</strong></label>
                                	<input type="text" name="valInteira" class="input-block-level" value="" placeholder="Ex: 20,00" />
                                </div>

                                <div class="span5 offset1">
                                	<label><strong>Meia:</strong></label>
                                	<input type="text" name="valMeia" class="input-block-level" value="" placeholder="Ex: 10,00" />
                                </div>

                                <div class="span11">
									<input type="submit" name="sendPeca" value="Cadastrar peça" class="btn btn-success pull-right" />
								</div>
                            </fieldset>
                    	</form>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
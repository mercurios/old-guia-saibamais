    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Novo cinema</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                    	<?php  

                    	$_id = $_GET['id'];
                    	
                    	if (isset($_POST['sendCinema'])) {

                    		$readCinema = read('guia_cinemas', "WHERE id_cinema = '$_id'");

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
                                $_newLogo = $readCinema[0]['logo_cinema'];
                            }

                    		$_nome 					= $_POST['nome'];					
                    		$_descricao 			= $_POST['descricao'];						
                    		$_extras 				= $_POST['extras'];							
                    		$_acessibilidade 		= $_POST['acessibilidade'];
                            $_acessibilidade        = implode(',', $_acessibilidade);						
                    		$_telefone 				= $_POST['telefone'];						
                    		$_email 				= $_POST['email'];					
                    		$_site 					= $_POST['site'];						
                    		$_twitter 				= $_POST['twitter'];							
                    		$_facebook 				= $_POST['facebook'];						
                    		$_youtube 				= $_POST['youtube'];						
                    		$_instagram 			= $_POST['instagram'];					
                    		$_flickr 				= $_POST['flickr'];							
                    		$_googleplus 			= $_POST['googleplus'];							
                    		$_orkut 				= $_POST['orkut'];						
                    		$_rua 					= $_POST['rua'];
                    		$_num 					= $_POST['num'];
                    		$_cep 					= $_POST['cep'];
                    		$_bairro 				= $_POST['bairro'];
                    		$_cidade 				= $_POST['cidade'];
                    		$_uf 					= $_POST['uf'];
                    		$_longitude 			= $_POST['longitude'];
                    		$_latitude 				= $_POST['latitude'];
                    		$_tituloExtra 			= $_POST['tituloExtra'];
                    		$_valor_dom_inteira 	= $_POST['valor_dom_inteira'];
                    		$_valor_dom_meia 		= $_POST['valor_dom_meia'];
                    		$_valor_dom_tresd 		= $_POST['valor_dom_tresd'];
                    		$_valor_dom_meiatresd 	= $_POST['valor_dom_meiatresd'];
                    		$_valor_dom_extra 		= $_POST['valor_dom_extra'];
                    		$_valor_seg_inteira 	= $_POST['valor_seg_inteira'];
                    		$_valor_seg_meia 		= $_POST['valor_seg_meia'];
                    		$_valor_seg_tresd 		= $_POST['valor_seg_tresd'];
                    		$_valor_seg_meiatresd 	= $_POST['valor_seg_meiatresd'];
                    		$_valor_seg_extra 		= $_POST['valor_seg_extra'];
                    		$_valor_ter_inteira 	= $_POST['valor_ter_inteira'];
                    		$_valor_ter_meia 		= $_POST['valor_ter_meia'];
                    		$_valor_ter_tresd 		= $_POST['valor_ter_tresd'];
                    		$_valor_ter_meiatresd 	= $_POST['valor_ter_meiatresd'];
                    		$_valor_ter_extra 		= $_POST['valor_ter_extra'];
                    		$_valor_qua_inteira 	= $_POST['valor_qua_inteira'];
                    		$_valor_qua_meia 		= $_POST['valor_qua_meia'];
                    		$_valor_qua_tresd 		= $_POST['valor_qua_tresd'];
                    		$_valor_qua_meiatresd 	= $_POST['valor_qua_meiatresd'];
                    		$_valor_qua_extra 		= $_POST['valor_qua_extra'];
                    		$_valor_qui_inteira 	= $_POST['valor_qui_inteira'];
                    		$_valor_qui_meia 		= $_POST['valor_qui_meia'];
                    		$_valor_qui_tresd 		= $_POST['valor_qui_tresd'];
                    		$_valor_qui_meiatresd 	= $_POST['valor_qui_meiatresd'];
                    		$_valor_qui_extra 		= $_POST['valor_qui_extra'];
                    		$_valor_sex_inteira 	= $_POST['valor_sex_inteira'];
                    		$_valor_sex_meia 		= $_POST['valor_sex_meia'];
                    		$_valor_sex_tresd 		= $_POST['valor_sex_tresd'];
                    		$_valor_sex_meiatresd 	= $_POST['valor_sex_meiatresd'];
                    		$_valor_sex_extra 		= $_POST['valor_sex_extra'];
                    		$_valor_sab_inteira 	= $_POST['valor_sab_inteira'];
                    		$_valor_sab_meia 		= $_POST['valor_sab_meia'];
                    		$_valor_sab_tresd 		= $_POST['valor_sab_tresd'];
                    		$_valor_sab_meiatresd 	= $_POST['valor_sab_meiatresd'];
                    		$_valor_sab_extra 		= $_POST['valor_sab_extra'];

                    		$dados = array(
                                "logo_cinema"           => $_newLogo,
                                "nome_cinema"           => $_nome,
                                "desc_cinema"           => $_descricao,
                                "extras_cinema"         => $_extras,
                                "adaptado_cinema"       => $_acessibilidade,
                                "fone_cinema"           => $_telefone,
                                "email_cinema"          => $_email,
                                "site_cinema"           => $_site,
                                "twitter_cinema"        => $_twitter,
                                "facebook_cinema"       => $_facebook,
                                "youtube_cinema"        => $_youtube,
                                "insta_cinema"          => $_instagram,
                                "flickr_cinema"         => $_flickr,
                                "googleplus_cinema"     => $_googleplus,
                                "orkut_cinema"          => $_orkut,
                                "rua_cinema"            => $_rua,
                                "num_cinema"            => $_num,
                                "cep_cinema"            => $_cep,
                                "bairro_cinema"         => $_bairro,
                                "cidade_cinema"         => $_cidade,
                                "uf_cinema"             => $_uf,
                                "long_cinema"           => $_longitude,
                                "lati_cinema"           => $_latitude,
                                "titulo_extra_cinema"   => $_tituloExtra,
                                "valor_dom_inteira"     => $_valor_dom_inteira,
                                "valor_dom_meia"        => $_valor_dom_meia,
                                "valor_dom_tresd"       => $_valor_dom_tresd,
                                "valor_dom_meiatresd"   => $_valor_dom_meiatresd,
                                "valor_dom_extra"       => $_valor_dom_extra,
                                "valor_seg_inteira"     => $_valor_seg_inteira,
                                "valor_seg_meia"        => $_valor_seg_meia,
                                "valor_seg_tresd"       => $_valor_seg_tresd,
                                "valor_seg_meiatresd"   => $_valor_seg_meiatresd,
                                "valor_seg_extra"       => $_valor_seg_extra,
                                "valor_ter_inteira"     => $_valor_ter_inteira,
                                "valor_ter_meia"        => $_valor_ter_meia,
                                "valor_ter_tresd"       => $_valor_ter_tresd,
                                "valor_ter_meiatresd"   => $_valor_ter_meiatresd,
                                "valor_ter_extra"       => $_valor_ter_extra,
                                "valor_qua_inteira"     => $_valor_qua_inteira,
                                "valor_qua_meia"        => $_valor_qua_meia,
                                "valor_qua_tresd"       => $_valor_qua_tresd,
                                "valor_qua_meiatresd"   => $_valor_qua_meiatresd,
                                "valor_qua_extra"       => $_valor_qua_extra,
                                "valor_qui_inteira"     => $_valor_qui_inteira,
                                "valor_qui_meia"        => $_valor_qui_meia,
                                "valor_qui_tresd"       => $_valor_qui_tresd,
                                "valor_qui_meiatresd"   => $_valor_qui_meiatresd,
                                "valor_qui_extra"       => $_valor_qui_extra,
                                "valor_sex_inteira"     => $_valor_sex_inteira,
                                "valor_sex_meia"        => $_valor_sex_meia,
                                "valor_sex_tresd"       => $_valor_sex_tresd,
                                "valor_sex_meiatresd"   => $_valor_sex_meiatresd,
                                "valor_sex_extra"       => $_valor_sex_extra,
                                "valor_sab_inteira"     => $_valor_sab_inteira,
                                "valor_sab_meia"        => $_valor_sab_meia,
                                "valor_sab_tresd"       => $_valor_sab_tresd,
                                "valor_sab_meiatresd"   => $_valor_sab_meiatresd,
                                "valor_sab_extra"       => $_valor_sab_extra
                            );

    						// Grava no banco
                            $update = update('guia_cinemas', $dados, "id_cinema = '$_id'");

                            // Verifica se foi gravado com sucesso
                            if ($update) {
                                message('<strong>Cinema atualizado com sucesso.</strong>', 'success');
                                salvaLog("Atualizou um cinema.", $_SESSION['autUser']['nome_user']);
                            }
                            else {
                                message('<strong>Erro ao atualizar cinema, tente novamente.</strong>', 'warning');
                            }
                    	}

                    	$readCinema = read('guia_cinemas', "WHERE id_cinema = '$_id'");

                    	foreach ($readCinema as $cinema) : 
                    		$adaptado_para   = explode(',', $cinema['adaptado_cinema']);
                    	?>

                    	<form name="newCinema" method="post" action="" enctype="multipart/form-data">
                    		<fieldset>
                    			<div class="span11">
	                                <label><strong>Imagem atual:</strong></label>
	                                <img src="../uploads/logos/<?php echo $cinema['logo_cinema']; ?>" width="200" />
	                            </div>

                    			<div class="span11">
									<input type="file" name="logo" title="Selecione a foto do cinema" />
								</div>

                    			<div class="span11">
                    				<br>
                    				<label><strong>Nome:</strong></label>
                    				<input type="text" name="nome" value="<?php echo $cinema['nome_cinema']; ?>" class="input-block-level" placeholder="Nome do cinema" />
                    			</div>

                    			<div class="span11">
                    				<label><strong>Descrição:</strong></label>
                    				<textarea name="descricao" class="input-block-level" placeholder="Breve descrição sobre o cinema"><?php echo $cinema['desc_cinema']; ?></textarea>
                    			</div>

                    			<div class="span11">
                    				<label><strong>Extras:</strong></label>
                    				<textarea name="extras" class="input-block-level" placeholder="Extras, Estacionamentos, segurança..."><?php echo $cinema['extras_cinema']; ?></textarea>
                    			</div>

                    			<div class="span11">
                                	<label class="titulo-separator">Acessibilidade</label>
                                </div>

	                            <div class="span11">
	                                <label><strong>Adaptado para:</strong></label>
	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="acessibilidade[]" value="cadeirante" <?php if (in_array('cadeirante', $adaptado_para)) { echo 'checked'; } ?>> Cadeirante
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="acessibilidade[]" value="deficientevisual" <?php if (in_array('deficientevisual', $adaptado_para)) { echo 'checked'; } ?>> Deficiente visual
	                                </label>

	                                <label class="checkbox inline">
	                                    <input type="checkbox" id="inlineCheckbox1" name="acessibilidade[]" value="deficienteauditivo" <?php if (in_array('deficienteauditivo', $adaptado_para)) { echo 'checked'; } ?>> Deficiente auditivo
	                                </label>
	                            </div>

                    			<div class="span11">
                                	<label class="titulo-separator">Contato</label>
                                </div>

                    			<div class="span5">
                    				<label><strong>Telefone:</strong></label>
                    				<input type="text" name="telefone" value="<?php echo $cinema['fone_cinema']; ?>" class="input-block-level" placeholder="Telefone do cinema" />
                    			</div>

                    			<div class="span5 offset1">
                    				<label><strong>Email:</strong></label>
                    				<input type="text" name="email" value="<?php echo $cinema['email_cinema']; ?>" class="input-block-level" placeholder="Email do cinema" />
                    			</div>

                    			<div class="span5">
                    				<label><strong>Site:</strong></label>
                    				<input type="text" name="site" value="<?php echo $cinema['site_cinema']; ?>" class="input-block-level" placeholder="Site do cinema" />
                    			</div>

                    			<div class="span5 offset1">
                                    <label><strong>Twitter:</strong></label>
                                    <input class="input-block-level" name="twitter" value="<?php echo $cinema['twitter_cinema']; ?>" type="text" placeholder="http://twitter.com/seunome" />
                                </div>

                                <div class="span5">
                                    <label><strong>Facebook:</strong></label>
                                    <input class="input-block-level" name="facebook" value="<?php echo $cinema['facebook_cinema']; ?>" type="text" placeholder="http://facebook.com/seunome" />
                                </div>

                                <div class="span5 offset1">
                                    <label><strong>Youtube:</strong></label>
                                    <input class="input-block-level" name="youtube" value="<?php echo $cinema['youtube_cinema']; ?>" type="text" placeholder="http://youtube.com/seunome" />
                                </div>

                                <div class="span5">
                                    <label><strong>Instagram:</strong></label>
                                    <input class="input-block-level" name="instagram" value="<?php echo $cinema['insta_cinema']; ?>" value="<?php echo $cinema['site_cinema']; ?>" type="text" placeholder="http://instagram.com/seunome" />
                                </div>

                                <div class="span5 offset1">
                                    <label><strong>Flickr:</strong></label>
                                    <input class="input-block-level" name="flickr" value="<?php echo $cinema['flickr_cinema']; ?>" type="text" placeholder="http://flickr.com/seunome" />
                                </div>

                                <div class="span5">
                                    <label><strong>Google +:</strong></label>
                                    <input class="input-block-level" name="googleplus" value="<?php echo $cinema['googleplus_cinema']; ?>" type="text" placeholder="http://googleplus.com/seunome" />
                                </div>

                                <div class="span5 offset1">
                                    <label><strong>Orkut:</strong></label>
                                    <input class="input-block-level" name="orkut" value="<?php echo $cinema['orkut_cinema']; ?>" type="text" placeholder="http://orkut.com/seunome" />
                                </div>

                                <div class="span11">
                                	<label class="titulo-separator">Localização</label>
                                </div>

                                <div class="span5">
	                                <label><strong>Rua:</strong></label>
	                                <input id="rua" name="rua" value="<?php echo $cinema['rua_cinema']; ?>" class="input-block-level" type="text" placeholder="Nome da Rua" />
	                            </div>

	                            <div class="span5 offset1">
	                                <label><strong>Número:</strong></label>
	                                <input id="num" name="num" value="<?php echo $cinema['num_cinema']; ?>" class="input-block-level" type="text" placeholder="Número" />
	                            </div>

	                            <div class="span5">
	                                <label><strong>CEP:</strong></label>
	                                <input id="cep" name="cep" value="<?php echo $cinema['cep_cinema']; ?>" class="input-block-level" type="text" maxlength="9" placeholder="Informe o CEP" />
	                            </div>

	                            <div class="span5 offset1">
	                                <label><strong>Bairro:</strong></label>
	                                <input id="bairro" name="bairro" value="<?php echo $cinema['bairro_cinema']; ?>" class="input-block-level" type="text" placeholder="Informe o Bairro" />
	                            </div>

	                            <div class="span5">
	                                <label><strong>Cidade:</strong></label>
	                                <input id="cidade" name="cidade" value="<?php echo $cinema['cidade_cinema']; ?>" class="input-block-level" type="text" placeholder="Informe a Cidade" />
	                            </div>

	                            <div class="span5 offset1">
	                                <label><strong>UF:</strong></label>
	                                <input id="uf" name="uf" value="<?php echo $cinema['uf_cinema']; ?>" class="input-block-level" type="text" placeholder="Informe a UF" />
	                            </div>

	                            <div class="span5">
	                                <label><strong>Longitude:</strong></label>
	                                <input id="uf" name="longitude" value="<?php echo $cinema['long_cinema']; ?>" class="input-block-level" type="text" placeholder="Informe a Longitude" />
	                            </div>

	                            <div class="span5 offset1">
	                                <label><strong>Latitude:</strong></label>
	                                <input id="uf" name="latitude" value="<?php echo $cinema['lati_cinema']; ?>" class="input-block-level" type="text" placeholder="Informe a Latitude" />
	                            </div>

	                            <div class="span11">
                                	<label class="titulo-separator">Preços</label>
                                </div>

                                <div class="span11">
									<table class="table table-bordered table-striped">
										<thead>
											<tr class="info">
												<td><strong>Dia / Categoria</strong></td>
												<td><strong>Inteira:</strong></td>
												<td><strong>Meia:</strong></td>
												<td><strong>Inteira 3D:</strong></td>
												<td><strong>Meia 3D:</strong></td>
												<td><input class="input-block-level" value="<?php echo $cinema['titulo_extra_cinema']; ?>" name="tituloExtra" type="text" placeholder="Titulo extra"></td>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td><strong>Domingo:</strong></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_dom_inteira']; ?>" name="valor_dom_inteira" type="text" placeholder="15,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_dom_meia']; ?>" name="valor_dom_meia" type="text" placeholder="11,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_dom_tresd']; ?>" name="valor_dom_tresd" type="text" placeholder="30,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_dom_meiatresd']; ?>" name="valor_dom_meiatresd" type="text" placeholder="15,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_dom_extra']; ?>" name="valor_dom_extra" type="text" placeholder="Itau-Meia 10,00"></td>
											</tr>

											<tr>
												<td><strong>Segunda:</strong></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_seg_inteira']; ?>" name="valor_seg_inteira" type="text" placeholder="15,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_seg_meia']; ?>" name="valor_seg_meia" type="text" placeholder="11,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_seg_tresd']; ?>" name="valor_seg_tresd" type="text" placeholder="30,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_seg_meiatresd']; ?>" name="valor_seg_meiatresd" type="text" placeholder="15,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_seg_extra']; ?>" name="valor_seg_extra" type="text" placeholder="Itau-Meia 10,00"></td>
											</tr>

											<tr>
												<td><strong>Terça:</strong></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_ter_inteira']; ?>" name="valor_ter_inteira" type="text" placeholder="15,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_ter_meia']; ?>" name="valor_ter_meia" type="text" placeholder="11,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_ter_tresd']; ?>" name="valor_ter_tresd" type="text" placeholder="30,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_ter_meiatresd']; ?>" name="valor_ter_meiatresd" type="text" placeholder="15,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_ter_extra']; ?>" name="valor_ter_extra" type="text" placeholder="Itau-Meia 10,00"></td>
											</tr>

											<tr>
												<td><strong>Quarta:</strong></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_qua_inteira']; ?>" name="valor_qua_inteira" type="text" placeholder="15,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_qua_meia']; ?>" name="valor_qua_meia" type="text" placeholder="11,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_qua_tresd']; ?>" name="valor_qua_tresd" type="text" placeholder="30,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_qua_meiatresd']; ?>" name="valor_qua_meiatresd" type="text" placeholder="15,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_qua_extra']; ?>" name="valor_qua_extra" type="text" placeholder="Itau-Meia 10,00"></td>
											</tr>

											<tr>
												<td><strong>Quinta:</strong></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_qui_inteira']; ?>" name="valor_qui_inteira" type="text" placeholder="15,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_qui_meia']; ?>" name="valor_qui_meia" type="text" placeholder="11,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_qui_tresd']; ?>" name="valor_qui_tresd" type="text" placeholder="30,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_qui_meiatresd']; ?>" name="valor_qui_meiatresd" type="text" placeholder="15,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_qui_extra']; ?>" name="valor_qui_extra" type="text" placeholder="Itau-Meia 10,00"></td>
											</tr>

											<tr>
												<td><strong>Sexta:</strong></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_sex_inteira']; ?>" name="valor_sex_inteira" type="text" placeholder="15,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_sex_meia']; ?>" name="valor_sex_meia" type="text" placeholder="11,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_sex_tresd']; ?>" name="valor_sex_tresd" type="text" placeholder="30,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_sex_meiatresd']; ?>" name="valor_sex_meiatresd" type="text" placeholder="15,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_sex_extra']; ?>" name="valor_sex_extra" type="text" placeholder="Itau-Meia 10,00"></td>
											</tr>

											<tr>
												<td><strong>Sábado:</strong></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_sab_inteira']; ?>" name="valor_sab_inteira" type="text" placeholder="15,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_sab_meia']; ?>" name="valor_sab_meia" type="text" placeholder="11,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_sab_tresd']; ?>" name="valor_sab_tresd" type="text" placeholder="30,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_sab_meiatresd']; ?>" name="valor_sab_meiatresd" type="text" placeholder="15,00"></td>
												<td><input class="input-block-level" value="<?php echo $cinema['valor_sab_extra']; ?>" name="valor_sab_extra" type="text" placeholder="Itau-Meia 10,00"></td>
											</tr>
										</tbody>
									</table>
                                </div>

	                            <div class="span11">
	                            	<input type="submit" name="sendCinema" value="Atualizar cinema" class="btn btn-success pull-right" />
	                            </div>

                    		</fieldset>
                    	</form>
                    	<?php endforeach; ?>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
<div class="span12">
    <div class="row">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <h3>Novo local</h3>
                </div><!-- /widget-header -->

                <div class="widget-content">
                    <?php  

                    $_id = $_GET['id'];

                    if (empty($_id)) {
                        header('Location: painel.php');
                    }

                    $readRest = read('guia_locais', "WHERE id_local = '$_id'");

                    if (isset($_POST['sendLocal'])) {

                            // echo $readRest[0]['logo_restaurante'];

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
                                $_newLogo = $readRest[0]['logo_local'];
                            }

                            $_nome      = $_POST['nome'];
                            $_desc      = $_POST['descricao'];
                            $_extra     = $_POST['infoExtras'];
                            $_rua       = $_POST['rua'];
                            $_num       = $_POST['num'];
                            $_cep       = $_POST['cep'];
                            $_bairro    = $_POST['bairro'];
                            $_cidade    = $_POST['cidade'];
                            $_uf        = $_POST['uf'];
                            $_long      = $_POST['longitude'];
                            $_lati      = $_POST['latitude'];
                            $_horario   = $_POST['horario'];
                            $_valor     = $_POST['valor'];

                            $dados = array(
                                "logo_local"     => $_newLogo,
                                "nome_local"     => $_nome,
                                "desc_local"     => $_desc,
                                "dicas_local"    => $_extra,
                                "rua_local"      => $_rua,
                                "num_local"      => $_num,
                                "cep_local"      => $_cep,
                                "bairro_local"   => $_bairro,
                                "cidade_local"   => $_cidade,
                                "uf_local"       => $_uf,
                                "long_local"     => $_long,
                                "lati_local"     => $_lati,
                                "horarios_local" => $_horario,
                                "valor_local"    => $_valor
                            );

                            // Grava no banco
                            $update = update('guia_locais', $dados, "id_local = '$_id'");

                            // Verifica se foi gravado com sucesso
                            if ($update) {
                                message('<strong>Restaurante atualizado com sucesso.</strong>', 'success');
                                salvaLog("Editou um local.", $_SESSION['autUser']['nome_user']);
                            }
                            else {
                                message('<strong>Erro ao atualizar restaurante, tente novamente.</strong>', 'warning');
                            }
                        }

                        $readRest = read('guia_locais', "WHERE id_local = '$_id'");

                        if ($readRest) {
                            foreach ($readRest as $rest) {
                        ?>

					<form name="cadLocal" method="post" action="" enctype="multipart/form-data">
						<fieldset>
							<div class="span11">
                                <label><strong>Imagem atual:</strong></label>
                                <img src="../uploads/logos/<?php echo $rest['logo_local']; ?>" width="200" />
                            </div>

                            <div class="span11">
                                <p></p>
                                <input type="file" title="Enviar uma nova imagem" name="logo" class="" id="logo" />
                            </div><!-- / logo-->

							<div class="span11">
								<br>
								<label><strong>Nome do local:</strong></label>
								<input name="nome" type="text" value="<?php echo $rest['nome_local']; ?>" placeholder="Nome do local" class="input-block-level" />
							</div>

							<div class="span11">
                                <label><strong>Descrição do local:</strong></label>
                                <textarea class="span11 limit" name="descricao" placeholder="Fale um pouco sobre o estabelecimento"><?php echo $rest['desc_local']; ?></textarea>
                            </div>

                            <div class="span11">
                                <label><strong>Dicas sobre o local:</strong></label>
                                <textarea name="infoExtras" class="editorTiny" placeholder="Informe os extras desse estabelecimento"><?php echo $rest['dicas_local']; ?></textarea>
                            </div>

							<div class="span5">
                                <br>
                                <label><strong>Rua:</strong></label>
                                <input id="rua" name="rua" class="input-block-level" type="text" value="<?php echo $rest['rua_local']; ?>" placeholder="Nome da Rua" />
                            </div>

                            <div class="span5 offset1">
                                <br>
                                <label><strong>Número:</strong></label>
                                <input id="num" name="num" class="input-block-level" value="<?php echo $rest['num_local']; ?>" type="text" placeholder="Número" />
                            </div>

                            <div class="span5">
                                <label><strong>CEP:</strong></label>
                                <input id="cep" name="cep" class="input-block-level" value="<?php echo $rest['cep_local']; ?>" type="text" maxlength="9" placeholder="Informe o CEP" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Bairro:</strong></label>
                                <input id="bairro" name="bairro" class="input-block-level" value="<?php echo $rest['bairro_local']; ?>" type="text" placeholder="Informe o Bairro" />
                            </div>

                            <div class="span5">
                                <label><strong>Cidade:</strong></label>
                                <input id="cidade" name="cidade" class="input-block-level" value="<?php echo $rest['cidade_local']; ?>" type="text" placeholder="Informe a Cidade" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>UF:</strong></label>
                                <input id="uf" name="uf" class="input-block-level" value="<?php echo $rest['uf_local']; ?>" type="text" placeholder="Informe a UF" />
                            </div>

                            <div class="span5">
                                <label><strong>Longitude:</strong></label>
                                <input id="uf" name="longitude" class="input-block-level" value="<?php echo $rest['long_local']; ?>" type="text" placeholder="Informe a Longitude" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Latitude:</strong></label>
                                <input id="uf" name="latitude" class="input-block-level" value="<?php echo $rest['lati_local']; ?>" type="text" placeholder="Informe a Latitude" />
                            </div>

                            <div class="span11">
								<label><strong>Horário de visitação:</strong></label>
								<input name="horario" type="text" value="<?php echo $rest['horarios_local']; ?>" placeholder="Ex: Das 08:00 as 10:00 e 14:00 as 16:00" class="input-block-level" />
							</div>

							<div class="span11">
								<label><strong>Valor:</strong></label>
								<input name="valor" type="text" value="<?php echo $rest['valor_local']; ?>" placeholder="Grátis" class="input-block-level" />
							</div>

							<div class="span11">
                            	<input type="submit" class="btn btn-success pull-right" name="sendLocal" value="Atualizar" />
                        	</div><!-- / -->
						</fieldset>
					</form>
                    <?php
                        }
                    }
                    ?>
                </div><!-- /widget-content -->
            </div><!-- /widget -->
        </div><!-- /span12 -->
    </div><!-- /row -->
</div><!-- /span12 -->
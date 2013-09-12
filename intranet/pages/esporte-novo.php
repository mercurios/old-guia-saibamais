<div class="span12">
    <div class="row">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <h3>Novo esporte</h3>
                </div><!-- /widget-header -->

                <div class="widget-content">
                    
                    <?php  

                    if (isset($_POST['sendEsporte'])) {
                        $_logo          = $_FILES['logo'];
                        $_nome          = $_POST['nome'];
                        $_ondepraticar  = $_POST['ondepraticar'];
                        $_desc          = $_POST['desc'];
                        $_rua           = $_POST['rua'];
                        $_num           = $_POST['num'];
                        $_cep           = $_POST['cep'];
                        $_bairro        = $_POST['bairro'];
                        $_cidade        = $_POST['cidade'];
                        $_uf            = $_POST['uf'];
                        $_long          = $_POST['longitude'];
                        $_lati          = $_POST['latitude'];
                        $_hora          = $_POST['horario'];
                        $_valor         = $_POST['valor'];

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
                                "logo_esporte"          => $_newLogo,
                                "nome_esporte"          => $_nome,
                                "ondepraticar_esporte"  => $_ondepraticar,
                                "desc_esporte"          => $_desc,
                                "rua_esporte"           => $_rua,
                                "num_esporte"           => $_num,
                                "cep_esporte"           => $_cep,
                                "bairro_esporte"        => $_bairro,
                                "cidade_esporte"        => $_cidade,
                                "uf_esporte"            => $_uf,
                                "long_esporte"          => $_long,
                                "lati_esporte"          => $_lati,
                                "horario_esporte"       => $_hora,
                                "valor_esporte"         => $_valor
                            );

                            // Grava no banco
                            $save = create('guia_esportes', $dados);

                            // Verifica se foi gravado com sucesso
                            if ($save) {
                                message('<strong>Esporte adicionado com sucesso.</strong>', 'success');
                                salvaLog("Adicionou um novo esporte.", $_SESSION['autUser']['nome_user']);
                            }
                            else {
                                message('<strong>Erro ao cadastrar esporte, tente novamente.</strong>', 'warning');
                            }
                        }                        
                    }

                    ?>

					<form name="newEsporte" method="post" action="" enctype="multipart/form-data">
						<fieldset>
							<div class="span11">
								<input type="file" name="logo" title="Selecione a foto do esporte" />
							</div>

							<div class="span11">
								<br>
								<label><strong>Nome do esporte:</strong></label>
								<input name="nome" type="text" placeholder="Nome do esporte" class="input-block-level" />
							</div>

							<div class="span11">
								<label><strong>Onde praticar:</strong></label>
								<input name="ondepraticar" type="text" placeholder="Ex: 3 jardim de boa viagem" class="input-block-level" />
							</div>

							<div class="span11">
								<label><strong>Descrição:</strong></label>
								<textarea name="desc" type="text" placeholder="Descrição do local" class="input-block-level"></textarea>
							</div>

							<div class="span5">
                                <label><strong>Rua:</strong></label>
                                <input id="rua" name="rua" class="input-block-level" type="text" placeholder="Nome da Rua" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Número:</strong></label>
                                <input id="num" name="num" class="input-block-level" type="text" placeholder="Número" />
                            </div>

                            <div class="span5">
                                <label><strong>CEP:</strong></label>
                                <input id="cep" name="cep" class="input-block-level" type="text" maxlength="9" placeholder="Informe o CEP" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Bairro:</strong></label>
                                <input id="bairro" name="bairro" class="input-block-level" type="text" placeholder="Informe o Bairro" />
                            </div>

                            <div class="span5">
                                <label><strong>Cidade:</strong></label>
                                <input id="cidade" name="cidade" class="input-block-level" type="text" placeholder="Informe a Cidade" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>UF:</strong></label>
                                <input id="uf" name="uf" class="input-block-level" type="text" placeholder="Informe a UF" />
                            </div>

                            <div class="span5">
                                <label><strong>Longitude:</strong></label>
                                <input id="uf" name="longitude" class="input-block-level" type="text" placeholder="Informe a Longitude" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Latitude:</strong></label>
                                <input id="uf" name="latitude" class="input-block-level" type="text" placeholder="Informe a Latitude" />
                            </div>

                            <div class="span11">
								<label><strong>Horário para praticar:</strong></label>
								<input name="horario" type="text" placeholder="Ex: Das 08:00 as 10:00 e 14:00 as 16:00" class="input-block-level" />
							</div>

							<div class="span11">
								<label><strong>Valor:</strong></label>
								<input name="valor" type="text" placeholder="Grátis" class="input-block-level" />
							</div>

							<div class="span11">
                            	<input type="submit" class="btn btn-success pull-right" name="sendEsporte" value="Cadastrar" />
                        	</div><!-- / -->
						</fieldset>
					</form>
                </div><!-- /widget-content -->
            </div><!-- /widget -->
        </div><!-- /span12 -->
    </div><!-- /row -->
</div><!-- /span12 -->
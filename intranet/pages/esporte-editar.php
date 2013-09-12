<div class="span12">
    <div class="row">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <h3>Editar esporte</h3>
                </div><!-- /widget-header -->

                <div class="widget-content">
                    <?php  

                    $_id = $_GET['id'];

                    $readEsporte = read('guia_esportes', "WHERE id_esporte = '$_id'");

                    if (isset($_POST['sendEsporte'])) {

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
                                $_newLogo = $readEsporte[0]['logo_esporte'];
                            }

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
                            $update = update('guia_esportes', $dados, "id_esporte = '$_id'");

                            // Verifica se foi gravado com sucesso
                            if ($update) {
                                message('<strong>Esporte atualizado com sucesso.</strong>', 'success');
                                salvaLog("Atualizou um esporte.", $_SESSION['autUser']['nome_user']);
                            }
                            else {
                                message('<strong>Erro ao atualizar esporte, tente novamente.</strong>', 'warning');
                            }
                        }


                    $readEsporte = read('guia_esportes', "WHERE id_esporte = '$_id'");
                    foreach ($readEsporte as $esporte) :
                    ?>

                    <form name="newEsporte" method="post" action="" enctype="multipart/form-data">
                        <fieldset>

                            <div class="span11">
                                <label><strong>Imagem atual:</strong></label>
                                <img src="../uploads/logos/<?php echo $esporte['logo_esporte']; ?>" width="200" />
                            </div>

                            <div class="span11">
                                <p></p>
                                <input type="file" name="logo" title="Selecione a foto do esporte" />
                            </div>

                            <div class="span11">
                                <br>
                                <label><strong>Nome do esporte:</strong></label>
                                <input name="nome" type="text" value="<?php echo $esporte['nome_esporte']; ?>" placeholder="Nome do esporte" class="input-block-level" />
                            </div>

                            <div class="span11">
                                <label><strong>Onde praticar:</strong></label>
                                <input name="ondepraticar" value="<?php echo $esporte['ondepraticar_esporte']; ?>" type="text" placeholder="Ex: 3 jardim de boa viagem" class="input-block-level" />
                            </div>

                            <div class="span11">
                                <label><strong>Descrição:</strong></label>
                                <textarea name="desc" type="text" placeholder="Descrição do local" class="input-block-level"><?php echo $esporte['desc_esporte']; ?></textarea>
                            </div>

                            <div class="span5">
                                <label><strong>Rua:</strong></label>
                                <input id="rua" name="rua" value="<?php echo $esporte['rua_esporte']; ?>" class="input-block-level" type="text" placeholder="Nome da Rua" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Número:</strong></label>
                                <input id="num" name="num" value="<?php echo $esporte['num_esporte']; ?>" class="input-block-level" type="text" placeholder="Número" />
                            </div>

                            <div class="span5">
                                <label><strong>CEP:</strong></label>
                                <input id="cep" name="cep" value="<?php echo $esporte['cep_esporte']; ?>" class="input-block-level" type="text" maxlength="9" placeholder="Informe o CEP" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Bairro:</strong></label>
                                <input id="bairro" name="bairro" value="<?php echo $esporte['bairro_esporte']; ?>" class="input-block-level" type="text" placeholder="Informe o Bairro" />
                            </div>

                            <div class="span5">
                                <label><strong>Cidade:</strong></label>
                                <input id="cidade" name="cidade" value="<?php echo $esporte['cidade_esporte']; ?>" class="input-block-level" type="text" placeholder="Informe a Cidade" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>UF:</strong></label>
                                <input id="uf" name="uf" value="<?php echo $esporte['uf_esporte']; ?>" class="input-block-level" type="text" placeholder="Informe a UF" />
                            </div>

                            <div class="span5">
                                <label><strong>Longitude:</strong></label>
                                <input id="uf" name="longitude" value="<?php echo $esporte['long_esporte']; ?>" class="input-block-level" type="text" placeholder="Informe a Longitude" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Latitude:</strong></label>
                                <input id="uf" name="latitude" value="<?php echo $esporte['lati_esporte']; ?>" class="input-block-level" type="text" placeholder="Informe a Latitude" />
                            </div>

                            <div class="span11">
                                <label><strong>Horário para praticar:</strong></label>
                                <input name="horario" type="text" value="<?php echo $esporte['horario_esporte']; ?>" placeholder="Ex: Das 08:00 as 10:00 e 14:00 as 16:00" class="input-block-level" />
                            </div>

                            <div class="span11">
                                <label><strong>Valor:</strong></label>
                                <input name="valor" type="text" value="<?php echo $esporte['valor_esporte']; ?>" placeholder="Grátis" class="input-block-level" />
                            </div>

                            <div class="span11">
                                <input type="submit" class="btn btn-success pull-right" name="sendEsporte" value="Atualizar" />
                            </div><!-- / -->
                        </fieldset>
                    </form>
                    <?php endforeach; ?>
                </div><!-- /widget-content -->
            </div><!-- /widget -->
        </div><!-- /span12 -->
    </div><!-- /row -->
</div><!-- /span12 -->
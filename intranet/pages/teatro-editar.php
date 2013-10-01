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

                        if (isset($_POST['sendTeatro'])) {

                            $readTeatro = read('guia_teatros', "WHERE id_teatro = '$_id'");

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
                                $_newLogo = $readTeatro[0]['logo_teatro'];
                            }

                            $_nome              = $_POST['nome'];
                            $_desc              = $_POST['descricao'];
                            $_extras            = $_POST['extras'];
                            $_acessibilidade    = $_POST['acessibilidade'];
                            $_acessibilidade    = implode(',', $_acessibilidade);
                            $_fone              = $_POST['telefone'];
                            $_email             = $_POST['email'];
                            $_site              = $_POST['site'];
                            $_twitter           = $_POST['twitter'];
                            $_facebook          = $_POST['facebook'];
                            $_youtube           = $_POST['youtube'];
                            $_insta             = $_POST['instagram'];
                            $_flickr            = $_POST['flickr'];
                            $_googleplus        = $_POST['googleplus'];
                            $_orkut             = $_POST['orkut'];
                            $_rua               = $_POST['rua'];
                            $_num               = $_POST['num'];
                            $_cep               = $_POST['cep'];
                            $_bairro            = $_POST['bairro'];
                            $_cidade            = $_POST['cidade'];
                            $_uf                = $_POST['uf'];
                            $_longitude         = $_POST['longitude'];
                            $_latitude          = $_POST['latitude'];

                            $dados = array(
                                "logo_teatro"       => $_newLogo,
                                "nome_teatro"       => $_nome,
                                "sinopse_teatro"    => $_desc,
                                "extra_teatro"      => $_extras,
                                "adaptado_teatro"   => $_acessibilidade,
                                "fone_teatro"       => $_fone,
                                "email_teatro"      => $_email,
                                "site_teatro"       => $_site,
                                "twitter_teatro"    => $_twitter,
                                "facebook_teatro"   => $_facebook,
                                "youtube_teatro"    => $_youtube,
                                "insta_teatro"      => $_insta,
                                "flickr_teatro"     => $_flickr,
                                "googleplus_teatro" => $_googleplus,
                                "orkut_teatro"      => $_orkut,
                                "rua_teatro"        => $_rua,
                                "num_teatro"        => $_num,
                                "cep_teatro"        => $_cep,
                                "bairro_teatro"     => $_bairro,
                                "cidade_teatro"     => $_cidade,
                                "uf_teatro"         => $_uf,
                                "long_teatro"       => $_longitude,
                                "lati_teatro"       => $_latitude
                            );

                            // Grava no banco
                            $update = update('guia_teatros', $dados, "id_teatro = '$_id'");

                            // Verifica se foi gravado com sucesso
                            if ($update) {
                                message('<strong>Teatro atualizado com sucesso.</strong>', 'success');
                            }
                            else {
                                message('<strong>Erro ao atualizar teatro, tente novamente.</strong>', 'warning');
                            }
                        }

                        $readTeatro = read('guia_teatros', "WHERE id_teatro = '$_id'");
                        foreach ($readTeatro as $teatro) :

                            $adaptado_para   = explode(',', $teatro['adaptado_teatro']);

                        ?>
                        <form name="newTeatro" method="post" action="" enctype="multipart/form-data">
                            <fieldset>
                                <div class="span11">
                                    <label><strong>Imagem atual:</strong></label>
                                    <img src="../uploads/logos/<?php echo $teatro['logo_teatro']; ?>" width="200" />
                                </div>

                                <div class="span11">
                                    <p></p>
                                    <input type="file" name="logo" title="Selecione a foto do cinema" />
                                </div>

                                <div class="span11">
                                    <br>
                                    <label><strong>Nome:</strong></label>
                                    <input type="text" name="nome" value="<?php echo $teatro['nome_teatro']; ?>" class="input-block-level" placeholder="Nome do teatro" />
                                </div>

                                <div class="span11">
                                    <label><strong>Descrição:</strong></label>
                                    <textarea name="descricao" class="input-block-level" placeholder="Breve descrição sobre o teatro"><?php echo $teatro['sinopse_teatro']; ?></textarea>
                                </div>

                                <div class="span11">
                                    <label><strong>Extras:</strong></label>
                                    <textarea name="extras" class="input-block-level" placeholder="Extras, Estacionamentos, segurança..."><?php echo $teatro['extra_teatro']; ?></textarea>
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
                                    <input type="text" name="telefone" value="<?php echo $teatro['fone_teatro']; ?>" class="input-block-level" placeholder="Telefone" />
                                </div>

                                <div class="span5 offset1">
                                    <label><strong>Email:</strong></label>
                                    <input type="text" name="email" value="<?php echo $teatro['email_teatro']; ?>" class="input-block-level" placeholder="Email" />
                                </div>

                                <div class="span5">
                                    <label><strong>Site:</strong></label>
                                    <input type="text" name="site" value="<?php echo $teatro['site_teatro']; ?>" class="input-block-level" placeholder="Site" />
                                </div>

                                <div class="span5 offset1">
                                    <label><strong>Twitter:</strong></label>
                                    <input class="input-block-level" name="twitter" type="text" placeholder="http://twitter.com/seunome" />
                                </div>

                                <div class="span5">
                                    <label><strong>Facebook:</strong></label>
                                    <input class="input-block-level" value="<?php echo $teatro['facebook_teatro']; ?>" name="facebook" type="text" placeholder="http://facebook.com/seunome" />
                                </div>

                                <div class="span5 offset1">
                                    <label><strong>Youtube:</strong></label>
                                    <input class="input-block-level" value="<?php echo $teatro['youtube_teatro']; ?>" name="youtube" type="text" placeholder="http://youtube.com/seunome" />
                                </div>

                                <div class="span5">
                                    <label><strong>Instagram:</strong></label>
                                    <input class="input-block-level" value="<?php echo $teatro['insta_teatro']; ?>" name="instagram" type="text" placeholder="http://instagram.com/seunome" />
                                </div>

                                <div class="span5 offset1">
                                    <label><strong>Flickr:</strong></label>
                                    <input class="input-block-level" value="<?php echo $teatro['flickr_teatro']; ?>" name="flickr" type="text" placeholder="http://flickr.com/seunome" />
                                </div>

                                <div class="span5">
                                    <label><strong>Google +:</strong></label>
                                    <input class="input-block-level" value="<?php echo $teatro['googleplus_teatro']; ?>" name="googleplus" type="text" placeholder="http://googleplus.com/seunome" />
                                </div>

                                <div class="span5 offset1">
                                    <label><strong>Orkut:</strong></label>
                                    <input class="input-block-level" value="<?php echo $teatro['orkut_teatro']; ?>" name="orkut" type="text" placeholder="http://orkut.com/seunome" />
                                </div>

                                <div class="span11">
                                    <label class="titulo-separator">Localização</label>
                                </div>

                                <div class="span5">
                                    <label><strong>Rua:</strong></label>
                                    <input id="rua" name="rua" value="<?php echo $teatro['rua_teatro']; ?>" class="input-block-level" type="text" placeholder="Nome da Rua" />
                                </div>

                                <div class="span5 offset1">
                                    <label><strong>Número:</strong></label>
                                    <input id="num" name="num" value="<?php echo $teatro['num_teatro']; ?>" class="input-block-level" type="text" placeholder="Número" />
                                </div>

                                <div class="span5">
                                    <label><strong>CEP:</strong></label>
                                    <input id="cep" name="cep" value="<?php echo $teatro['cep_teatro']; ?>" class="input-block-level" type="text" maxlength="9" placeholder="Informe o CEP" />
                                </div>

                                <div class="span5 offset1">
                                    <label><strong>Bairro:</strong></label>
                                    <input id="bairro" name="bairro" value="<?php echo $teatro['bairro_teatro']; ?>" class="input-block-level" type="text" placeholder="Informe o Bairro" />
                                </div>

                                <div class="span5">
                                    <label><strong>Cidade:</strong></label>
                                    <input id="cidade" name="cidade" value="<?php echo $teatro['cidade_teatro']; ?>" class="input-block-level" type="text" placeholder="Informe a Cidade" />
                                </div>

                                <div class="span5 offset1">
                                    <label><strong>UF:</strong></label>
                                    <input id="uf" name="uf" value="<?php echo $teatro['uf_teatro']; ?>" class="input-block-level" type="text" placeholder="Informe a UF" />
                                </div>

                                <div class="span5">
                                    <label><strong>Longitude:</strong></label>
                                    <input id="uf" name="longitude" value="<?php echo $teatro['long_teatro']; ?>" class="input-block-level" type="text" placeholder="Informe a Longitude" />
                                </div>

                                <div class="span5 offset1">
                                    <label><strong>Latitude:</strong></label>
                                    <input id="uf" name="latitude" value="<?php echo $teatro['lati_teatro']; ?>" class="input-block-level" type="text" placeholder="Informe a Latitude" />
                                </div>

                                <div class="span11">
                                    <input type="submit" name="sendTeatro" value="Atualizar cinema" class="btn btn-success pull-right" />
                                </div>
                            </fieldset>
                        </form>
                        <?php endforeach; ?>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
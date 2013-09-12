<div class="span12">
    <div class="row">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <h3>Novo estadia</h3>
                </div><!-- /widget-header -->

                <div class="widget-content">
                    <?php

                    $_id = $_GET['id'];

                    if (empty($_id)) {
                        header('Location: painel.php');
                    }

                    $readRest = read('guia_estadias', "WHERE id_estadia = '$_id'");

                    if (isset($_POST['sendCliente'])) {

                            // echo $readRest[0]['logo_estadia'];

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
                                $_newLogo = $readRest[0]['logo_estadia'];
                            }

                            $_nome              = $_POST['nome'];
                            $_desc              = $_POST['descricao'];
                            $_slug              = geraUrl($_nome);
                            $_infoextra         = $_POST['infoExtras'];
                            $_infoextra         = implode(',', $_infoextra);
                            $_porTipo           = $_POST['porTipo'];
                            $_porTipo           = implode(',', $_porTipo);
                            $_porLocalidade     = $_POST['porLocalidade'];
                            $_porLocalidade     = implode(',', $_porLocalidade);
                            $_tipoClassificacao = $_POST['tipoClassificacao'];
                            $_tipoClassificacao = implode(',', $_tipoClassificacao);
                            $_rua               = $_POST['rua'];
                            $_num               = $_POST['num'];
                            $_cep               = $_POST['cep'];
                            $_bairro            = $_POST['bairro'];
                            $_cidade            = $_POST['cidade'];
                            $_uf                = $_POST['uf'];
                            $_long              = $_POST['longitude'];
                            $_lati              = $_POST['latitude'];
                            $_foneAtendimento   = $_POST['foneAtendimento'];
                            $_email             = $_POST['email'];
                            $_site              = $_POST['site'];
                            $_twitter           = $_POST['twitter'];
                            $_facebook          = $_POST['facebook'];
                            $_youtube           = $_POST['youtube'];
                            $_instagram         = $_POST['instagram'];
                            $_flickr            = $_POST['flickr'];
                            $_googleplus        = $_POST['googleplus'];
                            $_orkut             = $_POST['orkut'];
                            $_acessibilidade    = $_POST['acessibilidade'];
                            $_acessibilidade    = implode(',', $_acessibilidade);

                            $dados = array(
                                "logo_estadia"          => $_newLogo,
                                "nome_estadia"          => $_nome,
                                "slug_estadia"          => $_slug,
                                "desc_estadia"          => $_desc,
                                "extra_estadia"         => $_infoextra,
                                "tipo_estadia"          => $_porTipo,
                                "localidade_estadia"    => $_porLocalidade,
                                "class_estadia"         => $_tipoClassificacao,
                                "rua_estadia"           => $_rua,
                                "num_estadia"           => $_num,
                                "cep_estadia"           => $_cep,
                                "bairro_estadia"        => $_bairro,
                                "cidade_estadia"        => $_cidade,
                                "uf_estadia"            => $_uf,
                                "long_estadia"          => $_long,
                                "lati_estadia"          => $_lati,
                                "fone_estadia"          => $_foneAtendimento,
                                "email_estadia"         => $_email,
                                "site_estadia"          => $_site,
                                "twitter_estadia"       => $_twitter,
                                "facebook_estadia"      => $_facebook,
                                "youtube_estadia"       => $_youtube,
                                "insta_estadia"         => $_instagram,
                                "flickr_estadia"        => $_flickr,
                                "googleplus_estadia"    => $_googleplus,
                                "orkut_estadia"         => $_orkut,
                                "adaptado_estadia"      => $_acessibilidade
                            );
                        

                            // Grava no banco
                            $update = update('guia_estadias', $dados, "id_estadia = '$_id'");

                            // Verifica se foi gravado com sucesso
                            if ($update) {
                                message('<strong>estadia atualizado com sucesso.</strong>', 'success');
                                salvaLog("Editou uma estadia.", $_SESSION['autUser']['nome_user']);
                            }
                            else {
                                message('<strong>Erro ao atualizar estadia, tente novamente.</strong>', 'warning');
                            }
                        }

                    $readRest = read('guia_estadias', "WHERE id_estadia = '$_id'");
                    if ($readRest) {
                        foreach ($readRest as $rest) {
                            $por_tipo        = explode(',', $rest['tipo_estadia']);
                            $por_localidade  = explode(',', $rest['localidade_estadia']);
                            $por_class       = explode(',', $rest['class_estadia']);
                            $adaptado_para   = explode(',', $rest['adaptado_estadia']);
                            $extras          = explode(',', $rest['extra_estadia']);
                    ?>

                    <form name="cadCliente" method="post" action="" enctype="multipart/form-data">
                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Informações</label>
                            </div>

                            <div class="span11">
                                <label><strong>Imagem atual:</strong></label>
                                <img src="../uploads/logos/<?php echo $rest['logo_estadia']; ?>" width="200" />
                            </div>

                            <div class="span11">
                                <p></p>
                                <input type="file" title="Enviar uma nova imagem" name="logo" class="" id="logo" />
                            </div><!-- / logo-->

                            <div class="span11">
                                <br>
                                <label for="nome"><small class="red">*</small> <strong>Nome do estabelecimento:</strong></label>
                                <input type="text" name="nome" id="nome" value="<?php echo $rest['nome_estadia']; ?>" class="span11" placeholder="Informe o nome do estabelecimento" />
                            </div><!-- / Nome-->

                            <div class="span11">
                                <label><strong>Descrição:</strong></label>
                                <textarea class="span11 limit" name="descricao" placeholder="Fale um pouco sobre o estabelecimento"><?php echo $rest['desc_estadia']; ?></textarea>
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Informações extras</label>
                            </div>
                            <div class="span11">
                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="infoExtras[]" value="wifi" <?php if (in_array('wifi', $extras)) { echo 'checked'; } ?>> <strong>Wifi</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="infoExtras[]" value="estacionamento" <?php if (in_array('estacionamento', $extras)) { echo 'checked'; } ?>> <strong>Estacionamento</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="infoExtras[]" value="lutas-ao-vivo" <?php if (in_array('lutas-ao-vivo', $extras)) { echo 'checked'; } ?>> <strong>Lutas ao vivo</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="infoExtras[]" value="jogos-ao-vivo" <?php if (in_array('jogos-ao-vivo', $extras)) { echo 'checked'; } ?>> <strong>Jogos ao vivo</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="infoExtras[]" value="shows-ao-vivo" <?php if (in_array('shows-ao-vivo', $extras)) { echo 'checked'; } ?>> <strong>Shows ao vivo</strong>
                                </label>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Categoria</label>
                            </div>

                            <div class="span11">
                                <label><strong>Por tipo:</strong></label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="albergue" <?php if (in_array('albergue', $por_tipo)) { echo 'checked'; } ?>> Albergue
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="chale" <?php if (in_array('chale', $por_tipo)) { echo 'checked'; } ?>> Chalé
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="hotel" <?php if (in_array('hotel', $por_tipo)) { echo 'checked'; } ?>> Hotel
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="pousada" <?php if (in_array('pousada', $por_tipo)) { echo 'checked'; } ?>> Pousada
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="prive" <?php if (in_array('prive', $por_tipo)) { echo 'checked'; } ?>> Privê
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="resort" <?php if (in_array('resort', $por_tipo)) { echo 'checked'; } ?>> Resort
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="outros" <?php if (in_array('outros', $por_tipo)) { echo 'checked'; } ?>> Outros
                                </label>
                            </div><!-- /span11 -->

                            <div class="span11">
                                <div>&nbsp</div>
                                <label><strong>Por localidade:</strong></label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="campo" <?php if (in_array('campo', $por_localidade)) { echo 'checked'; } ?>> Campo
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="cidade" <?php if (in_array('cidade', $por_localidade)) { echo 'checked'; } ?>> Cidade
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="mata" <?php if (in_array('mata', $por_localidade)) { echo 'checked'; } ?>> Mata
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="maritimo" <?php if (in_array('maritimo', $por_localidade)) { echo 'checked'; } ?>> Marítimo
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="praia" <?php if (in_array('praia', $por_localidade)) { echo 'checked'; } ?>> Praia
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="outros" <?php if (in_array('outros', $por_localidade)) { echo 'checked'; } ?>> Outros
                                </label>
                            </div><!-- /span11 -->

                            <div class="span11">
                                <div>&nbsp</div>
                                <label><strong>Por classificação</strong></label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoClassificacao[]" value="tresestrelas" <?php if (in_array('tresestrelas', $por_class)) { echo 'checked'; } ?>> 3 Estrelas
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoClassificacao[]" value="quatroestrelas" <?php if (in_array('quatroestrelas', $por_class)) { echo 'checked'; } ?>> 4 Estrelas
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoClassificacao[]" value="cincoestrelas" <?php if (in_array('cincoestrelas', $por_class)) { echo 'checked'; } ?>> 5 Estrelas
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoClassificacao[]" value="seisestrelas" <?php if (in_array('seisestrelas', $por_class)) { echo 'checked'; } ?>> 6 Estrelas
                                </label>
                            </div><!-- /span11 -->
                        </fieldset>

                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Localidade</label>
                            </div>

                            <div class="span5">
                                <label><strong>Rua:</strong></label>
                                <input id="rua" name="rua" value="<?php echo $rest['rua_estadia']; ?>" class="input-block-level" type="text" placeholder="Nome da Rua / Logradouro" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Número:</strong></label>
                                <input id="num" name="num" value="<?php echo $rest['num_estadia']; ?>" class="input-block-level" type="text" placeholder="Número" />
                            </div>

                            <div class="span5">
                                <label><strong>CEP:</strong></label>
                                <input id="cep" name="cep" value="<?php echo $rest['cep_estadia']; ?>" class="input-block-level" type="text" maxlength="9" placeholder="Informe o CEP" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Bairro:</strong></label>
                                <input id="bairro" name="bairro" value="<?php echo $rest['bairro_estadia']; ?>" class="input-block-level" type="text" placeholder="Informe o Bairro" />
                            </div>

                            <div class="span5">
                                <label><strong>Cidade:</strong></label>
                                <input id="cidade" name="cidade" value="<?php echo $rest['cidade_estadia']; ?>" class="input-block-level" type="text" placeholder="Informe a Cidade" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>UF:</strong></label>
                                <input id="uf" name="uf" value="<?php echo $rest['uf_estadia']; ?>" class="input-block-level" type="text" placeholder="Informe a UF" />
                            </div>

                            <div class="span5">
                                <label><strong>Longitude:</strong></label>
                                <input id="longitude" name="longitude" value="<?php echo $rest['long_estadia']; ?>" class="input-block-level" type="text" placeholder="Informe a Longitude" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Latitude:</strong></label>
                                <input id="latitude" name="latitude" class="input-block-level" value="<?php echo $rest['lati_estadia']; ?>" type="text" placeholder="Informe a Latitude" />
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Contato</label>
                            </div>

                            <div class="span11">
                                <label><strong>Atendimento:</strong></label>
                                <input name="foneAtendimento" value="<?php echo $rest['fone_atend_estadia']; ?>" class="input-block-level" name="googleplus" type="text" placeholder="">
                            </div>

                            <div class="span11">
                                <label><strong>E-mail:</strong></label>
                                <input name="email" class="input-block-level" value="<?php echo $rest['email_estadia']; ?>" name="googleplus" type="text" placeholder="">
                            </div>

                            <div class="span11">
                                <label><strong>Site:</strong></label>
                                <input name="site" class="input-block-level" value="<?php echo $rest['site_estadia']; ?>" name="googleplus" type="text">
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Redes Sociais</label>
                            </div>

                            <div class="span11">
                                <label><strong>Twitter:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['twitter_estadia']; ?>" name="twitter" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Facebook:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['facebook_estadia']; ?>" name="facebook" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Youtube:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['youtube_estadia']; ?>" name="youtube" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Instagram:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['insta_estadia']; ?>" name="instagram" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Flickr:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['flickr_estadia']; ?>" name="flickr" type="text">
                            </div>

                            <div class="span11">
                                <label>Google +:</label>
                                <input class="input-block-level" value="<?php echo $rest['googleplus_estadia']; ?>" name="googleplus" type="text">
                            </div>

                            <div class="span11">
                                <label>Orkut:</label>
                                <input class="input-block-level" value="<?php echo $rest['orkut_estadia']; ?>" name="orkut" type="text">
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Adaptado</label>
                            </div>

                            <div class="span11">
                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="cego" <?php if (in_array('cego', $adaptado_para)) { echo 'checked'; } ?>> <strong>Cego</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="surdo" <?php if (in_array('surdo', $adaptado_para)) { echo 'checked'; } ?>> <strong>Surdo</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="deficientefisico" <?php if (in_array('deficientefisico', $adaptado_para)) { echo 'checked'; } ?>> <strong>Deficiente fisico</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="braile" <?php if (in_array('braile', $adaptado_para)) { echo 'checked'; } ?>> <strong>Braile</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="obeso" <?php if (in_array('obeso', $adaptado_para)) { echo 'checked'; } ?>> <strong>Obeso</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="idoso" <?php if (in_array('idoso', $adaptado_para)) { echo 'checked'; } ?>> <strong>Idoso</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="gestante" <?php if (in_array('gestante', $adaptado_para)) { echo 'checked'; } ?>> <strong>Gestante</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="bebe" <?php if (in_array('bebe', $adaptado_para)) { echo 'checked'; } ?>> <strong>Bêbe</strong>
                            </div>
                        </fieldset>

                        <div class="span11">
                            <input type="submit" class="btn btn-success pull-right" name="sendCliente" value="Atualizar" />
                        </div><!-- / -->
                    </form><!-- /form -->
                    <?php
                        }
                    }
                    ?>
                </div><!-- /widget-content -->
            </div><!-- /widget -->
        </div><!-- /span12 -->
    </div><!-- /row -->
</div><!-- /span12 -->
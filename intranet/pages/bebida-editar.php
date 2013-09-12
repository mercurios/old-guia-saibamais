<div class="span12">
    <div class="row">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <h3>Novo bebida</h3>
                </div><!-- /widget-header -->

                <div class="widget-content">
                    <?php

                    $_id = $_GET['id'];

                    if (empty($_id)) {
                        header('Location: painel.php');
                    }

                    $readRest = read('guia_bebidas', "WHERE id_bebida = '$_id'");

                    if (isset($_POST['sendCliente'])) {

                            // echo $readRest[0]['logo_bebida'];

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
                                $_newLogo = $readRest[0]['logo_bebida'];
                            }

                            $_nome              = $_POST['nome'];
                            $_slug              = geraUrl($_nome);
                            $_desc              = $_POST['descricao'];
                            $_pagamento         = $_POST['formaPagamento'];
                            $_pagamento         = implode(',', $_pagamento);
                            $_infoextra         = $_POST['infoExtras'];
                            $_infoextra         = implode(',', $_infoextra);
                            $_tipoBebida        = $_POST['tipoBebida'];
                            $_tipoBebida        = implode(',', $_tipoBebida);
                            $_tipoLocal         = $_POST['tipoLocal'];
                            $_tipoLocal         = implode(',', $_tipoLocal);
                            $_porExtras         = $_POST['porExtras'];
                            $_porExtras         = implode(',', $_porExtras);
                            $_rua               = $_POST['rua'];
                            $_num               = $_POST['num'];
                            $_cep               = $_POST['cep'];
                            $_bairro            = $_POST['bairro'];
                            $_cidade            = $_POST['cidade'];
                            $_uf                = $_POST['uf'];
                            $_long              = $_POST['longitude'];
                            $_lati              = $_POST['latitude'];
                            $_foneAtendimento   = $_POST['foneAtendimento'];
                            $_foneDiskEntrega   = $_POST['foneDiskEntrega'];
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
                            $_h_dom             = $_POST['h_dom'];
                            $_h_seg             = $_POST['h_seg'];
                            $_h_ter             = $_POST['h_ter'];
                            $_h_qua             = $_POST['h_qua'];
                            $_h_qui             = $_POST['h_qui'];
                            $_h_sex             = $_POST['h_sex'];
                            $_h_sab             = $_POST['h_sab'];

                            $dados = array(
                                "logo_bebida"          => $_newLogo,
                                "nome_bebida"          => $_nome,
                                "slug_bebida"          => $_slug,
                                "desc_bebida"          => $_desc,
                                "pag_bebida"           => $_pagamento,
                                "extra_bebida"         => $_infoextra,
                                "local_bebida"         => $_tipoLocal,
                                "tipo_bebida_bebida"   => $_tipoBebida,
                                "tipo_extra_bebida"    => $_porExtras,
                                "rua_bebida"           => $_rua,
                                "num_bebida"           => $_num,
                                "cep_bebida"           => $_cep,
                                "bairro_bebida"        => $_bairro,
                                "cidade_bebida"        => $_cidade,
                                "uf_bebida"            => $_uf,
                                "long_bebida"          => $_long,
                                "lati_bebida"          => $_lati,
                                "fone_atend_bebida"    => $_foneAtendimento,
                                "fone_entrega_bebida"  => $_foneDiskEntrega,
                                "email_bebida"         => $_email,
                                "site_bebida"          => $_site,
                                "twitter_bebida"       => $_twitter,
                                "facebook_bebida"      => $_facebook,
                                "youtube_bebida"       => $_youtube,
                                "insta_bebida"         => $_instagram,
                                "flickr_bebida"        => $_flickr,
                                "googleplus_bebida"    => $_googleplus,
                                "orkut_bebida"         => $_orkut,
                                "adaptado_bebida"      => $_acessibilidade,
                                "h_dom"                     => $_h_dom,
                                "h_seg"                     => $_h_seg,
                                "h_ter"                     => $_h_ter,
                                "h_qua"                     => $_h_qua,
                                "h_qui"                     => $_h_qui,
                                "h_sex"                     => $_h_sex,
                                "h_sab"                     => $_h_sab
                            );
                        

                            // Grava no banco
                            $update = update('guia_bebidas', $dados, "id_bebida = '$_id'");

                            // Verifica se foi gravado com sucesso
                            if ($update) {
                                message('<strong>bebida atualizado com sucesso.</strong>', 'success');
                                salvaLog("Atualizou um cliente na categoria bebidas.", $_SESSION['autUser']['nome_user']);
                            }
                            else {
                                message('<strong>Erro ao atualizar bebida, tente novamente.</strong>', 'warning');
                            }
                        }

                    $readRest = read('guia_bebidas', "WHERE id_bebida = '$_id'");
                    if ($readRest) {
                        foreach ($readRest as $rest) {
                            $forma_pagamento = explode(',', $rest['pag_bebida']);
                            $extras          = explode(',', $rest['extra_bebida']);
                            $local_bebida    = explode(',', $rest['local_bebida']);
                            $tipo_bebida     = explode(',', $rest['tipo_bebida_bebida']);
                            $tipo_extra      = explode(',', $rest['tipo_extra_bebida']);
                            $adaptado_para   = explode(',', $rest['adaptado_bebida']);
                    ?>

                    <form name="cadCliente" method="post" action="" enctype="multipart/form-data">
                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Informações</label>
                            </div>

                            <div class="span11">
                                <label><strong>Imagem atual:</strong></label>
                                <img src="../uploads/logos/<?php echo $rest['logo_bebida']; ?>" width="200" />
                            </div>

                            <div class="span11">
                                <p></p>
                                <input type="file" title="Enviar uma nova imagem" name="logo" class="" id="logo" />
                            </div><!-- / logo-->

                            <div class="span11">
                                <br>
                                <label for="nome"><small class="red">*</small> <strong>Nome do estabelecimento:</strong></label>
                                <input type="text" name="nome" id="nome" value="<?php echo $rest['nome_bebida']; ?>" class="span11" placeholder="Informe o nome do estabelecimento" />
                            </div><!-- / Nome-->

                            <div class="span11">
                                <label><strong>Descrição:</strong></label>
                                <textarea class="span11 limit" name="descricao" placeholder="Fale um pouco sobre o estabelecimento"><?php echo $rest['desc_bebida']; ?></textarea>
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Formas de pagamento</label>
                            </div>
                            <div class="span11">
                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="dinheiro" <?php if (in_array('dinheiro', $forma_pagamento)) { echo 'checked'; } ?>> <strong>Dinheiro</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="visa" <?php if (in_array('visa', $forma_pagamento)) { echo 'checked'; } ?>> <strong>Visa</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="master" <?php if (in_array('master', $forma_pagamento)) { echo 'checked'; } ?>> <strong>Master</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="hiper" <?php if (in_array('hiper', $forma_pagamento)) { echo 'checked'; } ?>> <strong>Hiper</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="diners" <?php if (in_array('diners', $forma_pagamento)) { echo 'checked'; } ?>> <strong>Diners Club</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="elo" <?php if (in_array('elo', $forma_pagamento)) { echo 'checked'; } ?>> <strong>Elo</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="credcard" <?php if (in_array('credcard', $forma_pagamento)) { echo 'checked'; } ?>> <strong>Credcard</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="visaelectro" <?php if (in_array('visaelectro', $forma_pagamento)) { echo 'checked'; } ?>> <strong>Visa Electro</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="paggo" <?php if (in_array('paggo', $forma_pagamento)) { echo 'checked'; } ?>> <strong>Paggo</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="redeshop" <?php if (in_array('redeshop', $forma_pagamento)) { echo 'checked'; } ?>> <strong>Redeshop</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="vr" <?php if (in_array('vr', $forma_pagamento)) { echo 'checked'; } ?>> <strong>Vale Refeição</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="aura" <?php if (in_array('aura', $forma_pagamento)) { echo 'checked'; } ?>> <strong>Aura</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="toppremium" <?php if (in_array('toppremium', $forma_pagamento)) { echo 'checked'; } ?>> <strong>Top Premium</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="sodexo" <?php if (in_array('sodexo', $forma_pagamento)) { echo 'checked'; } ?>> <strong>Sodexo</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="sodexopass" <?php if (in_array('sodexopass', $forma_pagamento)) { echo 'checked'; } ?>> <strong>Sodexo Pass</strong>
                                </label>
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
                                <label><strong>Por local:</strong></label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLocal[]" value="bares" <?php if (in_array('bares', $local_bebida)) { echo 'checked'; } ?>> Bar
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLocal[]" value="botecos" <?php if (in_array('botecos', $local_bebida)) { echo 'checked'; } ?>> Boteco
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLocal[]" value="cafeterias" <?php if (in_array('cafeterias', $local_bebida)) { echo 'checked'; } ?>> Cafeteria
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLocal[]" value="lanchonetes" <?php if (in_array('lanchonetes', $local_bebida)) { echo 'checked'; } ?>> Lanchonete
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLocal[]" value="restaurante" <?php if (in_array('restaurante', $local_bebida)) { echo 'checked'; } ?>> Restaurante
                                </label>
                            </div><!-- /span11 -->

                            <div class="span11">
                                <div>&nbsp</div>
                                <label><strong>Tipo de bebidas</strong></label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="batidas" <?php if (in_array('batidas', $tipo_bebida)) { echo 'checked'; } ?>> Batidas
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="caipirinhas" <?php if (in_array('caipirinhas', $tipo_bebida)) { echo 'checked'; } ?>> Caipirinha
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="cachacas" <?php if (in_array('cachacas', $tipo_bebida)) { echo 'checked'; } ?>> Cachaça
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="cafes" <?php if (in_array('cafes', $tipo_bebida)) { echo 'checked'; } ?>> Café
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="cervejas" <?php if (in_array('cervejas', $tipo_bebida)) { echo 'checked'; } ?>> Cerveja
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="chopps" <?php if (in_array('chopps', $tipo_bebida)) { echo 'checked'; } ?>> Chopp
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="energeticas" <?php if (in_array('energeticas', $tipo_bebida)) { echo 'checked'; } ?>> Energético
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="licor" <?php if (in_array('licor', $tipo_bebida)) { echo 'checked'; } ?>> Licor
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="milk-shake" <?php if (in_array('milk-shake', $tipo_bebida)) { echo 'checked'; } ?>> Milk-shake
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="refrigerantes" <?php if (in_array('refrigerantes', $tipo_bebida)) { echo 'checked'; } ?>> Refrigerante
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="sucos" <?php if (in_array('sucos', $tipo_bebida)) { echo 'checked'; } ?>> Suco
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="tequilas" <?php if (in_array('tequilas', $tipo_bebida)) { echo 'checked'; } ?>> Tequila
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="vinhos" <?php if (in_array('vinhos', $tipo_bebida)) { echo 'checked'; } ?>> Vinho
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="whisky" <?php if (in_array('whisky', $tipo_bebida)) { echo 'checked'; } ?>> Whisky
                                </label>
                            </div><!-- /span11 -->

                            <div class="span11">
                                <div>&nbsp</div>
                                <label><strong>Por extras:</strong></label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porExtras[]" value="musicas-ao-vivo" <?php if (in_array('musicas-ao-vivo', $tipo_extra)) { echo 'checked'; } ?>> Música ao vivo
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porExtras[]" value="jogos-ao-vivo" <?php if (in_array('jogos-ao-vivo', $tipo_extra)) { echo 'checked'; } ?>> Jogos ao vivo
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porExtras[]" value="lutas-transmitidas" <?php if (in_array('lutas-transmitidas', $tipo_extra)) { echo 'checked'; } ?>> Lutas ao vivo
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porExtras[]" value="open-bar" <?php if (in_array('open-bar', $tipo_extra)) { echo 'checked'; } ?>> Open Bar
                                </label>
                            </div><!-- /span11 -->
                        </fieldset>

                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Localidade</label>
                            </div>

                            <div class="span5">
                                <label><strong>Rua:</strong></label>
                                <input id="rua" name="rua" value="<?php echo $rest['rua_bebida']; ?>" class="input-block-level" type="text" placeholder="Nome da Rua / Logradouro" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Número:</strong></label>
                                <input id="num" name="num" value="<?php echo $rest['num_bebida']; ?>" class="input-block-level" type="text" placeholder="Número" />
                            </div>

                            <div class="span5">
                                <label><strong>CEP:</strong></label>
                                <input id="cep" name="cep" value="<?php echo $rest['cep_bebida']; ?>" class="input-block-level" type="text" maxlength="9" placeholder="Informe o CEP" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Bairro:</strong></label>
                                <input id="bairro" name="bairro" value="<?php echo $rest['bairro_bebida']; ?>" class="input-block-level" type="text" placeholder="Informe o Bairro" />
                            </div>

                            <div class="span5">
                                <label><strong>Cidade:</strong></label>
                                <input id="cidade" name="cidade" value="<?php echo $rest['cidade_bebida']; ?>" class="input-block-level" type="text" placeholder="Informe a Cidade" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>UF:</strong></label>
                                <input id="uf" name="uf" value="<?php echo $rest['uf_bebida']; ?>" class="input-block-level" type="text" placeholder="Informe a UF" />
                            </div>

                            <div class="span5">
                                <label><strong>Longitude:</strong></label>
                                <input id="longitude" name="longitude" value="<?php echo $rest['long_bebida']; ?>" class="input-block-level" type="text" placeholder="Informe a Longitude" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Latitude:</strong></label>
                                <input id="latitude" name="latitude" class="input-block-level" value="<?php echo $rest['lati_bebida']; ?>" type="text" placeholder="Informe a Latitude" />
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Contato</label>
                            </div>

                            <div class="span11">
                                <label><strong>Atendimento:</strong></label>
                                <input name="foneAtendimento" value="<?php echo $rest['fone_atend_bebida']; ?>" class="input-block-level" name="googleplus" type="text" placeholder="">
                            </div>

                            <div class="span11">
                                <label><strong>Disk-Entrega:</strong></label>
                                <input name="foneDiskEntrega" value="<?php echo $rest['fone_entrega_bebida']; ?>" class="input-block-level" name="googleplus" type="text" placeholder="">
                            </div>

                            <div class="span11">
                                <label><strong>E-mail:</strong></label>
                                <input name="email" class="input-block-level" value="<?php echo $rest['email_bebida']; ?>" name="googleplus" type="text" placeholder="">
                            </div>

                            <div class="span11">
                                <label><strong>Site:</strong></label>
                                <input name="site" class="input-block-level" value="<?php echo $rest['site_bebida']; ?>" name="googleplus" type="text">
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Redes Sociais</label>
                            </div>

                            <div class="span11">
                                <label><strong>Twitter:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['twitter_bebida']; ?>" name="twitter" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Facebook:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['facebook_bebida']; ?>" name="facebook" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Youtube:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['youtube_bebida']; ?>" name="youtube" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Instagram:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['insta_bebida']; ?>" name="instagram" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Flickr:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['flickr_bebida']; ?>" name="flickr" type="text">
                            </div>

                            <div class="span11">
                                <label>Google +:</label>
                                <input class="input-block-level" value="<?php echo $rest['googleplus_bebida']; ?>" name="googleplus" type="text">
                            </div>

                            <div class="span11">
                                <label>Orkut:</label>
                                <input class="input-block-level" value="<?php echo $rest['orkut_bebida']; ?>" name="orkut" type="text">
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

                            <div class="span11">
                                <label class="titulo-separator">Horário de funcionamento</label>
                            </div>

                            <div class="span11">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="info">
                                            <td width="80"><strong>Dia </strong></td>
                                            <td width="560"><strong>Horário </strong></td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><strong>Domingo:</strong></td>
                                            <td><input class="input-block-level" name="h_dom" type="text" value="<?php echo $rest['h_dom']; ?>" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Segunda:</strong></td>
                                            <td><input class="input-block-level" name="h_seg" type="text" value="<?php echo $rest['h_seg']; ?>" placeholder="Não funcionamos" maxlength="31"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Terça:</strong></td>
                                            <td><input class="input-block-level" name="h_ter" type="text" value="<?php echo $rest['h_ter']; ?>" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Quarta:</strong></td>
                                            <td><input class="input-block-level" name="h_qua" type="text" value="<?php echo $rest['h_qua']; ?>" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Quinta:</strong></td>
                                            <td><input class="input-block-level" name="h_qui" type="text" value="<?php echo $rest['h_qui']; ?>" placeholder="18:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Sexta:</strong></td>
                                            <td><input class="input-block-level" name="h_sex" type="text" value="<?php echo $rest['h_sex']; ?>" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Sábado:</strong></td>
                                            <td><input class="input-block-level" name="h_sab" type="text" value="<?php echo $rest['h_sab']; ?>" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                        </tr>
                                    </tbody>
                                </table>
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
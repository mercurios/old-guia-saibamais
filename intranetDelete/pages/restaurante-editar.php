<div class="span12">
    <div class="row">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <h3>Novo restaurante</h3>
                </div><!-- /widget-header -->

                <div class="widget-content">
                    <?php

                    $_id = $_GET['id'];

                    if (empty($_id)) {
                        header('Location: painel.php');
                    }

                    $readRest = read('guia_restaurantes', "WHERE id_restaurante = '$_id'");

                    if (isset($_POST['sendCliente'])) {

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
                                $_newLogo = $readRest[0]['logo_restaurante'];
                            }

                            $_nome              = $_POST['nome'];
                            $_slug              = geraUrl($_nome);
                            $_desc              = $_POST['descricao'];
                            $_pagamento         = $_POST['formaPagamento'];
                            $_pagamento         = implode(',', $_pagamento);
                            $_infoextra         = $_POST['infoExtras'];
                            $_infoextra         = implode(',', $_infoextra);
                            $_tipoCozinha       = $_POST['tipoCozinha'];
                            $_tipoCozinha       = implode(',', $_tipoCozinha);
                            $_tipoComida        = $_POST['tipoComida'];
                            $_tipoComida        = implode(',', $_tipoComida);
                            $_tipoServico       = $_POST['tipoServico'];
                            $_tipoServico       = implode(',', $_tipoServico);
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
                                "logo_restaurante"          => $_newLogo,
                                "nome_restaurante"          => $_nome,
                                "slug_restaurante"          => $_slug,
                                "desc_restaurante"          => $_desc,
                                "pag_restaurante"           => $_pagamento,
                                "extra_restaurante"         => $_infoextra,
                                "tipo_cozinha_restaurante"  => $_tipoCozinha,
                                "tipo_comida_restaurante"   => $_tipoComida,
                                "tipo_servico_restaurante"  => $_tipoServico,
                                "rua_restaurante"           => $_rua,
                                "num_restaurante"           => $_num,
                                "cep_restaurante"           => $_cep,
                                "bairro_restaurante"        => $_bairro,
                                "cidade_restaurante"        => $_cidade,
                                "uf_restaurante"            => $_uf,
                                "long_restaurante"          => $_long,
                                "lati_restaurante"          => $_lati,
                                "fone_atend_restaurante"    => $_foneAtendimento,
                                "fone_entrega_restaurante"  => $_foneDiskEntrega,
                                "email_restaurante"         => $_email,
                                "site_restaurante"          => $_site,
                                "twitter_restaurante"       => $_twitter,
                                "facebook_restaurante"      => $_facebook,
                                "youtube_restaurante"       => $_youtube,
                                "insta_restaurante"         => $_instagram,
                                "flickr_restaurante"        => $_flickr,
                                "googleplus_restaurante"    => $_googleplus,
                                "orkut_restaurante"         => $_orkut,
                                "adaptado_restaurante"      => $_acessibilidade,
                                "h_dom"                     => $_h_dom,
                                "h_seg"                     => $_h_seg,
                                "h_ter"                     => $_h_ter,
                                "h_qua"                     => $_h_qua,
                                "h_qui"                     => $_h_qui,
                                "h_sex"                     => $_h_sex,
                                "h_sab"                     => $_h_sab
                            );
                        

                            // Grava no banco
                            $update = update('guia_restaurantes', $dados, "id_restaurante = '$_id'");

                            // Verifica se foi gravado com sucesso
                            if ($update) {
                                message('<strong>Restaurante atualizado com sucesso.</strong>', 'success');
                            }
                            else {
                                message('<strong>Erro ao atualizar restaurante, tente novamente.</strong>', 'warning');
                            }
                        }

                    $readRest = read('guia_restaurantes', "WHERE id_restaurante = '$_id'");
                    if ($readRest) {
                        foreach ($readRest as $rest) {
                            $forma_pagamento = explode(',', $rest['pag_restaurante']);
                            $extras          = explode(',', $rest['extra_restaurante']);
                            $tipo_cozinha    = explode(',', $rest['tipo_cozinha_restaurante']);
                            $tipo_comida     = explode(',', $rest['tipo_comida_restaurante']);
                            $tipo_servico    = explode(',', $rest['tipo_servico_restaurante']);
                            $adaptado_para   = explode(',', $rest['adaptado_restaurante']);
                    ?>

                    <form name="cadCliente" method="post" action="" enctype="multipart/form-data">
                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Informações</label>
                            </div>

                            <div class="span11">
                                <label><strong>Imagem atual:</strong></label>
                                <img src="../uploads/logos/<?php echo $rest['logo_restaurante']; ?>" width="200" />
                            </div>

                            <div class="span11">
                                <p></p>
                                <input type="file" title="Enviar uma nova imagem" name="logo" class="" id="logo" />
                            </div><!-- / logo-->

                            <div class="span11">
                                <br>
                                <label for="nome"><small class="red">*</small> <strong>Nome do estabelecimento:</strong></label>
                                <input type="text" name="nome" id="nome" value="<?php echo $rest['nome_restaurante']; ?>" class="span11" placeholder="Informe o nome do estabelecimento" />
                            </div><!-- / Nome-->

                            <div class="span11">
                                <label><strong>Descrição:</strong></label>
                                <textarea class="span11 limit" name="descricao" placeholder="Fale um pouco sobre o estabelecimento"><?php echo $rest['desc_restaurante']; ?></textarea>
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
                                <label><strong>Tipo de cozinha</strong></label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoCozinha[]" value="africanas" <?php if (in_array('africanas', $tipo_cozinha)) { echo 'checked'; } ?>> Africanas
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoCozinha[]" value="arabes" <?php if (in_array('arabes', $tipo_cozinha)) { echo 'checked'; } ?>> Árabe
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoCozinha[]" value="brasileiras" <?php if (in_array('brasileiras', $tipo_cozinha)) { echo 'checked'; } ?>> Brasileira 
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoCozinha[]" value="italianas" <?php if (in_array('italianas', $tipo_cozinha)) { echo 'checked'; } ?>> Italianas 
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoCozinha[]" value="europeias" <?php if (in_array('europeias', $tipo_cozinha)) { echo 'checked'; } ?>> Europeia
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoCozinha[]" value="latinas" <?php if (in_array('latinas', $tipo_cozinha)) { echo 'checked'; } ?>> Latinas
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoCozinha[]" value="orientais" <?php if (in_array('orientais', $tipo_cozinha)) { echo 'checked'; } ?>> Orientais
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoCozinha[]" value="regionais" <?php if (in_array('regionais', $tipo_cozinha)) { echo 'checked'; } ?>> Regional
                                </label>
                            </div><!-- /span11 -->

                            <div class="span11">
                                <div>&nbsp</div>
                                <label><strong>Tipo de comida</strong></label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="carnes" <?php if (in_array('carnes', $tipo_comida)) { echo 'checked'; } ?>> Carne
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="crustaceos" <?php if (in_array('crustaceos', $tipo_comida)) { echo 'checked'; } ?>> Frutos do mar
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="especiais" <?php if (in_array('especiais', $tipo_comida)) { echo 'checked'; } ?>> Light / Especiais 
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="massas" <?php if (in_array('massas', $tipo_comida)) { echo 'checked'; } ?>> Massa
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="naturais" <?php if (in_array('naturais', $tipo_comida)) { echo 'checked'; } ?>> Natural
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="peixes" <?php if (in_array('peixes', $tipo_comida)) { echo 'checked'; } ?>> Peixes
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="vegetais" <?php if (in_array('vegetais', $tipo_comida)) { echo 'checked'; } ?>> Vegetais
                                </label>
                            </div><!-- /span11 -->

                            <div class="span11">
                                <div>&nbsp</div>
                                <label><strong>Tipo de Serviço</strong></label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoServico[]" value="alacartes" <?php if (in_array('alacartes', $tipo_servico)) { echo 'checked'; } ?>> A lá carte
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoServico[]" value="delivery" <?php if (in_array('delivery', $tipo_servico)) { echo 'checked'; } ?>> Deliveri
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoServico[]" value="drive-thrur" <?php if (in_array('drive-thrur', $tipo_servico)) { echo 'checked'; } ?>> Drive-thrur 
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoServico[]" value="rodizios" <?php if (in_array('rodizios', $tipo_servico)) { echo 'checked'; } ?>> Rodizio
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoServico[]" value="self-service" <?php if (in_array('self-service', $tipo_servico)) { echo 'checked'; } ?>> Self-Serviçe
                                </label>
                            </div><!-- /span11 -->
                        </fieldset>

                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Localidade</label>
                            </div>

                            <div class="span5">
                                <label><strong>Rua:</strong></label>
                                <input id="rua" name="rua" value="<?php echo $rest['rua_restaurante']; ?>" class="input-block-level" type="text" placeholder="Nome da Rua / Logradouro" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Número:</strong></label>
                                <input id="num" name="num" value="<?php echo $rest['num_restaurante']; ?>" class="input-block-level" type="text" placeholder="Número" />
                            </div>

                            <div class="span5">
                                <label><strong>CEP:</strong></label>
                                <input id="cep" name="cep" value="<?php echo $rest['cep_restaurante']; ?>" class="input-block-level" type="text" maxlength="9" placeholder="Informe o CEP" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Bairro:</strong></label>
                                <input id="bairro" name="bairro" value="<?php echo $rest['bairro_restaurante']; ?>" class="input-block-level" type="text" placeholder="Informe o Bairro" />
                            </div>

                            <div class="span5">
                                <label><strong>Cidade:</strong></label>
                                <input id="cidade" name="cidade" value="<?php echo $rest['cidade_restaurante']; ?>" class="input-block-level" type="text" placeholder="Informe a Cidade" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>UF:</strong></label>
                                <input id="uf" name="uf" value="<?php echo $rest['uf_restaurante']; ?>" class="input-block-level" type="text" placeholder="Informe a UF" />
                            </div>

                            <div class="span5">
                                <label><strong>Longitude:</strong></label>
                                <input id="longitude" name="longitude" value="<?php echo $rest['long_restaurante']; ?>" class="input-block-level" type="text" placeholder="Informe a Longitude" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Latitude:</strong></label>
                                <input id="latitude" name="latitude" class="input-block-level" value="<?php echo $rest['lati_restaurante']; ?>" type="text" placeholder="Informe a Latitude" />
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Contato</label>
                            </div>

                            <div class="span11">
                                <label><strong>Atendimento:</strong></label>
                                <input name="foneAtendimento" value="<?php echo $rest['fone_atend_restaurante']; ?>" class="input-block-level" name="googleplus" type="text" placeholder="">
                            </div>

                            <div class="span11">
                                <label><strong>Disk-Entrega:</strong></label>
                                <input name="foneDiskEntrega" value="<?php echo $rest['fone_entrega_restaurante']; ?>" class="input-block-level" name="googleplus" type="text" placeholder="">
                            </div>

                            <div class="span11">
                                <label><strong>E-mail:</strong></label>
                                <input name="email" class="input-block-level" value="<?php echo $rest['email_restaurante']; ?>" name="googleplus" type="text" placeholder="">
                            </div>

                            <div class="span11">
                                <label><strong>Site:</strong></label>
                                <input name="site" class="input-block-level" value="<?php echo $rest['site_restaurante']; ?>" name="googleplus" type="text">
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Redes Sociais</label>
                            </div>

                            <div class="span11">
                                <label><strong>Twitter:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['twitter_restaurante']; ?>" name="twitter" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Facebook:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['facebook_restaurante']; ?>" name="facebook" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Youtube:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['youtube_restaurante']; ?>" name="youtube" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Instagram:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['insta_restaurante']; ?>" name="instagram" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Flickr:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['flickr_restaurante']; ?>" name="flickr" type="text">
                            </div>

                            <div class="span11">
                                <label>Google +:</label>
                                <input class="input-block-level" value="<?php echo $rest['googleplus_restaurante']; ?>" name="googleplus" type="text">
                            </div>

                            <div class="span11">
                                <label>Orkut:</label>
                                <input class="input-block-level" value="<?php echo $rest['orkut_restaurante']; ?>" name="orkut" type="text">
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
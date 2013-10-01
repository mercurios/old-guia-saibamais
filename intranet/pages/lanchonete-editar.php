<div class="span12">
    <div class="row">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <h3>Novo lanchonete</h3>
                </div><!-- /widget-header -->

                <div class="widget-content">
                    <?php

                    $_id = $_GET['id'];

                    if (empty($_id)) {
                        header('Location: painel.php');
                    }

                    $readRest = read('guia_lanchonetes', "WHERE id_lanchonete = '$_id'");

                    if (isset($_POST['sendCliente'])) {

                            // echo $readRest[0]['logo_lanchonete'];

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
                                $_newLogo = $readRest[0]['logo_lanchonete'];
                            }

                            $_nome              = $_POST['nome'];
                            $_desc              = $_POST['descricao'];
                            $_pagamento         = $_POST['formaPagamento'];
                            $_pagamento         = implode(',', $_pagamento);
                            $_infoextra         = $_POST['infoExtras'];
                            $_infoextra         = implode(',', $_infoextra);
                            $_tipoLanchonete    = $_POST['tipoLanchonete'];
                            $_tipoLanchonete    = implode(',', $_tipoLanchonete);
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
                                "logo_lanchonete"          => $_newLogo,
                                "nome_lanchonete"          => $_nome,
                                "desc_lanchonete"          => $_desc,
                                "pag_lanchonete"           => $_pagamento,
                                "extra_lanchonete"         => $_infoextra,
                                "tipo_lanchonete"          => $_tipoLanchonete,
                                "tipo_comida_lanchonete"   => $_tipoComida,
                                "tipo_servico_lanchonete"  => $_tipoServico,
                                "rua_lanchonete"           => $_rua,
                                "num_lanchonete"           => $_num,
                                "cep_lanchonete"           => $_cep,
                                "bairro_lanchonete"        => $_bairro,
                                "cidade_lanchonete"        => $_cidade,
                                "uf_lanchonete"            => $_uf,
                                "long_lanchonete"          => $_long,
                                "lati_lanchonete"          => $_lati,
                                "fone_atend_lanchonete"    => $_foneAtendimento,
                                "fone_entrega_lanchonete"  => $_foneDiskEntrega,
                                "email_lanchonete"         => $_email,
                                "site_lanchonete"          => $_site,
                                "twitter_lanchonete"       => $_twitter,
                                "facebook_lanchonete"      => $_facebook,
                                "youtube_lanchonete"       => $_youtube,
                                "insta_lanchonete"         => $_instagram,
                                "flickr_lanchonete"        => $_flickr,
                                "googleplus_lanchonete"    => $_googleplus,
                                "orkut_lanchonete"         => $_orkut,
                                "adaptado_lanchonete"      => $_acessibilidade,
                                "h_dom"                     => $_h_dom,
                                "h_seg"                     => $_h_seg,
                                "h_ter"                     => $_h_ter,
                                "h_qua"                     => $_h_qua,
                                "h_qui"                     => $_h_qui,
                                "h_sex"                     => $_h_sex,
                                "h_sab"                     => $_h_sab
                            );
                        

                            // Grava no banco
                            $update = update('guia_lanchonetes', $dados, "id_lanchonete = '$_id'");

                            // Verifica se foi gravado com sucesso
                            if ($update) {
                                message('<strong>lanchonete atualizado com sucesso.</strong>', 'success');
                                salvaLog("Editou uma lanchonete.", $_SESSION['autUser']['nome_user']);
                            }
                            else {
                                message('<strong>Erro ao atualizar lanchonete, tente novamente.</strong>', 'warning');
                            }
                        }

                    $readRest = read('guia_lanchonetes', "WHERE id_lanchonete = '$_id'");
                    if ($readRest) {
                        foreach ($readRest as $rest) {
                            $forma_pagamento = explode(',', $rest['pag_lanchonete']);
                            $tipo_lanchonete = explode(',', $rest['tipo_lanchonete']);
                            $tipo_comida     = explode(',', $rest['tipo_comida_lanchonete']);
                            $tipo_servico    = explode(',', $rest['tipo_servico_lanchonete']);
                            $adaptado_para   = explode(',', $rest['adaptado_lanchonete']);
                            $extras          = explode(',', $rest['extra_lanchonete']);
                    ?>

                    <form name="cadCliente" method="post" action="" enctype="multipart/form-data">
                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Informações</label>
                            </div>

                            <div class="span11">
                                <label><strong>Imagem atual:</strong></label>
                                <img src="../uploads/logos/<?php echo $rest['logo_lanchonete']; ?>" width="200" />
                            </div>

                            <div class="span11">
                                <p></p>
                                <input type="file" title="Enviar uma nova imagem" name="logo" class="" id="logo" />
                            </div><!-- / logo-->

                            <div class="span11">
                                <br>
                                <label for="nome"><small class="red">*</small> <strong>Nome do estabelecimento:</strong></label>
                                <input type="text" name="nome" id="nome" value="<?php echo $rest['nome_lanchonete']; ?>" class="span11" placeholder="Informe o nome do estabelecimento" />
                            </div><!-- / Nome-->

                            <div class="span11">
                                <label><strong>Descrição:</strong></label>
                                <textarea class="span11 limit" name="descricao" placeholder="Fale um pouco sobre o estabelecimento"><?php echo $rest['desc_lanchonete']; ?></textarea>
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
                                <label><strong>Tipo de lanchonete:</strong></label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLanchonete[]" value="doces" <?php if (in_array('doces', $tipo_lanchonete)) { echo 'checked'; } ?>> Doces
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLanchonete[]" value="gelados" <?php if (in_array('gelados', $tipo_lanchonete)) { echo 'checked'; } ?>> Gelados
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLanchonete[]" value="massas" <?php if (in_array('massas', $tipo_lanchonete)) { echo 'checked'; } ?>> Massas 
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLanchonete[]" value="especiais" <?php if (in_array('especiais', $tipo_lanchonete)) { echo 'checked'; } ?>> Light / Especiais
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLanchonete[]" value="naturais" <?php if (in_array('naturais', $tipo_lanchonete)) { echo 'checked'; } ?>> Naturais
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLanchonete[]" value="salgados" <?php if (in_array('salgados', $tipo_lanchonete)) { echo 'checked'; } ?>> Salgados
                                </label>
                            </div><!-- /span11 -->

                            <div class="span11">
                                <div>&nbsp</div>
                                <label><strong>Tipo de comida:</strong></label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="acai" <?php if (in_array('acai', $tipo_comida)) { echo 'checked'; } ?>> Açaí
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="crepes" <?php if (in_array('crepes', $tipo_comida)) { echo 'checked'; } ?>> Crepes
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="doces" <?php if (in_array('doces', $tipo_comida)) { echo 'checked'; } ?>> Doces
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="fondue" <?php if (in_array('fondue', $tipo_comida)) { echo 'checked'; } ?>> Fondue
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="hamburguers" <?php if (in_array('hamburguers', $tipo_comida)) { echo 'checked'; } ?>> Hamburguers
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="iorgutes" <?php if (in_array('iorgutes', $tipo_comida)) { echo 'checked'; } ?>> Iorgute
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="pasteis" <?php if (in_array('pasteis', $tipo_comida)) { echo 'checked'; } ?>> Pasteis
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="pizzas" <?php if (in_array('pizzas', $tipo_comida)) { echo 'checked'; } ?>> Pizzas
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="salgados" <?php if (in_array('salgados', $tipo_comida)) { echo 'checked'; } ?>> Salgados
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="sanduiches" <?php if (in_array('sanduiches', $tipo_comida)) { echo 'checked'; } ?>> Sanduiches
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="sorvete-picole" <?php if (in_array('sorvete-picole', $tipo_comida)) { echo 'checked'; } ?>> Sorvetes / Picolés
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="sushi-temaki" <?php if (in_array('sushi-temaki', $tipo_comida)) { echo 'checked'; } ?>> Sushi / Temakis
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoComida[]" value="outros" <?php if (in_array('outros', $tipo_comida)) { echo 'checked'; } ?>> Outros
                                </label>
                            </div><!-- /span11 -->

                            <div class="span11">
                                <div>&nbsp</div>
                                <label><strong>Tipo de Serviço</strong></label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoServico[]" value="fast-food" <?php if (in_array('fast-food', $tipo_servico)) { echo 'checked'; } ?>> Fast-food
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoServico[]" value="dilivery" <?php if (in_array('dilivery', $tipo_servico)) { echo 'checked'; } ?>> Delivery
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoServico[]" value="drive-thrur" <?php if (in_array('drive-thrur', $tipo_servico)) { echo 'checked'; } ?>> Drive-thrur 
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoServico[]" value="rodizios" <?php if (in_array('rodizios', $tipo_servico)) { echo 'checked'; } ?>> Rodizio
                                </label>
                            </div><!-- /span11 -->
                        </fieldset>

                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Localidade</label>
                            </div>

                            <div class="span5">
                                <label><strong>Rua:</strong></label>
                                <input id="rua" name="rua" value="<?php echo $rest['rua_lanchonete']; ?>" class="input-block-level" type="text" placeholder="Nome da Rua / Logradouro" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Número:</strong></label>
                                <input id="num" name="num" value="<?php echo $rest['num_lanchonete']; ?>" class="input-block-level" type="text" placeholder="Número" />
                            </div>

                            <div class="span5">
                                <label><strong>CEP:</strong></label>
                                <input id="cep" name="cep" value="<?php echo $rest['cep_lanchonete']; ?>" class="input-block-level" type="text" maxlength="9" placeholder="Informe o CEP" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Bairro:</strong></label>
                                <input id="bairro" name="bairro" value="<?php echo $rest['bairro_lanchonete']; ?>" class="input-block-level" type="text" placeholder="Informe o Bairro" />
                            </div>

                            <div class="span5">
                                <label><strong>Cidade:</strong></label>
                                <input id="cidade" name="cidade" value="<?php echo $rest['cidade_lanchonete']; ?>" class="input-block-level" type="text" placeholder="Informe a Cidade" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>UF:</strong></label>
                                <input id="uf" name="uf" value="<?php echo $rest['uf_lanchonete']; ?>" class="input-block-level" type="text" placeholder="Informe a UF" />
                            </div>

                            <div class="span5">
                                <label><strong>Longitude:</strong></label>
                                <input id="longitude" name="longitude" value="<?php echo $rest['long_lanchonete']; ?>" class="input-block-level" type="text" placeholder="Informe a Longitude" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Latitude:</strong></label>
                                <input id="latitude" name="latitude" class="input-block-level" value="<?php echo $rest['lati_lanchonete']; ?>" type="text" placeholder="Informe a Latitude" />
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Contato</label>
                            </div>

                            <div class="span11">
                                <label><strong>Atendimento:</strong></label>
                                <input name="foneAtendimento" value="<?php echo $rest['fone_atend_lanchonete']; ?>" class="input-block-level" name="googleplus" type="text" placeholder="">
                            </div>

                            <div class="span11">
                                <label><strong>Disk-Entrega:</strong></label>
                                <input name="foneDiskEntrega" value="<?php echo $rest['fone_entrega_lanchonete']; ?>" class="input-block-level" name="googleplus" type="text" placeholder="">
                            </div>

                            <div class="span11">
                                <label><strong>E-mail:</strong></label>
                                <input name="email" class="input-block-level" value="<?php echo $rest['email_lanchonete']; ?>" name="googleplus" type="text" placeholder="">
                            </div>

                            <div class="span11">
                                <label><strong>Site:</strong></label>
                                <input name="site" class="input-block-level" value="<?php echo $rest['site_lanchonete']; ?>" name="googleplus" type="text">
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Redes Sociais</label>
                            </div>

                            <div class="span11">
                                <label><strong>Twitter:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['twitter_lanchonete']; ?>" name="twitter" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Facebook:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['facebook_lanchonete']; ?>" name="facebook" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Youtube:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['youtube_lanchonete']; ?>" name="youtube" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Instagram:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['insta_lanchonete']; ?>" name="instagram" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Flickr:</strong></label>
                                <input class="input-block-level" value="<?php echo $rest['flickr_lanchonete']; ?>" name="flickr" type="text">
                            </div>

                            <div class="span11">
                                <label>Google +:</label>
                                <input class="input-block-level" value="<?php echo $rest['googleplus_lanchonete']; ?>" name="googleplus" type="text">
                            </div>

                            <div class="span11">
                                <label>Orkut:</label>
                                <input class="input-block-level" value="<?php echo $rest['orkut_lanchonete']; ?>" name="orkut" type="text">
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
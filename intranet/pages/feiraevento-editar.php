    <div class="span12">
        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Nova Evento</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">

                        <?php  

                        $_id = $_GET['id'];
                        $readExpo = read('guia_feiraeventos', "WHERE id_feiraevento = '$_id'");

                        if (isset($_POST['sendExpo'])) {

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
                                $_newLogo = $readExpo[0]['logo_feiraevento'];
                            }

                            $_nome              = $_POST['nome'];
                            $_desc              = $_POST['descricao'];
                            $_extra             = $_POST['extras'];
                            $_pagamento         = $_POST['pagamento'];
                            $_pagamento         = implode(',', $_pagamento);
                            $_fone              = $_POST['telefone'];
                            $_email             = $_POST['email'];
                            $_site              = $_POST['site'];
                            $_twitter           = $_POST['twitter'];
                            $_facebook          = $_POST['facebook'];
                            $_youtube           = $_POST['youtube'];
                            $_insta             = $_POST['instagram'];
                            $_flickr            = $_POST['flickr'];
                            $_google            = $_POST['googleplus'];
                            $_orkut             = $_POST['orkut'];
                            $_titulo_preco_um   = $_POST['titulo_preco_um'];
                            $_titulo_preco_dois = $_POST['titulo_preco_dois'];
                            $_titulo_preco_tres = $_POST['titulo_preco_tres'];
                            $_valor_preco_um    = $_POST['valor_preco_um'];
                            $_valor_preco_dois  = $_POST['valor_preco_dois'];
                            $_valor_preco_tres  = $_POST['valor_preco_tres'];
                            $_datas             = $_POST['datas'];
                            $_datas             = implode(',', $_datas);

                            $dados = array(
                                "logo_feiraevento"        => $_newLogo,
                                "nome_feiraevento"        => $_nome,
                                "desc_feiraevento"        => $_desc,
                                "extra_feiraevento"       => $_extra,
                                "pag_feiraevento"         => $_pagamento,
                                "fone_feiraevento"        => $_fone,
                                "email_feiraevento"       => $_email,
                                "site_feiraevento"        => $_site,
                                "twitter_feiraevento"     => $_twitter,
                                "facebook_feiraevento"    => $_facebook,
                                "youtube_feiraevento"     => $_youtube,
                                "insta_feiraevento"       => $_insta,
                                "flickr_feiraevento"      => $_flickr,
                                "googleplus_feiraevento"  => $_google,
                                "orkut_feiraevento"       => $_orkut,
                                "titulo_preco_um"       => $_titulo_preco_um,
                                "titulo_preco_dois"     => $_titulo_preco_dois,
                                "titulo_preco_tres"     => $_titulo_preco_tres,
                                "val_preco_um"          => $_valor_preco_um,
                                "val_preco_dois"        => $_valor_preco_dois,
                                "val_preco_tres"        => $_valor_preco_tres,
                                "data_feiraevento"        => $_datas
                            );

                            // Grava no banco
                            $update = update('guia_feiraeventos', $dados, "id_feiraevento = '$_id'");

                            // Verifica se foi gravado com sucesso
                            if ($update) {
                                message('<strong>Evento atualizado com sucesso.</strong>', 'success');
                                salvaLog("Editou um evento.", $_SESSION['autUser']['nome_user']);
                            }
                            else {
                                message('<strong>Erro ao atualizar Evento, tente novamente.</strong>', 'warning');
                            }
                        }


                        $readExpo = read('guia_feiraeventos', "WHERE id_feiraevento = '$_id'");
                        foreach ($readExpo as $expo) :
                            $forma_pagamento    = explode(',', $expo['pag_feiraevento']);
                            $datasExpo          = $expo['data_feiraevento'];
                            $datasExpo          = explode(',', $datasExpo);
                            $countDatas         = count($datasExpo);
                        ?>

                        <form name="addExpo" method="post" action="" enctype="multipart/form-data">
                            <div class="span11">
                                <label class="titulo-separator">Básico</label>
                            </div>

                            <div class="span11">
                                <label><strong>Imagem atual:</strong></label>
                                <img src="../uploads/logos/<?php echo $expo['logo_feiraevento']; ?>" width="200" />
                            </div>

                            <div class="span11">
                                <p></p>
                                <input type="file" name="logo" title="Selecione a logo da Evento" />
                            </div>

                            <div class="span11">
                                <p></p>
                                <label><strong>Nome:</strong></label>
                                <input type="text" name="nome" value="<?php echo $expo['nome_feiraevento']; ?>" class="input-block-level" placeholder="Nome da Evento" />
                            </div>

                            <div class="span11">
                                <label><strong>Descrição:</strong></label>
                                <textarea name="descricao" class="input-block-level" placeholder="Descrição da Evento"><?php echo $expo['desc_feiraevento']; ?></textarea>
                            </div>

                            <div class="span11">
                                <label><strong>Extras:</strong></label>
                                <textarea name="extras" class="input-block-level" placeholder="Extras, Estacionamentos, segurança..."><?php echo $expo['extra_feiraevento']; ?></textarea>
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Formas de pagamento</label>
                            </div>

                            <div class="span11">
                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="pagamento[]" value="visa" <?php if (in_array('visa', $forma_pagamento)) { echo 'checked'; } ?>> Visa
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="pagamento[]" value="master" <?php if (in_array('master', $forma_pagamento)) { echo 'checked'; } ?>> Master
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="pagamento[]" value="hiper" <?php if (in_array('hiper', $forma_pagamento)) { echo 'checked'; } ?>> HiperCard
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="pagamento[]" value="boleto" <?php if (in_array('boleto', $forma_pagamento)) { echo 'checked'; } ?>> Boleto bancário
                                </label>
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Contato</label>
                            </div>

                            <div class="span5">
                                <label><strong>Telefone:</strong></label>
                                <input type="text" name="telefone" value="<?php echo $expo['fone_feiraevento']; ?>" class="input-block-level" placeholder="Telefone do cinema" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Email:</strong></label>
                                <input type="text" name="email" value="<?php echo $expo['email_feiraevento']; ?>" class="input-block-level" placeholder="Email do cinema" />
                            </div>

                            <div class="span5">
                                <label><strong>Site:</strong></label>
                                <input type="text" name="site" value="<?php echo $expo['site_feiraevento']; ?>" class="input-block-level" placeholder="Site do cinema" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Twitter:</strong></label>
                                <input class="input-block-level" value="<?php echo $expo['twitter_feiraevento']; ?>" name="twitter" type="text" placeholder="http://twitter.com/seunome" />
                            </div>

                            <div class="span5">
                                <label><strong>Facebook:</strong></label>
                                <input class="input-block-level" value="<?php echo $expo['facebook_feiraevento']; ?>" name="facebook" type="text" placeholder="http://facebook.com/seunome" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Youtube:</strong></label>
                                <input class="input-block-level" value="<?php echo $expo['youtube_feiraevento']; ?>" name="youtube" type="text" placeholder="http://youtube.com/seunome" />
                            </div>

                            <div class="span5">
                                <label><strong>Instagram:</strong></label>
                                <input class="input-block-level" value="<?php echo $expo['insta_feiraevento']; ?>" name="instagram" type="text" placeholder="http://instagram.com/seunome" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Flickr:</strong></label>
                                <input class="input-block-level" value="<?php echo $expo['flickr_feiraevento']; ?>" name="flickr" type="text" placeholder="http://flickr.com/seunome" />
                            </div>

                            <div class="span5">
                                <label><strong>Google +:</strong></label>
                                <input class="input-block-level" value="<?php echo $expo['googleplus_feiraevento']; ?>" name="googleplus" type="text" placeholder="http://googleplus.com/seunome" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Orkut:</strong></label>
                                <input class="input-block-level" value="<?php echo $expo['orkut_feiraevento']; ?>" name="orkut" type="text" placeholder="http://orkut.com/seunome" />
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Valores</label>
                            </div>

                            <div class="span3">
                                <label><strong>Titulo do preço:</strong></label>
                                <input class="input-block-level" id="" value="<?php echo $expo['titulo_preco_um']; ?>" name="titulo_preco_um" type="text" >
                            </div>

                            <div class="span3 offset1">
                                <label><strong>Titulo do preço:</strong></label>
                                <input class="input-block-level" id="" value="<?php echo $expo['titulo_preco_dois']; ?>" name="titulo_preco_dois" type="text" >
                            </div>

                            <div class="span3 offset1">
                                <label><strong>Titulo do preço:</strong></label>
                                <input class="input-block-level" id="" value="<?php echo $expo['titulo_preco_tres']; ?>" name="titulo_preco_tres" type="text" >
                            </div>

                            <div class="span3">
                                <label><strong>Valor:</strong></label>
                                <input class="input-block-level" id="" value="<?php echo $expo['val_preco_um']; ?>" name="valor_preco_um" type="text" >
                            </div>

                            <div class="span3 offset1">
                                <label><strong>Valor:</strong></label>
                                <input class="input-block-level" id="" value="<?php echo $expo['val_preco_dois']; ?>" name="valor_preco_dois" type="text" >
                            </div>

                            <div class="span3 offset1">
                                <label><strong>Valor:</strong></label>
                                <input class="input-block-level" id="" value="<?php echo $expo['val_preco_dois']; ?>" name="valor_preco_dois" type="text" >
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Datas</label>
                            </div>

                            <div class="span11">
                                <br>
                                <a href="#" class="addItem btn btn-success"><i class="icon-plus"></i>Adicionar data</a>
                            </div>

                            <?php for ($i = 0; $i < $countDatas; $i++) { ?>
                            <div class="clone span11">
                                <div class="span6">
                                    <label><strong>Data:</strong></label>
                                    <input name="datas[]" type="text" value="<?php echo $datasExpo[$i]; ?>" placeholder="Ex: 00/00/0000" class="input-block-level" />
                                </div>
                                <div class="span10"><a href="#" class="removeItem btn btn-danger pull-right"><i class="icon-remove"></i> Deletar data</a></div>
                            </div><!-- clone -->
                            <?php } ?>

                            <div class="span11">
                                <input type="submit" name="sendExpo" value="Atualizar Evento" class="btn btn-success pull-right" />
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
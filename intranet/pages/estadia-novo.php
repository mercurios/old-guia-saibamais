<div class="span12">
    <div class="row">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <h3>Novo estadia</h3>
                </div><!-- /widget-header -->

                <div class="widget-content">
                    <?php
                    if (isset($_POST['sendCliente'])) {

                        $_logo              = $_FILES['logo'];
                        $_nome              = $_POST['nome'];
                        $_slug              = geraUrl($_nome);
                        $_desc              = $_POST['descricao'];
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
                                "fone_estadia"    => $_foneAtendimento,
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
                            $save = create('guia_estadias', $dados);

                            // Verifica se foi gravado com sucesso
                            if ($save) {
                                message('<strong>Estadia adicionado com sucesso.</strong>', 'success');
                                salvaLog("Adicionou uma estadia.", $_SESSION['autUser']['nome_user']);
                            }
                            else {
                                message('<strong>Erro ao cadastrar estadia, tente novamente.</strong>', 'warning');
                            }
                        }
                    }
                    ?>

                	<form name="cadCliente" method="post" action="" enctype="multipart/form-data">
                        <fieldset>
                        	<div class="span11">
                                <label class="titulo-separator">Informações</label>
                            </div>

                            <div class="span3">
                                <label><strong>Logo do estadia:</strong></label>
                                <input type="file" title="Selecione a logo do estadia até 2mb" name="logo" class="" id="logo" />
                            </div><!-- / logo-->

                            <div class="span8">
                                <label for="nome"><small class="red">*</small> <strong>Nome do estabelecimento:</strong></label>
                                <input type="text" name="nome" id="nome" value="" class="span8" placeholder="Informe o nome do estabelecimento" />
                            </div><!-- / Nome-->

                            <div class="span11">
                                <label><strong>Descrição:</strong></label>
                                <textarea class="span11 limit" name="descricao" placeholder="Fale um pouco sobre o estabelecimento"></textarea>
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Informações extras</label>
                            </div>
                            <div class="span11">
                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="infoExtras[]" value="wifi" > <strong>Wifi</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="infoExtras[]" value="estacionamento" > <strong>Estacionamento</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="infoExtras[]" value="lutas-ao-vivo" > <strong>Lutas ao vivo</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="infoExtras[]" value="jogos-ao-vivo" > <strong>Jogos ao vivo</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="infoExtras[]" value="shows-ao-vivo" > <strong>Shows ao vivo</strong>
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
                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="albergue"> Albergue
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="chale"> Chalé
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="hotel"> Hotel
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="pousada"> Pousada
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="prive"> Privê
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="resort"> Resort
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porTipo[]" value="outros"> Outros
                                </label>
                            </div><!-- /span11 -->

                            <div class="span11">
                                <div>&nbsp</div>
                                <label><strong>Por localidade:</strong></label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="campo"> Campo
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="cidade"> Cidade
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="mata"> Mata
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="maritimo"> Marítimo
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="praia"> Praia
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porLocalidade[]" value="outros"> Outros
                                </label>
                            </div><!-- /span11 -->

                            <div class="span11">
                                <div>&nbsp</div>
                                <label><strong>Por classificação</strong></label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoClassificacao[]" value="tresestrelas"> 3 Estrelas
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoClassificacao[]" value="quatroestrelas"> 4 Estrelas
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoClassificacao[]" value="cincoestrelas"> 5 Estrelas
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoClassificacao[]" value="seisestrelas"> 6 Estrelas
                                </label>

                            </div><!-- /span11 -->
                        </fieldset>

                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Localidade</label>
                            </div>

                            <div class="span5">
                                <label><strong>Rua:</strong></label>
                                <input id="rua" name="rua" class="input-block-level" type="text" placeholder="Nome da Rua / Logradouro" />
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
                                <input id="longitude" name="longitude" class="input-block-level" type="text" placeholder="Informe a Longitude" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Latitude:</strong></label>
                                <input id="latitude" name="latitude" class="input-block-level" type="text" placeholder="Informe a Latitude" />
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Contato</label>
                            </div>

                            <div class="span11">
                                <label><strong>Atendimento:</strong></label>
                                <input name="foneAtendimento" class="input-block-level" name="googleplus" type="text" placeholder="">
                            </div>

                            <div class="span11">
                                <label><strong>E-mail:</strong></label>
                                <input name="email" class="input-block-level" name="googleplus" type="text" placeholder="">
                            </div>

                            <div class="span11">
                                <label><strong>Site:</strong></label>
                                <input name="site" class="input-block-level" name="googleplus" type="text">
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Redes Sociais</label>
                            </div>

                            <div class="span11">
                                <label><strong>Twitter:</strong></label>
                                <input class="input-block-level" name="twitter" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Facebook:</strong></label>
                                <input class="input-block-level" name="facebook" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Youtube:</strong></label>
                                <input class="input-block-level" name="youtube" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Instagram:</strong></label>
                                <input class="input-block-level" name="instagram" type="text">
                            </div>

                            <div class="span11">
                                <label><strong>Flickr:</strong></label>
                                <input class="input-block-level" name="flickr" type="text">
                            </div>

                            <div class="span11">
                                <label>Google +:</label>
                                <input class="input-block-level" name="googleplus" type="text">
                            </div>

                            <div class="span11">
                                <label>Orkut:</label>
                                <input class="input-block-level" name="orkut" type="text">
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="span11">
                                <label class="titulo-separator">Adaptado</label>
                            </div>

                            <div class="span11">
                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="cego" > <strong>Cego</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="surdo" > <strong>Surdo</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="deficientefisico" > <strong>Deficiente fisico</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="braile" > <strong>Braile</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="obeso" > <strong>Obeso</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="idoso" > <strong>Idoso</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="gestante" > <strong>Gestante</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="bebe" > <strong>Bêbe</strong>
                            </div>
                        </fieldset>

                        <div class="span11">
                            <input type="submit" class="btn btn-success pull-right" name="sendCliente" value="Cadastrar" />
                        </div><!-- / -->
                    </form><!-- /form -->
                </div><!-- /widget-content -->
            </div><!-- /widget -->
        </div><!-- /span12 -->
    </div><!-- /row -->
</div><!-- /span12 -->
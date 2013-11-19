<div class="span12">
    <div class="row">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <h3>Nova bebida</h3>
                </div><!-- /widget-header -->

                <div class="widget-content">
                    <?php
                    if (isset($_POST['sendCliente'])) {

                        $_logo              = $_FILES['logo'];
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
                            $save = create('guia_bebidas', $dados);

                            // Verifica se foi gravado com sucesso
                            if ($save) {
                                message('<strong>bebida adicionada com sucesso.</strong>', 'success');
                                salvaLog('Adicionou um cliente na categoria Bebidas.', $_SESSION['autUser']['nome_user']);
                            }
                            else {
                                message('<strong>Erro ao cadastrar bebida, tente novamente.</strong>', 'warning');
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
                                <label><strong>Logo do bebida:</strong></label>
                                <input type="file" title="Selecione a logo do bebida até 2mb" name="logo" class="" id="logo" />
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
                                <label class="titulo-separator">Formas de pagamento</label>
                            </div>
                            <div class="span11">
                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="dinheiro"> <strong>Dinheiro</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="visa" > <strong>Visa</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="master" > <strong>Master</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="hiper" > <strong>Hiper</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="diners" > <strong>Diners Club</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="elo" > <strong>Elo</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="credcard" > <strong>Credcard</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="visaelectro" > <strong>Visa Electro</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="paggo" > <strong>Paggo</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="redeshop" > <strong>Redeshop</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="vr" > <strong>Vale Refeição</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="aura" > <strong>Aura</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="toppremium"> <strong>Top Premium</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="sodexo" > <strong>Sodexo</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="formaPagamento[]" value="sodexopass" > <strong>Sodexo Pass</strong>
                                </label>
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
                                <label><strong>Por local:</strong></label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLocal[]" value="bares"> Bar
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLocal[]" value="botecos"> Boteco
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLocal[]" value="cafeterias"> Cafeteria
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLocal[]" value="lanchonetes"> Lanchonete
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoLocal[]" value="restaurante"> Restaurante
                                </label>
                            </div><!-- /span11 -->

                            <div class="span11">
                                <div>&nbsp</div>
                                <label><strong>Tipo de bebidas</strong></label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="batidas"> Batidas
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="caipirinhas"> Caipirinha
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="cachacas"> Cachaça
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="cafes"> Café
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="cervejas"> Cerveja
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="chopps"> Chopp
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="energeticas"> Energético
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="licor"> Licor
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="milk-shake"> Milk-shake
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="refrigerantes"> Refrigerante
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="sucos"> Suco
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="tequilas"> Tequila
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="vinhos"> Vinho
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="tipoBebida[]" value="whisky"> Whisky
                                </label>
                            </div><!-- /span11 -->

                            <div class="span11">
                                <div>&nbsp</div>
                                <label><strong>Por extras:</strong></label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porExtras[]" value="musicas-ao-vivo"> Música ao vivo
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porExtras[]" value="jogos-ao-vivo"> Jogos ao vivo
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porExtras[]" value="lutas-transmitidas"> Lutas ao vivo
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="porExtras[]" value="open-bar"> Open Bar
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
                                <label><strong>Disk-Entrega:</strong></label>
                                <input name="foneDiskEntrega" class="input-block-level" name="googleplus" type="text" placeholder="">
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
                                            <td><input class="input-block-level" name="h_dom" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Segunda:</strong></td>
                                            <td><input class="input-block-level" name="h_seg" type="text" placeholder="Não funcionamos" maxlength="31"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Terça:</strong></td>
                                            <td><input class="input-block-level" name="h_ter" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Quarta:</strong></td>
                                            <td><input class="input-block-level" name="h_qua" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Quinta:</strong></td>
                                            <td><input class="input-block-level" name="h_qui" type="text" placeholder="18:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Sexta:</strong></td>
                                            <td><input class="input-block-level" name="h_sex" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Sábado:</strong></td>
                                            <td><input class="input-block-level" name="h_sab" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                        </tr>
                                    </tbody>
                                </table>
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
    <div class="span12">
        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Nova exposição</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">

                        <?php  

                        if (isset($_POST['sendExpo'])) {

                            $_logo              = $_FILES['logo'];
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
                                    "logo_exposicao"        => $_newLogo,
                                    "nome_exposicao"        => $_nome,
                                    "desc_exposicao"        => $_desc,
                                    "extra_exposicao"       => $_extra,
                                    "pag_exposicao"         => $_pagamento,
                                    "fone_exposicao"        => $_fone,
                                    "email_exposicao"       => $_email,
                                    "site_exposicao"        => $_site,
                                    "twitter_exposicao"     => $_twitter,
                                    "facebook_exposicao"    => $_facebook,
                                    "youtube_exposicao"     => $_youtube,
                                    "insta_exposicao"       => $_insta,
                                    "flickr_exposicao"      => $_flickr,
                                    "googleplus_exposicao"  => $_google,
                                    "orkut_exposicao"       => $_orkut,
                                    "titulo_preco_um"       => $_titulo_preco_um,
                                    "titulo_preco_dois"     => $_titulo_preco_dois,
                                    "titulo_preco_tres"     => $_titulo_preco_tres,
                                    "val_preco_um"          => $_valor_preco_um,
                                    "val_preco_dois"        => $_valor_preco_dois,
                                    "val_preco_tres"        => $_valor_preco_tres,
                                    "data_exposicao"        => $_datas
                                );

                                $save = create('guia_exposicoes', $dados);

                                if ($save) {
                                    message('Exposição cadastrada com sucesso.', 'success');
                                    salvaLog("Cadastrou uma exposição.", $_SESSION['autUser']['nome_user']);
                                }
                                else {
                                    message('Erro ao cadastrar exposição.', 'warning');
                                }
                            }
                        }
                        ?>

                    	<form name="addExpo" method="post" action="" enctype="multipart/form-data">
							<div class="span11">
								<label class="titulo-separator">Básico</label>
							</div>

							<div class="span11">
								<input type="file" name="logo" title="Selecione a logo da exposição" />
							</div>

							<div class="span11">
                				<p></p>
                				<label><strong>Nome:</strong></label>
                				<input type="text" name="nome" value="" class="input-block-level" placeholder="Nome da exposição" />
                			</div>

                			<div class="span11">
                				<label><strong>Descrição:</strong></label>
                				<textarea name="descricao" class="input-block-level" placeholder="Descrição da exposição"></textarea>
                			</div>

                            <div class="span11">
                                <label><strong>Extras:</strong></label>
                                <textarea name="extras" class="input-block-level" placeholder="Extras, Estacionamentos, segurança..."></textarea>
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Formas de pagamento</label>
                            </div>

                            <div class="span11">
                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="pagamento[]" value="visa"> Visa
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="pagamento[]" value="master"> Master
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="pagamento[]" value="hiper"> HiperCard
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="pagamento[]" value="boleto"> Boleto bancário
                                </label>
                            </div>

                			<div class="span11">
                            	<label class="titulo-separator">Contato</label>
                            </div>

                			<div class="span5">
                				<label><strong>Telefone:</strong></label>
                				<input type="text" name="telefone" value="" class="input-block-level" placeholder="Telefone do cinema" />
                			</div>

                			<div class="span5 offset1">
                				<label><strong>Email:</strong></label>
                				<input type="text" name="email" value="" class="input-block-level" placeholder="Email do cinema" />
                			</div>

                			<div class="span5">
                				<label><strong>Site:</strong></label>
                				<input type="text" name="site" value="" class="input-block-level" placeholder="Site do cinema" />
                			</div>

                			<div class="span5 offset1">
                                <label><strong>Twitter:</strong></label>
                                <input class="input-block-level" name="twitter" type="text" placeholder="http://twitter.com/seunome" />
                            </div>

                            <div class="span5">
                                <label><strong>Facebook:</strong></label>
                                <input class="input-block-level" name="facebook" type="text" placeholder="http://facebook.com/seunome" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Youtube:</strong></label>
                                <input class="input-block-level" name="youtube" type="text" placeholder="http://youtube.com/seunome" />
                            </div>

                            <div class="span5">
                                <label><strong>Instagram:</strong></label>
                                <input class="input-block-level" name="instagram" type="text" placeholder="http://instagram.com/seunome" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Flickr:</strong></label>
                                <input class="input-block-level" name="flickr" type="text" placeholder="http://flickr.com/seunome" />
                            </div>

                            <div class="span5">
                                <label><strong>Google +:</strong></label>
                                <input class="input-block-level" name="googleplus" type="text" placeholder="http://googleplus.com/seunome" />
                            </div>

                            <div class="span5 offset1">
                                <label><strong>Orkut:</strong></label>
                                <input class="input-block-level" name="orkut" type="text" placeholder="http://orkut.com/seunome" />
                            </div>

                            <div class="span11">
                            	<label class="titulo-separator">Valores</label>
                            </div>

                            <div class="span3">
                                <label><strong>Titulo do preço:</strong></label>
                                <input class="input-block-level" id="" name="titulo_preco_um" type="text" >
                            </div>

                            <div class="span3 offset1">
                                <label><strong>Titulo do preço:</strong></label>
                                <input class="input-block-level" id="" name="titulo_preco_dois" type="text" >
                            </div>

                            <div class="span3 offset1">
                                <label><strong>Titulo do preço:</strong></label>
                                <input class="input-block-level" id="" name="titulo_preco_tres" type="text" >
                            </div>

                            <div class="span3">
                                <label><strong>Valor:</strong></label>
                                <input class="input-block-level" id="" name="valor_preco_um" type="text" >
                            </div>

                            <div class="span3 offset1">
                                <label><strong>Valor:</strong></label>
                                <input class="input-block-level" id="" name="valor_preco_dois" type="text" >
                            </div>

                            <div class="span3 offset1">
                                <label><strong>Valor:</strong></label>
                                <input class="input-block-level" id="" name="valor_preco_tres" type="text" >
                            </div>

                            <div class="span11">
                            	<label class="titulo-separator">Datas</label>
                            </div>

                            <div class="span11">
								<br>
								<a href="#" class="addItem btn btn-success"><i class="icon-plus"></i>Adicionar data</a>
							</div>

							<div class="clone span11">

								<div class="span6">
									<label><strong>Data:</strong></label>
									<input name="datas[]" type="text" placeholder="Ex: 00/00/0000" class="input-block-level" />
								</div>
							</div><!-- clone -->

							<div class="span11">
                            	<input type="submit" name="sendExpo" value="Cadastrar exposição" class="btn btn-success pull-right" />
                            </div>
                    	</form>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
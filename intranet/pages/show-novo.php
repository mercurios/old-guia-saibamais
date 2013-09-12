    <div class="span12">
        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Novo show</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                        <?php  

                        if (isset($_POST['sendShow'])) {

                            $_logo       = $_FILES['logo'];
                            $_nome       = $_POST['nome'];
                            $_desc       = $_POST['descricao'];
                            $_extra      = $_POST['extras'];
                            $_pagamento  = $_POST['pagamento'];
                            $_pagamento  = implode(',', $_pagamento);
                            $_fone       = $_POST['telefone'];
                            $_email      = $_POST['email'];
                            $_site       = $_POST['site'];
                            $_twitter    = $_POST['twitter'];
                            $_facebook   = $_POST['facebook'];
                            $_youtube    = $_POST['youtube'];
                            $_insta      = $_POST['instagram'];
                            $_flickr     = $_POST['flickr'];
                            $_googleplus = $_POST['googleplus'];
                            $_orkut      = $_POST['orkut'];

                            // Só permite imagens
                            $tipos = array('jpg', 'png', 'jpeg');

                            // Cria nome único para a imagem
                            $nome_imagem = md5(uniqid(time()));

                            // Faz o uploads
                            $verifica = upload_imagem($_logo, '../uploads/logos/', $tipos, $nome_imagem);

                            // Verifica se existe erros
                            if ($verifica['erro']) {
                                echo $verifica['erro'];
                            }
                            else{

                                $_newLogo = $verifica['nameimg'];

                                $dados = array(
                                    "logo_show"         => $_newLogo,
                                    "nome_show"         => $_nome,
                                    "desc_show"         => $_desc,
                                    "extra_show"        => $_extra,
                                    "pag_show"          => $_pagamento,
                                    "fone_show"         => $_fone,
                                    "email_show"        => $_email,
                                    "site_show"         => $_site,
                                    "twitter_show"      => $_twitter,
                                    "facebook_show"     => $_facebook,
                                    "youtube_show"      => $_youtube,
                                    "insta_show"        => $_insta,
                                    "googleplus_show"   => $_googleplus,
                                    "orkut_show"        => $_orkut
                                );

                                $save = create('guia_shows', $dados);

                                if ($save) {
                                    message('Show cadastrado com sucesso.', 'success');
                                }
                                else {
                                    message('Erro ao cadastrar show.', 'warning');    
                                }
                            }
                        }

                        ?>

                    	<form name="newShow" method="post" action="" enctype="multipart/form-data">
                    		<fieldset>
                    			<div class="span11">
									<input type="file" name="logo" title="Selecione a foto do show" />
								</div>

                    			<div class="span11">
                    				<br>
                    				<label><strong>Nome:</strong></label>
                    				<input type="text" name="nome" value="" class="input-block-level" placeholder="Nome do show" />
                    			</div>

                    			<div class="span11">
                    				<label><strong>Descrição:</strong></label>
                    				<textarea name="descricao" class="input-block-level" placeholder="Breve descrição sobre o show"></textarea>
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
                    				<input type="text" name="telefone" value="" class="input-block-level" placeholder="Telefone do show" />
                    			</div>

                    			<div class="span5 offset1">
                    				<label><strong>Email:</strong></label>
                    				<input type="text" name="email" value="" class="input-block-level" placeholder="Email do show" />
                    			</div>

                    			<div class="span5">
                    				<label><strong>Site:</strong></label>
                    				<input type="text" name="site" value="" class="input-block-level" placeholder="Site do show" />
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
	                            	<input type="submit" name="sendShow" value="Cadastrar show" class="btn btn-success pull-right" />
	                            </div>

                    		</fieldset>
                    	</form>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
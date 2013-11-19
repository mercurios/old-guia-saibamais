    <div class="span12">
        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Matérias sobre <?php echo ($_GET['categoria'] == 'passeiolazer') ? 'passeio e lazer' : $_GET['categoria']; ?></h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                        <?php
                        $_categoria = $_GET['categoria'];

                        // Se não existir a categoria informada, redireciona
                        if (empty($_categoria)) {
                            header('Location: painel.php');
                        }

                        if (isset($_POST['sendMateria'])) {

                            $_logo   = $_FILES['img'];
                            $_titulo = $_POST['titulo'];
                            $_link   = $_POST['link'];
                            $_posi   = $_POST['posicao'];
                            $_desc   = $_POST['descricao'];

                            // Verifica se foi selecionado alguma imagem
                             if ($_logo['name'] != '') {

                                // Só permite imagens
                                $tipos = array('jpg', 'png', 'jpeg');

                                // Cria nome único para a imagem
                                $nome_imagem = md5(uniqid(time()));

                                // Faz o uploads
                                $verifica = upload_imagem($_logo, '../uploads/chamadas/', $tipos, $nome_imagem);

                                // Verifica se existe erros
                                if ($verifica['erro']){
                                    echo $verifica['erro'];
                                }
                                else {
                                    $_newLogo = $verifica['nameimg'];
                                }
                            }
                            else {
                                $_newLogo = '';
                            }

                            $dados = array(
                                "titulo_chamada"    => $_titulo,
                                "img_chamada"       => $_newLogo,
                                "link_chamada"      => $_link,
                                "pos_chamada"       => $_posi,
                                "desc_chamada"      => $_desc,
                                "categoria_chamada" => $_categoria
                            );

                            $save = create('guia_chamadas', $dados);

                            if ($save) {
                                message('<strong>Chamada adicionada com sucesso.</strong>', 'success');
                            }
                            else {
                                message('<strong>Erro ao cadastrar chamada, tente novamente.</strong>', 'warning');
                            }
                        }
                        ?>

                    	<!-- Form add new matéria -->
                    	<form name="cadMateria" method="post" action="" enctype="multipart/form-data">
                    		<fieldset>
                    			<div class="span11">
                    				<input type="file" name="img" title="Seleciona a imagem da matéria" />
                    			</div>

                    			<div class="span11">
                    				<br />
                    				<label><strong>Titulo:</strong></label>
                    				<input type="text" name="titulo" placeholder="Titulo da matéria" class="input-block-level" />
                    			</div>

                                <div class="span11">
                                    <label><strong>Posição da chamada:</strong></label>
                                    <select name="posicao">
                                        <option value="slider">Slider</option>
                                        <option value="pequena">Pequena</option>
                                        <option value="media">Média</option>
                                    </select>
                                </div>

                    			<div class="span11">
                    				<label><strong>Link:</strong></label>
                    				<input type="text" name="link" placeholder="Link do estabeleciento" class="input-block-level" />
                    			</div>

                    			<div class="span11">
                    				<label><strong>Descrição:</strong></label>
                    				<textarea name="descricao" placeholder="Descrição da matéria" class="input-block-level editorTiny"></textarea>
                    			</div>

                    			<div class="span11">
                    				<br>
                    				<input type="submit" name="sendMateria" class="btn btn-success pull-right" value="Cadastrar" />
                    			</div>
                    		</fieldset>
                    	</form>
                    	<!-- /form -->
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Matérias sobre <?php echo ($_GET['categoria'] == 'passeiolazer') ? 'passeio e lazer' : $_GET['categoria']; ?></h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                        <?php  

                        $_id        = $_GET['id'];
                        $_categoria = $_GET['categoria'];

                        if (empty($_id) || empty($_categoria)) {
                            header('Location: painel.php');
                        }

                        if (isset($_POST['sendMateria'])) {
                            $readChamadas = read('guia_chamadas', "WHERE id_chamada = '$_id'");

                            $_logo   = $_FILES['img'];

                            if ($_logo['name'] != '') {

                                $_logo = $_FILES['img'];

                                // Cria nome único para a imagem
                                $nome_imagem = md5(uniqid(time()));

                                // Só permite imagens
                                $tipos = array('jpg', 'png', 'jpeg');

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
                                $_newLogo = $readChamadas[0]['img_chamada'];
                            }

                            $_titulo = $_POST['titulo'];
                            $_link   = $_POST['link'];
                            $_posi   = $_POST['posicao'];
                            $_desc   = $_POST['descricao'];

                            $dados = array(
                                "titulo_chamada"    => $_titulo,
                                "img_chamada"       => $_newLogo,
                                "link_chamada"      => $_link,
                                "pos_chamada"       => $_posi,
                                "desc_chamada"      => $_desc,
                                "categoria_chamada" => $_categoria
                            );

                            // Grava no banco
                            $update = update('guia_chamadas', $dados, "id_chamada = '$_id'");

                            // Verifica se foi gravado com sucesso
                            if ($update) {
                                message('<strong>Chamada atualizada com sucesso.</strong>', 'success');
                            }
                            else {
                                message('<strong>Erro ao atualizar chamada, tente novamente.</strong>', 'warning');
                            }
                        }

                        $readChamadas = read('guia_chamadas', "WHERE id_chamada = '$_id'");

                        if (isset($readChamadas)) {
                            foreach ($readChamadas as $chamada) :
                        ?>

                    	<!-- Form add new matéria -->
                        <form name="cadMateria" method="post" action="" enctype="multipart/form-data">
                            <fieldset>
                                <div class="span11">
                                    <label><strong>Imagem atual:</strong></label>
                                    <img src="../uploads/chamadas/<?php echo $chamada['img_chamada']; ?>" width="200" title="">
                                </div>

                                <div class="span11">
                                    <p></p>
                                    <input type="file" name="img" title="Seleciona a imagem da matéria" />
                                </div>

                                <div class="span11">
                                    <br />
                                    <label><strong>Titulo:</strong></label>
                                    <input type="text" name="titulo" value="<?php echo $chamada['titulo_chamada']; ?>" placeholder="Titulo da matéria" class="input-block-level" />
                                </div>

                                <div class="span11">
                                    <label><strong>Posição da chamada:</strong></label>
                                    <select name="posicao">
                                        <option value="slider" <?php echo ($chamada['pos_chamada'] == 'slider' ? 'selected' : '') ?>>Slider</option>
                                        <option value="pequena" <?php echo ($chamada['pos_chamada'] == 'pequena' ? 'selected' : '') ?>>Pequena</option>
                                        <option value="media" <?php echo ($chamada['pos_chamada'] == 'media' ? 'selected' : '') ?>>Média</option>
                                    </select>
                                </div>

                                <div class="span11">
                                    <label><strong>Link:</strong></label>
                                    <input type="text" name="link" value="<?php echo $chamada['link_chamada']; ?>" placeholder="Link do estabeleciento" class="input-block-level" />
                                </div>

                                <div class="span11">
                                    <label><strong>Descrição:</strong></label>
                                    <textarea name="descricao" placeholder="Descrição da matéria" class="input-block-level editorTiny"><?php echo $chamada['desc_chamada']; ?></textarea>
                                </div>

                                <div class="span11">
                                    <br>
                                    <input type="submit" name="sendMateria" class="btn btn-success pull-right" value="Atualizar" />
                                </div>
                            </fieldset>
                        </form>
                        <!-- /form -->
                        <?php
                            endforeach;
                        }
                        else {
                            message('<strong>Não foi encontrado nenhuma chamada com essas informações.</strong>', 'warning');
                        }
                        ?>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
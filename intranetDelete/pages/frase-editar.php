    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Editar frase</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                        <?php
                        $_id = $_GET['id'];

                        if (isset($_POST['sendFrase'])) {

                            $_titulo = $_POST['titulo'];
                            $_autor  = $_POST['autor'];
                            $_texto  = $_POST['texto'];

                            $dados = array(
                                "titulo_frase" => $_titulo,
                                "autor_frase" => $_autor,
                                "texto_frase" => $_texto
                            );

                            $update = update('guia_frases', $dados, "id_frase = '$_id'");

                            // Verifica se foi gravado com sucesso
                            if ($update) {
                                message('<strong>Frase atualizada com sucesso.</strong>', 'success');
                            }
                            else {
                                message('<strong>Erro ao atualizar frase, tente novamente.</strong>', 'warning');
                            }
                        }

                        $readFrase = read('guia_frases', "WHERE id_frase = '$_id'");
                        foreach ($readFrase as $frase) : 
                        ?>

                    	<!-- Form add new matéria -->
                        <form name="" method="post" action="" enctype="multipart/form-data">
                            <fieldset>
                                <div class="span11">
                                    <label><strong>Titulo:</strong></label>
                                    <input type="text" name="titulo" value="<?php echo $frase['titulo_frase']; ?>" placeholder="Titulo da frase" class="input-block-level" />
                                </div>

                                <div class="span11">
                                    <label><strong>Autor:</strong></label>
                                    <input type="text" name="autor" value="<?php echo $frase['autor_frase']; ?>" placeholder="Autor" class="input-block-level" />
                                </div>

                                <div class="span11">
                                    <label><strong>Texto:</strong></label>
                                    <textarea name="texto" placeholder="" class="input-block-level editorTiny"><?php echo $frase['texto_frase']; ?></textarea>
                                </div>

                                <div class="span11">
                                    <p></p>
                                    <input type="submit" name="sendFrase" class="btn btn-success pull-right" value="Atualizar" />
                                </div>
                            </fieldset>
                        </form>
                        <!-- /form -->
                        <?php endforeach; ?>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
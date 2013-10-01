    <div class="span12">
        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Enviar foto</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                        <?php  
                        $_cliente   = $_GET['cliente'];
                        $_categoria = $_GET['categoria'];

                        if (empty($_cliente) || empty($_categoria)) {
                            header('Location: painel.php');
                        }

                        if (isset($_POST['sendFoto'])) {

                            // Pega a imagem
                            $_foto = $_FILES['foto'];

                            // Tipos de extenção permitido
                            $tipos = array('jpg', 'png', 'jpeg');

                            // Cria nome único para a imagem
                            $nome_imagem = md5(uniqid(time()));

                            // Faz o uploads
                            $verifica = upload_imagem($_foto, '../uploads/fotos/', $tipos, $nome_imagem);

                            // Verifica se existe erros
                            if ($verifica['erro']){
                                echo $verifica['erro'];
                            }
                            else {

                                $_titulo  = $_POST['titulo'];
                                $_newLogo = $verifica['nameimg'];

                                $dados = array(
                                    "titulo_foto"    => $_titulo,
                                    "img_foto"       => $_newLogo,
                                    "categoria_foto" => $_categoria,
                                    "id_cliente"     => $_cliente
                                );

                                $save = create('guia_fotos', $dados);

                                if ($save) {
                                    message('Foto enviada com sucesso.', 'success');
                                }
                                else {
                                    message('Erro ao enviar, tente novamente.', 'warning');
                                }
                            }
                        }
                        ?>

                    	<form name="newFoto" method="post" action="" enctype="multipart/form-data">
                            <div class="span11">
                                <label><strong>Foto:</strong></label>
                                <input type="file" title="Selecione uma foto de até 2mb" name="foto" class="" id="foto" />
                            </div><!-- / foto-->

                            <div class="span11">
                                <br>
                                <label><strong>Titulo da foto:</strong></label>
                                <input type="text" name="titulo" class="input-block-level" placeholder="Titulo para a foto" />
                            </div><!-- / foto-->

                            <div class="span11">
                                <input type="submit" name="sendFoto" class="btn btn-success pull-right" value="Enviar foto" />
                            </div><!-- / foto-->
                        </form>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
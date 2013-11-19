    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Nova promoção</h3>
                        <?php formatarDataBanco('17/07/1990'); ?>
                    </div><!-- /widget-header -->

                    <div class="widget-content">

                        <?php

                        $_categoria = $_GET['categoria'];
                        $_idcliente = $_GET['idcliente'];

                        if (empty($_idcliente) || empty($_categoria)) {
                            header('Location: painel.php');
                        }

                        if (isset($_POST['sedPromocao'])) {

                            $_titulo    = $_POST['titulo'];
                            $_descri    = $_POST['descricao'];
                            $_dataini   = formatarDataBanco($_POST['datainicio']);
                            $_datafim   = formatarDataBanco($_POST['datafim']);
                            $_diasemana = $_POST['diasemana'];

                            if (isset($_diasemana)) {
                                $_diasemana = implode(',', $_diasemana);
                                $_dataini   = '00/00/0000 00:00:00';
                                $_datafim   = '00/00/0000 00:00:00';
                            }

                            $dados = array(
                                "titulo_promocao"    => $_titulo,
                                "desc_promocao"      => $_descri,
                                "categoria_promocao" => $_categoria,
                                "id_cliente"         => $_idcliente,
                                "data_inicio"        => $_dataini,
                                "data_final"         => $_datafim,
                                "dia_semana"         => $_diasemana
                            );

                            $save = create('guia_promocoes', $dados);

                            if ($save) {
                                message('Promoção cadastrada com sucesso', 'success');
                            }
                            else {
                                message('Erro ao cadastrar promoção', 'warning');
                            }
                        }
                        ?>


                        <form name="cadPromocao" method="post" action="">
                            <div class="span11">
                                <label><strong>Titulo:</strong></label>
                                <input type="text" name="titulo" value="" class="input-block-level" placeholder="Informe o título da promoção" />
                            </div>

                            <div class="span11">
                                <label><strong>Descrição:</strong></label>
                                <textarea name="descricao" class="input-block-level editorTiny"></textarea>
                            </div>

                            <div class="span5">
                                <br>
                                <label><strong>Data início:</strong></label>
                                <input type="text" name="datainicio" value="" class="input-block-level data" placeholder="Início da promoção" />
                            </div>

                            <div class="span6">
                                <br>
                                <label><strong>Data Fim:</strong></label>
                                <input type="text" name="datafim" value="" class="input-block-level data" placeholder="Fim da promoção" />
                            </div>

                            <div class="span6">
                                <label><strong>Por semana:</strong></label>                               

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="segunda"> <strong>Segunda</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="terca"> <strong>Terça</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="quarta"> <strong>Quarta</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="quinta"> <strong>Quinta</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="sexta"> <strong>Sexta</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="sabado"> <strong>Sábado</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="domingo"> <strong>Domingo</strong>
                                </label>
                            </div>

                            <div class="span5">
                                <br>
                                <p>
                                    <span class="label label-warning">Aviso:</span> 
                                    <small>Ao marcar a promoção por dia da semana, será ignorado as datas.</small>
                                <p>
                            </div>

                            <div class="span11">
                                <br>
                                <input type="submit" name="sedPromocao" class="btn btn-success pull-right" value="Cadastrar" />
                            </div>
                        </form>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
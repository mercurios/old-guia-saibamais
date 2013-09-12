    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Editar prato</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                        <?php  

                        $_idcliente = $_GET['id'];

                        if (isset($_POST['upPrato'])) {

                            $_nome          = $_POST['nome'];
                            $_desc          = $_POST['descricao'];
                            $_tituloum      = $_POST['tituloum'];
                            $_titulodois    = $_POST['titulodois'];
                            $_titulotres    = $_POST['titulotres'];
                            $_valorum       = $_POST['valorum']; 
                            $_valordois     = $_POST['valordois'];
                            $_valortres     = $_POST['valortres'];
                            $_tipoprato     = $_POST['tipoprato'];
                            $_diasemana     = $_POST['diasemana'];
                            $_diasemana     = implode(',', $_diasemana);

                            $dados = array(
                                "nome_prato"        => $_nome,
                                "desc_prato"        => $_desc,
                                "titulo_preco_um"   => $_tituloum,
                                "titulo_preco_dois" => $_titulodois,
                                "titulo_preco_tres" => $_titulotres,
                                "valor_preco_um"    => $_valorum,
                                "valor_preco_dois"  => $_valordois,
                                "valor_preco_tres"  => $_valortres,
                                "tipo_prato"        => $_tipoprato,
                                "dia_prato"         => $_diasemana
                            );

                            $update = update('guia_cardapios', $dados, "id_cardapio = '$_idcliente'");

                            if ($update) {
                                message('Prato atualizado com sucesso.', 'success');
                                salvaLog('Editou uma acomodação.', $_SESSION['autUser']['nome_user']);
                            }
                            else {
                                message('Erro, ao atualizar prato', 'warning');
                            }
                        }

                        $readPrato = read('guia_cardapios', "WHERE id_cardapio = '$_idcliente'");
                        
                        if ($readPrato) {
                            foreach ($readPrato as $prato) {

                                $diaprato = explode(',', $prato['dia_prato']);
                        ?>

                        <form name="newPrato" method="post" action="">
                            <div class="span11">
                                <label><strong>Nome:</strong></label>
                                <input type="text" name="nome" value="<?php echo $prato['nome_prato']; ?>" class="input-block-level" placeholder="Informe o nome do prato" />
                            </div>  

                            <div class="span11">
                                <label><strong>Descrição:</strong></label>
                                <textarea name="descricao" class="input-block-level limit" placeholder="Breve descrição do prato"><?php echo $prato['desc_prato']; ?></textarea>
                            </div>  

                            <div class="span3">
                                <label><strong>Titulo:</strong></label>
                                <input type="text" name="tituloum" value="<?php echo $prato['titulo_preco_um']; ?>" class="input-block-level" placeholder="Informe um titulo" />
                            </div>  

                            <div class="span3 offset1">
                                <label><strong>Titulo:</strong></label>
                                <input type="text" name="titulodois" value="<?php echo $prato['titulo_preco_dois']; ?>" class="input-block-level" placeholder="Informe um titulo" />
                            </div>  

                            <div class="span3 offset1">
                                <label><strong>Titulo:</strong></label>
                                <input type="text" name="titulotres" value="<?php echo $prato['titulo_preco_tres']; ?>" class="input-block-level" placeholder="Informe um titulo" />
                            </div>  

                            <div class="span3">
                                <label><strong>Valor:</strong></label>
                                <input type="text" name="valorum" value="<?php echo $prato['valor_preco_um']; ?>" class="input-block-level" placeholder="Informe um valor (10,00)" />
                            </div>  

                            <div class="span3 offset1">
                                <label><strong>Valor:</strong></label>
                                <input type="text" name="valordois" value="<?php echo $prato['valor_preco_dois']; ?>" class="input-block-level" placeholder="Informe um valor (20,00)" />
                            </div>  

                            <div class="span3 offset1">
                                <label><strong>Valor:</strong></label>
                                <input type="text" name="valortres" value="<?php echo $prato['valor_preco_tres']; ?>" class="input-block-level" placeholder="Informe um valor (30,00)" />
                            </div>  

                            <div class="span11">
                                <label><strong>Tipo de prato:</strong></label>
                                <select name="tipoprato">
                                    <option value="normal" <?php echo ($prato['tipo_prato'] == 'normal') ? 'selected' : ''; ?>>Normal</option>
                                    <option value="pratoprincipal" <?php echo ($prato['tipo_prato'] == 'pratoprincipal') ? 'selected' : ''; ?>>Prato principal</option>
                                </select>
                            </div>

                            <div class="span11">
                                <label><strong>Dia da semana:</strong></label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="segunda" <?php if (in_array('segunda', $diaprato)) { echo 'checked'; } ?>> <strong>Segunda</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="terca" <?php if (in_array('terca', $diaprato)) { echo 'checked'; } ?>> <strong>Terça</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="quarta" <?php if (in_array('quarta', $diaprato)) { echo 'checked'; } ?>> <strong>Quarta</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="quinta" <?php if (in_array('quinta', $diaprato)) { echo 'checked'; } ?>> <strong>Quinta</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="sexta" <?php if (in_array('sexta', $diaprato)) { echo 'checked'; } ?>> <strong>Sexta</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="sabado" <?php if (in_array('sabado', $diaprato)) { echo 'checked'; } ?>> <strong>Sábado</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="domingo" <?php if (in_array('domingo', $diaprato)) { echo 'checked'; } ?>> <strong>Domingo</strong>
                                </label>
                            </div>

                            <div class="span11">
                                <input type="submit" name="upPrato" class="btn btn-success pull-right" value="Atualizar prato" />
                            </div>
                        </form>
                        <?php
                            }
                        }
                        ?>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
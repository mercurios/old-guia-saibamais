    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Novo prato</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                        <?php  

                        $_idcliente = $_GET['idcliente'];

                        if (empty($_idcliente)) {
                            header('Location: painel.php');
                        }

                        if (isset($_POST['sendAcomo'])) {
                            $_nome        = $_POST['nome'];
                            $_desc        = $_POST['descricao'];
                            $_extr        = $_POST['infoExtras'];
                            $_titulo_um   = $_POST['tituloum'];
                            $_titulo_dois = $_POST['titulodois'];
                            $_titulo_tres = $_POST['titulotres'];
                            $_valor_um    = $_POST['valorum'];
                            $_valor_dois  = $_POST['valordois'];
                            $_valor_tres  = $_POST['valortres'];

                            $dados = array(
                                "nome_acomodacao"   => $_nome,
                                "desc_acomodacao"   => $_desc,
                                "extra_acomodacao"  => $_extr,
                                "titulo_preco_um"   => $_titulo_um,
                                "titulo_preco_dois" => $_titulo_dois,
                                "titulo_preco_tres" => $_titulo_tres,
                                "valor_preco_um"    => $_valor_um,
                                "valor_preco_dois"  => $_valor_dois,
                                "valor_preco_tres"  => $_valor_tres,
                                "id_cliente"        => $_idcliente
                            );

                            $save = create('guia_acomodacoes', $dados);

                            if ($save) {
                                message('Acomodação cadastrada com sucesso.', 'success');
                                salvaLog('Adicionou uma nova acomodação.', $_SESSION['autUser']['nome_user']);
                            }
                            else {
                                message('Erro ao cadastrada acomodação.', 'warning');
                            }
                        }

                        ?>

                        <form name="newAcomo" method="post" action="">
                            <div class="span11">
                                <label><strong>Nome:</strong></label>
                                <input type="text" name="nome" value="" class="input-block-level" placeholder="Informe o nome da acomodação" />
                            </div>  

                            <div class="span11">
                                <label><strong>Descrição:</strong></label>
                                <textarea class="span11 limit" name="descricao" placeholder="Fale um pouco sobre a acomodação"></textarea>
                            </div>

                            <div class="span11">
                                <label><strong>Informações extras:</strong></label>
                                <textarea name="infoExtras" class="editorTiny" placeholder="Informe os extras dessa acomodação"></textarea>
                                <p></p>
                            </div>

                            <div class="span3">
                                <label><strong>Titulo:</strong></label>
                                <input type="text" name="tituloum" value="" class="input-block-level" placeholder="Informe um titulo" />
                            </div>  

                            <div class="span3 offset1">
                                <label><strong>Titulo:</strong></label>
                                <input type="text" name="titulodois" value="" class="input-block-level" placeholder="Informe um titulo" />
                            </div>  

                            <div class="span3 offset1">
                                <label><strong>Titulo:</strong></label>
                                <input type="text" name="titulotres" value="" class="input-block-level" placeholder="Informe um titulo" />
                            </div>  

                            <div class="span3">
                                <label><strong>Valor:</strong></label>
                                <input type="text" name="valorum" value="" class="input-block-level" placeholder="Informe um valor (10,00)" />
                            </div>  

                            <div class="span3 offset1">
                                <label><strong>Valor:</strong></label>
                                <input type="text" name="valordois" value="" class="input-block-level" placeholder="Informe um valor (20,00)" />
                            </div>  

                            <div class="span3 offset1">
                                <label><strong>Valor:</strong></label>
                                <input type="text" name="valortres" value="" class="input-block-level" placeholder="Informe um valor (30,00)" />
                            </div>  

                            <div class="span11">
                                <input type="submit" name="sendAcomo" class="btn btn-success pull-right" value="Cadastrar" />
                            </div>
                        </form>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
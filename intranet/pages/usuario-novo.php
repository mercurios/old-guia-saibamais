    <div class="span12">
        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Editar usuário</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                        <?php  
                        if (isset($_POST['sendUsuario'])) {

                            $nome   = $_POST['nome'];
                            $email  = $_POST['email'];
                            $senha  = $_POST['senha'];
                            $status = $_POST['status'];

                            if (empty($nome)) {
                                showMsg('O campo Nome é obrigatório.', 'warning');
                            }
                            elseif (empty($email)) {
                                showMsg('O campo E-mail é obrigatório.', 'warning');
                            }
                            elseif (!valMail($email)) {
                                showMsg('O e-mail informado está com o formato inválido.', 'warning');
                            }
                            elseif (empty($senha)) {
                                showMsg('O campo Senha é obrigatório.', 'warning');
                            }
                            else {

                                $dados = array(
                                    "nome_user"     => $nome,
                                    "email_user"    => $email,
                                    "senha_user"    => md5($senha),
                                    "status_user"   => $status
                                );

                                $save = create('guia_user', $dados);

                                if ($save) {
                                    showMsg('Usuário cadastrado com sucesso.', 'success');
                                }
                                else {
                                    showMsg('Erro ao cadastrar usuário, tente novamente.', 'warning');
                                }
                            }
                        }
                        ?>
                        <form name="updateUser" method="post" action="">
                            <div class="span11">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" class="input-block-level" value="" />
                            </div><!-- / -->

                            <div class="span11">
                                <label for="email">E-mail</label>
                                <input type="text" name="email" id="email" class="input-block-level" value="" />
                            </div><!-- / -->

                            <div class="span11">
                                <label for="senha">Senha</label>
                                <input type="password" name="senha" id="senha" class="input-block-level" value="" />
                            </div><!-- / -->

                            <div class="span11">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="input-block-level">
                                    <option value="1">Ativado</option>
                                    <option value="0">Bloqueado</option>
                                </select>
                            </div><!-- / -->

                            <div class="span11">
                                <input type="submit" class="btn btn-success pull-right" name="sendUsuario" value="Cadastrar" />
                                <a href="painel.php?pg=usuario-listar" title="cancelar" class="btn btn-warning">Cancelar</a>
                            </div><!-- / -->
                        </form><!-- /form -->
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
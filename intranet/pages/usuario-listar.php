    <div class="span12">
        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Listar usuários</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                        <?php 

                        if (isset($_GET['deletarUser'])) {
                            $idDelete = mysql_real_escape_string($_GET['deletarUser']);
                            delete('guia_user', "id_user = '$idDelete'");
                            header('Location: painel.php?pg=usuario-listar');
                        }

                        $id = mysql_real_escape_string($_GET['deletar']);

                        if (!empty($id)) {

                            $countUser = read('guia_user');

                            if (count($countUser) === 1) {
                                showMsg('Você não pode deletar o último usuário.', 'warning');
                            }
                            else {
                                $searchUser = read('guia_user', "WHERE id_user = '$id'");

                                if ($searchUser) {
                                    foreach ($searchUser as $user) :
                                        echo '
                                    <!-- Modal -->
                                    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 id="myModalLabel">Deletar usuário</h3>
                                      </div>
                                      <div class="modal-body">
                                        <p><strong>Nome:</strong> ' . $user['nome_user'] . ' </p>
                                        <p><strong>Email:</strong> ' . $user['email_user'] . ' </p>
                                      </div>
                                      <div class="modal-footer">
                                        <p class="pull-left">Você tem certeza que deseja deletar <strong>' . $user['nome_user'] . '</strong>?</p>
                                        <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</a>
                                        <a href="painel.php?pg=usuario-listar&deletarUser=' . $user['id_user'] . '" class="btn btn-danger">Deletar</a>
                                      </div>
                                    </div>
                                        ';
                                    endforeach;
                                }
                                else {
                                    message('O usuário informado não existe.', 'warning');
                                }
                            }
                        }

                        $readUser = read('guia_user');

                        if (!$readUser) {
                            message('Não existe usuário cadastrado... Seus dados estão sendo gravados para averiguação.', 'warning');
                        }
                        else {
                        ?>
                        <table id="tabela" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Último acesso</th>
                                    <th>Status</th>
                                    <th><a href="painel.php?pg=usuario-novo" class="btn tool" data-placement="right" rel="tooltip" title="Adicionar novo usuário"> <i class="icon-plus"></i> Novo</a></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php 
                                foreach ($readUser as $usuario) {
                                ?>
                                <tr>
                                    <td><?php echo $usuario['id_user']; ?></td>
                                    <td><?php echo $usuario['nome_user']; ?></td>
                                    <td><?php echo $usuario['email_user']; ?></td>
                                    <td><?php echo formDate($usuario['acesso_user']); ?></td>
                                    <td><?php echo ($usuario['status_user'] == 1) ? 'Ativo' : 'Bloqueado'; ?></td>
                                    <td class="action-td">
                                        <a href="painel.php?pg=usuario-editar&id=<?php echo $usuario['id_user']; ?>" class="tool btn btn-small btn-warning" title="Editar usuário" data-placement="left" rel="tooltip">
                                            <i class="icon-pencil"></i>                             
                                        </a>    
                                        <a href="painel.php?pg=usuario-listar&deletar=<?php echo $usuario['id_user']; ?>" class="tool btn btn-small btn-danger" title="Excluir usuário" data-placement="right" rel="tooltip">
                                            <i class="icon-remove"></i>                     
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
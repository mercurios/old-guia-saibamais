<div class="row">
    <form name="newesporte" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('esportes/update') ?>">
        <div class="span12">
            <div class="widget">
                <div class="widget-head">
                    <div class="pull-left"><i class="icon-plus"></i> Cadastrar local</div>
                    <div class="widget-icons pull-right"></div>  
                    <div class="clearfix"></div>
                </div>

                <div class="widget-content padding-left-35">
                    <?php if (!empty($esporte)) { foreach ($esporte as $res) { ?>
                    <div class="padd">
                        <div class="row">
                            <div class="span11">
                                <label class="titulo-separator">Informações Básicas</label>
                            </div>

                            <div class="span2">
                                    <span class="thumbnail">
                                        <?php echo $this->biblioteca->image_thumb('../uploads/logos/' . $res->logo_esporte, 250, 200 ); ?>
                                    </span>
                                </div>

                                <div class="span3">
                                    <label>Nova imagem: 
                                        <span class="badge badge-info tool" 
                                        title="Atenção: Só são permitidos imagens de no máximo 2MB, caso o tamanho exceda ou voçê tente enviar outro arquivo que não seja imagem, o programa altomaticamente irá salva sua imagem como NULA." data-placement="top" rel="popover"><i class="icon-info"></i></span>
                                    </label>
                                    <input type="file" name="logo" class="filestyle" data-input="false" data-buttonText="Selecionar um novo aquivo">

                                    </br></br>

                                    <label for="nome">Nome: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('nome'); ?></span></small></label>
                                    <input type="text" class="input-block-level" id="nome" name="nome" value="<?php echo $res->nome_esporte ?>" />   
                                </div>

                                <div class="span6">
                                    <label>Descrição: <span class="text-error">*</span><small><span class="text-error"><?php echo form_error('descricao'); ?></span></small></label>
                                    <textarea class="input-block-level" rows="5" name="descricao"><?php echo $res->desc_esporte ?></textarea>
                                </div>

                            <div class="span11">
                                <label class="titulo-separator">Localização</label>
                            </div>

                            <div class="span5">
                                    <label for="estado">Estado: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('estado'); ?></span></small></label>
                                    <select name="estado" class="input-block-level" id="estado">
                                        <option value="">Selecione um estado</option>
                                        <?php foreach ($estados as $estado) : ?>
                                            <option value="<?php echo $estado->cd_uf ?>" <?php echo ($res->uf_esporte == $estado->cd_uf) ? 'selected' : '' ?>><?php echo $estado->ds_uf_nome ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="span6">
                                    <label for="cidade">Cidade: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('cidade'); ?></span></small></label>
                                    <select name="cidade" class="input-block-level" id="cidade">
                                        <option value="">Selecione uma cidade</option>
                                        <?php foreach ($cidades as $cidade) : ?>
                                            <option value="<?php echo $cidade->cd_cidade ?>" <?php echo ($res->cidade_esporte == $cidade->cd_cidade) ? 'selected' : '' ?>><?php echo $cidade->ds_cidade_nome ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="span5">
                                    </br>
                                    <label for="bairro">Bairro: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('bairro'); ?></span></small></label>
                                    <select name="bairro" class="input-block-level" id="bairro">
                                        <option value="">Selecione um bairro</option>
                                        <?php foreach ($bairros as $bairro) : ?>
                                            <option value="<?php echo $bairro->cd_bairro ?>" <?php echo ($res->bairro_esporte == $bairro->cd_bairro) ? 'selected' : '' ?>><?php echo $bairro->ds_bairro_nome ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="span6">
                                    </br>
                                    <label for="rua">Rua: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('rua'); ?></span></small></label>
                                    <input type="text" name="rua" id="rua" value="<?php echo $res->rua_esporte ?>" class="input-block-level">
                                </div>

                                <div class="span5">
                                    </br>
                                    <label for="numero">Numero: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('numero'); ?></span></small></label>
                                    <input type="text" name="numero" id="numero" value="<?php echo $res->num_esporte ?>" class="input-block-level">
                                </div>

                                <div class="span6">
                                    </br>
                                    <label for="cep">Cep: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('cep'); ?></span></small></label>
                                    <input type="text" name="cep" id="cep" value="<?php echo $res->cep_esporte ?>" class="input-block-level maskCep">
                                </div>

                                <div class="span5">
                                    </br>
                                    <label for="longitude">Longitude: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('longitude'); ?></span></small></label>
                                    <input type="text" name="longitude" id="longitude" value="<?php echo $res->long_esporte ?>" class="input-block-level">
                                </div>

                                <div class="span6">
                                    </br>
                                    <label for="latitude">Latitude: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('latitude'); ?></span></small></label>
                                    <input type="text" name="latitude" id="latitude" value="<?php echo $res->lati_esporte ?>" class="input-block-level">
                                </div>

                            <div class="span11">
                                <label class="titulo-separator">Valores do esporte</label>
                            </div>

                            <div class="span11">
                                <p class="text-error"><span class="label label-warning">Aviso</span> Se o valor do esporte for Grátis, deixe os campos abaixo em branco.</p>   
                            </div>                          

                            <div class="span5">
                                </br>
                                <label>Titulo:</label>
                                <input class="input-block-level" value="<?php echo $res->val_titulo_um ?>" name="tituloUm" type="text" placeholder="Inteira">
                            </div>

                            <div class="span6">
                                </br>
                                <label>Valor:</label>
                                <input class="input-block-level" value="<?php echo $res->val_um ?>" name="valorUm" type="text" placeholder="10,00">
                            </div>

                            <div class="span5">
                                </br>
                                <label>Titulo:</label>
                                <input class="input-block-level" value="<?php echo $res->val_titulo_dois ?>" name="tituloDois" type="text" placeholder="Meia">
                            </div>

                            <div class="span6">
                                </br>
                                <label>Valor:</label>
                                <input class="input-block-level" value="<?php echo $res->val_dois ?>" name="valorDois" type="text" placeholder="10,00">
                            </div>

                            <div class="span5">
                                </br>
                                <label>Titulo:</label>
                                <input class="input-block-level" value="<?php echo $res->val_titulo_tres ?>" name="tituloTres" type="text" placeholder="Especial">
                            </div>

                            <div class="span6">
                                </br>
                                <label>Valor:</label>
                                <input class="input-block-level" value="<?php echo $res->val_tres ?>" name="valorTres" type="text" placeholder="10,00">
                            </div>


                            <div class="span11">
                                <label class="titulo-separator">Idade mínima</label>
                            </div>

                            <div class="span11">
                                <label>Idade:</label>
                                <input class="input-block-level" value="<?php echo $res->idade_esporte ?>" name="idade" type="text" placeholder="12 anos">
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Categoria</label>
                            </div>

                            <div class="span11">
                                <?php $_categoria = explode(",", $res->categoria_esporte); ?>
                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="arborismo" <?php echo (in_array('arborismo', $_categoria)) ? 'checked' : ''; ?>> Arborismo
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="ciclismo" <?php echo (in_array('ciclismo', $_categoria)) ? 'checked' : ''; ?>> Ciclísmo
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="escalada" <?php echo (in_array('escalada', $_categoria)) ? 'checked' : ''; ?>> Escalada
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="futebol" <?php echo (in_array('futebol', $_categoria)) ? 'checked' : ''; ?>> Futebol
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="futebol-de-areia" <?php echo (in_array('futebol-de-areia', $_categoria)) ? 'checked' : ''; ?>> Futebol de areia
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="futsal" <?php echo (in_array('futsal', $_categoria)) ? 'checked' : ''; ?>> Futsal
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="patins" <?php echo (in_array('patins', $_categoria)) ? 'checked' : ''; ?>> Patins
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="skate" <?php echo (in_array('skate', $_categoria)) ? 'checked' : ''; ?>> Skate
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="surf" <?php echo (in_array('surf', $_categoria)) ? 'checked' : ''; ?>> Surf
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="tennis" <?php echo (in_array('tennis', $_categoria)) ? 'checked' : ''; ?>> Tênnis
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="volei" <?php echo (in_array('volei', $_categoria)) ? 'checked' : ''; ?>> Vôlei
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="outros" <?php echo (in_array('outros', $_categoria)) ? 'checked' : ''; ?>> Outro
                                </label>
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Horário de funcionamento</label>
                            </div>

                            <div class="span11">
                                <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="info">
                                                <td width="80"><strong>Dia </strong></td>
                                                <td width="560"><strong>Horário </strong></td>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td><strong>Domingo:</strong></td>
                                                <td><input class="input-block-level" value="<?php echo $res->h_dom ?>" name="h_dom" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                            </tr>

                                            <tr>
                                                <td><strong>Segunda:</strong></td>
                                                <td><input class="input-block-level" value="<?php echo $res->h_seg ?>" name="h_seg" type="text" placeholder="Não funcionamos" maxlength="31"></td>
                                            </tr>

                                            <tr>
                                                <td><strong>Terça:</strong></td>
                                                <td><input class="input-block-level" value="<?php echo $res->h_ter ?>" name="h_ter" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                            </tr>

                                            <tr>
                                                <td><strong>Quarta:</strong></td>
                                                <td><input class="input-block-level" value="<?php echo $res->h_qua ?>" name="h_qua" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                            </tr>

                                            <tr>
                                                <td><strong>Quinta:</strong></td>
                                                <td><input class="input-block-level" value="<?php echo $res->h_qui ?>" name="h_qui" type="text" placeholder="18:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                            </tr>

                                            <tr>
                                                <td><strong>Sexta:</strong></td>
                                                <td><input class="input-block-level" value="<?php echo $res->h_sex ?>" name="h_sex" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                            </tr>

                                            <tr>
                                                <td><strong>Sábado:</strong></td>
                                                <td><input class="input-block-level" value="<?php echo $res->h_sab ?>" name="h_sab" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                        <?php } } ?>
                    </div><!-- Padd -->

                    <div class="widget-foot">
                        <input type="hidden" name="id" value="<?php echo $res->id_esporte ?>">
                        <input type="hidden" name="imgAtual" value="<?php echo $res->logo_esporte ?>">
                        <input type="submit" class="btn btn-success pull-right" name="cadastrar" value="Atualizar esporte" />
                        <p>Os campos marcados com <strong>(*)</strong>, são obrigatórios.</p>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
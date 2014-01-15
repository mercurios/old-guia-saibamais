<div class="row">
    <form name="newlocal" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('locais/update') ?>">
        <div class="span12">
            <div class="widget">
                <div class="widget-head">
                    <div class="pull-left"><i class="icon-plus"></i> Cadastrar local</div>
                    <div class="widget-icons pull-right"></div>  
                    <div class="clearfix"></div>
                </div>

                <?php if (isset($local)) { foreach ($local as $res) { ?>

                <div class="widget-content padding-left-35">
                    <div class="padd">
                        <div class="row">
                            <div class="span11">
                                <label class="titulo-separator">Informações Básicas</label>
                            </div>

                            <div class="span2">
                                <span class="thumbnail">
                                    <?php echo $this->biblioteca->image_thumb('../uploads/logos/' . $res->logo_local, 250, 200 ); ?>
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
                                <input type="text" class="input-block-level" id="nome" name="nome" value="<?php echo $res->nome_local ?>" />   
                            </div>

                            <div class="span6">
                                <label>Descrição: <span class="text-error">*</span><small><span class="text-error"><?php echo form_error('descricao'); ?></span></small></label>
                                <textarea class="input-block-level" rows="5" name="descricao"><?php echo $res->desc_local ?></textarea>
                            </div>

                            <div class="span11">
                                </br>
                                <label>Dicas sobre o local: </label>
                                <textarea class="input-block-level" rows="5" name="dicas"><?php echo $res->dicas_local ?></textarea>
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Categoria</label>
                            </div>
                            <?php $_categoria = explode(",", $res->categoria_local); ?>
                            <div class="span11">
                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="cachoeiras" <?php echo (in_array('cachoeiras', $_categoria)) ? 'checked' : ''; ?>> Cachoeira
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="historicos" <?php echo (in_array('historicos', $_categoria)) ? 'checked' : ''; ?>> Lugar histórico
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="matas" <?php echo (in_array('matas', $_categoria)) ? 'checked' : ''; ?>> Mata
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="museus" <?php echo (in_array('museus', $_categoria)) ? 'checked' : ''; ?>> Museu
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="parques" <?php echo (in_array('parques', $_categoria)) ? 'checked' : ''; ?>> Parque
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="pontos-turisticos" <?php echo (in_array('pontos-turisticos', $_categoria)) ? 'checked' : ''; ?>> Ponto turístico
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="pracas" <?php echo (in_array('pracas', $_categoria)) ? 'checked' : ''; ?>> Praça
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="praias" <?php echo (in_array('praias', $_categoria)) ? 'checked' : ''; ?>> Praia
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="rios-lagos" <?php echo (in_array('rios-lagos', $_categoria)) ? 'checked' : ''; ?>> Rio / Lago
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="zoologicos" <?php echo (in_array('zoologicos', $_categoria)) ? 'checked' : ''; ?>> Zoológico
                                </label>
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Acessível</label>
                            </div>

                            <div class="span11">
                                <?php $_adaptado = explode(",", $res->adaptado_local); ?>
                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="cego" <?php echo (in_array('cego', $_adaptado)) ? 'checked' : ''; ?>> Cego
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="surdo" <?php echo (in_array('surdo', $_adaptado)) ? 'checked' : ''; ?>> Surdo
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="deficientefisico" <?php echo (in_array('deficientefisico', $_adaptado)) ? 'checked' : ''; ?>> Deficiente fisico
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="braile" <?php echo (in_array('braile', $_adaptado)) ? 'checked' : ''; ?>> Braile
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="obeso" <?php echo (in_array('obeso', $_adaptado)) ? 'checked' : ''; ?>> Obeso
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="idoso" <?php echo (in_array('idoso', $_adaptado)) ? 'checked' : ''; ?>> Idoso
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="gestante" <?php echo (in_array('gestante', $_adaptado)) ? 'checked' : ''; ?>> Gestante
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="bebe" <?php echo (in_array('bebe', $_adaptado)) ? 'checked' : ''; ?>> Bêbe
                                </label>
                            </div>

                            <div class="span11">
                                    <label class="titulo-separator">Localização</label>
                                </div>

                                <div class="span5">
                                    <label for="estado">Estado: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('estado'); ?></span></small></label>
                                    <select name="estado" class="input-block-level" id="estado">
                                        <option value="">Selecione um estado</option>
                                        <?php foreach ($estados as $estado) : ?>
                                            <option value="<?php echo $estado->cd_uf ?>" <?php echo ($res->uf_local == $estado->cd_uf) ? 'selected' : '' ?>><?php echo $estado->ds_uf_nome ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="span6">
                                    <label for="cidade">Cidade: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('cidade'); ?></span></small></label>
                                    <select name="cidade" class="input-block-level" id="cidade">
                                        <option value="">Selecione uma cidade</option>
                                        <?php foreach ($cidades as $cidade) : ?>
                                            <option value="<?php echo $cidade->cd_cidade ?>" <?php echo ($res->cidade_local == $cidade->cd_cidade) ? 'selected' : '' ?>><?php echo $cidade->ds_cidade_nome ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="span5">
                                    </br>
                                    <label for="bairro">Bairro: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('bairro'); ?></span></small></label>
                                    <select name="bairro" class="input-block-level" id="bairro">
                                        <option value="">Selecione um bairro</option>
                                        <?php foreach ($bairros as $bairro) : ?>
                                            <option value="<?php echo $bairro->cd_bairro ?>" <?php echo ($res->bairro_local == $bairro->cd_bairro) ? 'selected' : '' ?>><?php echo $bairro->ds_bairro_nome ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="span6">
                                    </br>
                                    <label for="rua">Rua: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('rua'); ?></span></small></label>
                                    <input type="text" name="rua" id="rua" value="<?php echo $res->rua_local ?>" class="input-block-level">
                                </div>

                                <div class="span5">
                                    </br>
                                    <label for="numero">Numero: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('numero'); ?></span></small></label>
                                    <input type="text" name="numero" id="numero" value="<?php echo $res->num_local ?>" class="input-block-level">
                                </div>

                                <div class="span6">
                                    </br>
                                    <label for="cep">Cep: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('cep'); ?></span></small></label>
                                    <input type="text" name="cep" id="cep" value="<?php echo $res->cep_local ?>" class="input-block-level maskCep">
                                </div>

                                <div class="span5">
                                    </br>
                                    <label for="longitude">Longitude: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('longitude'); ?></span></small></label>
                                    <input type="text" name="longitude" id="longitude" value="<?php echo $res->long_local ?>" class="input-block-level">
                                </div>

                                <div class="span6">
                                    </br>
                                    <label for="latitude">Latitude: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('latitude'); ?></span></small></label>
                                    <input type="text" name="latitude" id="latitude" value="<?php echo $res->lati_local ?>" class="input-block-level">
                                </div>

                            <div class="span11">
                                <label class="titulo-separator">Valores do local</label>
                            </div>

                            <div class="span11">
                                <p class="text-error"><span class="label label-warning">Aviso</span> Caso os valores abaixo não forem informados, o local será exibido como gratuito.</p>   
                            </div>                          

                            <div class="span11">
                                </br>
                                <label>Valor inteira:</label>
                                <input class="input-block-level" name="valorInteira" value="<?php echo $res->val_inteira_local ?>" type="text" placeholder="10,00">
                            </div>

                            <div class="span11">
                                </br>
                                <label>Valor meia:</label>
                                <input class="input-block-level" name="valorMeia" value="<?php echo $res->val_meia_local ?>" type="text" placeholder="5,00">
                            </div>

                            <div class="span11">
                                </br>
                                <label>Valor especial:</label>
                                <input class="input-block-level" name="valorEspecial" value="<?php echo $res->val_especial_local ?>" type="text" placeholder="50,00">
                            </div>


                            <div class="span11">
                                <label class="titulo-separator">Censura</label>
                            </div>

                            <div class="span11">
                                <label>Idade:</label>
                                <input class="input-block-level" name="censura" value="<?php echo $res->censura_local ?>" type="text" placeholder="12 anos">
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

                            <div class="span11">
                                <label class="titulo-separator">O que fazer lá?</label>
                            </div>

                            <div class="span11">
                                <span class="btn btn-success pull-right addItem"><i class="icon-plus"></i> Adicionar item</span>
                            </div>

                            <?php  

                            // Pega o resultado
                            $_titulo = $res->fazer_titulo_local;
                            $_link   = $res->fazer_link_local;
                            $_descri = $res->fazer_desc_local;

                            // Explode
                            $_titulo = explode('_-_', $_titulo);
                            $_link   = explode('_-_', $_link);
                            $_descri = explode('_-_', $_descri);

                            // Conta quantos tem
                            $_count = count($_titulo);

                            // Cria o loop
                            for ($_i = 0; $_i < $_count; $_i++)
                            {
                            ?>

                            <div class="clonar span11">
                                <div class="span4">
                                    <label for="tituloOqfazer">Titulo:</label>
                                    <input type="text" class="input-block-level" id="tituloOqfazer" name="tituloOqfazer[]" value="<?php echo $_titulo[$_i] ?>" />

                                    </br></br>

                                    <label for="linkOqfazer">Link:</label>
                                    <input type="text" class="input-block-level" id="linkOqfazer" name="linkOqfazer[]" value="<?php echo $_link[$_i] ?>" />  
                                </div>

                                <div class="span6">
                                    <label>Descrição:</label>
                                    <textarea class="input-block-level" rows="5" name="descOqfazer[]"><?php echo $_descri[$_i] ?></textarea>
                                </div>

                                <div class="span10"><span href="#" class="removeItem btn btn-danger pull-right"><i class="icon-remove"></i> Deletar item</span></div>
                            </div>

                            <?php
                            }
                            ?>

                        </div>
                    </div><!-- Padd -->

                    <div class="widget-foot">
                        <input type="hidden" name="id" value="<?php echo $res->id_local ?>" />
                        <input type="hidden" name="imgAtual" value="<?php echo $res->logo_local ?>" />
                        <input type="submit" class="btn btn-success pull-right" name="cadastrar" value="Atualizar local" />
                        <p>Os campos marcados com <strong>(*)</strong>, são obrigatórios.</p>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
    </form>
</div>
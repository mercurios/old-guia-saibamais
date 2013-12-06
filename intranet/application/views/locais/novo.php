<div class="row">
    <form name="newlanchonete" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('locais/save') ?>">
        <div class="span12">
            <div class="widget">
                <div class="widget-head">
                    <div class="pull-left"><i class="icon-plus"></i> Cadastrar local</div>
                    <div class="widget-icons pull-right"></div>  
                    <div class="clearfix"></div>
                </div>

                <div class="widget-content padding-left-35">
                    <div class="padd">
                        <div class="row">
                            <div class="span11">
                                <label class="titulo-separator">Informações Básicas</label>
                            </div>

                            <div class="span5">
                                <label for="nome">Nome: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('nome'); ?></span></small></label>
                                <input type="text" class="input-block-level" id="nome" name="nome" value="" />
                            
                                </br></br>

                                <label>Logo: <span class="badge badge-info tool" title="Atenção: Só são permitidos imagens de no máximo 2MB, caso o tamanho exceda ou voçê tente enviar outro arquivo que não seja imagem, o programa altomaticamente irá salva sua imagem como NULA." data-placement="top" rel="popover"><i class="icon-info"></i></span></label>
                                <input type="file" name="logo" class="filestyle" data-buttonText="Selecionar aquivo">
                            </div>
                            
                            <div class="span6">
                                <label>Descrição: <span class="text-error">*</span><small><span class="text-error"><?php echo form_error('descricao'); ?></span></small></label>
                                <textarea class="input-block-level" rows="5" name="descricao"></textarea>
                            </div>

                            <div class="span11">
                                </br>
                                <label>Dicas sobre o local: </label>
                                <textarea class="input-block-level" rows="5" name="dicas"></textarea>
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Categoria</label>
                            </div>

                            <div class="span11">
                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="cachoeiras"> Cachoeira
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="historicos"> Lugar histórico
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="matas"> Mata
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="museus"> Museu
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="parques"> Parque
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="pontos-turisticos"> Ponto turístico
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="pracas"> Praça
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="praias"> Praia
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="rios-lagos"> Rio / Lago
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="categoria" name="categoria[]" value="zoologicos"> Zoológico
                                </label>
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Acessível</label>
                            </div>

                            <div class="span11">
                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="cego"> Cego
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="surdo"> Surdo
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="deficientefisico"> Deficiente fisico
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="braile"> Braile
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="obeso"> Obeso

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="idoso"> Idoso
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="gestante"> Gestante
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="acessibilidade" name="acessibilidade[]" value="bebe"> Bêbe
                                </label>
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Localização</label>
                            </div>

                            <div class="span5">
                                <label for="estado">Estado: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('estado'); ?></span></small></label>
                                <select name="estado" class="input-block-level" id="estado">
                                    <option value="">Selecione um estado</option>
                                    <?php
                                        foreach ($estados as $estado) :
                                            echo '<option value="'. $estado->cd_uf .'">'. $estado->ds_uf_nome .'</option>';
                                        endforeach;  
                                    ?>
                                </select>
                            </div>

                            <div class="span6">
                                <label for="cidade">Cidade: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('cidade'); ?></span></small></label>
                                <select name="cidade" class="input-block-level" id="cidade">
                                    <option value="">Selecione uma cidade</option>
                                </select>
                            </div>

                            <div class="span5">
                                </br>
                                <label for="bairro">Bairro: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('bairro'); ?></span></small></label>
                                <select name="bairro" class="input-block-level" id="bairro">
                                    <option value="">Selecione um bairro</option>
                                </select>
                            </div>

                            <div class="span6">
                                </br>
                                <label for="rua">Rua: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('rua'); ?></span></small></label>
                                <input type="text" name="rua" id="rua" value="" class="input-block-level">
                            </div>

                            <div class="span5">
                                </br>
                                <label for="numero">Numero: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('numero'); ?></span></small></label>
                                <input type="text" name="numero" id="numero" value="" class="input-block-level">
                            </div>

                            <div class="span6">
                                </br>
                                <label for="cep">Cep: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('cep'); ?></span></small></label>
                                <input type="text" name="cep" id="cep" value="" class="input-block-level maskCep">
                            </div>

                            <div class="span5">
                                </br>
                                <label for="longitude">Longitude: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('longitude'); ?></span></small></label>
                                <input type="text" name="longitude" id="longitude" value="" class="input-block-level">
                            </div>

                            <div class="span6">
                                </br>
                                <label for="latitude">Latitude: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('latitude'); ?></span></small></label>
                                <input type="text" name="latitude" id="latitude" value="" class="input-block-level">
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
                                <input class="input-block-level" name="valorInteira" type="text" placeholder="10,00">
                            </div>

                            <div class="span11">
                                </br>
                                <label>Valor meia:</label>
                                <input class="input-block-level" name="valorMeia" type="text" placeholder="5,00">
                            </div>

                            <div class="span11">
                                </br>
                                <label>Valor especial:</label>
                                <input class="input-block-level" name="valorEspecial" type="text" placeholder="50,00">
                            </div>


                            <div class="span11">
                                <label class="titulo-separator">Censura</label>
                            </div>

                            <div class="span11">
                                <label>Idade:</label>
                                <input class="input-block-level" name="censura" type="text" placeholder="12 anos">
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
                                            <td><input class="input-block-level" name="h_dom" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Segunda:</strong></td>
                                            <td><input class="input-block-level" name="h_seg" type="text" placeholder="Não funcionamos" maxlength="31"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Terça:</strong></td>
                                            <td><input class="input-block-level" name="h_ter" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Quarta:</strong></td>
                                            <td><input class="input-block-level" name="h_qua" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Quinta:</strong></td>
                                            <td><input class="input-block-level" name="h_qui" type="text" placeholder="18:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Sexta:</strong></td>
                                            <td><input class="input-block-level" name="h_sex" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Sábado:</strong></td>
                                            <td><input class="input-block-level" name="h_sab" type="text" placeholder="8:00 às 13:00 e 16:00 às 22:00" maxlength="31"></td>
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

                            <div class="clonar span11">
                                <div class="span4">
                                    <label for="tituloOqfazer">Titulo:</label>
                                    <input type="text" class="input-block-level" id="tituloOqfazer" name="tituloOqfazer[]" value="" />

                                    </br></br>

                                    <label for="linkOqfazer">Link:</label>
                                    <input type="text" class="input-block-level" id="linkOqfazer" name="linkOqfazer[]" value="" />  
                                </div>

                                <div class="span6">
                                    <label>Descrição:</label>
                                    <textarea class="input-block-level" rows="5" name="descOqfazer[]"></textarea>
                                </div>
                            </div>

                        </div>
                    </div><!-- Padd -->

                    <div class="widget-foot">
                        <input type="submit" class="btn btn-success pull-right" name="cadastrar" value="Cadastrar local" />
                        <p>Os campos marcados com <strong>(*)</strong>, são obrigatórios.</p>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
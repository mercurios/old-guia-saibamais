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

                            <div class="span11">
                                <label>Logo: <span class="badge badge-info tool" title="Atenção: Só são permitidos imagens de no máximo 2MB, caso o tamanho exceda ou voçê tente enviar outro arquivo que não seja imagem, o programa altomaticamente irá salva sua imagem como NULA." data-placement="top" rel="popover"><i class="icon-info"></i></span></label>
                                <input type="file" name="logo" class="filestyle" data-buttonText="Selecionar aquivo">
                            </div>
                            
                            <div class="span5">
                                </br>
                                <label for="nome">Titulo: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('nome'); ?></span></small></label>
                                <input type="text" class="input-block-level" id="nome" name="nome" value="" />
                            </div>

                            <div class="span6">
                                </br>
                                <label for="ideal">Ideral para: <span class="text-error">*</span> <small><span class="text-error"><?php echo form_error('ideal'); ?></span></small></label>
                                <input type="text" class="input-block-level" id="ideal" name="ideal" value="" />
                            </div>

                            <div class="span11">
                                <label class="titulo-separator">Rotas</label>
                            </div>

                            <div class="span11">
                                <span class="btn btn-success pull-right addItem"><i class="icon-plus"></i> Adicionar item</span>
                            </div>

                            <div class="clonar span11">
                                <div class="span4">
                                    <label><strong>Foto:</strong></label>
                                    <input type="file" name="fotoRota[]" title="Selecione a foto da rota" />
                                </div>

                                <div class="span6">
                                    <label><strong>Valor:</strong></label>
                                    <input name="valor[]" type="text" placeholder="Ex: 35,00" class="input-block-level" />
                                </div>

                                <div class="span10">
                                    </br>
                                    <label><strong>Descrição</strong></label>
                                    <textarea name="descricao[]" class="input-block-level" placeholder="Descrição da rota"></textarea>
                                </div>

                                <div class="span10">
                                </br>
                                    <label><strong>Atrações</strong></label>
                                    <textarea name="atracoes[]" class="input-block-level" placeholder="Atração da rota"></textarea>
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
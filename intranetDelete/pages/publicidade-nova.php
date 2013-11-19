<div class="span12">
    <div class="row">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <h3>Nova publicidade</h3>
                </div><!-- /widget-header -->

                <div class="widget-content">
                	<form name="newPublicidade" action="" method="post">
                		<fieldset>
                			<div class="span11">
								<input type="file" name="foto" title="Selecione o arquivo" />
							</div>

							<div class="span11">
								<label class="radio inline">
									<input type="radio" name="imgouvideo" id="imgouvideo" value="option1" checked>
									Imagem
								</label>
								<label class="radio inline">
									<input type="radio" name="imgouvideo" id="imgouvideo" value="option2">
									Vídeo
								</label>
							</div>

                			<div class="span11">
                				<br>
                				<label><strong>Titulo:</strong></label>
                				<input type="text" class="span11 input-block-level" name="titulo" placeholder="Titulo do banner" />
                			</div>

                			<div class="span11">
                				<label><strong>Posição:</strong></label>
                				<select name="">
                					<option value="">Top (1000x150)</option>
                					<option value="">Sidebar (300x400)</option>
                					<option value="">Bottom (980x60)</option>
                				</select>
                			</div>

                			<div class="span11">
                				<label><strong>Link:</strong></label>
                				<input type="text" class="span11 input-block-level" name="titulo" placeholder="Link do banner" />
                			</div>

							<div class="span11">
								<label class="radio inline">
									<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
									Não abrir em nova janela
								</label>
								<label class="radio inline">
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
									Abrir em uma nova janela
								</label>
							</div>

							<div class="span11">
								<br>
								<label><strong>Páginas para mostrar:</strong></label>
								<label class="checkbox inline">
									<input type="checkbox" id="inlineCheckbox1" value="option1"> Home
								</label>
								<label class="checkbox inline">
								  	<input type="checkbox" id="inlineCheckbox2" value="option2"> Categoria
								</label>
								<label class="checkbox inline">
								  	<input type="checkbox" id="inlineCheckbox3" value="option3"> Anunciantes
								</label>
							</div>

							<div class="span11">
								<input type="submit" class="btn btn-success pull-right" name="sendRota" value="Cadastrar" />
							</div>
                		</fieldset>
                	</form>
                </div><!-- /widget-content -->
            </div><!-- /widget -->
        </div><!-- /span12 -->
    </div><!-- /row -->
</div><!-- /span12 -->
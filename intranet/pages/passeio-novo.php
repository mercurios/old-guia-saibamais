<div class="span12">
    <div class="row">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <h3>Nova rota</h3>
                </div><!-- /widget-header -->

                <div class="widget-content">
                	<?php  

                	if (isset($_POST['sendRota'])) {

                		$_logo 		= $_FILES['logo'];
                		$_nome  	= $_POST['nome'];
                		$_ideal 	= $_POST['ideal'];
                		$_fotoRota 	= $_FILES['fotoRota'];
                		

                		
                		echo '<pre>';
                			print_r($_fotoRota);
                		echo '<pre>';
                	}

                	?>






                	<form name="cadRota" method="post" action="" enctype="multipart/form-data">
                		<fieldset>
                			<div class="span11">
								<input type="file" name="logo" title="Selecione a foto representativa" />
							</div>

							<div class="span11">
								<br>
								<label><strong>Nome da rota:</strong></label>
								<input name="nome" type="text" placeholder="Nome da rota" class="input-block-level" />
							</div>

							<div class="span11">
								<label><strong>Ideal para:</strong></label>
								<input name="nome" type="text" placeholder="Ex: Família, Casal" class="input-block-level" />
							</div>
							
							<div class="span11">
								<br>
								<a href="#" class="addItem btn btn-success"><i class="icon-plus"></i>Adicionar item</a>
							</div>

							<div class="clone span11">
								<div class="span4">
									<label><strong>Foto:</strong></label>
									<input type="file" name="fotoRota[]" title="Selecione a foto da rota" />
								</div>

								<div class="span6">
									<label><strong>Valor:</strong></label>
									<input name="valor[]" type="text" placeholder="Ex: 35,00" class="input-block-level" />
								</div>

								<div class="span10">
									<label><strong>Descrição</strong></label>
									<textarea name="descricao[]" class="input-block-level" placeholder="Descrição da rota"></textarea>
								</div>

								<div class="span10">
									<label><strong>Atrações</strong></label>
									<textarea name="atracoes[]" class="input-block-level" placeholder="Atração da rota"></textarea>
								</div>
							</div><!-- clone -->


							<div class="span11">
								<br>
                            	<input type="submit" class="btn btn-success pull-right" name="sendRota" value="Cadastrar rota" />
                        	</div><!-- / -->
                		</fieldset>
                	</form>
                </div><!-- /widget-content -->
            </div><!-- /widget -->
        </div><!-- /span12 -->
    </div><!-- /row -->
</div><!-- /span12 -->
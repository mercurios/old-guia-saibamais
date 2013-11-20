<div class="row">
	<form name="updateUser" class="form-horizontal" method="post" action="<?php echo base_url('users/update') ?>">
		<div class="span12">
			<div class="widget">
				<div class="widget-head">
					<div class="pull-left"><i class="icon-pencil"></i> Editar usuário</div>
					<div class="widget-icons pull-right"></div>  
					<div class="clearfix"></div>
				</div>

				<div class="widget-content">
					<div class="padd">
							<div class="row">
								<div class="span12">
									<div class="control-group">
					    				<label for="nome" class="control-label">Nome do usuário: <span class="text-error">*</span></label>
					    				<div class="controls">
					    					<input class="span7" name="nome" type="text" value="" id="nome">
					    					<span class="help-inline"><p class="text-error"><strong></strong></p></span>
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="email" class="control-label">E-mail do usuário: <span class="text-error">*</span></label>
					    				<div class="controls">
					    					<input class="span7" name="email" type="text" value="" id="email">
					    					<span class="help-inline"><p class="text-error"><strong></strong></p></span>
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="senha" class="control-label">Senha do usuário: <span class="text-error">*</span></label>
					    				<div class="controls">
					    					<input class="span7" name="senha" type="password" value="" id="senha">
					    					<span class="help-inline"><p class="text-error"><strong></strong></p></span>
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="status" class="control-label">Status do usuário: <span class="text-error">*</span></label>
					    				<div class="controls">
					    					<select name="status">
					    						<option value="1">Ativo</option>
					    						<option value="0">Desativado</option>
					    					</select>
					    					<span class="help-inline"><p class="text-error"><strong></strong></p></span>
					    				</div>
					    			</div>
								</div>
							</div>
					</div><!-- Padd -->

					<div class="widget-foot">
						<p class="pull-right">Os campos com <strong>(*)</strong>, são obrigatórios.</p>
						<input type="submit" class="btn btn-success" name="atualizar" value="Atualizar informações" />
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
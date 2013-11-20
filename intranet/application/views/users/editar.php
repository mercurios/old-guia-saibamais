<div class="row">
	<?php if (isset($users)) : foreach ($users as $user) : ?>
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
					    					<input class="span6" name="nome" type="text" value="<?php echo $user->nome_user ?>" id="nome">
					    					<span class="help-inline"><p class="text-error"><strong><?php echo form_error('nome'); ?></strong></p></span>
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="email" class="control-label">E-mail do usuário: <span class="text-error">*</span></label>
					    				<div class="controls">
					    					<input class="span6" name="email" type="text" value="<?php echo $user->email_user ?>" id="email">
					    					<span class="help-inline"><p class="text-error"><strong><?php echo form_error('email'); ?></strong></p></span>
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="senha" class="control-label">Senha do usuário: <span class="text-error">*</span></label>
					    				<div class="controls">
					    					<input class="span6" name="senha" type="password" value="<?php echo $user->senha_user ?>" id="senha">
					    					<span class="help-inline"><p class="text-error"><strong><?php echo form_error('senha'); ?></strong></p></span>
					    				</div>
					    			</div>
								</div>

								<div class="span12">
									<div class="control-group">
					    				<label for="status" class="control-label">Status do usuário: <span class="text-error">*</span></label>
					    				<div class="controls">
					    					<select name="status">
					    						<option value="1" <?php echo ($user->status_user == 1 ? 'selected' : '') ?>>Ativo</option>
					    						<option value="0" <?php echo ($user->status_user == 0 ? 'selected' : '') ?>>Desativado</option>
					    					</select>
					    					<span class="help-inline"><p class="text-error"><strong></strong></p></span>
					    				</div>
					    			</div>
								</div>
							</div>
					</div><!-- Padd -->

					<div class="widget-foot">
						<p class="pull-right">Os campos com <strong>(*)</strong>, são obrigatórios.</p>
						<input type="hidden" name="id" value="<?php echo $user->id_user ?>">
						<input type="hidden" name="senhamd5" value="<?php echo $user->senha_user ?>">
						<input type="submit" class="btn btn-success" name="atualizar" value="Atualizar informações" />
					</div>
				</div>
			</div>
		</div>
	</form>
	<?php endforeach; endif; ?>
</div>
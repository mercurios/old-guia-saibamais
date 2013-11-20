<?php if (!empty($msg)) : ?>
<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>
	<?php echo $msg; ?>
</div>
<?php endif; ?>
<div class="container">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tabelas">
	<thead>
		<tr>
			<th>#</th>
			<th>Nome</th>
			<th>E-mail</th>
			<th>Último acesso</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>#</th>
			<th>Nome</th>
			<th>E-mail</th>
			<th>Último acesso</th>
			<th>Ações</th>
		</tr>
	</tfoot>
	<tbody>
		<?php
		if (!empty($users)) :
			foreach ($users as $user) :
		?>
		<tr>
			<td><?php echo $user->id_user ?></td>
			<td><?php echo $user->nome_user ?></td>
			<td><?php echo $user->email_user ?></td>
			<td><?php echo $user->acesso_user ?></td>
			<td>
				<div class="btn-group">
  					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Ações <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url('users/editar') . '/' . $user->id_user ?>" alt=""><i class="icon-pencil"></i> Editar</a></li>
						<li><a href="<?php echo base_url('users/excluir') . '/' . $user->id_user ?>" alt=""><i class="icon-remove"></i> Exluir</a></li>
					</ul>
				</div>
			</td>
		</tr>
		<?php
			endforeach;
		endif;
		?>
	</tbody>
</table>
</div>
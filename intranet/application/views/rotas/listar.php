<?php if (!empty($msg)) : echo $msg; endif; ?>
<div class="container">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tabelas">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Valor Total</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (!empty($rotas)) :
				foreach ($rotas as $res) :
			?>
			<tr>
				<td><?php echo $res->id_rota ?></td>
				<td><?php echo $res->titulo_rota ?></td>
				<td><?php echo $res->valor_total ?></td>
				<td>
					<a href="<?php echo base_url('rotas/excluir') . '/' . $res->id_rota ?>" title="" class="btn btn-danger"><i class="icon-remove"></i> Excluir rota</a>
				</td>
			</tr>
			<?php
				endforeach;
			endif;
			?>
		</tbody>
	</table>
</div>
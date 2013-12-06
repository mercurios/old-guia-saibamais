<?php if (!empty($msg)) : echo $msg; endif; ?>
<div class="container">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tabelas">
		<thead>
			<tr>
				<th>#</th>
				<th>Titulo</th>
				<th>Categoria</th>
				<th>Posição</th>
				<th>Editar</th>
			</tr>
		</thead>
		<tbody>
		<?php if (!empty($chamadas)) { foreach ($chamadas as $res) { ?>
			<tr>
				<td><?php echo $res->id_chamada ?></td>
				<td><?php echo $res->titulo_chamada ?></td>
				<td><?php echo $res->categoria_chamada ?></td>
				<td><?php echo $res->pos_chamada ?></td>
				<td>
					<a href="<?php echo base_url('chamadas/editar') . '/' . $res->id_chamada ?>" title="" class="btn btn-warning"><i class="icon-pencil"></i> Editar</a>
				</td>
			</tr>
		<?php } }  ?>
		</tbody>
	</table>
</div>
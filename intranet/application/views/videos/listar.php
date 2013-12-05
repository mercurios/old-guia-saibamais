<div class="container">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tabelas">
	<thead>
		<tr>
			<th>#</th>
			<th>Titulo</th>
			<th>Link</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if (!empty($videos)) :
			foreach ($videos as $video) :
		?>
		<tr>
			<td><?php echo $video->id_video ?></td>
			<td><?php echo $video->titulo_video ?></td>
			<td><?php echo $video->link_video ?></td>
			<td>
				<a href="<?php echo $video->link_video ?>" target="_blank" class="btn btn-info" title="visualizar"><i class="icon-eye-open"></i> Ver no youtube</a>
				<a href="<?php echo base_url('videos/editar') . '/' . $video->categoria_video . '/' . $video->id_cliente ?>" class="btn btn-warning" title="Editar"><i class="icon-pencil"></i> Editar</a>
				<a href="<?php echo base_url('videos/deletar') . '/' . $video->categoria_video . '/' . $video->id_cliente ?>" class="btn btn-danger" title="Excluir"><i class="icon-remove"></i> Excluir</a>
			</td>
		</tr>
		<?php
			endforeach;
		endif;
		?>
	</tbody>
</table>
</div>
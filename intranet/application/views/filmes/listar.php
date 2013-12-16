<?php if (!empty($msg)) : echo $msg; endif; ?>
<div class="container">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tabelas">
		<thead>
			<tr>
				<th>#</th>
				<th>Titulo</th>
				<th>Categoria</th>
				<th>Censura</th>
				<th><a href="<?php echo base_url('filmes/novo') . '/' . $this->uri->segment(3) ?>" class="btn btn-success"><i class="icon-plus"></i> Novo filme</a></th>
			</tr>
		</thead>

		<tbody>
			<?php  
			if (!empty($filmes))
			{
				foreach ($filmes as $res)
				{
			?>
			<tr>
				<td><?php echo $res->id_filme ?></td>
				<td><?php echo $res->titulo_filme ?></td>
				<td><?php echo $res->categoria_filme ?></td>
				<td><?php echo $res->idade_filme ?></td>
				<td>
					<a href="<?php echo base_url('filmes/editar') . '/' . $res->id_filme ?>" class="btn btn-warning"><i class="icon-pencil"></i> Editar</a>
					<a href="<?php echo base_url('filmes/excluir') . '/' . $res->id_filme ?>" class="btn btn-danger"><i class="icon-remove"></i> Exluir</a>
				</td>
			</tr>
			<?php 				
				}
			} 
			?>
		</tbody>
	</table>
</div>
<?php if (!empty($msg)) : echo $msg; endif; ?>
<div class="container">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tabelas">
		<thead>
			<tr>
				<th>#</th>
				<th>Titulo</th>
				<th>Categoria</th>
				<th>Censura</th>
				<th><a href="<?php echo base_url('pecas/novo') . '/' . $this->uri->segment(3) ?>" class="btn btn-success"><i class="icon-plus"></i> Novo peca</a></th>
			</tr>
		</thead>

		<tbody>
			<?php  
			if (!empty($pecas))
			{
				foreach ($pecas as $res)
				{
			?>
			<tr>
				<td><?php echo $res->id_peca ?></td>
				<td><?php echo $res->titulo_peca ?></td>
				<td><?php echo $res->categoria_peca ?></td>
				<td><?php echo $res->idade_peca ?></td>
				<td>
					<a href="<?php echo base_url('pecas/editar') . '/' . $res->id_peca ?>" class="btn btn-warning"><i class="icon-pencil"></i> Editar</a>
					<a href="<?php echo base_url('pecas/excluir') . '/' . $res->id_peca . '/' . $res->id_teatro ?>" class="btn btn-danger"><i class="icon-remove"></i> Exluir</a>
				</td>
			</tr>
			<?php 				
				}
			} 
			?>
		</tbody>
	</table>
</div>
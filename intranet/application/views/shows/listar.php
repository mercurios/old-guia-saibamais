<?php if (!empty($msg)) : echo $msg; endif; ?>
<div class="container">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tabelas">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Endereço</th>
				<th>Fotos</th>
				<th><a href="<?php echo base_url('shows/novo') ?>" class="btn btn-success"><i class="icon-plus"></i> Adcionar novo</a></th>
			</tr>
		</thead>

		<tbody>
			<?php
			if (!empty($shows)) :
				foreach ($shows as $res) :
			?>
			<tr>
				<td><?php echo $res->id_show ?></td>
				<td><?php echo $res->nome_show ?></td>
				<td><?php echo $res->ds_bairro_nome . ' / ' . $res->ds_cidade_nome ?></td>
				<td>
					<div class="btn-group">									
						<a href="<?php echo base_url('fotos/listar/show') . '/' . $res->id_show ; ?>" class="tool btn" title="Fotos" data-placement="top" rel="tooltip"><i class="icon-camera"></i> Fotos</a>
					</div>
				</td>
				<td>
					<a href="<?php echo base_url('shows/editar') . '/' . $res->id_show ?>" title="" class="btn btn-warning"><i class="icon-pencil"></i> Editar</a>
					<a href="<?php echo base_url('shows/excluir') . '/' . $res->id_show ?>" title="" class="btn btn-danger"><i class="icon-remove"></i> Excluir</a>
				</td>
			</tr>
			<?php
				endforeach;
			endif;
			?>
		</tbody>
	</table> 
</div>


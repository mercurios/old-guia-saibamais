<?php if (!empty($msg)) : echo $msg; endif; ?>
<div class="container">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tabelas">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Endereço</th>
				<th>Fotos</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (!empty($locais)) :
				foreach ($locais as $res) :
			?>
			<tr>
				<td><?php echo $res->id_local ?></td>
				<td><?php echo $res->nome_local ?></td>
				<td><?php echo $res->ds_bairro_nome . ' / ' . $res->ds_cidade_nome ?></td>
				<td>
					<div class="btn-group">									
						<a href="<?php echo base_url('fotos/listar/local') . '/' . $res->id_local ; ?>" class="tool btn" title="Fotos" data-placement="top" rel="tooltip"><i class="icon-camera"></i> Ver fotos</a>
					</div>
				</td>
				<td>
					<a href="<?php echo base_url('locais/editar') . '/' . $res->id_local ?>" title="" class="btn btn-warning"><i class="icon-pencil"></i> Editar</a>
					<a href="<?php echo base_url('locais/excluir') . '/' . $res->id_local ?>" title="" class="btn btn-danger"><i class="icon-remove"></i> Excluir</a>
				</td>
			</tr>
			<?php
				endforeach;
			endif;
			?>
		</tbody>
	</table>
</div>
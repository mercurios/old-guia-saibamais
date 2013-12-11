<?php if (!empty($msg)) : echo $msg; endif; ?>
<div class="container">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tabelas">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Endereço</th>
				<th>Data</th>
				<th>Fotos</th>
				<th><a href="<?php echo base_url('exposicoes/novo') ?>" class="btn btn-success"><i class="icon-plus"></i> Nova exposição</a></th>
			</tr>

		<tbody>
			<?php
			if (!empty($exposicoes)) :
				foreach ($exposicoes as $res) :
			?>
			<tr>
				<td><?php echo $res->id_exposicao ?></td>
				<td><?php echo $res->nome_exposicao ?></td>
				<td><?php echo $res->ds_bairro_nome . ' / ' . $res->ds_cidade_nome ?></td>
				<td><?php echo $res->data_exposicao ?></td>
				<td><a href="<?php echo base_url('fotos/listar/exposicao') . '/' . $res->id_exposicao ; ?>" class="tool btn" title="Fotos" data-placement="top" rel="tooltip"><i class="icon-camera"></i> Fotos</a></td>
				<td>
					<a href="<?php echo base_url('exposicoes/editar') . '/' . $res->id_exposicao ?>" title="" class="btn btn-warning"><i class="icon-pencil"></i> Editar</a>
					<a href="<?php echo base_url('exposicoes/excluir') . '/' . $res->id_exposicao ?>" title="" class="btn btn-danger"><i class="icon-remove"></i> Excluir</a>
				</td>
			</tr>
			<?php
				endforeach;
			endif;
			?>
		</tbody>
	</table>
</div>
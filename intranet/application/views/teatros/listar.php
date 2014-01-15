<?php if (!empty($msg)) : echo $msg; endif; ?>
<div class="container">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tabelas">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Endereço</th>
				<th>Opções</th>
				<th><a href="<?php echo base_url('teatros/novo') ?>" class="btn btn-success"><i class="icon-plus"></i> Adcionar novo</a></th>
			</tr>
		</thead>

		<tbody>
			<?php
			if (!empty($teatros)) :
				foreach ($teatros as $res) :
			?>
			<tr>
				<td><?php echo $res->id_teatro ?></td>
				<td><?php echo $res->nome_teatro ?></td>
				<td><?php echo $res->ds_bairro_nome . ' / ' . $res->ds_cidade_nome ?></td>
				<td>
					<div class="btn-group">									
						<a href="<?php echo base_url('fotos/listar/teatro') . '/' . $res->id_teatro ; ?>" class="tool btn" title="Fotos" data-placement="top" rel="tooltip"><i class="icon-camera"></i></a>
						<a href="<?php echo base_url('pecas/listar') . '/' . $res->id_teatro ; ?>" class="tool btn" title="Peças" data-placement="top" rel="tooltip"><i class="icon-puzzle-piece"></i></a>
					</div>
				</td>
				<td>
					<a href="<?php echo base_url('teatros/editar') . '/' . $res->id_teatro ?>" title="" class="btn btn-warning"><i class="icon-pencil"></i> Editar</a>
					<a href="<?php echo base_url('teatros/excluir') . '/' . $res->id_teatro ?>" title="" class="btn btn-danger"><i class="icon-remove"></i> Excluir</a>
				</td>
			</tr>
			<?php
				endforeach;
			endif;
			?>
		</tbody>
	</table>
</div>
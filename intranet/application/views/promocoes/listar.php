<?php 
	$_categoria = $this->uri->segment(3);
	$_idCliente = $this->uri->segment(4);
	if (!empty($msg)) : echo $msg; endif; 
?>
<div class="container">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tabelas">
	<thead>
		<tr>
			<th>#</th>
			<th>Titulo</th>
			<th>Data de início</th>
			<th>Data final</th>
			<th>Dia da semana</th>
			<th width="180"><a href="<?php echo base_url('promocoes/novo') . '/' . $_categoria . '/' . $_idCliente ?>" title="" class="btn btn-success"><i class="icon-plus"></i> Adicionar</a></th>
		</tr>
	</thead>
	<tbody>
		<?php
		if (!empty($promocoes)) :
			foreach ($promocoes as $res) :
		?>
		<tr>
			<td><?php echo $res->id_promocao ?></td>
			<td><?php echo $res->titulo_promocao ?></td>
			<td><?php echo ($res->data_inicio == '0000-00-00 00:00:00' ? 'Definido por dia da semana' : $res->data_inicio) ?></td>
			<td><?php echo ($res->data_inicio == '0000-00-00 00:00:00' ? 'Definido por dia da semana' : $res->data_final) ?></td>
			<td><?php echo (empty($res->dia_semana) ? 'Data definida por início e fim' : $res->dia_semana) ?></td>
			<td>
				<!--<a href="<?php echo base_url('promocoes/editar') . '/' . $res->categoria_promocao . '/' . $res->id_cliente . '/' . $res->id_promocao ?>" class="btn btn-warning" alt=""><i class="icon-pencil"></i> Editar</a>-->
				<a href="<?php echo base_url('promocoes/deletar') . '/' . $res->categoria_promocao . '/' . $res->id_cliente . '/' . $res->id_promocao ?>" class="btn btn-danger" alt=""><i class="icon-remove"></i> Exluir promoção</a>
			</td>
		</tr>
		<?php
			endforeach;
		endif;
		?>
	</tbody>
</table>
</div>
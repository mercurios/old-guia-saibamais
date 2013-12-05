<?php 
	$_categoria = $this->uri->segment(3);
	$_idCliente = $this->uri->segment(4);

if (!empty($msg)) : echo $msg; endif; ?>
<div class="container">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tabelas">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Tipo</th>
				<th width="180"><a href="<?php echo base_url('cardapios/novo') . '/' . $_categoria . '/' . $_idCliente ?>" title="" class="btn btn-success"><i class="icon-plus"></i> Adicionar prato</a></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Tipo</th>
				<th>Opções</th>
			</tr>
		</tfoot>
		<tbody>
			<?php
			if (!empty($cardapios)) :
				foreach ($cardapios as $res) :
			?>
			<tr>
				<td><?php echo $res->id_cardapio ?></td>
				<td><?php echo $res->nome_prato ?></td>
				<td><?php echo ($res->tipo_prato == 'pratoprincipal' ? 'Prato Principal' : ucfirst($res->tipo_prato)) ?></td>
				<td>
					<a href="<?php echo base_url('cardapios/editar') . '/' . $res->categoria_prato . '/' . $res->id_cliente . '/' . $res->id_cardapio ?>" title="" class="btn btn-warning"><i class="icon-pencil"></i> Editar</a>
					<a href="<?php echo base_url('cardapios/deletar') . '/' . $res->categoria_prato . '/' . $res->id_cliente . '/' . $res->id_cardapio ?>" title="" class="btn btn-danger"><i class="icon-remove"></i> Excluir</a>
				</td>
			</tr>
			<?php
				endforeach;
			endif;
			?>
		</tbody>
	</table>
</div>
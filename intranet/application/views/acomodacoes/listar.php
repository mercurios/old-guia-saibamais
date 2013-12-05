<?php if (!empty($msg)) : echo $msg; endif;  $_idCliente = $this->uri->segment(3); ?>
<div class="container">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tabelas">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th width="180"><a href="<?php echo base_url('acomodacoes/novo') . '/' . $_idCliente ; ?>" class="btn btn-success" title=""><i class="icon-plus"></i> Nova acomodação</a></th>
			</tr>
		</thead>
		<tbody>
		<?php 
		if (!empty($acomodacoes))
		{
			foreach ($acomodacoes as $res)
			{
		?>
		<tr>
			<td><?php echo $res->id_acomodacao ?></td>
			<td><?php echo $res->nome_acomodacao ?></td>
			<td>
				<a href="<?php echo base_url('acomodacoes/editar') . '/' . $res->id_acomodacao ; ?>" class="btn btn-warning" title=""><i class="icon-remove"></i> Editar</a>
				<a href="<?php echo base_url('acomodacoes/excluir') . '/' . $res->id_cliente . '/' . $res->id_acomodacao ; ?>" class="btn btn-danger" title=""><i class="icon-remove"></i> Excluir</a>
			</td>
		</tr>
		<?php
			}
		} 
		?>
		</tbody>
	</table>
</div>
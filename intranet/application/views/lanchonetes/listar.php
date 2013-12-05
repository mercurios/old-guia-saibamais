<?php if (!empty($msg)) : echo $msg; endif; ?>
<div class="container">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tabelas">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Endereço</th>
				<th>Opções</th>
				<th>Status</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Endereço</th>
				<th>Opções</th>
				<th>Status</th>
				<th>Ação</th>
			</tr>
		</tfoot>
		<tbody>
			<?php
			if (!empty($lanchonetes)) :
				foreach ($lanchonetes as $res) :
			?>
			<tr>
				<td><?php echo $res->id_lanchonete ?></td>
				<td><?php echo $res->nome_lanchonete ?></td>
				<td><?php echo $res->ds_bairro_nome . ' / ' . $res->ds_cidade_nome ?></td>
				<td>
					<div class="btn-group">									
						<a href="<?php echo base_url('videos/listar/lanchonete') . '/' . $res->id_lanchonete ; ?>" class="tool btn" title="Vídeos" data-placement="top" rel="tooltip"><i class="icon-film"></i></a>
						<a href="<?php echo base_url('fotos/listar/lanchonete') . '/' . $res->id_lanchonete ; ?>" class="tool btn" title="Fotos" data-placement="top" rel="tooltip"><i class="icon-camera"></i></a>
						<a href="<?php echo base_url('cardapios/listar/lanchonete') . '/' . $res->id_lanchonete ; ?>" class="tool btn" title="Cardápio" data-placement="top" rel="tooltip"><i class="icon-list"></i></a>
						<a href="<?php echo base_url('promocoes/listar/lanchonete') . '/' . $res->id_lanchonete ; ?>" class="tool btn" title="Promoções" data-placement="top" rel="tooltip"><i class="icon-thumbs-up"></i></a>
						<a href="<?php echo base_url('lanchonetes/editar') . '/' . $res->id_lanchonete ; ?>" class="tool btn" title="Editar Informações" data-placement="top" rel="tooltip"><i class="icon-info-sign"></i></a>
					</div>
				</td>
				<td><?php echo ($res->status_lanchonete == 1 ? 'Ativo' : 'Bloqueado'); ?></td>
				<td><a href="<?php echo base_url('lanchonetes/excluir') . '/' . $res->id_lanchonete ?>" title="" class="btn btn-danger"><i class="icon-remove"></i> Excluir</a></td>
			</tr>
			<?php
				endforeach;
			endif;
			?>
		</tbody>
	</table>
</div>
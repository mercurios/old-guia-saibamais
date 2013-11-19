<div class="widget-header">
    <h3>Listar cinemas</h3>
</div><!-- /widget-header -->

<div class="widget-content">
	<table id="tabela" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Endereço</th>
				<th>Opções</th>
				<th><a href="painel.php?pg=cinema-novo" class="btn btn-small btn-success" title="Adicionar novo cliente"> <i class="icon-plus"></i> Novo</a></th>
			</tr>
		</thead>
		
		<tbody>
			<?php  

			$readCinema = read('guia_cinemas');

			if ($readCinema) {
				foreach ($readCinema as $cinema) {
			?>

			<tr>
				<td><?php echo $cinema['id_cinema']; ?></td>
				<td><?php echo $cinema['nome_cinema']; ?></td>
				<td><?php echo $cinema['rua_cinema'] . ', ' . $cinema['bairro_cinema'] . ' - ' .  $cinema['cidade_cinema']; ?></td>
				<td>
					<div class="btn-group">									
						<a href="painel.php?pg=filme-listar&idcliente=<?php echo $cinema['id_cinema']; ?>" class="tool btn" title="Listar filmes" data-placement="top" rel="tooltip"><i class="icon-film"></i></a>
						<a href="painel.php?pg=fotos-listar&categoria=cinema&idcliente=<?php echo $cinema['id_cinema']; ?>" class="tool btn" title="Fotos" data-placement="top" rel="tooltip"><i class="icon-camera"></i></a>
					</div>
				</td>
				<td class="action-td">
					<a href="painel.php?pg=cinema-editar&id=<?php echo $cinema['id_cinema']; ?>" class="tool btn btn-small btn-warning" title="Editar cinema" data-placement="right" rel="tooltip">
						<i class="icon-pencil"></i>			
					</a>
					<a href="#" class="tool btn btn-small btn-danger" title="Excluir cinema" data-placement="right" rel="tooltip">
						<i class="icon-remove"></i>		
					</a>
				</td>
			</tr>

			<?php
				}
			}
			?>
		</tbody>
	</table>
</div><!-- /widget-content -->
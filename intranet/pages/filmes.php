    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">
                	<?php if (isset($_GET['task']) && $_GET['task'] == 'add') { ?>
                    <div class="widget-header">
                        <h3>Novo filme</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                    	<form name="newCinema" method="post" action="">
                    		<fieldset>
                    			<!--<div class="span11">
                                	<label class="titulo-separator"></label>
                                </div>-->

                                <div class="span11">
									<input type="file" name="foto" title="Selecione a capa do filme" />
								</div>

                                <div class="span11">
                                	<br>
                                	<label><strong>Titulo:</strong></label>
                                	<input type="text" name="titulo" class="input-block-level" value="" placeholder="Titulo do filme" />
                                </div>

                                <div class="span11">
                                	<label><strong>Sinopse:</strong></label>
                                	<textarea name="sinopse" class="input-block-level" value="" placeholder="Sinopse do filme"></textarea>
                                </div>

                                <div class="span11">
                                	<label class="titulo-separator">Horário</label>
									<p><span class="label label-warning">Aviso:</span> <small>Os horários devem ser separados por vírgulas, ex: 12:00, 14:30, 15:40</small></p>
                                </div>

                                <div class="span11">
                                	<br>
									<table class="table table-bordered table-striped">
										<thead>
											<tr class="info">
												<td width="80"><strong>Dia </strong></td>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td><strong>Domingo:</strong></td>
												<td><input class="input-block-level" name="horarioDomDe" type="text" placeholder="12:30, 13:15, 14:50, 17:00..."></td>
											</tr>

											<tr>
												<td><strong>Segunda:</strong></td>
												<td><input class="input-block-level" name="horarioDomDe" type="text" placeholder="12:30, 13:15, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Terça:</strong></td>
												<td><input class="input-block-level" name="horarioDomDe" type="text" placeholder="12:30, 13:15, 14:50, 17:00..."></td>
											</tr>

											<tr>
												<td><strong>Quarta:</strong></td>
												<td><input class="input-block-level" name="horarioDomDe" type="text" placeholder="12:30, 13:15, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Quinta:</strong></td>
												<td><input class="input-block-level" name="horarioDomDe" type="text" placeholder="12:30, 13:15, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Sexta:</strong></td>
												<td><input class="input-block-level" name="horarioDomDe" type="text" placeholder="12:30, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Sábado:</strong></td>
												<td><input class="input-block-level" name="horarioDomDe" type="text" placeholder="12:30, 13:15, 14:50, 17:00..."></td>
											</tr>
										</tbody>
									</table>
                                </div>

                                <div class="span11">
									<input type="submit" name="sendFilme" value="Cadastrar filme" class="btn btn-success pull-right" />
								</div>
                            </fieldset>
                    	</form>
                    </div><!-- /widget-content -->

                	<?php } elseif (isset($_GET['task']) && $_GET['task'] == 'edt') { ?>

                    <div class="widget-header">
                        <h3>Editar filme</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                    	<form name="newCinema" method="post" action="">
                    		<fieldset>
                    			<!--<div class="span11">
                                	<label class="titulo-separator"></label>
                                </div>-->

                                <div class="span11">
									<input type="file" name="foto" title="Selecione a capa do filme" />
								</div>

                                <div class="span11">
                                	<br>
                                	<label><strong>Titulo:</strong></label>
                                	<input type="text" name="titulo" class="input-block-level" value="" placeholder="Titulo do filme" />
                                </div>

                                <div class="span11">
                                	<label><strong>Sinopse:</strong></label>
                                	<textarea name="sinopse" class="input-block-level" value="" placeholder="Sinopse do filme"></textarea>
                                </div>

                                <div class="span11">
                                	<label class="titulo-separator">Horário</label>
                                </div>

                                <div class="span11">
									<table class="table table-bordered table-striped">
										<thead>
											<tr class="info">
												<td width="80"><strong>Dia </strong></td>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td><strong>Domingo:</strong></td>
												<td><input class="input-block-level" name="horarioDomDe" type="text" placeholder="12:30, 13:15, 14:50, 17:00..."></td>
											</tr>

											<tr>
												<td><strong>Segunda:</strong></td>
												<td><input class="input-block-level" name="horarioDomDe" type="text" placeholder="12:30, 13:15, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Terça:</strong></td>
												<td><input class="input-block-level" name="horarioDomDe" type="text" placeholder="12:30, 13:15, 14:50, 17:00..."></td>
											</tr>

											<tr>
												<td><strong>Quarta:</strong></td>
												<td><input class="input-block-level" name="horarioDomDe" type="text" placeholder="12:30, 13:15, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Quinta:</strong></td>
												<td><input class="input-block-level" name="horarioDomDe" type="text" placeholder="12:30, 13:15, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Sexta:</strong></td>
												<td><input class="input-block-level" name="horarioDomDe" type="text" placeholder="12:30, 14:50..."></td>
											</tr>

											<tr>
												<td><strong>Sábado:</strong></td>
												<td><input class="input-block-level" name="horarioDomDe" type="text" placeholder="12:30, 13:15, 14:50, 17:00..."></td>
											</tr>
										</tbody>
									</table>
                                </div>

                                <div class="span11">
									<input type="submit" name="sendFilme" value="Cadastrar filme" class="btn btn-success pull-right" />
								</div>
                            </fieldset>
                    	</form>
                    </div><!-- /widget-content -->

                	<?php } else { ?>
                    <div class="widget-header">
                        <h3>Listar lanchonetes</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                    	<table id="tabela" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Nome</th>
									<th><a href="painel.php?pg=filmes&task=add" class="btn btn-small btn-success" title="Adicionar novo cliente"> <i class="icon-plus"></i> Novo</a></th>
								</tr>
							</thead>
							
							<tbody>
								<tr>
									<td>1</td>
									<td>Homem de ferro</td>
									<td class="action-td">
										<a href="painel.php?pg=filmes&task=edt" class="tool btn btn-small btn-warning" title="Editar cinema" data-placement="right" rel="tooltip">
											<i class="icon-pencil"></i>			
										</a>
										<a href="#" class="tool btn btn-small btn-danger" title="Excluir cinema" data-placement="right" rel="tooltip">
											<i class="icon-remove"></i>		
										</a>
									</td>
								</tr>
							</tbody>
						</table>
                    </div><!-- /widget-content -->
                	<?php } ?>
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
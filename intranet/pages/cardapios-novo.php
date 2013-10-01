    <div class="span12">
        <div class="row">

            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <h3>Novo prato</h3>
                    </div><!-- /widget-header -->

                    <div class="widget-content">
                    	<?php  

                    	if (isset($_POST['sedPrato'])) {

                    		$_categoria = $_GET['categoria'];
							$_idcliente = $_GET['idcliente'];

                    		if (empty($_idcliente) || empty($_categoria)) {
								header('Location: painel.php');
							}

                    		$_nome			= $_POST['nome'];
                    		$_desc 			= $_POST['descricao'];
                    		$_tituloum 		= $_POST['tituloum'];
                    		$_titulodois 	= $_POST['titulodois'];
                    		$_titulotres 	= $_POST['titulotres'];
                    		$_valorum		= $_POST['valorum']; 
                    		$_valordois		= $_POST['valordois'];
                    		$_valortres		= $_POST['valortres'];
                    		$_tipoprato 	= $_POST['tipoprato'];
                    		$_diasemana		= $_POST['diasemana'];
                    		$_diasemana		= implode(',', $_diasemana);

                    		$dados = array(
                    			"nome_prato" 		=> $_nome,
                    			"desc_prato" 		=> $_desc,
                    			"titulo_preco_um" 	=> $_tituloum,
                    			"titulo_preco_dois" => $_titulodois,
                    			"titulo_preco_tres" => $_titulotres,
                    			"valor_preco_um" 	=> $_valorum,
                    			"valor_preco_dois" 	=> $_valordois,
                    			"valor_preco_tres" 	=> $_valortres,
                    			"tipo_prato" 		=> $_tipoprato,
                    			"dia_prato" 		=> $_diasemana,
                    			"categoria_prato" 	=> $_categoria,
                    			"id_cliente" 		=> $_idcliente
                    		);

                    		$save = create('guia_cardapios', $dados);

                    		if ($save) {
                    			message('Prato cadastrado com sucesso.', 'success');
                                salvaLog("Adicionou um novo cardápio.", $_SESSION['autUser']['nome_user']);
                    		}
                    		else {
                    			message('Erro, ao cadastrar prato', 'warning');
                    		}
                    	}
                    	?>

                    	<form name="newPrato" method="post" action="">
                    		<div class="span11">
                    			<label><strong>Nome:</strong></label>
                    			<input type="text" name="nome" value="" class="input-block-level" placeholder="Informe o nome do prato" />
                    		</div>	

                    		<div class="span11">
                    			<label><strong>Descrição:</strong></label>
                    			<textarea name="descricao" class="input-block-level limit" placeholder="Breve descrição do prato"></textarea>
                    		</div>	

                    		<div class="span3">
                    			<label><strong>Titulo:</strong></label>
                    			<input type="text" name="tituloum" value="" class="input-block-level" placeholder="Informe um titulo" />
                    		</div>	

                    		<div class="span3 offset1">
                    			<label><strong>Titulo:</strong></label>
                    			<input type="text" name="titulodois" value="" class="input-block-level" placeholder="Informe um titulo" />
                    		</div>	

                    		<div class="span3 offset1">
                    			<label><strong>Titulo:</strong></label>
                    			<input type="text" name="titulotres" value="" class="input-block-level" placeholder="Informe um titulo" />
                    		</div>	

                    		<div class="span3">
                    			<label><strong>Valor:</strong></label>
                    			<input type="text" name="valorum" value="" class="input-block-level" placeholder="Informe um valor (10,00)" />
                    		</div>	

                    		<div class="span3 offset1">
                    			<label><strong>Valor:</strong></label>
                    			<input type="text" name="valordois" value="" class="input-block-level" placeholder="Informe um valor (20,00)" />
                    		</div>	

                    		<div class="span3 offset1">
                    			<label><strong>Valor:</strong></label>
                    			<input type="text" name="valortres" value="" class="input-block-level" placeholder="Informe um valor (30,00)" />
                    		</div>	

                    		<div class="span11">
                    			<label><strong>Tipo de prato:</strong></label>
                    			<select name="tipoprato">
                    				<option value="normal">Normal</option>
                    				<option value="pratoprincipal">Prato principal</option>
                    			</select>
                    		</div>

                    		<div class="span11">
                    			<label><strong>Dia da semana:</strong></label>
                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="segunda"> <strong>Segunda</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="terça"> <strong>Terça</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="quarta"> <strong>Quarta</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="quinta"> <strong>Quinta</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="sexta"> <strong>Sexta</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="sabado"> <strong>Sábado</strong>
                                </label>

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" name="diasemana[]" value="domingo"> <strong>Domingo</strong>
                                </label>
                    		</div>

                    		<div class="span11">
                    			<input type="submit" name="sedPrato" class="btn btn-success pull-right" value="Cadastrar prato" />
                    		</div>
                    	</form>
                    </div><!-- /widget-content -->
                </div><!-- /widget -->
            </div><!-- /span12 -->
        </div><!-- /row -->
    </div><!-- /span12 -->
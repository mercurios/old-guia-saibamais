$(document).ready( function () {

	// Tabela
	$('#tabelas').dataTable( {
		"sDom": "<'row-fluid'<'span6'T><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
		"oTableTools": {
			"sSwfPath": "http://www.datatables.net/release-datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf",
			"aButtons": [

				{
					"sExtends": "copy",
					"sButtonText": "Copiar resultados"
				},

				{
					"sExtends": "print",
					"sButtonText": "Imprimir"
				},

				{
					"sExtends":    "collection",
					"sButtonText": 'Salvar <span class="caret" />',
					"aButtons":    [ "csv", "xls", "pdf" ]
				}
			]
		}
	});

	// Tooltip Bootstrap
	$('.tool').tooltip();

	// Input file custom
	$(":file").filestyle();

	// Função para resetar um campo no combo de cidades
	function resetaCombo( el ) {

		// Informa o nome informado no parametro
		$("select[name='"+el+"']").empty();

		// Cria um elemento option
		var option = document.createElement('option');                                
		$( option ).attr( {value : ''} );
		$( option ).append( '-- Escolha --' );
		$("select[name='"+el+"']").append( option );
	}

	// Combo dos estados
	$('#estado').change(function(){

		// Pega o valor do estado
		estado = $(this).val();

		// Verifica se o valor retorna nulo
		if (estado === '')
			return false;

		// Reseta o combo
		resetaCombo('cidade');
		resetaCombo('bairro');

		// Pega as cidades para o combo
        $.getJSON( thePath + 'enderecoController/getCidades/' + estado, function (data){
    
            //  console.log(data);
            var option = new Array();
        
            $.each(data, function(i, obj){

                option[i] = document.createElement('option');
                $( option[i] ).attr( {value : obj.id} );
                $( option[i] ).append( obj.nome );

                $("#cidade").append( option[i] );
            });
        });
	});

	// Pega as cidades para o combo
    $("#cidade").change(function(){

    	// Pega o valor da cidade
        cidade = $(this).val();
        
        if ( cidade === '')
            return false;
        
        resetaCombo('bairro');

        // Pega as cidades
        $.getJSON( thePath + 'enderecoController/getBairros/' + cidade, function (data){
    
            //  console.log(data);
            var option = new Array();
        
            $.each(data, function(i, obj){

                option[i] = document.createElement('option');
                $( option[i] ).attr( {value : obj.id} );
                $( option[i] ).append( obj.nome );

                $("#bairro").append( option[i] );
            });
        });
    });

    // Mascara nos inputs
    $(".maskTelefone").mask("(99) 9999.9999");
    $(".maskCep").mask("99999-999");
	
});

$(document).ready( function () {

	$('.clonar:first').find('.removeItem').hide();

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
	
	// Data início e final das promoções datepicker
	var nowTemp = new Date();
	var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

	var checkin = $('#dataInicio').datepicker({
		onRender: function(date) {
			return date.valueOf() < now.valueOf() ? 'disabled' : '';
		}
	}).on('changeDate', function(ev) {
		if (ev.date.valueOf() > checkout.date.valueOf()) {
			var newDate = new Date(ev.date)
			newDate.setDate(newDate.getDate() + 1);
			checkout.setValue(newDate);
		}

		checkin.hide();

		$('#dataFinal')[0].focus();

	}).data('datepicker');

	var checkout = $('#dataFinal').datepicker({
		onRender: function(date) {
			return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
		}
	}).on('changeDate', function(ev) {
		checkout.hide();
	}).data('datepicker');

	// Validando o campo promoção
	$('.addItem').click(function(){
		$('.clonar:first').clone().insertAfter(".clonar:last")
		.append('<div class="span10"><span href="#" class="removeItem btn btn-danger pull-right"><i class="icon-remove"></i> Deletar item</span></div>');
	});

	$(document).on('click', '.removeItem', function(evt){
	    evt.preventDefault();
	    $(this).parents('.clonar').remove();
	});

	// Datepicker
	$(".data").datepicker({
	    dateFormat: 'dd/mm/yy',
	    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
	    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
	    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
	    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
	    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
	    nextText: 'Próximo',
	    prevText: 'Anterior'
	});
});
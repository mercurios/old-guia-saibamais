$('.tool').tooltip();

$('#myModal').modal('show');
$('.abrir').modal();

$('#tabela').dataTable({
    "bPaginate": true,
    "bJQueryUI": false,
    "sPaginationType": "full_numbers"
});

$('.limit').jqEasyCounter();

$('.addItem').click(function(){
	$('.clone:first').clone().insertAfter(".clone:last")
	.append('<div class="span10"><a href="#" class="removeItem btn btn-danger pull-right"><i class="icon-remove"></i> Deletar item</a></div>');
});

$('.removeItem').live('click', function(evt){
    evt.preventDefault();
    $(this).parents('.clone').remove();
});

$(function() {
    $(".data").datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
    });
});
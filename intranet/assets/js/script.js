$(document).ready( function () {
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
});
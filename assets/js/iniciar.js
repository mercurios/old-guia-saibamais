// JavaScript Document
$(document).ready(function (){

	/*Inicialização do sllide de publicidade do meio*/
    $('.publicidade_simples').cycle({
		fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
	});
	
	$('.chamada_imagem p').each(function(){
		//...set the opacity to 0...
		$(this).css('opacity', 0);
		//..set width same as the image...
		$(this).css('width', $(this).siblings('img').width());
		//...get the parent (the wrapper) and set it's width same as the image width... '
		$(this).parent().css('width', $(this).siblings('img').width());
		//...set the display to block
		$(this).css('display', 'block');
	});
	
	$('.chamada_imagem').hover(function(){
		//when mouse hover over the wrapper div
		//get it's children elements with class descriptio
		//and show it using fadeTo
		$(this).children('.chamada_imagem p').stop().fadeTo(200, 0.7);
	},function(){
		//when mouse out of the wrapper div
		//use fadeTo to hide the div
		$(this).children('.chamada_imagem p').stop().fadeTo(200, 0);
	});
	
	// Filtragem Restaurante
	$('#filtrar_local').change(function(){

		var local 		= $('#filtrar_local').val();
		var adaptado 	= $('#filtrar_adaptado').val();
		var comida 		= $('#filtrar_comida').val();
		var ordem 		= $('#filtrar_ordem').val();

		// Nova url
		var newUrl = path + 'restaurantes/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	// Filtragem Restaurante
	$('#filtrar_adaptado').change(function(){

		var local 		= $('#filtrar_local').val();
		var adaptado 	= $('#filtrar_adaptado').val();
		var comida 		= $('#filtrar_comida').val();
		var ordem 		= $('#filtrar_ordem').val();

		// Nova url
		var newUrl = path + 'restaurantes/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	// Filtragem Restaurante
	$('#filtrar_comida').change(function(){

		var local 		= $('#filtrar_local').val();
		var adaptado 	= $('#filtrar_adaptado').val();
		var comida 		= $('#filtrar_comida').val();
		var ordem 		= $('#filtrar_ordem').val();

		// Nova url
		var newUrl = path + 'restaurantes/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	// Filtragem Restaurante
	$('#filtrar_ordem').change(function(){

		var local 		= $('#filtrar_local').val();
		var adaptado 	= $('#filtrar_adaptado').val();
		var comida 		= $('#filtrar_comida').val();
		var ordem 		= $('#filtrar_ordem').val();

		// Nova url
		var newUrl = path + 'restaurantes/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	/*	
		Filtragem de lanchonetes
		-> Local
		-> Adpatado
		-> Lanches
		-> Ordem
	*/
	$('#filtrar_local_lanchonete').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_lanchonete').val();
		var adaptado 	= $('#filtrar_adaptado_lanchonete').val();
		var comida 		= $('#filtrar_comida_lanchonete').val();
		var ordem 		= $('#filtrar_ordem_lanchonete').val();

		// Nova url
		var newUrl = path + 'lanchonetes/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_adaptado_lanchonete').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_lanchonete').val();
		var adaptado 	= $('#filtrar_adaptado_lanchonete').val();
		var comida 		= $('#filtrar_comida_lanchonete').val();
		var ordem 		= $('#filtrar_ordem_lanchonete').val();

		// Nova url
		var newUrl = path + 'lanchonetes/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_comida_lanchonete').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_lanchonete').val();
		var adaptado 	= $('#filtrar_adaptado_lanchonete').val();
		var comida 		= $('#filtrar_comida_lanchonete').val();
		var ordem 		= $('#filtrar_ordem_lanchonete').val();

		// Nova url
		var newUrl = path + 'lanchonetes/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_ordem_lanchonete').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_lanchonete').val();
		var adaptado 	= $('#filtrar_adaptado_lanchonete').val();
		var comida 		= $('#filtrar_comida_lanchonete').val();
		var ordem 		= $('#filtrar_ordem_lanchonete').val();

		// Nova url
		var newUrl = path + 'lanchonetes/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	/*	
		Filtragem de Bebidas
		-> Local
		-> Adpatado
		-> Lanches
		-> Ordem
	*/
	$('#filtrar_local_bebida').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_bebida').val();
		var adaptado 	= $('#filtrar_adaptado_bebida').val();
		var comida 		= $('#filtrar_comida_bebida').val();
		var ordem 		= $('#filtrar_ordem_bebida').val();

		// Nova url
		var newUrl = path + 'bebidas/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_adaptado_bebida').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_bebida').val();
		var adaptado 	= $('#filtrar_adaptado_bebida').val();
		var comida 		= $('#filtrar_comida_bebida').val();
		var ordem 		= $('#filtrar_ordem_bebida').val();

		// Nova url
		var newUrl = path + 'bebidas/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_comida_bebida').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_bebida').val();
		var adaptado 	= $('#filtrar_adaptado_bebida').val();
		var comida 		= $('#filtrar_comida_bebida').val();
		var ordem 		= $('#filtrar_ordem_bebida').val();

		// Nova url
		var newUrl = path + 'bebidas/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_ordem_bebida').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_bebida').val();
		var adaptado 	= $('#filtrar_adaptado_bebida').val();
		var comida 		= $('#filtrar_comida_bebida').val();
		var ordem 		= $('#filtrar_ordem_bebida').val();

		// Nova url
		var newUrl = path + 'bebidas/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	/*	
		Filtragem de estadias
		-> Local
		-> Adpatado
		-> tipo
		-> Ordem
	*/
	$('#filtrar_local_estadia').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_estadia').val();
		var adaptado 	= $('#filtrar_adaptado_estadia').val();
		var comida 		= $('#filtrar_tipo_estadia').val();
		var ordem 		= $('#filtrar_ordem_estadia').val();

		// Nova url
		var newUrl = path + 'estadias/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_adaptado_estadia').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_estadia').val();
		var adaptado 	= $('#filtrar_adaptado_estadia').val();
		var comida 		= $('#filtrar_tipo_estadia').val();
		var ordem 		= $('#filtrar_ordem_estadia').val();

		// Nova url
		var newUrl = path + 'estadias/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_tipo_estadia').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_estadia').val();
		var adaptado 	= $('#filtrar_adaptado_estadia').val();
		var comida 		= $('#filtrar_tipo_estadia').val();
		var ordem 		= $('#filtrar_ordem_estadia').val();

		// Nova url
		var newUrl = path + 'estadias/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_ordem_estadia').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_estadia').val();
		var adaptado 	= $('#filtrar_adaptado_estadia').val();
		var comida 		= $('#filtrar_tipo_estadia').val();
		var ordem 		= $('#filtrar_ordem_estadia').val();

		// Nova url
		var newUrl = path + 'estadias/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	/*	
		Filtragem de Locais
		-> Local
		-> Adpatado
		-> tipo
		-> Ordem
	*/
	$('#filtrar_local_locais').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_locais').val();
		var adaptado 	= $('#filtrar_adaptado_locais').val();
		var comida 		= $('#filtrar_atividades').val();
		var ordem 		= $('#filtrar_ordem').val();

		// Nova url
		var newUrl = path + 'locais/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_adaptado_locais').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_locais').val();
		var adaptado 	= $('#filtrar_adaptado_locais').val();
		var comida 		= $('#filtrar_atividades').val();
		var ordem 		= $('#filtrar_ordem').val();

		// Nova url
		var newUrl = path + 'locais/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_atividades').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_locais').val();
		var adaptado 	= $('#filtrar_adaptado_locais').val();
		var comida 		= $('#filtrar_atividades').val();
		var ordem 		= $('#filtrar_ordem').val();

		// Nova url
		var newUrl = path + 'locais/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_ordem').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_locais').val();
		var adaptado 	= $('#filtrar_adaptado_locais').val();
		var comida 		= $('#filtrar_atividades').val();
		var ordem 		= $('#filtrar_ordem').val();

		// Nova url
		var newUrl = path + 'locais/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});
	
	/*	
		Filtragem de lazer
	*/

	$('#filtrar_local_lazer').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_lazer').val();
		var adaptado 	= $('#filtrar_adaptado_lazer').val();

		// Nova url
		var newUrl = path + 'lazer/filtrar/' + adaptado + '/' + local;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_adaptado_lazer').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_lazer').val();
		var adaptado 	= $('#filtrar_adaptado_lazer').val();

		// Nova url
		var newUrl = path + 'lazer/filtrar/' + adaptado + '/' + local;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_categoria_lazer').change(function(){

		// Define variáveis para os filtros
		var categoria = $('#filtrar_categoria_lazer').val();

		// Redireciona
		$(window.document.location).attr('href', path + categoria + '/categoria' );
	});

	$('#filtrar_ordem_lazer').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_lazer').val();
		var adaptado 	= $('#filtrar_adaptado_lazer').val();
		var ordem 		= $('#filtrar_ordem_lazer').val();

		// Nova url
		var newUrl = path + 'lazer/filtrar/' + adaptado + '/' + local + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	/*	
		Filtragem de cinemas
		-> Local
		-> Adpatado
		-> Ordem
	*/
	$('#filtro_local_cinema').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtro_local_cinema').val();
		var adaptado 	= $('#filtro_adaptado_cinema').val();
		var ordem 		= $('#filtrar_ordem').val();

		// Nova url
		var newUrl = path + 'cinemas/filtrar/' + local + '/' + adaptado + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtro_adaptado_cinema').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtro_local_cinema').val();
		var adaptado 	= $('#filtro_adaptado_cinema').val();
		var ordem 		= $('#filtrar_ordem').val();

		// Nova url
		var newUrl = path + 'cinemas/filtrar/' + local + '/' + adaptado + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtro_ordem_cinema').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtro_local_cinema').val();
		var adaptado 	= $('#filtro_adaptado_cinema').val();
		var ordem 		= $('#filtro_ordem_cinema').val();

		// Nova url
		var newUrl = path + 'cinemas/filtrar/' + local + '/' + adaptado + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});
	
	/*	
		Filtragem de exposições
		-> Local
		-> Adpatado
		-> Ordem
	*/
	$('#filtro_local_exposicao').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtro_local_exposicao').val();
		var adaptado 	= $('#filtro_adaptado_exposicao').val();
		var ordem 		= $('#filtrar_ordem_exposicao').val();

		// Nova url
		var newUrl = path + 'exposicoes/filtrar/' + local + '/' + adaptado + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_ordem_exposicao').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtro_local_exposicao').val();
		var adaptado 	= $('#filtro_adaptado_exposicao').val();
		var ordem 		= $('#filtrar_ordem_exposicao').val();

		// Nova url
		var newUrl = path + 'exposicoes/filtrar/' + local + '/' + adaptado + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtro_adaptado_exposicao').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtro_local_exposicao').val();
		var adaptado 	= $('#filtro_adaptado_exposicao').val();
		var ordem 		= $('#filtrar_ordem_exposicao').val();

		// Nova url
		var newUrl = path + 'exposicoes/filtrar/' + local + '/' + adaptado + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	/*	
		Filtragem de Eventos
		-> Local
		-> Adpatado
		-> Ordem
	*/
	$('#filtro_local_evento').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtro_local_evento').val();
		var adaptado 	= $('#filtro_adaptado_evento').val();
		var ordem 		= $('#filtrar_ordem_evento').val();

		// Nova url
		var newUrl = path + 'eventos/filtrar/' + local + '/' + adaptado + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_ordem_evento').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtro_local_evento').val();
		var adaptado 	= $('#filtro_adaptado_evento').val();
		var ordem 		= $('#filtrar_ordem_evento').val();

		// Nova url
		var newUrl = path + 'eventos/filtrar/' + local + '/' + adaptado + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtro_adaptado_evento').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtro_local_evento').val();
		var adaptado 	= $('#filtro_adaptado_evento').val();
		var ordem 		= $('#filtrar_ordem_evento').val();

		// Nova url
		var newUrl = path + 'eventos/filtrar/' + local + '/' + adaptado + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	/*	
		Filtragem de show
		-> Local
		-> Adpatado
		-> Ordem
	*/
	$('#filtro_local_show').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtro_local_show').val();
		var adaptado 	= $('#filtro_adaptado_show').val();
		var ordem 		= $('#filtrar_ordem_show').val();

		// Nova url
		var newUrl = path + 'shows/filtrar/' + local + '/' + adaptado + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtro_ordem_show').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtro_local_show').val();
		var adaptado 	= $('#filtro_adaptado_show').val();
		var ordem 		= $('#filtro_ordem_show').val();

		// Nova url
		var newUrl = path + 'shows/filtrar/' + local + '/' + adaptado + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtro_adaptado_show').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtro_local_show').val();
		var adaptado 	= $('#filtro_adaptado_show').val();
		var ordem 		= $('#filtrar_ordem_show').val();

		// Nova url
		var newUrl = path + 'shows/filtrar/' + local + '/' + adaptado + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	/*	
		Filtragem de teatro
		-> Local
		-> Adpatado
		-> Ordem
	*/
	$('#filtro_local_teatro').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtro_local_teatro').val();
		var adaptado 	= $('#filtro_adaptado_teatro').val();
		var ordem 		= $('#filtrar_ordem_teatro').val();

		// Nova url
		var newUrl = path + 'teatros/filtrar/' + local + '/' + adaptado + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtro_ordem_teatro').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtro_local_teatro').val();
		var adaptado 	= $('#filtro_adaptado_teatro').val();
		var ordem 		= $('#filtro_ordem_teatro').val();

		// Nova url
		var newUrl = path + 'teatros/filtrar/' + local + '/' + adaptado + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtro_adaptado_teatro').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtro_local_teatro').val();
		var adaptado 	= $('#filtro_adaptado_teatro').val();
		var ordem 		= $('#filtrar_ordem_teatro').val();

		// Nova url
		var newUrl = path + 'teatros/filtrar/' + local + '/' + adaptado + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtro_local_entretenimento').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtro_local_entretenimento').val();
		var adaptado 	= $('#filtro_adaptado_entretenimento').val();

		// Nova url
		var newUrl = path + 'entretenimentos/filtrar/' + local + '/' + adaptado;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtro_adaptado_entretenimento').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtro_local_entretenimento').val();
		var adaptado 	= $('#filtro_adaptado_entretenimento').val();

		// Nova url
		var newUrl = path + 'entretenimentos/filtrar/' + local + '/' + adaptado;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filter_categoria_entretenimento').change(function(){

		// Define variáveis para os filtros
		var categoria 		= $('#filter_categoria_entretenimento').val();

		// Nova url
		var newUrl = path + categoria;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	
















































/*Fim da inicialização*/
});

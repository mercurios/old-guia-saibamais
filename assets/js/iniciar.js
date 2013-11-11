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
		-> Lanches
		-> Ordem
	*/
	$('#filtrar_local_estadia').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_estadia').val();
		var adaptado 	= $('#filtrar_adaptado_estadia').val();
		var comida 		= $('#filtrar_comida_estadia').val();
		var ordem 		= $('#filtrar_ordem_estadia').val();

		// Nova url
		var newUrl = path + 'estadias/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_adaptado_bebida').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_estadia').val();
		var adaptado 	= $('#filtrar_adaptado_estadia').val();
		var comida 		= $('#filtrar_comida_estadia').val();
		var ordem 		= $('#filtrar_ordem_estadia').val();

		// Nova url
		var newUrl = path + 'estadias/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_comida_bebida').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_estadia').val();
		var adaptado 	= $('#filtrar_adaptado_estadia').val();
		var comida 		= $('#filtrar_comida_estadia').val();
		var ordem 		= $('#filtrar_ordem_estadia').val();

		// Nova url
		var newUrl = path + 'estadias/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_ordem_bebida').change(function(){

		// Define variáveis para os filtros
		var local 		= $('#filtrar_local_estadia').val();
		var adaptado 	= $('#filtrar_adaptado_estadia').val();
		var comida 		= $('#filtrar_comida_estadia').val();
		var ordem 		= $('#filtrar_ordem_estadia').val();

		// Nova url
		var newUrl = path + 'estadias/filtrar/' + local + '/' + adaptado + '/' + comida + '/' + ordem;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});
	
	

	

































/*Fim da inicialização*/
});

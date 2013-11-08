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

		// Pega o valor do campo
		var localizacao = $(this).val();

		// Nova url
		var newUrl = path + 'restaurantes/filtrar/' + localizacao;

		// Redireciona
		$(window.document.location).attr('href',newUrl);
	});

	$('#filtrar_adaptado').change(function(){

		// Url atual
		var url = path + 'restaurantes/filtrar/' + $('#filtrar_local').val();

		// Pega o valor do campo
		var adaptado = $(this).val();

		// Nova url
		var novaUrl = url + '/' + adaptado;

		// Redireciona
		$(window.document.location).attr('href', novaUrl);
	});

	$('#filtrar_comida').change(function(){

		// Url atual
		var url = path + 'restaurantes/filtrar/' + $('#filtrar_local').val() + '/' + $('#filtrar_adaptado').val();

		// Pega o valor do campo
		var comida = $(this).val();

		// Nova url
		var urlComida = url + '/' + comida;

		// Redireciona
		$(window.document.location).attr('href', urlComida);
	});
	

	

































/*Fim da inicialização*/
});

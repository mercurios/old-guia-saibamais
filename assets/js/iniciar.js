// JavaScript Document


$(document).ready(function (){
	/*for each description div...
	$('.chamada_caption p').each(function(){
		//...set the opacity to 0...
		$(this).css('opacity', 0);
		//..set width same as the image...
		$(this).css('width', $(this).siblings('img').width());
		//...get the parent (the wrapper) and set it's width same as the image width... '
		$(this).parent().css('width', $(this).siblings('img').width());
		//...set the display to block
		$(this).css('display', 'block');
	});
	
	$('.chamada_caption').hover(function(){
		//when mouse hover over the wrapper div
		//get it's children elements with class descriptio
		//and show it using fadeTo
		$(this).children('.chamada_caption p').stop().fadeTo(200, 0.7);
	},function(){
		//when mouse out of the wrapper div
		//use fadeTo to hide the div
		$(this).children('.chamada_caption p').stop().fadeTo(200, 0);
	});*/
	
/*Inicialização do sllide de publicidade do meio*/
    $('.publicidade_simples').cycle({
		fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
	});
/*Inicialização do album de fotos*/
$("#pikame").PikaChoose({carousel:true});

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


	// Ajax campo de pesquisa
	function searchresults()
	{
		 alert("teste");
	}

























/*Fim da inicialização*/
});

$(document).ready(function(){
	
	$('div#main-content table tr:odd').addClass("tr_swap2");
	$('div#main-content table tr:even').addClass("tr_swap");
	$("div#main-content table tr").hover(function(){
		$(this).addClass("tr_hover")
	},function(){
		$(this).removeClass("tr_hover")
	});
	
});

$(document).ready(function(){
	
	$('div#main-content table tr:odd').addClass("tr_swap2");
	$('div#main-content table tr:even').addClass("tr_swap");
	$("div#main-content table tr").hover(function(){
		$(this).addClass("tr_hover")
		},function(){
			$(this).removeClass("tr_hover")
	});

	$("#select_all").click(
			function(){
			    if(this.checked){
			        $("input[id='all[]']").each(function(){this.checked=true;});
			    }else{
			        $("input[id='all[]']").each(function(){this.checked=false;});
			    }
			}
		);
	
	$(".act-del").parent().click(
			function(){
				if (confirm('Are you sure delete selected ?')) {
					$("form").submit();
					
				}
				return false;
				
			}
	);
	

});

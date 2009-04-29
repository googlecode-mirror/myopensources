jQuery(document).ready(function(){

	//hide tab2, tab3
	$('#tab2').hide();
	$('#tab3').hide();
	
	$('.tab-item-1').click(
		function(){
			$('#tab1').show();
			$('#tab2').hide();
			$('#tab3').hide();

		}
	);
	
	$('.tab-item-2').click(
		function(){
			$('#tab1').hide();
			$('#tab2').show();
			$('#tab3').hide();

		}
	);
	
	$('.tab-item-3').click(
		function(){
			$('#tab1').hide();
			$('#tab2').hide();
			$('#tab3').show();

		}
	);


});

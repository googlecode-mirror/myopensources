<?php 
$inline_script = <<<EOD
$().ready(function() {
    var options = { 
        target:        '.jqmdMSG',   // target element(s) to be updated with server response 
        success:       showResponse  // post-submit callback 
 
    }; 
 
    // bind form using 'ajaxForm' 
    $('#AddForm').ajaxForm(options); 

});

// post-submit callback 
function showResponse(responseText, statusText)  {
	var patrn=/^done/;
	if ( patrn.test(responseText) ) {
		$('#ex4').jqmHide();
		location.reload();		
		
	}
 	
} 	

EOD;
echo $javascript->codeBlock($inline_script);
?>

<div class="financeCategories form">
<?php echo $form->create('FinanceCategory', array('id'=>'AddForm' ) );?>
	<fieldset>
 		<legend><?php __('Add FinanceCategory');?></legend>
	<?php
		echo $form->input('category_name');
		echo $form->input('active');
		echo $form->input('add_ip');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>

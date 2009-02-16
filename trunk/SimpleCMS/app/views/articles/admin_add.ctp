<?php 
$inline_script = <<<EOD
$().ready(function() {
    var options = { 
        target:        '.jqmdMSG',   // target element(s) to be updated with server response 
        //beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse  // post-submit callback 
 
    }; 
 
    // bind form using 'ajaxForm' 
    $('#AddForm').ajaxForm(options); 

});

// pre-submit callback 
function showRequest(formData, jqForm, options) { 
    var queryString = $.param(formData); 
    alert('About to submit: \\n\\n' + queryString); 
    return true; 
} 
 
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

<div class="articles form">
<?php echo $form->create('Article', array('enctype' => 'multipart/form-data', 'id'=>'AddForm' ) );?>
	<fieldset>
 		<legend><?php __('Add Article');?></legend>
	<?php
		echo $form->input('article_categories_id');
		echo $form->input('title');
		echo $form->input('contents');
		echo $form->input('photo', array('label'=>__("Image", true), 'type'=>'file' ));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Articles', true), array('action'=>'index'));?></li>
	</ul>
</div>

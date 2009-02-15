<?php 
$inline_script = <<<EOD
$().ready(function() {
    var options = { 
        target:        '#articles',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse  // post-submit callback 
 
    }; 
 
    // bind form using 'ajaxForm' 
    $('#AddForm').ajaxForm(options); 

});

// pre-submit callback 
function showRequest(formData, jqForm, options) { 
    // formData is an array; here we use $.param to convert it to a string to display it 
    // but the form plugin does this for you automatically when it submits the data 
    var queryString = $.param(formData); 
 
    // jqForm is a jQuery object encapsulating the form element.  To access the 
    // DOM element for the form do this: 
    // var formElement = jqForm[0]; 
 
    alert('About to submit: \\n\\n' + queryString); 
 
    // here we could return false to prevent the form from being submitted; 
    // returning anything other than false will allow the form submit to continue 
    return true; 
} 
 
// post-submit callback 
function showResponse(responseText, statusText)  { 
    // for normal html responses, the first argument to the success callback 
    // is the XMLHttpRequest object's responseText property 
 
    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'xml' then the first argument to the success callback 
    // is the XMLHttpRequest object's responseXML property 
 
    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'json' then the first argument to the success callback 
    // is the json data object returned by the server 
 
    alert('status: ' + statusText + '\\n\\nresponseText: \\n' + responseText + 
        '\\n\\nThe output div should have already been updated with the responseText.'); 
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

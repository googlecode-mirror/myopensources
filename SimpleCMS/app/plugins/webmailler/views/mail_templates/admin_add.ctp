<?php 
echo $html->css( array("attachments") );
echo $javascript->link( array('attachments') ); 
?>
<div class="mailTemplates form">
<?php echo $form->create('MailTemplate', array('id'=>'AddForm','enctype' => 'multipart/form-data' ) );?>
	<fieldset>
 		<legend><?php __('Add MailTemplate');?></legend>
	<?php
		echo $form->input('title', array('size'=>60));
		echo $form->input('subject', array('size'=>60));
//		echo $form->input('content', array('id'=>'content', 'cols'=>45, 'rows'=>20));
		echo $tinymce->input (
		    'content',
		    array (
		        'label' => false,
		        'style' => 'height:350px; width:98%;',

		    ),
		    array (
		        'mode' => 'textareas',
		        'theme' => 'advanced',
		        'theme_advanced_toolbar_location' => 'top',
		        'theme_advanced_toolbar_align' => 'left',
//		        'theme_advanced_statusbar_location' => 'bottom',
		        //'theme_advanced_resizing' => true,
		    )
		);		
		
		echo $form->input('plain_text', array('type'=>'checkbox'));
		echo $html->link(__("Add Attachments", true), "javascript:void(0);", array('id'=>'add_attach'));
	?>
	<ul id="attachments">
		
	</ul>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>

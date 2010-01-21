<?php 
echo $html->css( array("attachments") );
echo $javascript->link( array('attachments') ); 
?>
<div class="mailTemplates form">
<?php echo $form->create('MailTemplate', array('id'=>'AddForm','enctype' => 'multipart/form-data' ) );?>
	<fieldset>
 		<legend><?php __('Add MailTemplate');?></legend>
 		
 		<div id="mail-to">
		 <div class="multi-select">
		  <?php echo $form->input('categories', array( 
				  'label'=>__("Customer groups", true), 
	  			  'id'=>'select1', 
				  'type' => 'select',
		  		  'options' => $mailCustomerCategories, 
				  'multiple' => true 
			  )); 
		  ?>  
		  <a href="#" id="add"><?php __("Add to") ?> &gt;&gt;</a>  
		 </div>  
		 
		 <div class="multi-select" >  
		  <?php echo $form->input('to', array( 'label'=>__("Will receive email groups", true), 'id'=>'select2', 'type' => 'select', 'multiple' => true )); ?>  
		  <a href="#" id="remove">&lt;&lt; <?php __("Remove") ?></a>  
		 </div> 
		 
		</div> 
	<?php
		echo $form->input('from', array('label'=>__("Sender Name", true)) );
		echo $form->input('from_name', array('label'=>__("Reply Email", true)) );
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
	<br/>
	<div><?php __("Template tips"); ?></div>
	
	</fieldset>
<?php echo $form->end('Submit');?>
</div>

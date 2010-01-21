<?php 
echo $html->css( array("attachments") );
echo $javascript->link( array('attachments') ); 
?>
<div class="mailTemplates form">
<?php echo $form->create('MailTemplate', array('id'=>'AddForm', 'enctype' => 'multipart/form-data') );?>
	<fieldset>
 		<legend><?php __('Edit MailTemplate');?></legend>
 		
 		<div id="mail-to">
		 <div class="multi-select">
		  <?php echo $form->input('categories', array( 
				  'label'=>__("Customer groups", true), 
	  			  'id'=>'select1', 
				  'type' => 'select',
		  		  'options' => $uncheck_groups, 
				  'multiple' => true 
			  )); 
		  ?>  
		  <a href="#" id="add"><?php __("Add to") ?> &gt;&gt;</a>  
		 </div>  
		 
		 <div class="multi-select" >  
		  <?php echo $form->input('to', array( 
				  'label'=>__("Will receive email groups", true), 
				  'id'=>'select2', 
				  'type' => 'select',
		  		  'selected' => true,
		  		  'options' => $checked_groups, 
		  		  'multiple' => true 
		  )); ?>  
		  <a href="#" id="remove">&lt;&lt; <?php __("Remove") ?></a>  
		 </div> 
		 
		</div> 
	<?php
		echo $form->input('id');
		echo $form->input('from', array('label'=>__("Sender Name", true)) );
		echo $form->input('from_name', array('label'=>__("Reply Email", true)) );
		echo $form->input('title', array('size'=>60));
		echo $form->input('subject', array('size'=>60));
//		echo $form->input('content');
		echo $tinymce->input (
		    'content',
		    array (
		        'label' => false,
		        'style' => 'height:350px; width:98%;',

		    ),
		    array (
		        'mode' => 'textareas',
		        'theme' => 'advanced',
		    )
		);		
		echo $form->input('plain_text', array('type'=>'checkbox'));
		echo $html->link(__("Add Attachments", true), "javascript:void(0);", array('id'=>'add_attach'));
	?>
	<ul id="attachments">
		<?php foreach ($attachments as $attach): ?>
		<?php 
			$path_parts = pathinfo($attach);
		?>
		<li>
		<span class="fileIcos ext<?php echo strtolower($path_parts["extension"]);?>"></span>
		<INPUT TYPE="hidden" NAME="data[MailTemplate][old_attachments][]" value="<?php echo $attach; ?>">
		<?php echo $path_parts["basename"]; ?>
		&nbsp;&nbsp;<a href="javascript:void(0);" class="remove_attach" ><?php __("Delete"); ?></a>
		</li>
		<?php endforeach; ?>
	</ul>
	<br/>
	<div><?php __("Template tips"); ?></div>
	</fieldset>
<?php echo $form->end('Submit', array('id'=>'select-submit'));?>
</div>

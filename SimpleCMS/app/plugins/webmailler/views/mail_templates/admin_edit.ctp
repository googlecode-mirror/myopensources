<?php 
echo $html->css( array("attachments") );
echo $javascript->link( array('attachments') ); 
?>
<div class="mailTemplates form">
<?php echo $form->create('MailTemplate', array('id'=>'AddForm', 'enctype' => 'multipart/form-data') );?>
	<fieldset>
 		<legend><?php __('Edit MailTemplate');?></legend>
	<?php
		echo $form->input('id');
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
		        'theme_advanced_toolbar_location' => 'top',
		        'theme_advanced_toolbar_align' => 'left',
		    	'plugins' => "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
		    	'theme_advanced_buttons1'=>"save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		    	'theme_advanced_buttons2'=>"cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		    	'theme_advanced_buttons3'=>"tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
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
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
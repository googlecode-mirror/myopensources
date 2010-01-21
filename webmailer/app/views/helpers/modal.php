<?php
/**
 *
 * Modal dialog helper
 * 
 * @package    App
 * @subpackage Helper
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-2-14
 * @version 1.0.0 $id$
 */

class ModalHelper extends AppHelper {
	
    var $helpers = array('Javascript','Html');
    
	function init($name='ex4') {
		
		$view = ClassRegistry::getObject('view');
		$output = $this->Javascript->link( array('jqModal', 'jqDnR') );
		$output .= $this->Html->css('jqModal');
		$waiting_msg = __('Please Wait...', TRUE);
		$inline_script = <<<EOD

		$().ready(function() {
		  
		  // notice that you can pass an element as the target 
		  //  in addition to a string selector.
		  var t = $('#{$name} div.jqmdMSG');
		  
		  $('#{$name}').jqm({
		    trigger: 'a.ex4Trigger',
		    ajax: '@href', /* Extract ajax URL from the 'href' attribute of triggering element */
		    target: t,
		    modal: true, /* FORCE FOCUS */
		    onLoad: function(h) { 
		    	var title = h.t.title;
		    	$('#{$name} div.jqmdTC').html( title );
		    },
		    onHide: function(h) { 
		      t.html('{$waiting_msg}');  // Clear Content HTML on Hide.
		      h.o.remove(); // remove overlay
		      h.w.fadeOut(888); // hide window
		      
		    },
		    overlay: 50
			}).jqDrag('.jqDrag'); 
		  
		});
		
EOD;
		$output .= $this->Javascript->codeBlock($inline_script);//$view->addScript( $this->Javascript->codeBlock($inline_script) );
            
        return $output .= '
			<div id="'.$name.'" class="jqmDialog jqmdWide">
			<div class="jqmdTL"><div class="jqmdTR"><div class="jqmdTC  jqDrag">'.__("Modal Dialog Title", true).'</div></div></div>
			<div class="jqmdBL"><div class="jqmdBR"><div class="jqmdBC">
			
			<div class="jqmdMSG">
			<p>Please wait...</p>
			</div>
			
			</div></div></div>
			<input type="image" src="dialog/close.gif" class="jqmdX jqmClose" />
			</div>
		        
        ';
	}
	
	function modalForm($name='ex4', $form_id="AddForm") {
		$inline_script = <<<EOD
		$().ready(function() {
		    var options = { 
		        target:        '.jqmdMSG',   // target element(s) to be updated with server response 
		        success:       showResponse  // post-submit callback 
		 
		    }; 
		 
		    // bind form using 'ajaxForm' 
		    $('#{$form_id}').ajaxForm(options); 
		
		});
		
		// post-submit callback 
		function showResponse(responseText, statusText)  {
			var patrn=/^done/;
			if ( patrn.test(responseText) ) {
				$('#{$name}').jqmHide();
				location.reload();		
				
			}
		 	
		} 	

EOD;
		return $this->Javascript->codeBlock($inline_script);
		
	}
	
}

$(document).ready(function(){
	
    jQuery(document).bind(
	    'keydown', 
	    'esc',
	    logout
    );
    
    function logout (evt){
		if ( confirm( $.i18n._('Are you sure logout ?') ) ) {
			top.location=""+$("input[name=logout-link]").val()+"";
			
		}
	    return false; 
    }

});
	
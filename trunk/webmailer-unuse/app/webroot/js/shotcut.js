$(document).ready(function(){
	/*-- logout ---*/
    $(document).bind(
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
    
	/*-- new ---*/
    $(document).bind(
	    'keydown', 
	    'Alt+n',
	    add
    );
    
    function add (evt){
    	if( $(".act-new").parent().attr('href') ) {
			 redirect( $(".act-new").parent().attr('href') ) ;
    	}
	    return false; 
    }
    
	/*-- listing ---*/
    $(document).bind(
	    'keydown', 
	    'Alt+l',
	    listing
    );
    
    function listing (evt){
    	if( $(".act-list").parent().attr('href') ) {
			 redirect( $(".act-list").parent().attr('href') ) ;
    	}
	    return false; 
    }
	
	
	function redirect(url){
		document.location = url;
	}
});
	
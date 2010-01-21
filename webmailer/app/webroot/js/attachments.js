  $(document).ready(function(){
    $("#add_attach").click(
		function(){
			$("#attachments").append('<li><INPUT TYPE="file" NAME="data[MailTemplate][attachments][]"></li>');
		}
	);
	
    $(".remove_attach").click(
		function(){    	
			$(this).parent().remove();
		}		
	);
	
   $('#add').click(function() {  
    return !$('#select1 option:selected').remove().appendTo('#select2');  
   });  
   $('#remove').click(function() {  
   	//$('#select1 option:*').attr('selected','selected');
   	//alert("test");
   	var res = !$('#select2 option:selected').remove().appendTo('#select1')
    $("#select2 option").each(function(){
          $(this).attr("selected","selected")
     })   	
    return res;
   });  
	
  });

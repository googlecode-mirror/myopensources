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
	
  });

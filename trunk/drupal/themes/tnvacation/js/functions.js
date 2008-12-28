		$(document).ready(function(){
			$("ul#mainNav").css("z-index","999");
			
			
			$("li a#nav_things").mouseover(function(){
				$("ul#nav_things_nested").css("display","block");
			});
			$("ul#nav_things_nested").mouseover(function(){
				$("ul#nav_things_nested").css("display","block");
			});
			$("li a#nav_things").mouseout(function(){
				$("ul#nav_things_nested").css("display","none");
			});
			$("ul#nav_things_nested").mouseout(function(){
				$("ul#nav_things_nested").css("display","none");
			});
			
			
			
			
			
			
			$("li a#nav_historic").mouseover(function(){
				$("ul#nav_historic_nested").css("display","block");
			});
			$("ul#nav_historic_nested").mouseover(function(){
				$("ul#nav_historic_nested").css("display","block");
			});
			$("li a#nav_historic").mouseout(function(){
				$("ul#nav_historic_nested").css("display","none");
			});
			$("ul#nav_historic_nested").mouseout(function(){
				$("ul#nav_historic_nested").css("display","none");
			});
			
			
			
			
			$("li a#nav_seasonal").mouseover(function(){
				$("ul#nav_seasonal_nested").css("display","block");
			});
			$("ul#nav_seasonal_nested").mouseover(function(){
				$("ul#nav_seasonal_nested").css("display","block");
			});
			$("li a#nav_seasonal").mouseout(function(){
				$("ul#nav_seasonal_nested").css("display","none");
			});
			$("ul#nav_seasonal_nested").mouseout(function(){
				$("ul#nav_seasonal_nested").css("display","none");
			});
			
			
			/*
			// eCard Magic Goes Here
			
			$("ul#eCards_spinner li.step_1 a img").click(function(){
				var new_source = $(this).attr("src").replace(/_on/, "");
				$("ul#eCards_spinner li.step_2 a#selected_ecard img").attr("src", new_source);
			});
			
			$("#eCards_spinner li.step_2 a.next").click(function(){
				var to_email = $("form#fill_in_eCard input#to_email").attr("value");
				var from_email = $("form#fill_in_eCard input#from_email").attr("value");
				var comments = $("form#fill_in_eCard textarea#comments").attr("value");
				
				$("form#confirm_eCard input#to_email_confirm").attr("value", to_email);
				$("form#confirm_eCard input#from_email_confirm").attr("value", from_email);
				$("form#confirm_eCard textarea#comments_confirm").attr("value", comments);
			})
			
			$("ul#eCards_spinner li.step_3 p.eCards_controls a.submit").click(function(){
				
				if(validate()){
					$("form#confirm_eCard").submit();
				}
				
			});
			*/
			
			function validate(){
				
				var to_email = $("form#confirm_eCard input#to_email_confirm").attr("value");
				var from_email = $("form#confirm_eCard input#from_email_confirm").attr("value");
				var comments = $("form#confirm_eCard textarea#comments_confirm").attr("value");
				
				if(!validate_email(to_email)){
					alert('ERROR');
					return false;
				};
				if(!validate_email(from_email)){
					alert('ERROR');
					return false;
				};
				//validate_comments(comments);
				
				alert('NO ERROR');
				return true;
			}
			
			function validate_email(str){
				
				var email_to_match  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if(str = ''){
					return false;
				} else {
					if (str.match(email_to_match)) {
						alert('valid email');
						return true;
					} else {
						alert('invalid email');
						return false;
					};
				}
			}
		});
		
		
					function mycarousel_initCallback(carousel) {
						
					   jQuery('#mainGallery a').bind('click', function() {
				        	carousel.scroll(jQuery.jcarousel.intval(jQuery(this).attr("id").substr(6)));
				        	return false;
				    	});
						
						

					    $('a#prevImg').click( function() {
					        carousel.prev();
					        return false;
					    });
		
						$('a#nextImg').click( function(){
							carousel.next();
					        return false;
						});
						
					    $('p.eCards_controls a.prev').click( function() {
					        carousel.prev();
					        return false;
					    });
		
						$('p.eCards_controls a.next').click( function(){
							carousel.next();
					        return false;
						});
						
						/*
						
						$('li.step_1 a img').click( function(){
							carousel.next();
					        return false;
						});
						
						*/
						
						
						//if($.browser.safari) { $( function() { alert("this is safari!"); } ); }
						
						
			
						/*
					    jQuery('a#prevProperty').bind('click', function() {
					        carousel.prev();
					        return false;
					    });
					    jQuery('a#nextProperty').bind('click', function() {
					        carousel.next();
					        return false;
					    });
						*/
			
					};

					// Ride the carousel...
					jQuery(document).ready(function() {
					    jQuery("#mainGalleryWrap ul#spinner").jcarousel({
					        scroll: 1,
							animation: "slow",
							wrap: "both",
					        initCallback: mycarousel_initCallback,
					        // This tells jCarousel NOT to autobuild prev/next buttons
					        buttonNextHTML: null,
					        buttonPrevHTML: null
					    });
						
						
						
					});
					jQuery(document).ready(function() {
					    jQuery("#eCardsWrap ul#eCards_spinner").jcarousel({
					        scroll: 1,
							animation: "slow",
							wrap: "both",
					        initCallback: mycarousel_initCallback,
					        // This tells jCarousel NOT to autobuild prev/next buttons
					        buttonNextHTML: null,
					        buttonPrevHTML: null
					    });
					});
					
					jQuery(document).ready(function() {
						$('#rotational').cycle({ 
						    timeout: 6000, 
						    delay:  -2000 
						});
					});

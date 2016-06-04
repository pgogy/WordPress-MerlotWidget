function merlot_call(terms,max){
		
	jQuery(document).ready(function($) {
														
			var data = {
				action: 'merlot_search',
				no_items:max,
				keywords:terms
			};		
						
			jQuery.post(ajaxurl, data, 
							
			function(response){
				
				if(response.length!=0){
								
					document.getElementById('merlot_widget').innerHTML = "<p>Searching MERLOT for " + terms + "</p>" + response;
					
				}
								
			});
								
	});
			
}
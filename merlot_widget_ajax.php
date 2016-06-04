<?PHP
		
	/**
	 * Add actions for both logged in and not logged in users
	 */
	add_action('wp_ajax_nopriv_merlot_search', 'merlot_get');
	add_action('wp_ajax_merlot_search', 'merlot_get');
	
	function merlot_get(){
	
		$ch = curl_init();
		
		curl_setopt($ch,CURLOPT_URL,"http://www.merlot.org/merlot/materials.xml?sort.property=relevance&materialType=&keywords=" . $_POST['keywords'] );
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_MAXREDIRS,10);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,100);
		curl_setopt($ch,CURLOPT_USERAGENT,"MERLOT WordPress Widget");
		curl_setopt($ch,CURLOPT_HTTP_VERSION,'CURLOPT_HTTP_VERSION_1_1');
		$data = curl_exec($ch);		
		
		$xml = @simplexml_load_string($data);
		
		$counter =0;
		
		if($xml){
						
			foreach($xml->channel->item as $data => $value){
								
				if($data=="item"){
								
					if($counter!=$_POST['no_items']){
				
						echo "<li>";					
						echo "<p><a href='" . $value->link . "'>" . $value->title . "</a> | <a class='oer-commons-widget-link' title='click to expand' onclick='javascript:if(document.getElementById(\"merlot_widget_" . $counter. "\").style.display==\"block\"){document.getElementById(\"merlot_widget_" . $counter. "\").style.display=\"none\"}else{document.getElementById(\"merlot_widget_" . $counter. "\").style.display=\"block\"};'>+</a>";
						echo "<span id='merlot_widget_" . $counter++ . "'>" . $value->Description . "</span></p></li>";
					
					}

				}	
			
			}
		
		}
		
		die(); // this is required to return a proper result
		
	}
	
?>
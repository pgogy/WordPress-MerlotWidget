<?php

/*
Plugin Name: MERLOT Widget
Description: Facilitates the display of Merlot Content, developed as part of the World War One Continuations and Beginnings project at the University of Oxford
Version: 0.3
Author: pgogy
Author URI: http://www.pgogy.com
Plugin URI : http://www.pgogy.com/code/groups/wordpress/merlot-widget/

*/
 
require_once( 'merlot_widget_ajax.php' ); 

add_action("wp_head","merlot_widget_add_scripts");		
	
function merlot_widget_add_scripts(){
	
	?><script type='text/javascript' src='<?PHP echo site_url(); ?>/wp-includes/js/jquery/jquery.js'></script>
	<link rel="stylesheet" href="<?PHP echo plugins_url("/css/merlot_widget.css" , __FILE__ ); ?>" />
	<script type="text/javascript" language="javascript" src="<?PHP echo plugins_url("/js/merlot_widget.js" , __FILE__ ); ?>"></script>
	<script type="text/javascript" language="javascript">
	var ajaxurl = '<?PHP echo site_url(); ?>/wp-admin/admin-ajax.php';	
	</script>
	<?PHP
	
}
 

function merlot_widget() {
	require_once( 'merlot_widget_class.php' );
	register_widget( 'merlot_widget' );
}
add_action( 'widgets_init', 'merlot_widget', 1 );


?>
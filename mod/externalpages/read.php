<?php

	/**
	 * Elgg read external page
	 * 
	 * @package ElggExpages
	 */

	// Load Elgg engine
		define('externalpage',true);
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
	// set some variables
		$type = get_input('expages');
											
	// Set the title appropriately
		$area1 = elgg_view_title(elgg_echo("expages:". strtolower($type)));
		
		//get contents
		$contents = elgg_get_entities(array('type' => 'object', 'subtype' => $type, 'limit' => 1));
		
		if($contents){
			foreach($contents as $c){
				$area1 .= elgg_view('page_elements/contentwrapper',array('body' => $c->description));
			}
		}else
			$area1 .= elgg_view('page_elements/contentwrapper',array('body' => elgg_echo("expages:notset")));

	// Display through the correct canvas area
		$body = elgg_view_layout("one_column", $area1);
		
	// Display page
		page_draw($title,$body);
		
?>
<?php

	/**
	 * Elgg blog index page
	 * 
	 * @package ElggBlog
	 */

	// Load Elgg engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

	// access check for closed groups
	group_gatekeeper();
		
	// Get the current page's owner
		$page_owner = page_owner_entity();
		if ($page_owner === false || is_null($page_owner)) {
			
			// guess that logged in user is the owner - if no logged in send to all blogs page
			if (!isloggedin()) {
				forward('pg/blog/all/');
			}
			
			$page_owner = $_SESSION['user'];
			set_page_owner($_SESSION['guid']);
		}

	//set blog title
		if ($page_owner == $_SESSION['user']) {
			$area2 = elgg_view_title(elgg_echo('blog:your'));
		} else {
			$area2 = elgg_view_title(sprintf(elgg_echo('blog:user'),$page_owner->name));
		}

		$offset = (int)get_input('offset', 0);
		
	// Get a list of blog posts
		$area2 .= elgg_list_entities(array('type' => 'object', 'subtype' => 'blog', 'container_guid' => page_owner(), 'limit' => 10, 'offset' => $offset, 'full_view' => FALSE, 'view_type_toggle' => FALSE));

	// Get blog tags

		// Get categories, if they're installed
		global $CONFIG;
		$area3 = elgg_view('blog/categorylist', array(
			'baseurl' => $CONFIG->wwwroot . 'pg/categories/list/?subtype=blog&owner_guid='.$page_owner->guid.'&category=',
			'subtype' => 'blog', 
			'owner_guid' => $page_owner->guid));
		
	// Display them in the page
        $body = elgg_view_layout("two_column_left_sidebar", '', $area2, $area3);
		
	// Display page
		page_draw(sprintf(elgg_echo('blog:user'),$page_owner->name),$body);
		
?>
<?php

/**
 * Elgg river dashboard plugin index page
 *
 * @package ElggRiverDash
 */

require_once(dirname(dirname(dirname(__FILE__))) . '/engine/start.php');

//gatekeeper();

$content = get_input('content','');
$content = explode(',' ,$content);
$type = $content[0];
if (isset($content[1])) {
	$subtype = $content[1];
} else {
	$subtype = '';
}
$orient = get_input('display');
$callback = get_input('callback');

if ($type == 'all') {
	$type = '';
	$subtype = '';
}

$body = '';
if (empty($callback)) {

	if (get_plugin_setting('useasdashboard', 'riverdashboard') == 'yes') {
		$title = elgg_echo('dashboard');
	} else {
		$title = elgg_echo('activity');
	}

	//set a view for the wire to extend
	$area1 = elgg_view("riverdashboard/sitemessage");

	//set a view to display newest members
	$area1 .= elgg_view("riverdashboard/newestmembers");

	//set a view to display a welcome message
	$body .= elgg_view("riverdashboard/welcome");

}

switch($orient) {
	case 'mine':
		$subject_guid = get_loggedin_userid();
		$relationship_type = '';
		break;
	case 'friends':
		$subject_guid = get_loggedin_userid();
		$relationship_type = 'friend';
		break;
	default:
		$subject_guid = 0;
		$relationship_type = '';
		break;
}

$river = elgg_view_river_items($subject_guid, 0, $relationship_type, $type, $subtype, '');

// Replacing callback calls in the nav with something meaningless
$river = str_replace('callback=true', 'replaced=88,334', $river);

$nav = elgg_view('riverdashboard/nav',array(
		'type' => $type,
		'subtype' => $subtype,
		'orient' => $orient
));

$content = elgg_view('page_elements/contentwrapper', array('body' => $nav . $river));

if (empty($callback)) {
	// Add RSS support to page
	global $autofeed;
	$autofeed = true;

	// display page
	$body .= elgg_view('riverdashboard/container', array('body' => $content . elgg_view('riverdashboard/js')));
	page_draw($title, elgg_view_layout('sidebar_boxes', $area1, $body));
} else {
	// ajax callback
	header("Content-type: text/html; charset=UTF-8");
	echo $content . elgg_view('riverdashboard/js');
}


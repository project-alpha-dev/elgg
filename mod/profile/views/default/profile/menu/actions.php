<?php

	/**
	 * Elgg profile icon hover over: actions
	 * 
	 * @package ElggProfile
	 * 
	 * @uses $vars['entity'] The user entity. If none specified, the current user is assumed. 
	 */

	if (isloggedin()) {
		if ($_SESSION['user']->getGUID() != $vars['entity']->getGUID()) {
			
			$ts = time();
			$token = generate_action_token($ts);
					
			if ($vars['entity']->isFriend()) {
				echo "<p class=\"user_menu_removefriend\"><a href=\"{$vars['url']}action/friends/remove?friend={$vars['entity']->getGUID()}&__elgg_token=$token&__elgg_ts=$ts\">" . elgg_echo("friend:remove") . "</a></p>";
			} else {
				echo "<p class=\"user_menu_addfriend\"><a href=\"{$vars['url']}action/friends/add?friend={$vars['entity']->getGUID()}&__elgg_token=$token&__elgg_ts=$ts\">" . elgg_echo("friend:add") . "</a></p>";
			}
		}
	}

?>
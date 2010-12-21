<?php
	/**
	 * Elgg profile plugin edit default profile action
	 *
	 * @package ElggProfile
	 */

	// Load configuration
	global $CONFIG;

	admin_gatekeeper();

	$n = 0;
	while (get_plugin_setting("admin_defined_profile_$n", 'profile')) {
		set_plugin_setting("admin_defined_profile_$n", '', 'profile');
		set_plugin_setting("admin_defined_profile_type_$n", '', 'profile');

		$n++;
	}

	set_plugin_setting('user_defined_fields', FALSE, 'profile');

	system_message(elgg_echo('profile:defaultprofile:reset'));

	forward($_SERVER['HTTP_REFERER']);
?>

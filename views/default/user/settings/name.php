<?php
	/**
	 * Provide a way of setting your full name.
	 *
	 * @package Elgg
	 * @subpackage Core


	 */

	$user = page_owner_entity();

if ($user) {
?>
	<h3><?php echo elgg_echo('user:set:name'); ?></h3>
	<p>
		<?php echo elgg_echo('user:name:label'); ?>:
		<?php

			echo elgg_view('input/text', array('internalname' => 'name', 'value' => $user->name));
			echo elgg_view('input/hidden', array('internalname' => 'guid', 'value' => $user->guid));
		?>
	</p>

<?php
}
<?php
/**
 * Elgg email input
 * Displays an email input field
 *
 * @package Elgg
 * @subpackage Core


 *
 * @uses $vars['value'] The current value, if any
 * @uses $vars['js'] Any Javascript to enter into the input tag
 * @uses $vars['internalname'] The name of the input field
 *
 */

$class = $vars['class'];
if (!$class) {
	$class = "input-text";
}
?>

<input type="text" <?php echo $vars['js']; ?> name="<?php echo $vars['internalname']; ?>" <?php if (isset($vars['internalid'])) echo "id=\"{$vars['internalid']}\""; ?>value="<?php echo htmlentities($vars['value'], ENT_QUOTES, 'UTF-8'); ?>" class="<?php echo $class; ?>"/>
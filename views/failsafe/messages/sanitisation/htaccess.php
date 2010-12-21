<?php
/**
 * Elgg .htaccess not found message
 * Is saved to the errors register when the main .htaccess cannot be found
 *
 * @package Elgg
 * @subpackage Core
 */

echo autop(elgg_echo('installation:error:htaccess'));
?>
<textarea><?php echo $vars['.htaccess']; ?></textarea>

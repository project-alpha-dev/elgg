<?php

	/**
	 * Elgg get bookmarks bookmarklet view
	 * 
	 * @package ElggBookmarks
	 */

	$page_owner = $vars['pg_owner'];
	
	$bookmarktext = elgg_echo("bookmarks:this");
	if ($page_owner instanceof ElggGroup)	
		$bookmarktext = sprintf(elgg_echo("bookmarks:this:group"), $page_owner->name)
?>
	<div class="contentWrapper">
	<p>
		<?php echo elgg_echo("bookmarks:bookmarklet:description"); ?>
	</p>
	<p class="sharing_bookmarklet">
		<a href="javascript:location.href='<?php echo $vars['url']; ?>pg/bookmarks/add/<?php echo $page_owner->username; ?>?address='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title)"> <img src="<?php echo $vars['url']; ?>_graphics/elgg_bookmarklet.gif" border="0" title="<?php echo $bookmarktext ?>" />   </a>
	</p>
	<p>
		<?php echo elgg_echo("bookmarks:bookmarklet:descriptionie"); ?>
	</p>
	<p>
		<?php echo elgg_echo("bookmarks:bookmarklet:description:conclusion"); ?>
	</p>
	</div>
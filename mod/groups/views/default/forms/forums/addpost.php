<?php

	/**
	 * Elgg group forum post edit/add page
	 * 
	 * @package ElggGroups
	 * 
	 * @uses $vars['entity'] Optionally, the post to edit
	 */
	    
?>
	<form action="<?php echo $vars['url']; ?>action/groups/addpost" method="post">
		<p class="longtext_editarea">
			<label><?php echo elgg_echo("groups:reply"); ?><br />
			<?php

				echo elgg_view("input/longtext",array(
									"internalname" => "topic_post",
									"value" => $body,
													));
			?>
			</label>
		</p>
		<p>
		    <!-- pass across the topic guid -->
			<input type="hidden" name="topic_guid" value="<?php echo $vars['entity']->guid; ?>" />
			<input type="hidden" name="group_guid" value="<?php echo $vars['entity']->container_guid; ?>" />
			
<?php 
		echo elgg_view('input/securitytoken');
?>
			<!-- display the post button -->
			<input type="submit" class="submit_button" value="<?php echo elgg_echo('post'); ?>" />
		</p>
	
	</form>
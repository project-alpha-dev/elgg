<?php

/**
 * Elgg collection add page
 *
 * @package Elgg
 * @subpackage Core
 */

$collection_id = get_input('collection_id');
$friends = get_input('friend');

//chech the collection exists and the current user owners it
update_access_collection($collection_id, $friends);
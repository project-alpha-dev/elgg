<?php
/**
 * Elgg sample welcome page
 *
 * @package Elgg
 * @subpackage Core
 */

if (isloggedin()) {
	echo elgg_view("welcome/logged_in");
} else {
	echo elgg_view("welcome/logged_out");
}
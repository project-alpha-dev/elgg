<?php

/**
 * Elgg invite language file
 * 
 * @package ElggInviteFriends
 */

$english = array(

	'friends:invite' => 'Invite friends',
	'invitefriends:introduction' => 'To invite friends to join you on this network, enter their email addresses below (one per line):',
	'invitefriends:message' => 'Enter a message they will receive with your invitation:',
	'invitefriends:subject' => 'Invitation to join %s',

	'invitefriends:success' => 'Your friends were invited.',
	'invitefriends:invitations_sent' => 'Invites sent: %s. There were the following problems:',
	'invitefriends:email_error' => 'The following addresses are not valid: %s',
	'invitefriends:already_members' => 'The following are already members: %s',
	'invitefriends:noemails' => 'No email addresses were entered.',
	
	'invitefriends:message:default' => '
Hi,

I want to invite you to join my network here on %s.',

	'invitefriends:email' => '
You have been invited to join %s by %s. They included the following message:

%s

To join, click the following link:

%s

You will automatically add them as a friend when you create your account.',
	
	);
					
add_translation("en", $english);

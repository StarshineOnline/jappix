<?php

/*

Jappix - An open social platform
This script (re)generates the store sub-folders (after an update)

-------------------------------------------------

License: AGPL
Authors: Valérian Saliou, regilero
Last revision: 11/02/12

*/

// Someone is trying to hack us?
if(!defined('JAPPIX_BASE'))
	exit;

// Array of the sub-folders to create
$store_folders = array(
	'access',
	'avatars',
	'backgrounds',
	'cache',
	'conf',
	'logos',
	'logs',
	'music',
	'send',
	'share',
	'updates'
);

// Creates the sub-folders
for($i = 0; $i < count($store_folders); $i++) {
	$current = JAPPIX_BASE.'/store/'.$store_folders[$i];
	
	// Create the folder itself
	if(!is_dir($current))
		mkdir($current, 0777, true);
	
	chmod($current, 0777);
	
	// Create the security file inside the folder
	$security_html = securityHTML();
	
	file_put_contents($current.'/index.html', $security_html, LOCK_EX);
}

?>

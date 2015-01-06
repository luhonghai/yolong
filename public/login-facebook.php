<?php

require 'includes/facebook/facebook.php';

$fid = get_option('facebook_id');
$fs = get_option('facebook_secret');

$facebook = new Facebook(array(
            'appId' => $fid,
            'secret' => $fs,
            ));

$user = $facebook->getUser();

if ($user) {
	try {
		// Proceed knowing you have a logged in user who's authenticated.
		$user_profile = $facebook->api('/me');
	} catch (FacebookApiException $e) {
		error_log($e);
		$user = null;
	}

    if (!empty($user_profile )) {
        # User info ok? Let's print it (Here we will be adding the login and registering routines)
  
        $name = $user_profile['name'];
		$uid = $user_profile['id'];
		$email = $user_profile['email'];
        $userdata = checkUser($uid, 'facebook', '', $name , $email);
    } else {
        # For testing purposes, if there was an error, let's kill the script
        die("There was an error.");
    }
} else {
    # There's no active session, let's generate one
	$login_url = $facebook->getLoginUrl(array( 'scope' => 'email'));
    header("Location: " . $login_url);
}
?>

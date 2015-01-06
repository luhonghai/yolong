<?php

ob_start();
require("includes/twitter/twitteroauth.php");

if (!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])) {

	$tk = get_option('twitter_key');
	$ts = get_option('twitter_secret');
    // We've got everything we need
    $twitteroauth = new TwitterOAuth($tk, $ts, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
	// Let's request the access token
    $access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);
	// Save it in a session var
    $_SESSION['access_token'] = $access_token;
	// Let's get the user's info
    $g_user_info = $twitteroauth->get('account/verify_credentials');

    if (isset($g_user_info->error)) {
        // Something's wrong, go back to square 1  
        header('Location: index.php?view=login-twitter');
    } else {
		$twitter_otoken = $_SESSION['oauth_token'];
		$twitter_otoken_secret = $_SESSION['oauth_token_secret'];
		$email='';
		$uid = $g_user_info->id;
        $username = $g_user_info->screen_name;
		$fullname = $g_user_info->name;
        $userdata = checkUser($uid, 'twitter', $username, $fullname, $email , $twitter_otoken, $twitter_otoken_secret);
    }
} else {
    // Something's missing, go back to square 1
    header('Location: index.php?view=login-twitter');
}
?>

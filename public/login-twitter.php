<?php
require("includes/twitter/twitteroauth.php");

$tk = get_option('twitter_key');
$ts = get_option('twitter_secret');
$twitteroauth = new TwitterOAuth($tk, $ts);
// Requesting authentication tokens, the parameter is the URL we will be redirected to
$ru = get_base_url('index.php?view=getTwitterData');

$request_token = $twitteroauth->getRequestToken($ru);

// Saving them into the session

$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

// If everything goes well..
if ($twitteroauth->http_code == 200) {
    // Let's generate the URL and redirect
    $url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
    header('Location: ' . $url);
} else {
    // It's a bad idea to kill the script, but we've got to know when there's an error.
    echo $twitteroauth->http_code;
	
}
?>

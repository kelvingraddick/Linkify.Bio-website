<?php
    use Abraham\TwitterOAuth\TwitterOAuth;

    $connection = new TwitterOAuth($twitter_consumer_key, $twitter_consumer_secret);

    $request_token = $connection -> oauth(
        'oauth/request_token', [
            'oauth_callback' => 'http://linkify.bio/register/twitter.php'
        ]
    );

    if($connection -> getLastHttpCode() != 200) {
        throw new \Exception('There was a problem performing this request');
    }

    $_SESSION['oauth_token'] = $request_token['oauth_token'];
    $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

    $twitter_login_url = $connection -> url(
        'oauth/authorize', [
            'oauth_token' => $request_token['oauth_token']
        ]
    );
?>

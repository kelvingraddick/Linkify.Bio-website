<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include $_SERVER['DOCUMENT_ROOT'].'/components/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/components/common.php';
    include $_SERVER['DOCUMENT_ROOT'].'/components/twitteroauth/load.php';
    $database_connection = connect_to_database();
    use Abraham\TwitterOAuth\TwitterOAuth;

    $request_token = [];
    $request_token['oauth_token'] = $_SESSION['oauth_token'];
    $request_token['oauth_token_secret'] = $_SESSION['oauth_token_secret'];

    if (isset($_REQUEST['oauth_token']) && $request_token['oauth_token'] !== $_REQUEST['oauth_token']) {
        echo "SESSION: ".$request_token['oauth_token']."<br />";
        echo "TWITTER: ".$_REQUEST['oauth_token']."<br />";
        throw new \Exception('Invalid oauth token.');
    }

    $connection = new TwitterOAuth($twitter_consumer_key, $twitter_consumer_secret, $request_token['oauth_token'], $request_token['oauth_token_secret']);
    $access_token = $connection -> oauth("oauth/access_token", ["oauth_verifier" => $_REQUEST['oauth_verifier']]);

    register_user($twitter_consumer_key, $twitter_consumer_secret, $database_connection, $access_token);

    function register_user($twitter_consumer_key, $twitter_consumer_secret, $database_connection, $access_token) {
        $connection = new TwitterOAuth($twitter_consumer_key, $twitter_consumer_secret, $access_token['oauth_token'], $access_token['oauth_token_secret']);
        $twitter_user = $connection -> get("account/verify_credentials");

        $twitter_id = $twitter_user -> id;
        $username = $twitter_user -> screen_name;
        $full_name = $twitter_user -> name;
        $image_url = str_replace("_normal", "", $twitter_user -> profile_image_url_https);
        $bio = $twitter_user -> description;
        $twitter_oauth_token = $access_token['oauth_token'];
        $twitter_oauth_token_secret = $access_token['oauth_token_secret'];

        if (mysqli_num_rows(mysqli_query($database_connection, "SELECT username FROM users WHERE username = '$username'"))) {
            if (mysqli_query($database_connection, "UPDATE users SET image_url = '$image_url', bio = '$bio', twitter_id = '$twitter_id', twitter_oauth_token = '$twitter_oauth_token', twitter_oauth_token_secret = '$twitter_oauth_token_secret' WHERE username = '$username'")) {
                $_SESSION['username'] = $username;
                header('Location: http://'.$_SERVER['SERVER_NAME'].'/admin/');
            } else {
                header('Location: http://'.$_SERVER['SERVER_NAME'].'/register/error.php');
            }
        } else if (mysqli_query($database_connection, "INSERT INTO users(username, full_name, image_url, bio, twitter_id, twitter_oauth_token, twitter_oauth_token_secret) VALUES('$username', '$full_name', '$image_url', '$bio', '$twitter_id', '$twitter_oauth_token', '$twitter_oauth_token_secret')")) {
            $_SESSION['username'] = $username;
            header('Location: http://'.$_SERVER['SERVER_NAME'].'/admin/');
        } else {
            header('Location: http://'.$_SERVER['SERVER_NAME'].'/register/error.php');
        }
    }
?>

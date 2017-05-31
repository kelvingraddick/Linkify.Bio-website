<?php
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);

	include $_SERVER['DOCUMENT_ROOT'].'/components/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/components/common.php';
	$database_connection = connect_to_database();

	$code = $_GET['code'];

    if ($code != '') {
        $access_token = request_access_token($code);
        register_user($database_connection, $access_token);
    } else {
        $error = $_GET['error'];
        $error_reason = $_GET['error_reason'];
        $error_description = $_GET['error_description'];
        header('Location: http://linkify.bio/register/error/');
    }

    function request_access_token($code) {
        $url = 'https://api.instagram.com/oauth/access_token';
        $requestData = array(
            'grant_type' => 'authorization_code',
            'client_id' => '4a18edf1ceff4747b2c06e38d3395b34',
            'client_secret' => 'cb012618f3cd46abb5b12fcf702e2bcb',
            'redirect_uri' => 'http://linkify.bio/register/',
            'code' => $code
        );
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($requestData)
            )
        );
        $context  = stream_context_create($options);
        $responseJson = file_get_contents($url, false, $context);
        if ($responseJson === FALSE) { 
            return '';
        } else {
            $responseData = json_decode($responseJson);
            return $responseData -> access_token;
        }
    }

    function register_user($database_connection, $access_token) {
        $responseData = json_decode(trim(file_get_contents('https://api.instagram.com/v1/users/self/?access_token='.$access_token)));
        $instagram_user = $responseData -> data;
        
        $instagram_id = $instagram_user -> id;
        $username = $instagram_user -> username;
        $full_name = $instagram_user -> full_name;
        $image_url = $instagram_user -> profile_picture;
        $bio = $instagram_user -> bio;

        if (mysqli_num_rows(mysqli_query($database_connection, "SELECT instagram_id FROM users WHERE instagram_id = '$instagram_id'"))) {
            if (mysqli_query($database_connection, "UPDATE users SET username = '$username', full_name = '$full_name', image_url = '$image_url', bio = '$bio', instagram_access_token = '$access_token' WHERE instagram_id = '$instagram_id'")) {
                header('Location: http://linkify.bio/'.$username.'/');
            } else {
                header('Location: http://linkify.bio/register/error/');
            }
        } else if (mysqli_query($database_connection, "INSERT INTO users(username, full_name, image_url, bio, instagram_id, instagram_access_token) VALUES('$username', '$full_name', '$image_url', '$bio', '$instagram_id', '$access_token')")) {
            header('Location: http://linkify.bio/'.$username.'/');
        } else {
            header('Location: http://linkify.bio/register/error/');
        }
    }
?>
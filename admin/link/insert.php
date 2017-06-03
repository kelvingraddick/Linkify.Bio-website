<?php
	include $_SERVER['DOCUMENT_ROOT'].'/components/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/components/common.php';
	$database_connection = connect_to_database();

    $username = $_SESSION['username'];
	$name = $_POST['name'];
    $url = $_POST['url'];

    if ($username == '') {
        header('Location: http://linkify.bio/');
    } else if ($name == '' || $url == '') {
        header('Location: http://linkify.bio/admin/');
    } else {
        $user_result = mysqli_query($database_connection, "SELECT * FROM `users` WHERE username = '$username'");
        if (!$user_result) { echo 'Could not find user by the username specified.'; }
        $user = mysqli_fetch_assoc($user_result);
        insert_link($database_connection, $user['id'], $url, $name);
    }

    function insert_link($database_connection, $user_id, $url, $name) {
        if (mysqli_query($database_connection, "INSERT INTO links(user_id, url, name, is_enabled, impressions, clicks) VALUES('$user_id', '$url', '$name', 1, 0, 0)")) {
            header('Location: http://linkify.bio/admin/');
        } else {
            header('Location: http://linkify.bio/register/error/');
        }
    }
?>

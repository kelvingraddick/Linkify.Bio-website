<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

	include $_SERVER['DOCUMENT_ROOT'].'/components/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/components/common.php';
	$database_connection = connect_to_database();

    $username = $_SESSION['username'];
	$full_name = $_POST['full_name'];

    if ($username == '') {
        header('Location: http://linkify.bio/');
    } else if ($full_name == '') {
        header('Location: http://linkify.bio/admin/');
    } else {
        update_user($database_connection, $username, $full_name);
    }

    function update_user($database_connection, $username, $full_name) {
        if (mysqli_query($database_connection, "UPDATE users SET full_name = '$full_name' WHERE username = '$username'")) {
            header('Location: http://linkify.bio/admin/');
        } else {
            header('Location: http://linkify.bio/register/error/');
        }
    }
?>

<?php
	include $_SERVER['DOCUMENT_ROOT'].'/components/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/components/common.php';
	$database_connection = connect_to_database();

    $username = $_SESSION['username'];
    $id = $_POST['id'];

    if ($username == '') {
        header('Location: http://linkify.bio/');
    } else if ($id == '') {
        header('Location: http://linkify.bio/admin/');
    } else {
        delete_link($database_connection, $id);
    }

    function delete_link($database_connection, $id) {
        if (mysqli_query($database_connection, "DELETE FROM links WHERE id = '$id'")) {
            header('Location: http://linkify.bio/admin/');
        } else {
            header('Location: http://linkify.bio/register/error/');
        }
    }
?>

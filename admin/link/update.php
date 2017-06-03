<?php
	include $_SERVER['DOCUMENT_ROOT'].'/components/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/components/common.php';
	$database_connection = connect_to_database();

    $username = $_SESSION['username'];
    $id = $_POST['id'];
	$name = $_POST['name'];
    $url = $_POST['url'];

    if ($username == '') {
        header('Location: http://linkify.bio/');
    } else if ($id == '' || $name == '' || $url == '') {
        header('Location: http://linkify.bio/admin/');
    } else {
        update_link($database_connection, $id, $name, $url);
    }

    function update_link($database_connection, $id, $name, $url) {
        if (mysqli_query($database_connection, "UPDATE links SET name = '$name', url = '$url' WHERE id = '$id'")) {
            header('Location: http://linkify.bio/admin/');
        } else {
            header('Location: http://linkify.bio/register/error/');
        }
    }
?>

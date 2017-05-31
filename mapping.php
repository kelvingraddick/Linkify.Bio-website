<?php
header('Location: http://linkify.bio');
    $path = ltrim($_SERVER['REQUEST_URI'], '/');
    $elements = explode('/', $path);
    if (empty($elements[0])) {
        header('Location: http://linkify.bio');
    } else {
        header('Location: http://linkify.bio/user.php?username='.$elements[0]);
    }
?>
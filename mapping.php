<?php
    $path = ltrim($_SERVER['REQUEST_URI'], '/');
    $elements = explode('/', $path);
    if (empty($elements[0])) {
        include('http://linkify.bio');
    } else {
        include('http://linkify.bio/user.php?username='.$elements[0]);
    }
?>
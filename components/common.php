<?php

    function connect_to_database() {
        $c = mysqli_connect($GLOBALS['database_host'], 
                            $GLOBALS['database_username'], 
                            $GLOBALS['database_password'], 
                            $GLOBALS['database_name'])
                            or die("Cannot connect to database."); 
        mysqli_set_charset($c, "utf8mb4");
        return $c;
    }

    function get_settings($c, $sql) {
        $settings = mysqli_query($c, "SELECT * FROM settings");
        if (!$settings) { echo 'Could not load settings data.'; exit; }
        $setting = array(); 
        while($row = mysqli_fetch_assoc($settings)) { 
            $setting[$row['code']] = $row['value']; 
        }
        return $setting;
    }

    function get_seo($c, $page) {
        $row = mysqli_fetch_assoc(mysqli_query($c, "SELECT * FROM seo WHERE page='$page'"));
        if (!$row) { return; }
        return $row;
    }

    function clean_quotes($string) {
        return str_replace('"', '&quot;', $string);
    }

    function mysqli_result($mysqli, $sql) {
        $result = $mysqli->query($sql);
        $value = $result->fetch_array(MYSQLI_NUM);
        return is_array($value) ? $value[0] : "";
    }

    function getExtension($str) {
        $i = strrpos($str,".");
        if (!$i) { return ""; } 
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
    }

    function reArrayFiles(&$file_post) {
        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);
        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }
        return $file_ary;
    }

?>
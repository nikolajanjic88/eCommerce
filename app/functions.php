<?php

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function passwordLength($password) {
    return (strlen($password) >= 6 && strlen($password) <= 20);
}

function compareValues($val1, $val2) {
    return $val1 === $val2;
}

function abort($code = 404) {
    http_response_code($code);
    require_once BASE_PATH . "views/$code.php";
    die();
}

function delTree($dir) { 
    $files = array_diff(scandir($dir), array('.','..')); 
     foreach ($files as $file) { 
       (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
     } 
     return rmdir($dir); 
} 

function is_image($path) {
    $a = getimagesize($path);
    if($a) {
        $image_type = $a[2];
        if(in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP, IMAGETYPE_WEBP)))
        {
            return true;
        }
    }
    return false;
}
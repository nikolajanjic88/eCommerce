<?php

if(!isset($_GET['id'])) {
    abort(404);
} 

use App\Database;

$db = new Database();

$sql = "SELECT * FROM images WHERE product_id = :id";

$images = $db->query($sql, ['id' => $_GET['id']])->get();

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $image = $_FILES['image'];
    //var_dump($image);
    $name = BASE_PATH . "/public/images/products/{$_GET['id']}/" . $image['name'];
    $size = $image['size'];
    $tmp = $image['tmp_name'];
    
    $errors = [];
    
    if(empty($tmp)) {
        $errors['image'] = 'No File chosen';
    }
    if($size > 2000000) {
        $errors['image'] = 'File too big';
    }
    if(!empty($tmp) && !is_image($tmp)) {
        $errors['image'] = 'Not an image';
    }

    if(empty($errors)) {
        move_uploaded_file($tmp, $name);

        $folder = "images/products/{$_GET['id']}/";
        $sql = "INSERT INTO images (path, product_id) VALUES (:path, :product_id)";
        $db->query($sql, [
            'path' => $folder . $image['name'],
            'product_id' => $_GET['id']
        ]);
        header("Refresh:0");
    }
    
}

require_once BASE_PATH . '/views/admin/images.view.php';
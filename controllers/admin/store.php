<?php

use App\Database;

$db = new Database();

$title = htmlspecialchars($_POST['title']);
$desc = htmlspecialchars($_POST['desc']);
$price = htmlspecialchars($_POST['price']);

$errors = [];

if(trim($title) === '') {
    $errors['title'] = 'Title requried';
}

if(trim($desc) === '') {
    $errors['desc'] = 'Description requried';
}

if(trim($price) === '' || $price < 1) {
    $errors['price'] = 'Price requried';
}

if(!empty($errors)) {
    require_once BASE_PATH . '/views/admin/create.view.php';
} else {
    $sql = "INSERT INTO products (title, description, price) VALUES (:title, :description, :price)";
    $db->query($sql, [
        'title' => $title,
        'description' => $desc,
        'price' => $price
    ]);
    
    $lastID = $db->lastID();
    $imageFolder = BASE_PATH . "/public/images/products/$lastID";
    if(!file_exists($imageFolder)) mkdir($imageFolder);

    $_SESSION['post_created'] = 'Post Created!';
    header('location: /manage');
    die();
}
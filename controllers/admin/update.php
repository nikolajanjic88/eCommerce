<?php

use App\Database;

$db = new Database();

$title = htmlspecialchars($_POST['title']);
$desc = htmlspecialchars($_POST['desc']);
$price = htmlspecialchars($_POST['price']);
$id = $_GET['id'];

$errors = [];

if(trim($title) === '') {
    $errors['title'] = 'Title requried';
}

if(trim($desc) === '') {
    $errors['desc'] = 'Description requried';
}


$sql = "SELECT * FROM products WHERE id = ?";

$product = $db->query($sql, [$_GET['id']])->findOrFail();

if(!empty($errors)) {
    require_once BASE_PATH . '/views/admin/edit.view.php';
} else {
    $sql = "UPDATE products SET 
                    title = :title, 
                    description = :description, 
                    price = :price
                    WHERE id = :id";
    $db->query($sql, [
        'title' => $title,
        'description' => $desc,
        'price' => $price,
        'id' => $_GET['id']
    ]);
    $_SESSION['update'] = 'Product Updated!';
    header('location: /manage');
    die();
}
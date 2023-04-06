<?php

if(!isset($_GET['id'])) {
    abort(404);
} 

use App\Database;

$db = new Database();

$sql = "SELECT * FROM products WHERE id = :id";

$product = $db->query($sql, ['id' => $_GET['id']])->findOrFail();

$sql = "SELECT * FROM images WHERE product_id = :id";

$images = $db->query($sql, ['id' => $_GET['id']])->get();
//var_dump($images);

require_once BASE_PATH . '/views/single_product.view.php';
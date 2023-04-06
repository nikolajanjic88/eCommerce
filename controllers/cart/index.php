<?php

use App\Database;

$db = new Database();

$sql = "SELECT cart.id, cart.quantity, products.title, products.price, images.path, cart.user_id
        FROM products JOIN cart ON cart.product_id = products.id 
        JOIN images ON products.id = images.product_id
        GROUP BY cart.id HAVING cart.user_id = ?";
$carts = $db->query($sql, [$_SESSION['user']['id']])->get();
//var_dump($carts);

require_once BASE_PATH . '/views/cart.view.php';
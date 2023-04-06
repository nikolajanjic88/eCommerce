<?php

use App\Database;

$db = new Database();

$sql = "SELECT products.id, products.title, products.price, images.path FROM products
        LEFT JOIN images ON products.id = images.product_id GROUP BY products.id";

$products = $db->query($sql)->get();
//var_dump($products);

require_once BASE_PATH . '/views/admin/manage.view.php';
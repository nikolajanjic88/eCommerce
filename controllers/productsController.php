<?php

use App\Database;

$db = new Database();

if(isset($_GET['sort']) && $_GET['sort'] !== '0') {
    $sort = $_GET['sort'];
    if($sort === 'priceDESC') $sql = "SELECT products.id, products.title, products.price, images.path FROM products
                                        JOIN images ON products.id = images.product_id
                                        GROUP BY products.id ORDER BY price DESC";
    if($sort === 'priceASC') $sql = "SELECT products.id, products.title, products.price, images.path FROM products 
                                        JOIN images ON products.id = images.product_id 
                                        GROUP BY products.id ORDER BY price ASC";
} else {
    $sql = "SELECT products.id, products.title, products.price, images.path FROM products 
            JOIN images ON products.id = images.product_id GROUP BY products.id";
}

$products = $db->query($sql)->get();
//var_dump($products);
require_once BASE_PATH . '/views/products.view.php';
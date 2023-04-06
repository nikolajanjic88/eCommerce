<?php

use App\Database;

$db = new Database();

$qty = $_POST['qty'];
$id = $_POST['id'];

$sql = "INSERT INTO cart (product_id, quantity, user_id) VALUES (:product_id, :qty, :user_id)";

$db->query($sql, ['product_id' => $id, 'qty' => $qty, 'user_id' => $_SESSION['user']['id']]);

$_SESSION['added'] = 'Product added to Cart!';
header('location: /cart');
die();
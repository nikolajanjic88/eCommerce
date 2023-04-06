<?php

use App\Database;

$db = new Database();

$id = $_POST['id'];

$sql = "DELETE FROM products WHERE id = ?";

$db->query($sql, [$id]);

$dir = BASE_PATH . "/public/images/products/{$id}";
delTree($dir);

header('location: /manage');
die();